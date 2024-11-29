<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id'); // Primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->foreignId('venue_id')->constrained('venues')->onDelete('cascade'); // Foreign key to venues table
            $table->foreignId('activity_id')->constrained('activities')->onDelete('cascade'); // Foreign key to activities table
            $table->date('booking_date');
            $table->time('booking_time');
            $table->integer('companions'); // Number of companions
            $table->enum('status', ['Pending', 'Confirmed', 'Cancelled'])->default('Pending'); // Status of the booking
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
