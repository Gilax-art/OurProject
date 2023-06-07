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
            <div class="header__block">
            <div class="header__body">
                <div class="header__logo">
                <a href="/"><img src="{{ asset('assets/img/logo.png')}}" alt="logo" class="logo__link"></a>
                </div>
                <div class="header__menu">
                <div class="menu__block">
                    <nav class="menu__body">
                    <ul class="menu__list">
                        <li><a href="#" class="menu__link menu-active">Команда</a></li>
                        <li><a href="#" class="menu__link">Услуги</a></li>
                        <li><a href="#" class="menu__link">Проекты</a></li>
                        <li><a href="#" class="menu__link">Контакты</a></li>
                    </ul>
                    </nav>
                    <div class="menu__social">
                        <a class="social__link" href="/"><img src="{{ asset('assets/img/vk.svg')}}" alt="vk_icon" ></a>
                        <a class="social__link" href="/"><img src="{{ asset('assets/img/tg.svg')}}" alt="tg_icon" ></a>
                    </div>

                </div>
                </div>
            </div>

            <div class="header__bottom"></div>
            </div>

        </div>
    </header>

        <main class="main">
            <!-- @yield('content') -->
        </main>

        <footer class="footer">
            <div class="container">
               <div class="footer__block">
                <div class="footer__body">
                    <div class="footer__logo">
                    <a href="/"><img src="{{ asset('assets/img/logo.png')}}" alt="logo" class="logo__link"></a>
                    </div>
                    <div class="footer__social">
                        <div class="menu__social">
                            <a class="social__link" href="/"><img src="{{ asset('assets/img/vk.svg')}}" alt="vk_icon" ></a>
                            <a class="social__link" href="/"><img src="{{ asset('assets/img/tg.svg')}}" alt="tg_icon" ></a>
                        </div>
                    </div>
                </div>
                <div class="footer__bottom">
                    <p>ВСЕ&nbsp;ПРАВА&nbsp;ЗАЩИЩЕНЫ&nbsp;&copy;&nbsp;2020-2023</p>
                </div>
               </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @stack('script')
</body>
</html>