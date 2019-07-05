@extends('layouts.app')
@section('title', 'Proyectos | Detalles |')
@section('clase-open-proyecto','expand')
@section('clase-active-proyecto','active')
@section('clase-active-proyectos','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb hidden-print pull-right">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item"><a href="javascript:window.history.back()">Listado de Proyectos</a></li>
        <li class="breadcrumb-item active">Detalle de Proyectos</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->

    <h1 class="page-header hidden-print">Detalle de Proyectos </h1>
    <!-- end page-header -->
    <!-- begin invoice -->
    <div class="invoice">
        <!-- begin invoice-company -->
        <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print">
             <a class="btn btn-sm btn-white m-b-10 p-l-5" href="/proyectos/carpetas/{{$proyectos->id_proyecto}}"><i class="fa fa-archive t-plus-1 text-danger fa-fw fa-lg"></i> Ver carpetas</a>
            </span>
            {{$proyectos->nombre_proyecto}}
        </div>
        <!-- end invoice-company -->
        <!-- begin invoice-content -->
        <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
                @if(count($actividades))
                <table class="table table-invoice">
                    <thead>
                        <tr>
                            <th>Nombre Actividad</th>
                            <th class="text-center" width="10%">Requisicion</th>
                            <th class="text-center" width="10%">OSC</th>
                            <th class="text-center" width="10%">Comprador</th>
                            <th class="text-center" width="10%">Costo Presupuestado</th>
                            <th class="text-center" width="10%">Estado</th>
                            <th class="text-center" width="10%">Adjudicado</th>
                            <th class="text-center" width="10%">Operador</th>
                            <th class="text-center" width="10%">Avance</th>
                            <th class="text-center" width="10%">Comentario</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($actividades as $actividad)
                            <tr>
                                <td>
                                    <span class="text-inverse">{{$actividad->nombre_actividades}}</span><br>
                                </td>
                                <td class="text-center">{{$actividad->requisicion}}</td>
                                <td class="text-center">{{$actividad->osc}}</td>
                                <td class="text-center">{{$actividad->comprador}}</td>
                                <td class="text-center">{{$actividad->costo_presupuestado}}</td>
                                <td class="text-center">{{$actividad->estatus}}</td>
                                <td class="text-center">{{$actividad->adjudicado}}</td>
                                <td class="text-center">{{$actividad->operador}}</td>
                                <td class="text-center">{{$actividad->avance}}</td>
                                <td class="text-center">{{$actividad->comentarios}}</td>
                            </tr>
                            @endforeach                        
                      
                    </tbody>
                </table>
                {!! $actividades->links('pagination::bootstrap-4') !!}
                @else
                    <div class="alert alert-info fade show" data-auto-dismiss="3000">
                        <span class="close" data-dismiss="alert">×</span>
                        <strong>No hay Actividades en este Proyecto</strong>
                    </div>
                @endif
            </div>
            <!-- end table-responsive -->
        </div>
        <!-- end invoice-content -->
    </div>
    <!-- end invoice -->
@endsection
