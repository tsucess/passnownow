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
        Schema::table('pays', function (Blueprint $table) {
            //
            $table->string('amount', 20)->after('email');
            $table->string('reference', 255)->after('amount');
            $table->string('currency', 255)->after('reference');
            $table->string('active_status', 255)->after('currency');
            $table->string('payment_status', 255)->after('active_status');
            $table->string('payment_method', 255)->after('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pays', function (Blueprint $table) {
            //
            $table->dropColumn(['amount', 'reference', 'currency', 'active_status', 'payment_status', 'payment_method']);
        });
    }
};
