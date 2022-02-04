<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        if (session()->has('sessionLoggedEmail')) {
            $material=DB::select("select material.*, medida.nombre as medida from material inner join medida on material.idmedida=medida.id where material.estado=0 order by material.id desc");       
            $medida= DB::select("select * from medida");
            $contador= ContadorController::contador("material");
            return view('material.index',compact('material','medida','contador'));
        }else{
            return redirect('login');
        }  
        
    }

    // public static function contador(){
    //     DB::select("update visita set material=material+1");
    //     $visita= DB::select("select material as vista from visita"); 
    //     return intdiv($visita[0]->vista,2);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session()->has('sessionLoggedEmail')) {
            $medida= DB::select("select * from medida");
            return view('material.create',compact('medida'));
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
                'nombre'=>'required',
                'descripcion'=>'required',
                'idmedida' =>'required|numeric'
            ]);
      
            DB::select('insert into material(nombre,descripcion,idmedida,cantidad,estado,created_at,updated_at) values(?,?,?,0,0,now(),null)',[$request->nombre,$request->descripcion,$request->idmedida]);
    
            return redirect()->route('material.index')
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
            $material=DB::select("select * from material where id=? and estado=0",[$id]);        
            $medida= DB::select("select * from medida");
            if (!empty($material)) {            
                return view('material.edit',compact('material','medida'));
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
            $material=DB::select("select * from material where id=? and estado=0",[$id]);
        if (!empty($material)) {   
            $request->validate([
                'nombre'=>'required',
                'descripcion'=>'required',
                'idmedida' =>'required|numeric'
            ]);
            
            DB::select('update material set nombre=?,descripcion=?, idmedida=?,updated_at=now() where id=? and estado=0',[$request->nombre,$request->descripcion,$request->idmedida,$id]);
            
            return redirect()->route('material.index')
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
            $material=DB::select("select * from material where id=? and estado=0",[$id]);
        if (!empty($material)) {   
           
            DB::select('update material set estado=1,updated_at=now() where id=? and estado=0',[$id]);
                         
            return redirect()->route('material.index')
                ->with('success','eliminado satisfactoriamente.');        
        }else{

        }
        }else{
            return redirect('login');
        }  
        
    }
}
