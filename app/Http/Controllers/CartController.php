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
        return view('cart');
    }
}
