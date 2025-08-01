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
        Schema::table('questions', function (Blueprint $table) {
            // Add the new column
            $table->string('question_type')->nullable()->after('question'); // Adjust position as needed

            // Modify existing status column default to 1
            $table->integer('status')->default(1)->change(); // Make sure doctrine/dbal is installed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('question_type');
            $table->integer('status')->default(null)->change(); // Remove default (or adjust to previous default)

        });
    }
};
