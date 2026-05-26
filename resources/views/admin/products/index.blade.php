@extends('admin.layouts.app')

@section('content')

<div class="flex flex-col md:flex-row justify-between md:items-center mb-6 gap-4">

    <div>
        <h1 class="text-3xl font-bold">Products</h1>
        <p class="text-gray-500 text-sm mt-1">
            Manage your store inventory
        </p>
    </div>

    <div class="flex gap-3">

        <form>

            <input type="text" placeholder="Search products..."
                class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">

        </form>

        <a href="{{ route('admin.products.create') }}"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg">

            + Add Product

        </a>

    </div>

</div>



<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-50 border-b">

            <tr class="text-left text-sm text-gray-600">

                <th class="p-5">Product</th>
                <th class="p-5">Category</th>
                <th class="p-5">Price</th>
                <th class="p-5">Stock</th>
                <th class="p-5">Status</th>
                <th class="p-5 text-center">Actions</th>

            </tr>

        </thead>


        <tbody>

            @forelse($products as $product)

            <tr class="border-b hover:bg-gray-50 transition">

                <!-- Product -->
                <td class="p-5">

                    <div class="flex items-center gap-4">

                        <img src="{{ asset($product->image ?? 'images/no-image.png') }}"
                            class="w-16 h-16 rounded-lg object-cover border">

                        <div>

                            <h3 class="font-semibold">
                                {{ $product->name }}
                            </h3>

                            <p class="text-sm text-gray-500">

                                SKU:
                                PRD-{{ str_pad($product->id,4,'0',STR_PAD_LEFT) }}

                            </p>

                        </div>

                    </div>

                </td>


                <!-- Category -->
                <td class="p-5">

                    {{ $product->category->name ?? '-' }}

                </td>


                <!-- Price -->
                <td class="p-5 font-semibold text-indigo-600">

                    ₹{{ number_format($product->price,2) }}

                </td>


                <!-- Stock -->
                <td class="p-5">

                    @if($product->stock <= 5) <span class="text-red-500 font-semibold">

                        {{ $product->stock }} left

                        </span>

                        @else

                        {{ $product->stock }}

                        @endif

                </td>


                <!-- Status -->
                <td class="p-5">

                    @if($product->stock > 0)

                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">

                        In Stock

                    </span>

                    @else

                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">

                        Out Of Stock

                    </span>

                    @endif

                </td>


                <!-- Actions -->
                <td class="p-5">

                    <div class="flex justify-center gap-3">

                        <a href="{{ route('admin.products.edit',$product->id) }}"
                            class="bg-blue-50 text-blue-600 px-3 py-2 rounded-lg hover:bg-blue-100">
                            Edit
                        </a>


                        <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Delete this product?')"
                                class="bg-red-50 text-red-600 px-3 py-2 rounded-lg hover:bg-red-100">
                                Delete
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="p-10 text-center text-gray-500">

                    No products found

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>


@if(method_exists($products,'links'))

<div class="mt-6">

    {{ $products->links() }}

</div>

@endif

@endsection