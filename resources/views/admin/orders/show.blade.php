@extends('layouts.admin')

@section('content')
<h1 class="admin--title">Заказы</h1>
<div class="admin--container">
    <a class="admin--link-back" href="{{ route('orders.index') }}">Назад</a>
    
    <div class="admin--order-group">
        <p class="admin--order-group-status
            @if($order->status === 'Отклонён') red @endif
            @if($order->status === 'Принят') green @endif
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
    </div>

    @if($order->status === 'Новый')
        <div class="admin--order-btns">
            <form action="{{ route('orders.take',$order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="admin--order-group-status green" type="submit">Принять</button>
            </form>
            <form action="{{ route('orders.decline',$order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="admin--order-group-status red" type="submit">Отклонить</button>
            </form>
        </div>
    @endif
</div>
@endsection