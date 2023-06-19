@extends('layouts.admin')
@push('scripts')
<script>
    let multiselect_block = document.querySelectorAll(".multiselect_block");
    multiselect_block.forEach(parent => {
        let label = parent.querySelector(".field_multiselect");
        let select = parent.querySelector(".field_select");
        let text = label.innerHTML;
        select.addEventListener("change", function(element) {
            let selectedOptions = this.selectedOptions;
            label.innerHTML = "";
            for (let option of selectedOptions) {
                let button = document.createElement("button");
                button.type = "button";
                button.className = "btn_multiselect";
                button.textContent = option.dataset.name;
                button.onclick = _ => {
                    option.selected = false;
                    button.remove();
                    if (!select.selectedOptions.length) label.innerHTML = text
                };
                label.append(button);
            }
        })
    });
</script>
@endpush
@section('content')
<h1 class="admin--title">Заказы</h1>

<div class="admin--container">
    <a class="admin--link-back" href="{{ route('orders.index') }}">Назад</a>
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
        <form enctype="multipart/form-data" action="{{ route('orders.update',$order->id) }}" method="POST">
            @csrf

            @method('PUT')
            <div class="login_card-group">
                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Имя</p>
                    <input class="input-text" required type="text" value="{{ $order->name }}" name="name" class="form-control" placeholder="Имя">
                </div>

                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Телефон</p>
                    <input class="input-text" required type="tel" value="{{ $order->phone }}" name="phone" class="form-control" placeholder="Телефон">
                </div>

                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Описание (Не обязательно)</p>
                    <textarea class="input-text input-textarea" name="description" placeholder="Описание">@if(!empty($order->description)) {{ $order->description }} @endif</textarea>
                </div>

                <div class="login_card-row">
                    @if(!empty($order->file))
                        <a style="word-break: break-all;" href="{{ $order->file }}" download="{{ $order->file }}" class="admin--team-card-link">Текущий ТЗ файл (Скачать)</a>
                    @endif
                </div>

                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Файл с ТЗ (Не обязательно)</p>
                    <label class="input-file">
                        <input type="file" type="file" name="file" class="form-control">
                        <span>Выберите новый файл <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.2202 7.91548L8.78043 14.2674C8.63984 14.406 8.40516 14.3962 8.25612 14.2451C8.10705 14.094 8.10031 13.859 8.24091 13.7204L14.6806 7.3685C16.0415 6.02621 15.9761 3.74594 14.5351 2.28502C13.094 0.824018 10.8147 0.727472 9.45402 2.06957L9.03334 2.48452L6.82679 4.66095L1.64758 9.76951C0.570953 10.8314 0.622426 12.6361 1.76256 13.792C2.90303 14.9483 4.70644 15.0248 5.78338 13.9625L10.0782 9.7263L12.3715 7.46427C13.0738 6.77161 13.04 5.59483 12.2964 4.84093C11.5524 4.08669 10.3764 4.03701 9.67421 4.72965L3.95238 10.3734C3.81181 10.5121 3.57711 10.5023 3.42798 10.3511C3.27891 10.2 3.27237 9.96516 3.41294 9.82651L9.13475 4.18277C10.1177 3.21328 11.7646 3.28305 12.8057 4.33853C13.8468 5.39401 13.8939 7.04178 12.911 8.01128L10.6177 10.2733L6.32288 14.5095L6.11924 14.7104C6.08321 14.7459 6.04145 14.7713 5.99631 14.7874C4.6226 15.823 2.58162 15.6408 1.25328 14.2941C-0.184408 12.8365 -0.249559 10.5614 1.10794 9.22246L6.28735 4.11373L8.49389 1.93729L8.91457 1.52235C10.5561 -0.096476 13.306 0.0199278 15.0446 1.78251C16.783 3.54496 16.8617 6.29636 15.2202 7.91548Z" fill="white"/></svg></span>
                    </label>
                </div>

                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Статус</p>
                    <div class="login_card-row-radio">
                        <label class="input-radio--label">
                            <input type="radio" @if($order->status === \App\Helpers\OrderStatusEnum::NOW->value) @checked(true)  @endif class="input-radio" value="Новый" name="status">
                            <div class="input-radio--label-content">
                                <div class="input-radio--label-indicator">
                                    <div class="input-radio--label-indicator-fill"></div>
                                </div>
                                <span class="input-radio--label-text">Новый</span>
                            </div>
                        </label>
                        <label class="input-radio--label">
                            <input @if($order->status === \App\Helpers\OrderStatusEnum::REFUNDED->value) @checked(true) @endif type="radio" class="input-radio" value="Отклонён" name="status">
                            <div class="input-radio--label-content">
                                <div class="input-radio--label-indicator">
                                    <div class="input-radio--label-indicator-fill"></div>
                                </div>
                                <span class="input-radio--label-text">Отклонён</span>
                            </div>
                        </label>
                        <label class="input-radio--label">
                            <input @if($order->status === \App\Helpers\OrderStatusEnum::PENDING->value) @checked(true) @endif type="radio" class="input-radio" value="В обработке" name="status">
                            <div class="input-radio--label-content">
                                <div class="input-radio--label-indicator">
                                    <div class="input-radio--label-indicator-fill"></div>
                                </div>
                                <span class="input-radio--label-text">В обработке</span>
                            </div>
                        </label>
                        <label class="input-radio--label">
                            <input @if($order->status === \App\Helpers\OrderStatusEnum::WORK->value) @checked(true) @endif type="radio" class="input-radio" value="В работе" name="status">
                            <div class="input-radio--label-content">
                                <div class="input-radio--label-indicator">
                                    <div class="input-radio--label-indicator-fill"></div>
                                </div>
                                <span class="input-radio--label-text">В работе</span>
                            </div>
                        </label>
                        <label class="input-radio--label">
                            <input @if($order->status === \App\Helpers\OrderStatusEnum::COMPLETED->value) @checked(true) @endif type="radio" class="input-radio" value="Завершён" name="status">
                            <div class="input-radio--label-content">
                                <div class="input-radio--label-indicator">
                                    <div class="input-radio--label-indicator-fill"></div>
                                </div>
                                <span class="input-radio--label-text">Завершён</span>
                            </div>
                        </label>
                    </div>
                </div>
                @if(!empty($order->deadline))
                <div class="login_card-row">
                    <p style="font-size: 18px;" class="col-form-label">Дедлайн</p>
                    <input class="input-text" type="date" name="deadline" value="{{ $order->deadline }}" class="form-control" placeholder="Дедлайн">
                </div>
                <div class="login_card-row login_card-row-multiselect">
                    <p style="font-size: 18px;" class="col-form-label">Участники</p>
                        <div class="form_label">
                        <div class="multiselect_block">
                          <label for="select-1" class="field_multiselect">Участники</label>

                          <input id="checkbox-1" class="multiselect_checkbox" type="checkbox">
                          <label for="checkbox-1" class="multiselect_label"></label>

                          <select id="select-1" class="field_select" name="users[]" multiple>
                            @foreach ($team as $mate)
                                <option value="{{$mate->id}}" data-name="{{$mate->title}}">{{$mate->title}}</option>
                            @endforeach
                          </select>
                          <span class="field_multiselect_help">Чтобы выбрать несколько - зажмите <b>Ctrl + Участник</b></span>
                        </div>
                        <span class="error_text"></span>
                      </div>
                </div>
                @endif
                <button type="submit" class="btn btn-primary main_head_content_info--link">Подтвердить изменения</button>
            </div>
        </form>
    </div>
</div>
@endsection
