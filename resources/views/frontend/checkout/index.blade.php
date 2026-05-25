@extends('frontend.layouts.app')

@section('title','Checkout')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    <h1 class="text-3xl font-bold mb-8">Checkout</h1>

    <div class="grid md:grid-cols-2 gap-10">

        <!-- Billing Form -->
        <form action="{{ route('checkout.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">

            @csrf

            <h2 class="text-xl font-semibold mb-4">Billing Details</h2>

            <input type="text" name="name" placeholder="Full Name" class="w-full border p-3 rounded" required>

            <input type="email" name="email" placeholder="Email" class="w-full border p-3 rounded" required>

            <input type="text" name="phone" placeholder="Phone" class="w-full border p-3 rounded" required>

            <textarea name="address" placeholder="Full Address" class="w-full border p-3 rounded" required></textarea>

            <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded hover:bg-indigo-700">

                Place Order

            </button>

        </form>

        <!-- Order Summary -->
        <div class="bg-white p-6 rounded shadow">

            <h2 class="text-xl font-semibold mb-4">Order Summary</h2>

            @php $total = 0; @endphp

            @foreach($cart as $item)

            @php
            $total += $item['price'] * $item['quantity'];
            @endphp

            <div class="flex justify-between py-2 border-b">

                <div>
                    <p class="font-medium">{{ $item['name'] }}</p>
                    <p class="text-sm text-gray-500">
                        Qty: {{ $item['quantity'] }}
                    </p>
                </div>

                <p>₹{{ $item['price'] * $item['quantity'] }}</p>

            </div>

            @endforeach

            <div class="mt-4 text-right">

                <p class="text-lg font-bold">
                    Total: ₹{{ $total }}
                </p>

            </div>

        </div>

    </div>

</div>

@endsection