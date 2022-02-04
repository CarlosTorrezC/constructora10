<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    

    protected $table= "usuario";
    public $timestamps =true;
    protected $fillable= ['id','email','password','idrol','estado'];
}
