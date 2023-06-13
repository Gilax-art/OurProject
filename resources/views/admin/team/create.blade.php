@extends('layouts.admin')

@section('content')
<h1 class="admin--title">Команда</h1>

<div class="admin--container">
    <a class="admin--link-back" href="{{ route('team.index') }}">Назад</a>
    <h2 style="margin-bottom: 20px;" class="admin--message">Добавить члена команды</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="admin--message">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form enctype="multipart/form-data" action="{{ route('team.store') }}" method="POST">
        @csrf
         <div class="login_card-group">
            <div class="login_card-row">
                <p style="font-size: 18px;" class="col-form-label">Имя</p>
                <input class="input-text" required type="text" name="title" class="form-control" placeholder="Имя">
            </div>
    
            <div class="login_card-row">
                <p style="font-size: 18px;" class="col-form-label">Статус</p>
                <input class="input-text" required type="text" name="status" class="form-control" placeholder="Статус">
            </div>
    
            <div class="login_card-row">
                <p style="font-size: 18px;" class="col-form-label">Аватарка</p>
                <label class="input-file">
                    <input type="file" required type="file" name="img" class="form-control">		
                    <span>Выберите файл <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.2202 7.91548L8.78043 14.2674C8.63984 14.406 8.40516 14.3962 8.25612 14.2451C8.10705 14.094 8.10031 13.859 8.24091 13.7204L14.6806 7.3685C16.0415 6.02621 15.9761 3.74594 14.5351 2.28502C13.094 0.824018 10.8147 0.727472 9.45402 2.06957L9.03334 2.48452L6.82679 4.66095L1.64758 9.76951C0.570953 10.8314 0.622426 12.6361 1.76256 13.792C2.90303 14.9483 4.70644 15.0248 5.78338 13.9625L10.0782 9.7263L12.3715 7.46427C13.0738 6.77161 13.04 5.59483 12.2964 4.84093C11.5524 4.08669 10.3764 4.03701 9.67421 4.72965L3.95238 10.3734C3.81181 10.5121 3.57711 10.5023 3.42798 10.3511C3.27891 10.2 3.27237 9.96516 3.41294 9.82651L9.13475 4.18277C10.1177 3.21328 11.7646 3.28305 12.8057 4.33853C13.8468 5.39401 13.8939 7.04178 12.911 8.01128L10.6177 10.2733L6.32288 14.5095L6.11924 14.7104C6.08321 14.7459 6.04145 14.7713 5.99631 14.7874C4.6226 15.823 2.58162 15.6408 1.25328 14.2941C-0.184408 12.8365 -0.249559 10.5614 1.10794 9.22246L6.28735 4.11373L8.49389 1.93729L8.91457 1.52235C10.5561 -0.096476 13.306 0.0199278 15.0446 1.78251C16.783 3.54496 16.8617 6.29636 15.2202 7.91548Z" fill="white"/></svg></span>
                </label>
            </div>
            <button type="submit" class="btn btn-primary main_head_content_info--link">Создать</button>
        </div>
    </form>
</div>
@endsection