@extends('frontend.layouts.app')

@section('title','Cart')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    <h1 class="text-3xl font-bold mb-6">
        Shopping Cart
    </h1>

    @if(count($cart)>0)

    <div class="bg-white rounded shadow">

        @php
        $total=0;
        @endphp

        @foreach($cart as $item)

        @php
        $total += $item['price']*$item['quantity'];
        @endphp

        <div class="border-b p-5 flex justify-between items-center">

            <div class="flex gap-4">

                <img src="{{ asset($item['image'] ?? 'https://via.placeholder.com/80') }}"
                    class="w-20 h-20 rounded object-cover">

                <div>

                    <h3 class="font-semibold">
                        {{ $item['name'] }}
                    </h3>

                    <p>
                        ₹{{ $item['price'] }}
                    </p>

                </div>

            </div>

            <div class="flex gap-4 items-center">

                <form action="{{ route('cart.update',$item['id']) }}" method="POST">

                    @csrf

                    <input type="number" name="quantity" min="1" value="{{ $item['quantity'] }}"
                        class="w-20 border rounded p-2">

                    <button class="bg-gray-800 text-white px-3 py-2 rounded">
                        Update
                    </button>

                </form>

                <form action="{{ route('cart.remove',$item['id']) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button class="text-red-500">
                        Remove
                    </button>

                </form>

            </div>

        </div>

        @endforeach

        <div class="p-6 text-right">

            <h2 class="text-2xl font-bold">
                Total: ₹{{ $total }}
            </h2>

            <button class="mt-4 bg-indigo-600 text-white px-6 py-3 rounded">

                Proceed To Checkout

            </button>

        </div>

    </div>

    @else

    <div class="bg-white p-10 rounded shadow text-center">

        Your cart is empty

    </div>

    @endif

</div>

@endsection