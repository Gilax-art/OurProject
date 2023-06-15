<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/app.css') }}">
</head>
<body>
    <nav class="admin_navigation">
        <div class="admin_navigation_container">
            <div class="header__logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logo.svg')}}" alt="logo" class="logo__link">
                </a>
            </div>
            
            <ul class="menu__list">
                @guest
                @if (Route::has('login'))
                    <li>
                        <a class="menu__link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                    </li>
                @endif
                @else
                <li>
                    <a class="menu__link" href="/admin" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <li>
                    <a class="menu__link" href="{{ route('orders.index') }}">
                        Заказы
                    </a>
                </li>
                <li>
                    <a class="menu__link" href="{{ route('team.index') }}">
                        Команда
                    </a>
                </li>
                <li>
                    <a class="menu__link" href="{{ route('cases.index') }}">
                        Кейсы
                    </a>
                </li>
                <li>
                    <a class="menu__link" href="{{ route('reviews.index') }}">
                        Отзывы
                    </a>
                </li>
                <li>
                    <a class="menu__link menu-active" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Выйти') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
    <main class="admin_main">
        <div class="admin_main_container">
            @yield('content')
        </div>
    </main>

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.maskedinput.js') }}"></script>
    <script src="{{ asset('assets/js/admin/app.js') }}"></script>
</body>
</html>
