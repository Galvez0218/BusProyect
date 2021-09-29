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

        // $validando_ponente = Ponente::select(
        //         'email',
        //         'clave',
        //         'nombre',
        //         'dni',
        //         'apellidoPaterno',
        //         'apellidoMaterno',
        //     )
        //         ->where('email', $email)
        //         ->get();

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
                return redirect('/home');
            } else {
                Session::flash('email_no_valido', 'Contraseña incorrecta, intente nuevamente');
                return redirect('/login');
                exit();
            }
        }
        //  else if(count($validando_ponente) == 1){
        //     if (Hash::check($clave, $validando_ponente[0]['clave'])) {
        //         // dd("ingreso");
        //         $usuario_encontrado = $validando_ponente[0];
        //         $dni = $usuario_encontrado['dni'];
        //         $nombres = $usuario_encontrado['nombre'] . " " . $usuario_encontrado['apellidoPaterno'] . " " . $usuario_encontrado['apellidoMaterno'];
        //         $email = $usuario_encontrado['email'];
        //         $clave = $usuario_encontrado['clave'];
        //         // dd($usuario_encontrado);
        //         session(['usuario_dni' => $dni]);
        //         session(['nombres' => $nombres]);
        //         session(['email' => $email]);
        //         session(['clave' => $clave]);
        //         Session::put('dni_registrado', $dni);
        //         Session::put('nombre_usuario', $nombres);
        //         return redirect('/home');
        //     } else {
        //         Session::flash('email_no_valido', 'Contraseña incorrecta, intente nuevamente');
        //         return redirect('/login');
        //         exit();
        //     }
        // }
        else{
            Session::flash('email_no_valido', 'Usuario incorrecto, intente nuevamente');
            return redirect('/iniciar_sesion');
            exit();
        }
    }

    public function Encuentranos()
    {
        return view('encuentranos');
    }
}
