<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IngresoMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_material', function (Blueprint $table) {
            $table->increments('id');         
            $table->integer('idingreso'); 
            $table->integer('idmaterial'); 
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
        Schema::dropIfExists('ingreso_material');
    }
}
