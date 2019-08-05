@extends('layouts.app')
@section('title', 'Proyectos | Carpetas | Archivos |')
@section('clase-open-proyecto','expand')
@section('clase-active-proyecto','active')
@section('clase-active-proyectos','active')
@section('content')
    <style>
        progress { position:relative; width:100%; height: 25px; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; margin-top: 10px }
        #status { margin-top: 8px;}
    </style>
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item active"><a href="javascript:;">Archivos</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Archivos </h1>
    <!-- end page-header -->
    
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Subir Archivos</h4>
        </div>
        <div class="panel-body">
            <div class="container">
                
                
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
                    <form action="{{route("fileStore")}}"  method="post"  data-parsley-validate="true" autocomplete="off" >
                        @csrf
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="id_areas">Carpetas Principales</label>
                            <div class="col-md-6">
                                <label for="id_carpetaprincipal"></label>
                                <select name="id_carpetaprincipal" id="id_carpetaprincipal" class="form-control selectpicker" data-live-search="true" data-style="btn-white" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Carpeta">
                                    <option value="">--- Seleccionar Carpeta ---</option>
                                    @foreach ($carpetas as $carpeta)
                                        <option value="{{$carpeta->id}}" >{{$carpeta->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="id_areas"></label>
                            <div class="col-md-6">
                                <select  name="id_carpetasecundaria" id="id_carpetasecundaria" class="form-control selectpicker" data-live-search="true" data-style="btn-white" >
                                    <option value="">--- Seleccionar Carpeta ---</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label" for="nombre">Nuevo Archivo</label>
                            <div class="col-md-6">
                                <input type="file" accept="*" multiple onchange="uploadFile()"  name="files[]" id="files" placeholder="Seleccione Archivo" class="form-control" data-parsley-required="true" data-parsley-required-message="Por favor Seleccione Archivo">
                                <progress id="progressBar" value="0" max="100" ></progress>
                                <input type="hidden" id="preview" name="preview">
                                <h3 id="status"></h3>
                                <p id="loaded_n_total"></p>
                            </div>
                        </div>
                        
                        <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="id_proyecto" id="id_proyecto" value="{{ $proyectos->id_proyecto }}">
                        
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
@endsection
@push('scripts')
    <script type="text/javascript">
        function _(el) {
            return document.getElementById(el);
        }
        function uploadFile() {
            let token = document.getElementsByName('_token')[0].value;
            let file = _("files");
            let filesLength = _("files").files.length;
            let user = _("id_user").value;
            let proyecto = _("id_proyecto").value;
            let carpetaprincipal = _("id_carpetaprincipal").value;
            let carpetasecundaria = _("id_carpetasecundaria").value;
            // alert(file.name+" | "+file.size+" | "+file.type);
            let formdata = new FormData();
            formdata.append("id_user", user);
            formdata.append("id_proyecto", proyecto);
            formdata.append("id_carpetaprincipal", carpetaprincipal);
            formdata.append("id_carpetasecundaria", carpetasecundaria);
            for (let i = 0; i < filesLength; i++) {
                formdata.append('files[]', file.files[i])
            }
            formdata.append("_token", token);
            let ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "{{ route('fileStorePreview') }}"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
            //use file_upload_parser.php from above url
            ajax.send(formdata);
        }

        function progressHandler(event) {
            _("loaded_n_total").innerHTML = "Subiendo " + event.loaded + " bytes de " + event.total;
            let percent = (event.loaded / event.total) * 100;
            _("progressBar").value = Math.round(percent);
            _("status").innerHTML = Math.round(percent) + "% cargando... espere por favor";
        }

        function completeHandler(event) {
            _("status").innerHTML = event.target.responseText;
            _("preview").value = _("files").files[0].name;
            _("progressBar").style.display = 'none';
            _("loaded_n_total").innerText = '';
            //_("progressBar").value = 0; //wil clear progress bar after successful upload
        }

        function errorHandler(event) {
            _("status").innerHTML = "Subida fallida";
        }

        function abortHandler(event) {
            _("status").innerHTML = "Subida Abortada";
        }
        $("select[name='id_carpetaprincipal']").change(function() {
            let codigo = $(this).val();
            let id_proyecto = $("input[name='id_proyecto']").val();
            let token = $("input[name='_token']").val();
            $.ajax({
                url: "{{ route( 'select-ajax' ) }}",
                method: 'POST',
                data: {
                    codigo: codigo,
                    id_proyecto: id_proyecto,
                    _token: token
                },
                success: function(data) {
                    $("select[name='id_carpetasecundaria']").html('');
                    $("select[name='id_carpetasecundaria']").html(data.options);
                    $("select[name='id_carpetasecundaria']").selectpicker('refresh');
                }
            });
        });
    </script>
@endpush
