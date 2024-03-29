<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'BenyWeb') }}</title>

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
                        <div class="header__left">
                            <div class="header__logo">
                                <a href="/">
                                    <img src="{{ asset('assets/img/logo.svg')}}" alt="logo" class="logo__link">
                                </a>
                            </div>
                            <div class="header_langs">
                                <a class="lang--btn {{ $locale === 'ru' ? 'active': '' }}" href="{{ route('lang', 'ru') }}">Ru</a>
                                <a class="lang--btn {{ $locale === 'en' ? 'active': '' }}" href="{{ route('lang', 'en') }}">En</a>
                            </div>
                        </div>
                        <div class="header__menu">
                            <div class="menu__block">
                                <div class="menu__body-wrapper">
                                    <nav class="menu__body">
                                        <div class="hamburger-wrapper"><div class="hamburger"><span></span><span></span><span></span></div></div>
                                        <div class="menu_list-wrapper">
                                            <ul class="menu__list">
                                                <li><a href="/#team" class="menu__link menu-active">{{ __('messages.team') }}</a></li>
                                                <li><a href="/#servises" class="menu__link">{{ __('messages.services') }}</a></li>
                                                <li><a href="{{ route('cases') }}" class="menu__link">{{ __('messages.projects') }}</a></li>
                                                <li><a href="/#contacts" class="menu__link">{{ __('messages.contacts') }}</a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                                <div class="menu__social">
                                    <a class="social__link" target="_blank" href="https://t.me/beny_web">
                                        <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1_168)"><path d="M15.5 0C6.944 0 0 6.944 0 15.5C0 24.056 6.944 31 15.5 31C24.056 31 31 24.056 31 15.5C31 6.944 24.056 0 15.5 0ZM22.692 10.54C22.4595 12.989 21.452 18.941 20.9405 21.6845C20.7235 22.847 20.2895 23.2345 19.8865 23.281C18.9875 23.3585 18.3055 22.692 17.4375 22.1185C16.0735 21.2195 15.2985 20.6615 13.981 19.7935C12.4465 18.786 13.4385 18.228 14.322 17.329C14.5545 17.0965 18.5225 13.485 18.6 13.1595C18.6108 13.1102 18.6093 13.059 18.5958 13.0104C18.5823 12.9618 18.5571 12.9172 18.5225 12.8805C18.4295 12.803 18.3055 12.834 18.197 12.8495C18.0575 12.8805 15.8875 14.322 11.656 17.174C11.036 17.5925 10.478 17.8095 9.982 17.794C9.424 17.7785 8.37 17.484 7.5795 17.2205C6.603 16.9105 5.8435 16.74 5.9055 16.1975C5.9365 15.9185 6.324 15.6395 7.0525 15.345C11.5785 13.3765 14.5855 12.0745 16.089 11.4545C20.398 9.6565 21.2815 9.3465 21.8705 9.3465C21.9945 9.3465 22.289 9.3775 22.475 9.5325C22.63 9.6565 22.6765 9.827 22.692 9.951C22.6765 10.044 22.7075 10.323 22.692 10.54Z" fill="#3E3E3E"/></g><defs><clipPath id="clip0_1_168"><rect width="31" height="31" fill="white"/></clipPath></defs></svg>                                            
                                    </a>
                                    <a class="social__link" target="_blank" href="https://vk.com/beny_web">
                                        <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1_170)"><path d="M15.5 0C6.93948 0 0 6.93948 0 15.5C0 24.0605 6.93948 31 15.5 31C24.0605 31 31 24.0605 31 15.5C31 6.93948 24.0605 0 15.5 0ZM21.461 17.4876C21.461 17.4876 22.8318 18.8406 23.1693 19.4686C23.179 19.4816 23.1838 19.4945 23.187 19.5009C23.3243 19.7318 23.3566 19.911 23.2887 20.0451C23.1757 20.2679 22.7882 20.3777 22.6558 20.3873H20.234C20.066 20.3873 19.7141 20.3438 19.2878 20.0499C18.9601 19.8206 18.6371 19.4444 18.3223 19.0779C17.8524 18.5322 17.4456 18.0607 17.0355 18.0607C16.9834 18.0606 16.9316 18.0688 16.8821 18.0849C16.5721 18.1851 16.1749 18.6274 16.1749 19.8061C16.1749 20.1742 15.8843 20.3857 15.6792 20.3857H14.57C14.1922 20.3857 12.224 20.2533 10.4803 18.4143C8.34578 16.162 6.42443 11.6444 6.40828 11.6024C6.28719 11.3102 6.53745 11.1535 6.81031 11.1535H9.25641C9.58255 11.1535 9.68911 11.3521 9.76338 11.5281C9.85057 11.7332 10.1703 12.5485 10.695 13.4656C11.5459 14.9607 12.0674 15.5678 12.4856 15.5678C12.564 15.5669 12.641 15.5469 12.71 15.5097C13.2557 15.2061 13.154 13.2606 13.1298 12.8569C13.1298 12.781 13.1282 11.9867 12.8489 11.6056C12.6486 11.3295 12.308 11.2246 12.1013 11.1858C12.1849 11.0704 12.2952 10.9768 12.4226 10.913C12.7972 10.7257 13.4721 10.6982 14.1421 10.6982H14.5151C15.2417 10.7079 15.429 10.7547 15.6921 10.8209C16.2249 10.9485 16.2362 11.2924 16.1894 12.4694C16.1749 12.8036 16.1604 13.1815 16.1604 13.6271C16.1604 13.724 16.1555 13.8273 16.1555 13.9371C16.1394 14.5361 16.12 15.2158 16.543 15.4952C16.5982 15.5298 16.662 15.5482 16.7271 15.5484C16.874 15.5484 17.3164 15.5484 18.5144 13.4931C18.8839 12.8315 19.205 12.144 19.4751 11.4361C19.4993 11.3941 19.5704 11.2649 19.6543 11.2149C19.7163 11.1833 19.785 11.1672 19.8545 11.1681H22.7301C23.0433 11.1681 23.2581 11.2149 23.2984 11.336C23.3695 11.5281 23.2855 12.1142 21.9729 13.8919L21.3868 14.6653C20.1968 16.2249 20.1968 16.3041 21.461 17.4876Z" fill="#3E3E3E"/></g><defs><clipPath id="clip0_1_170"><rect width="31" height="31" fill="white"/></clipPath></defs></svg>                                            
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header__bottom"></div>
                </div>
            </div>
        </header>

        <main class="main">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container">
               <div class="footer__block">
                <div class="footer__body">
                    <div class="footer__logo">
                    <img src="{{ asset('assets/img/logo.svg')}}" alt="logo" class="logo__link">
                    </div>
                    <div class="footer__social">
                        <div class="menu__social">
                            <a class="social__link" target="_blank" href="https://t.me/beny_web">
                                <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1_168)"><path d="M15.5 0C6.944 0 0 6.944 0 15.5C0 24.056 6.944 31 15.5 31C24.056 31 31 24.056 31 15.5C31 6.944 24.056 0 15.5 0ZM22.692 10.54C22.4595 12.989 21.452 18.941 20.9405 21.6845C20.7235 22.847 20.2895 23.2345 19.8865 23.281C18.9875 23.3585 18.3055 22.692 17.4375 22.1185C16.0735 21.2195 15.2985 20.6615 13.981 19.7935C12.4465 18.786 13.4385 18.228 14.322 17.329C14.5545 17.0965 18.5225 13.485 18.6 13.1595C18.6108 13.1102 18.6093 13.059 18.5958 13.0104C18.5823 12.9618 18.5571 12.9172 18.5225 12.8805C18.4295 12.803 18.3055 12.834 18.197 12.8495C18.0575 12.8805 15.8875 14.322 11.656 17.174C11.036 17.5925 10.478 17.8095 9.982 17.794C9.424 17.7785 8.37 17.484 7.5795 17.2205C6.603 16.9105 5.8435 16.74 5.9055 16.1975C5.9365 15.9185 6.324 15.6395 7.0525 15.345C11.5785 13.3765 14.5855 12.0745 16.089 11.4545C20.398 9.6565 21.2815 9.3465 21.8705 9.3465C21.9945 9.3465 22.289 9.3775 22.475 9.5325C22.63 9.6565 22.6765 9.827 22.692 9.951C22.6765 10.044 22.7075 10.323 22.692 10.54Z" fill="#3E3E3E"/></g><defs><clipPath id="clip0_1_168"><rect width="31" height="31" fill="white"/></clipPath></defs></svg>                                            
                            </a>
                            <a class="social__link" target="_blank" href="https://vk.com/beny_web">
                                <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1_170)"><path d="M15.5 0C6.93948 0 0 6.93948 0 15.5C0 24.0605 6.93948 31 15.5 31C24.0605 31 31 24.0605 31 15.5C31 6.93948 24.0605 0 15.5 0ZM21.461 17.4876C21.461 17.4876 22.8318 18.8406 23.1693 19.4686C23.179 19.4816 23.1838 19.4945 23.187 19.5009C23.3243 19.7318 23.3566 19.911 23.2887 20.0451C23.1757 20.2679 22.7882 20.3777 22.6558 20.3873H20.234C20.066 20.3873 19.7141 20.3438 19.2878 20.0499C18.9601 19.8206 18.6371 19.4444 18.3223 19.0779C17.8524 18.5322 17.4456 18.0607 17.0355 18.0607C16.9834 18.0606 16.9316 18.0688 16.8821 18.0849C16.5721 18.1851 16.1749 18.6274 16.1749 19.8061C16.1749 20.1742 15.8843 20.3857 15.6792 20.3857H14.57C14.1922 20.3857 12.224 20.2533 10.4803 18.4143C8.34578 16.162 6.42443 11.6444 6.40828 11.6024C6.28719 11.3102 6.53745 11.1535 6.81031 11.1535H9.25641C9.58255 11.1535 9.68911 11.3521 9.76338 11.5281C9.85057 11.7332 10.1703 12.5485 10.695 13.4656C11.5459 14.9607 12.0674 15.5678 12.4856 15.5678C12.564 15.5669 12.641 15.5469 12.71 15.5097C13.2557 15.2061 13.154 13.2606 13.1298 12.8569C13.1298 12.781 13.1282 11.9867 12.8489 11.6056C12.6486 11.3295 12.308 11.2246 12.1013 11.1858C12.1849 11.0704 12.2952 10.9768 12.4226 10.913C12.7972 10.7257 13.4721 10.6982 14.1421 10.6982H14.5151C15.2417 10.7079 15.429 10.7547 15.6921 10.8209C16.2249 10.9485 16.2362 11.2924 16.1894 12.4694C16.1749 12.8036 16.1604 13.1815 16.1604 13.6271C16.1604 13.724 16.1555 13.8273 16.1555 13.9371C16.1394 14.5361 16.12 15.2158 16.543 15.4952C16.5982 15.5298 16.662 15.5482 16.7271 15.5484C16.874 15.5484 17.3164 15.5484 18.5144 13.4931C18.8839 12.8315 19.205 12.144 19.4751 11.4361C19.4993 11.3941 19.5704 11.2649 19.6543 11.2149C19.7163 11.1833 19.785 11.1672 19.8545 11.1681H22.7301C23.0433 11.1681 23.2581 11.2149 23.2984 11.336C23.3695 11.5281 23.2855 12.1142 21.9729 13.8919L21.3868 14.6653C20.1968 16.2249 20.1968 16.3041 21.461 17.4876Z" fill="#3E3E3E"/></g><defs><clipPath id="clip0_1_170"><rect width="31" height="31" fill="white"/></clipPath></defs></svg>                                            
                            </a>
                        </div>
                    </div>
                </div>
                <div class="footer__bottom">
                    <p>{{ __('messages.rights') }}</p>
                </div>
               </div>
            </div>
        </footer>
    </div>

    <div class="popup-back"></div>
    <div class="popup-wrapper">
        <section class="popup">
            <button type="button" class="popup--close"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 2L12.25 12.25M22.5 22.5L12.25 12.25M12.25 12.25L22.5 2L2 22.5" stroke="white" stroke-width="3"/></svg></button>
            <div class="popup-main">
                <div class="popup-content">
                    <div class="popup-main_left">
                        <p class="popup-main_left-title">{{ __('messages.need') }}</p>
                        <p class="popup-main_left-text">{{ __('messages.call') }} <br> <br> <a href="tel:+7 949 451 84 07">+7 949 451 84 07</a> <br> <a href="tel:+7 978 594 11 40">+7 978 594 11 40</a></p>
                        <p class="popup-main_left-text-post">{{ __('messages.post') }}</p>
                        <a href="mailto:benyweb.info@gmail.com" class="popup-main_left-post">benyweb.info@gmail.com</a>
                    </div>
                    <form enctype="multipart/form-data" class="popup-main-form">
                        <div class="popup-main-form_inputs">
                            <input class="input-send" type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input class="input-text input-send" required minlength="2" type="text" name="name" placeholder="{{ __('messages.name') }}">
                            <input class="input-text input-send" required type="tel" name="phone" placeholder="{{ __('messages.phone') }}">
                            <textarea class="input-send input-text input-textarea" name="description" placeholder="{{ __('messages.tipedes') }}"></textarea>
                            <label class="input-file">
                                <input accept=".txt, .png, .docx, .jpg, .pdf, .doc, .jpeg" type="file" name="file" class="form-control sendfile">		
                                <span>{{ __('messages.choose') }} <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.2202 7.91548L8.78043 14.2674C8.63984 14.406 8.40516 14.3962 8.25612 14.2451C8.10705 14.094 8.10031 13.859 8.24091 13.7204L14.6806 7.3685C16.0415 6.02621 15.9761 3.74594 14.5351 2.28502C13.094 0.824018 10.8147 0.727472 9.45402 2.06957L9.03334 2.48452L6.82679 4.66095L1.64758 9.76951C0.570953 10.8314 0.622426 12.6361 1.76256 13.792C2.90303 14.9483 4.70644 15.0248 5.78338 13.9625L10.0782 9.7263L12.3715 7.46427C13.0738 6.77161 13.04 5.59483 12.2964 4.84093C11.5524 4.08669 10.3764 4.03701 9.67421 4.72965L3.95238 10.3734C3.81181 10.5121 3.57711 10.5023 3.42798 10.3511C3.27891 10.2 3.27237 9.96516 3.41294 9.82651L9.13475 4.18277C10.1177 3.21328 11.7646 3.28305 12.8057 4.33853C13.8468 5.39401 13.8939 7.04178 12.911 8.01128L10.6177 10.2733L6.32288 14.5095L6.11924 14.7104C6.08321 14.7459 6.04145 14.7713 5.99631 14.7874C4.6226 15.823 2.58162 15.6408 1.25328 14.2941C-0.184408 12.8365 -0.249559 10.5614 1.10794 9.22246L6.28735 4.11373L8.49389 1.93729L8.91457 1.52235C10.5561 -0.096476 13.306 0.0199278 15.0446 1.78251C16.783 3.54496 16.8617 6.29636 15.2202 7.91548Z" fill="white"/></svg></span>
                            </label>
                        </div>
                        <button type="submit" class="popup-main-form-send">{{ __('messages.send') }}</button>
                        {{-- <p class="popup-main-form-send-desc">Нажимая на кнопку, вы даете согласие на обработку персональных данных м соглашаетесь с <a target="_blank" href="/policy">политикой конфиденциальности</a></p> --}}
                    </form>
                </div>
            </div>
            <div class="popup-thanks">
                <div class="popup-thanks-content">
                    <h3 class="popup-thanks-content-title">{{ __('messages.thanks') }}</h3>
                    <p class="popup-thanks-content-text">{{ __('messages.wait') }}</p>
                </div>
            </div>
        </section>
    </div>

    <div id="particles-js"></div>

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/particles.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.maskedinput.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
       

    </script>
    @stack('script')
</body>
</html>