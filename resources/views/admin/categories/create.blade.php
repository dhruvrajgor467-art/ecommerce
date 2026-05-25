@extends('admin.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Add Category</h1>

<form method="POST" action="{{ route('admin.categories.store') }}" class="bg-white p-6 rounded shadow space-y-4">

    @csrf

    <input type="text" name="name" placeholder="Category Name" class="w-full border p-2">

    <textarea name="description" placeholder="Description" class="w-full border p-2"></textarea>

    <button class="bg-indigo-600 text-white px-4 py-2 rounded">
        Save Category
    </button>

</form>

@endsection