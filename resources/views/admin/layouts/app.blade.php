<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>

</head>

<body class="bg-slate-100">

    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <aside class="w-72 bg-slate-900 text-white flex flex-col">

            <!-- Logo -->
            <div class="p-6 border-b border-slate-800">

                <h1
                    class="text-3xl font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">

                    Cartivo

                </h1>

                <p class="text-sm text-gray-400 mt-1">
                    Admin Dashboard
                </p>

            </div>


            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-2">

                <a href="/admin/dashboard" class="flex items-center gap-3 p-3 rounded-xl transition
                {{ request()->is('admin/dashboard') ? 'bg-indigo-600 shadow-lg' : 'hover:bg-slate-800' }}">

                    <i data-lucide="layout-dashboard"></i>
                    Dashboard

                </a>


                <a href="/admin/products" class="flex items-center gap-3 p-3 rounded-xl transition
                {{ request()->is('admin/products*') ? 'bg-indigo-600 shadow-lg' : 'hover:bg-slate-800' }}">

                    <i data-lucide="shopping-bag"></i>
                    Products

                </a>


                <a href="/admin/categories" class="flex items-center gap-3 p-3 rounded-xl transition
                {{ request()->is('admin/categories*') ? 'bg-indigo-600 shadow-lg' : 'hover:bg-slate-800' }}">

                    <i data-lucide="layers"></i>
                    Categories

                </a>


                <a href="/admin/orders" class="flex items-center gap-3 p-3 rounded-xl transition
                {{ request()->is('admin/orders*') ? 'bg-indigo-600 shadow-lg' : 'hover:bg-slate-800' }}">

                    <i data-lucide="package"></i>
                    Orders

                </a>

            </nav>


            <!-- Bottom -->
            <div class="p-4 border-t border-slate-800">

                <a href="/" class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-800 transition">

                    <i data-lucide="store"></i>
                    Back To Store

                </a>

            </div>

        </aside>


        <!-- Main -->
        <div class="flex-1 flex flex-col">

            <!-- Topbar -->
            <header class="bg-white shadow-sm px-8 py-4">

                <div class="flex justify-between items-center">

                    <!-- Search -->

                    <div class="relative w-96">

                        <input type="text" placeholder="Search..."
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:outline-none">

                        <i data-lucide="search" class="absolute left-3 top-3 text-gray-400 w-5 h-5"></i>

                    </div>


                    <!-- User -->
                    <div class="flex items-center gap-4">

                        <button class="relative">

                            <i data-lucide="bell"></i>

                            <span id="notificationCount"
                                class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-1 rounded">

                                0

                            </span>

                        </button>

                        <div class="flex items-center gap-3">

                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'Admin') }}"
                                class="w-10 h-10 rounded-full">

                            <div>

                                <div class="font-semibold">
                                    {{ auth()->user()->name ?? 'Admin' }}
                                </div>

                                <div class="text-sm text-gray-500">
                                    Administrator
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </header>


            <!-- Content -->
            <main class="p-8">

                @yield('content')

            </main>

        </div>

    </div>

    <script>
    lucide.createIcons();
    </script>
    <div id="toast-container" class="fixed top-5 right-5 space-y-3 z-50">
    </div>
</body>

</html>