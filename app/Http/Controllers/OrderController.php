<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    private function estimateShippingCost($order)
{
    $baseShippingPricePerKg = 30000;

    return $order->orderItems->sum(function ($item) use ($baseShippingPricePerKg) {
        $totalKg = $item->weight * $item->quantity;
        return ceil($totalKg) * $baseShippingPricePerKg;
    });
}

    // 🧾 Untuk single product (langsung dari halaman produk)
    public function storeSingle(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $startDate = Carbon::createFromFormat('m/d/Y', $request->start_date)->format('Y-m-d');
        $endDate = Carbon::createFromFormat('m/d/Y', $request->end_date)->format('Y-m-d');
        $days = Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate)) + 1;
        $quantity = $request->input('quantity', 1);

        if ($product->stock <= 0) {
    return back()->with('error', 'This product is not available.');
}

if ($quantity > $product->stock) {
    return back()->with('error', 'Jumlah yang Anda pilih melebihi stok tersedia.');
}


        $pricePerDay = $product->rental_price_per_day;
        $itemTotal = $pricePerDay * $days * $quantity;
        if (!empty(Auth::user()->phone_number) && !empty(Auth::user()->identity_card_verified_at)) {
    return redirect()->route('settings.index')
            ->with('warning', 'Please complete your address details first before proceeding with payment.');
}


        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name, // Ambil nama dari user yang login
            'start_date' => $startDate,
            'phone_number' => Auth::user()->phone_number,
            'end_date' => $endDate,
            'total_price' => $itemTotal,
            'status' => 'pending',
            

        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $pricePerDay,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_price' => $itemTotal,
            'weight' => $product->weight,
        ]);

        $order->load('orderItems'); // pastikan relasi termuat

$shippingCost = $this->estimateShippingCost($order);
$order->update([
    'shipping_cost' => $shippingCost,
    'total_price' => $order->total_price + $shippingCost,
]);

$order->load('orderItems');

$basePrice = $order->orderItems->sum('total_price');
$shippingCost = $this->estimateShippingCost($order);
$totalPrice = $basePrice + $shippingCost;

$order->update([
    'base_price' => $basePrice,
    'shipping_cost' => $shippingCost,
    'total_price' => $totalPrice,
]);


        $payment = Payment::create([
            'order_id' => $order->id,
            'payment_status' => 'pending',
        ]);

        $order->load('orderItems.product');

$items = collect($order->orderItems)->map(function ($item) {
    $days = Carbon::parse($item->start_date)->diffInDays(Carbon::parse($item->end_date)) + 1;
    $subtotal = $item->total_price;
    return "- {$item->product->name} ({$item->quantity} pcs × {$days} days): Rp" . number_format($subtotal, 0, ',', '.');
})->implode("\n");

$total = 'Rp' . number_format($order->total_price, 0, ',', '.');
$link = route('payment.show', $payment->code);

$message = <<<EOM
📝 Hi {$order->name}, your rental order has been created!

📦 Items:
{$items}

💰 Total: {$total}

Please complete your payment here:
🔗 {$link}

Thank you for using Mylodies ✨
EOM;

$number = preg_replace('/\D/', '', $order->phone_number);
if (!str_starts_with($number, '62')) {
    $number = '62' . ltrim($number, '0');
}

try {
    Http::timeout(10)->post(config('services.wa_bot.endpoint'), [
        'number'  => $number,
        'message' => $message,
    ]);
} catch (\Throwable $e) {
    \Log::error('❌ Failed to send WhatsApp message via web.js', [
        'error' => $e->getMessage(),
    ]);
}


        return redirect()->route('payment.show', $payment->code);
    }

    // 🛒 Untuk checkout dari cart
    public function storeFromCart()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->with('items.product')->firstOrFail();

        if ($cart->items->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang Anda kosong.');
        }

        foreach ($cart->items as $item) {
    $product = $item->product;

    if (!$product || $product->stock <= 0) {
        return back()->with('error', "Produk '{$item->product->name}' tidak tersedia.");
    }

    if ($item->quantity > $product->stock) {
        return back()->with('error', "Jumlah untuk '{$item->product->name}' melebihi stok tersedia.");
    }
}


        $totalPrice = $cart->items->sum('total_price');
        $startDate = $cart->items->min('start_date');
        $endDate = $cart->items->max('end_date');

        $startDates = $cart->items->pluck('start_date')->unique();
$endDates = $cart->items->pluck('end_date')->unique();

if ($startDates->count() > 1 || $endDates->count() > 1) {
    return back()->with('error', 'Tanggal sewa semua item di keranjang harus sama untuk checkout.');
}

if (empty(Auth::user()->phone_number)) {
    return redirect()->route('settings.index')
            ->with('warning', 'Please complete your address details first before proceeding with payment.');
}



        $order = Order::create([
            'user_id' => $user->id,
            'name' => Auth::user()->name, // ✅
            'phone_number' => Auth::user()->phone_number,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->rental_price_per_day,
                'start_date' => $item->start_date,
                'end_date' => $item->end_date,
                'total_price' => $item->total_price,
                'weight' => $item->product->weight,
            ]);
        }

        $order->load('orderItems');

$shippingCost = $this->estimateShippingCost($order);
$order->update([
    'shipping_cost' => $shippingCost,
    'total_price' => $order->total_price + $shippingCost,
]);

$order->load('orderItems');

$basePrice = $order->orderItems->sum('total_price');
$shippingCost = $this->estimateShippingCost($order);
$totalPrice = $basePrice + $shippingCost;

$order->update([
    'base_price' => $basePrice,
    'shipping_cost' => $shippingCost,
    'total_price' => $totalPrice,
]);


        $payment = Payment::create([
            'order_id' => $order->id,
            'payment_status' => 'pending',
        ]);

        $order->load('orderItems.product');

$items = collect($order->orderItems)->map(function ($item) {
    $days = Carbon::parse($item->start_date)->diffInDays(Carbon::parse($item->end_date)) + 1;
    $subtotal = $item->total_price;
    return "- {$item->product->name} ({$item->quantity} pcs × {$days} days): Rp" . number_format($subtotal, 0, ',', '.');
})->implode("\n");

$total = 'Rp' . number_format($order->total_price, 0, ',', '.');
$link = route('payment.show', $payment->code);

$message = <<<EOM
📝 Hi {$order->name}, your rental order has been created!

📦 Items:
{$items}

💰 Total: {$total}

Please complete your payment here:
🔗 {$link}

Thank you for using Mylodies ✨
EOM;

$number = preg_replace('/\D/', '', $order->phone_number);
if (!str_starts_with($number, '62')) {
    $number = '62' . ltrim($number, '0');
}

try {
    Http::timeout(10)->post(config('services.wa_bot.endpoint'), [
        'number'  => $number,
        'message' => $message,
    ]);
} catch (\Throwable $e) {
    \Log::error('❌ Failed to send WhatsApp message via web.js', [
        'error' => $e->getMessage(),
    ]);
}



        // Kosongkan keranjang
        $cart->items()->delete();

        return redirect()->route('payment.show', $payment->code);
    }
}
