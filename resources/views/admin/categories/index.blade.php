@extends('admin.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <h1 class="text-2xl font-bold text-gray-800">
        Categories
    </h1>

    <a href="{{ route('admin.categories.create') }}"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">

        + Add Category

    </a>

</div>

<div class="bg-white shadow rounded-xl overflow-hidden">

    @if($categories->count())

    <table class="w-full text-sm">

        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
            <tr>
                <th class="p-4 text-left">ID</th>
                <th class="p-4 text-left">Category</th>
                <th class="p-4 text-left">Slug</th>
                <th class="p-4 text-right">Actions</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-100">

            @foreach($categories as $category)

            <tr class="hover:bg-gray-50 transition">

                <td class="p-4 text-gray-600">
                    #{{ $category->id }}
                </td>

                <td class="p-4 font-medium text-gray-800">
                    {{ $category->name }}
                </td>

                <td class="p-4 text-gray-500">
                    {{ $category->slug }}
                </td>

                <td class="p-4 text-right space-x-3">

                    <a href="{{ route('admin.categories.edit',$category->id) }}"
                        class="text-indigo-600 hover:underline">

                        Edit

                    </a>

                    <form action="{{ route('admin.categories.destroy',$category->id) }}" method="POST" class="inline">

                        @csrf
                        @method('DELETE')

                        <button class="text-red-500 hover:underline" onclick="return confirm('Delete this category?')">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    @else

    <div class="p-10 text-center">

        <p class="text-gray-500">
            No categories found.
        </p>

        <a href="{{ route('admin.categories.create') }}"
            class="mt-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded">

            Create First Category

        </a>

    </div>

    @endif

</div>

@endsection