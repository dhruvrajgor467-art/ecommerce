@extends('admin.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Add Product</h1>

<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data"
    class="bg-white p-6 rounded shadow space-y-4">

    @csrf

    <select name="category_id" class="w-full border p-2">
        <option value="">Select Category</option>

        @foreach($categories as $category)
        <option value="{{ $category->id }}">
            {{ $category->name }}
        </option>
        @endforeach

    </select>

    <input type="text" name="name" placeholder="Product Name" class="w-full border p-2">

    <textarea name="description" placeholder="Description" class="w-full border p-2"></textarea>

    <input type="number" name="price" placeholder="Price" class="w-full border p-2">

    <input type="number" name="stock" placeholder="Stock" class="w-full border p-2">

    <input type="file" name="image" class="w-full border p-2">

    <button class="bg-indigo-600 text-white px-4 py-2 rounded">
        Save Product
    </button>

</form>

@endsection