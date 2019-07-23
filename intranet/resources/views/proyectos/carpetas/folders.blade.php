@extends('layouts.app')
@section('title', 'Proyectos | Carpetas | Sub Carpetas')
@section('clase-open-proyecto','expand')
@section('clase-active-proyecto','active')
@section('clase-active-proyectos','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{action('ProyectosController@index')}}">Listado de Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('proyectos.show',$folders[0]->id_proyecto)}}">Detalle de Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('carpetasProyectos',$folders[0]->id_proyecto)}}">Carpetas</a></li>
        <li class="breadcrumb-item active">Listado de Sub Carpetas</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Listado de Sub Carpetas</h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Sub Carpetas</h4>
        </div>
        <div class="panel-body">
            <div class="container">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success fade show" data-auto-dismiss="2000">
                        <span class="close" data-dismiss="alert">×</span>
                        <strong>{{$message}}</strong>
                    </div>
                @endif
                <div class="table-responsive">
                    @if(count($folders))
                        <table class="table table-hover m-b-10">
                            <tr>
                                <th><b>No.</b></th>
                                <th>Nombre</th>
                                <th>Usuario Creación</th>
                                <th>Fecha Creación</th>
                                <th width="140x">Acciones</th>
                            </tr>

                            @foreach ($folders as $folder)
                                <tr>
                                    <td>{{$folder->id}}</td>
                                    <td>{{$folder->nombre}}</td>
                                    <td>{{$folder->usuario_creacion}}</td>
                                    <td>{{$folder->fecha_creacion}}</td>
                                    <td>
                                        <form action="{{ route('carpetasProyectosDelete', $folder->id) }}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:;" data-click="swal-danger-folders" data-id="{{$folder->id}}"
                                                class="btn btn-icon btn-circle btn-danger" data-toggle="tooltip"
                                                data-container="body" data-title="Eliminar"><i
                                                         class="fa fa-trash-alt"></i></a>
                                        <button id="btn-folders-delete-{{$folder->id}}" style="display:none" type="submit"
                                                    class="btn btn-icon btn-circle btn-danger"><i
                                                        class="fa fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $folders->links('pagination::bootstrap-4') !!}
                    @else
                        <div class="alert alert-info fade show" data-auto-dismiss="2000">
                            <span class="close" data-dismiss="alert">×</span>
                            <strong>No hay registros</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- end panel -->

@endsection