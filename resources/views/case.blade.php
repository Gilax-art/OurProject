@extends('layouts.main')
@push('script')
    <script>
        const height = $('.case_article').height();
        console.log(height);
        $('.case_scrins').css({
            'max-height': height,
        });
    </script>
@endpush
@section('content')
<section class="back-line">
    <div class="container">
        <a class="link--back" href="{{ url()->previous() }}"><svg width="21" height="8" viewBox="0 0 21 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.646445 4.35356C0.451183 4.15829 0.451183 3.84171 0.646445 3.64645L3.82842 0.464468C4.02369 0.269205 4.34027 0.269205 4.53553 0.464468C4.73079 0.65973 4.73079 0.976312 4.53553 1.17157L1.7071 4L4.53553 6.82843C4.73079 7.02369 4.73079 7.34027 4.53553 7.53554C4.34027 7.7308 4.02369 7.7308 3.82843 7.53554L0.646445 4.35356ZM21 4.5L0.999998 4.5L0.999998 3.5L21 3.5L21 4.5Z" fill="#8F8F8F"/></svg>Назад</a>
    </div>
</section>
<section class="case">
    <div class="container">
        <div class="case-poster">
            <img src="{{ asset('storage/' . $case->img) }}" alt="{{$case->title}}">
        </div>
        <div class="case_content">
            <article class="case_article">
                <h1 class="cases--title">{{$case->title}}</h1>
                <div class="case_article_main">
                    <div class="case_article_main_left">
                        <div class="case_article_main_left-mm">
                            @if(!empty($case->deadlines))
                            <div class="case_article_main_left-group">
                                <p class="case_article_main_left-group-name">Сроки</p>
                                <p class="case_article_main_left-group-text">{{$case->deadlines}}</p>
                            </div>
                            @endif
                            @if(!empty($case->technologies))
                            <div class="case_article_main_left-group">
                                <p class="case_article_main_left-group-name">Технологии</p>
                                <p class="case_article_main_left-group-text">{{$case->technologies}}</p>
                            </div>
                            @endif
                        </div>
                        <a target="_blank" class="case_article--link" href="{{$case->link}}">Открыть сайт <svg width="21" height="8" viewBox="0 0 21 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.3536 4.35356C20.5488 4.15829 20.5488 3.84171 20.3536 3.64645L17.1716 0.464468C16.9763 0.269205 16.6597 0.269205 16.4645 0.464468C16.2692 0.65973 16.2692 0.976312 16.4645 1.17157L19.2929 4L16.4645 6.82843C16.2692 7.02369 16.2692 7.34027 16.4645 7.53554C16.6597 7.7308 16.9763 7.7308 17.1716 7.53554L20.3536 4.35356ZM-4.37114e-08 4.5L20 4.5L20 3.5L4.37114e-08 3.5L-4.37114e-08 4.5Z" fill="white"/></svg></a>
                    </div>
                    <div class="case_article_main_right">
                        @if(!empty($case->description))
                            <p class="case_article_main_right-name">Описание проекта</p>
                            <p class="case_article_main_right-text">{{$case->description}}</p>
                        @endif
                    </div>
                </div>
                @if(!empty($case->review))
                    <div style="padding-top: 20px;" class="case_article_main_left-group">
                        <p class="case_article_main_left-group-name">Отзыв клиента</p>
                        <p class="case_article_main_left-group-text">{{$case->review}}</p>
                    </div>
                @endif
            </article>
            @if(!empty($case->screenshots))
            <section class="case_scrins">
                <p class="case_scrins-ttl">Скриншоты</p>
                @php
                    $screenshots = json_decode($case->screenshots);
                @endphp
                @foreach($screenshots as $screenshot)
                    <img src="{{ asset('storage/' . $screenshot) }}" alt="{{ $case->title }}">
                @endforeach
            </section>
            @endif
        </div>
    </div>
</section>
@endsection