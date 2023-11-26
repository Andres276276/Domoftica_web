<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateCultivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->text('descripcion')->nullable();
            $table->integer('nivel_humedad_optimo');
            $table->string('tipo_plantas')->nullable();
            $table->date('fecha_siembra')->nullable();
            $table->timestamps();
        });

        DB::table('cultivos')->insert([
            'nombre' => 'Default',
            'descripcion' => 'Descripción del cultivo',
            'nivel_humedad_optimo' => 50,
            'tipo_plantas' => 'Otros',
            'fecha_siembra' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('cultivos')->insert([
            'nombre' => 'Cultivo 1',
            'descripcion' => 'Descripción del cultivo 1',
            'nivel_humedad_optimo' => 60,
            'tipo_plantas' => 'Otros',
            'fecha_siembra' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('cultivos')->insert([
            'nombre' => 'Cultivo 2',
            'descripcion' => 'Descripción del cultivo 2',
            'nivel_humedad_optimo' => 50,
            'tipo_plantas' => 'Otros',
            'fecha_siembra' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cultivos');
    }
}
