<?php

namespace App\Services\Payment;

use App\Models\Order;
use App\Services\Payment\PaypalService;
use App\Services\Payment\StripeService;

class PaymentService
{
    protected $stripe;
    protected $paypal;

    public function __construct(StripeService $stripe,PaypalService $paypal)
    {
        $this->stripe = $stripe;
        $this->paypal = $paypal;
    }

    public function pay(Order $order)
    {
        switch ($order->payment_method) {

            case 'stripe':
                return $this->stripe->pay($order);

            case 'razorpay':
                // return RazorpayService
                break;

            case 'paypal':
                return $this->paypal->pay($order);

            case 'cod':
                return null;

        }
    }
}