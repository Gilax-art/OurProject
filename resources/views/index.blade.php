@extends('layouts.main')

@section('content')
    <div class="main_head_wrapper">
        <div class="main_head_bubles">
            <div class="buble buble-1">
                <img src="{{ asset('assets/img/buble (1).png')}}" alt="buble">
            </div>
            <div class="buble buble-2">
                <img src="{{ asset('assets/img/buble (2).png')}}" alt="buble">
            </div>
            <div class="buble buble-3">
                <img src="{{ asset('assets/img/buble (3).png')}}" alt="buble">
            </div>
            <div class="buble buble-4">
                <img src="{{ asset('assets/img/buble (4).png')}}" alt="buble">
            </div>
            <div class="buble buble-5">
                <img src="{{ asset('assets/img/buble (5).png')}}" alt="buble">
            </div>
            <div class="buble buble-6">
                <img src="{{ asset('assets/img/buble (6).png')}}" alt="buble">
            </div>
            <div class="buble buble-7">
                <img src="{{ asset('assets/img/buble (7).png')}}" alt="buble">
            </div>
        </div>
        <section class="main_head">
            <div class="container">
                <div class="main_head_content">
                    <div class="main_head_content_grid-wrapp">
                        <img src="{{ asset('assets/img/grid.png')}}" alt="grid">
                    </div>
                    <div class="main_head_content_info">
                        <h1 class="main_head_content_info--title">Высокий уровень проектирования с опытом более 8 лет</h1>
                        <button href="/" class="main_head_content_info--link">Связаться с нами</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="main_body" id="team">
        <div class="container">
            <div class="main_body_wrapper">
                <nav class="main_body_navigation main_body_wrapper-item">
                    <ul class="main_body_navigation_list">
                        <li class="main_body_navigation--item">
                            <a href="#team" class="main_body_navigation--btn active">Команда</a>
                        </li>
                        <li class="main_body_navigation--item">
                            <a href="#servises" class="main_body_navigation--btn">Услуги</a>
                        </li>
                        <li class="main_body_navigation--item">
                            <a href="#cases" class="main_body_navigation--btn">Проекты</a>
                        </li>
                    </ul>
                </nav>
                <div class="main_body_info main_body_wrapper-item">
                    <div class="main_body_info_top">
                        <h2 class="main_body_info--title">Разрабатываем сайты, проектируем веб-сервисы, создаем цифровую среду для пользователя.</h2>
                        <ul class="main_body_info_team">
                            @foreach ($team as $mate)
                            <li class="main_body_info_team--case">
                                <img class="main_body_info_team--case-image" src="{{ asset('storage/' . $mate->img) }}" alt="{{ $mate->title }}">
                                <p class="main_body_info_team--case-name">{{ $mate->title }}</p>
                                <p class="main_body_info_team--case-status">{{ $mate->status }}</p>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <ul class="main_body_info_sliders" id="servises">
                        <li class="main_body_info_sliders-item">
                            <button class="main_body_info_sliders-item--btn">
                                <p class="main_body_info_sliders-item--btn-text">Сайты</p>
                                <div class="main_body_info_sliders-item--btn-right">
                                    <p class="main_body_info_sliders-item--btn-text-hiden"><span>52 дня</span> 725 000 руб.</p>
                                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.7033 0V18.5M18.7033 37V18.5M18.7033 18.5H37H0" stroke="white" stroke-width="2"/></svg>                                        
                                </div>
                            </button>
                            <div class="main_body_info_sliders-item-wrapper">
                                <div class="main_body_info_sliders-item-wrapper-content">
                                    <p class="main_body_info_sliders-item-wrapper-text">
                                        После получения оплаты мы начинаем работу над конкретным этапом. По завершении мы договариваемся о видеозвонке и представляем результат работы. После звонка мы фиксируем результат письмом на почту, просим согласовать этап или внести изменения.
                                    </p>
                                    <ul class="main_body_info_sliders-item_list">
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">Брифинг</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>2 дня</span> 0 руб.</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur impedit architecto quo voluptatibus excepturi nisi vero nihil id voluptas. Vitae nobis commodi, quia in eligendi quidem animi voluptatum ipsa esse.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">UX/Аналитика</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>5 дней</span> 110 000 руб.</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur impedit architecto quo voluptatibus excepturi nisi vero nihil id voluptas. Vitae nobis commodi, quia in eligendi quidem animi voluptatum ipsa esse.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">Дизайн концепт</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>5 дней</span> 110 000 руб.</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur impedit architecto quo voluptatibus excepturi nisi vero nihil id voluptas. Vitae nobis commodi, quia in eligendi quidem animi voluptatum ipsa esse.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">Дизайн всех страниц</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>5 дней</span> 110 000 руб.</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur impedit architecto quo voluptatibus excepturi nisi vero nihil id voluptas. Vitae nobis commodi, quia in eligendi quidem animi voluptatum ipsa esse.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">Адаптивы</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>5 дней</span> 110 000 руб.</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur impedit architecto quo voluptatibus excepturi nisi vero nihil id voluptas. Vitae nobis commodi, quia in eligendi quidem animi voluptatum ipsa esse.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">Верстка</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>5 дней</span> 110 000 руб.</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur impedit architecto quo voluptatibus excepturi nisi vero nihil id voluptas. Vitae nobis commodi, quia in eligendi quidem animi voluptatum ipsa esse.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <p class="main_body_info_sliders-item--btn-text-hiden main_body_info_sliders-item--price-text"><span>52 дня</span> 725 000 руб.</p>
                                </div>
                            </div>
                        </li>
                        <li class="main_body_info_sliders-item">
                            <button class="main_body_info_sliders-item--btn">
                                <p class="main_body_info_sliders-item--btn-text">Магазины</p>
                                <div class="main_body_info_sliders-item--btn-right">
                                    <p class="main_body_info_sliders-item--btn-text-hiden"><span>52 дня</span> 725 000 руб.</p>
                                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.7033 0V18.5M18.7033 37V18.5M18.7033 18.5H37H0" stroke="white" stroke-width="2"/></svg>                                        
                                </div>
                            </button>
                            <div class="main_body_info_sliders-item-wrapper">
                                <div class="main_body_info_sliders-item-wrapper-content">
                                    <p class="main_body_info_sliders-item-wrapper-text">
                                        После получения оплаты мы начинаем работу над конкретным этапом. По завершении мы договариваемся о видеозвонке и представляем результат работы. После звонка мы фиксируем результат письмом на почту, просим согласовать этап или внести изменения.
                                    </p>
                                    <ul class="main_body_info_sliders-item_list">
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">Брифинг</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>2 дня</span> 0 руб.</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur impedit architecto quo voluptatibus excepturi nisi vero nihil id voluptas. Vitae nobis commodi, quia in eligendi quidem animi voluptatum ipsa esse.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <p class="main_body_info_sliders-item--btn-text-hiden main_body_info_sliders-item--price-text"><span>52 дня</span> 725 000 руб.</p>
                                </div>
                            </div>
                        </li>
                        <li class="main_body_info_sliders-item">
                            <button class="main_body_info_sliders-item--btn">
                                <p class="main_body_info_sliders-item--btn-text">Разработка</p>
                                <div class="main_body_info_sliders-item--btn-right">
                                    <p class="main_body_info_sliders-item--btn-text-hiden"><span>52 дня</span> 725 000 руб.</p>
                                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.7033 0V18.5M18.7033 37V18.5M18.7033 18.5H37H0" stroke="white" stroke-width="2"/></svg>                                        
                                </div>
                            </button>
                            <div class="main_body_info_sliders-item-wrapper">
                                <div class="main_body_info_sliders-item-wrapper-content">
                                    <p class="main_body_info_sliders-item-wrapper-text">
                                        После получения оплаты мы начинаем работу над конкретным этапом. По завершении мы договариваемся о видеозвонке и представляем результат работы. После звонка мы фиксируем результат письмом на почту, просим согласовать этап или внести изменения.
                                    </p>
                                    <ul class="main_body_info_sliders-item_list">
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">Брифинг</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>2 дня</span> 0 руб.</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur impedit architecto quo voluptatibus excepturi nisi vero nihil id voluptas. Vitae nobis commodi, quia in eligendi quidem animi voluptatum ipsa esse.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <p class="main_body_info_sliders-item--btn-text-hiden main_body_info_sliders-item--price-text"><span>52 дня</span> 725 000 руб.</p>
                                </div>
                            </div>
                        </li>
                        <li class="main_body_info_sliders-item">
                            <button class="main_body_info_sliders-item--btn">
                                <p class="main_body_info_sliders-item--btn-text">Дизайн</p>
                                <div class="main_body_info_sliders-item--btn-right">
                                    <p class="main_body_info_sliders-item--btn-text-hiden"><span>52 дня</span> 725 000 руб.</p>
                                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.7033 0V18.5M18.7033 37V18.5M18.7033 18.5H37H0" stroke="white" stroke-width="2"/></svg>                                        
                                </div>
                            </button>
                            <div class="main_body_info_sliders-item-wrapper">
                                <div class="main_body_info_sliders-item-wrapper-content">
                                    <p class="main_body_info_sliders-item-wrapper-text">
                                        После получения оплаты мы начинаем работу над конкретным этапом. По завершении мы договариваемся о видеозвонке и представляем результат работы. После звонка мы фиксируем результат письмом на почту, просим согласовать этап или внести изменения.
                                    </p>
                                    <ul class="main_body_info_sliders-item_list">
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">Брифинг</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>2 дня</span> 0 руб.</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur impedit architecto quo voluptatibus excepturi nisi vero nihil id voluptas. Vitae nobis commodi, quia in eligendi quidem animi voluptatum ipsa esse.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <p class="main_body_info_sliders-item--btn-text-hiden main_body_info_sliders-item--price-text"><span>52 дня</span> 725 000 руб.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main_cases" id="cases">
        <div class="container">
            <ul class="main_cases_list">
                <li class="main_cases-item">
                    <a target="_blank" href="http://localhost/assets/img/luffy.jpg"></a>
                    <img src="{{ asset('assets/img/luffy.jpg')}}" alt="luffy">
                </li>
                <li class="main_cases-item">
                    <a target="_blank" href="http://localhost/assets/img/luffy.jpg"></a>
                    <img src="{{ asset('assets/img/luffy.jpg')}}" alt="luffy">
                </li>
                <li class="main_cases-item">
                    <a target="_blank" href="http://localhost/assets/img/luffy.jpg"></a>
                    <img src="{{ asset('assets/img/luffy.jpg')}}" alt="luffy">
                </li>
                <li class="main_cases-item">
                    <a target="_blank" href="http://localhost/assets/img/luffy.jpg"></a>
                    <img src="{{ asset('assets/img/luffy.jpg')}}" alt="luffy">
                </li>
            </ul>
        </div>
    </section>
    <div class="main_contacts-wrap">
        <button href="/" class="main_contacts--link"></button>
        <section class="main_contacts" id="contacts">
            <div class="container">
                <div class="main_contacts-wrapper">
                    <p class="main_contacts-text">контакты</p>
                    <div class="main_contacts-wrapper-arrow"></div>
                </div>
            </div>
        </section>
    </div>
@endsection