<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ContratosController extends Controller
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
	        $empleados = DB::table('empleados')->where('idempleado',$id)->first();
	        $contratos = DB::table('contratos')
	                       ->leftJoin('cargos', 'cargos.idcargo','=','contratos.idcargo')
	                       ->select('contratos.*', 'cargos.nombre')
	                       ->where('idempleado', $id)
	                       ->paginate(10);

	        $datos = DB::table('contratos')->get();
	        foreach ($datos as $dato){
		        $DeferenceInDays = Carbon::parse($dato->ffin)->diffInDays(Carbon::now(), false);
		        if( $DeferenceInDays > 0){
			        DB::table('contratos')->where('idcontrato', $dato->idcontrato)->update(['estado' => 0]);
		        }else{
			        DB::table('contratos')->where('idcontrato', $dato->idcontrato)->update(['estado' => 1]);

		        }
	        }
        }catch (\Exception $e) {
	        return back()->with('success',$e->getMessage());
        }
        return view('contratos.index', ['empleados' => $empleados, 'contratos' => $contratos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
	    $empleados = DB::table('empleados')->where('idempleado',$id)->first();
	    $cargos = DB::table('cargos')->get();
	    return view('contratos.create', ['empleados' => $empleados, 'cargos' => $cargos]);

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
	        $numcontrato    = $request->input('numcontrato');
	        $idcargo        = $request->input('idcargo');
	        $fotocheck      = $request->input('fotocheck');
	        $finicio        = $request->input('finicio');
	        $ffin           = $request->input('ffin');
	        $estado         = $request->input('estado');
	        $usuario        = $request->input('id_user');
	        $fecha          = $this->dateformt;

	        $data   = array('idempleado' => $idempleado,
		                    'numcontrato' => $numcontrato,
		                    'idcargo' => $idcargo,
		                    'fotocheck' => $fotocheck,
		                    'finicio' => $finicio,
	                        'ffin' => $ffin,
		                    'estado' => $estado,
		                    'usuario_creacion' => $usuario,
		                    'fecha_creacion' => $fecha);

	        DB::table('contratos')->insert($data);
	    }catch ( \Exception $e) {
			return back()->with('success',$e->getMessage());
		}
	        return redirect()->route('contratoPersonal', $idempleado)
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
	    try {
		    $contratos = DB::table('contratos')->where('idcontrato',$id)->first();
		    $cargos = DB::table('cargos')->get();
	    } catch ( \Exception $e) {
		    return back()->with('success',$e->getMessage());
	    }
	    return view('contratos.edit', ['contratos' => $contratos, 'cargos' => $cargos]);


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
		    $numcontrato    = $request->input('numcontrato');
		    $idcargo        = $request->input('idcargo');
		    $fotocheck      = $request->input('fotocheck');
		    $finicio        = $request->input('finicio');
		    $ffin           = $request->input('ffin');
		    $estado         = $request->input('estado');
		    $usuario        = $request->input('id_user');
		    $fecha          = $this->dateformt;

		    $data   = array('idempleado' => $idempleado,
		                    'numcontrato' => $numcontrato,
		                    'idcargo' => $idcargo,
		                    'fotocheck' => $fotocheck,
		                    'finicio' => $finicio,
		                    'ffin' => $ffin,
		                    'estado' => $estado,
		                    'usuario_actualizo' => $usuario,
		                    'fecha_actualizo' => $fecha);

		    DB::table('contratos')->where('idcontrato',$id)->update($data);
	    }catch ( \Exception $e) {
		    return back()->with('success',$e->getMessage());
	    }
	    return redirect()->route('contratoPersonal', $idempleado)
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
		    $empleados = DB::table('contratos')->where('idcontrato',$id)->first();
		    DB::table('contratos')->where('idcontrato',$id)->delete();

		    $max = DB::table('contratos')->max('idcontrato') + 1;
		    DB::statement("ALTER TABLE contratos AUTO_INCREMENT =  $max");
	    }catch (\Exception $e){
		    return back()->with('success',$e->getMessage());
	    }
	    return redirect()->route('contratoPersonal', $empleados->idempleado)
	                     ->with('success', 'Registro eliminado correctamente');

    }
}
