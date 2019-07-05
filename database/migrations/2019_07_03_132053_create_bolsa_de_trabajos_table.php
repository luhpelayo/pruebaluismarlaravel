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
            $table->string('nroregistro');
            $table->string('email');
            $table->string('telefono');
            $table->string('carta_de_presentacion');
            $table->string('curriculum');
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
