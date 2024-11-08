<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('user_unique_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('payment_id');
            $table->string('plan_name');
            $table->string('amount');
            $table->string('currency');
            $table->string('payment_status');
            $table->string('payment_method');
            $table->string('txn_id');
            $table->string('expiry_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
