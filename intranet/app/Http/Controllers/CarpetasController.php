<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CarpetasController extends Controller
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
		    $proyectos      =   DB::table('proyectos')
		                         ->where('id_proyecto','=',$id)
		                         ->first();
		    $carpetas       =   DB::table('carpetas_principales')
		                          ->get();
		    $carpetassecond =   DB::table('carpetas_secundarias')
		                          ->where('id_proyecto','=',$proyectos->id_proyecto)
		                          ->get();
		    $archivos =         DB::table('archivos_carpetas')
		                          ->where('id_proyecto','=',$id)
		                          ->whereNull('id_carpetasecundaria')
                                  ->get();
                                  
            $files =         DB::table('archivos_carpetas')
                                 ->where('id_proyecto','=',$id)
                                 ->get();

		    $tree='<ul>';
		    foreach ($carpetas as $carpeta) {
			    $tree .='<li data-jstree=\'{"opened":true}\'><a class="btn-edit-folder" onclick="detail_folder('.$proyectos->id_proyecto.','.$carpeta->id.')" href="#">'.$carpeta->nombre.'</a>';
			    if( count($carpetassecond)) {
				    $tree .= $this->childView( $carpeta->id, $proyectos->id_proyecto);
			    }
			    if(count($archivos)){
				    $tree .= $this->archiveAloneView( $carpeta->id, $proyectos->id_proyecto);
			    }
			    $tree .='</li>';
		    }
		    $tree .='</ul>';
		    return view('proyectos.carpetas.index', ['proyectos' => $proyectos, 'archivos' => $files, 'carpetas' => $carpetassecond],compact('tree'));

	    } catch (\Exception $e) {
            //return back()->withErrors('success',$e->getMessage())->withInput();
            return back()->with('success',$e->getMessage());
	    }

		//dd($tree);
    }

	public function childView($carpeta,$proyecto)
	{
		$carpetassecond =   DB::table('carpetas_secundarias')
		                        ->where('id_carpetaprincipal',$carpeta)
		                        ->where('id_proyecto',$proyecto)
		                        ->get();
		$archivos =         DB::table('archivos_carpetas')
								->where('id_proyecto','=', $proyecto)
								->whereNotNull('id_carpetasecundaria')
								->get();

		$html ='<ul>';
		foreach ($carpetassecond as $arr) {
			if(count($carpetassecond)){
					$html .='<li data-jstree=\'{"opened":true}\'><a class="btn-edit-folder" onclick="edit_folder('.$arr->id.')" href="#">'.$arr->nombre.'</a>';
					if(count($archivos)) {
						$html .=$this->archiveView($arr->id,$arr->id_proyecto);
					}
					$html .='</li>';
			}
		}
		$html .="</ul>";

		if($html=="<ul></ul>"){
			$html ="";
		}
		return $html;
	}
	public function archiveAloneView($carpeta,$proyecto)
	{

		$archivos =   DB::table('archivos_carpetas')
		                ->where('id_proyecto','=',$proyecto)
		                ->where('id_carpetaprincipal','=',$carpeta)
		                ->whereNull('id_carpetasecundaria')
		                ->get();


		$file= '';
		if(count($archivos) > 0){
			$file ='<ul>';
			foreach ($archivos as $arr) {
				if(count($archivos)){
					$carpetas = DB::table('carpetas_principales')->where('id',$arr->id_carpetaprincipal)->first();

					$path = storage_path().'/app/proyecto/'.$proyecto.'/'.$carpetas->nombre.'/'.$arr->nombre.'';

					if(File::exists($path)) {
						$size  = Storage::disk('local')->size('proyecto/'.$proyecto.'/'.$carpetas->nombre.'/'.$arr->nombre.'');
						$mb =  number_format($size / 1048576,2);

						if($size > 0){
							$color  = '';
						}else{
							$color  = 'red';
						}
						$file .='<li data-jstree=\'{"icon" : "fa fa-file-excel fa-lg text-primary"}\'><a  title="'.$size.'" class="'.$color.'" href="/file/carpetas/download/'.$arr->id.'">'.$arr->nombre.' - <b>'.$mb.' MB</b></a>';
					}else{
						$color = 'blue';
						$file .='<li data-jstree=\'{"icon" : "fa fa-file-excel fa-lg text-primary"}\'><a title="Archivo no existe" class="'.$color.'" >'.$arr->nombre.'</a></li>';
					}


				}
			}
			$file .="</li></ul>";
		}else{
			$file .= "";
		}
		return $file;
	}

	/**
	 * @param $carpeta
	 * @param $proyecto
	 *
	 * @return string
	 */
	public function archiveView($carpeta,$proyecto)
	{
		$archivos =   DB::table('archivos_carpetas')
		                ->where('id_proyecto','=',$proyecto)
		                ->where('id_carpetaprincipal','=',$carpeta)
		                ->orWhere('id_carpetasecundaria', '=', $carpeta)
		                ->get();

		$file ='<ul>';
		foreach ($archivos as $arr) {
			if(count($archivos)){
				$carpetas = DB::table('carpetas_principales')->where('id',$arr->id_carpetaprincipal)->first();
				$other =    DB::table('carpetas_secundarias')->where('id',$arr->id_carpetasecundaria)->first();

				$path = storage_path().'/app/proyecto/'.$proyecto.'/'.$carpetas->nombre.'/'.$other->nombre.'/'.$arr->nombre.'';

				if(File::exists($path)) {
					$size  = Storage::disk('local')->size('proyecto/'.$proyecto.'/'.$carpetas->nombre.'/'.$other->nombre.'/'.$arr->nombre.'');
					$mb =  number_format($size / 1048576,2);
					if($size > 0){
						$color  = '';
					}else{
						$color  = 'red';
					}
					$file .='<li data-jstree=\'{"icon" : "fa fa-file-excel fa-lg text-primary"}\'><a title="'.$size.'" class="'.$color.'"  href="/file/carpetas/download/'.$arr->id.'">'.$arr->nombre.' - <b>'.$mb.' MB</b></a></li>';
				}else{
					$color = 'blue';
					$file .='<li data-jstree=\'{"icon" : "fa fa-file-excel fa-lg text-primary"}\'><a title="Archivo no existe" class="'.$color.'" >'.$arr->nombre.'</a></li>';
				}

			}

		}

		$file .="</ul>";
		return $file;
	}

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
	    $proyectos = DB::table('proyectos')
	                   ->where('id_proyecto','=',$id)
	                   ->first();
	    $carpetas =  DB::table('carpetas_principales')
	                    ->get();
	    return view('proyectos.carpetas.create', ['proyectos' => $proyectos, 'carpetas' => $carpetas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $codigo         = $request->input('id_carpetaprincipal');
	    $nombre         = $request->input('nombre');
	    $id_proyecto    = $request->input('id_proyecto');
	    $nivel          = 1;
        $id_user        = $request->input('id_user');

		$data =   array('id_carpetaprincipal'   => $codigo,
                        'id_proyecto'           => $id_proyecto,
                        'nombre'                => $nombre,
						'nivel'                 => $nivel,
						'usuario_creacion'      => $id_user,
						'fecha_creacion'        => $this->dateformt);

		$carpetas = DB::table('carpetas_principales')->where('id', '=', $codigo)->first();

	    Storage::disk('local')->makeDirectory('proyecto/'.$id_proyecto.'/'.$carpetas->nombre.'/'.$nombre,0775,true);

		DB::table('carpetas_secundarias')->insert($data);

	    return redirect()->route('carpetasProyectos', $id_proyecto)
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
        $files = DB::table('archivos_carpetas')
	                ->where('id_carpetasecundaria','=', $id)
	                ->paginate(6);
        return view('proyectos.carpetas.detail',['files' => $files]);
    }

	/**
	 * @param $proyecto
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function listfolder($proyecto,$id)
    {
    	try{
		    $folders = DB::table('carpetas_secundarias')
		                 ->where('id_proyecto',$proyecto)
		                 ->where('id_carpetaprincipal','=', $id)
		                 ->paginate(6);

		    $files = DB::table('archivos_carpetas')
					    ->where('id_proyecto',$proyecto)
					    ->where('id_carpetaprincipal','=', $id)
			            ->paginate(6);

		    if (count($folders) > 0){
			    return view('proyectos.carpetas.folders',['folders' => $folders]);
		    }else if(count($files)) {
			    return view('proyectos.carpetas.detail',['files' => $files]);
		    }else {
			    return back()->with('success','No hay Sub Carpetas');

		    }



	    } catch (\Exception $e) {
		    //return back()->withErrors('success',$e->getMessage())->withInput();
		    return back()->with('success',$e->getMessage());

	    }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $folderSecundarios      =   DB::table('carpetas_secundarias')
			                        ->where('id', $id)
		                            ->first();

	    $folderPrimarios        =    DB::table('carpetas_principales')
		                             ->where('id', $folderSecundarios->id_carpetaprincipal)
		                             ->first();
		$proyectos              =    DB::table('proyectos')
	                                ->where('id_proyecto','=',$folderSecundarios->id_proyecto)
	                                ->first();
	    return view('proyectos.carpetas.edit', ['folderPrimarios' => $folderPrimarios, 'folderSecundarios' => $folderSecundarios,'proyectos' => $proyectos]);
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
        $nombre         = $request->input('nombre');
        $id_proyecto    = $request->input('id_proyecto');
        $user           = $request->input('id_user');

        $data   =   array('nombre' => $nombre,
                         'usuario_actualizo' => $user,
                         'fecha_actualizo' => $this->dateformt);

        $secundarias = DB::table('carpetas_secundarias')
	                    ->where('id','=',$id)
                        ->first();

        $princiaples = DB::table('carpetas_principales')
	                    ->where('id','=',$secundarias->id_carpetaprincipal)
	                    ->first();

	    DB::table('carpetas_secundarias')->where('id','=', $id)->update($data);

	    $oldname = '../intranet/storage/app/proyecto/'.$id_proyecto.'/'.$princiaples->nombre.'/'.$secundarias->nombre;
	    $newname = '../intranet/storage/app/proyecto/'.$id_proyecto.'/'.$princiaples->nombre.'/'.$nombre;

	    rename($oldname, $newname);




	    return redirect()->route('carpetasProyectos',$id_proyecto)
	                     ->with('success', 'Registro editado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $carpeta = DB::table('archivos_carpetas')
	                    ->where('id','=',$id)
	                    ->first();
    	DB::table('archivos_carpetas')->where('id', $id)->delete();
	    return redirect()->route('carpetasProyectos',$carpeta->id_proyecto)
	                     ->with('success', 'Registro eliminado correctamente');
    }

    public function destroyfolder($id)
    {
        try{        
            $carpeta = DB::table('carpetas_secundarias')
                        ->where('id','=',$id)
                        ->first();
                        
            $folder  = DB::table('carpetas_principales')
                        ->where('id',$carpeta->id_carpetaprincipal)
                        ->first();
            //dd($carpeta);
            DB::table('archivos_carpetas')->where('id_carpetasecundaria', $carpeta->id)->delete();
            DB::table('carpetas_secundarias')->where('id', $id)->delete();

            Storage::disk('local')->deleteDirectory('proyecto/'.$carpeta->id_proyecto.'/'.$folder->nombre.'/'.$carpeta->nombre);

            return redirect()->route('carpetasProyectos',$carpeta->id_proyecto)
                            ->with('success', 'Registro eliminado correctamente');

        } catch (\Exception $e) {
            //return back()->withErrors('success',$e->getMessage())->withInput();
            return back()->with('success',$e->getMessage());
        }
    }

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Throwable
	 */
	public function carpetasSecundarias(Request $request)
    {
	   if($request->ajax()){
		    $carpetasSecundarias = DB::table('carpetas_secundarias')
						                ->where('id_proyecto', $request->id_proyecto)
							            ->where('id_carpetaprincipal', $request->codigo)
						                ->pluck("nombre","id")->all();
		    $data = view('proyectos.carpetas.ajax' ,compact('carpetasSecundarias'))->render();
		    return response()->json(['options'=>$data]);
	    }
    }

	public function file($id)
	{
		$proyectos = DB::table('proyectos')
		               ->where('id_proyecto','=',$id)
		               ->first();
		$carpetas =  DB::table('carpetas_principales')
		               ->get();
		return view('proyectos.carpetas.file', ['proyectos' => $proyectos, 'carpetas' => $carpetas]);
	}
	public function filestorepreview(Request $request){
		try{
			$id_carpetaprincipal    = $request->input('id_carpetaprincipal');
			$id_carpetasecundaria   = $request->input('id_carpetasecundaria');
			$id_proyecto            = $request->input('id_proyecto');

			$carpetaprincipal = DB::table('carpetas_principales')
			                      ->where('id','=',$id_carpetaprincipal)
			                      ->first();
			$carpetasecundaria = DB::table('carpetas_secundarias')
			                       ->where('id','=',$id_carpetasecundaria)
			                       ->first();

			if($id_carpetasecundaria){
				foreach ($request->file('files') as $file){
					$name   =   $file->getClientOriginalName();
					$file->storeAs('proyecto/'.$id_proyecto.'/'.$carpetaprincipal->nombre.'/'.$carpetasecundaria->nombre, $name);
				}
				return 'Subio el Archivo, ahora guarde el registro';

			}else{
				foreach ($request->file('files') as $file){
					$name   =   $file->getClientOriginalName();
					$file->storeAs('proyecto/'.$id_proyecto.'/'.$carpetaprincipal->nombre.'/', $name);
				}
				return 'Subio el Archivo, ahora guarde el registro';

			}

		}catch (\Exception $e) {
			return back()->with('success',$e->getMessage());
		}

		return 'Subio el Archivo, ahora guarde el registro';
	}

	public function filestore(Request $request)
	{
		$id_carpetaprincipal    = $request->input('id_carpetaprincipal');
		$id_carpetasecundaria   = $request->input('id_carpetasecundaria');
		$id_proyecto            = $request->input('id_proyecto');
		$id_user                = $request->input('id_user');
		//$files                  = $request->files->getClientOriginalName();
		//dd($files);

		$carpetaprincipal = DB::table('carpetas_principales')
								->where('id','=',$id_carpetaprincipal)
								->first();
		$carpetasecundaria = DB::table('carpetas_secundarias')
		                       ->where('id','=',$id_carpetasecundaria)
		                       ->first();
		if($id_carpetasecundaria){
			foreach ($request->file('files') as $file){
				$name   =   $file->getClientOriginalName();
				$file->storeAs('proyecto/'.$id_proyecto.'/'.$carpetaprincipal->nombre.'/'.$carpetasecundaria->nombre, $name);
			}
		}else{
			foreach ($request->file('files') as $file){
				$name   =   $file->getClientOriginalName();
				$file->storeAs('proyecto/'.$id_proyecto.'/'.$carpetaprincipal->nombre.'/', $name);
			}
		}

		foreach ($request->file('files') as $file){
			$data[] = array('id_proyecto' => $id_proyecto,
			              'id_carpetaprincipal' => $id_carpetaprincipal,
			              'id_carpetasecundaria' => $id_carpetasecundaria,
			              'nombre' => $file->getClientOriginalName(),
			              'usuario_creacion' => $id_user,
			              'fecha_creacion' => $this->dateformt);
		}

		//dd($data);

		DB::table('archivos_carpetas')->insert($data);


		return redirect()->route('carpetasProyectos',$id_proyecto)
		                 ->with('success', 'Registro Exitoso');
	}

	public function downloadFile($id)
	{
		$dl = DB::table('archivos_carpetas')
				->where('id', $id)
				->first();
		$fileOne = DB::table('carpetas_principales')
					->where('id', '=',$dl->id_carpetaprincipal)
					->first();
		$fileTwo = DB::table('carpetas_secundarias')
					->where('id','=', $dl->id_carpetasecundaria)
					->first();
		$path = storage_path();

		if(is_null($dl->id_carpetasecundaria)){
			return response()->download("$path/app/proyecto/$dl->id_proyecto/$fileOne->nombre/$dl->nombre");
		}else{
			return response()->download("$path/app/proyecto/$dl->id_proyecto/$fileOne->nombre/$fileTwo->nombre/$dl->nombre");
		}
	}
}
