<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('name')->unique();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::table('venues', function (Blueprint $table) {
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories', 'category_id')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('venues', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });

        Schema::dropIfExists('categories');
    }
}
