<?php

namespace App\Http\Controllers;
use DB;
class ContadorController
{
    public static function contador(String $form){
        DB::select("update visita set ". $form ."=". $form ."+1");
        $visita= DB::select("select ". $form ." as vista from visita"); 
        return $visita[0]->vista;
    }
}
