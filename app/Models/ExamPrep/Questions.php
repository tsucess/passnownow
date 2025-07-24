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
        'mark',
        'ans',
        'options',
        'status',
        'question_type',
        'subject_unique_id',
        'order'
    ];
}
