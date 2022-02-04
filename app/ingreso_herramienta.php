<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ingreso_herramienta extends Model
{
    protected $table= "ingreso_herramienta";
    public $timestamps =false;
    protected $fillable= ['id','idingreso','idherramienta','cantidad','costo'];
}
