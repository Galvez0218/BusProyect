<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\MisdatosController;
use App\Http\Controllers\DatosController;

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
Route::get('/menu_principal', [PrincipalController::class, 'home'])->name('home');
Route::get('/cerrar_sesion', [PrincipalController::class, 'cerrar_sesion'])->name('cerrar_sesion');
// ------------------------------------PANTALLA PRINCIPAL ------------------------------------
Route::GET('/encuentranos', [PrincipalController::class, 'Encuentranos'])->name('gen.encuentranos');
Route::GET('/destinos', [PrincipalController::class, 'destinos'])->name('gen.destinos');

//------------------------------ MIS DATOS
Route::GET('/menu_principal/mi_menu', [MisdatosController::class, 'Index'])->name('menu.index');
Route::GET('/menu_principal/menu/mis_datospersonales', [MisdatosController::class, 'mis_datos_personales'])->name('menu.mis_datos_personales');
Route::POST('/menu_principal/menu/mis_datospersonales/verificar', [MisdatosController::class, 'verificar_mi_usuario'])->name('mis_datos_personales.verificar');
Route::POST('/menu_principal/menu/mis_datospersonales/guardar', [MisdatosController::class, 'guardar_mi_usuario'])->name('mis_datos_personales.guardar');
Route::GET('/menu_principal/menu/sugerencias', [DatosController::class, 'sugerencias'])->name('mis_datos.sugerencias');
Route::POST('/menu_principal/menu/sugerencias/guardar', [DatosController::class, 'guardar_sugerencia'])->name('sugerencia.guardar');
Route::GET('/menu_principal/menu/reclamos', [DatosController::class, 'reclamos'])->name('mis_datos.reclamos');
Route::POST('/menu_principal/menu/reclamos/guardar', [DatosController::class, 'guardar_sugerencia'])->name('reclamo.guardar');

//------------------------PAY PAL -----------------------
Route::GET('/paypal/pay', [PaymentController::class, 'payWithPaypal'])->name('paypalPay');
Route::GET('/paypal/status', [PaymentController::class, 'payPalStatus'])->name('paypalStatus');