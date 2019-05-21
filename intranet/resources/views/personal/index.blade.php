@extends('layouts.app')
@section('title', 'Control Personal | SIVHE')
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
                    <h3 class="text-themecolor">Control de Personal</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Administración</a></li>
                        <li class="breadcrumb-item active">Control de Personal</li>
                    </ol>
                </div>
                <div class="col-md-7 col-4 align-self-center">
                    <div class="text-right">
                        <button type="button" data-href="{{action('PersonalController@create')}}" class="btn btn-sm waves-effect waves-light btn-info"> Crear
                            Nuevo Personal
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
                            <h4 class="card-title">Control de Personal</h4>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success fade show" data-auto-dismiss="2000">
                                    <span class="close" data-dismiss="alert">×</span>
                                    <strong>{{$message}}</strong>
                                </div>
                            @endif
                            <div class="table">
                                @if(count($empleados))
                                    <table class="table table-hover m-b-10">
                                        <thead>
                                        <tr>
                                            <th><b>No.</b></th>
                                            <th>Nombres</th>
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
                                            <th>Tipo Doc.</th>
                                            <th>Nro Doc.</th>
                                            <th>Fecha Nacimiento</th>
                                            <th>Estado Civil</th>
                                            <th>Dirección</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        @foreach ($empleados as $empleado)
                                            <tr>
                                                <td>{{$empleado->idempleado}}</td>
                                                <td nowrap>{{$empleado->nombre1}} {{$empleado->nombre2}}</td>
                                                <td nowrap>{{$empleado->apepaterno}}</td>
                                                <td nowrap>{{$empleado->apematerno}}</td>
                                                <td nowrap>{{$empleado->descripcion}}</td>
                                                <td nowrap>{{$empleado->numerodoc}}</td>
                                                <td nowrap>{{$empleado->fnacimiento}}</td>
                                                <td nowrap>{{$empleado->estadocivil}}</td>
                                                <td nowrap>{{$empleado->direccion}}</td>
                                                <td nowrap>
                                                    <form action="{{ route('personal.destroy', $empleado->idempleado) }}"
                                                          method="post">
                                                        @if( Auth::user()->profile == 1|| Auth::user()->profile == 2)
                                                            <div class="btn-group">

                                                            <button type="button" class="btn btn-sm btn-icon btn-warning"
                                                               data-href="{{route('personal.edit',$empleado->idempleado)}}"
                                                                   data-toggle="tooltip" data-container="body"
                                                               data-id-="{{$empleado->idempleado}}"
                                                               data-title="Editar"><i
                                                                        class="fa fa-pencil-alt"></i></button>
                                                            @csrf
                                                            @method('DELETE')
                                                                <button type="button"  data-click="swal-danger" data-backdrop="btn-personal-delete-{{$empleado->idempleado}}"
                                                                        class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip"
                                                                        data-container="body" data-title="Eliminar"><i
                                                                            class="fa fa-trash-alt"></i></button>

                                                                <button id="btn-personal-delete-{{$empleado->idempleado}}" type="submit" style="display: none;"
                                                                        class="btn btn-sm btn-icon btn-danger"><i
                                                                            class="fa fa-trash-alt"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-sm btn-icon btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fa fa-cogs"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="{{route('contratoPersonal', $empleado->idempleado)}}">Contrato</a>
                                                                    <a class="dropdown-item" href="{{route('sctrPersonal', $empleado->idempleado)}}">SCTR</a>
                                                                    <a class="dropdown-item" href="{{route('induccionesPersonal', $empleado->idempleado)}}">Inducción</a>
                                                                    <a class="dropdown-item" href="{{route('emoaPersonal', $empleado->idempleado)}}">EMOA</a>
                                                                    <a class="dropdown-item" href="{{route('operadoresPersonal', $empleado->idempleado)}}">Operador</a>
                                                                </div>

                                                            </div>
                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                    {!! $empleados->links('pagination::bootstrap-4') !!}
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
