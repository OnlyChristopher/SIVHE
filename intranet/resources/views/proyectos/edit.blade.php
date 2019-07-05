@extends('layouts.app')
@section('title', 'Proyectos |')
@section('clase-open-proyecto','expand')
@section('clase-active-proyecto','active')
@section('clase-active-proyectos','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item active"><a href="javascript:;">Proyectos</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Proyectos </h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Editar Proyectos</h4>
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
                    <form action="{{route('proyectos.update',$proyectos->id_proyecto)}}" method="post" enctype="multipart/form-data" data-parsley-validate="true" autocomplete="off" >
                        @csrf
                        @method('PUT')
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="cod_proyecto">Codigo</label>
                            <div class="col-md-6">
                                <input type="text" name="cod_proyecto" id="cod_proyecto" placeholder="Ingresa Codigo" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Codigo" value="{{$proyectos->cod_proyecto}}">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="nombre_proyecto">Proyecto</label>
                            <div class="col-md-6">
                                <input type="text" name="nombre_proyecto" id="nombre_proyecto" placeholder="Nombre de Proyecto" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Nombre de proyecto" value="{{$proyectos->nombre_proyecto}}" >
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="periodo_ejecucion">Periodo.</label>
                            <div class="col-md-6">
                                <input type="text" name="periodo_ejecucion" id="periodo_ejecucion" placeholder="Periodo" class="form-control fecha" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Periodo" value="{{$proyectos->periodo_ejecucion}}">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="duracion">Duracion</label>
                            <div class="col-md-6">
                                <input type="text" name="duracion" id="duracion" placeholder="Duracion" class="form-control fecha" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Duracion" value="{{$proyectos->duracion}}">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="id_areas">Estado</label>
                            <div class="col-md-6">
                                <select name="estado_proyecto" id="estado_proyecto" class="form-control selectpicker" data-live-search="true" data-style="btn-white" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Estado">
                                        <option value="0"  {{ $proyectos->estado_proyecto == 0 ? 'selected="selected"' : '' }}>Abierto</option>
                                        <option value="1"  {{ $proyectos->estado_proyecto == 1 ? 'selected="selected"' : '' }}>Cerrado</option>
                                </select>
                            </div>
                        </div>


                        
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" >Crear carpetas</label>
                            <div class="col-md-6">
                                <div class="checkbox checkbox-css">
                                    @if($proyectos->carpetas == 1)
                                        <input type="checkbox" id="cssCheckbox1"  name="carpetas" checked />
                                    @else
                                        <input type="checkbox" id="cssCheckbox1"  name="carpetas" />
                                    @endif
                                    <label for="cssCheckbox1"></label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_users" id="id_users" value="{{ Auth::user()->id }}">

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