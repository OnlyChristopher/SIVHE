@extends('layouts.app')
@section('title', 'Listado de Archivos | Carpetas | Proyectos | SIVHE')
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
                    <h3 class="text-themecolor">Listado de Archivos</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Proyectos</a></li>
                        <li class="breadcrumb-item"><a href="{{route('carpetasProyectos', $files[0]->id_proyecto)}}">Carpetas</a></li>
                        <li class="breadcrumb-item active">Listado de Archivos</li>
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
                            <h4 class="card-title">Listado de Archivos </h4>
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
                                            <th>Acciones</th>
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
                                                                class="btn btn-icon btn-sm btn-danger"><i
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
