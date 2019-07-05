@extends('layouts.app')
@section('title', 'Empleados | Administracion |')
@section('clase-active-empleados','active')
@section('clase-block-registro','block')
@section('clase-active-registro','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="#">Control de Empleados</a></li>
        <li class="breadcrumb-item active">Registro de Empleados</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Registro de Empleados </h1>
    <!-- end page-header -->
    
    <!-- begin panel -->
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
                            <th>C.V</th>
                            <th>Operador</th>
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
                                    @if($empleado->cv)
                                        <a href="{{ route('downloadCv', $empleado->idempleado)}}"
                                           title=""
                                           class="btn btn-warning btn-icon btn-sm" data-toggle="tooltip" data-container="body" data-title="Descargas">
                                            <i class="fa fa-file-pdf"></i>
                                        </a>
                                    @endif
                                </td>
                                <td nowrap>{{$empleado->nombres}} {{$empleado->apellidos}}</td>
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
                                                <button type="button" class="btn btn-sm btn-icon btn-success dropdown-toggle no-caret" data-toggle="dropdown" >
                                                    <i class="fa fa-cog fa-fw"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a class="dropdown-item" href="{{route('contratoPersonal', $empleado->idempleado)}}">Contrato</a></li>
                                                    <li><a class="dropdown-item" href="{{route('sctrPersonal', $empleado->idempleado)}}">SCTR</a></li>
                                                    <li><a class="dropdown-item" href="{{route('induccionesPersonal', $empleado->idempleado)}}">Inducción</a></li>
                                                    <li><a class="dropdown-item" href="{{route('emoaPersonal', $empleado->idempleado)}}">EMOA</a></li>
                                                </ul>
                                              
                                            </div>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
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