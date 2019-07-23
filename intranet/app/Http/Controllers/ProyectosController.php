<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $dateformt;

    public function __construct(){
        $this->dateformt = date('Y-m-d');
    }

    public function index()
    {
        $proyectos =    DB::table('proyectos')
	                    ->orderBy('id_proyecto','desc')
                        ->get();
        return view('proyectos.index', ['proyectos' => $proyectos]);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cod_proyecto           = $request->input('cod_proyecto');
        $nombre_proyecto        = $request->input('nombre_proyecto');
	    $periodo_ejecucion      = $request->input('periodo_ejecucion');
        $duracion               = $request->input('duracion');
        $estado_proyecto        = $request->input('estado_proyecto');
        $carpetas               = $request->input('carpetas');
        $usuario_creacion       = $request->input('id_user');
        $fecha_creacion         = $this->dateformt;


	    $carpetas = $carpetas ? 1 : 0;

	    $id = DB::table('proyectos')->max('id_proyecto');

	    $id = $id + 1;

	    if($carpetas = 1) {
		    $carpetasprincpales = DB::table('carpetas_principales')->get();

		    foreach ( $carpetasprincpales as $carpeta ) {
			    Storage::disk('local')->makeDirectory('proyecto/'.$id.'/'.$carpeta->nombre,0775,true);
		    }
	    }


        $data = array('cod_proyecto'            => $cod_proyecto,
                        'nombre_proyecto'       => $nombre_proyecto,
	                    'periodo_ejecucion'     => $periodo_ejecucion,
	                    'duracion'              => $duracion,
	                    'estado_proyecto'       => $estado_proyecto,
                        'carpetas'              => $carpetas,
	                    'usuario_creacion'      => $usuario_creacion,
	                    'fecha_creacion'        => $fecha_creacion
        );
		//dd($data);
		DB::table('proyectos')->insert($data);
		return redirect()->route('proyectos.index')
	                     ->with('success','Registro Exitoso');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyectos = DB::table('proyectos')->where('id_proyecto','=',$id)->first();
        $actividades = DB::table('actividades')->where('id_proyecto','=',$id)->paginate(10);
        return view('proyectos.detail',  ['proyectos' => $proyectos, 'actividades' => $actividades]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $proyectos = DB::table('proyectos')->where('id_proyecto','=',$id)->first();

    	return view('proyectos.edit',  ['proyectos' => $proyectos]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	    $cod_proyecto           = $request->input('cod_proyecto');
	    $nombre_proyecto        = $request->input('nombre_proyecto');
	    $periodo_ejecucion      = $request->input('periodo_ejecucion');
	    $duracion               = $request->input('duracion');
	    $estado_proyecto        = $request->input('estado_proyecto');
	    $carpetas               = $request->input('carpetas');
	    $usuario_creacion       = $request->input('id_user');
	    $fecha_creacion         = $this->dateformt;


	    $carpetas = $carpetas ? 1 : 0;

	    if($carpetas = 1) {
		    $carpetasprincpales = DB::table('carpetas_principales')->get();

		    foreach ( $carpetasprincpales as $carpeta ) {
			    Storage::disk('local')->makeDirectory('proyecto/'.$id.'/'.$carpeta->nombre,0775,true);
		    }
	    }

	    $data = array('cod_proyecto'            => $cod_proyecto,
	                  'nombre_proyecto'         => $nombre_proyecto,
	                  'periodo_ejecucion'       => $periodo_ejecucion,
	                  'duracion'                => $duracion,
	                  'estado_proyecto'         => $estado_proyecto,
	                  'carpetas'                => $carpetas,
	                  'usuario_actualizo'       => $usuario_creacion,
	                  'fecha_actualizo'         => $fecha_creacion
	    );
	    //dd($data);
	    DB::table('proyectos')->where('id_proyecto', $id)->update($data);
	    return redirect()->route('proyectos.index')
	                     ->with('success','Registro Exitoso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function destroy($id)
	{
		DB::table('proyectos')->where('id_proyecto', $id)->delete();
		return redirect()->route('proyectos.index')
		                 ->with('success', 'Registro eliminado correctamente');

	}

	public function file($id)
	{
		$dl = DB::table('proyectos')->where('id_proyecto', $id)->first();
		return response()->download("../intranet/storage/app/cronograma/$dl->cod_proyecto/$dl->cronograma");
	}
}
