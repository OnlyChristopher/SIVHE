@extends('layouts.app')
@section('title', 'Editar Inducción | Administración | SIVHE')
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
                    <h3 class="text-themecolor">Editar Inducción</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Administración</a></li>
                        <li class="breadcrumb-item active">Editar Inducción</li>
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
                            <h4 class="card-title">Editar Inducción</h4>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success fade show" data-auto-dismiss="5000">
                                    <span class="close" data-dismiss="alert">×</span>
                                    <strong>{{$message}}</strong>
                                </div>
                            @endif
                            <div class="col-md-8 offset-md-2">
                                <form action="{{route('inducciones.update',$induccion->idinduccion)}}" method="post" enctype="multipart/form-data"
                                      class="needs-validation" autocomplete="off" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="cod_proyecto">Nro. Induccion</label>
                                        <div class="col-md-6">
                                            <input type="text" name="numinduccion" id="numinduccion"
                                                   placeholder="Ingresa Induccion" class="form-control" value="{{$induccion->numinduccion}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="nombre_proyecto">F. Emisión</label>
                                        <div class="col-md-6">
                                            <input type="text" name="femision" id="femision"
                                                   placeholder="AAAA-MM-DD" class="form-control fecha" value="{{$induccion->femision}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="nombre_proyecto">F. Vencimiento</label>
                                        <div class="col-md-6">
                                            <input type="text" name="fvencimiento" id="fvencimiento"
                                                   placeholder="AAAA-MM-DD" class="form-control fecha" value="{{$induccion->fvencimiento}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="periodo_ejecucion">Estado</label>
                                        <div class="col-md-6">
                                            <select name="estado" id="estado"
                                                    class="form-control selectpicker" data-live-search="true"
                                                    data-style="btn-white" readonly="">
                                                <option value="1" {{$induccion->estado == '1' ? 'selected' : ''}}>Activo</option>
                                                <option value="0" {{$induccion->estado == '0' ? 'selected' : ''}}>Cesado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="nombre">Documento</label>
                                        <div class="col-md-6">
                                            <input type="file" accept="application/pdf"  name="documento" id="documento" class="custom-file-input" id="customFileLang" lang="es" >
                                            <label class="custom-file-label form-control" for="customFileLang">Seleccionar Archivo</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="documento_old" id="documento_old" value="{{$induccion->documento}}">
                                    <input type="hidden" name="idempleado" id="idempleado" value="{{ $induccion->idempleado }}">

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