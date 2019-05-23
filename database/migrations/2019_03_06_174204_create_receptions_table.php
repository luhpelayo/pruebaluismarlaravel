<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptions', function (Blueprint $table) {
            $table->increments('tramite_id');
           
            $table->string('procedencia');
            $table->integer('solicitante_id')->unsigned();
            $table->foreign('solicitante_id')->references('id')->on('solicitantes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
                  
            $table->integer('process_id')->unsigned();
            $table->foreign('process_id')->references('id')->on('processes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');        

            $table->foreign('tramite_id')->references('id')->on('tramites')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
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
        Schema::dropIfExists('receptions');
    }
}
