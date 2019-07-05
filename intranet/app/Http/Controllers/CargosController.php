<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    	$cargos = DB::table('positions')->get();

    	return view('administracion.cargos.index', ['cargos' => $cargos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.cargos.create');
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
        $usuario_creacion   = $request->input('usuario_creacion');

        $data = array( 'nombre' => $nombre,
                       'usuario_creacion' => $usuario_creacion,
                       'fecha_creacion' => $this->dateformt);

	    DB::table('positions')->insert($data);

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
        $cargos = DB::table('positions')->where('id', $id)->first();
    	return view ('administracion.cargos.edit', ['cargos' => $cargos]);
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
	    $usuario_creacion   = $request->input('usuario_creacion');

	    $data = array( 'nombre' => $nombre,
	                   'usuario_actualizo' => $usuario_creacion,
	                   'fecha_actualizo' => $this->dateformt);

	    DB::table('positions')->where('id',$id)->update($data);

	    return redirect()->route('cargos.index')
	                     ->with('success','Registro Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    DB::table('positions')->where('id', $id)->delete();
	    return redirect()->route('cargos.index')
	                     ->with('success', 'Registro Eliminado');
    }
}
