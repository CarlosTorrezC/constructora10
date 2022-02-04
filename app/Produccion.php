<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    protected $table= "produccion";
    public $timestamps =false;
    protected $fillable= ['codigo','nombreproyecto','cantproduccion','tipoprefabricado','estado'];
}
