<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class UsuariosController extends Controller
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
	    $users = DB::table('users')
	               ->join('profiles','profiles.codprofile','=','users.profile')
		           ->join('positions','positions.id','=','users.position')
		           ->select('users.*','profiles.nameprofile','positions.nombre')
		           ->orderBy('users.id')
		           ->get();

	    return view('administracion.usuarios.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions  =   DB::table('positions')->get();
    	$profiles   =   DB::table('profiles')->get();
    	$clientes   =   DB::table('clientes')->get();

        return view('administracion.usuarios.create', ['positions' => $positions, 'profiles' => $profiles, 'clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $firstname      =   $request->input('firstname');
        $lastname       =   $request->input('lastname');
        $email          =   $request->input('email');
        $password       =   $request->input('password');
        $idcliente      =   $request->input('cliente');
        $dni            =   $request->input('dni');
        $position       =   $request->input('position');
        $profile        =   $request->input('profile');
        $created_user   =   $request->input('created_user');
        $created_at     =   $this->dateformt;

        $data   = array('firstname'     =>  $firstname,
	                    'lastname'      =>  $lastname,
                        'email'         =>  $email,
	                    'password'      =>  Hash::make($password),
                        'idcliente'     =>  $idcliente,
	                    'dni'           =>  $dni,
	                    'position'      =>  $position,
	                    'profile'       =>  $profile,
	                    'created_user'  =>  $created_user,
	                    'created_at'    =>  $created_at);

        DB::table('users')->insert($data);

	    return redirect()->route('usuarios.index')
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
	    $positions  =   DB::table('positions')->get();
	    $profiles   =   DB::table('profiles')->get();
	    $clientes   =   DB::table('clientes')->get();

	    $users      =   DB::table('users')->where('id',$id)->first();

	    return view('administracion.usuarios.edit', ['positions' => $positions, 'profiles' => $profiles, 'clientes' => $clientes, 'users' => $users]);
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
	    $firstname      =   $request->input('firstname');
	    $lastname       =   $request->input('lastname');
	    $email          =   $request->input('email');
//	    $password       =   $request->input('password');
	    $idcliente      =   $request->input('cliente');
	    $dni            =   $request->input('dni');
	    $position       =   $request->input('position');
	    $profile        =   $request->input('profile');
	    $created_user   =   $request->input('created_user');
	    $created_at     =   $this->dateformt;

	    $data   = array('firstname'     =>  $firstname,
	                    'lastname'      =>  $lastname,
	                    'email'         =>  $email,
//	                    'password'      =>  Hash::make($password),
	                    'idcliente'     =>  $idcliente,
	                    'dni'           =>  $dni,
	                    'position'      =>  $position,
	                    'profile'       =>  $profile,
	                    'updated_user'  =>  $created_user,
	                    'updated_at'    =>  $created_at);

	    DB::table('users')->where('id',$id)->update($data);

	    return redirect()->route('usuarios.index')
	                     ->with('success', 'Actualización Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
	    return redirect()->route('usuarios.index')
                         ->with('success', 'Registro eliminado correctamente');
    }
}
