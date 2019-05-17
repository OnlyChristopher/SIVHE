<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CargosController extends Controller
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
        $cargos = DB::table('cargos')->paginate(10);

        return view('cargos.index', ['cargos' => $cargos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cargos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre             = $request->input('nombre');
        $usuario_creacion   = $request->input('id_user');
        $fecha_creacion     = $this->dateformt;

        $data = array(  'nombre'            => $nombre,
	                    'usuario_creacion'  => $usuario_creacion,
	                    'fecha_creacion'    => $fecha_creacion);

	    DB::table('cargos')->insert($data);

	    return redirect()->route('cargos.index')
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
        $cargos = DB::table('cargos')->where('idcargo',$id)->first();

        return view('cargos.edit', ['cargos' => $cargos]);
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
	    $nombre             = $request->input('nombre');
	    $usuario_creacion   = $request->input('id_user');
	    $fecha_creacion     = $this->dateformt;

	    $data = array('nombre' => $nombre,
	                  'usuario_actualizo' => $usuario_creacion,
	                  'fecha_actualizo' => $fecha_creacion);

	    DB::table('cargos')->where('idcargo',$id)->update($data);

	    return redirect()->route('cargos.index')
	                     ->with('success','Actualización Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    DB::table('cargos')->where('idcargo', $id)->delete();
	    return redirect()->route('cargos.index')
	                     ->with('success', 'Registro eliminado correctamente');
    }
}
