@extends('layouts.admin')

@section('content')
<h1 class="admin--title">Отзывы</h1>
<div class="admin--container">
    <a class="admin--link-back" href="{{ route('reviews.index') }}">Назад</a>
    
    <div class="admin--team-card">
        @if(!empty($review->img))
        <div class="admin--team-card-image">
            <img src="{{ asset('storage/' . $review->img) }}" alt="{{ $review->name }}">
        </div>
        @endif
        @if(!empty($review->link))
            <a target="_blank" class="admin--team-card-link" href="{{ $review->link }}">{{ $review->link }}</a>
        @endif
        <h2 class="admin--team-card-name">{{ $review->name }}</h2>
        <p class="admin--team-card-textlong">{{ $review->text }}</p>
    </div>
</div>
@endsection