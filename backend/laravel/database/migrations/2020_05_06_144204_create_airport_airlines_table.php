<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirportAirlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airport_airlines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_airport')->foreign('id_airport')->references('id')->on('airports')->onDelete('cascade')->onUpdate('cascade')->nullable(0);
            $table->integer('id_airline')->foreign('id_airline')->references('id')->on('airlines')->onDelete('cascade')->onUpdate('cascade')->nullable(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airport_airlines');
    }
}
