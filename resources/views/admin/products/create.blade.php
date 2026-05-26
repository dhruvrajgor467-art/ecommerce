@extends('admin.layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Add Product
            </h1>

            <p class="text-gray-500 mt-1">
                Create and publish a new product
            </p>
        </div>

        <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">

            Back to Products

        </a>

    </div>


    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">

        @csrf

        <div class="grid lg:grid-cols-3 gap-6">

            <!-- LEFT -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Product Info -->
                <div class="bg-white rounded-2xl shadow-sm p-6">

                    <h2 class="font-semibold text-lg mb-5">
                        Product Information
                    </h2>

                    <div class="space-y-5">

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Product Name
                            </label>

                            <input type="text" name="name" value="{{ old('name') }}"
                                class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="iPhone 16 Pro">

                            @error('name')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>


                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Description
                            </label>

                            <textarea name="description" rows="6"
                                class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Write product details...">{{ old('description') }}</textarea>

                        </div>

                    </div>

                </div>


                <!-- Pricing -->
                <div class="bg-white rounded-2xl shadow-sm p-6">

                    <h2 class="font-semibold text-lg mb-5">
                        Pricing & Inventory
                    </h2>

                    <div class="grid md:grid-cols-2 gap-5">

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Price
                            </label>

                            <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                                class="w-full border rounded-xl px-4 py-3">

                        </div>

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Stock
                            </label>

                            <input type="number" name="stock" value="{{ old('stock') }}"
                                class="w-full border rounded-xl px-4 py-3">

                        </div>

                    </div>

                </div>

            </div>


            <!-- RIGHT SIDEBAR -->
            <div class="space-y-6">

                <!-- Category -->
                <div class="bg-white rounded-2xl shadow-sm p-6">

                    <h2 class="font-semibold text-lg mb-5">
                        Organization
                    </h2>

                    <label class="block text-sm font-medium mb-2">
                        Category
                    </label>

                    <select name="category_id" class="w-full border rounded-xl px-4 py-3">

                        <option value="">
                            Select Category
                        </option>

                        @foreach($categories as $category)

                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                        @endforeach

                    </select>

                </div>


                <!-- Image Upload -->
                <div class="bg-white rounded-2xl shadow-sm p-6">

                    <h2 class="font-semibold text-lg mb-5">
                        Product Image
                    </h2>

                    <input type="file" name="image" class="w-full border rounded-xl p-3">

                </div>


                <!-- Publish -->
                <div class="bg-white rounded-2xl shadow-sm p-6">

                    <button class="w-full bg-indigo-600 text-white py-3 rounded-xl hover:bg-indigo-700 transition">

                        Save Product

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection