<?php

namespace App\Models\ExamPrep;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carddetail extends Model
{
    protected $table = 'carddetails';
    use HasFactory;

    protected $fillable = [

        'user_unique_id',
        'authorization_code',
        'bin',
        'last4',
        'exp_month',
        'exp_year',
        'channel',
        'card_type',
        'bank',
        'country_code',
        'brand',
        'reusable',
        'signature'
    ];
}
