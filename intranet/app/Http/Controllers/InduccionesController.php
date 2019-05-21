<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InduccionesController extends Controller
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

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
	 */
	public function index($id)
    {
	    try {
		    $empleados  = DB::table('empleados')->where('idempleado',$id)->first();
		    $inducciones = DB::table('induccion')
		                    ->where('idempleado', $id)
		                    ->paginate(10);
		    $datos = DB::table('induccion')->get();
		    foreach ($datos as $dato){
			    $DeferenceInDays = Carbon::parse($dato->fvencimiento)->diffInDays(Carbon::now(), false);
			    if( $DeferenceInDays > 0){
				    DB::table('induccion')->where('idinduccion', $dato->idinduccion)->update(['estado' => 0]);
			    }else{
				    DB::table('induccion')->where('idinduccion', $dato->idinduccion)->update(['estado' => 1]);
			    }
		    }

	    }catch (\Exception $e) {
		    return back()->with('success',$e->getMessage());
	    }
	    return view('inducciones.index', ['empleados' => $empleados, 'inducciones' => $inducciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    	$empleados = DB::table('empleados')->where('idempleado',$id)->first();
        return view('inducciones.create', ['empleados' => $empleados]);
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
		    $numinduccion   = $request->input('numinduccion');
		    $femision       = $request->input('femision');
		    $fvencimiento   = $request->input('fvencimiento');
		    $estado         = $request->input('estado');
		    $documento      = $request->documento->getClientOriginalName();
		    $usuario        = $request->input('id_user');
		    $fecha          = $this->dateformt;


		    $data   = array('idempleado' => $idempleado,
		                    'numinduccion' => $numinduccion,
		                    'femision' => $femision,
		                    'fvencimiento' => $fvencimiento,
		                    'estado' => $estado,
		                    'documento' => $documento,
		                    'usuario_creacion' => $usuario,
		                    'fecha_creacion' => $fecha);

		    DB::table('induccion')->insert($data);
	    }catch (\Exception $e){
		    return back()->with('success',$e->getMessage());
	    }

	    $request->documento->storeAs('empleados/induccion/'.$idempleado.'/', $documento);

	    return redirect()->route('induccionesPersonal', $idempleado)
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
        $induccion = DB::table('induccion')->where('idinduccion',$id)->first();

        return view('inducciones.edit', ['induccion' => $induccion]);
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
		    $numinduccion   = $request->input('numinduccion');
		    $femision       = $request->input('femision');
		    $fvencimiento   = $request->input('fvencimiento');
		    $estado         = $request->input('estado');
		    $usuario        = $request->input('id_user');
		    $fecha          = $this->dateformt;

		    if($request->file('documento')){
			    $documento  = $request->documento->getClientOriginalName();
			    $request->documento->storeAs('empleados/induccion/'.$idempleado.'/', $documento);
		    }else{
			    $documento = $request->input('documento_old');
		    }

		    $data   = array('idempleado' => $idempleado,
		                    'numinduccion' => $numinduccion,
		                    'femision' => $femision,
		                    'fvencimiento' => $fvencimiento,
		                    'estado' => $estado,
		                    'documento' => $documento,
		                    'usuario_actualizo' => $usuario,
		                    'fecha_actualizo' => $fecha);

		    DB::table('induccion')->where('idinduccion',$id)->update($data);
	    }catch (\Exception $e){
		    return back()->with('success',$e->getMessage());
	    }
	    return redirect()->route('induccionesPersonal', $idempleado)
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

		    $empleados = DB::table('induccion')->where('idinduccion',$id)->first();

		    DB::table('induccion')->where('idinduccion',$id)->delete();

		    $max = DB::table('induccion')->max('idinduccion') + 1;
		    DB::statement("ALTER TABLE induccion AUTO_INCREMENT =  $max");

		    Storage::disk('local')->delete('empleados/induccion/'.$empleados->idempleado.'/'.$empleados->documento);

	    }catch (\Exception $e) {
		    return back()->with('success',$e->getMessage());
	    }
	    return redirect()->route('induccionesPersonal', $empleados->idempleado)
	                     ->with('success', 'Registro eliminado correctamente');
    }

	public function file($id)
	{
		$path_storage = storage_path();

		$dl = DB::table('induccion')->where('idinduccion', $id)->first();
		return response()->download("$path_storage/app/empleados/induccion/$dl->idempleado/$dl->documento");

	}
}
