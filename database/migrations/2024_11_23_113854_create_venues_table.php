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

        Schema::create('venues', function (Blueprint $table) {
            $table->id('venue_id'); // Primary key
            $table->string('name', 50); // Venue name, max length 100
            $table->text('description')->nullable(); // Optional description
            $table->enum('type', ['male', 'female', 'both']); // Restrict to specific venue types
            $table->string('phone', 15)->unique(); // Unique phone number, max length 15
            $table->string('longitude', 17); // Longitude, precision 10, scale 7
            $table->string('latitude', 17); // Latitude, precision 10, scale 7
            $table->string('price_range', 50)->default('medium'); // Price range with a default value
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};
