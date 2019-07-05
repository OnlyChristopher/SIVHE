@extends('layouts.app')
@section('title', 'Proyectos | Carpetas |')
@section('clase-open-proyecto','expand')
@section('clase-active-proyecto','active')
@section('clase-active-proyectos','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item active"><a href="javascript:;">Carpetas</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Carpetas </h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Editar Carpetas</h4>
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
                    <form action="{{route('carpetas.update',$folderSecundarios->id)}}" method="post" enctype="multipart/form-data" data-parsley-validate="true" autocomplete="off" >
                        @csrf
                        @method('PUT')
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="id_areas">Carpetas Principales</label>
                            <div class="col-md-6">
                                <select  name="id_carpetaprincipal" id="id_carpetaprincipal" class="form-control selectpicker" data-live-search="true" data-style="btn-white" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Area">
                                        <option value="{{$folderPrimarios->id}}"  {{ $folderPrimarios->id == $folderSecundarios->id_carpetaprincipal ? 'selected="selected"' : '' }}>{{$folderPrimarios->nombre}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="nombre">Nueva Carpeta</label>
                            <div class="col-md-6">
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre de Carpeta" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Nombre de Carpeta" value="{{$folderSecundarios->nombre}}" >
                            </div>
                        </div>

                        <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="id_proyecto" id="id_proyecto" value="{{$proyectos->id_proyecto}}">

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