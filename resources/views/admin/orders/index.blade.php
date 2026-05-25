@extends('admin.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Orders</h1>

<div class="bg-white shadow rounded">

    <table class="w-full text-left">

        <thead class="bg-gray-100">

            <tr>
                <th class="p-3">Order ID</th>
                <th class="p-3">Customer</th>
                <th class="p-3">Email</th>
                <th class="p-3">Total</th>
                <th class="p-3">Status</th>
                <th class="p-3">Action</th>
            </tr>

        </thead>

        <tbody>

            @foreach($orders as $order)

            <tr class="border-t">

                <td class="p-3">#{{ $order->id }}</td>

                <td class="p-3">{{ $order->customer_name }}</td>

                <td class="p-3">{{ $order->email }}</td>

                <td class="p-3">₹{{ $order->total }}</td>

                <td class="p-3">

                    <span class="px-2 py-1 rounded text-white text-sm
@if($order->status=='pending') bg-yellow-500
@elseif($order->status=='shipped') bg-blue-500
@else bg-green-600
@endif
">
                        {{ ucfirst($order->status) }}
                    </span>

                </td>

                <td class="p-3">

                    <a href="{{ route('admin.orders.show',$order->id) }}" class="text-blue-600">
                        View
                    </a>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection