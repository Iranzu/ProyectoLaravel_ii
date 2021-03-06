<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoLaravelIiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_proyecto_laravel_ii', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numchip');
            $table->string('nombre');
            $table->integer('edad');
            $table->string('genero');
            $table->string('raza');
            $table->string('salud');
            $table->string('descripcion');
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
        Schema::dropIfExists('_proyecto_laravel_ii');
    }
}
