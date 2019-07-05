@extends('layouts.app')
@section('title', 'Proyectos | Carpetas |')
@section('clase-open-proyecto','expand')
@section('clase-active-proyecto','active')
@section('clase-active-proyectos','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{action('ProyectosController@index')}}">Listado de Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('proyectos.show',$proyectos->id_proyecto)}}">Detalle de Proyectos</a></li>
        <li class="breadcrumb-item active">Carpetas</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Carpetas</h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                @if( Auth::user()->profile == 1|| Auth::user()->profile == 2)
                    @if ($proyectos->carpetas == 0)
                        <a class="btn btn-danger btn-xs" href="{{route('proyectos.edit',$proyectos->id_proyecto)}}">Activar carpetas</a>
                    @else
                        <a class="btn btn-green btn-xs" href="{{route('fileCarpetasProyectosCreate',$proyectos->id_proyecto)}}">Subir Archivo</a>
                        @if(count($archivos) > 0 )
                            <a class="btn btn-danger btn-xs edit-file">Editar Archivos</a>
                            <input type="hidden" id="id_archivos">
                        @endif

                        <a class="btn btn-green btn-xs" href="{{route('carpetasProyectosCreate',$proyectos->id_proyecto)}}">Crear Sub Carpetas</a>

                        @if(count($carpetas) > 0)
                            <a class="btn btn-danger btn-xs edit-folder"> Editar Sub Carpeta</a>
                            <input type="hidden" id="id_carpetasecundaria">

                            <a class="btn btn-purple btn-xs detail-folder"> Ver Sub Carpetas</a>
                            <input type="hidden" id="id_carpetaprincipal">
                        @endif
                    @endif
                @endif
            </div>
            <h4 class="panel-title">{{$proyectos->nombre_proyecto}}</h4>
        </div>
        <div class="panel-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success fade show" data-auto-dismiss="2000">
                        <span class="close" data-dismiss="alert">×</span>
                        <strong>{{$message}}</strong>
                    </div>
                @endif
                    @if ($proyectos->carpetas == 1)
                        <div id="jstree-default">
                            {{--<ul>
                                <li data-jstree='{"opened":true}' >
                                    01.Ingenieria
                                    <ul>
                                        <li data-jstree='{"opened":true }' >
                                            Prueba 1
                                            <ul>
                                                <li data-jstree='{"opened":true}' >
                                                    Prueba 1.1
                                                    <ul>
                                                        <li data-jstree='{"opened":true, "selected":true }' >
                                                            Prueba 1.1.1
                                                            <ul>
                                                                <li data-jstree='{ "icon" : "fa fa-file fa-lg text-primary" }'><a href="#">3555A</a></li>
                                                                <li data-jstree='{ "icon" : "fa fa-file fa-lg text-primary" }'><a href="#">3555B</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>02.Licitacion</li>
                                <li>03.Ejecucion</li>
                                <li>04.Cierre</li>
                            </ul>--}}
                            {!! $tree !!}

                        </div>
                    @else
                        <div class="alert alert-info fade show" data-auto-dismiss="2000">
                            <span class="close" data-dismiss="alert">×</span>
                            <strong>No hay carpetas creadas</strong>
                        </div>
                    @endif


        </div>
    </div>
    <!-- end panel -->

@endsection
