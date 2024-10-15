<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'users';
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'first_name',
        'last_name',
        'username',
        'email',
        'terms',
        'role',
        'password'
    ];




}
