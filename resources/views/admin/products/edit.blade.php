@extends('admin.layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <h1 class="text-2xl font-bold mb-6">
        Edit Product
    </h1>

    <form method="POST" action="{{ route('admin.products.update',$product->id) }}" enctype="multipart/form-data"
        class="bg-white shadow-lg rounded-xl p-6 space-y-6">

        @csrf
        @method('PUT')

        <!-- GRID LAYOUT -->
        <div class="grid md:grid-cols-2 gap-6">

            <!-- LEFT SIDE -->
            <div class="space-y-4">

                <!-- Category -->
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Category
                    </label>

                    <select name="category_id" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500">

                        @foreach($categories as $category)

                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                        @endforeach

                    </select>
                </div>

                <!-- Product Name -->
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Product Name
                    </label>

                    <input type="text" name="name" value="{{ $product->name }}"
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Price -->
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Price
                    </label>

                    <input type="number" name="price" value="{{ $product->price }}"
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Stock -->
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Stock
                    </label>

                    <input type="number" name="stock" value="{{ $product->stock }}"
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500">
                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="space-y-4">

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Description
                    </label>

                    <textarea name="description" rows="10"
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500">{{ $product->description }}</textarea>
                </div>

            </div>

        </div>

        <!-- IMAGE SECTION -->
        <div class="border-t pt-6">

            <label class="block text-sm font-medium mb-2">
                Product Image
            </label>

            <div class="flex items-center gap-6">

                @if($product->image)

                <img src="{{ asset($product->image) }}" class="w-24 h-24 object-cover rounded-lg border">

                @endif

                <input type="file" name="image" class="border p-2 rounded-lg w-full">

            </div>

        </div>

        <!-- BUTTONS -->
        <div class="flex justify-end gap-3 pt-6 border-t">

            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 border rounded-lg hover:bg-gray-100">

                Cancel

            </a>

            <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">

                Update Product

            </button>

        </div>

    </form>

</div>

@endsection