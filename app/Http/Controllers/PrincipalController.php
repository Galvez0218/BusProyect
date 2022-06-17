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
use Illuminate\Support\Facades\Auth;

//MODELS
use App\models\Usuario;
use App\models\Permisos\Permiso;
use App\models\Permisos\Permisos_Usuario;
use App\models\Origen;
use App\models\Venta_detalle;
use App\models\Order;
use App\models\ViajeDetalle;
use App\models\Precios_ruta;


use GuzzleHttp\Promise\Create;

use function GuzzleHttp\Promise\all;

class PrincipalController extends Controller
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function Welcome()
    {
        // dd(session()->all());
        $origenes = Origen::select('id', 'nombre_origen')
            ->get();
        $orders = Order::all();
        // dd($orders);

        session()->forget('usuario_dni');
        session()->forget('email');
        session()->forget('clave');
        session()->forget('nombres');
        return view('welcome', compact('origenes', 'orders'));
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
        } else {
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

        $id_permiso = Permiso::select('id')->where('modulo', $modulo)->where('area', $area)->get();

        $result = Permisos_Usuario::from('permisos_usuarios as pu')
            ->select('pu.id')
            ->where('pu.id_permiso', $id_permiso[0]['id'])->where('pu.dni', $dni)->get();
        if (empty($result[0]['id'])) {
            $band = 0;
        } else {
            $band = 1;
        }

        return $band;
    }
    function obtenerFechaEnLetra($fecha){
        $dia= $this->conocerDiaSemanaFecha($fecha);
        $num = date("j", strtotime($fecha));
        $anno = date("Y", strtotime($fecha));
        $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $mes = $mes[(date('m', strtotime($fecha))*1)-1];
        return $dia.', '.$num.' de '.$mes.' del '.$anno;
    }
     
    function conocerDiaSemanaFecha($fecha) {
        $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
        $dia = $dias[date('w', strtotime($fecha))];
        return $dia;
    }

    public function Pago(Request $request)
    {
        // dd($request);
        // de la tabla orders
        $origen = $request->origen;
        $destino = $request->destino;
        // fin tabla orders

        //del select ---
        $origens = $request->origens;
        $destinos = $request->destinos;
        $fecha = $request->fechasalidas;
        // fin----

        $nombres = $request->nombres;
        $apellidos = $request->apellidos;
        
        $dni = $request->dni;
        $precio = $request->precio;
        $hora = $request->hora_sal;
        $asiento = $request->asiento;

        // $datos = $request->all();
        // dd($datos);
        $hora_salidas = Precios_ruta::from('precios_rutas as pr')
        ->select(
            'pr.id',
            'pr.id_origen',
            'pr.id_destino',
            'pr.precio',
            'pr.hora_salida',
            'o.id'
        )
        ->join('origenes as o', 'id_origen','=','o.id')
        ->where('id_origen', $origens)
        ->where('id_destino', $destinos)
        ->get(); 
        foreach ($hora_salidas as $precio) {
            $precio = $precio->precio;
        }
        // dd($precio);

        $origenes = Origen::select(
            'id',
            'nombre_origen',
        )
            // ->join('orders', 'nombre_origen', '=', 'origen')
            ->where('id', $origens)
            ->get();

        $destinos = Origen::select(
            'id',
            'nombre_origen',
        )
            ->where('id', $destinos)
            ->get();

        $fecha = $this->obtenerFechaEnLetra($fecha);
        $hora_salidas = Precios_ruta::from('precios_rutas as pr')
        ->select(
            'pr.id',
            'pr.id_origen',
            'pr.id_destino',
            'pr.precio',
            'pr.hora_salida',
            'o.id'
        )
        ->join('origenes as o', 'id_origen','=','o.id')
        ->where('id_origen', $origens)
        ->where('id_destino', $destinos)
        ->get();

        

        // dd($this->obtenerFechaEnLetra($fecha));
        // $datosviajes = Order::all();
        // $viaje_detalles = ViajeDetalle::all();
        // dd($datos);
        return view('pago', compact('origenes', 'destinos', 'fecha', 'dni', 'precio', 'hora_salidas', 'asiento', 'nombres', 'apellidos'));
    }

    public function pagado(Request $request)
    {
        // return ($request);
        $origen = $request->origen;
        $destino = $request->destino;
        $dni = $request->dni;
        $asiento = $request->asiento;
        $fecha = $request->fecha;
        $firstname = $request->firstname;
        $hora = $request->hora;
        $lastname = $request->lastname;
        $payment_id = $request->payment_id;
        $payment_mode = $request->payment_mode;
        $precio = $request->precio;


        $id_origen = Origen::select(
            'id'
        )
            ->where('nombre_origen', $origen)
            ->get();
        // $id_o = $id_origen->id;

        foreach ($id_origen as $id_o) {
            $id_or = $id_o->id;
        }

        $id_destino = Origen::select(
            'id'
        )
            ->where('nombre_origen', $destino)
            ->get();

        foreach ($id_destino as $id_des) {
            $id_d = $id_des->id;
        }

        // $venta = Venta_detalle::all();

        $id_viaje_detalle = ViajeDetalle::create(array(
            'id_origen' => $id_or,
            'id_destino' => $id_d,
            'precio_viaje' => $precio,
            'hora_salida' => $hora,
            'fecha_salida' => $fecha,
            'id_minivan' => $asiento,
        ));
        $id_viaje = $id_viaje_detalle->id;

        Venta_detalle::create(array(
            'id_viaje_detalle' => $id_viaje,
            'dni_usuario' => $dni,
            'pagado' => 1,
            'metodo_pago' => $payment_mode,
        ));

        Order::where('dni', $dni)->delete();

        return "EXITO";
    }
}
