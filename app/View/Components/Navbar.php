<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class Navbar extends Component
{
    public $cartCount;

    public function __construct()
    {
        $this->cartCount = 0;

       if (Auth::check()) {
    // Hitung jumlah item unik di cart, bukan jumlah total quantity
    $this->cartCount = Cart::where('user_id', Auth::id())->count();
}

    }

    public function render()
    {
        return view('components.navbar');
    }
}

