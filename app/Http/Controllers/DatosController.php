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
use Inertia\Inertia;


//MODELS
use App\models\Sugerencia;
use App\models\Permisos\Permiso;
use App\models\Permisos\Permisos_Usuario;
use App\Models\Reclamo;

class DatosController extends Controller
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function sugerencias()
    {
        $sugerencias = Sugerencia::from('sugerencias')
        ->select(
            'id',
            'sugerencia'
        )
        ->get();
        return Inertia::render('algoextra/Usuarios/sugerencias', [
            'sugerencias' => $sugerencias,
        ]);
    }
    public function guardar_sugerencia(Request $request)
    {
        $datos_tipo =  $request->except('_token');
        // dd($datos_tipo);
        $usuario_registro = $datos_tipo['dni'];
        
        $nombre_tipo = mb_strtoupper($datos_tipo['sugerencia']);

        if ($datos_tipo['modo'] == "NUEVO") {

            Sugerencia::create(array(
                'sugerencia' => $nombre_tipo,
                'dni' => $usuario_registro
            ));
        } else if ($datos_tipo['modo'] == "EDITAR") {
            $id = $datos_tipo['id'];
            Sugerencia::where([['id', $id],['dni',$usuario_registro]])
                ->update([
                    'sugerencia' => $nombre_tipo,
                ]);
        }

        return  redirect()->route('mis_datos.sugerencias');
    }

    public function reclamos()
    {
        $reclamos = Reclamo::from('reclamos')
        ->select(
            'id',
            'reclamos'
        )
        ->get();
        return Inertia::render('algoextra/Usuarios/reclamos', [
            'reclamos' => $reclamos,
        ]);
    }

    public function guardar_reclamo(Request $request)
    {
        $datos_tipo =  $request->except('_token');
        $usuario_registro = $datos_tipo['dni'];
        // dd($datos_tipo);
        $nombre_tipo = mb_strtoupper($datos_tipo['reclamos']);

        if ($datos_tipo['modo'] == "NUEVO") {

            Reclamo::create(array(
                'reclamos' => $nombre_tipo,
                'dni' => $usuario_registro
            ));
        } else if ($datos_tipo['modo'] == "EDITAR") {
            $id = $datos_tipo['id'];
            Reclamo::where([['id', $id],['dni',$usuario_registro]])
                ->update([
                    'reclamos' => $nombre_tipo,
                ]);
        }

        return  redirect()->route('mis_datos.reclamos');
    }
}
