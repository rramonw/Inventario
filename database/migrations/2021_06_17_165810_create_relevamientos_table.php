<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelevamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relevamientos', function (Blueprint $table) {
            
            $table->id();
            $table->string('ip',12)->unique();
            $table->string('pc', 10);
            $table->string('num_serie',20);
            $table->string('sector', 30);
            $table->string('usuario', 40);
            $table->string('disponible', 10);
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
        Schema::dropIfExists('relevamientos');
    }
}
