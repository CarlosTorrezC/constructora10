<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dotacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dotacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');  
            $table->string('descripcion');  
            $table->integer('stock'); 
            $table->integer('estado');
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
        Schema::dropIfExists('dotacion');
    }
}
