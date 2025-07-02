<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductReview;


class ProductController extends Controller
{
    public function index()
{
    $products = Product::where('stock', '>', 0)->latest()->paginate(6);// atau ->paginate(9)
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


public function catalog(Request $request)
{
    $category = $request->input('category');

    $products = Product::where('stock', '>', 0)
        ->when($category, function ($q) use ($category) {
            $q->where('category', $category);
        })
        ->latest()
        ->paginate(12)
        ->appends(['category' => $category]);

    return view('catalog', compact('products', 'category'));
}


public function search(Request $request)
{
    $query = $request->input('q');
    $category = $request->input('category');
    $rating = $request->input('rating');
    $min = $request->input('min');
    $max = $request->input('max');

    $products = Product::where('stock', '>', 0)
        ->when($query, function ($q) use ($query) {
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
->when($request->rating, function ($q) use ($request) {
    $rating = (float) $request->rating;

    $q->whereHas('reviews', function ($qr) use ($rating) {
        $qr->whereBetween('rating', [$rating, $rating + 0.49]);
    });
})

        ->when($min, function ($q) use ($min) {
            $q->where('price', '>=', $min);
        })
        ->when($max, function ($q) use ($max) {
            $q->where('price', '<=', $max);
        })
        ->latest()
        ->paginate(15)
        ->appends($request->only(['q', 'category', 'rating', 'min', 'max']));

    return view('search', compact(
        'products',
        'query',
        'category',
        'rating',
        'min',
        'max'
    ));
}



}

