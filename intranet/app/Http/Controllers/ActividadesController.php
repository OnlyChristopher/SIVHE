<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;


class ActividadesController extends Controller
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
        $actividades =  DB::table('actividades')
                        ->join('proyectos','proyectos.id_proyecto', '=', 'actividades.id_proyecto')
                        ->select('actividades.*','proyectos.nombre_proyecto')
                        ->orderBy('actividades.id_actividades')
                        ->get();
        return view('proyectos.actividades.index', ['actividades' => $actividades]);

    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyectos  =   DB::table('proyectos')->get();
		//$estados    =   DB::table('estados')->get();
    	return view('proyectos.actividades.create', ['proyectos' => $proyectos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_proyecto            = $request->input('id_proyecto');
	    $nombre_actividades     = $request->input('nombre_actividades');
	    $cod_proyecto           = $request->input('cod_proyecto');
	    $requisicion            = $request->input('requisicion');
	    $osc                    = $request->input('osc');
	    $bases                  = $request->input('bases');
	    $comprador              = $request->input('comprador');
	    $costo_presupuestado    = $request->input('costo_presupuestado');
	    $estatus                = $request->input('estatus');
	    $adjudicado             = $request->input('adjudicado');
	    $tiempo_ejecucion       = $request->input('tiempo_ejecucion');
	    $fr043                  = $request->input('fr043');
	    $movilizado             = $request->input('movilizado');
	    $operador               = $request->input('operador');
	    $visita_terreno         = $request->input('visita_terreno');
	    $fecha_estimada         = $request->input('fecha_estimada');
	    $fase                   = $request->input('fase');
	    $avance                 = $request->input('avance');
	    $comentarios            = $request->input('comentarios');
	    $usuario_creacion       = $request->input('id_user');
	    $fecha_creacion = $this->dateformt;

	    $data = array('id_proyecto' => $id_proyecto,
		                'nombre_actividades' => $nombre_actividades,
		                'cod_proyecto' => $cod_proyecto,
		                'requisicion' => $requisicion,
		                'osc' => $osc,
		                'bases' => $bases,
		                'comprador' => $comprador,
		                'costo_presupuestado' => $costo_presupuestado,
		                'estatus' => $estatus,
		                'adjudicado' => $adjudicado,
		                'tiempo_ejecucion' => $tiempo_ejecucion,
		                'fr043' => $fr043,
		                'movilizado' => $movilizado,
		                'operador' => $operador,
		                'visita_terreno' => $visita_terreno,
		                'fecha_estimada' => $fecha_estimada,
		                'fase' => $fase,
		                'avance' => $avance,
		                'comentarios' => $comentarios,
		                'usuario_creacion' => $usuario_creacion,
		                'fecha_creacion' => $fecha_creacion
		                );

	    DB::table('actividades')->insert($data);
	    return redirect()->route('actividades.index')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividades = DB::table('actividades')
                         ->where('id_actividades',$id)
                         ->first();
	    $proyectos  =   DB::table('proyectos')->get();
        return view('proyectos.actividades.edit', ['actividades' => $actividades, 'proyectos' => $proyectos]);

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
         $id_proyecto            = $request->input('id_proyecto');
	     $nombre_actividades     = $request->input('nombre_actividades');
	     $cod_proyecto           = $request->input('cod_proyecto');
	     $requisicion            = $request->input('requisicion');
	     $osc                    = $request->input('osc');
	     $bases                  = $request->input('bases');
	     $comprador              = $request->input('comprador');
	     $costo_presupuestado    = $request->input('costo_presupuestado');
	     $estatus                = $request->input('estatus');
	     $adjudicado             = $request->input('adjudicado');
	     $tiempo_ejecucion       = $request->input('tiempo_ejecucion');
	     $fr043                  = $request->input('fr043');
	     $movilizado             = $request->input('movilizado');
	     $operador               = $request->input('operador');
	     $visita_terreno         = $request->input('visita_terreno');
	     $fecha_estimada         = $request->input('fecha_estimada');
	     $fase                   = $request->input('fase');
	     $avance                 = $request->input('avance');
         $comentarios            = $request->input('comentarios');
	     $usuario_creacion       = $request->input('id_user');
		 $fecha_creacion         = $this->dateformt;


         $data = array('id_proyecto' => $id_proyecto,
	                  'nombre_actividades' => $nombre_actividades,
	                  'cod_proyecto' => $cod_proyecto,
	                  'requisicion' => $requisicion,
	                  'osc' => $osc,
	                  'bases' => $bases,
	                  'comprador' => $comprador,
	                  'costo_presupuestado' => $costo_presupuestado,
	                  'estatus' => $estatus,
	                  'adjudicado' => $adjudicado,
	                  'tiempo_ejecucion' => $tiempo_ejecucion,
	                  'fr043' => $fr043,
	                  'movilizado' => $movilizado,
	                  'operador' => $operador,
	                  'visita_terreno' => $visita_terreno,
	                  'fecha_estimada' => $fecha_estimada,
	                  'fase' => $fase,
	                  'avance' => $avance,
	                  'comentarios' => $comentarios,
	                  'usuario_creacion' => $usuario_creacion,
	                  'fecha_creacion' => $fecha_creacion
	     );

	    DB::table('actividades')->where('id_actividades',$id)->update($data);
	    return redirect()->route('actividades.index')
	                     ->with('success','Actualizacion Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    DB::table('actividades')->where('id_actividades', $id)->delete();
	    return redirect()->route('actividades.index')
	                     ->with('success', 'Registro eliminado correctamente');
    }
}
