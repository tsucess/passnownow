<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = 'subjects';
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'user_unique_id',
        'title',
        'description',
        'class_unique_id',
        'avatar'
    ];
}
