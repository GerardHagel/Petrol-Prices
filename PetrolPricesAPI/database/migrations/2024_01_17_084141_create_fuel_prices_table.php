<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelPricesTable extends Migration
{
    public function up()
    {
        Schema::create('fuel_prices', function (Blueprint $table) {
            $table->bigIncrements('id'); // Korzystamy z bigIncrements zamiast auto-increment
            $table->unsignedBigInteger('fuel_station_id');
            $table->string('fuel_type');
            $table->decimal('price', 8, 2);
            $table->dateTime('date')->default(now());
            $table->timestamps();

            // Połączenie 'id' i 'fuel_station_id' w jedno pole klucza głównego
            $table->unique(['id', 'fuel_station_id']);

            $table->foreign('fuel_station_id')->references('id')->on('fuel_stations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fuel_prices');
    }
}
