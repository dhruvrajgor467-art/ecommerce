<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Payment\PaymentService;

class PaymentController extends Controller
{
    public function pay(Order $order, PaymentService $paymentService)
    {
        $result = $paymentService->pay($order);

        // Stripe returns redirect
        if ($order->payment_method == 'stripe') {
            return redirect($result->url);
        }

        return back();
    }

    public function paypalSuccess(Order $order)
    {
        $order->update([
            'payment_status' => 'paid',
            'status' => 'processing'
        ]);

        session()->forget('cart');

        return redirect()->route('order.success', $order->id);
    }

    public function paypalCancel(Order $order)
    {
        return redirect()
            ->route('checkout')
            ->with('error', 'PayPal payment cancelled');
    }
}