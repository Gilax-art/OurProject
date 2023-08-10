@extends('layouts.admin')
@push('scripts')
<script>
    function createLink ( str ) {
        var ru = {
            'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd',
            'е': 'e', 'ё': 'e', 'ж': 'j', 'з': 'z', 'и': 'i',
            'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o',
            'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u',
            'ф': 'f', 'х': 'h', 'ц': 'c', 'ч': 'ch', 'ш': 'sh',
            'щ': 'shch', 'ы': 'y', 'э': 'e', 'ю': 'u', 'я': 'ya'
        }, n_str = [];
        str = str.replace(/[ъь]+/g, '').replace(/й/g, 'i');
        for ( var i = 0; i < str.length; ++i ) {
            n_str.push(
                ru[ str[i] ]
                || ru[ str[i].toLowerCase() ] === undefined && str[i]
                || ru[ str[i].toLowerCase() ].replace(/^(.)/, function ( match ) { return match.toUpperCase() })
            );
        }
        return n_str.join('');
    }
    $('input[name="title_ru"]').on('input', function () {
        var j = createLink($(this).val());
        j = j.replace(/ /g, '-');
        j = j.replace(/,-/g, '-');
        j = j.replace(/\\/g, '-');
        j = j.replace(/\//g, '-');
        $('input[name="url"]').val(j.toLowerCase());
    });

    var dt = new DataTransfer();

 $('.input-multi input[type=file]').on('change', function(){
     let $files_list = $(this).closest('.input-multi').next();
     $files_list.empty();

     for(var i = 0; i < this.files.length; i++){
         let file = this.files.item(i);
         dt.items.add(file);

         let reader = new FileReader();
         reader.readAsDataURL(file);
         reader.onloadend = function(){
             let new_file_input = '<div class="input-file-list-item">' +
                 '<img class="input-file-list-img" src="' + reader.result + '">' +
                 '<span class="input-file-list-name">' + file.name + '</span>' +
                 '<a href="#" onclick="removeFilesItem(this); return false;" class="input-file-list-remove">x</a>' +
             '</div>';
             $files_list.append(new_file_input);
         }
     };
     this.files = dt.files;
 });

 function removeFilesItem(target){
     let name = $(target).prev().text();
     let input = $(target).closest('.input-file-row').find('input[type=file]');
     $(target).closest('.input-file-list-item').remove();
     for(let i = 0; i < dt.items.length; i++){
         if(name === dt.items[i].getAsFile().name){
             dt.items.remove(i);
         }
     }
     input[0].files = dt.files;
 }
</script>
@endpush
@section('content')
<h1 class="admin--title">Кейсы</h1>

<div class="admin--container">
    <a class="admin--link-back" href="{{ url()->previous() }}">Назад</a>
    <h2 style="margin-bottom: 20px;" class="admin--message">Редактировать</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="admin--message admin--message-alert">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="login_card-group-wrapper">
        <form enctype="multipart/form-data" action="{{ route('cases.update',$case->id) }}" method="POST">
            @csrf

            @method('PUT')
            <div class="login_card-group">
                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Заголовок_Рус</p>
                    <input class="input-text" required value="{{ $case->title_ru }}" type="text" name="title_ru" class="form-control" placeholder="Заголовок">
                </div>
                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Заголовок_Анг</p>
                    <input class="input-text" required value="{{ $case->title_en }}" type="text" name="title_en" class="form-control" placeholder="Заголовок">
                </div>

                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Ссылка на сайт</p>
                    <input class="input-text" required value="{{ $case->link }}" type="url" name="link" class="form-control" placeholder="Ссылка на сайт">
                </div>

                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Описание_Рус (Не обязательно)</p>
                    <textarea class="input-text input-textarea" name="description_ru" placeholder="Описание">@if(!empty($case->description_ru)) {{ $case->description_ru }} @endif</textarea>
                </div>
                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Описание_Анг (Не обязательно)</p>
                    <textarea class="input-text input-textarea" name="description_en" placeholder="Описание">@if(!empty($case->description_en)) {{ $case->description_en }} @endif</textarea>
                </div>

                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Картинка</p>
                    <label class="input-file">
                        <input type="file" type="file" name="img" accept="image/*" class="form-control">
                        <span>Выберите файл <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.2202 7.91548L8.78043 14.2674C8.63984 14.406 8.40516 14.3962 8.25612 14.2451C8.10705 14.094 8.10031 13.859 8.24091 13.7204L14.6806 7.3685C16.0415 6.02621 15.9761 3.74594 14.5351 2.28502C13.094 0.824018 10.8147 0.727472 9.45402 2.06957L9.03334 2.48452L6.82679 4.66095L1.64758 9.76951C0.570953 10.8314 0.622426 12.6361 1.76256 13.792C2.90303 14.9483 4.70644 15.0248 5.78338 13.9625L10.0782 9.7263L12.3715 7.46427C13.0738 6.77161 13.04 5.59483 12.2964 4.84093C11.5524 4.08669 10.3764 4.03701 9.67421 4.72965L3.95238 10.3734C3.81181 10.5121 3.57711 10.5023 3.42798 10.3511C3.27891 10.2 3.27237 9.96516 3.41294 9.82651L9.13475 4.18277C10.1177 3.21328 11.7646 3.28305 12.8057 4.33853C13.8468 5.39401 13.8939 7.04178 12.911 8.01128L10.6177 10.2733L6.32288 14.5095L6.11924 14.7104C6.08321 14.7459 6.04145 14.7713 5.99631 14.7874C4.6226 15.823 2.58162 15.6408 1.25328 14.2941C-0.184408 12.8365 -0.249559 10.5614 1.10794 9.22246L6.28735 4.11373L8.49389 1.93729L8.91457 1.52235C10.5561 -0.096476 13.306 0.0199278 15.0446 1.78251C16.783 3.54496 16.8617 6.29636 15.2202 7.91548Z" fill="white"/></svg></span>
                    </label>
                </div>

                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Сроки выполнения_Рус (Не обязательно)</p>
                    <input class="input-text" type="text" value="@if(!empty($case->deadlines_ru)) {{ $case->deadlines_ru }} @endif" name="deadlines_ru" class="form-control" placeholder="Сроки выполнения">
                </div>
                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Сроки выполнения_Анг (Не обязательно)</p>
                    <input class="input-text" type="text" value="@if(!empty($case->deadlines_en)) {{ $case->deadlines_en }} @endif" name="deadlines_en" class="form-control" placeholder="Сроки выполнения">
                </div>

                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Ссылка на проект</p>
                    <input class="input-text disabled" required value="{{ $case->url }}" type="text" name="url" class="form-control" placeholder="Ссылка на проект">
                </div>

                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Технологии_Рус (Не обязательно)</p>
                    <input class="input-text" type="text" value="@if(!empty($case->technologies_ru)) {{ $case->technologies_ru }} @endif" name="technologies_ru" class="form-control" placeholder="Технологии">
                </div>
                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Технологии_Анг (Не обязательно)</p>
                    <input class="input-text" type="text" value="@if(!empty($case->technologies_en)) {{ $case->technologies_en }} @endif" name="technologies_en" class="form-control" placeholder="Технологии">
                </div>

                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Отзыв клиента_Рус (Не обязательно)</p>
                    <textarea class="input-text input-textarea"  name="review_ru" placeholder="Отзыв клиента">@if(!empty($case->review_ru)) {{ $case->review_ru }} @endif</textarea>
                </div>
                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Отзыв клиента_Анг (Не обязательно)</p>
                    <textarea class="input-text input-textarea"  name="review_en" placeholder="Отзыв клиента">@if(!empty($case->review_en)) {{ $case->review_en }} @endif</textarea>
                </div>

                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Скриншоты (Не обязательно)</p>
                    <label class="input-file input-multi">
                        <input type="file" type="file" name="screenshots[]" multiple accept="image/*" class="form-control">
                        <span>Выберите файлы <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.2202 7.91548L8.78043 14.2674C8.63984 14.406 8.40516 14.3962 8.25612 14.2451C8.10705 14.094 8.10031 13.859 8.24091 13.7204L14.6806 7.3685C16.0415 6.02621 15.9761 3.74594 14.5351 2.28502C13.094 0.824018 10.8147 0.727472 9.45402 2.06957L9.03334 2.48452L6.82679 4.66095L1.64758 9.76951C0.570953 10.8314 0.622426 12.6361 1.76256 13.792C2.90303 14.9483 4.70644 15.0248 5.78338 13.9625L10.0782 9.7263L12.3715 7.46427C13.0738 6.77161 13.04 5.59483 12.2964 4.84093C11.5524 4.08669 10.3764 4.03701 9.67421 4.72965L3.95238 10.3734C3.81181 10.5121 3.57711 10.5023 3.42798 10.3511C3.27891 10.2 3.27237 9.96516 3.41294 9.82651L9.13475 4.18277C10.1177 3.21328 11.7646 3.28305 12.8057 4.33853C13.8468 5.39401 13.8939 7.04178 12.911 8.01128L10.6177 10.2733L6.32288 14.5095L6.11924 14.7104C6.08321 14.7459 6.04145 14.7713 5.99631 14.7874C4.6226 15.823 2.58162 15.6408 1.25328 14.2941C-0.184408 12.8365 -0.249559 10.5614 1.10794 9.22246L6.28735 4.11373L8.49389 1.93729L8.91457 1.52235C10.5561 -0.096476 13.306 0.0199278 15.0446 1.78251C16.783 3.54496 16.8617 6.29636 15.2202 7.91548Z" fill="white"/></svg></span>
                    </label>
                    <div class="input-file-list"></div>
                </div>

                <button type="submit" class="btn btn-primary main_head_content_info--link">Подтвердить изменения</button>
            </div>
        </form>

        <div class="login_card-group-wrapper-image-wrapper">
            <div class="login_card-group-wrapper-image">
                <img src="{{ asset('storage/' . $case->img) }}" alt="{{ $case->title }}">
            </div>
            <div style="max-width: 300px;" class="admin--team-card_scrins">
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
</div>
@endsection
