@extends('layouts.app')
@section('title', 'EMOA | Control Personal | SIVHE')
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
                <div class="col-md-7 col-4 align-self-center">
                    <h3 class="text-themecolor">EMOA</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Administración</a></li>
                        <li class="breadcrumb-item"><a href="{{route('personal.index')}}">Control de Personal</a></li>
                        <li class="breadcrumb-item active">EMOA</li>
                    </ol>
                </div>
                <div class="col-md-5 col-8 align-self-center">
                    <div class="text-right">
                        <button type="button" data-href="{{route('emoaPersonalCrear', $empleados->idempleado)}}" class="btn btn-sm waves-effect waves-light btn-info"> Crear
                            Nuevo EMOA
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
                            <h4 class="card-title">EMOA de {{$empleados->nombre1}} {{$empleados->nombre2}} {{$empleados->apepaterno}} {{$empleados->apematerno}}</h4>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success fade show" data-auto-dismiss="5000">
                                    <span class="close" data-dismiss="alert">×</span>
                                    <strong>{{$message}}</strong>
                                </div>
                            @endif
                            <div class="table-responsive">
                                @if(count($emoas))
                                    <table class="table table-hover m-b-10">
                                        <thead>
                                        <tr>
                                            <th><b>No.</b></th>
                                            <th>Nro. EMOA</th>
                                            <th>Fecha Emisión</th>
                                            <th>Fecha Vencimiento</th>
                                            <th>Observaciones</th>
                                            <th>Estado</th>
                                            <th>Documento</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        @foreach ($emoas as $emoa)
                                            <tr>
                                                <td>{{$emoa->idemoa}}</td>
                                                <td nowrap>{{$emoa->numemoa}}</td>
                                                <td nowrap>{{$emoa->femision}}</td>
                                                <td nowrap>{{$emoa->fvencimiento}}</td>
                                                <td nowrap>{{$emoa->observaciones}}</td>
                                                <td nowrap>
                                                    @if ($emoa->estado == 1)
                                                        <span class="label label-success">Activo</span>
                                                    @else
                                                        <span class="label label-danger">Cesado</span>
                                                    @endif
                                                </td>
                                                <td nowrap>
                                                    @if($emoa->documento)
                                                        <a href="{{ route('downloadfileEmoa', $emoa->idemoa)}}"
                                                           title=""
                                                           class="btn btn-danger btn-icon btn-sm" data-toggle="tooltip" data-container="body" data-title="Descargas">
                                                            <i class="fa fa-file-pdf"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td nowrap>
                                                    <form action="{{ route('emoa.destroy', $emoa->idemoa) }}"
                                                          method="post">
                                                        @if( Auth::user()->profile == 1|| Auth::user()->profile == 2)
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-sm btn-icon btn-warning"
                                                                        data-href="{{route('emoa.edit',$emoa->idemoa)}}"
                                                                        data-toggle="tooltip" data-container="body"
                                                                        data-id-="{{$emoa->idemoa}}"
                                                                        data-title="Editar"><i
                                                                            class="fa fa-pencil-alt"></i></button>
                                                                @csrf
                                                                @method('DELETE')

                                                                <button id="btn-emoa-delete-{{$emoa->idemoa}}" type="submit" style="display: none;"
                                                                        class="btn btn-sm btn-icon btn-danger"><i
                                                                            class="fa fa-trash-alt"></i>
                                                                </button>
                                                                <button  type="button" data-click="swal-danger" data-backdrop="btn-emoa-delete-{{$emoa->idemoa}}"
                                                                         class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip"
                                                                         data-container="body" data-title="Eliminar"><i
                                                                            class="fa fa-trash-alt"></i></button>

                                                            </div>
                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                    {!! $emoas->links('pagination::bootstrap-4') !!}
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
