<?php

namespace App\Models\ExamPrep;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    protected $table = 'exams';
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'title',
        'description',
        'avatar',
        'status'
    ];
}
