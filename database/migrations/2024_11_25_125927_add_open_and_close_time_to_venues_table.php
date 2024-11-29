<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOpenAndCloseTimeToVenuesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('venues', function (Blueprint $table) {
            $table->time('open_time')->nullable(); // Add open_time column
            $table->time('close_time')->nullable(); // Add close_time column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('venues', function (Blueprint $table) {
            $table->dropColumn('open_time'); // Remove open_time column
            $table->dropColumn('close_time'); // Remove close_time column
        });
    }
}
