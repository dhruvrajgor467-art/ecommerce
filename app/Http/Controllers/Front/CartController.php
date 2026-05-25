<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view(
            'frontend.cart.index',
            compact('cart')
        );
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])){

            $cart[$id]['quantity']++;

        } else {

            $cart[$id]=[

                'id'=>$product->id,
                'name'=>$product->name,
                'price'=>$product->price,
                'image'=>$product->image,
                'quantity'=>1

            ];
        }

        session()->put('cart',$cart);

        return redirect()
            ->back()
            ->with('success','Product added');
    }

    public function update(Request $request,$id)
    {
        $cart=session()->get('cart');

        if(isset($cart[$id])){

            $cart[$id]['quantity']=$request->quantity;

            session()->put('cart',$cart);
        }

        return back();
    }

    public function remove($id)
    {
        $cart=session()->get('cart');

        unset($cart[$id]);

        session()->put('cart',$cart);

        return back();
    }
}