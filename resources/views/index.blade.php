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
                        <a href="/" class="main_head_content_info--link">Связаться с нами</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection