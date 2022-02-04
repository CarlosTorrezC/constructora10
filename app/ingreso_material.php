<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ingreso_material extends Model
{
  
    protected $table= "ingreso_material";
    public $timestamps =false;
    protected $fillable= ['id','idingreso','idmaterial','cantidad','costo'];
}
