<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function pay(Order $order)
    {
        Stripe::setApiKey(
            config('services.stripe.secret')
        );

        $session = Session::create([

            'payment_method_types' => ['card'],

            'line_items' => [[

                'price_data' => [

                    'currency' => 'inr',

                    'product_data' => [

                        'name' => 'Order #'.$order->id,

                    ],

                    'unit_amount' =>
                    $order->total * 100,

                ],

                'quantity' => 1,

            ]],

            'mode' => 'payment',

            'success_url' =>
            route(
                'stripe.success',
                $order->id
            ),

            'cancel_url' =>
            route(
                'stripe.cancel',
                $order->id
            ),
        ]);

        return redirect(
            $session->url
        );
    }

    public function success(Order $order)
    {
        $order->update([

            'payment_status'=>'paid',
            'status'=>'processing'

        ]);

        session()->forget('cart');

        return redirect()->route(
            'order.success',
            $order->id
        );
    }

    public function cancel(Order $order)
    {
        return redirect()
            ->route('checkout')
            ->with(
                'error',
                'Payment cancelled'
            );
    }
}