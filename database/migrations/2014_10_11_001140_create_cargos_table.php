<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCargosTable extends Migration
{
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->timestamps();
        });

        DB::table('cargos')->insert([
            ['descripcion' => 'administrador'],
            ['descripcion' => 'usuario'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('cargos');
    }
}
