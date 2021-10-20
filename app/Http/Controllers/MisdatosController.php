<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//MODELS
use App\Models\Usuario;
use Inertia\Inertia;


class MisdatosController extends Controller
{

    public function Index()
    {
        
        // $x = session()->all();

        // if (empty($x['usuario_dni'])) {
        //     return redirect('/');
        // } else {

            // $band = (new PermisosController)->verificarPermiso($x['usuario_dni'], 'MI PANEL GTH', 'GTH');
            
            // if ($band == 1) {
                // return redirect()->route('menu.index');
                return Inertia::render('algoextra/prueba');
                //dd(Inertia::render('Misdatos/prueba'));
            // } else {
            //     $mensaje = 'RECHAZADO';
            //     return (new UsuarioController)->home($mensaje);
            //     die();
            // }
        }
    // }
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function mis_datos_personales(Request $request)
    {
        $x = session()->all();

        if (empty($x['usuario_dni'])) {
            return redirect('/');
        } else {

            // $band = (new PermisosController)->verificarPermiso($x['usuario_dni'], 'MIS DATOS PERSONALES', 'MI PANEL GTH');

            // if ($band == 1) {
                $dni = $x['usuario_dni'];
                $mi_usuario = Usuario::from('usuarios as us')->select(
                    'us.id',
                    'us.nombres',
                    'us.apellidoPaterno',
                    'us.apellidoMaterno',
                    'us.email',
                    'us.dni',
                    'us.clave'
                )->get();

                return Inertia::render('Misdatos/Cliente', [
                    'mi_usuario' => $mi_usuario,
                ]);
            // } else {
            //     $mensajeTitulo = '¡Ups!';
            //     $mensajeContenido = 'No tienes permitido ver este contenido.';
            //     return view('cuatrocientoscuatro')->with('mensajeTitulo', $mensajeTitulo)->with('mensajeContenido', $mensajeContenido);
            //     die();
            // }
        }
    }


}

