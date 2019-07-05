<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--<![endif]-->

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <title>Registar Usuario | Monitoreos</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="@OnlyChristopher" name="author" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/default/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/default/style-responsive.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/default/theme/default.css') }}" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN BASE JS ================== -->
        <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top">
<!-- begin #page-loader -->
<div id="page-loader" class="fade show"><span class="spinner"></span></div>
<!-- end #page-loader -->
<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login bg-black animated fadeInDown">
        <!-- begin brand -->
        <div class="login-header">
            <div class="brand">
                <span class="logo"></span> <b><a href="https://intranet.monitoreos.org" style="text-decoration: none; color:#2d353c" >Monitoreos</a></b>
                <small>Registrar</small>
            </div>
            <div class="icon">
                <i class="fa fa-lock"></i>
            </div>
        </div>
        <!-- end brand -->
        <!-- begin login-content -->
        <div class="login-content">
            <form method="POST" action="{{ route('register') }}" autocomplete="off" class="margin-bottom-0">
                @csrf
                <div class="form-group m-b-20">
                <input id="firstname" type="text" class="form-control form-control-lg inverse-mode {{ $errors->has('firstname') ? ' is-invalid' : '' }}" placeholder="Nombre" name="firstname" value="{{ old('firstname') }}" required autofocus>
                    @if ($errors->has('firstname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('firstname') }}</strong>
                        </span>
                    @endif
                   
                </div>
                <div class="form-group m-b-20">
                <input id="lastname" type="text" class="form-control form-control-lg inverse-mode {{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="Apellidos" name="lastname" value="{{ old('lastname') }}" required autofocus>
                    @if ($errors->has('lastname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                    @endif
                   
                </div>
                <div class="form-group m-b-20">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg inverse-mode" placeholder="Correo" name="email" value="{{ old('email') }}" required>
                    
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group m-b-20">
                    <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg inverse-mode" placeholder="Contraseña" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group m-b-20">
                    <input id="password-confirm" type="password" class="form-control form-control-lg inverse-mode" name="password_confirmation"  placeholder="Confirmar Contraseña" required>                  
                </div>
                <div class="form-group m-b-20">
                <select name="idcliente" id="idcliente" class="form-control form-control-lg inverse-mode {{ $errors->has('idcliente') ? ' is-invalid' : '' }}" require>
                    <option value="" default selected>Seleccione Cliente</option>
                    <option value="1">INSPECTORATE SERVICE PERU S.A.C.</option>
                    <option value="2">GREENDFIELD S.A.C.</option>
                    <option value="3">DPI S.A.C.</option>
                    <option value="4">COMPAÑÍA MINERA ANTAMINA S.A.C.</option>
                    </select>

                    @if ($errors->has('idcliente'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('idcliente') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group m-b-20">
                <input id="dni" type="text" maxlength="8" class="form-control form-control-lg inverse-mode {{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni" value="{{ old('dni') }}" placeholder="DNI" requiredS>

                    @if ($errors->has('dni'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('dni') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group m-b-20">
                <select name="job" id="job" class="form-control form-control-lg inverse-mode {{ $errors->has('job') ? ' is-invalid' : '' }}" require>
                    <option value="" default selected>Seleccione Cargo</option>
                    <option value="1">SUPERVISOR SENIOR MINERODUCTO</option>
                    <option value="2">SUPERVISOR MECANICO</option>
                    <option value="3">INGENIERO DE SEGURIDAD</option>
                    <option value="4">CONTROL DE PROYECTO</option>
                    <option value="5">SUPERVISOR GEOTECNICO</option>
                    <option value="6">INGNIERO CIVIL JUNIOR</option>
                    <option value="7">INGENIERO SUPERVISOR CIVIL</option>
                    <option value="8">SUPERVISOR DE TECNOLOGIA, INFORMACION Y REDES</option>
                    <option value="9">GERENTE DE PROYECTO</option>
                    <option value="10">JEFE CONTROL DOCUMENTARIO</option>
                    <option value="11">PROYECTISTA</option>
                    <option value="12">SUPERVISOR CIVIL</option>
                    <option value="13">SUPERINTENDENTE MINERODUCTO</option>
                    </select>

                        @if ($errors->has('job'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('job') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group m-b-20">
                <select name="access" id="access" class="form-control form-control-lg inverse-mode {{ $errors->has('access') ? ' is-invalid' : '' }}" require>
                    <option value="" default selected>Seleccione Tipo Acceso</option>
                    <option value="1">Usuario 1</option>
                    <option value="2">Usuario 2</option>
                    </select>

                        @if ($errors->has('access'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('access') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="login-buttons">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Registrar</button>
                </div>
            </form>
        </div>
        <!-- end login-content -->
    </div>
    <!-- end login -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="../assets/plugins/jquery/jquery-3.3.1.min.js"></script>
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--[if lt IE 9]>
<script src="../assets/crossbrowserjs/html5shiv.js"></script>
<script src="../assets/crossbrowserjs/respond.min.js"></script>
<script src="../assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/plugins/js-cookie/js.cookie.js"></script>
<script src="../assets/js/theme/default.min.js"></script>
<script src="../assets/js/apps.min.js"></script>
<!-- ================== END BASE JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
    });
</script>

</body>

</html>

