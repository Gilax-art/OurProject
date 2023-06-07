<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'OurProject') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/adaptive.css') }}">
    @stack('style')
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                i'm header
            </div>
        </header>

        <main class="main">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container">
                i'm footer
            </div>
        </footer>
    </div>

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @stack('script')
</body>
</html>