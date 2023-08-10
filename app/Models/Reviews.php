<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'id',
        'name_ru',
        'name_en',
        'text_ru',
        'text_en',
        'link',
        'img',
        'created_at',
    ];
}
