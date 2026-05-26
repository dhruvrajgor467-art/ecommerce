@extends('admin.layouts.app')

@section('content')

<div class="flex items-center justify-between mb-6">

    <h1 class="text-2xl font-bold">
        Order #{{ $order->id }}
    </h1>

    <span class="px-3 py-1 rounded text-sm font-medium
        @if($order->status=='pending') bg-yellow-100 text-yellow-700
        @elseif($order->status=='shipped') bg-blue-100 text-blue-700
        @else bg-green-100 text-green-700
        @endif">

        {{ ucfirst($order->status) }}

    </span>

</div>

<!-- TOP GRID -->
<div class="grid lg:grid-cols-3 gap-6">

    <!-- CUSTOMER CARD -->
    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="font-semibold text-lg mb-4">
            Customer Details
        </h2>

        <div class="space-y-2 text-sm text-gray-700">

            <p><span class="font-medium">Name:</span> {{ $order->customer_name }}</p>
            <p><span class="font-medium">Email:</span> {{ $order->email }}</p>
            <p><span class="font-medium">Phone:</span> {{ $order->phone }}</p>

            <div class="pt-2">
                <p class="font-medium">Address:</p>
                <p class="text-gray-600">{{ $order->address }}</p>
            </div>

        </div>

    </div>

    <!-- STATUS UPDATE CARD -->
    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="font-semibold text-lg mb-4">
            Update Status
        </h2>

        <form method="POST" action="{{ route('admin.orders.status',$order->id) }}">

            @csrf

            <select name="status" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-indigo-500">

                <option value="pending" {{ $order->status=='pending'?'selected':'' }}>
                    Pending
                </option>

                <option value="shipped" {{ $order->status=='shipped'?'selected':'' }}>
                    Shipped
                </option>

                <option value="delivered" {{ $order->status=='delivered'?'selected':'' }}>
                    Delivered
                </option>

            </select>

            <button class="mt-4 w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">
                Update Status
            </button>

        </form>

    </div>

    <!-- ORDER SUMMARY -->
    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="font-semibold text-lg mb-4">
            Order Summary
        </h2>

        <div class="space-y-3 text-sm">

            <div class="flex justify-between">
                <span class="text-gray-500">Order Total</span>
                <span class="font-semibold">₹{{ $order->total }}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">Payment Method</span>
                <span class="font-semibold">{{ strtoupper($order->payment_method) }}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">Payment Status</span>
                <span class="font-semibold text-green-600">
                    {{ ucfirst($order->payment_status) }}
                </span>
            </div>

        </div>

    </div>

</div>

<!-- ITEMS TABLE -->
<div class="bg-white rounded-xl shadow mt-6 p-6">

    <h2 class="font-semibold text-lg mb-4">
        Order Items
    </h2>

    <div class="overflow-x-auto">

        <table class="w-full text-sm">

            <thead class="bg-gray-50 text-gray-600">

                <tr>
                    <th class="text-left p-3">Product</th>
                    <th class="text-left p-3">Qty</th>
                    <th class="text-left p-3">Price</th>
                    <th class="text-left p-3">Subtotal</th>
                </tr>

            </thead>

            <tbody>

                @foreach($order->items as $item)

                <tr class="border-t">

                    <td class="p-3 font-medium">
                        {{ $item->product->name }}
                    </td>

                    <td class="p-3">
                        {{ $item->quantity }}
                    </td>

                    <td class="p-3">
                        ₹{{ $item->price }}
                    </td>

                    <td class="p-3 font-semibold">
                        ₹{{ $item->price * $item->quantity }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection