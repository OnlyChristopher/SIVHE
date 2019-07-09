@extends('layouts.app')
@section('title', 'Crear Personal | Administración | SIVHE')
@section('clase-active-empleados','active')
@section('clase-block-registro','block')
@section('clase-active-registro','active')
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
                    <h3 class="text-themecolor">Crear Personal</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Administración</a></li>
                        <li class="breadcrumb-item active">Crear Personal</li>
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
                            <h4 class="card-title">Crear Personal</h4>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success fade show" data-auto-dismiss="2000">
                                    <span class="close" data-dismiss="alert">×</span>
                                    <strong>{{$message}}</strong>
                                </div>
                            @endif
                            <div class="col-md-8 offset-md-2">
                                <form action="{{route('personal.store')}}" method="post" enctype="multipart/form-data"
                                      class="needs-validation" autocomplete="off" novalidate>
                                    @csrf
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="cod_proyecto">Nombre</label>
                                        <div class="col-md-6">
                                            <input type="text" name="nombre1" id="nombre1"
                                                   placeholder="Ingresa Nombre" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="cod_proyecto"></label>
                                        <div class="col-md-6">
                                            <input type="text" name="nombre2" id="nombre2"
                                                   placeholder="Ingresa Nombre" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="nombre_proyecto">Apellido Paterno</label>
                                        <div class="col-md-6">
                                            <input type="text" name="apepaterno" id="apepaterno"
                                                   placeholder="Apellido Paterno" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="periodo_ejecucion">Apellido Materno</label>
                                        <div class="col-md-6">
                                            <input type="text" name="apematerno" id="apematerno"
                                                   placeholder="Apellido Materno" class="form-control " required>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="id_areas">Tipo Documento</label>
                                        <div class="col-md-6">
                                            <select  name="idtipodoc" id="idtipodoc" class="form-control" required>
                                                <option value="">Seleccione</option>
                                                @foreach ($tipodocumentos as $tipodocumento)
                                                    <option value="{{$tipodocumento->idtipodoc}}" >{{$tipodocumento->descripcion}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="duracion">Numero Documento</label>
                                        <div class="col-md-6">
                                            <input type="text" name="numerodoc" id="numerodoc" placeholder="Numero Documento"
                                                   class="form-control " required>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="duracion">Fecha de Nacimiento</label>
                                        <div class="col-md-6">
                                            <input type="text" name="fnacimiento"  id="fnacimiento" class=" fecha form-control" placeholder="yyyy-mm-dd" required>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="periodo_ejecucion">Estado Civil</label>
                                        <div class="col-md-6">
                                            <select name="estadocivil" id="estadocivil"
                                                    class="form-control selectpicker" data-live-search="true"
                                                    data-style="btn-white" required>
                                                <option value="">Seleccione</option>
                                                <option value="S">Soltero</option>
                                                <option value="C">Casado</option>
                                                <option value="V">Viudo</option>
                                                <option value="D">Divorciado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="periodo_ejecucion">Dirección</label>
                                        <div class="col-md-6">
                                            <input type="text" name="direccion" id="direccion"
                                                   placeholder="Ingrese Dirección" class="form-control " required>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="nombre">C.V</label>
                                        <div class="col-md-6">
                                            <input type="file" accept="application/pdf"  name="cv"  class="custom-file-input" id="customFileLang" lang="es">
                                            <label class="custom-file-label form-control" for="customFileLang">Seleccionar Archivo</label>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="id_areas">Operador</label>
                                        <div class="col-md-6">
                                            <select  name="idoperador" id="idoperador" class="form-control" required>
                                                <option value="">Seleccione</option>
                                                @foreach ($operadores as $operador)
                                                    <option value="{{$operador->idoperador}}" >{{$operador->nombres}} {{$operador->apellidos}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="id_areas">Codigo de Work Order</label>
                                        <div class="col-md-6">
                                            <select  name="codwo" id="codwo" class="form-control" required>
                                                <option value="">Seleccione</option>
                                                @foreach ($codwos as $codwo)
                                                    <option value="{{$codwo->codwo}}" >{{$codwo->codwo}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>



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