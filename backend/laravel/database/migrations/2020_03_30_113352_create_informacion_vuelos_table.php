<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion_vuelos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('destino');
            $table->string('aerolinea');
            $table->string('terminal');
            $table->time('hora');
            $table->date('fecha');
            $table->boolean('retrasado');
            $table->integer('temperatura (º)');
            $table->string('direccion viento');
            $table->string('velocidad viento (km/h)');
            $table->integer('lluvia (cm)');
            $table->integer('nieve (cm)');
            $table->integer('nubes (%)');
            $table->integer('humedad (%)');
            $table->integer('presion (hPa)');
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
        Schema::dropIfExists('informacion_vuelos');
    }
}
