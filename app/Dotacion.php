<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dotacion extends Model
{

    protected $table= "dotacion";
    public $timestamps =true;
    protected $fillable= ['id',
                        'nombre',
                        'descripcion',
                        'cantidad',
                        'estado'];
}
