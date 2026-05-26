@extends('admin.layouts.app')

@section('content')

<div class="flex items-center justify-between mb-6">

    <div>
        <h1 class="text-2xl font-bold text-gray-800">Orders</h1>
        <p class="text-sm text-gray-500">Manage all customer orders</p>
    </div>

</div>

<div class="bg-white shadow-sm rounded-xl overflow-hidden">

    <div class="overflow-x-auto">

        <table class="min-w-full text-sm">

            <thead class="bg-gray-50 border-b">

                <tr class="text-left text-gray-600 uppercase text-xs tracking-wider">

                    <th class="p-4">Order</th>
                    <th class="p-4">Customer</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Total</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Action</th>

                </tr>

            </thead>

            <tbody class="divide-y">

                @forelse($orders as $order)

                <tr class="hover:bg-gray-50 transition">

                    <td class="p-4 font-medium text-gray-700">
                        #{{ $order->id }}
                    </td>

                    <td class="p-4">
                        <div class="font-medium text-gray-800">
                            {{ $order->customer_name }}
                        </div>
                    </td>

                    <td class="p-4 text-gray-500">
                        {{ $order->email }}
                    </td>

                    <td class="p-4 font-semibold text-gray-800">
                        ₹{{ number_format($order->total, 2) }}
                    </td>

                    <td class="p-4">

                        @php
                        $statusColors = [
                        'pending' => 'bg-yellow-100 text-yellow-700',
                        'shipped' => 'bg-blue-100 text-blue-700',
                        'delivered' => 'bg-green-100 text-green-700',
                        'cancelled' => 'bg-red-100 text-red-700',
                        ];
                        @endphp

                        <span class="px-3 py-1 rounded-full text-xs font-medium
                            {{ $statusColors[$order->status] ?? 'bg-gray-100 text-gray-600' }}">

                            {{ ucfirst($order->status) }}

                        </span>

                    </td>

                    <td class="p-4 text-right">

                        <a href="{{ route('admin.orders.show', $order->id) }}"
                            class="inline-block px-3 py-1 text-sm bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">

                            View

                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="p-10 text-center text-gray-500">

                        No orders found

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection