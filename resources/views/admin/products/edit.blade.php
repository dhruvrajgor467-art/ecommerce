@extends('admin.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Edit Product</h1>

<form method="POST" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data"
    class="bg-white p-6 rounded shadow space-y-4">

    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $product->name }}" class="w-full border p-2">

    <textarea name="description" class="w-full border p-2">{{ $product->description }}</textarea>

    <input type="number" name="price" value="{{ $product->price }}" class="w-full border p-2">

    <input type="number" name="stock" value="{{ $product->stock }}" class="w-full border p-2">

    @if($product->image)
    <img src="{{ asset($product->image) }}" class="w-20 mb-2">
    @endif

    <input type="file" name="image" class="w-full border p-2">

    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Update Product
    </button>

</form>

@endsection