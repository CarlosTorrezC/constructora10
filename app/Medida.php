<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{

    protected $table="medida";
    public $timestamps=false;
    protected $fillable= ['id','nombre'];
}
