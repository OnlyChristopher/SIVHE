@extends('layouts.app')
@section('title', 'Administracion | Cargos |')
@section('clase-block-cargos','block')
@section('clase-active-administracion','active')
@section('clase-active-cargos','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item active"><a href="javascript:;">Mantenimiento Cargos</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Mantenimiento Cargos</h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a  class="btn btn-primary btn-xs" href="{{ route('cargos.create') }}">Crear nuevo cargo</a>
            </div>
            <h4 class="panel-title">Mantenimiento Cargos</h4>
        </div>
        <div class="panel-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success fade show" data-auto-dismiss="5000">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>{{$message}}</strong>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover m-b-0">
                    <thead>
                    <tr>
                        <th><b>No.</b></th>
                        <th>Nombre</th>
                        <th>Fecha Creacion</th>
                        <th width = "180px">Opciones</th>
                    </tr>
                    </thead>


                    @foreach ($cargos as $cargo)
                        <tr>
                            <td><b>{{$cargo->id}}.</b></td>
                            <td>{{$cargo->nombre}}</td>
                            <td>{{$cargo->fecha_creacion}}</td>
                            <td>
                                <form action="{{ route('cargos.destroy', $cargo->id) }}" method="post">
                                    <a class="btn btn-icon btn-sm btn-warning"
                                       href="{{route('cargos.edit',$cargo->id)}}"
                                       data-toggle="tooltip" data-container="body" data-id-="{{$cargo->id}}" data-title="Editar"><i
                                                class="fa fa-pencil-alt"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <a href="javascript:;" data-click="swal-danger-cargos" data-id="{{$cargo->id}}"
                                       class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip"
                                       data-container="body" data-title="Eliminar"><i
                                                class="fa fa-trash-alt"></i></a>
                                    <button id="btn-cargos-delete" style="display: none;"  type="submit"m
                                            class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip" data-container="body" data-id-="{{$cargo->id}}" data-title="Eliminar"><i
                                                class="fa fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>

        </div>
    </div>
    <!-- end panel -->

@endsection