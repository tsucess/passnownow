<?php

namespace App\Models;

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
