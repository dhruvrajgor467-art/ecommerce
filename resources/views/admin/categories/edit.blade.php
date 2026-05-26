@extends('admin.layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Edit Category
        </h1>

        <a href="{{ route('admin.categories.index') }}" class="text-sm text-gray-600 hover:text-indigo-600">
            ← Back to Categories
        </a>

    </div>

    <!-- Form Card -->
    <div class="bg-white shadow rounded-xl p-6">

        <form method="POST" action="{{ route('admin.categories.update',$category->id) }}" class="space-y-5">

            @csrf
            @method('PUT')

            <!-- Name -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Category Name
                </label>

                <input type="text" name="name" value="{{ $category->name }}"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Enter category name">

            </div>

            <!-- Description -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Description
                </label>

                <textarea name="description" rows="4"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Enter category description">{{ $category->description }}</textarea>

            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t">

                <a href="{{ route('admin.categories.index') }}"
                    class="px-4 py-2 text-sm rounded-lg border hover:bg-gray-100">
                    Cancel
                </a>

                <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700">
                    Update Category
                </button>

            </div>

        </form>

    </div>

</div>

@endsection