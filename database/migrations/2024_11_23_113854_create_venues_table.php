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
            $table->unsignedBigInteger('user_id')->unique()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', ['active', 'inactive'])->default('inactive')->after('user_id');
            $table->string('name', 50); // Venue name, max length 100
            $table->text('description')->nullable(); // Optional description
            $table->enum('type', ['male', 'female', 'both']); // Restrict to specific venue types
            $table->string('phone', 10)->unique(); // Unique phone number, max length 15
            $table->decimal('longitude', 11, 7);
            $table->decimal('latitude', 10, 7);
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
