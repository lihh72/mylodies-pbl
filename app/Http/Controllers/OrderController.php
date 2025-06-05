<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Payment;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function store(Request $request, $productId)
{
    $product = Product::findOrFail($productId);

    $request->validate([
        'start_date' => 'required',
        'end_date' => 'required',
    ]);

    $startDate = Carbon::createFromFormat('m/d/Y', $request->start_date)->format('Y-m-d');
    $endDate = Carbon::createFromFormat('m/d/Y', $request->end_date)->format('Y-m-d');

    $days = Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate)) + 1;
    $totalPrice = $product->rental_price_per_day * $days;

    $order = Order::create([
        'user_id' => Auth::id(),
        'product_id' => $product->id,
        'start_date' => $startDate,
        'end_date' => $endDate,
        'total_price' => $totalPrice,
        'status' => 'pending',
    ]);

    // Tambahkan pembuatan Payment
    $payment = Payment::create([
        'order_id' => $order->id,
        'payment_status' => 'pending',
        // kode acak akan otomatis terisi jika diatur di model
    ]);

    return redirect()->route('payment.show', $payment->code);
}

}
