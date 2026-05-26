<?php

namespace App\Services\Payment;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Order;

class PaypalService
{
    public function pay(Order $order)
    {
        $provider = new PayPalClient;

        $provider->setApiCredentials(config('paypal'));

        $provider->getAccessToken();

        $response = $provider->createOrder([

            "intent" => "CAPTURE",

            "purchase_units" => [[

                "amount" => [

                    "currency_code" => "USD",

                    "value" => $order->total

                ]

            ]],

            "application_context" => [

                "return_url" => route('paypal.success', $order->id),

                "cancel_url" => route('paypal.cancel', $order->id)

            ]

        ]);

        return $response;
    }
}