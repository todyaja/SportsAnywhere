<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_ratings', function (Blueprint $table) {
            $table->id('rating_id');
            $table->foreignId('area_id')->references('id')->on('areas')->onDelete('cascade');;
            $table->foreignId('guest_id')->references('id')->on('users')->onDelete('cascade');;
            $table->string('review');
            $table->integer('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_ratings');
    }
}
