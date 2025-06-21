<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
{
    $products = Product::latest()->paginate(6); // atau ->paginate(9)
    return view('landing', compact('products'));
}

public function show($slug)
{
    $product = Product::where('slug', $slug)->firstOrFail();
    $minDate = now()->addDays(3)->format('m/d/Y');

    // Tambahan untuk review
    $reviews = $product->reviews()->with('user')->latest()->take(10)->get(); // bisa ganti take() sesuai kebutuhan
    $averageRating = number_format($product->reviews()->avg('rating') ?? 0, 1);
    $totalReviews = $product->reviews()->count();

    return view('product', compact('product', 'minDate', 'reviews', 'averageRating', 'totalReviews'));
}


    public function catalog()
{
    $products = Product::latest()->paginate(15); // atau ->paginate(9)
    return view('catalog', compact('products'));
}

public function search(Request $request)
{
    $query = $request->input('q');
    $category = $request->input('category');

    $products = Product::when($query, function ($q) use ($query) {
        $keywords = explode(' ', $query);
        $q->where(function ($subQuery) use ($keywords) {
            foreach ($keywords as $word) {
                $subQuery->orWhere('name', 'like', '%' . $word . '%')
                         ->orWhere('category', 'like', '%' . $word . '%');
            }
        });
    })
    ->when($category, function ($q) use ($category) {
        $q->where('category', $category);
    })
    ->latest()
    ->paginate(15)
    ->appends(['q' => $query, 'category' => $category]); // untuk menjaga query saat paginasi

    return view('search', compact('products', 'query', 'category'));
}



}

