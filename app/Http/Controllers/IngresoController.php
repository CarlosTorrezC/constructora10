<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('sessionLoggedEmail')) {
            $ingreso=DB::select("select * from ingreso where estado=0");    
            $contador= ContadorController::contador("ingreso");   
            return view('ingreso.index',compact('ingreso','contador')); 
        }else{
            return redirect('login');
        }          
    }

    // public static function contador(){
    //     DB::select("update visita set ingreso=ingreso+1");
    //     $visita= DB::select("select ingreso as vista from visita"); 
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
            $material= DB::select("select * from material where estado=0");
            $herramienta= DB::select("select * from herramienta where estado=0");
            $dotacion= DB::select("select * from dotacion where estado=0");
            $contador= ContadorController::contador("ingresocreate");  
            return view('ingreso.create',compact('material','herramienta','dotacion','contador'));
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
                'tipo' => 'required|array',
                'idingreso' => 'required|array',
                'cant' => 'required|array',
                'cost' => 'required|array',
            ]);
    
           // $codingreso=DB::select("select COALESCE(max(id),0)+1 as id from ingreso");

            $usuario= session()->get('sessionLoggedEmail');
            
            $codingreso=DB::select('insert into ingreso(glosa,fecha,usuario,total,estado,created_at,updated_at) values(?,?,?,?,0,now(),null) RETURNING id',[$request->glosa,$request->fecha,$usuario,0]);

            $cantidad= count($request->tipo);
            $arr_tipo = $request->tipo;
            $arr_idingreso = $request->idingreso;
            $arr_cant = $request->cant;
            $arr_cost = $request->cost;
    
            for($i=0; $i<$cantidad; $i++){
                $tipo= $arr_tipo[$i];
                $idingreso= $arr_idingreso[$i];
                $cant= $arr_cant[$i];
                $cost= $arr_cost[$i];
    
                switch ($tipo) {
                    case "material":
                        DB::select("insert into ingreso_material(idingreso,idmaterial,cantidad,costo) values(?,?,?,?)",[$codingreso[0]->id,$idingreso,$cant,$cost]);                                                            
                        DB::select("update material set cantidad=material.cantidad+? where material.id=?",[$cant,$idingreso]);                    
                        break;
                    case "herramienta":
                        DB::select("insert into ingreso_herramienta(idingreso,idherramienta,cantidad,costo) values(?,?,?,?)",[$codingreso[0]->id,$idingreso,$cant,$cost]);
                        DB::select("update herramienta set stock=herramienta.stock + ? where herramienta.id=?",[$cant,$idingreso]);                   
                        break;
                    case "dotacion":
                        DB::select("insert into ingreso_dotacion(idingreso,iddotacion,cantidad,costo) values(?,?,?,?)",[$codingreso[0]->id,$idingreso,$cant,$cost]);
                        DB::select("update dotacion set stock=dotacion.stock + ? where dotacion.id=?",[$cant,$idingreso]);
                        break;
                }
            }
            
            DB::select("update ingreso 
                        set total=total+ing.suma 
                        from (select idingreso,sum(cantidad*costo) as suma from ingreso_dotacion where idingreso=? group by idingreso) as ing
                        where ingreso.estado=0 and ingreso.id=ing.idingreso and ingreso.id=?",[$codingreso[0]->id,$codingreso[0]->id]);
            
            DB::select("update ingreso 
                        set total=total+ing.suma 
                        from (select idingreso,sum(cantidad*costo) as suma from ingreso_herramienta where idingreso=? group by idingreso) as ing
                        where ingreso.estado=0 and ingreso.id=ing.idingreso and ingreso.id=?",[$codingreso[0]->id,$codingreso[0]->id]);
            
            DB::select("update ingreso 
                        set total=total+ing.suma 
                        from (select idingreso,sum(cantidad*costo) as suma from ingreso_material where idingreso=? group by idingreso) as ing
                        where ingreso.estado=0 and ingreso.id=ing.idingreso and ingreso.id=?",[$codingreso[0]->id,$codingreso[0]->id]);        
    
            return redirect()->route('ingreso.index')
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
            $ingreso=DB::select("select * from ingreso where estado=0 and id=?",[$id]); 
        $detalle=DB::select("select 'Dotacion' as tipo,dot.nombre as ingreso,ing.cantidad,ing.costo,(ing.cantidad*ing.costo) total 
                            from ingreso inner join ingreso_dotacion as ing on ingreso.id=ing.idingreso 
                                        inner join dotacion as dot on dot.id=ing.iddotacion
                            where ingreso.id=?
                            union
                            select 'Herramienta' as tipo,her.nombre as ingreso,ing.cantidad,ing.costo,(ing.cantidad*ing.costo) total 
                            from ingreso inner join ingreso_herramienta as ing on ingreso.id=ing.idingreso 
                                        inner join herramienta as her on her.id=ing.idherramienta
                            where ingreso.id=?
                            union
                            select 'Material' as tipo,mat.nombre as ingreso,ing.cantidad,ing.costo,(ing.cantidad*ing.costo) total 
                            from ingreso inner join ingreso_material as ing on ingreso.id=ing.idingreso 
                                        inner join material as mat on mat.id=ing.idmaterial
                            where ingreso.id=?",[$id,$id,$id]);

        $contador= ContadorController::contador("ingresoshow");  

        return view('ingreso.show', compact('ingreso','detalle','contador'));
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
        if (session()->has('sessionLoggedEmail')) {
            $dotacion=DB::select("select * from dotacion where id=? and estado=0",[$id]);
            if (!empty($dotacion)) {            
                return view('dotacion.edit',compact('dotacion'));
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
            $dotacion=DB::select("select * from dotacion where id=? and estado=0",[$id]);
        if (!empty($dotacion)) {   
            $request->validate([
                'nombre'=>'required',
                'descripcion'=>'required',
                'stock' =>'required|numeric'
            ]);
            
            DB::select('update dotacion set nombre=?,descripcion=?, stock=?,updated_at=now() where id=? and estado=0',[$request->nombre,$request->descripcion,$request->stock,$id]);

            return redirect()->route('dotacion.index')
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
            $dotacion=DB::select("select * from dotacion where id=? and estado=0",[$id]);
        if (!empty($dotacion)) {   
           
            DB::select('update dotacion set estado=1,updated_at=now() where id=? and estado=0',[$id]);
            
            return redirect()->route('dotacion.index')
                ->with('success','eliminado satisfactoriamente.');        
        }else{

        }
        }else{
            return redirect('login');
        }          
    }
}
