<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planificacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('anio');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();

            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areaAcademicas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade'); 

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('planificacions');
    }
}
