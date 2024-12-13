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
        
        Schema::table('transactions', function (Blueprint $table) {
        //
        $table->string('phone', 255)->after('email');
        $table->string('services', 255)->after('orderID');
        $table->string('active_status', 255)->after('plan_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
            $table->dropColumn(['phone','services', 'active_status']);
        });
    }
};
