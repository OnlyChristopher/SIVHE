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
    public function index()
    {
	    try {
		    $operadores     = DB::table('operadores')
	                         ->leftJoin('clientes', 'operadores.id_cliente','clientes.id_cliente')
		                     ->select('operadores.*','clientes.nombre_cliente')
			                 ->paginate(10);

	    }catch (\Exception $e) {
		    return back()->with('success',$e->getMessage());
	    }
	    return view('operadores.index', ['operadores' => $operadores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$clientes   = DB::table('clientes')->get();


	    return view('operadores.create', ['clientes' => $clientes]);
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
		    $nombres        = $request->input('nombres');
		    $apellidos      = $request->input('apellidos');
		    $codwo          = $request->input('codwo');
		    $id_cliente     = $request->input('id_cliente');
		    $usuario        = $request->input('id_user');
		    $fecha          = $this->dateformt;

		    $data = array(
		                  'nombres' => $nombres,
		                  'apellidos' => $apellidos,
		                  'codwo' => $codwo,
		                  'id_cliente' => $id_cliente,
		                  'usuario_creacion' => $usuario,
		                  'fecha_creacion' => $fecha);

		    DB::table('operadores')->insert($data);
	    }catch (\Exception $e){
		    return back()->with('success',$e->getMessage());

	    }

	    return redirect()->route('operadores.index')
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
		    $nombres        = $request->input('nombres');
		    $apellidos      = $request->input('apellidos');
		    $codwo          = $request->input('codwo');
		    $id_cliente     = $request->input('id_cliente');
		    $usuario        = $request->input('id_user');
		    $fecha          = $this->dateformt;

		    $data = array(
		                  'nombres' => $nombres,
		                  'apellidos' => $apellidos,
		                  'codwo' => $codwo,
		                  'id_cliente' => $id_cliente,
		                  'usuario_actualizo' => $usuario,
		                  'fecha_actualizo' => $fecha);

		    DB::table('operadores')->where('idoperador',$id)->update($data);
	    }catch (\Exception $e){
		    return back()->with('success',$e->getMessage());

	    }

	    return redirect()->route('operadores.index')
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
		    DB::table('operadores')->where('idoperador',$id)->delete();

		    $max = DB::table('operadores')->max('idoperador') + 1;
		    DB::statement("ALTER TABLE operadores AUTO_INCREMENT =  $max");
	    }catch (\Exception $e) {
		    return back()->with('success',$e->getMessage());

	    }
	    return redirect()->route('operadores.index')
	                     ->with('success', 'Registro eliminado correctamente');
    }
}
