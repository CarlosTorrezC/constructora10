<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestamoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('sessionLoggedEmail')) {
            $prestamo=DB::select("select prestamo.*, proyecto.nombre as proyecto from prestamo inner join proyecto on idproyecto=proyecto.id  where prestamo.estado=0 and proyecto.estado=0");        
            $contador= ContadorController::contador("prestamo");
            return view('prestamo.index',compact('prestamo','contador'));
        }else{
            return redirect('login');
        }  
        
    }

    // public static function contador(){
    //     DB::select("update visita set prestamo=prestamo+1");
    //     $visita= DB::select("select prestamo as vista from visita"); 
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
            $proyecto= DB::select("select * from proyecto where estado=0");
            $herramienta= DB::select("select * from herramienta where estado=0 and stock>0");
            $contador= ContadorController::contador("prestamocreate");  
            return view('prestamo.create',compact('proyecto','herramienta','contador'));
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
                'glosa'=>'required',
                'fecha' =>'required',
                'idproyecto' =>'required',
                'idherramienta' => 'required|array',
                'cant' => 'required|array',            
            ]);
    
            //$codprestamo=DB::select("select COALESCE(max(id),0)+1 as id from prestamo");
            $usuario= session()->get('sessionLoggedEmail');
            
            $codprestamo=DB::select('insert into prestamo(glosa,fecha,usuario,idproyecto,estado,created_at,updated_at) values(?,?,?,?,0,now(),null) RETURNING id',[$request->glosa,$request->fecha,$usuario,$request->idproyecto]);

            $cantidad= count($request->idherramienta);  
    
            $arr_idherramienta = $request->idherramienta;
            $arr_cant = $request->cant;
    
            for($i=0; $i<$cantidad; $i++){
                $idherramienta= $arr_idherramienta[$i];
                $cant= $arr_cant[$i];
                
                DB::select("insert into prestamo_herramienta(idprestamo,idherramienta,cantidad) values(?,?,?)",[$codprestamo[0]->id,$idherramienta,$cant]);
                
                DB::select("update herramienta 
                            set stock= stock - ?                          
                            where herramienta.id=?",[$cant,$idherramienta]);        
            }
                   
            return redirect()->route('prestamo.index')
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
        if (session()->has('sessionLoggedEmail')) {
            $prestamo=DB::select("select prestamo.*, proyecto.nombre as proyecto from prestamo inner join proyecto on idproyecto=proyecto.id  where prestamo.estado=0 and proyecto.estado=0 and prestamo.id=?",[$id]); 
        
            $detalle=DB::select(" select h.nombre as herramienta, ph.cantidad cantidad " . 
                                " from prestamo as p inner join prestamo_herramienta as ph on p.id=ph.idprestamo" .
                                "                    inner join herramienta as h on h.id=ph.idherramienta" . 
                                " where p.id=?",[$id]);
            $contador= ContadorController::contador("prestamoshow");  
            return view('prestamo.show', compact('prestamo','detalle','contador'));
        }else{
            return redirect('login');
        }  
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
