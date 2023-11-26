<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('estado_tierra', function (Blueprint $table) {
            $table->id();
            $table->integer('humedad_suelo')->unsigned();
            $table->dateTime('fecha_hora');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estado_tierra');
    }
};
