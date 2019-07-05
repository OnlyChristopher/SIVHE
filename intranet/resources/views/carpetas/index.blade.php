@extends('layouts.app')
@section('title', 'Proyectos | SIVHE')
@section('style', 'fix-header fix-sidebar card-no-border')

@section('content')
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor">Carpetas</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{route('proyectos.index')}}">Proyectos</a></li>
                        <li class="breadcrumb-item active">Carpetas</li>
                    </ol>
                </div>
                <div class="col-md-7 col-4 align-self-center">
                    <div class="text-right">                    @if( Auth::user()->profile == 1|| Auth::user()->profile == 2)
                            @if ($proyectos->carpetas == 0)
                                <button type="button"
                                        data-href="{{route('proyectos.edit',$proyectos->id_proyecto)}}"
                                        class="btn btn-sm waves-effect waves-light btn-info">
                                    Activar carpetas
                                </button>
                            @else
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Archivos
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="{{route('fileCarpetasProyectosCreate',$proyectos->id_proyecto)}}">Subir Archivo</a>
                                        @if(count($archivos) > 0 )
                                            <a class="dropdown-item edit-file" href="#">Editar Archivos</a>
                                            <input type="hidden" id="id_archivos">
                                        @endif
                                    </div>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Carpetas
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="{{route('carpetasProyectosCreate',$proyectos->id_proyecto)}}">Crear Sub Carpetas</a>
                                        @if(count($carpetas) > 0)
                                            <a class="dropdown-item edit-folder" href="#">Editar Sub Carpeta</a>
                                            <input type="hidden" id="id_carpetasecundaria">
                                            <a class="dropdown-item detail-folder" href="#">Ver Sub Carpetas</a>
                                            <input type="hidden" id="id_carpetaprincipal">
                                        @endif
                                    </div>
                                </div>

                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$proyectos->nombre_proyecto}}</h4>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success fade show" data-auto-dismiss="5000">
                                    <span class="close" data-dismiss="alert">×</span>
                                    <strong>{{$message}}</strong>
                                </div>
                            @endif
                            @if ($proyectos->carpetas == 1)
                                <div id="jstree-default">
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
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2019 SIVHE
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
@endsection
