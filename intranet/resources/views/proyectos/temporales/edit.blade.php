@extends('layouts.app')
@section('title', 'Temporales | Proyectos |')
@section('clase-open-proyecto','expand')
@section('clase-active-proyecto','active')
@section('clase-active-temporales','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item active"><a href="{{route('temporales.index')}}">Temporales</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Temporales </h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Editar Temporales</h4>
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
                    <form action="{{route('temporales.update', $temporales->id_temporal)}}" method="post" enctype="multipart/form-data" data-parsley-validate="true" autocomplete="off" >
                        @csrf
                        @method('PUT')
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="cliente">Proyecto</label>
                            <div class="col-md-6">
                                <select  name="id_proyecto" id="id_proyecto" class="form-control selectpicker" data-live-search="true" data-style="btn-white" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Area">
                                    @foreach ($proyectos as $proyecto)
                                        <option value="{{$proyecto->id_proyecto}}" >{{$proyecto->nombre_proyecto}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="cliente">Tipo Documento</label>
                            <div class="col-md-6">
                                <select  name="tipo_doc" id="tipo_doc" class="form-control selectpicker" data-live-search="true" data-style="btn-white" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Area">
                                    @foreach ($documentos as $documento)
                                        <option value="{{$documento->id_doc}}" >{{$documento->tipo_doc}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="cliente">Usuario Revisión</label>
                            <div class="col-md-6">
                                <select  name="usuario_revision" id="usuario_revision" class="form-control selectpicker" data-live-search="true" data-style="btn-white" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Area">
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{$usuario->id}}" >{{$usuario->firstname}} {{$usuario->lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="version">Comentarios</label>
                            <div class="col-md-6">
                                <textarea name="comentarios" id="comentarios" placeholder="Comentarios" class="form-control" rows="3" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Comentario" >{{$temporales->comentarios}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="fecha_proc">Fecha</label>
                            <div class="col-md-6">
                                <input readonly type="text" name="fecha" id="fecha"  placeholder="Ingresa Fecha" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Fecha" value="{{$temporales->fecha_carga}}">
                            </div>
                        </div>
                        <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="archivo_plantilla">Archivo</label>
                            <div class="col-md-6">
                                <input type="file" accept="*"  name="documento" id="documento" placeholder="Seleccione Archivo" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Archivo">
                            </div>
                        </div>


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