<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PersonalController extends Controller
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
	    $empleados =    DB::table('empleados')
		                  ->leftJoin('tipo_documento', 'tipo_documento.idtipodoc', '=', 'empleados.idtipodoc')
		                  ->select('empleados.*', 'tipo_documento.descripcion')
	                      ->orderBy('idempleado','desc')
	                      ->paginate(10);
	    return view('personal.index', ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$tipodocumentos = DB::table('tipo_documento')->get();
        return view('personal.create', ['tipodocumentos' => $tipodocumentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre1        = $request->input('nombre1');
        $nombre2        = $request->input('nombre2');
        $apepaterno     = $request->input('apepaterno');
        $apematerno     = $request->input('apematerno');
        $idtipodoc      = $request->input('idtipodoc');
        $numerodoc      = $request->input('numerodoc');
        $fnacimiento    = $request->input('fnacimiento');
        $estadocivil    = $request->input('estadocivil');
        $direccion      = $request->input('direccion');
        $usuario_creacion = $request->input('id_user');
        $fecha_creacion = $this->dateformt;

        $data = array(  'nombre1' => $nombre1,
	                    'nombre2' => $nombre2,
                        'apepaterno' => $apepaterno,
				        'apematerno' => $apematerno,
				        'idtipodoc' => $idtipodoc,
				        'numerodoc' => $numerodoc,
				        'fnacimiento' => $fnacimiento,
				        'estadocivil' => $estadocivil,
				        'direccion' => $direccion,
				        'usuario_creacion' => $usuario_creacion,
				        'fecha_creacion' => $fecha_creacion);

	    DB::table('empleados')->insert($data);

	    return redirect()->route('personal.index')
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
        $empleados = DB::table('empleados')->where('idempleado', $id)->first();
	    $tipodocumentos = DB::table('tipo_documento')->get();

        return view('personal.edit', ['empleados' => $empleados, 'tipodocumentos' => $tipodocumentos]);
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
	    $nombre1        = $request->input('nombre1');
	    $nombre2        = $request->input('nombre2');
	    $apepaterno     = $request->input('apepaterno');
	    $apematerno     = $request->input('apematerno');
	    $idtipodoc      = $request->input('idtipodoc');
	    $numerodoc      = $request->input('numerodoc');
	    $fnacimiento    = $request->input('fnacimiento');
	    $estadocivil    = $request->input('estadocivil');
	    $direccion      = $request->input('direccion');
	    $usuario_creacion = $request->input('id_user');
	    $fecha_creacion = $this->dateformt;

	    $data = array(  'nombre1' => $nombre1,
	                    'nombre2' => $nombre2,
	                    'apepaterno' => $apepaterno,
	                    'apematerno' => $apematerno,
	                    'idtipodoc' => $idtipodoc,
	                    'numerodoc' => $numerodoc,
	                    'fnacimiento' => $fnacimiento,
	                    'estadocivil' => $estadocivil,
	                    'direccion' => $direccion,
	                    'usuario_actualizo' => $usuario_creacion,
	                    'fecha_actualizo' => $fecha_creacion);

	    DB::table('empleados')->where('idempleado', $id)->update($data);

	    return redirect()->route('personal.index')
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
	    DB::table('empleados')->where('idempleado', $id)->delete();

	    $max = DB::table('empleados')->max('idempleado') + 1;
	    DB::statement("ALTER TABLE empleados AUTO_INCREMENT =  $max");

	    return redirect()->route('personal.index')
	                     ->with('success', 'Registro eliminado correctamente');
    }
}
