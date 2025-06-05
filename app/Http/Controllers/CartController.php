<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $carts = Cart::with('product')->where('user_id', $user->id)->get();

        return view('cart', compact('carts'));
    }

    public function store(Request $request, $productId)
    {
        $user = Auth::user();
        $product = Product::findOrFail($productId);

        $request->validate([
            'start_date' => 'required|date_format:m/d/Y',
            'end_date' => 'required|date_format:m/d/Y|after_or_equal:start_date',
        ]);

        $startDate = Carbon::createFromFormat('m/d/Y', $request->start_date)->format('Y-m-d');
        $endDate = Carbon::createFromFormat('m/d/Y', $request->end_date)->format('Y-m-d');

        // Cek apakah produk sudah ada di cart user yang sama
        $existingCart = Cart::where('user_id', $user->id)
                            ->where('product_id', $product->id)
                            ->first();

        if ($existingCart) {
            // Update tanggal jika sudah ada
            $existingCart->start_date = $startDate;
            $existingCart->end_date = $endDate;
            $existingCart->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);
        }

        return redirect()->route('cart')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function destroy($cartId)
    {
        $cart = Cart::findOrFail($cartId);
        $this->authorize('delete', $cart); // pastikan user punya akses

        $cart->delete();

        return redirect()->route('cart')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}
