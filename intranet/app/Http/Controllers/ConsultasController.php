<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = DB::table('empleados')
			        ->leftJoin('tipo_documento', 'tipo_documento.idtipodoc', '=','empleados.idtipodoc')
			        ->leftJoin('contratos', 'contratos.idempleado','=','empleados.idempleado')
			        ->leftJoin('cargos', 'cargos.idcargo','=', 'contratos.idcargo')
			        ->leftJoin('operadores','operadores.idoperador', '=','empleados.idoperador')
			        ->leftJoin('emoa','emoa.idempleado','=','empleados.idempleado')
			        ->leftJoin('sctr', 'sctr.idempleado','=','empleados.idempleado')
			        ->leftJoin('induccion','induccion.idempleado','=', 'empleados.idempleado')
	                ->select('empleados.*','empleados.idempleado as id','contratos.*','contratos.estado as estado_contrato',
		                              'cargos.*','tipo_documento.*','operadores.*','emoa.*','emoa.femision as emoa_emision','emoa.fvencimiento as emoa_vencimiento',
		                              'sctr.*','sctr.fvencimiento as sctr_vencimiento', 'induccion.*','induccion.fvencimiento as induccion_vencimiento')
	                ->orderByDesc('empleados.idempleado')
		            ->get();
    	return view('consultas.index' , ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
