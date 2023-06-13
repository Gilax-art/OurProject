@extends('layouts.admin')

@section('content')
<h1 class="admin--title">Команда</h1>
<div class="admin--container">
    <a class="admin--link-back" href="{{ route('team.index') }}">Назад</a>
    
    <div class="admin--team-card">
        <div class="admin--team-card-image">
            <img src="{{ asset('storage/' . $team->img) }}" alt="{{ $team->title }}">
        </div>
        <h2 class="admin--team-card-name">{{ $team->title }}</h2>
        <h3 class="admin--team-card-status">{{ $team->status }}</h3>
    </div>
</div>
@endsection