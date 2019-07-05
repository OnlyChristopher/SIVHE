@extends('layouts.app')
@section('title', 'Usuarios | Administracion |')
@section('clase-active-administracion','active')
@section('clase-block-usuarios','block')
@section('clase-active-usuarios','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item active"><a href="{{route('usuarios.index')}}">Mantenimiento Usuarios</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Mantenimiento Usuarios </h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a  class="btn btn-primary btn-xs" href="{{ route('usuarios.create') }}">Crear nuevo usuario</a>
            </div>
            <h4 class="panel-title">Mantenimiento Usuarios</h4>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success fade show" data-auto-dismiss="5000">
                        <span class="close" data-dismiss="alert">×</span>
                        <strong>{{$message}}</strong>
                    </div>
                @endif

                <table class="table table-striped m-b-0">
                    <thead>
                        <tr>
                            <th><b>No.</b></th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>DNI</th>
                            <th>Cargo</th>
                            <th>Accesos</th>
                            <th width = "180px">Action</th>
                        </tr>
                    </thead>


                    @foreach ($users as $usuario)
                        <tr>
                            <td><b>{{$usuario->id}}.</b></td>
                            <td>{{$usuario->firstname}}</td>
                            <td>{{$usuario->lastname}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->dni}}</td>
                            <td>{{$usuario->nombre}}</td>
                            <td>{{$usuario->nameprofile}}</td>
                            <td>
                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="post">
                                    <a class="btn btn-icon btn-sm btn-warning"
                                       href="{{route('usuarios.edit',$usuario->id)}}" data-toggle="tooltip" data-container="body" data-title="Editar"><i
                                                class="fa fa-pencil-alt"></i></a>
                                    @csrf
                                    @method('DELETE')

                                    <button
                                                class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip"
                                                data-container="body" data-title="Eliminar"><i
                                                         class="fa fa-trash-alt"></i></button>
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