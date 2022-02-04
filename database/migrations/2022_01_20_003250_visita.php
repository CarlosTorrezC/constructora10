<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Visita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visita', function (Blueprint $table) {    
            $table->increments('id');        
            $table->integer('dotacion'); 
            $table->integer('herramienta'); 
            $table->integer('material');            
            $table->integer('proyecto');
            $table->integer('produccion');                       
            $table->integer('ingreso');
            $table->integer('usuario');
            $table->integer('prestamo');
            $table->integer('estadistica');    
            $table->integer('inicio'); 
            $table->integer('ingresocreate'); 
            $table->integer('ingresoshow'); 
            $table->integer('prestamocreate');         
            $table->integer('prestamoshow'); 
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visita');
    }
}
