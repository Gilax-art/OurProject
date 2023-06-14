@extends('layouts.admin')

@section('content')
    <h1 class="admin--title">Привет, Admin!</h1>

    @if (!$orders->isEmpty())
        <h2 class="admin--subtitle">Появились новые заказы!</h2>
    @else
        <h2 class="admin--subtitle">Новых заказов пока нет :(</h2>
    @endif
    <div class="admin_main-wrapper">
        <section class="admin_main_left">
            @if(!$orders->isEmpty())
                <ul class="admin_main_left_list">
                    @foreach ($orders as $order)
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
        </section>
        <aside class="admin_main_right">
            <p class="admin_main_right-text">Всего заказов принято: <span>{{ $ordersCount }}</span></p>
            <p class="admin_main_right-text">Всего сотрудников в команде: <span>{{ $teamCount }}</span></p>
            <p class="admin_main_right-text">Всего кейсов в портфолио: <span>{{ $casesCount }}</span></p>
            <p class="admin_main_right-text">Всего отзывов на сайте: <span>{{ $reviewsCount }}</span></p>
        </aside>
    </div>
@endsection