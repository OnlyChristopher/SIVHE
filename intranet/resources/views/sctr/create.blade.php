@extends('layouts.app')
@section('title', 'Crear SCTR | Administración | SIVHE')
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
                    <h3 class="text-themecolor">Crear SCTR</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Administración</a></li>
                        <li class="breadcrumb-item active">Crear SCTR</li>
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
                            <h4 class="card-title">Crear SCTR</h4>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success fade show" data-auto-dismiss="2000">
                                    <span class="close" data-dismiss="alert">×</span>
                                    <strong>{{$message}}</strong>
                                </div>
                            @endif
                            <div class="col-md-8 offset-md-2">
                                <form action="{{route('sctr.store')}}" method="post" enctype="multipart/form-data"
                                      class="needs-validation" autocomplete="off" novalidate>
                                    @csrf
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="cod_proyecto">Nro. SCTR</label>
                                        <div class="col-md-6">
                                            <input type="text" name="numsctr" id="numsctr"
                                                   placeholder="Ingresa SCTR" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="nombre_proyecto">F. Emisión</label>
                                        <div class="col-md-6">
                                            <input type="text" name="femision" id="femision"
                                                   placeholder="AAAA-MM-DD" class="form-control fecha" required>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="nombre_proyecto">F. Vencimiento</label>
                                        <div class="col-md-6">
                                            <input type="text" name="fvencimiento" id="fvencimiento"
                                                   placeholder="AAAA-MM-DD" class="form-control fecha" required>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="periodo_ejecucion">Estado</label>
                                        <div class="col-md-6">
                                            <select name="estado" id="estado"
                                                    class="form-control selectpicker" data-live-search="true"
                                                    data-style="btn-white" readonly>
                                                <option value="1" selected>Activo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="idempleado" id="idempleado" value="{{ $empleados->idempleado }}">


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