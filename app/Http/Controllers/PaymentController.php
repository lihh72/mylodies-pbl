<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Transaction;
use Midtrans\Notification;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\FonnteService;
use Carbon\Carbon;
class PaymentController extends Controller
{
    // Step 1: Form Pilih Alamat
    public function show($code)
{
    $user = Auth::user();
        if (
        empty($user->address) ||
        empty($user->city) ||
        empty($user->province) ||
        empty($user->postal_code) ||
        empty($user->phone_number)
    ) {
        return redirect()->route('settings.index')
            ->with('warning', 'Please complete your address details first before proceeding with payment.');
    }

    $payment = Payment::where('code', $code)->firstOrFail();
    $order = $payment->order;

    if ($order->user_id !== auth()->id()) {
        abort(403, 'Unauthorized access to this order.');
    }

    // Jika snap_token dan midtrans_order_id sudah tersedia, langsung redirect ke confirm
    if ($payment->snap_token && $payment->midtrans_order_id) {
        return redirect()->route('payment.confirm', $code);
    }

    // Jika belum, tampilkan form pilih alamat
    return view('payment', compact('order', 'payment'));
}


    // Step 1b: Proses dan Simpan Alamat
public function confirmAddress(Request $request, $code)
{
    $payment = Payment::where('code', $code)->firstOrFail();
    $order = $payment->order;

    // ✅ Pastikan user adalah pemilik order
    if ($order->user_id !== auth()->id()) {
        abort(403, 'Unauthorized');
    }

    // ✅ Simpan alamat dari user atau input baru
    if ($request->input('address_option') === 'user') {
        $shippingAddress = auth()->user()->address . ', ' .
                           auth()->user()->city . ', ' .
                           auth()->user()->province . ' ' .
                           auth()->user()->postal_code;

        $order->update([
            'shipping_address' => $shippingAddress,
            'name' => auth()->user()->name,
            'phone_number' => auth()->user()->phone_number,
        ]);
    } else {
        $shippingAddress = $request->new_address . ', ' .
                           $request->new_city . ', ' .
                           $request->new_province . ' ' .
                           $request->new_postal;

        $order->update([
            'shipping_address' => $shippingAddress,
            'name' => $request->new_name,
            'phone_number' => $request->new_phone,
        ]);
    }

    // ✅ Muat semua item dan produk terkait
    $order->load('orderItems.product');

    $stokTerkoreksi = false;
    $pesanPerubahan = [];

    // ✅ Validasi dan koreksi stok
    foreach ($order->orderItems as $item) {
        $product = $item->product;

        if (!$product || $product->stock <= 0) {
            $item->delete();
            $stokTerkoreksi = true;
            $pesanPerubahan[] = "Produk '{$product->name}' dihapus karena stok habis.";
            continue;
        }

        if ($item->quantity > $product->stock) {
            $oldQty = $item->quantity;
            $item->quantity = $product->stock;

            $days = Carbon::parse($item->start_date)->diffInDays(Carbon::parse($item->end_date)) + 1;
            $item->total_price = $product->rental_price_per_day * $days * $item->quantity;
            $item->save();

            $stokTerkoreksi = true;
            $pesanPerubahan[] = "Qty untuk '{$product->name}' dikurangi dari {$oldQty} ke {$product->stock} karena stok terbatas.";
        }
    }

    // ✅ Hapus order jika semua item dihapus
    if ($order->orderItems()->count() === 0) {
        $order->delete();
        $payment->delete();
        return redirect()->route('catalog')->with('error', 'Semua produk dalam pesanan sudah tidak tersedia.');
    }

    // ✅ Perhitungan ulang ongkir & total harga
    $order->load('orderItems');
    $baseShippingPricePerKg = 30000;

    $shippingCost = $order->orderItems->sum(function ($item) use ($baseShippingPricePerKg) {
        return ceil($item->weight * $item->quantity) * $baseShippingPricePerKg;
    });

    $basePrice = $order->orderItems->sum('total_price');
    $totalPrice = $basePrice + $shippingCost;

    $order->update([
        'base_price' => $basePrice,
        'shipping_cost' => $shippingCost,
        'total_price' => $totalPrice,
    ]);

    // ✅ Kurangi stok produk
    foreach ($order->orderItems as $item) {
        $product = $item->product;
        if ($product->stock >= $item->quantity) {
            $product->decrement('stock', $item->quantity);
        }
    }

    // ✅ Jika ada koreksi, beri notifikasi
    if ($stokTerkoreksi) {
        return redirect()->route('payment.show', $payment->code)
                         ->with('warning', implode(' ', $pesanPerubahan));
    }

    // ✅ Lanjut ke halaman konfirmasi pembayaran
    return redirect()->route('payment.confirm', $payment->code);
}


    // Step 2: Halaman Konfirmasi + Snap Token Midtrans
    public function confirm($code)
    {
        $payment = Payment::where('code', $code)->firstOrFail();
        $order = $payment->order;
        if ($payment->payment_status === 'paid') {
    return redirect()->route('order.detail', $order->id)
                     ->with('info', 'Payment has been completed for this order.');
}


        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        // Cek & generate token baru jika belum ada
        if (!$payment->snap_token || !$payment->midtrans_order_id) {
            $snapToken = $this->generateSnapToken($order, $payment);
        } else {
            $snapToken = $payment->snap_token;
        }

        return view('payment_confirm', compact('order', 'snapToken'));
    }

    // Midtrans Snap Token Generator
    protected function generateSnapToken(Order $order, Payment $payment)
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $midtransOrderId = 'ORDER-' . $order->id . '-' . time();
        $items = $order->orderItems;
        $totalOrderPrice = (int) round($order->total_price);

        $itemDetails = [];

        foreach ($items as $item) {
            $start = \Carbon\Carbon::parse($item->start_date);
            $end = \Carbon\Carbon::parse($item->end_date);
            $days = $start->diffInDays($end) + 1;

            $price = (int) round($item->price * $days);

            $itemDetails[] = [
                'id' => (string) $item->product_id,
                'price' => $price,
                'quantity' => $item->quantity,
                'name' => ($item->product->name ?? 'Product') . " ({$days} hari)",
            ];
        }

        if ($order->shipping_cost > 0) {
    $itemDetails[] = [
        'id' => 'SHIPPING',
        'price' => (int) $order->shipping_cost,
        'quantity' => 1,
        'name' => 'Ongkos Kirim',
    ];
        }

