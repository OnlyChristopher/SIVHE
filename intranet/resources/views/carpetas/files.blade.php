@extends('layouts.app')
@section('title', 'Subir Archivos | Proyectos | SIVHE')
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
                    <h3 class="text-themecolor">Subir Archivos</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{route('proyectos.index')}}">Proyectos</a></li>
                        <li class="breadcrumb-item active">Subir Archivos</li>
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
                            <h4 class="card-title">Subir Archivo</h4>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops! </strong> there where some problems with your input.<br>
                                    <ul>
                                        @foreach ($errors as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="col-md-8 offset-md-2">
                                <form action="{{route('fileStore')}}" method="post" enctype="multipart/form-data"
                                      class="needs-validation" autocomplete="off" novalidate>
                                    @csrf
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="id_areas">Carpetas
                                            Principales</label>
                                        <div class="col-md-6">
                                            <select name="id_carpetaprincipal" id="id_carpetaprincipal"
                                                    class="form-control selectpicker" data-live-search="true"
                                                    data-style="btn-white" required>
                                                <option value="">--- Seleccionar Carpeta ---</option>
                                                @foreach ($carpetas as $carpeta)
                                                    <option value="{{$carpeta->id}}">{{$carpeta->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="id_areas">Carpetas
                                            Secundarias</label>
                                        <div class="col-md-6">
                                            <select name="id_carpetasecundaria"
                                                    class="form-control selectpicker" data-live-search="true"
                                                    data-style="btn-white" >
                                                <option value="">--- Seleccionar Carpeta ---</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="nombre">Nuevo
                                            Archivo</label>
                                        <div class="col-md-6">
                                            <input type="file" accept="*" multiple name="files[]" id="files" class="custom-file-input" id="customFileLang" lang="es" required>
                                            <label class="custom-file-label form-control" for="customFileLang">Seleccionar Archivo</label>
                                        </div>
                                    </div>

                                    <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="id_proyecto" id="id_proyecto"
                                           value="{{ $proyectos->id_proyecto }}">

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