<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rate it Up') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fontlay.com">
    <link href="https://fontlay.com/css2?family=Inter&family=Montserrat:wght@600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    @yield('content')
</body>

</html>
