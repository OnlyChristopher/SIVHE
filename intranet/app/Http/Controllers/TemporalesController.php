<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TemporalesController extends Controller
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
        $temporales = DB::table('temporales')
                        ->join('users as c', 'c.id', '=', 'temporales.usuario_carga')
	                    ->join('users as r', 'r.id', '=', 'temporales.usuario_revision')
	                    ->join('documentos', 'documentos.id_doc', '=', 'temporales.tipo_doc')
	                    ->join('proyectos', 'proyectos.id_proyecto', '=', 'temporales.id_proyecto')
                        ->select('temporales.*','c.firstname','c.lastname' , 'r.firstname as nombre','r.lastname as apellido','documentos.tipo_doc', 'proyectos.nombre_proyecto')
	                    ->get();

		$temps = DB::table('temporales')->get();

		foreach ($temps as $temp){
			$documentos = DB::table('documentos')->where('id_doc', $temp->tipo_doc)->first();
				$DeferenceInDays = Carbon::parse(Carbon::now())->diffInDays($temp->fecha_carga);
				if( $DeferenceInDays > $documentos->vigencia_doc){
					DB::table('temporales')->where('id_temporal', $temp->id_temporal)->update(['estado' => 'CADUCADO']);
				 }

				if( $DeferenceInDays > 0 && $DeferenceInDays < $documentos->vigencia_doc){
					DB::table('temporales')->where('id_temporal', $temp->id_temporal)->update(['estado' => 'PENDIENTE']);
				}

		}

        return view('proyectos.temporales.index', ['temporales' => $temporales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$usuarios       = DB::table('users')->get();
    	$documentos     = DB::table('documentos')->get();
    	$proyectos      = DB::table('proyectos')->get();

	    return view( 'proyectos.temporales.create', [
                                                      'fecha'      => $this->dateformt,
	                                                  'usuarios'   => $usuarios,
	                                                  'documentos' => $documentos,
	                                                  'proyectos'  => $proyectos
	    ] );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$usuario_carga      = $request->input('id_user');
    	$tipo_doc           = $request->input('tipo_doc');
        $id_proyecto        = $request->input('id_proyecto');
	    $usuario_revision   = $request->input('usuario_revision');
        $comentarios        = $request->input('comentarios');
        $fecha              = $request->input('fecha');
        $documento          = $request->documento->getClientOriginalName();
        $id_user            = $request->input('id_user');
        $fecha_creacion     = $this->dateformt;

        $documentos = DB::table('documentos')->where('id_doc',$tipo_doc)->first();
        $dias   = $documentos->vigencia_doc;
        $fecha_vigencia = date("Y-m-d",strtotime($fecha_creacion."+ $dias days"));

        $request->documento->storeAs('temporales/'.$usuario_carga,$documento);

        $data =     array(  'usuario_carga'     => $usuario_carga,
	                        'id_proyecto'          => $id_proyecto,
	                        'tipo_doc'          => $tipo_doc,
	                        'nombre_archivo'    => $documento,
	                        'comentarios'       => $comentarios,
	                        'fecha_carga'       => $fecha,
	                        'fecha_devolucion'  => $fecha_vigencia,
	                        'estado'            => 'VIGENTE',
	                        'documento'         => $documento,
	                        'usuario_revision'  => $usuario_revision,
	                        'usuario_creacion'  => $id_user,
	                        'fecha_creacion'     => $fecha_creacion);

        DB::table('temporales')->insert($data);

	    return redirect()->route('temporales.index')
	                     ->with('success', 'Registro Exitoso');


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
        $temporales = DB::table('temporales')
                        ->where('id_temporal', $id)
                        ->first();
	    $usuarios       = DB::table('users')->get();
	    $documentos     = DB::table('documentos')->get();
	    $proyectos      = DB::table('proyectos')->get();


        //dd($temporales);

        return view('proyectos.temporales.edit', [ 'temporales' => $temporales, 'usuarios'   => $usuarios,'documentos' => $documentos,'proyectos'  => $proyectos]);
    }

	public function file($id)
	{
		$dl = DB::table('temporales')->where('id_temporal', $id)->first();
		return response()->download("../intranet/storage/app/temporales/$dl->usuario_carga/$dl->documento");
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
	    $usuario_carga      = $request->input('id_user');
	    $tipo_doc           = $request->input('tipo_doc');
	    $id_proyecto        = $request->input('id_proyecto');
	    $usuario_revision   = $request->input('usuario_revision');
	    $comentarios        = $request->input('comentarios');
	    $documento          = $request->documento->getClientOriginalName();
	    $id_user            = $request->input('id_user');
	    $fecha_actualizo    = $this->dateformt;

	    $request->documento->storeAs('temporales/'.$usuario_carga,$documento);

	    $data =     array(  'usuario_carga'     => $usuario_carga,
	                        'id_proyecto'       => $id_proyecto,
	                        'tipo_doc'          => $tipo_doc,
	                        'nombre_archivo'    => $documento,
	                        'comentarios'       => $comentarios,
	                        'documento'         => $documento,
	                        'usuario_revision'  => $usuario_revision,
	                        'usuario_actualizo' => $id_user,
	                        'fecha_actualizo'   => $fecha_actualizo);

	    DB::table('temporales')->where('id_temporal',$id)->update($data);

	    return redirect()->route('temporales.index')
	                     ->with('success', 'Registro Modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('temporales')->where('id_temporal',$id)->delete();
        return redirect()->route('temporales.index')
	        ->with('succes', 'Registro eliminado correctamente');
    }
}
