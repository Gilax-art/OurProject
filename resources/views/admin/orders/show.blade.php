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

    $('.admin--order-group--nnv-btn').on('click',function(){
        if($(this).attr('type') === 'button'){
            $(this).hide(0);
            $('.admin--order-group--nnv').show(0);
            $('.admin--order-btns').addClass('active');
        }
    });
</script>
@endpush
@section('content')
<h1 class="admin--title">Заказы</h1>
<div class="admin--container">
    <a class="admin--link-back" href="{{ route('orders.index') }}">Назад</a>
    
    <div class="admin--order-group">
        <p class="admin--order-group-status
            @if($order->status === 'Отклонён') red @endif
            @if($order->status === 'В обработке') orange @endif
            @if($order->status === 'В работе') green @endif
            @if($order->status === 'Завершён') blue @endif
        ">{{ $order->status }}</p>

        <p class="admin--order-group-num">Заказ № <span>{{ $order->id }}</span> от <span>{{ $order->created_at }}</span></p>
        <h2 class="admin--order-group-name">{{ $order->name }}</h2>
        <p class="admin--order-group-phone">{{ $order->phone }}</p>
        @if(!empty($order->file))
            <a style="word-break: break-all" href="{{ $order->file }}" download="{{ $order->file }}" class="admin--team-card-link">Скачать ТЗ</a>
        @endif
        @if(!empty($order->description))
        <p class="admin--order-group-textlong"><span>Описание</span> {{ $order->description }}</p>
        @endif

        @if($order->status != 'Новый' && $order->status != 'отклонён')
        <div class="admin--order-group-other-info">
            @if(!empty($order->status_user_id))
                <div class="admin--order-group-other-info-row">
                    <span class="admin--order-group-other-info-name">Принял:</span>
                    <p class="admin--order-group-other-info-text">{{$user_name}}</p>
                </div>
            @endif
            @if(!empty($order->start_data))
                <div class="admin--order-group-other-info-row">
                    <span class="admin--order-group-other-info-name">Начал:</span>
                    <p class="admin--order-group-other-info-text">{{$start_user_name}}</p>
                </div>
                <div class="admin--order-group-other-info-row">
                    <span class="admin--order-group-other-info-name">Дата начала:</span>
                    <p class="admin--order-group-other-info-text">{{$start_date}}</p>
                </div>
                <div class="admin--order-group-other-info-row">
                    <span class="admin--order-group-other-info-name">Дедлайн:</span>
                    <p class="admin--order-group-other-info-text">{{$order->deadline}}</p>
                </div>
                <div class="admin--order-group-other-info-row">
                    <span class="admin--order-group-other-info-name">Участники:</span>
                    @foreach($users as $user)
                        <p class="admin--order-group-other-info-text">{{$user}}</p>
                    @endforeach
                </div>
            @endif
            @if(!empty($order->finish_data))
                <div class="admin--order-group-other-info-row">
                    <span class="admin--order-group-other-info-name">Завершил:</span>
                    <p class="admin--order-group-other-info-text">{{$finish_user_name}}</p>
                </div>
                <div class="admin--order-group-other-info-row">
                    <span class="admin--order-group-other-info-name">Дата завершения:</span>
                    <p class="admin--order-group-other-info-text">{{$finish_date}}</p>
                </div> 
            @endif
        </div>
        @endif
    </div>
        <div class="admin--order-btns">
            @if($order->status === 'Новый')
            <form action="{{ route('orders.take',$order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="admin--order-group-status green" type="submit">Принять</button>
            </form>
            @endif

            @if($order->status === 'В обработке')
            <form action="{{ route('orders.start',$order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="admin--order-group--nnv">
                    <div class="admin--order-group--nnv-content">
                        <div class="login_card-row">
                            <p style="font-size: 18px;" class="col-form-label">Дедлайн</p>
                            <input class="input-text" required type="date" name="deadline" class="form-control" placeholder="Дедлайн">
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
                        <button class="admin--order-group-status green" type="submit">Начать выполнение</button>
                    </div>
                </div>
                <button class="admin--order-group-status green admin--order-group--nnv-btn" type="button">Начать выполнение</button>
            </form>
            @endif

            @if($order->status === 'В работе')
            <form action="{{ route('orders.finish',$order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="admin--order-group-status green" type="submit">Завершить</button>
            </form>
            @endif
            
            @if($order->status === 'Новый' || $order->status === 'В обработке')
            <form action="{{ route('orders.decline',$order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="admin--order-group-status red" type="submit">Отклонить</button>
            </form>
            @endif
        </div>
</div>
@endsection