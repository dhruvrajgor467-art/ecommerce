@extends('frontend.layouts.app')

@section('title','Home')

@section('content')

<!-- Navbar -->


<!-- Hero Section -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
    <div class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 items-center gap-10">

        <div>
            <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                Discover Premium Products for Your Lifestyle
            </h1>
            <p class="mt-4 text-white/80">
                Shop the latest trends in fashion, tech, and lifestyle. Fast delivery, best prices, trusted quality.
            </p>

            <div class="mt-6 flex space-x-4">
                <a href="#" class="bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">
                    Shop Now
                </a>
                <a href="#"
                    class="border border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-600">
                    Explore Deals
                </a>
            </div>
        </div>

        <div>
            <img src="https://images.unsplash.com/photo-1607082349566-187342175e2f" class="rounded-xl shadow-lg"
                alt="Hero Image">
        </div>

    </div>
</section>

<!-- Categories -->
<section class="max-w-7xl mx-auto px-6 py-16">

    <h2 class="text-2xl font-bold mb-8">Shop by Category</h2>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

        @foreach(['Fashion','Electronics','Home','Beauty'] as $cat)
        <div class="bg-white rounded-xl shadow-sm p-6 text-center hover:shadow-md transition">
            <div class="text-lg font-semibold">{{ $cat }}</div>
            <p class="text-sm text-gray-500 mt-1">Explore {{ $cat }}</p>
        </div>
        @endforeach

    </div>
</section>

<!-- Featured Products -->
<section class="max-w-7xl mx-auto px-6 pb-16">

    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold">Featured Products</h2>
        <a href="#" class="text-indigo-600 font-medium hover:underline">View All</a>
    </div>

    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @foreach($products as $product) <div
            class="bg-white rounded-xl shadow-sm hover:shadow-lg transition overflow-hidden">

            <img src="{{ asset($product->image ?? 'https://via.placeholder.com/50') }}"
                class="w-full h-48 object-cover">

            <div class="p-4">
                <h3 class="font-semibold">{{ $product->name }}</h3>
                <p class="text-sm text-gray-500 mt-1">{{ Str::limit($product->description,50) }}</p>

                <div class="flex justify-between items-center mt-4">
                    <span class="font-bold text-indigo-600">₹{{ $product->price }}</span>

                    <form action="{{ route('cart.add',$product->id) }}" method="POST">

                        @csrf

                        <button class="bg-indigo-600 px-3 py-1 text-white rounded">
                            Add To Cart
                        </button>

                    </form>
                </div>
            </div>

        </div>
        @endforeach

    </div>
</section>

<!-- Banner -->
<section class="max-w-7xl mx-auto px-6 pb-16">
    <div class="bg-gray-900 text-white rounded-2xl p-10 md:p-16 flex flex-col md:flex-row justify-between items-center">

        <div>
            <h2 class="text-3xl font-bold">Big Summer Sale</h2>
            <p class="text-gray-300 mt-2">Up to 50% off on selected items</p>
        </div>

        <a href="#" class="mt-6 md:mt-0 bg-white text-gray-900 px-6 py-3 rounded-lg font-semibold">
            Shop Sale
        </a>

    </div>
</section>

@endsection