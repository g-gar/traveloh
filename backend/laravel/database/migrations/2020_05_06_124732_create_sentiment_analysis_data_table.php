<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentimentAnalysisDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentiment_analysis_data', function (Blueprint $table) {
            $table->integer('id')->unique()->nullable(0)->foreign('id')->references('id')->on('data')->onDelete('cascade')->onUpdate('cascade');
            $table->double('positive', 8,2)->nullable(1);
            $table->double('negative', 8,2)->nullable(1);
            $table->double('neutral', 8,2)->nullable(1);
            $table->double('compound', 8,2)->nullable(1);
            $table->string('text')->nullable(0);
            $table->integer('id_airline')->references('id')->on('airlines')->onDelete('cascade')->onUpdate('cascade')->nullable(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sentiment_analysis_data');
    }
}
