@extends('layouts.app')
@section('title', 'Editar Contratos | Contratos | Control Personal | SIVHE')
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
                <div class="col-md-7 col-8 align-self-center">
                    <h3 class="text-themecolor">Editar Contratos</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Administración</a></li>
                        <li class="breadcrumb-item"><a href="{{route('personal.index')}}">Control Personal</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Contratos</a></li>
                        <li class="breadcrumb-item active">Editar Contratos</li>
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
                            <h4 class="card-title">Editar Contratos</h4>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success fade show" data-auto-dismiss="5000">
                                    <span class="close" data-dismiss="alert">×</span>
                                    <strong>{{$message}}</strong>
                                </div>
                            @endif

                            <div class="col-md-8 offset-md-2">
                                <form action="{{route('contrato.update', $contratos->idcontrato)}}" method="post" enctype="multipart/form-data"
                                      class="needs-validation" autocomplete="off" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="cod_proyecto">Numero Contrato</label>
                                        <div class="col-md-6">
                                            <input type="text" name="numcontrato" id="numcontrato"
                                                   placeholder="Ingresa Numero Contrato" class="form-control" value="{{$contratos->numcontrato}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="idcargo">Cargo</label>
                                        <div class="col-md-6">
                                            <select name="idcargo" id="idcargo"
                                                    class="form-control selectpicker" data-live-search="true"
                                                    data-style="btn-white" required>
                                                <option value="">Seleccione</option>
                                                @foreach ($cargos as $cargo)
                                                    <option value="{{$cargo->idcargo}}" {{$contratos->idcargo == $cargo->idcargo ? 'selected' : ''}} >{{$cargo->nombre}} </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="periodo_ejecucion">Fotocheck</label>
                                        <div class="col-md-6">
                                            <select name="fotocheck" id="fotocheck"
                                                    class="form-control selectpicker" data-live-search="true"
                                                    data-style="btn-white" required>
                                                <option value="">Seleccione</option>
                                                <option value="Si" {{$contratos->fotocheck == 'Si' ? 'selected' : ''}}>Si</option>
                                                <option value="No" {{$contratos->fotocheck == 'No' ? 'selected' : ''}}>No</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="duracion">Fecha Inicio</label>
                                        <div class="col-md-6">
                                            <input type="text" name="finicio"  id="finicio" class=" fecha form-control" placeholder="yyyy-mm-dd" value="{{$contratos->finicio}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="duracion">Fecha Fin</label>
                                        <div class="col-md-6">
                                            <input type="text" name="ffin"  id="ffin" class=" fecha form-control" placeholder="yyyy-mm-dd" value="{{$contratos->ffin}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="periodo_ejecucion">Estado</label>
                                        <div class="col-md-6">
                                            <select name="estado" id="estado"
                                                    class="form-control selectpicker" data-live-search="true"
                                                    data-style="btn-white" required>
                                                <option value="">Seleccione</option>
                                                <option value="1" {{$contratos->estado == '1' ? 'selected' : ''}}>Activo</option>
                                                <option value="0" {{$contratos->estado == '0' ? 'selected' : ''}}>Cesado</option>

                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="idempleado" id="idempleado" value="{{ $contratos->idempleado }}">

                                    <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"></label>

                                        <div class="col-md-6">
                                            <a href="javascript:window.history.back()" class="btn btn-sm btn-success">Regresar</a>
                                            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </form>

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