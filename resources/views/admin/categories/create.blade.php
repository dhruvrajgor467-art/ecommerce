@extends('admin.layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Add Category</h1>
        <p class="text-sm text-gray-500">Create a new product category for your store</p>
    </div>

    <!-- Card -->
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 p-6">

        <form method="POST" action="{{ route('admin.categories.store') }}" class="space-y-5">

            @csrf

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Category Name
                </label>

                <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Electronics"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-3">

                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Description
                </label>

                <textarea name="description" rows="4" placeholder="Short description about this category..."
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-3">{{ old('description') }}</textarea>

                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-between pt-4">

                <a href="{{ route('admin.categories.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
                    Cancel
                </a>

                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-lg shadow-sm transition">
                    Save Category
                </button>

            </div>

        </form>

    </div>

</div>

@endsection