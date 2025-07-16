<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderDetailController extends Controller
{
    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized.');
        }

        $order->load(['orderItems.product', 'payment']);

        return view('pages.order-detail', compact('order'));
    }
}
