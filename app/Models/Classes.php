<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'classess';

    protected $fillable = [
        'user_unique_id',
        'title',
        'description'
    ];
}
