<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('home')
                ->with('error', 'Your cart is empty');
        }

        return view('frontend.checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'payment_method'=>'required'
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('home')
                ->with('error', 'Cart is empty');
        }
        DB::beginTransaction();

        try {

            $total = 0;

            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            // Create Order
            $order = Order::create([
                'user_id' => auth()->id(),
                'customer_name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'total' => $total,
                'status' => 'pending',
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
            ]);

            // Create Order Items
            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
            }

            /*
            COD flow
            */

            if($request->payment_method=='cod')
            {
                session()->forget('cart');

                DB::commit();

                return redirect()->route(
                    'order.success',
                    $order->id
                );
            }

            if($request->payment_method=='stripe')
            {
                DB::commit();
                return redirect()->route('payment.pay', $order->id);
            }

            if($request->payment_method=='paypal')
            {
                DB::commit();

                $response = app(
                    \App\Services\Payment\PaymentService::class
                )->pay($order);

                return redirect(
                    $response['links'][1]['href']
                );
            }

            /*
            Future:
            Stripe
            Razorpay
            Paypal
            */

            DB::commit();

            return back();
        }
        catch(\Exception $e)
        {
            DB::rollback();

            return back()
            ->with(
                'error',
                $e->getMessage()
            );
        }

    }
    
}