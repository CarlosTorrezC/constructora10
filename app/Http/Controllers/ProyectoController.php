<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('sessionLoggedEmail')) {
            $proyecto=DB::select("select proyecto.*, concat(empleado.nombre,' ',empleado.apellido) as encargado from proyecto inner join empleado on proyecto.idempleado=empleado.id where proyecto.estado=0 and empleado.estado=0 order by proyecto.id desc");
            $empleado= DB::select("select * from empleado where estado=0");   
            $contador= ContadorController::contador("proyecto");    
            return view('proyecto.index',compact('proyecto','empleado','contador')); 
        }else{
            return redirect('login');
        }  
        
    }
    
    // public static function contador(){
    //     DB::select("update visita set proyecto=proyecto+1");
    //     $visita= DB::select("select proyecto as vista from visita"); 
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
            $empleado= DB::select("select * from empleado where estado=0");    
            return view('proyecto.create',compact('empleado'));
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
                'costo' =>'required|numeric',
                'idempleado' =>'required|numeric'
            ]);
            
           // $id=DB::select("select COALESCE(max(id),0)+1 as id from proyecto");
    
            DB::select("insert into proyecto(nombre,descripcion,costo,idempleado,estado,created_at,updated_at)" . 
                       " values(?,?,?,?,0,now(),null)",[$request->nombre,$request->descripcion,$request->costo,$request->idempleado]);
    
            $proyecto=DB::select("select proyecto.*, concat(empleado.nombre,' ',empleado.apellido) as encargado from proyecto inner join empleado on proyecto.idempleado=empleado.id where proyecto.estado=0 and empleado.estado=0 order by proyecto.id desc");
            $empleado= DB::select("select * from empleado where estado=0");
            return view('proyecto.index',compact('proyecto','empleado'));
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
            $proyecto=DB::select("select * from proyecto where id=? and estado=0",[$id]);
            $empleado= DB::select("select * from empleado where estado=0");
            if (!empty($proyecto)) {            
                return view('proyecto.edit',compact('proyecto','empleado'));
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
            $proyecto=DB::select("select * from proyecto where id=? and estado=0",[$id]);        
            if (!empty($proyecto)) {               
                $request->validate([
                    'nombre'=>'required',
                    'descripcion'=>'required',
                    'costo' =>'required|numeric',
                    'idempleado' =>'required|numeric'
                ]);
                
                DB::select('update proyecto set nombre=?,descripcion=?, costo=?,idempleado=?,updated_at=now() where id=? and estado=0',[$request->nombre,$request->descripcion,$request->costo,$request->idempleado,$id]);

                $empleado= DB::select("select * from empleado where estado=0");
                $proyecto=DB::select("select proyecto.*, concat(empleado.nombre,' ',empleado.apellido) as encargado from proyecto inner join empleado on proyecto.idempleado=empleado.id where proyecto.estado=0 and empleado.estado=0 order by proyecto.id desc");
                return view('proyecto.index',compact('proyecto','empleado'));            
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
            $proyecto=DB::select("select * from proyecto where id=? and estado=0",[$id]);
            if (!empty($proyecto)) {   
            
                DB::select('update proyecto set estado=1,updated_at=now() where id=? and estado=0',[$id]);

                $empleado= DB::select("select * from empleado where estado=0");
                $proyecto=DB::select("select proyecto.*, concat(empleado.nombre,' ',empleado.apellido) as encargado from proyecto inner join empleado on proyecto.idempleado=empleado.id where proyecto.estado=0 and empleado.estado=0 order by proyecto.id desc");
                return view('proyecto.index',compact('proyecto','empleado'));            
            }else{

            }
        }else{
            return redirect('login');
        }  
        
    }
}
