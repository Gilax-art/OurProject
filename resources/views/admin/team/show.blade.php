@extends('layouts.admin')

@section('content')
<h1 class="admin--title">Команда</h1>
<div class="admin--container">
    <a class="admin--link-back" href="{{ url()->previous() }}">Назад</a>
    
    <div class="admin--team-card">
        <div class="admin--team-card-image">
            <img src="{{ asset('storage/' . $team->img) }}" alt="{{ $team->title_ru }}">
        </div>
        <h2 class="admin--team-card-name">{{ $team->title_ru }}</h2>
        <h2 class="admin--team-card-name">{{ $team->title_en }}</h2>
        <h3 class="admin--team-card-status">{{ $team->status_ru }}</h3>
        <h3 class="admin--team-card-status">{{ $team->status_en }}</h3>
    </div>
</div>
@endsection