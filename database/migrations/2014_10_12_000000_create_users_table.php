<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile_photo')->nullable();
            $table->unsignedBigInteger('id_cargo');
            $table->boolean('relay_state')->default(false);
            $table->timestamps();
            
            $table->foreign('id_cargo')->references('id')->on('cargos');
        });

         DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'id_cargo' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('users')->insert([
            'name' => 'Daniel',
            'email' => 'daniel@gmail.com',
            'password' => bcrypt('12345678'),
            'id_cargo' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
