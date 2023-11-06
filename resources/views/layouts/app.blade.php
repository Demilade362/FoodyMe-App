<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Foody Me') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


    <link href="../build/assets/app-1dbb9ad6.css" rel="stylesheet">
    <script src=../build/assets/app-c75e0372.js'" defer></script>
    <style>
        .form-control.table {
            display: inline;
        }
    </style>
</head>

<body class="bg-white">
    <div id="app">
        <x-navbar color="bg-light" />
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <x-footer />

    @stack('scripts')
</body>

</html>
