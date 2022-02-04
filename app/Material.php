<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{

    protected $table= "material";
    public $timestamps =false;
    protected $fillable= ['id','nombre','descripcion','unidad','cantidad','estado'];
}
