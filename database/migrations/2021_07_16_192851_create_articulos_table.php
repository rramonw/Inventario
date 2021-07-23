<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            //Campo para conectarse con la tabla categorias
            $table->integer('idcategoria')->unsigned();
            $table->integer('idsector')->unsigned();
            $table->integer('idsede')->unsigned();
            $table->string('nombre', 70);
            $table->string('modelo', 70);
            $table->string('serial', 70);
            $table->string('descripcion', 256)->nullable();
            $table->timestamps();

            //Clave foranea
            $table->foreign('idcategoria')->references('id')->on('categorias');
            $table->foreign('idsector')->references('id')->on('sectors');
            $table->foreign('idsede')->references('id')->on('sedes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
