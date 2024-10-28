<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'user_unique_id',
        'title',
        'url',
        'subject_unique_id',
        'term',
        'order'
    ];
}
