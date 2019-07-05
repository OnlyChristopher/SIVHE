@extends('layouts.app')
@section('title', 'Proyectos |')
@section('clase-open-proyecto','expand')
@section('clase-active-proyecto','active')
@section('clase-active-proyectos','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item active"><a href="javascript:;">Proyectos</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Proyectos </h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Crear Proyectos</h4>
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
                    <form action="{{route('proyectos.store')}}" method="post" enctype="multipart/form-data" data-parsley-validate="true" autocomplete="off" >
                        @csrf
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="cod_proyecto">Codigo</label>
                            <div class="col-md-6">
                                <input type="text" name="cod_proyecto" id="cod_proyecto" placeholder="Ingresa Codigo" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Codigo">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="nombre_proyecto">Proyecto</label>
                            <div class="col-md-6">
                                <input type="text" name="nombre_proyecto" id="nombre_proyecto" placeholder="Nombre de Proyecto" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Nombre de proyecto" >
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="periodo_ejecucion">Periodo</label>
                            <div class="col-md-6">
                                <input type="text" name="periodo_ejecucion" id="periodo_ejecucion" placeholder="Periodo" class="form-control " data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Fecha Inicio">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="duracion">Duracion</label>
                            <div class="col-md-6">
                                <input type="text" name="duracion" id="duracion" placeholder="Duracion" class="form-control " data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Fecha Fin">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="id_areas">Estado</label>
                            <div class="col-md-6">
                                <select name="estado_proyecto" id="estado_proyecto" class="form-control selectpicker" data-live-search="true" data-style="btn-white" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Estado">
                                    <option value="0">Abierto</option>
                                    <option value="1">Cerrado</option>
                                </select>
                            </div>
                        </div>




                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="ffin_real">Crear carpetas</label>
                            <div class="col-md-6">
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckbox1" name="carpetas" />
                                    <label for="cssCheckbox1"></label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">

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