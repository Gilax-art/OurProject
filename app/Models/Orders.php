<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'phone',
        'description',
        'file',
        'status',
        'status_user_id',
        'start_data',
        'deadline',
        'users',
        'finish_data',
        'created_at',
    ];
}
