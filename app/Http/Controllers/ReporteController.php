<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visita;


class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {          
        if (session()->has('sessionLoggedEmail')) {
            $cu = ['dotacion',
                'herramienta',
                'material',
                'proyecto',
                'produccion',
                'ingreso',
                'usuario',
                'prestamo',
                'inicio',
                'estadistica'
            ];                
            $visita= Visita::first();        
            
            $vista = [  $visita->dotacion,
                        $visita->herramienta,
                        $visita->material,
                        $visita->proyecto,
                        $visita->produccion,
                        $visita->ingreso+$visita->ingresocreate+$visita->ingresoshow,
                        $visita->usuario,
                        $visita->prestamo+$visita->prestamocreate+$visita->prestamoshow,
                        $visita->inicio,
                        $visita->estadistica                                            
                    ];     
                    
            $contador= ContadorController::contador("estadistica");
        
            return view('reporte.index')->with('contador',$contador)->with('cu',json_encode($cu,JSON_NUMERIC_CHECK))->with('vista',json_encode($vista,JSON_NUMERIC_CHECK));
        }else{
            return redirect('login');
        }      
        
    }

    // public static function contador(){
    //     DB::select("update visita set reporte=reporte+1");
    //     $visita= DB::select("select reporte as vista from visita"); 
    //     return intdiv($visita[0]->vista,2);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
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
