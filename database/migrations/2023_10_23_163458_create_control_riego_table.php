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
        Schema::create('control_riego', function (Blueprint $table) {
            $table->id();
            $table->boolean('relay_state')->default(false);
            $table->timestamps();
        });

        
    }

    public function down()
    {
        Schema::dropIfExists('control_riego');
    }
};
