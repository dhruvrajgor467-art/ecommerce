@extends('frontend.layouts.app')

@section('title','Order Success')

@section('content')

<div class="max-w-3xl mx-auto text-center py-20">

    <div class="bg-white p-10 rounded shadow">

        <h1 class="text-3xl font-bold text-green-600">
            Order Confirmed
        </h1>

        <p class="mt-4">

            Order ID:

            <strong>
                #{{ $id }}
            </strong>

        </p>

        <p class="mt-4 text-gray-500">

            Payment Method:
            Cash On Delivery

        </p>

        <p class="text-gray-500 mt-2">

            Your order has been placed successfully.

        </p>

        <a href="{{ route('home') }}" class="mt-6 inline-block bg-indigo-600 text-white px-6 py-3 rounded">

            Continue Shopping

        </a>

    </div>

</div>

@endsection