@extends('layouts.app')
@section('title', 'Usuarios | Administración |')
@section('clase-active-administracion','active')
@section('clase-block-usuarios','block')
@section('clase-active-usuarios','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{route('usuarios.index')}}">Mantenimiento Usuarios</a></li>
        <li class="breadcrumb-item active">Editar Usuarios</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Usuarios </h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Editar Usuarios</h4>
        </div>
        <div class="panel-body">
            <div class="container">


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops! </strong> there where some problems with your input.<br>
                        <ul>
                            @foreach ($errors as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-8 offset-md-2">
                    <form action="{{route('usuarios.update', $users->id)}}" method="post" enctype="multipart/form-data" data-parsley-validate="true" autocomplete="off" >
                        @csrf
                        @method('PUT')

                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="codigo">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" name="firstname" id="firstname" placeholder="Ingresa Nombre" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Proyecto" value="{{$users->firstname}}">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="codigo">Apellidos</label>
                            <div class="col-md-6">
                                <input type="text" name="lastname" id="lastname" placeholder="Ingresa Apellidos" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Apellidos" value="{{$users->lastname}}">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="codigo">Correo</label>
                            <div class="col-md-6">
                                <input type="email" name="email" id="email" placeholder="Ingresa Correo" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Correo" value="{{$users->email}}">
                            </div>
                        </div>
                       {{-- <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="codigo">Contraseña</label>
                            <div class="col-md-6">
                                <input type="password" name="password" id="password" placeholder="Ingresa Contraseña" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Contraseña" value="{{$users->password}}">
                            </div>
                        </div>--}}
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="cliente">Cliente</label>
                            <div class="col-md-6">
                                <select  name="cliente" id="cliente" class="form-control selectpicker" data-live-search="true" data-style="btn-white" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Area">
                                    @foreach ($clientes as $cliente)
                                        <option value="{{$cliente->id_cliente}}" {{ $cliente->id_cliente == $users->idcliente ? 'selected="selected"' : '' }}  >{{$cliente->nombre_cliente}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="codigo">DNI</label>
                            <div class="col-md-6">
                                <input type="text" maxlength="8" name="dni" id="dni" placeholder="Ingresa DNI" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa DNI" value="{{$users->dni}}">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="cliente">Cargo</label>
                            <div class="col-md-6">
                                <select  name="position" id="position" class="form-control selectpicker" data-live-search="true" data-style="btn-white" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Area">
                                    @foreach ($positions as $position)
                                        <option value="{{$position->id}}" {{ $position->id == $users->position ? 'selected="selected"' : '' }}>{{$position->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="cliente">Perfil</label>
                            <div class="col-md-6">
                                <select  name="profile" id="profile" class="form-control selectpicker" data-live-search="true" data-style="btn-white" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Perfil">
                                    @foreach ($profiles as $profile)
                                        <option value="{{$profile->codprofile}}" {{ $profile->codprofile == $users->profile ? 'selected="selected"' : '' }}>{{$profile->nameprofile}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="created_user" id="created_user" value="{{ Auth::user()->id }}">



                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label"></label>
                            <div class="col-md-6">
                                <a href="javascript:window.history.back()" class="btn btn-sm btn-success">Regresar</a>
                                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection