<?php

namespace App\Models\ExamPrep;

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
        'question',
        'ans',
        'options',
        'status',
        'year',
        'url',
        'exam_unique_id',
        'order'
    ];
}
