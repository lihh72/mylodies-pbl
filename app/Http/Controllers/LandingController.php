<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class LandingController extends Controller
{
    public function index()
{
    $products = Product::latest()->get(); // atau ->paginate(9)
    return view('landing', compact('products'));
}
}
