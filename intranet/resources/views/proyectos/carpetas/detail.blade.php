@extends('layouts.app')
@section('title', 'Proyectos | Archivos |')
@section('clase-open-proyecto','expand')
@section('clase-active-proyecto','active')
@section('clase-active-proyectos','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{action('ProyectosController@index')}}">Listado de Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('proyectos.show',$files[0]->id_proyecto)}}">Detalle de Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('carpetasProyectos',$files[0]->id_proyecto)}}">Carpetas</a></li>
        <li class="breadcrumb-item active">Listado de Archivos</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Listado de Archivos</h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Archivos</h4>
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
                    @if(count($files))
                        <table class="table table-hover m-b-10">
                            <tr>
                                <th><b>No.</b></th>
                                <th>Nombre</th>
                                <th>Usuario Creación</th>
                                <th>Fecha Creación</th>
                                <th width="140x">Acciones</th>
                            </tr>

                            @foreach ($files as $file)
                                <tr>
                                    <td>{{$file->id}}</td>
                                    <td>{{$file->nombre}}</td>
                                    <td>{{$file->usuario_creacion}}</td>
                                    <td>{{$file->fecha_creacion}}</td>
                                    <td>
                                        <form action="{{ route('carpetas.destroy', $file->id) }}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button id="btn-files-delete"  type="submit"
                                                    class="btn btn-icon btn-circle btn-danger"><i
                                                        class="fa fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $files->links('pagination::bootstrap-4') !!}
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