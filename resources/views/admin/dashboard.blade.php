@extends('admin.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Dashboard</h1>

    <span class="text-sm text-gray-500">
        Welcome back 👋
    </span>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white p-6 rounded-xl shadow">
        <h2 class="text-sm opacity-80">Total Products</h2>
        <p class="text-3xl font-bold mt-2">{{ $totalProducts }}</p>
    </div>

    <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white p-6 rounded-xl shadow">
        <h2 class="text-sm opacity-80">Total Orders</h2>
        <p class="text-3xl font-bold mt-2">{{ $totalOrders }}</p>
    </div>

    <div class="bg-gradient-to-r from-amber-500 to-orange-500 text-white p-6 rounded-xl shadow">
        <h2 class="text-sm opacity-80">Revenue</h2>
        <p class="text-3xl font-bold mt-2">₹{{ $revenue }}</p>
    </div>

</div>

<!-- Latest Orders -->
<div class="bg-white rounded-xl shadow p-6">

    <h2 class="text-lg font-semibold mb-4">Recent Orders</h2>

    <table class="w-full text-sm">

        <thead class="text-left text-gray-500 border-b">
            <tr>
                <th class="py-2">Order ID</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @foreach($latestOrders as $order)

            <tr class="border-b">
                <td class="py-2">#{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>₹{{ $order->total }}</td>
                <td>
                    <span class="px-2 py-1 text-xs rounded
                        @if($order->status=='pending') bg-yellow-100 text-yellow-700
                        @elseif($order->status=='processing') bg-blue-100 text-blue-700
                        @else bg-green-100 text-green-700
                        @endif
                    ">
                        {{ ucfirst($order->status) }}
                    </span>
                </td>
            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection