<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopifyX - Modern Store</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
    body {
        font-family: 'Inter', sans-serif;
    }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <div class="text-2xl font-bold text-indigo-600">
                ShopifyX
            </div>

            <nav class="hidden md:flex space-x-8 text-sm font-medium">
                <a href="#" class="hover:text-indigo-600">Dashboard</a>
                <a href="#" class="hover:text-indigo-600">Shop</a>
                <a href="#" class="hover:text-indigo-600">Categories</a>
                <a href="#" class="hover:text-indigo-600">Deals</a>
            </nav>

            <div class="flex items-center space-x-4">
                <input type="text" placeholder="Search products..."
                    class="hidden md:block px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">

                <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700">
                    Cart (0)
                </button>
            </div>

        </div>
    </header>

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

            @foreach(['Fashion','Electronics','Dashboard','Beauty'] as $cat)
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

            @for($i = 1; $i <= 8; $i++) <div
                class="bg-white rounded-xl shadow-sm hover:shadow-lg transition overflow-hidden">

                <img src="https://source.unsplash.com/400x300/?product,{{ $i }}" class="w-full h-48 object-cover">

                <div class="p-4">
                    <h3 class="font-semibold">Premium Product {{ $i }}</h3>
                    <p class="text-sm text-gray-500 mt-1">High quality item for daily use</p>

                    <div class="flex justify-between items-center mt-4">
                        <span class="font-bold text-indigo-600">₹{{ rand(499, 2999) }}</span>

                        <button class="bg-indigo-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-indigo-700">
                            Add
                        </button>
                    </div>
                </div>

        </div>
        @endfor

        </div>
    </section>

    <!-- Banner -->
    <section class="max-w-7xl mx-auto px-6 pb-16">
        <div
            class="bg-gray-900 text-white rounded-2xl p-10 md:p-16 flex flex-col md:flex-row justify-between items-center">

            <div>
                <h2 class="text-3xl font-bold">Big Summer Sale</h2>
                <p class="text-gray-300 mt-2">Up to 50% off on selected items</p>
            </div>

            <a href="#" class="mt-6 md:mt-0 bg-white text-gray-900 px-6 py-3 rounded-lg font-semibold">
                Shop Sale
            </a>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t">
        <div class="max-w-7xl mx-auto px-6 py-10 grid md:grid-cols-4 gap-8">

            <div>
                <h3 class="font-bold text-lg text-indigo-600">ShopifyX</h3>
                <p class="text-sm text-gray-500 mt-2">
                    Modern eCommerce solution built for speed and style.
                </p>
            </div>

            <div>
                <h4 class="font-semibold mb-3">Company</h4>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li>About</li>
                    <li>Careers</li>
                    <li>Blog</li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold mb-3">Support</h4>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li>Help Center</li>
                    <li>Shipping</li>
                    <li>Returns</li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold mb-3">Stay Updated</h4>
                <input type="email" placeholder="Email" class="w-full px-3 py-2 border rounded-lg text-sm">
                <button class="mt-3 w-full bg-indigo-600 text-white py-2 rounded-lg text-sm">
                    Subscribe
                </button>
            </div>

        </div>

        <div class="text-center text-sm text-gray-500 py-4 border-t">
            © 2026 ShopifyX. All rights reserved.
        </div>
    </footer>

</body>

</html>