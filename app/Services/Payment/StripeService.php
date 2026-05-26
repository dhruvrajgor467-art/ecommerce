<?php

namespace App\Services\Payment;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Order;

class StripeService
{
    public function pay(Order $order)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        return Session::create([

            'payment_method_types' => ['card'],

            'line_items' => [[

                'price_data' => [

                    'currency' => 'inr',

                    'product_data' => [
                        'name' => 'Order #'.$order->id,
                    ],

                    'unit_amount' => $order->total * 100,

                ],

                'quantity' => 1,
            ]],

            'mode' => 'payment',

            'success_url' => route('stripe.success', $order->id),

            'cancel_url' => route('stripe.cancel', $order->id),

        ]);
    }
}