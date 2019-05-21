<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SctrController extends Controller
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
		    $empleados  = DB::table('empleados')->where('idempleado',$id)->first();
	        $sctr       = DB::table('sctr')
		                   ->where('idempleado', $id)
		                   ->paginate(10);
		    $datos = DB::table('sctr')->get();
		    foreach ($datos as $dato){
			    $DeferenceInDays = Carbon::parse($dato->fvencimiento)->diffInDays(Carbon::now(), false);
			    if( $DeferenceInDays > 0){
				    DB::table('sctr')->where('idsctr', $dato->idsctr)->update(['estado' => 0]);
			    }else{
				    DB::table('sctr')->where('idsctr', $dato->idsctr)->update(['estado' => 1]);
			    }
		    }
	    }catch (\Exception $e) {
		    return back()->with('success',$e->getMessage());
	    }
	    return view('sctr.index', ['empleados' => $empleados, 'sctrs' => $sctr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $empleados = DB::table('sctr')->where('idsctr',$id)->first();
        return view('sctr.create', ['empleados' => $empleados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    try {
		    $idempleado     = $request->input('idempleado');
		    $numsctr        = $request->input('numsctr');
		    $femision       = $request->input('femision');
		    $fvencimiento   = $request->input('fvencimiento');
		    $estado         = $request->input('estado');
		    $usuario        = $request->input('id_user');
		    $fecha          = $this->dateformt;


		    $data   = array('idempleado' => $idempleado,
		                    'numsctr' => $numsctr,
		                    'femision' => $femision,
		                    'fvencimiento' => $fvencimiento,
		                    'estado' => $estado,
		                    'usuario_creacion' => $usuario,
		                    'fecha_creacion' => $fecha);

		    DB::table('sctr')->insert($data);
	    }catch (\Exception $e){
		    return back()->with('success',$e->getMessage());
	    }
	    return redirect()->route('sctrPersonal', $idempleado)
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
	    $sctr = DB::table('sctr')->where('idsctr', $id)->first();
	    return view('sctr.edit', ['sctr' => $sctr]);
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
	    try {
		    $idempleado     = $request->input('idempleado');
		    $numsctr        = $request->input('numsctr');
		    $femision       = $request->input('femision');
		    $fvencimiento   = $request->input('fvencimiento');
		    $estado         = $request->input('estado');
		    $usuario        = $request->input('id_user');
		    $fecha          = $this->dateformt;



		    $data   = array('idempleado' => $idempleado,
		                    'numsctr' => $numsctr,
		                    'femision' => $femision,
		                    'fvencimiento' => $fvencimiento,
		                    'estado' => $estado,
		                    'usuario_actualizo' => $usuario,
		                    'fecha_actualizo' => $fecha);

		    DB::table('sctr')->where('idsctr',$id)->update($data);
	    }catch (\Exception $e){
		    return back()->with('success',$e->getMessage());
	    }
	    return redirect()->route('sctrPersonal', $idempleado)
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

		    $empleados = DB::table('sctr')->where('idsctr',$id)->first();

		    DB::table('sctr')->where('idsctr',$id)->delete();

		    $max = DB::table('sctr')->max('idsctr') + 1;
		    DB::statement("ALTER TABLE sctr AUTO_INCREMENT =  $max");


	    }catch (\Exception $e) {
		    return back()->with('success',$e->getMessage());
	    }
	    return redirect()->route('sctrPersonal', $empleados->idempleado)
	                     ->with('success', 'Registro eliminado correctamente');

    }
}
