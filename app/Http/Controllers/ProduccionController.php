<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduccionController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$_ENV["tema"]='layouts.theme2';
        if (session()->has('sessionLoggedEmail')) {
            $produccion=DB::select("select produccion.*, proyecto.nombre as proyecto from produccion inner join proyecto on produccion.idproyecto=proyecto.id where proyecto.estado=0 and produccion.estado=0 order by produccion.id desc");       
            $proyecto= DB::select("select * from proyecto where estado=0");
            $contador= ContadorController::contador("produccion");
            return view('produccion.index',compact('produccion','proyecto','contador'));   
        }else{
            return redirect('login');
        }  
        
    }

    // public static function contador(){
    //     DB::select("update visita set produccion=produccion+1");
    //     $visita= DB::select("select produccion as vista from visita"); 
    //     return ;intdiv($visita[0]->vista,2);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session()->has('sessionLoggedEmail')) {
            return view('produccion.create');
        }else{
            return redirect('login');
        }  
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (session()->has('sessionLoggedEmail')) {
            $request->validate([
                'cantidad'=>'required|numeric',
                'nombre'=>'required',
                'idproyecto' =>'required|numeric'
            ]);
    
            //$id=DB::select("select COALESCE(max(id),0)+1 as id from produccion");
    
            DB::select('insert into produccion(idproyecto,nombre,cantidad,estado,created_at,updated_at) values(?,?,?,0,now(),null)',[$request->idproyecto,$request->nombre,$request->cantidad]);
    
            return redirect()->route('produccion.index')
                    ->with('success','creado satisfactoriamente.');
        }else{
            return redirect('login');
        }  
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (session()->has('sessionLoggedEmail')) {
            $produccion=DB::select("select * from produccion where id=? and estado=0",[$id]);        
            $proyecto= DB::select("select * from proyecto where estado=0");
            if (!empty($produccion)) {            
                return view('produccion.edit',compact('produccion','proyecto'));
            }else{

            } 
        }else{
            return redirect('login');
        }  
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (session()->has('sessionLoggedEmail')) {
            $produccion=DB::select("select * from produccion where id=? and estado=0",[$id]);
        if (!empty($produccion)) {   
            $request->validate([
                'nombre'=>'required',
                'cantidad'=>'required|numeric',
                'idproyecto' =>'required|numeric'
            ]);
            
            DB::select('update produccion set nombre=?,cantidad=?, idproyecto=?,updated_at=now() where id=? and estado=0',[$request->nombre,$request->cantidad,$request->idproyecto,$id]);
            
            return redirect()->route('produccion.index')
                ->with('success','actualizado satisfactoriamente.');            
        }else{

        }
        }else{
            return redirect('login');
        }  
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (session()->has('sessionLoggedEmail')) {
            $produccion=DB::select("select * from produccion where id=? and estado=0",[$id]);
            if (!empty($produccion)) {   
            
                DB::select('update produccion set estado=1,updated_at=now() where id=? and estado=0',[$id]);
                
                return redirect()->route('produccion.index')
                    ->with('success','eliminado satisfactoriamente.');             
            }else{

            }
        }else{
            return redirect('login');
        }  
        
    }
}