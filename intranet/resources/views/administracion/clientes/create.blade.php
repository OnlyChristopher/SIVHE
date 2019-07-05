@extends('layouts.app')
@section('title', 'Administracion | Clientes |')
@section('clase-block-clientes','block')
@section('clase-active-administracion','active')
@section('clase-active-clientes','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item active"><a href="javascript:;">Clientes</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Clientes </h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Crear Clientes</h4>
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
                    <form action="{{route('clientes.store')}}" method="post" enctype="multipart/form-data" data-parsley-validate="true" autocomplete="off" >
                        @csrf
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="cod_proyecto">Nombre Cliente</label>
                            <div class="col-md-6">
                                <input type="text" name="nombre_cliente" id="nombre_cliente" placeholder="Nombre Cliente" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Nombre">
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="nombre_proyecto">RUC</label>
                            <div class="col-md-6">
                                <input type="text" maxlength="11" name="ruc_cliente" id="ruc_cliente" placeholder="RUC" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa RUC" >
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="duracion">Dirección</label>
                            <div class="col-md-6">
                                <input type="text" name="direccion_cliente" id="direccion_cliente" placeholder="Dirección" class="form-control " data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Dirección">
                            </div>
                        </div>


                        <input type="hidden" name="usuario_creacion" id="usuario_creacion" value="{{ Auth::user()->id }}">

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