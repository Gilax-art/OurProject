<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'id',
        'title_ru',
        'title_en',
        'description_ru',
        'description_en',
        'img',
        'link',
        'url',
        'deadlines_ru',
        'deadlines_en',
        'technologies_ru',
        'technologies_en',
        'review_ru',
        'review_en',
        'screenshots',
        'created_at',
    ];
}
