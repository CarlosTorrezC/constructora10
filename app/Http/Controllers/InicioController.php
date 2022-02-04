<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class InicioController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (session()->has('sessionLoggedEmail')){
        // $idtema=session('sessionLoggedTema');
        // if($idtema==2){
        //   $_ENV["tema"]='layouts.premium';
        // }else{
        //   $_ENV["tema"]='layouts.normal';
        // }
        $contador= ContadorController::contador("inicio");
        return view('inicio.index',compact('contador'));          
      }else{
        return redirect('login');
      }           
    }

  //   public static function contador(){
  //     DB::select("update visita set inicio=inicio+1");
  //     $visita= DB::select("select inicio as vista from visita"); 
  //     return intdiv($visita[0]->vista,2);
  // }

    // public function inicio(){
    //     if (session()->has('sessionLoggedEmail')){
    //         $idtema=session('sessionLoggedTema');
    //         if($idtema==2){
    //           $_ENV["tema"]='layouts.premium';
    //         }else{
    //           $_ENV["tema"]='layouts.normal';
    //         }
    //         return view('inicio.index');          
    //     }else{
    //        return redirect('login');
    //     }    
    // }
}
