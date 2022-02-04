<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('sessionLoggedEmail')) {
            if(session()->get('sessionLoggedRol')==2){
                $usuario=DB::select("select usuario.*,case when idrol=1 then 'Cliente' else 'Administrador' end as rol from usuario where usuario.estado=0");        
               // $tema=DB::select("select * from tema");
                $contador= ContadorController::contador("usuario");
                return view('usuario.index',compact('usuario','contador'));
            }else{
                return view('inicio.index');
            }
        }else{
            return redirect('login');
        }        
    }

    // public static function contador(){
    //     DB::select("update visita set usuario=usuario+1");
    //     $visita= DB::select("select usuario as vista from visita"); 
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
            if(session()->get('sessionLoggedRol')==2){
                 return view('usuario.create');
            }else{
                return view('inicio.index');
            }
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
            if(session()->get('sessionLoggedRol')==2){
                $request->validate([
                    'email'=>'required',
                    'password' =>'required',
                    'idrol' => 'required|numeric',                    
                ]);

               // $id=DB::select("select COALESCE(max(id),0)+1 as id from usuario");

                DB::select('insert into usuario(email,password,idrol,estado,created_at,updated_at) values(?,?,?,0,now(),null)',[$request->email,Hash::make($request->password),$request->idrol]);
                
                return redirect()->route('usuario.index')
                ->with('success','creado satisfactoriamente.');
            }else{
                return view('inicio.index');
            }
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
            if(session()->get('sessionLoggedRol')==2){
                $usuario=DB::select("select * from usuario where id=? and estado=0",[$id]);        
                if (!empty($usuario)) {            
                    return view('usuario.edit',compact('usuario'));
                }else{

                }
            }else{
                return view('inicio.index');
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
            if(session()->get('sessionLoggedRol')==2){

                $usuario=DB::select("select * from usuario where id=? and estado=0",[$id]);
                if (!empty($usuario)) {   
                    $request->validate([
                        'email'=>'required',
                        'password'=>'required',
                        'idrol' =>'required|numeric',                        
                    ]);
                    
                    DB::select('update usuario set email=?,password=?, idrol=?,updated_at=now() where id=? and estado=0',[$request->email,Hash::make($request->password),$request->idrol,$id]);

                    return redirect()->route('usuario.index')
                ->with('success','actualizado satisfactoriamente.');           
                }else{

                }
            }else{
                return view('inicio.index');
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
            if(session()->get('sessionLoggedRol')==2){

                $usuario=DB::select("select * from usuario where id=? and estado=0",[$id]);
                if (!empty($usuario)) {   
                
                    DB::select('update usuario set estado=1,updated_at=now() where id=? and estado=0',[$id]);

                    return redirect()->route('usuario.index')
                    ->with('success','eliminado satisfactoriamente.');          
                }else{

                }
            }else{
                return view('inicio.index');
            }
        }else{
            return redirect('login');
        }
    }
}
