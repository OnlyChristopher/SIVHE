@extends('layouts.app')
@section('title', 'Actividades | Proyectos |')
@section('clase-open-proyecto','expand')
@section('clase-active-proyecto','active')
@section('clase-active-actividades','active')

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item active"><a href="javascript:;">Listado de Actividades</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Listado de Actividades</h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a class="btn btn-green btn-xs" href="/actividades/create">Crear nueva
                    actividad</a>
            </div>
            <h4 class="panel-title">Actividades</h4>
        </div>
        <div class="panel-body">
            <div class="table-responsive">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success fade show" data-auto-dismiss="2000">
                        <span class="close" data-dismiss="alert">×</span>
                        <strong>{{$message}}</strong>
                    </div>
                @endif
                    @if(count($actividades))
                        <table class="table table-hover m-b-10">
                            <thead>
                            <tr>
                                <th><b>No.</b></th>
                                <th>Proyecto</th>
                                <th>Nombre</th>
                                <th>Codigo Proyecto</th>
                                <th>Requesicion</th>
                                <th>OSC</th>
                                <th>Bases</th>
                                <th>Comprador</th>
                                <th>Costo Presupuestado</th>
                                <th>Estado</th>
                                <th>Adjudicado</th>
                                <th>Tiempo</th>
                                <th>fr043</th>
                                <th>Movilizado</th>
                                <th>Operador</th>
                                <th>Visita</th>
                                <th>Fecha Estimada</th>
                                <th>Fase</th>
                                <th>Avance</th>
                                <th>Comentarios</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            @foreach ($actividades as $actividad)
                                <tr>
                                    <td><b>{{$actividad->id_actividades}}.</b></td>
                                    <td><b>{{$actividad->nombre_proyecto}}</b></td>
                                    <td>{{$actividad->nombre_actividades}}</td>
                                    <td>{{$actividad->cod_proyecto}}</td>
                                    <td>{{$actividad->requisicion}}</td>
                                    <td>{{$actividad->osc}}</td>
                                    <td>{{$actividad->bases}}</td>
                                    <td>{{$actividad->comprador}}</td>
                                    <td>{{$actividad->costo_presupuestado}}</td>
                                    <td>{{$actividad->estatus}}</td>
                                    <td>{{$actividad->adjudicado}}</td>
                                    <td>{{$actividad->tiempo_ejecucion}}</td>
                                    <td>{{$actividad->fr043}}</td>
                                    <td>{{$actividad->movilizado}}</td>
                                    <td>{{$actividad->operador}}</td>
                                    <td>{{$actividad->visita_terreno}}</td>
                                    <td>{{$actividad->fecha_estimada}}</td>
                                    <td>{{$actividad->fase}}</td>
                                    <td>{{$actividad->avance}}</td>
                                    <td>{{$actividad->comentarios}}</td>
                                    <td>
                                        <form action="{{ route('actividades.destroy', $actividad->id_actividades) }}"
                                              method="post">
                                            <a class="btn btn-icon btn-circle btn-warning"
                                               href="{{route('actividades.edit',$actividad->id_actividades)}}"
                                               data-toggle="tooltip" data-container="body" data-title="Editar"><i
                                                        class="fa fa-pencil-alt"></i></a>
                                            @csrf
                                            @method('DELETE')

                                            <a href="javascript:;" data-click="swal-danger-actividades" data-id="{{$actividad->id_actividades}}"
                                               class="btn btn-icon btn-circle btn-danger" data-toggle="tooltip"
                                               data-container="body" data-title="Eliminar"><i
                                                        class="fa fa-trash-alt"></i></a>
                                            <button id="btn-actividades-delete-{{$actividad->id_actividades}}" style="display: none" type="submit"
                                                    class="btn btn-sm btn-danger">Delete
                                            </button>
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