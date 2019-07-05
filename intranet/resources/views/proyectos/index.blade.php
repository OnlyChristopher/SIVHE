@extends('layouts.app')
@section('title', 'Proyectos |')
@section('clase-open-proyecto','expand')
@section('clase-active-proyecto','active')
@section('clase-active-proyectos','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item active">Listado de Proyectos</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Listado de Proyectos</h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                @if( Auth::user()->profile == 1|| Auth::user()->profile == 2)
                    <a class="btn btn-green btn-xs" href="{{action('ProyectosController@create')}}">Crear nuevo
                        proyecto</a>
                @endif
            </div>
            <h4 class="panel-title">Proyectos</h4>
            
        </div>
        <div class="panel-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success fade show" data-auto-dismiss="2000">
                        <span class="close" data-dismiss="alert">×</span>
                        <strong>{{$message}}</strong>
                    </div>
                @endif
                    <div class="table-responsive">
                        @if(count($proyectos))
                            <table class="table table-hover m-b-10">
                                <thead>
                                <tr>
                                    <th><b>No.</b></th>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Periodo</th>
                                    <th>Duracion</th>
                                    <th>Estado</th>
                                    <th width="140x">Acciones</th>
                                </tr>
                                </thead>


                                @foreach ($proyectos as $proyecto)
                                    <tr>
                                        <td>{{$proyecto->id_proyecto}}</td>
                                        <td>{{$proyecto->cod_proyecto}}</td>
                                        <td>{{$proyecto->nombre_proyecto}}</td>
                                        <td>{{$proyecto->periodo_ejecucion}}</td>
                                        <td>{{$proyecto->duracion}}</td>
                                        <td>
                                            @if ($proyecto->estado_proyecto == 0)
                                                <span class="label label-green">Vigente</span>
                                            @else
                                                <span class="label label-danger">Caducado</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('proyectos.destroy', $proyecto->id_proyecto) }}"
                                                  method="post">
                                                <a class="btn btn-icon btn-circle btn-info" href="{{route('proyectos.show',$proyecto->id_proyecto)}}" data-toggle="tooltip" data-container="body" data-title="Detalle" data-original-title="" title=""><i class="fab fa-envira"></i></a>
                                                @if( Auth::user()->profile == 1|| Auth::user()->profile == 2)
                                                    <a class="btn btn-icon btn-circle btn-warning"
                                                       href="{{route('proyectos.edit',$proyecto->id_proyecto)}}"
                                                       data-toggle="tooltip" data-container="body" data-id-="{{$proyecto->id_proyecto}}" data-title="Editar"><i
                                                                class="fa fa-pencil-alt"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="javascript:;" data-click="swal-danger-proyectos" data-id="{{$proyecto->id_proyecto}}"
                                                       class="btn btn-icon btn-circle btn-danger" data-toggle="tooltip"
                                                       data-container="body" data-title="Eliminar"><i
                                                                class="fa fa-trash-alt"></i></a>
                                                    <button id="btn-proyectos-delete-{{$proyecto->id_proyecto}}"  style="display: none" type="submit"
                                                            class="btn btn-icon btn-circle btn-danger"><i
                                                                class="fa fa-trash-alt"></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <div class="alert alert-info fade show" data-auto-dismiss="2000">
                                <span class="close" data-dismiss="alert">×</span>
                                <strong>No hay registros</strong>
                            </div>
                        @endif
                    </div>
        </div>
    </div>
    <!-- end panel -->

@endsection