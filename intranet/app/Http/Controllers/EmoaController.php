<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmoaController extends Controller
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
		    $emoa       = DB::table('emoa')
		                    ->where('idempleado', $id)
		                    ->paginate(10);
		    $datos = DB::table('emoa')->get();
		    foreach ($datos as $dato){
			    $DeferenceInDays = Carbon::parse($dato->fvencimiento)->diffInDays(Carbon::now(), false);
			    if( $DeferenceInDays > 0){
				    DB::table('emoa')->where('idemoa', $dato->idemoa)->update(['estado' => 0]);
			    }else{
				    DB::table('emoa')->where('idemoa', $dato->idemoa)->update(['estado' => 1]);
			    }
		    }


	    }catch (\Exception $e) {
		    return back()->with('success',$e->getMessage());
	    }
	    return view('emoa.index', ['empleados' => $empleados, 'emoas' => $emoa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $empleados = DB::table('empleados')->where('idempleado',$id)->first();
    	return view ('emoa.create', ['empleados' => $empleados]);
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
	        $numemoa        = $request->input('numemoa');
	        $femision       = $request->input('femision');
	        $fvencimiento   = $request->input('fvencimiento');
	        $observaciones  = $request->input('observaciones');
	        $estado         = $request->input('estado');
		    $documento      = $request->documento->getClientOriginalName();
		    $usuario        = $request->input('id_user');
		    $fecha          = $this->dateformt;


		    $data   = array('idempleado' => $idempleado,
			                'numemoa' => $numemoa,
			                'femision' => $femision,
			                'fvencimiento' => $fvencimiento,
		                    'observaciones' => $observaciones,
			                'estado' => $estado,
			                'documento' => $documento,
			                'usuario_creacion' => $usuario,
			                'fecha_creacion' => $fecha);

		    DB::table('emoa')->insert($data);
	    }catch (\Exception $e){
		    return back()->with('success',$e->getMessage());
	    }

	    $request->documento->storeAs('empleados/emoa/'.$idempleado.'/', $documento);

	    return redirect()->route('emoaPersonal', $idempleado)
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
    	$emoas = DB::table('emoa')->where('idemoa', $id)->first();
    	return view('emoa.edit', ['emoas' => $emoas]);
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
		    $numemoa        = $request->input('numemoa');
		    $femision       = $request->input('femision');
		    $fvencimiento   = $request->input('fvencimiento');
		    $observaciones  = $request->input('observaciones');
		    $estado         = $request->input('estado');
		    $usuario        = $request->input('id_user');
		    $fecha          = $this->dateformt;

		    if($request->file('documento')){
			    $documento  = $request->documento->getClientOriginalName();
			    $request->documento->storeAs('empleados/emoa/'.$idempleado.'/', $documento);
		    }else{
			    $documento = $request->input('documento_old');
		    }

		    $data   = array('idempleado' => $idempleado,
		                    'numemoa' => $numemoa,
		                    'femision' => $femision,
		                    'fvencimiento' => $fvencimiento,
		                    'observaciones' => $observaciones,
		                    'estado' => $estado,
		                    'documento' => $documento,
		                    'usuario_actualizo' => $usuario,
		                    'fecha_actualizo' => $fecha);

		    DB::table('emoa')->where('idemoa',$id)->update($data);
	    }catch (\Exception $e){
		    return back()->with('success',$e->getMessage());
	    }
	    return redirect()->route('emoaPersonal', $idempleado)
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

	    	$empleados = DB::table('emoa')->where('idemoa',$id)->first();

		    DB::table('emoa')->where('idemoa',$id)->delete();

		    $max = DB::table('emoa')->max('idemoa') + 1;
		    DB::statement("ALTER TABLE emoa AUTO_INCREMENT =  $max");

		    Storage::disk('local')->delete('empleados/emoa/'.$empleados->idempleado.'/'.$empleados->documento);

	    }catch (\Exception $e) {
		    return back()->with('success',$e->getMessage());
	    }
	    return redirect()->route('emoaPersonal', $empleados->idempleado)
	                     ->with('success', 'Registro eliminado correctamente');
    }

	public function file($id)
	{
		$path_storage = storage_path();

		$dl = DB::table('emoa')->where('idemoa', $id)->first();
		return response()->download("$path_storage/app/empleados/emoa/$dl->idempleado/$dl->documento");

	}
}
