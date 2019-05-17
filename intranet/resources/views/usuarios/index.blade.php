@extends('layouts.app')
@section('title', 'Usuarios | SIVHE')
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
                    <h3 class="text-themecolor">Mantenimiento de Usuarios</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Administración</a></li>
                        <li class="breadcrumb-item active">Mantenimiento de Usuarios</li>
                    </ol>
                </div>
                <div class="col-md-5 col-8 align-self-center">
                    <div class="text-right">
                        <button type="button" data-href="{{route('usuarios.create')}}" class="btn btn-sm waves-effect waves-light btn-info"> Crear
                            Nuevo Usuario
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
                            <h4 class="card-title">Listado de Usuarios</h4>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success fade show" data-auto-dismiss="2000">
                                    <span class="close" data-dismiss="alert">×</span>
                                    <strong>{{$message}}</strong>
                                </div>
                            @endif
                            <div class="table-responsive">
                                @if(count($users))
                                    <table class="table table-hover m-b-10">
                                        <thead>
                                        <tr>
                                            <th><b>No.</b></th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Correo</th>
                                            <th>Cliente</th>
                                            <th>Perfil</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td nowrap>{{$user->firstname}}</td>
                                                <td nowrap>{{$user->lastname}}</td>
                                                <td nowrap>{{$user->email}}</td>
                                                <td nowrap>{{$user->idcliente}}</td>
                                                <td nowrap>{{$user->nameprofile}}</td>
                                                <td nowrap>
                                                    <form action="{{ route('usuarios.destroy', $user->id) }}"
                                                          method="post">
                                                        @if( Auth::user()->profile == 1|| Auth::user()->profile == 2)
                                                            <div class="btn-group">

                                                                <button type="button" class="btn btn-sm btn-icon btn-warning"
                                                                        data-href="{{route('usuarios.edit',$user->id)}}"
                                                                        data-toggle="tooltip" data-container="body"
                                                                        data-id-="{{$user->id}}"
                                                                        data-title="Editar"><i
                                                                            class="fa fa-pencil-alt"></i></button>
                                                                @csrf
                                                                @method('DELETE')


                                                                <button id="btn-usuario-delete" type="submit" style="display: none"
                                                                        class="btn btn-sm btn-icon btn-danger"><i
                                                                            class="fa fa-trash-alt"></i>
                                                                </button>
                                                                <a href="javascript:;" data-click="swal-danger"
                                                                   class="btn btn-icon btn-sm btn-danger" data-backdrop="btn-usuario-delete" data-toggle="tooltip"
                                                                   data-container="body" data-title="Eliminar"><i
                                                                            class="fa fa-trash-alt"></i></a>

                                                            </div>
                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                    {!! $users->links('pagination::bootstrap-4') !!}
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
