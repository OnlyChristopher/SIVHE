@extends('layouts.app')
@section('title', 'Control de Vehículos | Registro de Conductores | Crear Conductores |')
@section('clase-block-vehiculos','block')
@section('clase-active-conductores-registro','active')
@section('clase-active-conductores-registro','active')
@section('content')
    <style>
        progress { position:relative; width:100%; height: 25px; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; margin-top: 10px }
        #status { margin-top: 8px;}
    </style>
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item active"><a href="javascript: window.history.back();">Registro de Conductores</a></li>
        <li class="breadcrumb-item active">Crear Conductores</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Crear Conductores </h1>
    <!-- end page-header -->
    
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Crear Conductores</h4>
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
                    <form action="{{route('conductores.store')}}" method="post" enctype="multipart/form-data" data-parsley-validate="true" autocomplete="off" >
                        @csrf
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="id_areas">Tipo Documento</label>
                            <div class="col-md-6">
                                <select name="tipo_documento" id="tipo_documento" class="form-control selectpicker" data-live-search="true" data-style="btn-white" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Estado">
                                    <option value="">Seleccione</option>
                                    @foreach ($tipoDocs as $tipoDoc)
                                        <option value="{{$tipoDoc->idtipodoc}}" >{{$tipoDoc->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
    
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="duracion">Numero Docu.</label>
                            <div class="col-md-6">
                                <input type="text" name="numerodoc" id="numerodoc" placeholder="Nro Documento" class="form-control " data-parsley-required="true" data-parsley-required-message="Por favor Documento">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="cod_proyecto">Nombres</label>
                            <div class="col-md-6">
                                <input type="text" name="nombre1" id="nombre1" placeholder="Ingresa Nombres" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Nombres">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="nombre_proyecto"></label>
                            <div class="col-md-6">
                                <input type="text" name="nombre2" id="nombre2" placeholder="Ingresa Nombres" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Nombres" >
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="periodo_ejecucion">Apellido Paterno</label>
                            <div class="col-md-6">
                                <input type="text" name="apepaterno" id="apepaterno" placeholder="Ingresa Apellido Paterno" class="form-control " data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Apellido Paterno">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="periodo_ejecucion">Apellido Materno</label>
                            <div class="col-md-6">
                                <input type="text" name="apematerno" id="apematerno" placeholder="Ingresa Apellido Materno" class="form-control " data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Apellido Materno">
                            </div>
                        </div>
                        
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="duracion">Brevete</label>
                            <div class="col-md-6">
                                <input type="text" name="brevete" id="brevete" placeholder="Ingresa Brevete" class="form-control " data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Brevete">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="duracion">Categoria</label>
                            <div class="col-md-6">
                                <input type="text" name="categoria" id="categoria" placeholder="Ingresa Categoria" class="form-control " data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Categoria">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="duracion">Fecha Exped.</label>
                            <div class="col-md-6">
                                <input  type="text" name="fecha_exped" id="fecha_exped" placeholder="Ingresa Fecha Exped." class="form-control fecha" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Fecha">
                            </div>
                        </div>
    
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="duracion">Fecha Revalid.</label>
                            <div class="col-md-6">
                                <input  type="text" name="fecha_revalid" id="fecha_revalid" placeholder="Ingresa Fecha Revalid." class="form-control fecha" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Fecha">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="duracion">Estado</label>
                            <div class="col-md-6">
                                <input type="text" name="estado" id="estado" placeholder="Ingresa Estado" class="form-control " data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Estado">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="duracion">Restricción</label>
                            <div class="col-md-6">
                                <input type="text" name="restriccion" id="restriccion" placeholder="Ingresa Restricción" class="form-control " data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Restricción">
                            </div>
                        </div>
                        
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="duracion">Imagen</label>
                            <div class="col-md-6">
                                <input  type="file" name="imagen" id="imagen" accept="application/pdf" placeholder="Ingresa Fecha Revalid." class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Fecha">
                                <progress id="progressBar" value="0" max="100" ></progress>
                                <h3 id="status"></h3>
                                <p id="loaded_n_total"></p>
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
@push('scripts')
    <script>
        $('#tipo_documento').val(1);
        let numberDoc = $('#numerodoc');
        numberDoc.focus();
        numberDoc.attr('maxlength','8');
        numberDoc.on('keypress',function (e) {
            if(e.which == 13) {
                console.log($(this).val());
                e.preventDefault();
            }
        })
    </script>
@endpush