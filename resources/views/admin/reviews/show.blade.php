@extends('layouts.admin')

@section('content')
<h1 class="admin--title">Отзывы</h1>
<div class="admin--container">
    <a class="admin--link-back" href="{{ url()->previous() }}">Назад</a>
    
    <div class="admin--team-card">
        @if(!empty($review->img))
        <div class="admin--team-card-image">
            <img src="{{ asset('storage/' . $review->img) }}" alt="{{ $review->name_ru }}">
        </div>
        @endif
        @if(!empty($review->link))
            <a target="_blank" class="admin--team-card-link" href="{{ $review->link }}">{{ $review->link }}</a>
        @endif
        <h2 class="admin--team-card-name">{{ $review->name_ru }}</h2>
        <h2 class="admin--team-card-name">{{ $review->name_en }}</h2>
        <p class="admin--team-card-textlong">{{ $review->text_ru }}</p>
        <p class="admin--team-card-textlong">{{ $review->text_en }}</p>
    </div>
</div>
@endsection