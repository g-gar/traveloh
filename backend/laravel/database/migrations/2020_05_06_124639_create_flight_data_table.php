<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_data', function (Blueprint $table) {
            $table->integer('id')->unique()->nullable(0)->foreign('id')->references('id')->on('data')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_weather_data')->nullable(0)->foreign('id')->references('id')->on('data')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_airline')->nullable(0)->foreign('id')->references('id')->on('data')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_data');
    }
}
