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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('user_name', 50)->unique(); // Primary key
            $table->string('first_name', 20); // Max length of 50 characters
            $table->string('last_name', 20);  // Max length of 50 characters
            $table->enum('gender', ['male', 'female']); // Restrict values to 'male' or 'female'
            $table->string('email')->unique(); // Unique email
            $table->string('phone', 10)->unique(); // Unique phone number, max length 15
            $table->string('password'); // Password field
            $table->integer('point')->default(0); // Default value for points is 0
            $table->rememberToken(); // Token for "remember me" functionality
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
