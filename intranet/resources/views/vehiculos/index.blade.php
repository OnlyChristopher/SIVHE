@extends('layouts.app')
@section('title', 'Control de Vehículos | Registro de Conductores |')
@section('clase-block-vehiculos','block')
@section('clase-active-vehiculos-registro','active')
@section('clase-active-vehiculos-registro','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item "><a href="javascript:;">Control de Vehículos</a></li>
        <li class="breadcrumb-item active">Registro de Vehículos</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Registro de Vehículos</h1>
    <!-- end page-header -->
    
    <!-- begin panel -->
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a  class="btn btn-primary btn-xs" href="{{ route('vehiculos.create') }}">Crear nuevo vehiculo</a>
            </div>
            <h4 class="panel-title">Registro de Vehículos</h4>
        </div>
        <div class="panel-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success fade show" data-auto-dismiss="5000">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>{{$message}}</strong>
                </div>
            @endif
            <div class="table-responsive">
                @if(count($vehiculos))
                    <table class="table nowrap table-hover m-b-0">
                        <thead>
                        <tr>
                            <th><b>No.</b></th>
                            <th>Placa</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Color</th>
                            <th>Año</th>
                            <th>Serie Motor</th>
                            <th>Km. Inicial</th>
                            <th>Estado</th>
                            <th>Tarjeta Prop.</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        
                        @foreach ($vehiculos as $vehiculo)
                            <tr>
                                <td><b>{{$vehiculo->id_vehiculo}}.</b></td>
                                <td>{{$vehiculo->placa}}</td>
                                <td>{{$vehiculo->marca}}</td>
                                <td>{{$vehiculo->modelo}}</td>
                                <td>{{$vehiculo->color}}</td>
                                <td>{{$vehiculo->año}}</td>
                                <td>{{$vehiculo->seriemotor}}</td>
                                <td>{{$vehiculo->kminicial}}</td>
                                <td>{{$vehiculo->estado}}</td>
                                <td>{{$vehiculo->tarjetaprop}}</td>
                                <td>
                                    <form action="{{ route('vehiculos.destroy', $vehiculo->id_vehiculo) }}" method="post">
                                        <a class="btn btn-icon btn-sm btn-warning"
                                           href="{{route('vehiculos.edit',$vehiculo->id_vehiculo)}}"
                                           data-toggle="tooltip" data-container="body" data-id-="{{$vehiculo->id_vehiculo}}" data-title="Editar"><i
                                                    class="fa fa-pencil-alt"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:;" data-click="swal-danger-vehiculos" data-id="{{$vehiculo->id_vehiculo}}"
                                           class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip"
                                           data-container="body" data-title="Eliminar"><i
                                                    class="fa fa-trash-alt"></i></a>
                                        <button id="btn-vehiculos-delete" style="display: none;"  type="submit"
                                                class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip" data-container="body" data-id-="{{$vehiculo->id_vehiculo}}" data-title="Eliminar"><i
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