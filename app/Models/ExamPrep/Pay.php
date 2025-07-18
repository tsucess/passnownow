<?php

namespace App\Models\ExamPrep;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'first_name',
        'last_name',
        'amount',
        'reference',
        'email',
        'phone',
        'currency',
        'plan',
        'active_status',
        'payment_status',
        'payment_method'
    ];
}
