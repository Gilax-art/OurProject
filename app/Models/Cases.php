<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
        'img',
        'link',
        'url',
        'deadlines',
        'technologies',
        'review',
        'screenshots',
        'created_at',
    ];
}
