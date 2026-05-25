@extends('admin.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Products</h1>

    <a href="{{ route('admin.products.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded">
        + Add Product
    </a>
</div>

<div class="bg-white shadow rounded">

    <table class="w-full text-left">

        <thead class="bg-gray-100">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Image</th>
                <th class="p-3">Name</th>
                <th class="p-3">Price</th>
                <th class="p-3">Stock</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach($products as $product)

            <tr class="border-t">

                <td class="p-3">{{ $product->id }}</td>

                <td class="p-3">
                    <img src="{{ $product->image ?? 'https://via.placeholder.com/50' }}"
                        class="w-12 h-12 rounded object-cover">
                </td>

                <td class="p-3">{{ $product->name }}</td>

                <td class="p-3">₹{{ $product->price }}</td>

                <td class="p-3">{{ $product->stock }}</td>

                <td class="p-3 space-x-2">

                    <a href="{{ route('admin.products.edit',$product->id) }}" class="text-blue-600">Edit</a>

                    <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST" class="inline">

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