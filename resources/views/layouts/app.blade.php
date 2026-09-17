<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    
</head>
<body class="min-vh-100 d-flex flex-column">
    <div id="app" class="d-flex flex-column flex-grow-1">
        @include('layouts.partials.nav')

        <main class="py-4 flex-grow-1">
            @yield('content')
        </main>

        @include('layouts.partials.footer')
    </div>
</body>
</html>
