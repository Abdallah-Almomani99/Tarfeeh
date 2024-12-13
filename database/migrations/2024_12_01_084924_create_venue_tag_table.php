<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenueTagTable extends Migration
{
    public function up()
    {
        Schema::create('venue_tag', function (Blueprint $table) {
            $table->id('venue_tag_id'); // Primary key
            $table->unsignedBigInteger('venue_id'); // Foreign key to venues table
            $table->unsignedBigInteger('tag_id');   // Foreign key to tags table

            // Define foreign keys
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('venue_tag');
    }
}
