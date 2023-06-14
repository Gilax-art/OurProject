@extends('layouts.admin')

@section('content')
<h1 class="admin--title">Кейсы</h1>
<div class="admin--container">
    <a class="admin--link-back" href="{{ route('cases.index') }}">Назад</a>
    
    <div class="admin--team-card">
        <div class="admin--team-card-image">
            <img src="{{ asset('storage/' . $case->img) }}" alt="{{ $case->title }}">
        </div>
        <a target="_blank" class="admin--team-card-link" href="{{ $case->link }}">{{ $case->link }}</a>
        <h2 class="admin--team-card-name">{{ $case->title }}</h2>
        @if(!empty($case->description))
            <h3 class="admin--team-card-status">{{ $case->description }}</h3>
        @endif
    </div>
</div>
@endsection