@extends('admin.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Order #{{ $order->id }}
</h1>

<div class="grid md:grid-cols-2 gap-6">

    <!-- Customer Info -->
    <div class="bg-white p-6 rounded shadow">

        <h2 class="font-bold mb-3">Customer Details</h2>

        <p><b>Name:</b> {{ $order->customer_name }}</p>
        <p><b>Email:</b> {{ $order->email }}</p>
        <p><b>Phone:</b> {{ $order->phone }}</p>
        <p><b>Address:</b> {{ $order->address }}</p>

    </div>

    <!-- Status Update -->
    <div class="bg-white p-6 rounded shadow">

        <h2 class="font-bold mb-3">Update Status</h2>

        <form method="POST" action="{{ route('admin.orders.status',$order->id) }}">

            @csrf

            <select name="status" class="w-full border p-2">

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

            <button class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded">
                Update
            </button>

        </form>

    </div>

</div>

<!-- Order Items -->
<div class="bg-white p-6 rounded shadow mt-6">

    <h2 class="font-bold mb-4">Order Items</h2>

    <table class="w-full">

        <thead>

            <tr>
                <th class="text-left p-2">Product</th>
                <th class="text-left p-2">Qty</th>
                <th class="text-left p-2">Price</th>
            </tr>

        </thead>

        <tbody>

            @foreach($order->items as $item)

            <tr class="border-t">

                <td class="p-2">
                    {{ $item->product->name }}
                </td>

                <td class="p-2">
                    {{ $item->quantity }}
                </td>

                <td class="p-2">
                    ₹{{ $item->price }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection