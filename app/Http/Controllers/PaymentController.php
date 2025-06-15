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

class PaymentController extends Controller
{
    public function show($code)
    {
        $payment = Payment::where('code', $code)->firstOrFail();
        $order = $payment->order;

        // Pastikan user hanya bisa akses miliknya sendiri
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access to this order.');
        }

        // Update status pembayaran dari Midtrans jika belum confirmed
        if ($order->status !== 'confirmed' && $payment->midtrans_order_id) {
            $this->updateOrderStatusFromMidtrans($payment, $order);
        }

        // Gunakan snap_token yang sudah ada jika tersedia, supaya tidak generate ulang
        if ($payment->snap_token && $payment->midtrans_order_id) {
            $snapToken = $payment->snap_token;
        } else {
            $snapToken = $this->generateSnapToken($order, $payment);
        }

        return view('payment', compact('order', 'snapToken'));
    }

    // Buat method khusus untuk update status dari Midtrans
    protected function updateOrderStatusFromMidtrans(Payment $payment, Order $order)
    {
        try {
            $status = Transaction::status($payment->midtrans_order_id);

            if (
                $status->transaction_status === 'settlement' ||
                ($status->transaction_status === 'capture' && $status->fraud_status === 'accept')
            ) {
                $order->update(['status' => 'confirmed']);
                $payment->update(['payment_status' => 'paid']);
            } elseif (in_array($status->transaction_status, ['cancel', 'deny', 'expire'])) {
                $payment->update(['payment_status' => 'failed']);
            }
            // Bisa tambah kondisi lain sesuai kebutuhan
        } catch (\Exception $e) {
            Log::error('Failed to fetch status from Midtrans: ' . $e->getMessage());
        }
    }

    // Buat method khusus generate snap token
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

        // Harga per unit selama durasi hari
        $pricePerUnitWithDuration = (int) round($item->price * $days);

        $itemDetails[] = [
            'id' => (string) $item->product_id,
            'price' => $pricePerUnitWithDuration,
            'quantity' => $item->quantity,
            'name' => ($item->product->name ?? 'Product') . " ({$days} hari)",
        ];
    }

    $params = [
        'transaction_details' => [
            'order_id' => $midtransOrderId,
            'gross_amount' => $totalOrderPrice,
        ],
        'item_details' => $itemDetails,
        'customer_details' => [
            'first_name' => auth()->user()->name,
            'email' => auth()->user()->email,
        ],
    ];

    $snapToken = Snap::getSnapToken($params);

    $payment->update([
        'midtrans_order_id' => $midtransOrderId,
        'snap_token' => $snapToken,
        'payment_status' => 'pending',
        'gross_amount' => $totalOrderPrice, // Simpan estimasi awal
    ]);

    return $snapToken;
}




    public function process(Request $request, Order $order)
{
    if ($order->payment) {
        $order->payment->update(['payment_status' => 'paid']);
        $order->update(['status' => 'processing']);
    }

    // Redirect dinamis berdasarkan query parameter
    if ($request->query('redirect_to') === 'order_detail') {
        return redirect()->route('order.detail', $order->id)
                         ->with('success', 'Pembayaran berhasil!');
    }

    // Default fallback
    return redirect()->route('landing')->with('success', 'Payment successful!');
}


    public function callback(Request $request)
{
    Config::$serverKey = config('services.midtrans.server_key');
    Config::$isProduction = config('services.midtrans.is_production');
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $notification = new Notification();
    Log::info('Midtrans callback received', (array) $notification);

    $orderIdRaw = $notification->order_id;
    preg_match('/ORDER-(\d+)-/', $orderIdRaw, $matches);

    if (!isset($matches[1])) {
        return response('Invalid order ID', 400);
    }

    $orderId = $matches[1];
    $order = Order::find($orderId);

    if (!$order) {
        return response('Order not found', 404);
    }

    $payment = $order->payment;
    if (!$payment) {
        return response('Payment not found', 404);
    }

    // Update status payment
    $transactionStatus = $notification->transaction_status;
    $fraudStatus = $notification->fraud_status;

    $paymentStatusToSet = match ($transactionStatus) {
        'capture' => $fraudStatus === 'accept' ? 'paid' : 'pending',
        'settlement' => 'paid',
        'cancel', 'deny', 'expire' => 'failed',
        'pending' => 'pending',
        default => 'pending',
    };

    $grossAmount = $notification->gross_amount;

    // Update payment status & gross_amount jika berbeda
    $payment->update([
        'payment_status' => $paymentStatusToSet,
        'gross_amount' => $grossAmount !== $payment->gross_amount ? $grossAmount : $payment->gross_amount,
    ]);

    // Update status order jika payment berhasil
    if ($paymentStatusToSet === 'paid') {
        $order->update(['status' => 'processing']);
    }

    return response('OK', 200);
}

}
