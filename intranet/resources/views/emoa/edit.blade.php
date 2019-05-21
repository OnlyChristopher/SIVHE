@extends('layouts.app')
@section('title', 'Editar EMOA | Administración | SIVHE')
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
                    <h3 class="text-themecolor">Editar EMOA</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Administración</a></li>
                        <li class="breadcrumb-item active">Editar EMOA</li>
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
                            <h4 class="card-title">Editar EMOA</h4>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success fade show" data-auto-dismiss="5000">
                                    <span class="close" data-dismiss="alert">×</span>
                                    <strong>{{$message}}</strong>
                                </div>
                            @endif
                            <div class="col-md-8 offset-md-2">
                                <form action="{{route('emoa.update' , $emoas->idemoa)}}" method="post" enctype="multipart/form-data"
                                      class="needs-validation" autocomplete="off" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="cod_proyecto">Nro. EMOA</label>
                                        <div class="col-md-6">
                                            <input type="text" name="numemoa" id="numemoa"
                                                   placeholder="Ingresa Nombre" class="form-control" value="{{$emoas->numemoa}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="nombre_proyecto">F. Emisión</label>
                                        <div class="col-md-6">
                                            <input type="text" name="femision" id="femision"
                                                   placeholder="AAAA-MM-DD" class="form-control fecha" value="{{$emoas->femision}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="nombre_proyecto">F. Vencimiento</label>
                                        <div class="col-md-6">
                                            <input type="text" name="fvencimiento" id="fvencimiento"
                                                   placeholder="AAAA-MM-DD" class="form-control fecha" value="{{$emoas->fvencimiento}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="version">Observaciones</label>
                                        <div class="col-md-6">
                                            <textarea name="observaciones" id="observaciones" placeholder="Ingresar Observaciones" class="form-control" rows="3" >{{$emoas->observaciones}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="periodo_ejecucion">Estado</label>
                                        <div class="col-md-6">
                                            <select name="estado" id="estado"
                                                    class="form-control selectpicker" data-live-search="true"
                                                    data-style="btn-white" readonly="">
                                                <option value="1" {{$emoas->estado == '1' ? 'selected' : ''}}>Activo</option>
                                                <option value="0" {{$emoas->estado == '0' ? 'selected' : ''}}>Cesado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="nombre">Documento</label>
                                        <div class="col-md-6">
                                            <input type="file" accept="application/pdf"  name="documento" id="documento" class="custom-file-input" id="customFileLang" lang="es">
                                            <label class="custom-file-label form-control" for="customFileLang">Seleccionar Archivo</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="documento_old" id="documento_old" value="{{$emoas->documento}}">
                                    <input type="hidden" name="idempleado" id="idempleado" value="{{ $emoas->idempleado }}">


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