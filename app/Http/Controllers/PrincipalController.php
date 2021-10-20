<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

//MODELS
use App\models\Usuario;

class PrincipalController extends Controller
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function Welcome()
    {
        // dd(session()->all());
        // $congresos = Congreso::all();
        session()->forget('usuario_dni');
        session()->forget('email');
        session()->forget('clave');
        session()->forget('nombres');
    return view('welcome'/*, array('congresos' => $congresos)*/);
    }

    public function Login()
    {
        return view('login');
    }
    public function validarUsuario(Request $request)
    {
        $email = $request->email;
        $clave = $request->clave;
        $validando_usuario = Usuario::select(
            'email',
            'clave',
            'nombres',
            'dni',
            'apellidoPaterno',
            'apellidoMaterno',
        )
            ->where('email', $email)
            ->get();
        if (count($validando_usuario) == 1) {
            if (Hash::check($clave, $validando_usuario[0]['clave'])) {
                // dd("ingreso");
                $usuario_encontrado = $validando_usuario[0];
                $dni = $usuario_encontrado['dni'];
                $nombres = $usuario_encontrado['nombres'] . " " . $usuario_encontrado['apellidoPaterno'] . " " . $usuario_encontrado['apellidoMaterno'];
                $email = $usuario_encontrado['email'];
                $clave = $usuario_encontrado['clave'];
                session(['usuario_dni' => $dni]);
                session(['nombres' => $nombres]);
                session(['email' => $email]);
                session(['clave' => $clave]);
                Session::put('dni_registrado', $dni);
                Session::put('nombre_usuario', $nombres);
                return redirect('/menu_principal');
            } else {
                Session::flash('email_no_valido', 'Contraseña incorrecta, intente nuevamente');
                return redirect('/login');
                exit();
            }
        }else{
            Session::flash('email_no_valido', 'Usuario incorrecto, intente nuevamente');
            return redirect('/iniciar_sesion');
            exit();
        }
    }

    public function Encuentranos()
    {
        return view('encuentranos');
    }

    public function destinos()
    {
        mb_internal_encoding('UTF-8');

        $origenes = DB::table('origenes')
            ->select(
                'id',
                'nombre_origen',
                'direcion', 
                'telefono'
            )
            ->get();
        return view('destinos', compact('origenes'));
    }
    public function home($mensaje = "ACEPTADO")
    {
        $x = session()->all();

        $dni_registrado = Session::get('dni_registrado');
        
        $existe_usuario = Usuario::select('dni')->where('dni', $dni_registrado)->get();


        if (empty($x['usuario_dni'])) {
            return view('welcome');
        } else {
            return view('menu')->with('mensaje', $mensaje);
            /*if(count($existe_usuario) == 1){
                $pagado = Usuario::select('pagado')->where('dni', $dni_registrado)->get();
               
                if (empty($x['email'])) {
                    //cambiar el return para segurar el ingresp por login
                    return view('login');
                } else {
                    // $version = DB::select("SELECT * FROM versiones ORDER by id_version DESC LIMIT 1");
                    // return view('home')->with('mensaje', $mensaje);
                    return View::make('menu', array('mensaje' => $mensaje, 'pagado' => $pagado));
                }
            } */
        }

        
    }

    public function cerrar_sesion()
    {
        session()->forget('usuario_dni');
        session()->forget('email');
        session()->forget('clave');
        session()->forget('nombres');
        
    }

    // -----------------------------------APIS-----------------------------------

    public function changepass()
    {
        $usuarios = DB::select('SELECT usuarios.clave FROM usuarios');

        foreach ($usuarios as $value) {
            $newPass = $value->clave;
            $passwordencryp = Hash::make($newPass);
            DB::table('usuarios')
                ->where('clave', $value->clave)
                ->update(['clave' => $passwordencryp]);
        }

        return redirect('/index');
    }
    // --------------------------------------------------------------------------

    // --------------------FUNCIÓN PARA VERIFICAR PERMISO-----------------------
    public function verificarPermiso($dni, $modulo, $area)
    {

        $band = 0;

        // $id_permiso = Permiso::select('id_permiso')->where('modulo', $modulo)->where('area', $area)->get();

        // $result = Usuarios_permiso::select('id_usuario_permiso')
        //     ->where('usuarios_permisos.id_permiso', $id_permiso[0]['id_permiso'])->where('usuarios_permisos.dni', $dni)->get();

        // if (empty($result[0]['id_usuario_permiso'])) {
        //     $band = 0;
        // } else {
        //     $band = 1;
        // }

        return $band;
    }
}
