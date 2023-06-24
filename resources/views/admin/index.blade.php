@extends('layouts.admin')

@section('content')
    <h1 class="admin--title">Привет, {{ Auth::user()->name }}!</h1>

    @if (!$orders_new->isEmpty())
        <h2 class="admin--subtitle">Появились новые заказы!</h2>
    @else
        <h2 class="admin--subtitle">Новых заказов пока нет :(</h2>
    @endif
    <div class="admin_main-wrapper">
        <section class="admin_main_left">
            @if(!$orders_new->isEmpty())
                <p class="admin_main_right-text">Новые</p> <br>
                <ul class="admin_main_left_list">
                    @foreach ($orders_new as $order)
                        <li class="admin_main_left_list-item">
                            <div class="admin_main_left_list-item-top">
                                <p class="admin_main_left_list-item-name">№{{ $order->id }}</p>
                                <p class="admin_main_left_list-item-name">от {{ $order->created_at }}</p>
                            </div>
                            <p class="admin_main_left_list-item-ttl">{{ $order->name }}</p>
                            <a class="admin_main_left_list-item-link" href="{{ route('orders.show',$order->id) }}">Смотреть</a>
                        </li>
                    @endforeach
                </ul>
            @endif
            <br>
            @if(!$orders_current->isEmpty())
            <p class="admin_main_right-text">В разработке</p> <br>
                <ul class="admin_main_left_list">
                    @foreach ($orders_current as $order)
                        <li class="admin_main_left_list-item green">
                            <div class="admin_main_left_list-item-top">
                                <p class="admin_main_left_list-item-name">№{{ $order->id }}</p>
                                <p class="admin_main_left_list-item-name">от {{ $order->created_at }}</p>
                            </div>
                            <p class="admin_main_left_list-item-ttl">{{ $order->name }}</p>
                            <a class="admin_main_left_list-item-link" href="{{ route('orders.show',$order->id) }}">Смотреть</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>
        <div class="admin_main_right-wrapper">
            <aside class="admin_main_right">
                <p class="admin_main_right-text">Новых заказов: <span>{{ $orders_new_count }}</span></p>
                <p class="admin_main_right-text">Заказов сейчас в работе: <span>{{ $orders_current_count }}</span></p>
                <p class="admin_main_right-text">Заказов сейчас в обработке: <span>{{ $orders_in_processing_count }}</span></p>
                <p class="admin_main_right-text">Всего заказов выполнено: <span>{{ $orders_done_count }}</span></p>
                <p class="admin_main_right-text">Сотрудников в команде: <span>{{ $teamCount }}</span></p>
                <p class="admin_main_right-text">Кейсов в портфолио: <span>{{ $casesCount }}</span></p>
                <p class="admin_main_right-text">Отзывов на сайте: <span>{{ $reviewsCount }}</span></p>
            </aside>
            <br>
            @if(!$orders_in_processing->isEmpty())
                <p style="margin-top: 38px;" class="admin_main_right-text">В обработке</p>
                    <ul class="admin_main_left_list">
                        @foreach ($orders_in_processing as $order)
                            <li class="admin_main_left_list-item orange">
                                <div class="admin_main_left_list-item-top">
                                    <p class="admin_main_left_list-item-name">№{{ $order->id }}</p>
                                    <p class="admin_main_left_list-item-name">от {{ $order->created_at }}</p>
                                </div>
                                <p class="admin_main_left_list-item-ttl">{{ $order->name }}</p>
                                <a class="admin_main_left_list-item-link" href="{{ route('orders.show',$order->id) }}">Смотреть</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
        </div>
    </div>
@endsection