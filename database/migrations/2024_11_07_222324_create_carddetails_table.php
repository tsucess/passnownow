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
        Schema::create('carddetails', function (Blueprint $table) {
            $table->id();
            $table->string('user_unique_id');
            $table->string('authorization_code');
            $table->string('bin');
            $table->string('last4');
            $table->string('exp_month');
            $table->string('exp_year');
            $table->string('channel');
            $table->string('card_type');
            $table->string('bank');
            $table->string('country_code');
            $table->string('brand');
            $table->string('reusable');
            $table->string('signature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carddetails');
    }
};
