<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelStationReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('fuel_station_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fuel_station_id');
            $table->foreign('fuel_station_id')->references('id')->on('fuel_stations')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('review', 255)->default(''); // Changed to VARCHAR with default value
            $table->unsignedTinyInteger('rating');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fuel_station_reviews');
    }
}
