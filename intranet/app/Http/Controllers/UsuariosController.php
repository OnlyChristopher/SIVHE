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
		           ->join('clientes','clientes.id_cliente','=','users.idcliente')
	               ->select('users.*','profiles.nameprofile','clientes.nombre_cliente')
	               ->orderBy('users.id')
	               ->paginate(10);

	    return view('usuarios.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes  = DB::table('clientes')->get();
        $profiles  = DB::table('profiles')->get();

        return view('usuarios.create', ['clientes' => $clientes, 'profiles' => $profiles]);
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
