<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
{
    $cart = Cart::with('items.product')->where('user_id', Auth::id())->first();
    $cartItems = $cart ? $cart->items : collect();
    return view('pages.cart', compact('cartItems'));
}


public function store(Request $request, $productId)
{
    $request->validate([
        'start_date' => 'required',
        'end_date' => 'required',
    ]);

    $start = Carbon::createFromFormat('m/d/Y', $request->start_date)->format('Y-m-d');
    $end = Carbon::createFromFormat('m/d/Y', $request->end_date)->format('Y-m-d');
    $days = Carbon::parse($start)->diffInDays(Carbon::parse($end)) + 1;

    $product = Product::findOrFail($productId);
    $pricePerUnit = $days * $product->rental_price_per_day;

    // Ambil cart milik user
    $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

    // Cek apakah item ini sudah ada
    $existingItem = $cart->items()->where('product_id', $productId)
        ->where('start_date', $start)
        ->where('end_date', $end)
        ->first();

    if ($existingItem) {
        $existingItem->quantity += 1;
        $existingItem->total_price = $pricePerUnit * $existingItem->quantity;
        $existingItem->save();
    } else {
        $cart->items()->create([
            'product_id' => $productId,
            'start_date' => $start,
            'end_date' => $end,
            'quantity' => 1,
            'total_price' => $pricePerUnit,
        ]);
    }

    return redirect()->route('cart.index')->with('success', 'Item added to cart!');
}



public function destroy($id)
{
    $item = \App\Models\CartItem::findOrFail($id);

    if ($item->cart->user_id === Auth::id()) {
        $item->delete();
    }

    return back();
}


    public function updateQuantity(Request $request, $id)
{
    $item = \App\Models\CartItem::findOrFail($id);

    if ($item->cart->user_id === Auth::id()) {
        if ($request->quantity <= 0) {
            $item->delete();
        } else {
            $item->quantity = $request->quantity;
        $days = Carbon::parse($item->start_date)->diffInDays(Carbon::parse($item->end_date)) + 1;
        $item->total_price = $item->product->rental_price_per_day * $days * $request->quantity;
        $item->save();
        }
        
    }

    return back();
}

}
