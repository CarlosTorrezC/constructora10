<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{

    protected $table= "visita";
    public $timestamps =false;
    protected $fillable= ['dotacion','herramienta','material','proyecto','produccion','ingreso','usuario','prestamo','estadistica','inicio','ingresocreate','ingresoshow','prestamocreate','prestamoshow'];   
}
