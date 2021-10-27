<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {

        $x = session()->all();
        if (empty($x['usuario_dni'])) {
            $permisos_array = null;
            // $datos_aplicacion = null;
            $version = null;
        } else {
            $permisos = DB::table('permisos_usuarios')
                ->join('permisos', 'permisos_usuarios.id_permiso', '=', 'permisos.id')
                ->select('permisos.area', 'permisos.modulo')
                ->where('permisos_usuarios.dni', '=', $request->session()->only(['usuario_dni']))
                ->get();
            // $datos_aplicacion = DB::table('datos_aplicacion')->get();
            //$version = DB::select("SELECT * FROM versiones ORDER by id_version DESC LIMIT 1");
            foreach ($permisos as $permiso) {
                $permisos_array[] = $permiso->area . '/' . $permiso->modulo;
            }
        }

        return array_merge(parent::share($request), [
            //

            'appName' => config('app.name'),

            // Lazily
            'user_session' => fn () => $request->session()
                ? $request->session()->all()
                : null,

            'user_permissions' => fn () => $request->session()
                ?   [
                    'permisos' => $permisos_array,
                ]
                : [
                    'permisos' => null,
                ],

            // 'application' => fn () => $request->session()
            //     ?   [
            //         'data' => $datos_aplicacion,
            //         'version' => $version
            //     ]
            //     : [
            //         'data' => null,
            //         'version' => null,
            //     ]
        ]);
    }
}
