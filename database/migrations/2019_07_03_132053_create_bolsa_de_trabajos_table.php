<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBolsaDeTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bolsa_de_trabajos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('anho_de_graduacion');
            $table->string('genero');
            $table->string('anhos_de_experiencia');
            $table->string('paquetes_informaticos');
            $table->string('ingles');
            $table->string('maestrias');
            $table->string('postgrado');
            $table->string('email');
            $table->string('telefono');
  
            $table->string('curriculum');
            $table->dateTime('event_date');
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
        Schema::dropIfExists('bolsa_de_trabajos');
    }
}
