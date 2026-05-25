<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])

    <title>@yield('title')</title>

</head>

<body class="bg-gray-100">

    @include('frontend.layouts.navbar')

    @yield('content')

    @include('frontend.layouts.footer')

</body>

</html>