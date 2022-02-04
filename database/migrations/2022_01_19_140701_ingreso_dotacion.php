<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IngresoDotacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_dotacion', function (Blueprint $table) {
            $table->increments('id');         
            $table->integer('idingreso'); 
            $table->integer('iddotacion'); 
            $table->integer('cantidad');            
            $table->decimal('costo',10,2);                          
        });   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingreso_dotacion');
    }
}
