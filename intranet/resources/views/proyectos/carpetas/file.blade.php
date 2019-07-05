@extends('layouts.app')
@section('title', 'Proyectos | Carpetas | Archivos |')
@section('clase-open-proyecto','expand')
@section('clase-active-proyecto','active')
@section('clase-active-proyectos','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item active"><a href="javascript:;">Archivos</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Archivos </h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Subir Archivos</h4>
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
                    <form action="{{route('fileStore')}}" method="post" enctype="multipart/form-data" data-parsley-validate="true" autocomplete="off" >
                        @csrf
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="id_areas">Carpetas Principales</label>
                            <div class="col-md-6">
                                <select  name="id_carpetaprincipal" id="id_carpetaprincipal" class="form-control selectpicker" data-live-search="true" data-style="btn-white" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Carpeta">
                                    <option value="">--- Seleccionar Carpeta ---</option>
                                    @foreach ($carpetas as $carpeta)
                                        <option value="{{$carpeta->id}}" >{{$carpeta->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="id_areas"></label>
                            <div class="col-md-6">
                                <select  name="id_carpetasecundaria" id="id_carpetasecundaria" class="form-control selectpicker" data-live-search="true" data-style="btn-white" >
                                    <option value="">--- Seleccionar Carpeta ---</option>
                                </select>
                            </div>
                        </div>
                        {{--<div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="id_areas"></label>
                            <div class="col-md-6">
                                <select  name="id_carpetasecundaria" id="id_carpetasecundaria" class="form-control selectpicker" data-live-search="true" data-style="btn-white" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Carpeta">
                                    <option>--- Seleccionar Carpeta ---</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="id_areas"></label>
                            <div class="col-md-6">
                                <select  name="id_carpetasecundaria" id="id_carpetasecundaria" class="form-control selectpicker" data-live-search="true" data-style="btn-white" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Carpeta">
                                    <option>--- Seleccionar Carpeta ---</option>
                                </select>
                            </div>
                        </div>--}}
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="nombre">Nuevo Archivo</label>
                            <div class="col-md-6">
                                <input type="file" accept="*" multiple  name="files[]" id="files" placeholder="Seleccione Archivo" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Archivo">
                            </div>
                        </div>

                        <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="id_proyecto" id="id_proyecto" value="{{ $proyectos->id_proyecto }}">

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