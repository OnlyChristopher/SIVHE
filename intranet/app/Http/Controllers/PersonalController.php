<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

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
		                  ->leftJoin('operadores', 'operadores.idoperador','=','empleados.idoperador')
		                  ->select('empleados.*', 'tipo_documento.descripcion', 'operadores.nombres', 'operadores.apellidos')
	                      ->orderBy('idempleado','desc')
	                      ->get();
	    return view('personal.index', ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$tipodocumentos =   DB::table('tipo_documento')->get();
    	$operadores =       DB::table('operadores')->get();
    	$codwos =           DB::table('operadores')->select('codwo')->distinct()->get();
        return view('personal.create', ['tipodocumentos' => $tipodocumentos, 'operadores' => $operadores, 'codwos' => $codwos]);
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
		$idoperador     = $request->input('idoperador');
		$codwo          = $request->input('codwo');
        $usuario_creacion = $request->input('id_user');
        $fecha_creacion = $this->dateformt;

	    if($request->file('cv')){
		    $cv  = $request->cv->getClientOriginalName();
		    $id = DB::table('empleados')->max('idempleado');

		    $id = $id + 1;

		    $request->cv->storeAs('cv/empleados/'.$id.'/', $cv);
	    }else{
		    $cv = '';
	    }



        $data = array(  'nombre1' => $nombre1,
	                    'nombre2' => $nombre2,
                        'apepaterno' => $apepaterno,
				        'apematerno' => $apematerno,
				        'idtipodoc' => $idtipodoc,
				        'numerodoc' => $numerodoc,
				        'fnacimiento' => $fnacimiento,
				        'estadocivil' => $estadocivil,
				        'direccion' => $direccion,
				        'cv' => $cv,
				        'idoperador' => $idoperador,
				        'codwo' => $codwo,
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
	    $operadores =       DB::table('operadores')->get();
	    $codwos =           DB::table('operadores')->select('codwo')->distinct()->get();
        return view('personal.edit', ['empleados' => $empleados, 'tipodocumentos' => $tipodocumentos, 'operadores' => $operadores, 'codwos' => $codwos]);
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
	    $idoperador     = $request->input('idoperador');
	    $codwo          = $request->input('codwo');
	    $usuario_creacion = $request->input('id_user');
	    $fecha_creacion = $this->dateformt;

	    if($request->file('cv')){
		    $cv  = $request->cv->getClientOriginalName();
		    $request->cv->storeAs('cv/empleados/'.$id.'/', $cv);
	    }else{
		    $cv = $request->input('cv_old');
	    }

	    $data = array(  'nombre1' => $nombre1,
	                    'nombre2' => $nombre2,
	                    'apepaterno' => $apepaterno,
	                    'apematerno' => $apematerno,
	                    'idtipodoc' => $idtipodoc,
	                    'numerodoc' => $numerodoc,
	                    'fnacimiento' => $fnacimiento,
	                    'estadocivil' => $estadocivil,
	                    'direccion' => $direccion,
	                    'cv' => $cv,
	                    'idoperador' => $idoperador,
	                    'codwo' => $codwo,
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
	    try {

		    $dl = DB::table( 'empleados' )->where( 'idempleado', $id )->first();
		    Storage::disk( 'local' )->deleteDirectory( 'cv/empleados/' . $dl->idempleado );

		    DB::table( 'empleados' )->where( 'idempleado', $id )->delete();
		    $max = DB::table( 'empleados' )->max( 'idempleado' ) + 1;
		    DB::statement( "ALTER TABLE empleados AUTO_INCREMENT =  $max" );

	    }catch (\Exception $e) {
		    return back()->with('success',$e->getMessage());
	    }
	    return redirect()->route('personal.index')
	                     ->with('success', 'Registro eliminado correctamente');
    }

	public function file($id)
	{
		$path_storage = storage_path();

		$dl = DB::table('empleados')->where('idempleado', $id)->first();
		return response()->download("$path_storage/app/cv/empleados/$dl->idempleado/$dl->cv");

	}
}
