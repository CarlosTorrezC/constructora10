<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{


    protected $table= "inventario";
    public $timestamps =false;
    protected $fillable= ['codigo','cantherramienta','cantmaterial','cantdotacion','nroproyecto','estado'];
}
