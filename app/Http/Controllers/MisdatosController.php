<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PrincipalController;

//MODELS
use App\Models\Usuario;
use App\Models\Venta_detalle;
use App\Models\ViajeDetalle;
use Inertia\Inertia;


class MisdatosController extends Controller
{

    public function Index()
    {

        $x = session()->all();

        if (empty($x['usuario_dni'])) {
            return redirect('/');
        } else {

            $band = (new PrincipalController)->verificarPermiso($x['usuario_dni'], 'CLIENTES', 'GENERAL');
            // dd($band);
            if ($band == 1) {
                return Inertia::render('algoextra/principal');
                // dd(Inertia::render('Misdatos/prueba'));
            } else {
                $mensaje = 'RECHAZADO';
                return (new PrincipalController)->home($mensaje);
                die();
            }
        }
    }
    public function mis_datos_personales(Request $request)
    {

        // dd($detalles);
        $x = session()->all();

        if (empty($x['usuario_dni'])) {
            return redirect('/');
        } else {

            $band = (new PrincipalController)->verificarPermiso($x['usuario_dni'], 'CLIENTES', 'GENERAL');

            if ($band == 1) {
                $dni = $x['usuario_dni'];
                $mi_usuario = Usuario::from('usuarios as us')->select(
                    'us.dni',
                    'us.nombres',
                    'us.apellidoPaterno',
                    'us.apellidoMaterno',
                    'us.email',
                    'us.telefono',
                    'us.genero',
                )
                    ->where('us.dni', $dni)
                    ->get();
                $detalles = Venta_detalle::select(
                    'id_viaje_detalle',
                    'dni_usuario',
                    'pagado',
                    'metodo_pago',
                    'id_minivan',
                    'vid.id_destino',
                    'vid.id_origen',
                    'vid.precio_viaje',
                    'vid.hora_salida',
                    'fecha_salida',
                    'o.nombre_origen as destino',
                    'or.nombre_origen as origen'
                )
                    ->join('viaje_detalle as vid', 'id_viaje_detalle', '=', 'vid.id')
                    ->join('origenes as o', 'vid.id_destino', '=', 'o.id')
                    ->join('origenes as or', 'vid.id_origen', '=', 'or.id')
                    ->where('dni_usuario', session('usuario_dni'))
                    ->get();

                return Inertia::render('algoextra/Usuarios/mis_datos_personales', [
                    'mi_usuario' => $mi_usuario,
                    'detalles_viaje' => $detalles
                ]);
            } else {
                $mensajeTitulo = '¡Ups!';
                $mensajeContenido = 'No tienes permitido ver este contenido.';
                return view('cuatrocientoscuatro')->with('mensajeTitulo', $mensajeTitulo)->with('mensajeContenido', $mensajeContenido);
                die();
            }
        }
    }

    public function verificar_mi_usuario(Request $request)
    {
        dd("hola");
        $x = session()->all();
        // $dni = $x['usuario_dni'];
        $dni = $request->dni;

        $existe_usuario = Usuario::select('dni', 'email')->where('dni', $dni)->get();

        if (count($existe_usuario) > 0) {

            if ($existe_usuario[0]['dni'] == $dni) {
                return "CORRECTO";
            } else {
                return "INCORRECTO";
            }
        } else {
            return "CORRECTO";
        }
    }

    public function guardar_mi_usuario(Request $request)
    {
        $x = session()->all();
        $dni = $x['usuario_dni'];

        $nombres = mb_strtoupper($request->nombres);
        $apellidoPaterno = mb_strtoupper($request->apellidoPaterno);
        $apellidoMaterno = mb_strtoupper($request->apellidoMaterno);
        $sexo = $request->sexo;
        $telefono = $request->telefono;
        $correoPrincipal = $request->correoPrincipal;

        $usurtartio = Usuario::where('dni', $dni)->update([
            // 'usuario' => $usuario,
            'nombres' => $nombres,
            'apellidoPaterno' => $apellidoPaterno,
            'apellidoMaterno' => $apellidoMaterno,
            'genero' => $sexo,
            'telefono' => $telefono,
            'email' => $correoPrincipal
        ]);

        return 'EXITO';
    }
}
