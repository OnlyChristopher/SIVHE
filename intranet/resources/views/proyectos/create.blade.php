@extends('layouts.app')
@section('title', 'Crear Proyectos | Proyectos | SIVHE')
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
                    <h3 class="text-themecolor">Crear Proyectos</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Proyectos</a></li>
                        <li class="breadcrumb-item active">Crear Proyectos</li>
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
                            <h4 class="card-title">Crear Proyectos</h4>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success fade show" data-auto-dismiss="2000">
                                    <span class="close" data-dismiss="alert">×</span>
                                    <strong>{{$message}}</strong>
                                </div>
                            @endif
                            <div class="col-md-8 offset-md-2">
                                <form action="{{route('proyectos.store')}}" method="post" enctype="multipart/form-data"
                                      class="needs-validation" autocomplete="off" novalidate>
                                    @csrf
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="cod_proyecto">Codigo</label>
                                        <div class="col-md-6">
                                            <input type="text" name="cod_proyecto" id="cod_proyecto"
                                                   placeholder="Ingresa Codigo" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="nombre_proyecto">Proyecto</label>
                                        <div class="col-md-6">
                                            <input type="text" name="nombre_proyecto" id="nombre_proyecto"
                                                   placeholder="Nombre de Proyecto" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="periodo_ejecucion">Periodo</label>
                                        <div class="col-md-6">
                                            <input type="text" name="periodo_ejecucion" id="periodo_ejecucion"
                                                   placeholder="Periodo" class="form-control " required>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="duracion">Duracion</label>
                                        <div class="col-md-6">
                                            <input type="text" name="duracion" id="duracion" placeholder="Duracion"
                                                   class="form-control " required>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="id_areas">Estado</label>
                                        <div class="col-md-6">
                                            <select name="estado_proyecto" id="estado_proyecto"
                                                    class="form-control selectpicker" data-live-search="true"
                                                    data-style="btn-white" required>
                                                <option value="">Seleccione</option>
                                                <option value="0">Abierto</option>
                                                <option value="1">Cerrado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="version">Comentarios</label>
                                        <div class="col-md-6">
                                            <textarea name="comentarios" id="comentarios" placeholder="Comentarios" class="form-control" rows="3" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="nombre">Nuevo
                                            Archivo</label>
                                        <div class="col-md-6">
                                            <input type="file" accept="*"  name="documento" id="documento" class="custom-file-input" id="customFileLang" lang="es" required>
                                            <label class="custom-file-label form-control" for="customFileLang">Seleccionar Archivo</label>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="ffin_real">Crear
                                            carpetas</label>
                                        <div class="col-md-6">
                                            <div class="checkbox checkbox-css">
                                                <input type="checkbox" id="cssCheckbox1" name="carpetas"/>
                                                <label for="cssCheckbox1"></label>
                                            </div>
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