@extends('layouts.app')
@section('title', 'Administracion | Cargos |')
@section('clase-block-cargos','block')
@section('clase-active-administracion','active')
@section('clase-active-cargos','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{route('cargos.index')}}">Mantenimiento de Cargos</a></li>
        <li class="breadcrumb-item">Crear Cargos</li>

    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Cargos </h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Crear Cargos</h4>
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
                    <form action="{{route('cargos.store')}}" method="post" enctype="multipart/form-data" data-parsley-validate="true" autocomplete="off" >
                        @csrf
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="cod_proyecto">Nombre de Cargo</label>
                            <div class="col-md-6">
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre de Cargo" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Ingresa Cargo">
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