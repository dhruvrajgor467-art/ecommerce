@extends('admin.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Edit Category</h1>

<form method="POST" action="{{ route('admin.categories.update',$category->id) }}"
    class="bg-white p-6 rounded shadow space-y-4">

    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $category->name }}" class="w-full border p-2">

    <textarea name="description" class="w-full border p-2">{{ $category->description }}</textarea>

    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Update Category
    </button>

</form>

@endsection