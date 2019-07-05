<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClientesController extends Controller
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
        $clientes = DB::table('clientes')->get();
	    return view('administracion.clientes.index', ['clientes' => $clientes]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre_cliente     = $request->input('nombre_cliente');
        $ruc_cliente        = $request->input('ruc_cliente');
        $direccion_cliente  = $request->input('direccion_cliente');
        $usuario_creacion   = $request->input('usuario_creacion');

        $data = array('nombre_cliente' => $nombre_cliente,
                        'ruc_cliente' => $ruc_cliente,
	                    'direccion_cliente' => $direccion_cliente,
	                    'usuario_creacion' => $usuario_creacion,
	                    'fecha_creacion' => $this->dateformt);

        DB::table('clientes')->insert($data);
        return redirect()->route('clientes.index')
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
        $clientes = DB::table('clientes')
	                ->where('id_cliente',$id)
	                ->first();
        return view('administracion.clientes.edit',['clientes' => $clientes]);
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
	    $nombre_cliente     = $request->input('nombre_cliente');
	    $ruc_cliente        = $request->input('ruc_cliente');
	    $direccion_cliente  = $request->input('direccion_cliente');
		    $usuario_actualizo   = $request->input('usuario_creacion');

	    $data = array('nombre_cliente'      => $nombre_cliente,
	                  'ruc_cliente'         => $ruc_cliente,
	                  'direccion_cliente'   => $direccion_cliente,
	                  'usuario_actualizo'   => $usuario_actualizo,
	                  'fecha_actualizo'     => $this->dateformt);

	    DB::table('clientes')->where('id_cliente',$id)->update($data);
	    return redirect()->route('clientes.index')
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
	    try{
		    DB::table('clientes')->where('id_cliente', $id)->delete();
		    $max = DB::table('clientes')->max('id_cliente') + 1;
		    DB::statement("ALTER TABLE clientes AUTO_INCREMENT =  $max");
	    }catch (\Exception $e){
		    return back()->with('success',$e->getMessage());
	    }
	    return redirect()->route('clientes.index')
	                     ->with('success', 'Registro eliminado correctamente');
    }
}
