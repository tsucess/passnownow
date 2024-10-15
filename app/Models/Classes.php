<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'user_unique_id',
        'title',
        'description'
    ];
}
