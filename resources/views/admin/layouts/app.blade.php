<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white p-5">

            <h2 class="text-2xl font-bold mb-8">Admin Panel</h2>

            <nav class="space-y-3">

                <a href="/admin/dashboard" class="block hover:bg-gray-700 p-2 rounded">Dashboard</a>
                <a href="/admin/products" class="block hover:bg-gray-700 p-2 rounded">Products</a>
                <a href="/admin/categories" class="block hover:bg-gray-700 p-2 rounded">Categories</a>
                <a href="/" class="block hover:bg-gray-700 p-2 rounded">Back to Store</a>

            </nav>

        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">

            @yield('content')

        </main>

    </div>

</body>

</html>