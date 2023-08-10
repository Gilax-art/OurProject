@extends('layouts.admin')

@section('content')
<h1 class="admin--title">Кейсы</h1>
<div class="admin--container">
    <a class="admin--link-back" href="{{ url()->previous() }}">Назад</a>
    
    <div class="admin--team-card-wrapper">
        <div class="admin--case-card">
            <div class="admin--case-card-top">
                <div class="admin--team-card-image">
                    <img src="{{ asset('storage/' . $case->img) }}" alt="{{ $case->title }}">
                </div>
                <div class="admin--case-card-info">
                    <a target="_blank" class="admin--team-card-link" href="{{ $case->link }}">{{ $case->link }}</a>
                    <h2 class="admin--team-card-name">{{ $case->title_ru }}</h2>
                    <h2 class="admin--team-card-name">{{ $case->title_en }}</h2>
                </div>
            </div>
            <div class="admin--case-card-bot">
                @if(!empty($case->description_ru))
                    <p class="admin--cases-card-p">Описание</p>
                    <p class="admin--team-card-status">{{ $case->description_ru }}</p>
                    <p class="admin--team-card-status">{{ $case->description_en }}</p>
                @endif
                @if(!empty($case->description_ru))
                    <p class="admin--cases-card-p">Сроки</p>
                    <h3 class="admin--team-card-status">{{ $case->deadlines_ru }}</h3>
                    <h3 class="admin--team-card-status">{{ $case->deadlines_en }}</h3>
                @endif
                @if(!empty($case->description_ru))
                    <p class="admin--cases-card-p">Технологии</p>
                    <h3 class="admin--team-card-status">{{ $case->technologies_ru }}</h3>
                    <h3 class="admin--team-card-status">{{ $case->technologies_en }}</h3>
                @endif
                @if(!empty($case->description_ru))
                    <p class="admin--cases-card-p">Отзыв клиента</p>
                    <h3 class="admin--team-card-status">{{ $case->review_ru }}</h3>
                    <h3 class="admin--team-card-status">{{ $case->review_en }}</h3>
                @endif
            </div>
        </div>
        <div class="admin--team-card_scrins">
            @if(!empty($case->screenshots))
                @php
                    $screenshots = json_decode($case->screenshots);
                @endphp
                @foreach($screenshots as $screenshot)
                    <img src="{{ asset('storage/' . $screenshot) }}" alt="{{ $case->title }}">
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection