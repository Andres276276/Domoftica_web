<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiArduinosTable extends Migration
{
    public function up()
    {
        Schema::create('confi_arduinos', function (Blueprint $table) {
            $table->id();
            $table->string('Tipo_Arduino');
            $table->string('Configuracion_Luces'); 
            $table->string('Intervalo_Lectura_Sensores');
            $table->string('Intervalo_Riego');
            $table->string('Configuracion_Alarma')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('confi_arduinos');
    }
}
