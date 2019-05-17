@extends('layouts.app')
@section('title', 'Listado de Sub Carpetas | Carpetas | Proyectos | SIVHE')
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
                <div class="col-md-7 col-8 align-self-center">
                    <h3 class="text-themecolor">Listado de Sub Carpetas</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Proyectos</a></li>
                        <li class="breadcrumb-item"><a href="{{route('carpetasProyectos', $folders[0]->id_proyecto)}}">Carpetas</a></li>
                        <li class="breadcrumb-item active">Listado de Sub Carpetas</li>
                    </ol>
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
                            <h4 class="card-title">Listado de Sub Carpetas </h4>
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
                                            <th>Acciones</th>
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
                                                        <a href="javascript:;" data-click="swal-danger" data-id="{{$folder->id}}"
                                                           data-backdrop="btn-folders-delete"
                                                           class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip"
                                                           data-container="body" data-title="Eliminar"><i
                                                                    class="fa fa-trash-alt"></i></a>
                                                        <button id="btn-folders-delete" style="display:none" type="submit"
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
