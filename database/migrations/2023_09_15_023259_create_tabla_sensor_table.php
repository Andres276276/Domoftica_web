<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaSensorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_sensor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('humedad')->unsigned();
            $table->integer('temperatura')->unsigned();
            $table->integer('humedad_suelo')->unsigned();
            $table->integer('flujo_agua')->unsigned();
            $table->dateTime('fecha_hora');
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
        Schema::dropIfExists('tabla_sensor');
    }
}
