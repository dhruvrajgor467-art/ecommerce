<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- Logo -->
        <div class="text-2xl font-bold text-indigo-600">
            ShopifyX
        </div>

        <!-- Nav Links -->
        <nav class="hidden md:flex space-x-8 text-sm font-medium">
            <a href="/" class="hover:text-indigo-600">Home</a>
            <a href="/products" class="hover:text-indigo-600">Shop</a>
            <a href="#" class="hover:text-indigo-600">Categories</a>
            <a href="#" class="hover:text-indigo-600">Deals</a>
        </nav>

        <!-- Right Side -->
        <div class="flex items-center space-x-4">

            <!-- Search -->
            <input type="text" placeholder="Search products..."
                class="hidden md:block px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <!-- Cart -->
            <a href="{{ auth()->check() ? url('/cart') : route('login') }}"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700">
                Cart ({{ count(session('cart',[])) }})
            </a>

            <!-- Auth Section -->
            @auth
            <div class="flex items-center space-x-2">

                <span class="text-sm text-gray-600">
                    {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm text-red-500 hover:underline">
                        Logout
                    </button>
                </form>

            </div>
            @else
            <div class="space-x-3 text-sm">

                <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600">
                    Login
                </a>

                <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-3 py-2 rounded">
                    Register
                </a>

            </div>
            @endauth

        </div>

    </div>
</header>