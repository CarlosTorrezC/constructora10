<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('sessionLoggedEmail')) {
            session()->pull('sessionLoggedEmail');           
        }
        if (session()->has('sessionLoggedTema')) {
            session()->pull('sessionLoggedTema');           
        }
        if (session()->has('sessionLoggedRol')) {
            session()->pull('sessionLoggedRol');           
        }
        return view('login.index');
    }

    function check(Request $request)
    {        
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $acceso = DB::select("select * from usuario where estado=0 and email=?", [$request->get('email')]);   
        
        if ($acceso) {          
            if (Hash::check($request->get('password'), $acceso[0]->password)) {
                $request->session()->put('sessionLoggedEmail', $acceso[0]->email);
                $request->session()->put('sessionLoggedRol', $acceso[0]->idrol);
                //if($acceso[0]->idtema==2){
                  //  $request->session()->put('sessionLoggedTema', 'layouts.premium');
                    //$_ENV["tema"]='layouts.premium';
              //  }else{
                //    $request->session()->put('sessionLoggedTema', 'layouts.normal');
                    //$_ENV["tema"]='layouts.normal';
               // }               
                return redirect('inicio');
            } else {
                return back()->with('fail', 'Contraseña Incorrecta');
            }      
        } else {
            return back()->with('fail', 'Cuenta no encontrada para este usuario');
        }
    }

    function logout()
    {
        if (session()->has('sessionLoggedEmail')) {
            session()->pull('sessionLoggedEmail');           
        }
        // if (session()->has('sessionLoggedTema')) {
        //     session()->pull('sessionLoggedTema');           
        // }
        if (session()->has('sessionLoggedRol')) {
            session()->pull('sessionLoggedRol');           
        }
        return redirect('login');
    }

}
