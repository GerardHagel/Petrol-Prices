<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelStationsTable extends Migration
{
    public function up()
    {
        Schema::create('fuel_stations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('fuel_type');
            $table->decimal('price', 8, 2);
            $table->string('opening_hours');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fuel_stations');
    }
};
