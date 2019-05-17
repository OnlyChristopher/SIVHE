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
                    <h3 class="text-themecolor">Listado de Proyectos</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Proyectos</a></li>
                        <li class="breadcrumb-item active">Listado de Proyectos</li>
                    </ol>
                </div>
                <div class="col-md-7 col-4 align-self-center">
                    <div class="text-right">
                        <button type="button" data-href="{{action('ProyectosController@create')}}" class="btn btn-sm waves-effect waves-light btn-info"> Crear
                            Nuevo Proyecto
                        </button>
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
                                <h4 class="card-title">Listado de Proyectos</h4>
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
                                            <th>Comentarios</th>
                                            <th>Documentos</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        @foreach ($proyectos as $proyecto)
                                            <tr>
                                                <td>{{$proyecto->id_proyecto}}</td>
                                                <td nowrap>{{$proyecto->cod_proyecto}}</td>
                                                <td nowrap>{{$proyecto->nombre_proyecto}}</td>
                                                <td nowrap>{{$proyecto->periodo_ejecucion}}</td>
                                                <td nowrap>{{$proyecto->duracion}}</td>
                                                <td>
                                                    @if ($proyecto->estado_proyecto == 0)
                                                        <span class="label label-success">Vigente</span>
                                                    @else
                                                        <span class="label label-danger">Caducado</span>
                                                    @endif
                                                </td>
                                                <td nowrap>{{$proyecto->comentario}}</td>
                                                <td nowrap>  @if($proyecto->documento)
                                                        <a href="{{ route('downloadfileProyectos', $proyecto->id_proyecto)}}"
                                                           title=""
                                                           class="btn btn-warning btn-icon btn-sm" data-toggle="tooltip" data-container="body" data-title="Descargas">
                                                            <i class="fa fa-file-excel"></i>
                                                        </a>
                                                    @endif</td>
                                                <td nowrap>
                                                    <form action="{{ route('proyectos.destroy', $proyecto->id_proyecto) }}"
                                                          method="post">
                                                        <div class="btn-group">

                                                        <a class="btn btn-icon btn-sm btn-info"
                                                           href="{{route('carpetasProyectos', $proyecto->id_proyecto)}}"
                                                           data-toggle="tooltip" data-container="body"
                                                           data-title="Detalle" data-original-title="" title=""><i
                                                                    class="fas fa-folder"></i></a>
                                                        @if( Auth::user()->profile == 1|| Auth::user()->profile == 2)
                                                            <a class="btn btn-icon btn-sm btn-warning"
                                                               href="{{route('proyectos.edit',$proyecto->id_proyecto)}}"
                                                               data-toggle="tooltip" data-container="body"
                                                               data-id-="{{$proyecto->id_proyecto}}"
                                                               data-title="Editar"><i
                                                                        class="fa fa-pencil-alt"></i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"  data-click="swal-danger" data-backdrop="btn-proyectos-delete"
                                                                  class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip"
                                                                  data-container="body" data-title="Eliminar"><i
                                                                           class="fa fa-trash-alt"></i></button>
                                                            <button id="btn-proyectos-delete" type="submit" style="display: none;"
                                                                    class="btn btn-icon btn-sm btn-danger"><i
                                                                        class="fa fa-trash-alt"></i>
                                                            </button>
                                                        @endif
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    {!! $proyectos->links('pagination::bootstrap-4') !!}
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
