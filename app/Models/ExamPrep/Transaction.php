<?php

namespace App\Models\ExamPrep;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
   
    protected $table = 'transactions';
    use HasFactory;

    protected $fillable = [
        'user_unique_id',
        'first_name',
        'last_name',
        'amount',
        'reference',
        'email',
        'phone',
        'currency',
        'orderID',
        'services',
        'plan_name',
        'active_status',
        'payment_status',
        'payment_method',
        'expiry_date'
    ];
}
