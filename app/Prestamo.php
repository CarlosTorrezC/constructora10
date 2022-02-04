<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{


    protected $table= "prestamo";
    public $timestamps =false;
    protected $fillable= ['id','glosa','fecha','usuario','estado'];
}
