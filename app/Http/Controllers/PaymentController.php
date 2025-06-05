<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Transaction;
use Midtrans\Notification;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function show($code)
{
    $payment = Payment::where('code', $code)->firstOrFail();

    $order = $payment->order;

    if ($order->user_id !== auth()->id()) {
        abort(403, 'Unauthorized access to this order.');
    }

    if ($order->status !== 'confirmed' && $payment && $payment->midtrans_order_id) {
        try {
            $status = Transaction::status($payment->midtrans_order_id);

            if ($status->transaction_status === 'settlement' ||
                ($status->transaction_status === 'capture' && $status->fraud_status === 'accept')) {
                $order->update(['status' => 'confirmed']);
                $payment->update(['payment_status' => 'paid']);
            }
        } catch (\Exception $e) {
            \Log::error('Failed to fetch status from Midtrans: ' . $e->getMessage());
        }
    }

    if ($payment->snap_token && $payment->midtrans_order_id) {
        $snapToken = $payment->snap_token;
    } else {
        // Midtrans config
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $midtransOrderId = 'ORDER-' . $order->id . '-' . time();

        $params = [
            'transaction_details' => [
                'order_id' => $midtransOrderId,
                'gross_amount' => $order->total_price,
            ],
            'item_details' => [
                [
                    'id' => $order->product->id,
                    'price' => $order->total_price,
                    'quantity' => 1,
                    'name' => $order->product->name,
                ],
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        $payment->update([
            'midtrans_order_id' => $midtransOrderId,
            'snap_token' => $snapToken,
            'payment_status' => 'pending',
        ]);
    }

    return view('payment', compact('order', 'snapToken'));
}



public function process(Request $request, Order $order)
{
    if ($order->payment) {
        $order->payment->update(['payment_status' => 'paid']);
        $order->update(['status' => 'processing']);
    }

    return redirect()->route('landing')->with('success', 'Payment successful!');
}


public function callback(Request $request)
{
    Config::$serverKey = config('services.midtrans.server_key');
    Config::$isProduction = config('services.midtrans.is_production');
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $notification = new Notification();
    \Log::info('Midtrans callback received', (array) $notification);

    $orderIdRaw = $notification->order_id;
    preg_match('/ORDER-(\d+)-/', $orderIdRaw, $matches);

    if (!isset($matches[1])) {
        return response('Invalid order ID', 400);
    }

    $orderId = $matches[1];
    $order = Order::find($orderId);

    if (!$order) {
        return response('Order not found', 404);
    }

    $payment = $order->payment;
    if (!$payment) {
        return response('Payment not found', 404);
    }

    $transactionStatus = $notification->transaction_status;
    $fraudStatus = $notification->fraud_status;

    $paymentStatusToSet = 'pending';

    if ($transactionStatus == 'capture') {
        if ($fraudStatus == 'challenge') {
            $paymentStatusToSet = 'pending';
        } elseif ($fraudStatus == 'accept') {
            $paymentStatusToSet = 'paid';
        }
    } elseif ($transactionStatus == 'settlement') {
        $paymentStatusToSet = 'paid';
    } elseif (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
        $paymentStatusToSet = 'failed';
    } elseif ($transactionStatus == 'pending') {
        $paymentStatusToSet = 'pending';
    }

    $payment->update(['payment_status' => $paymentStatusToSet]);

        if ($paymentStatusToSet === 'paid') {
        $order->update(['status' => 'processing']);
        }

    return response('OK', 200);
}



}
