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
    return back()->with('error', 'Produk ini sudah tidak tersedia.');
}

if ($quantity > $product->stock) {
    return back()->with('error', 'Jumlah yang Anda pilih melebihi stok tersedia.');
}


        $pricePerDay = $product->rental_price_per_day;
        $itemTotal = $pricePerDay * $days * $quantity;

        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name, // Ambil nama dari user yang login
            'start_date' => $startDate,
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

        $order = Order::create([
            'user_id' => $user->id,
            'name' => Auth::user()->name, // ✅
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

        // Kosongkan keranjang
        $cart->items()->delete();

        return redirect()->route('payment.show', $payment->code);
    }
}
