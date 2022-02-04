<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login.index');
});
Route::resource('configuracion','ConfiguracionController');
Route::resource('dotacion','DotacionController');
Route::resource('proyecto','ProyectoController');
Route::resource('produccion','ProduccionController');
Route::resource('material','MaterialController');
Route::resource('usuario','UsuarioController');
Route::resource('inicio','InicioController');
Route::get('login', 'LoginController@index');
Route::post('check', 'LoginController@check')->name('login.check');
Route::get('logout', 'LoginController@logout')->name('logout');
Route::resource('ingreso','IngresoController');
Route::resource('herramienta','HerramientaController');
Route::resource('reporte','ReporteController');
Route::resource('prestamo','PrestamoController');