        $params = [
            'transaction_details' => [
                'order_id' => $midtransOrderId,
                'gross_amount' => $totalOrderPrice,
            ],
            'item_details' => $itemDetails,
            'customer_details' => [
                'first_name' => $order->name,
                'email' => auth()->user()->email,
                'phone' => $order->phone_number,
                'shipping_address' => [
                    'first_name' => $order->name,
                    'phone' => $order->phone_number,
                    'address' => $order->shipping_address,
                    'country_code' => 'IDN'
                ],
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        $payment->update([
            'midtrans_order_id' => $midtransOrderId,
            'snap_token' => $snapToken,
            'payment_status' => 'pending',
            'gross_amount' => $totalOrderPrice,
        ]);

        return $snapToken;
    }

    // Proses saat payment sukses dari client (via JS)
    public function process(Request $request, Order $order)
    {
        if ($order->payment) {
            $order->payment->update(['payment_status' => 'paid']);
            $order->update(['status' => 'processing']);
        }

        return $request->query('redirect_to') === 'order_detail'
            ? redirect()->route('order.detail', $order->id)->with('success', 'Pembayaran berhasil!')
            : redirect()->route('landing')->with('success', 'Payment successful!');
    }

    // Callback dari Midtrans ke endpoint server
    public function callback(Request $request)
{
    Config::$serverKey = config('services.midtrans.server_key');
    Config::$isProduction = config('services.midtrans.is_production');
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $notification = new Notification();
    Log::info('Midtrans callback received', (array) $notification);

    preg_match('/ORDER-(\d+)-/', $notification->order_id, $matches);
    if (!isset($matches[1])) return response('Invalid order ID', 400);

    $order = Order::with(['user', 'orderItems.product'])->find($matches[1]);
    if (!$order) return response('Order not found', 404);

    $payment = $order->payment;
    if (!$payment) return response('Payment not found', 404);

    $status = $notification->transaction_status;
    $fraud = $notification->fraud_status;

    $paymentStatus = match ($status) {
        'capture' => $fraud === 'accept' ? 'paid' : 'pending',
        'settlement' => 'paid',
        'cancel', 'deny', 'expire' => 'failed',
        default => 'pending',
    };

    $payment->update([
        'payment_status' => $paymentStatus,
        'gross_amount' => $notification->gross_amount ?? $payment->gross_amount,
    ]);

    // Jika transaksi gagal/dibatalkan/ditolak/expired, kembalikan stok
if (in_array($paymentStatus, ['failed'])) {
    foreach ($order->orderItems as $item) {
        if ($item->product) {
            $item->product->increment('stock', $item->quantity);
        }
    }

    $order->update(['status' => 'cancelled']);
}


if ($paymentStatus === 'paid') {
    $order->update(['status' => 'processing']);

// Kirim WhatsApp
$order->load('orderItems.product');

$fonnte = new FonnteService();

// Informasi dasar
$invoiceNumber = 'INV-' . now()->format('Ymd') . '-' . $order->id;
$paidAt = Carbon::parse($notification->settlement_time)->format('d M Y, H:i');
$startDate = Carbon::parse($order->start_date)->format('d M Y');
$endDate = Carbon::parse($order->end_date)->format('d M Y');

$va = $notification->va_numbers[0]->va_number ?? '-';
$bank = strtoupper($notification->va_numbers[0]->bank ?? '-');
$gross = 'Rp' . number_format($notification->gross_amount, 0, ',', '.');
$base = 'Rp' . number_format($order->base_price, 0, ',', '.');
$shipping = 'Rp' . number_format($order->shipping_cost, 0, ',', '.');

// Daftar produk detail
$items = collect($order->orderItems)->map(function ($item) {
    $days = Carbon::parse($item->start_date)->diffInDays(Carbon::parse($item->end_date)) + 1;
    $subtotal = $item->total_price;
    return "- {$item->product->name} ({$item->quantity} pcs × {$days} days): Rp" . number_format($subtotal, 0, ',', '.');
})->implode("\n");

// Bangun pesan lengkap
$message = <<<EOM
🧾 *Invoice {$invoiceNumber}*

👤 Name: {$order->name}
📅 Rental Period: {$startDate} - {$endDate}
📦 Items:
{$items}

💵 Base Price: {$base}
🚚 Shipping: {$shipping}
💰 Total Paid: {$gross}

🏦 Bank: {$bank}
🔢 VA: {$va}
✅ Paid At: {$paidAt}

📍 Shipping to:
{$order->shipping_address}

🚚 Estimated Shipping: {$startDate}

Thank you for renting with *Mylodies*. We’ll process your order soon ✨
EOM;

$fonnte->send($order->phone_number, $message);


         // 👇 Buat Invoice Lengkap
    $invoiceNumber = 'INV-' . now()->format('Ymd') . '-' . $order->id;

    $pdf = Pdf::loadView('invoices.pdf', [
        'order' => $order,
        'invoice_number' => $invoiceNumber,
        'midtrans' => [
            'order_id' => $notification->order_id,
            'transaction_id' => $notification->transaction_id,
            'payment_type' => $notification->payment_type,
            'va_number' => $notification->va_numbers[0]->va_number ?? '-',
            'bank' => $notification->va_numbers[0]->bank ?? '-',
            'transaction_time' => $notification->transaction_time,
            'settlement_time' => $notification->settlement_time ?? '-',
            'gross_amount' => $notification->gross_amount,
            'currency' => $notification->currency,
            'status_code' => $notification->status_code,
            'status_message' => $notification->status_message,
        ]
    ]);

    $pdfPath = "invoices/{$invoiceNumber}.pdf";
    Storage::disk('public')->put($pdfPath, $pdf->output());

    $order->update([
        'invoice_number' => $invoiceNumber,
        'invoice_path' => $pdfPath,
    ]);
}

    return response('OK', 200);
}

public function showInvoice(Order $order)
{
    // Cek hak akses
    if ($order->user_id !== auth()->id()) {
        abort(403, 'Unauthorized access to this invoice.');
    }

    // Pastikan invoice sudah ada
    if (!$order->invoice_path || !Storage::disk('public')->exists($order->invoice_path)) {
        return redirect()->back()->with('error', 'Invoice belum tersedia.');
    }

    // Tampilkan inline PDF
    return response()->file(storage_path('app/public/' . $order->invoice_path), [
        'Content-Type' => 'application/pdf',
    ]);
}

}
