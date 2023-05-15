<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score', function (Blueprint $table) {
            $table->id();
            // Klub 1
            $table->unsignedBigInteger('klub_1')->nullable();
            $table->foreign('klub_1')->references('id')->on('klub');
            $table->integer('score_1');
            // Klub 2
            $table->unsignedBigInteger('klub_2')->nullable();
            $table->foreign('klub_2')->references('id')->on('klub');
            $table->integer('score_2');

            // Winner Club 
            $table->unsignedBigInteger('winner_klub')->nullable();
            $table->foreign('winner_klub')->references('id')->on('klub');



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
        Schema::dropIfExists('score');
    }
}
