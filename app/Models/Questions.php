<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = 'questions';
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'unique_id',
        'user_unique_id',
        'title',
        'year',
        'url',
        'exam_unique_id',
        'order'
    ];
}
