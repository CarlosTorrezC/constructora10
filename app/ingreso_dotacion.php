<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ingreso_dotacion extends Model
{

    protected $table= "ingreso_dotacion";
    public $timestamps =false;
    protected $fillable= ['id','idingreso','iddotacion','cantidad','costo'];
}
