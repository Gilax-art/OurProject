@extends('layouts.main')

@section('content')
<section class="back-line">
    <div class="container">
        <a class="link--back" href="{{ route('/') }}"><svg width="21" height="8" viewBox="0 0 21 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.646445 4.35356C0.451183 4.15829 0.451183 3.84171 0.646445 3.64645L3.82842 0.464468C4.02369 0.269205 4.34027 0.269205 4.53553 0.464468C4.73079 0.65973 4.73079 0.976312 4.53553 1.17157L1.7071 4L4.53553 6.82843C4.73079 7.02369 4.73079 7.34027 4.53553 7.53554C4.34027 7.7308 4.02369 7.7308 3.82843 7.53554L0.646445 4.35356ZM21 4.5L0.999998 4.5L0.999998 3.5L21 3.5L21 4.5Z" fill="#8F8F8F"/></svg>{{ __('messages.back') }}</a>
    </div>
</section>
<section class="cases">
    <div class="container">
        <h1 class="cases--title">{{ __('messages.ourprojects') }}</h1>
        <ul class="main_cases_list">
            @foreach ($cases as $case)
                <li class="main_cases-item">
                    <a href="{{ route('case',$case->url) }}"></a>
                    <img src="{{ asset('storage/' . $case->img) }}" alt="{{ $case->title }}">
                </li>  
            @endforeach
        </ul>
        {{ $cases->onEachSide(5)->links() }}
    </div>
</section>
@endsection