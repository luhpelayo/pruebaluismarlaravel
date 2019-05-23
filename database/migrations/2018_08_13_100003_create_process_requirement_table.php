<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessRequirementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_requirement', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('process_id')->unsigned();
            $table->integer('requirement_id')->unsigned();
            
           
            //relation
            $table->foreign('process_id')->references('id')->on('processes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('requirement_id')->references('id')->on('requirements')
                ->onDelete('cascade')
                ->onUpdate('cascade');
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('process_requirement');
    }
}
