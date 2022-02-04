<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
  

    protected $table= "ingreso";
    public $timestamps =false;
    protected $fillable= ['id','glosa','fecha','usuario','total','estado'];
}
