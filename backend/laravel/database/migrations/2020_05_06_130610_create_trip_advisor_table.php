<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripAdvisorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_advisor', function (Blueprint $table) {
            $table->integer('id')->unique()->nullable(0)->foreign('id')->references('id')->on('data')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_opinion');
            $table->string('title');
            $table->string('language');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip_advisor');
    }
}
