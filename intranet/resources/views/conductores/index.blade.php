@extends('layouts.app')
@section('title', 'Control de Vehículos | Registro de Conductores |')
@section('clase-block-vehiculos','block')
@section('clase-active-conductores-registro','active')
@section('clase-active-conductores-registro','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item "><a href="javascript:;">Control de Vehículos</a></li>
        <li class="breadcrumb-item active">Registro de Conductores</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Registro de Conductores</h1>
    <!-- end page-header -->
    
    <!-- begin panel -->
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a  class="btn btn-primary btn-xs" href="{{ route('conductores.create') }}">Crear nuevo conductor</a>
            </div>
            <h4 class="panel-title">Registro de Conductores</h4>
        </div>
        <div class="panel-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success fade show" data-auto-dismiss="5000">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>{{$message}}</strong>
                </div>
            @endif
            <div class="table-responsive">
                @if(count($conductores))
                <table class="table nowrap table-striped m-b-0">
                    <thead>
                    <tr>
                        <th><b>No.</b></th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Tipo Doc.</th>
                        <th>Numero Doc.</th>
                        <th>Brevete</th>
                        <th>Categoria</th>
                        <th>Fecha Exp.</th>
                        <th>Fecha Reva.</th>
                        <th>Estado</th>
                        <th>Restricción</th>
                        <th>Imagen</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    
                    @foreach ($conductores as $conductor)
                        <tr>
                            <td><b>{{$conductor->idconductor}}.</b></td>
                            <td>{{$conductor->nombre1}} {{$conductor->nombre2}}</td>
                            <td>{{$conductor->apepaterno}} {{$conductor->apematerno}}</td>
                            <td>{{$conductor->idtipodoc}}</td>
                            <td>{{$conductor->numerodoc}}</td>
                            <td>{{$conductor->brevete}}</td>
                            <td>{{$conductor->categoria}}</td>
                            <td>{{$conductor->fecha_exped}}</td>
                            <td>{{$conductor->fecha_revalid}}</td>
                            <td>{{$conductor->estado}}</td>
                            <td>{{$conductor->restriccion}}</td>
                            <td>{{$conductor->imagen}}</td>
                            <td>
                                <form action="{{ route('conductores.destroy', $conductor->idconductor) }}" method="post">
                                    <a class="btn btn-icon btn-sm btn-warning"
                                       href="{{route('conductores.edit',$conductor->idconductor)}}"
                                       data-toggle="tooltip" data-container="body" data-id-="{{$conductor->idconductor}}" data-title="Editar"><i
                                                class="fa fa-pencil-alt"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <a href="javascript:;" data-click="swal-danger-conductores" data-id="{{$conductor->idconductor}}"
                                       class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip"
                                       data-container="body" data-title="Eliminar"><i
                                                class="fa fa-trash-alt"></i></a>
                                    <button id="btn-conductores-delete" style="display: none;"  type="submit"
                                            class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip" data-container="body" data-id-="{{$conductor->idconductor}}" data-title="Eliminar"><i
                                                class="fa fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                @else
                    <div class="alert alert-info fade show" data-auto-dismiss="5000">
                        <span class="close" data-dismiss="alert">×</span>
                        <strong>No hay registros</strong>
                    </div>
                @endif
            </div>
        
        </div>
    </div>
    <!-- end panel -->

@endsection