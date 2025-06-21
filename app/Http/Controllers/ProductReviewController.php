<?php

// app/Http/Controllers/ProductReviewController.php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function create(OrderItem $order_item)
    {


        return view('reviews.create', compact('order_item'));
    }

    public function store(Request $request, OrderItem $order_item)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        ProductReview::create([
            'user_id'       => Auth::id(),
            'product_id'    => $order_item->product_id,
            'order_id'      => $order_item->order_id,
            'order_item_id' => $order_item->id,
            'rating'        => $request->rating,
            'comment'       => $request->comment,
        ]);

        return redirect()->route('history.index')->with('success', 'Ulasan berhasil dikirim.');
    }
}
