<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HerramientaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('sessionLoggedEmail')) {
            $herramienta=DB::select("select * from herramienta where estado=0 order by id desc");      
            $contador= ContadorController::contador("herramienta"); 
            return view('herramienta.index',compact('herramienta','contador'));
        }else{
            return redirect('login');
        }  
        
    }

    // public static function contador(){
    //     DB::select("update visita set herramienta=herramienta+1");
    //     $visita= DB::select("select herramienta as vista from visita"); 
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
            return view('herramienta.create');
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
                'descripcion'=>'required',
                'nombre'=>'required',
            ]);
    
            //$id=DB::select("select COALESCE(max(id),0)+1 as id from herramienta");
    
            DB::select('insert into herramienta(nombre,descripcion,stock,estado,created_at,updated_at) values(?,?,0,0,now(),null)',[$request->nombre,$request->descripcion]);
    
            return redirect()->route('herramienta.index')
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
            $herramienta=DB::select("select * from herramienta where id=? and estado=0",[$id]);
            if (!empty($herramienta)) {            
                return view('herramienta.edit',compact('herramienta'));
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
            $herramienta=DB::select("select * from herramienta where id=? and estado=0",[$id]);
        if (!empty($herramienta)) {   
            $request->validate([
                'nombre'=>'required',
                'descripcion'=>'required',
            ]);
            
            DB::select('update herramienta set nombre=?,descripcion=?,updated_at=now() where id=? and estado=0',[$request->nombre,$request->descripcion,$id]);

            return redirect()->route('herramienta.index')
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
            $herramienta=DB::select("select * from herramienta where id=? and estado=0",[$id]);
        if (!empty($herramienta)) {   
           
            DB::select('update herramienta set estado=1,updated_at=now() where id=? and estado=0',[$id]);
            
            return redirect()->route('herramienta.index')
                ->with('success','eliminado satisfactoriamente.');        
        }else{

        }    
        }else{
            return redirect('login');
        }  
        
    }
}
