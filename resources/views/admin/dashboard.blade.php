@extends('admin.layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-500">Total Products</h2>
        <p class="text-2xl font-bold">0</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-500">Total Orders</h2>
        <p class="text-2xl font-bold">0</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-500">Revenue</h2>
        <p class="text-2xl font-bold">₹0</p>
    </div>

</div>

@endsection