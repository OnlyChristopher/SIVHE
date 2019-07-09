@extends('layouts.app')
@section('title', 'Consulta de Empleados | Administración | SIVHE')
@section('clase-active-empleados','active')
@section('clase-block-consulta','block')
@section('clase-active-consulta','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="#">Control de Empleados</a></li>
        <li class="breadcrumb-item active">Consulta de Empleados</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Consulta de Empleados </h1>
    <!-- end page-header -->
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a  class="btn btn-primary btn-xs" href="{{ route('personal.create') }}">Crear nuevo personal</a>
            </div>
            <h4 class="panel-title">Registro de Empleados</h4>
        </div>
        <div class="panel-body">
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
    <!-- end panel -->

@endsection
@push('scripts')
    <script src="{{asset('assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/plugins/DataTables/extensions/Buttons/js/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/DataTables/extensions/Buttons/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/DataTables/extensions/Buttons/js/vfs_fonts.min.js')}}"></script>
    <script src="{{asset('assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
@endpush
