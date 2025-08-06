<?php

namespace App\Models\ExamPrep;

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
        'gender',
        'terms',
        'role',
        'password'
    ];




}
