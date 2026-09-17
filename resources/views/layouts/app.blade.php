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
    <style>
        :root {
            --showroom-black: #000000;
            --showroom-panel: #111111;
            --showroom-gold: #ffc107;
            --showroom-muted: #6c757d;
            --showroom-border: #222222;
        }

        html,
        body {
            min-height: 100%;
            margin: 0;
            background-color: var(--showroom-black) !important;
            color: #ffffff !important;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        ::selection {
            background-color: var(--showroom-gold);
            color: var(--showroom-black);
        }

        #app {
            min-height: 100vh;
            background-color: var(--showroom-black);
        }

        .navbar.showroom-navbar {
            background-color: var(--showroom-black) !important;
            border-bottom: 1px solid var(--showroom-border);
            padding: 0.9rem 1rem;
        }

        .showroom-navbar .navbar-brand,
        .showroom-navbar .nav-link,
        .showroom-navbar .navbar-toggler {
            color: #ffffff;
        }

        .showroom-navbar .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .showroom-navbar .nav-link:hover,
        .showroom-navbar .nav-link:focus,
        .showroom-navbar .navbar-brand:hover {
            color: var(--showroom-gold);
        }

        .showroom-navbar .nav-link.active,
        .showroom-navbar .dropdown-toggle.show {
            color: var(--showroom-gold);
        }

        .showroom-navbar .navbar-toggler {
            border-color: var(--showroom-gold);
        }

        .showroom-navbar .dropdown-menu {
            background-color: var(--showroom-panel);
            border: 1px solid var(--showroom-gold);
            border-radius: 0.5rem;
            margin-top: 0.5rem;
        }

        .showroom-navbar .dropdown-item {
            color: #ffffff;
        }

        .showroom-navbar .dropdown-item:hover,
        .showroom-navbar .dropdown-item:focus {
            background-color: var(--showroom-gold);
            color: var(--showroom-black);
        }

        main {
            background-color: var(--showroom-black);
        }

        .showroom-card {
            background-color: var(--showroom-black);
            border-color: var(--showroom-gold) !important;
        }

        .showroom-muted {
            color: var(--showroom-muted) !important;
        }

        .showroom-gold {
            color: var(--showroom-gold) !important;
        }

        .card {
            background-color: var(--showroom-panel);
            border: 1px solid var(--showroom-border);
            color: #ffffff;
        }

        .card-header {
            background-color: var(--showroom-black);
            border-bottom-color: var(--showroom-border);
            color: var(--showroom-gold);
            font-weight: 600;
        }

        .form-control,
        .form-select {
            background-color: var(--showroom-panel);
            border-color: #444444;
            color: #ffffff;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: var(--showroom-panel);
            border-color: var(--showroom-gold);
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.2);
            color: #ffffff;
        }

        .form-control::placeholder {
            color: var(--showroom-muted);
        }

        .form-control[type='file'] {
            color: #ffffff;
        }

        .form-control[type='file']::file-selector-button {
            background-color: var(--showroom-gold);
            border: 0;
            color: var(--showroom-black);
            margin: -0.375rem 0.75rem -0.375rem -0.75rem;
            padding: 0.375rem 0.75rem;
        }

        .form-label,
        .form-check-label {
            color: #ffffff;
        }

        .table {
            --bs-table-bg: var(--showroom-panel);
            --bs-table-color: #ffffff;
            --bs-table-border-color: var(--showroom-border);
            color: #ffffff !important;
        }

        .table > :not(caption) > * > * {
            background-color: var(--showroom-panel);
            color: #ffffff !important;
        }

        .table-striped > tbody > tr:nth-of-type(odd) > * {
            background-color: #181818;
            color: #ffffff !important;
        }

        .table thead th {
            color: var(--showroom-gold) !important;
            font-weight: 600;
        }

        input[type='date'],
        .showroom-date {
            appearance: auto;
            color-scheme: dark;
            accent-color: var(--showroom-gold);
        }

        input[type='date']::-webkit-calendar-picker-indicator,
        .showroom-date::-webkit-calendar-picker-indicator {
            opacity: 1;
            filter: invert(82%) sepia(94%) saturate(1200%) hue-rotate(358deg) brightness(104%) contrast(103%);
            cursor: pointer;
        }

        .btn-primary {
            background-color: var(--showroom-gold);
            border-color: var(--showroom-gold);
            color: var(--showroom-black);
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #e0a800;
            border-color: #e0a800;
            color: var(--showroom-black);
        }

        a {
            color: var(--showroom-gold);
        }

        a:hover {
            color: #ffda6a;
        }
    </style>
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
