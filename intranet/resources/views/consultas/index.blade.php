@extends('layouts.app')
@section('title', 'Consulta de Empleados | Administración | SIVHE')
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
                    <h3 class="text-themecolor">Consulta de Empleados</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Administración</a></li>
                        <li class="breadcrumb-item active">Consulta de Empleados</li>
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
                            <h4 class="card-title">Consulta de Empleados</h4>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success fade show" data-auto-dismiss="8000">
                                    <span class="close" data-dismiss="alert">×</span>
                                    <strong>{{$message}}</strong>
                                </div>
                            @endif
                            <div class="table-responsive">
                                @if(count($empleados))
                                    <table id="table" class=" nowrap table table-hover m-b-10">
                                        <thead>
                                        <tr>
                                            <th><b>No.</b></th>
                                            <th>Empleado</th>
                                            <th>Tipo Doc.</th>
                                            <th>Nro. Doc.</th>
                                            <th>Nro. Contrato</th>
                                            <th>Cargo</th>
                                            <th>Operador</th>
                                            <th>Estado Contrato</th>
                                            <th>Fotocheck</th>
                                            <th>Emisión Ex. Med.</th>
                                            <th>Venc. Ex. Med.</th>
                                            <th>Venc. SCRTR</th>
                                            <th>Venc. Inducción</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($empleados as $empleado)
                                            <tr>
                                                <td>{{$empleado->id}}</td>
                                                <td>{{$empleado->nombre1}} {{$empleado->nombre2}} {{$empleado->apepaterno}} {{$empleado->apematerno}}</td>
                                                <td>{{$empleado->descripcion}}</td>
                                                <td>{{$empleado->numerodoc}}</td>
                                                <td>{{$empleado->numcontrato}}</td>
                                                <td>{{$empleado->nombre}}</td>
                                                <td>
                                                    {{$empleado->nombres}} {{$empleado->apellidos}}
                                                </td>
                                                <td>
                                                    @if ($empleado->estado_contrato == 1)
                                                        <span class="label label-success">Vigente</span>
                                                    @else
                                                        <span class="label label-danger">Caducado</span>
                                                    @endif
                                                </td>
                                                <td>{{$empleado->fotocheck}}</td>
                                                <td>{{$empleado->emoa_emision}}</td>
                                                <td>{{$empleado->emoa_vencimiento}}</td>
                                                <td>{{$empleado->sctr_vencimiento}}</td>
                                                <td>{{$empleado->induccion_vencimiento}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
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
