<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table= "proyecto";
    public $timestamps =false;
    protected $fillable= ['id','nombre','descripcion','idempleado','costo','estado'];
}
