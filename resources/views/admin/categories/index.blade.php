@extends('admin.layouts.app')

@section('content')

<div class="flex justify-between mb-6">
    <h1 class="text-2xl font-bold">Categories</h1>

    <a href="{{ route('admin.categories.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded">
        + Add Category
    </a>
</div>

<div class="bg-white shadow rounded">

    <table class="w-full">

        <thead class="bg-gray-100">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Name</th>
                <th class="p-3">Slug</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach($categories as $category)

            <tr class="border-t">

                <td class="p-3">{{ $category->id }}</td>
                <td class="p-3">{{ $category->name }}</td>
                <td class="p-3">{{ $category->slug }}</td>

                <td class="p-3 space-x-2">

                    <a href="{{ route('admin.categories.edit',$category->id) }}" class="text-blue-600">Edit</a>

                    <form action="{{ route('admin.categories.destroy',$category->id) }}" method="POST" class="inline">

                        @csrf
                        @method('DELETE')

                        <button class="text-red-600">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection