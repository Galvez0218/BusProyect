<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\RegistrarController;

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

//------------------------COMENTANDO RUTA DE CREACION CON LARAVEL---------------------
// Route::get('/', function () {return view('welcome');});
//------------------------METODO 1 DE ENRUTAR------------------
Route::GET('/', 'IndexController@Welcome');
//---------------------------------RUTAS CON ZIGGY-------------------------------
Route::GET('/', [PrincipalController::class, 'Welcome'])->name('prin.welcome');
//-------------------------------------REGISTRAR-------------------------------------
Route::GET('/registrar', [RegistrarController::class, 'registrar'])->name('gen.registrar');
Route::POST('registrar/verificar_registro', [RegistrarController::class, 'verificar_usuario'])->name('registrar.verificar_usuario');
// ------------------------------------INICIAR SESION ------------------------------------
Route::GET('/iniciar_sesion', [PrincipalController::class, 'Login'])->name('gen.login');
Route::GET('/iniciar_sesion/validar', [PrincipalController::class, 'validarUsuario'])->name('login.validarUsuario');
// ------------------------------------ENCUENTRANOS ------------------------------------
Route::GET('/encuentranos', [PrincipalController::class, 'Encuentranos'])->name('gen.encuentranos');