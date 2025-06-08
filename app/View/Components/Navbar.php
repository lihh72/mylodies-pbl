<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
class Navbar extends Component
{
    public $cartCount;

 public function __construct()
{
    $this->cartCount = 0;

    if (Auth::check()) {
        // Ambil cart milik user
        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart) {
            // Hitung jumlah item di cart_items
            $this->cartCount = CartItem::where('cart_id', $cart->id)->count();
        }
    }
}

    public function render()
    {
        return view('components.navbar');
    }
}

