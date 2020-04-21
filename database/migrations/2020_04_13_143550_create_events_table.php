<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('swimStyle');     //free brest back fly medley
          $table->integer('distance');      //50 100 200
          $table->integer('qualifyingSex'); //male female (mix)
          $table->integer('qualifyingAge'); //elemaentary jouniorhigh high adult over30 over50
          $table->boolean('playerType');    //individual group
          $table->integer('persons');
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
        Schema::dropIfExists('events');
    }
}
