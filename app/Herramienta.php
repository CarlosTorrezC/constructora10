<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model
{

    protected $table= "herramienta";
    public $timestamps =false;
    protected $fillable= ['id','nombre','descripcion','stock','estado'];
}
