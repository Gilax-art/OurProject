<?php

namespace App\Helpers;

enum OrderStatusEnum : string
{
    case PENDING = 'В обработке';
    case COMPLETED = 'Завершён';
    case NOW = 'Новый';
    case REFUNDED ='Отклонён';
    case WORK = 'В работе';
}
