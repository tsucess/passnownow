<?php

namespace App\Models;

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
        'currency',
        'orderID',
        'plan_name',
        'payment_status',
        'expiry_date'
    ];
}
