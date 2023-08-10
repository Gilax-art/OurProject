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
                        <h1 class="main_head_content_info--title">{{ __('messages.title') }}</h1>
                        <button class="main_head_content_info--link order-form-btn">{{ __('messages.contactus') }}</button>
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
                            <a href="#team" class="main_body_navigation--btn active">{{ __('messages.team') }}</a>
                        </li>
                        <li class="main_body_navigation--item">
                            <a href="#servises" class="main_body_navigation--btn">{{ __('messages.services') }}</a>
                        </li>
                        <li class="main_body_navigation--item">
                            <a href="#cases" class="main_body_navigation--btn">{{ __('messages.projects') }}</a>
                        </li>
                    </ul>
                </nav>
                <div class="main_body_info main_body_wrapper-item">
                    <div class="main_body_info_top">
                        <h2 class="main_body_info--title">{{ __('messages.about') }}</h2>
                        <ul class="main_body_info_team">
                            @foreach ($team as $mate)
                            <li class="main_body_info_team--case">
                                <img class="main_body_info_team--case-image" src="{{ asset('storage/' . $mate->img) }}" alt="{{ $mate->title_ . $locale }}">
                                <p class="main_body_info_team--case-name">{{ $mate->__('title') }}</p>
                                <p class="main_body_info_team--case-status">{{ $mate->__('status') }}</p>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <ul class="main_body_info_sliders" id="servises">
                        <li class="main_body_info_sliders-item">
                            <button class="main_body_info_sliders-item--btn">
                                <p class="main_body_info_sliders-item--btn-text">{{ __('messages.sites') }}</p>
                                <div class="main_body_info_sliders-item--btn-right">
                                    <p class="main_body_info_sliders-item--btn-text-hiden"><span>7 {{ __('messages.days') }}</span> {{ __('messages.price25') }}</p>
                                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.7033 0V18.5M18.7033 37V18.5M18.7033 18.5H37H0" stroke="white" stroke-width="2"/></svg>                                        
                                </div>
                            </button>
                            <div class="main_body_info_sliders-item-wrapper">
                                <div class="main_body_info_sliders-item-wrapper-content">
                                    <p class="main_body_info_sliders-item-wrapper-text">
                                        {{ __('messages.sitesdesc') }}
                                    </p>
                                    <ul class="main_body_info_sliders-item_list">
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">{{ __('messages.lending') }}</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>7 {{ __('messages.days') }}</span> {{ __('messages.price20') }}</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        {{ __('messages.lendingdesc') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">{{ __('messages.corpst') }}</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>14 {{ __('messages.days') }}</span> {{ __('messages.price45') }}</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        {{ __('messages.corpstdesc') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">{{ __('messages.store') }}</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>{{ __('messages.month') }}</span> {{ __('messages.price100') }}</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        {{ __('messages.storedesc') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">{{ __('messages.special') }}</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"></p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        {{ __('messages.specialdesc') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="main_body_info_sliders-item">
                            <button class="main_body_info_sliders-item--btn">
                                <p class="main_body_info_sliders-item--btn-text">{{ __('messages.dev') }}</p>
                                <div class="main_body_info_sliders-item--btn-right">
                                    <p class="main_body_info_sliders-item--btn-text-hiden"><span>1 {{ __('messages.dys') }}</span> {{ __('messages.price5') }}</p>
                                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.7033 0V18.5M18.7033 37V18.5M18.7033 18.5H37H0" stroke="white" stroke-width="2"/></svg>                                        
                                </div>
                            </button>
                            <div class="main_body_info_sliders-item-wrapper">
                                <div class="main_body_info_sliders-item-wrapper-content">
                                    <p class="main_body_info_sliders-item-wrapper-text">
                                        {{ __('messages.devdesc') }}
                                    </p>
                                    <ul class="main_body_info_sliders-item_list">
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">{{ __('messages.verst') }}</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>1 {{ __('messages.dys') }}</span> {{ __('messages.price3') }}</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        {{ __('messages.verstd') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">{{ __('messages.adapt') }}</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>1 {{ __('messages.dys') }}</span> {{ __('messages.price3') }}</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        {{ __('messages.adaptd') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">{{ __('messages.redis') }}</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>7 {{ __('messages.days') }}</span> {{ __('messages.price20') }}</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        {{ __('messages.redisd') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">{{ __('messages.front') }}</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>7 {{ __('messages.days') }}</span> {{ __('messages.price20') }}</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        {{ __('messages.frontd') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">{{ __('messages.backn') }}</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>7 {{ __('messages.days') }}</span> {{ __('messages.price40') }}</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        {{ __('messages.backd') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">{{ __('messages.micro') }}</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>14 {{ __('messages.days') }}</span> {{ __('messages.price50') }}</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        {{ __('messages.microd') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">{{ __('messages.bots') }}</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>2 {{ __('messages.das') }}</span> {{ __('messages.price10') }}</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        {{ __('messages.botsd') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">{{ __('messages.seo') }}</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>{{ __('messages.month') }}</span> {{ __('messages.price20') }}</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        {{ __('messages.seod') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">{{ __('messages.other') }}</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"></p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        {{ __('messages.otherd') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="main_body_info_sliders-item">
                            <button class="main_body_info_sliders-item--btn">
                                <p class="main_body_info_sliders-item--btn-text">{{ __('messages.des') }}</p>
                                <div class="main_body_info_sliders-item--btn-right">
                                    <p class="main_body_info_sliders-item--btn-text-hiden"><span>10 {{ __('messages.days') }}</span> {{ __('messages.price20') }}</p>
                                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.7033 0V18.5M18.7033 37V18.5M18.7033 18.5H37H0" stroke="white" stroke-width="2"/></svg>                                        
                                </div>
                            </button>
                            <div class="main_body_info_sliders-item-wrapper">
                                <div class="main_body_info_sliders-item-wrapper-content">
                                    <p class="main_body_info_sliders-item-wrapper-text">
                                        {{ __('messages.desd') }}
                                    </p>
                                    <ul class="main_body_info_sliders-item_list">
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">{{ __('messages.lend') }}</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>3 {{ __('messages.das') }}</span> {{ __('messages.price15') }}</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        {{ __('messages.lendd') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">{{ __('messages.corp') }}</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>7 {{ __('messages.days') }}</span> {{ __('messages.price25') }}</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        {{ __('messages.corpd') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="main_body_info_sliders-item_list--item">
                                            <button class="main_body_info_sliders-item_list--item--btn">
                                                <p class="main_body_info_sliders-item_list--item--btn-text">{{ __('messages.store') }}</p>
                                                <div class="main_body_info_sliders-item_list--item--btn-right">
                                                    <p class="main_body_info_sliders-item_list--item--btn-right-text"><span>14 {{ __('messages.days') }}</span> {{ __('messages.price40') }}</p>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.06593 0V6M6.06593 12V6M6.06593 6H12H0" stroke="white"/></svg>                                                        
                                                </div>
                                            </button>
                                            <div class="main_body_info_sliders-item_list--item-wrapper">
                                                <div class="main_body_info_sliders-item_list--item-content">
                                                    <p class="main_body_info_sliders-item_list--item-content-text">
                                                        {{ __('messages.stored') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
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
                @foreach ($cases as $case)
                    <li class="main_cases-item">
                        <a href="{{ route('case',$case->url) }}"></a>
                        <img src="{{ asset('storage/' . $case->img) }}" alt="{{ $case->title }}">
                    </li>  
                @endforeach
            </ul>
            <a href="{{ route('cases') }}" class="main_cases_list-after-link">{{ __('messages.more') }} <div class="main_contacts-wrapper-arrow"></div></a>
        </div>
    </section>
    <div class="main_contacts-wrap">
        <button href="/" class="main_contacts--link"></button>
        <section class="main_contacts" id="contacts">
            <div class="container">
                <div class="main_contacts-wrapper">
                    <p class="main_contacts-text">{{ __('messages.contacts') }}</p>
                    <div class="main_contacts-wrapper-arrow"></div>
                </div>
            </div>
        </section>
    </div>
@endsection