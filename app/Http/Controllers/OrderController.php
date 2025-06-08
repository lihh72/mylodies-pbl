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

        $pricePerDay = $product->rental_price_per_day;
        $itemTotal = $pricePerDay * $days * $quantity;

        $order = Order::create([
            'user_id' => Auth::id(),
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

        $totalPrice = $cart->items->sum('total_price');
        $startDate = $cart->items->min('start_date');
        $endDate = $cart->items->max('end_date');

        $order = Order::create([
            'user_id' => $user->id,
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
            ]);
        }

        $payment = Payment::create([
            'order_id' => $order->id,
            'payment_status' => 'pending',
        ]);

        // Kosongkan keranjang
        $cart->items()->delete();

        return redirect()->route('payment.show', $payment->code);
    }
}
