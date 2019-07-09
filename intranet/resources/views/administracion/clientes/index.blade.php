@extends('layouts.app')
@section('title', 'Administracion | Clientes |')
@section('clase-block-clientes','block')
@section('clase-active-administracion','active')
@section('clase-active-clientes','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item active"><a href="javascript:;">Mantenimiento Clientes</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Mantenimiento Clientes </h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a  class="btn btn-primary btn-xs" href="{{ route('clientes.create') }}">Crear nuevo cliente</a>
            </div>
            <h4 class="panel-title">Mantenimiento Clientes</h4>
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
                            <th>Cliente</th>
                            <th>RUC</th>
                            <th>Direccion</th>
                            <th width = "180px">Opciones</th>
                        </tr>
                        </thead>


                        @foreach ($clientes as $cliente)
                            <tr>
                                <td><b>{{$cliente->id_cliente}}.</b></td>
                                <td>{{$cliente->nombre_cliente}}</td>
                                <td>{{$cliente->ruc_cliente}}</td>
                                <td>{{$cliente->direccion_cliente}}</td>
                                <td>
                                    <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="post">
                                        <a class="btn btn-icon btn-sm btn-warning"
                                           href="{{route('clientes.edit',$cliente->id_cliente)}}"
                                           data-toggle="tooltip" data-container="body" data-id-="{{$cliente->id_cliente}}" data-title="Editar"><i
                                                    class="fa fa-pencil-alt"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button id="btn-proyectos-delete"  type="submit"
                                                class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip" data-container="body" data-id-="{{$cliente->id_cliente}}" data-title="Eliminar"><i
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