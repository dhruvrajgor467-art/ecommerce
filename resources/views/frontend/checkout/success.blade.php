@extends('frontend.layouts.app')

@section('title','Order Success')

@section('content')

<div class="max-w-3xl mx-auto text-center py-20">

    <div class="bg-white p-10 rounded shadow">

        <h1 class="text-3xl font-bold text-green-600">
            🎉 Order Placed Successfully
        </h1>

        <p class="mt-4 text-gray-600">
            Your order ID is
            <span class="font-bold">#{{ $id }}</span>
        </p>

        <p class="mt-2 text-gray-500">
            We will process your order soon.
        </p>

        <a href="{{ route('home') }}" class="mt-6 inline-block bg-indigo-600 text-white px-6 py-3 rounded">
            Continue Shopping
        </a>

    </div>

</div>

@endsection