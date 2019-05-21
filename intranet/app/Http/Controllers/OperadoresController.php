<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperadoresController extends Controller
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
    public function index($id)
    {
	    try {
		    $empleados      = DB::table('empleados')->where('idempleado',$id)->first();
		    $operadores     = DB::table('operadores')
	                         ->leftJoin('clientes', 'operadores.id_cliente','clientes.id_cliente')
		                     ->where('idempleado', $id)
		                     ->select('operadores.*','clientes.nombre_cliente')
			                 ->paginate(10);

	    }catch (\Exception $e) {
		    return back()->with('success',$e->getMessage());
	    }
	    return view('operadores.index', ['empleados' => $empleados, 'operadores' => $operadores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    	$clientes   = DB::table('clientes')->get();
	    $empleados  = DB::table('empleados')->where('idempleado',$id)->first();


	    return view('operadores.create', ['clientes' => $clientes, 'empleados' => $empleados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	try{
		    $idempleado     = $request->input('idempleado');
		    $nombres        = $request->input('nombres');
		    $apellidos      = $request->input('apellidos');
		    $numcontrato    = $request->input('numcontrato');
		    $id_cliente     = $request->input('id_cliente');
		    $usuario        = $request->input('id_user');
		    $fecha          = $this->dateformt;

		    $data = array('idempleado' => $idempleado,
		                  'nombres' => $nombres,
		                  'apellidos' => $apellidos,
		                  'numcontrato' => $numcontrato,
		                  'id_cliente' => $id_cliente,
		                  'usuario_creacion' => $usuario,
		                  'fecha_creacion' => $fecha);

		    DB::table('operadores')->insert($data);
	    }catch (\Exception $e){
		    return back()->with('success',$e->getMessage());

	    }

	    return redirect()->route('operadoresPersonal', $idempleado)
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
        try{
	        $operadores = DB::table('operadores')->where('idoperador', $id)->first();
	        $clientes   = DB::table('clientes')->get();

        }catch (\Exception $e){
	        return back()->with('success',$e->getMessage());

        }

	    return view('operadores.edit', ['clientes' => $clientes, 'operadores' => $operadores]);

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
	    try{
		    $idempleado     = $request->input('idempleado');
		    $nombres        = $request->input('nombres');
		    $apellidos      = $request->input('apellidos');
		    $numcontrato    = $request->input('numcontrato');
		    $id_cliente     = $request->input('id_cliente');
		    $usuario        = $request->input('id_user');
		    $fecha          = $this->dateformt;

		    $data = array('idempleado' => $idempleado,
		                  'nombres' => $nombres,
		                  'apellidos' => $apellidos,
		                  'numcontrato' => $numcontrato,
		                  'id_cliente' => $id_cliente,
		                  'usuario_actualizo' => $usuario,
		                  'fecha_actualizo' => $fecha);

		    DB::table('operadores')->where('idoperador',$id)->update($data);
	    }catch (\Exception $e){
		    return back()->with('success',$e->getMessage());

	    }

	    return redirect()->route('operadoresPersonal', $idempleado)
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
	    	$empleados = DB::table('operadores')->where('idoperador',$id)->first();
		    DB::table('operadores')->where('idoperador',$id)->delete();

		    $max = DB::table('operadores')->max('idoperador') + 1;
		    DB::statement("ALTER TABLE operadores AUTO_INCREMENT =  $max");
	    }catch (\Exception $e) {
		    return back()->with('success',$e->getMessage());

	    }
	    return redirect()->route('operadoresPersonal', $empleados->idempleado)
	                     ->with('success', 'Registro eliminado correctamente');
    }
}
