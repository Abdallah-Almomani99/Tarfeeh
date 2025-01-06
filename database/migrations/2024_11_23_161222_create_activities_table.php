<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id('activity_id'); // Primary Key
            $table->unsignedBigInteger('venue_id'); // Foreign Key
            $table->unsignedBigInteger('category_id')->nullable(); // Foreign Key to Categories
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2); // Up to 999,999.99
            $table->enum('gender', ['male', 'female', 'all']); // Gender-specific or for all
            $table->integer('duration'); // Duration in minutes or hours
            $table->integer('allowed_age'); // E.g., "12-18", "18+", etc.
            $table->integer('capacity'); // Maximum number of participants
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('venue_id')->references('venue_id')->on('venues')->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });

        Schema::dropIfExists('activities');
    }
}
