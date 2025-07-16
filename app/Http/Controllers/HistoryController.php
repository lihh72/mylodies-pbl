<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $orders = Order::with(['orderItems.product'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $validStatuses = ['pending', 'confirmed', 'processing', 'shipped', 'completed', 'cancelled'];
        $groupedOrders = collect($orders)->groupBy(function ($order) use ($validStatuses) {
            $status = strtolower($order->status ?? 'pending');
            return in_array($status, $validStatuses) ? $status : 'pending';
        });

        return view('pages.history', [
            'groupedHistories' => $groupedOrders,
        ]);
    }
}
