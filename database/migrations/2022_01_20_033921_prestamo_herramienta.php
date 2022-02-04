<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrestamoHerramienta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamo_herramienta', function (Blueprint $table) {
            $table->increments('id');         
            $table->integer('idprestamo'); 
            $table->integer('idherramienta'); 
            $table->integer('cantidad');               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamo_herramienta');
    }
}
