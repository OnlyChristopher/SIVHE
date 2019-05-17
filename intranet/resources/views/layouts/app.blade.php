<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
{{--
    <script src="{{ asset('js/app.js') }}" defer></script>
--}}

    <!-- Fonts -->

    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')   }}" rel="stylesheet">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/jstree/dist/themes/default/style.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/ui-tree.demo.js') }}"></script>

    <!-- You can change the theme colors from here -->
    <link href="{{asset('css/colors/default-dark.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Styles -->
    <!-- Date picker plugins css -->
    <link href="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
{{--
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
--}}
</head>
<body class="@yield('style')">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                        {{--                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />--}}
                        <!-- Light Logo icon -->
                            <img src="{{asset('assets/images/logo_original.png')}}" width="80%" alt="homepage" class="dark-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        {{-- <span>
                             <!-- dark Logo text -->
                             <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                             <!-- Light Logo text -->
                             <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                         </span>--}}
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                                 href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                                                 href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark"
                                                                           href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i
                                            class="ti-close"></i></a> </form>
                        </li>

                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="#"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new
                                                        admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that
                                                        you have event</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this
                                                        template as you want</span> <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span>
                                                    <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all
                                                notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="2"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{asset('assets/images/users/1.jpg')}}" alt="user"
                                                                            class="img-circle"> <span class="profile-status online pull-right"></span>
                                                </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span>
                                                    <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{asset('assets/images/users/2.jpg')}}" alt="user"
                                                                            class="img-circle"> <span class="profile-status busy pull-right"></span>
                                                </div>
                                                <div class="mail-contnet">
                                                    <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See
                                                        you at</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{asset('assets/images/users/3.jpg')}}" alt="user"
                                                                            class="img-circle"> <span class="profile-status away pull-right"></span>
                                                </div>
                                                <div class="mail-contnet">
                                                    <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span>
                                                    <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{asset('assets/images/users/4.jpg')}}" alt="user"
                                                                            class="img-circle"> <span class="profile-status offline pull-right"></span>
                                                </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span>
                                                    <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all
                                                e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false"><img src="{{asset('assets/images/users/1.jpg')}}" alt="user"
                                                                               class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{{asset('assets/images/users/1.jpg')}}" alt="user"></div>
                                            <div class="u-text">
                                                <h4>Steave Jobs</h4>
                                                <p class="text-muted">varun@gmail.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View
                                                    Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile" style="background: url({{asset('assets/images/background/user-info.jpg')}}) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="{{asset('assets/images/users/profile.png')}}" alt="user" /> </div>
                    <!-- User profile text-->
                    <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown"
                                                  role="button" aria-haspopup="true" aria-expanded="true">{{ Auth::user()->firstname }} </a>
                        <div class="dropdown-menu animated flipInY"> <a href="#" class="dropdown-item"><i class="ti-user"></i>
                                My Profile</a> <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                            <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i>
                                Account Setting</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="{{ route('logout') }}"
                                                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PRINCIPALES</li>
                        <li> <a class="waves-effect waves-dark" href="/" aria-expanded="false"><i class="mdi mdi-home"></i><span
                                        class="hide-menu">Inicio </span></a>

                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-city"></i><span
                                        class="hide-menu">Gerencia de Proyectos</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#"><i class="mdi mdi-menu-right"></i>Obras por Impuestos</a></li>
                                <li><a href="#"><i class="mdi mdi-menu-right"></i>Obras para Antamina</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-tune"></i><span
                                        class="hide-menu">Administracion</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{action('PersonalController@index')}}"><i class="mdi mdi-menu-right"></i>Control de Personal</a></li>
                                <li><a href="#"><i class="mdi mdi-menu-right"></i>Control de Camionetas</a></li>
                                <li><a href="{{action('CargosController@index')}}"><i class="mdi mdi-menu-right"></i>Control de Cargos</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-worker"></i><span
                                        class="hide-menu">Proyectos</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{action('ProyectosController@index')}}"><i class="mdi mdi-menu-right"></i>Listado de Proyectos</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-tune"></i><span
                                        class="hide-menu">Mantenimiento</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{action('UsuariosController@index')}}"><i class="mdi mdi-menu-right"></i>Mantenimiento de Usuarios</a></li>
                                <li><a href="#"><i class="mdi mdi-menu-right"></i>Mantenimiento de Clientes</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="#" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item--><a href="#" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item--><a href="#" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                               class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/plugins/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jstree/dist/jstree.min.js')}}"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js') }}" charset="UTF-8"></script>
    <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
    <script>

        //For validation with custom styles
        (function() {
            TreeView.init();

            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                let forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                let validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        $('.alert[data-auto-dismiss]').each(function (index, element) {
            var $element = $(element),
                timeout  = $element.data('auto-dismiss') || 8000;

            setTimeout(function () {
                $element.alert('close');
            }, timeout);
        });

        $("select[name='id_carpetaprincipal']").change(function(){
            let codigo = $(this).val();
            let id_proyecto = $("input[name='id_proyecto']").val();
            let token = $("input[name='_token']").val();
            $.ajax({
                url: "<?php echo route('select-ajax') ?>",
                method: 'POST',
                data: {codigo:codigo,id_proyecto:id_proyecto, _token:token},
                success: function(data) {
                    $("select[name='id_carpetasecundaria']").html('');
                    $("select[name='id_carpetasecundaria']").html(data.options);
                    $("select[name='id_carpetasecundaria']").selectpicker('refresh');

                }
            });
        });

        $('[type="button"]').on('click', function () {
            if($(this).data('href')){
                window.location.href = $(this).data('href') ;
            }
        });

        $('.table-responsive').on('shown.bs.dropdown', function (e) {
            let $table = $(this),
                $menu = $(e.target).find('.dropdown-menu'),
                tableOffsetHeight = $table.offset().top + $table.height(),
                menuOffsetHeight = $menu.offset().top + $menu.outerHeight(true);

            if (menuOffsetHeight > tableOffsetHeight)
                $table.css("padding-bottom", menuOffsetHeight - tableOffsetHeight);
        });

        $('.table-responsive').on('hide.bs.dropdown', function () {
            $(this).css("padding-bottom", 0);
        });

        $(".fecha").datepicker({
            language: 'es',
            todayHighlight: !0,
            autoclose: !0,
            format: 'yyyy-mm-dd',
        });

        $('[data-click="swal-danger"]').click(function (e) {
            let btn =  $(this).data('backdrop');
            swal({
                title: "Desea eliminar registro?",
                text: "Recuerde que si elimina el registro, no se puede recuperar",
                icon: "error",
                buttons: {
                    cancel: {text: "Cancelar", value: null, visible: !0, className: "btn btn-default", closeModal: !0},
                    confirm: {text: "Eliminar", value: !0, visible: !0, className: "btn btn-danger", closeModal: !0}
                }
            }).then((willDelete) => {
                if (willDelete) {
                    $('#'+btn).click();
                    swal("Registro Eliminado!", {
                        icon: "success",
                    });
                } else {
                    swal("Cancelo!", {
                        icon: "error",
                    });
                }
            });

        });

        let edit_folder = function (id) {
            let url = "{{ route('carpetasProyectosEdit', ':id') }}";
            url = url.replace(':id', id);

            let urlTwo = "{{ route('fileCarpetasProyectosShow',':id') }}";
            urlTwo = urlTwo.replace(':id', id);


            $('#id_carpetasecundaria').val(url);
            $('#id_archivos').val(urlTwo);

        };

        let detail_folder = function(proyecto,id){
            let url ="{{ route('carpetasProyectosList', ['proyecto' => ':proyecto' , 'id' => ':id'])}}";

            //console.log(url);
            url = url.replace(':id',id);
            url = url.replace(':proyecto',proyecto);

            $('#id_archivos').val(url);

            $('#id_carpetaprincipal').val(url);
        };

        $('.edit-folder').on('click',function () {
            let url = $('#id_carpetasecundaria').val();

            if(url){
                document.location.href=url;
            }else{
                alert('Seleccione carpeta a editar');
            }
        });

        $('.edit-file').on('click',function () {
            let url = $('#id_archivos').val();

            if(url){
                document.location.href=url;
            }else{
                alert('Seleccione carpeta a editar');
            }
        });

        $('.detail-folder').on('click',function(){
            let url = $('#id_carpetaprincipal').val();

            if(url){
                document.location.href=url;
            }else{
                alert('Seleccione carpeta principal');
            }
        })

        console.log("%c Site developed with -   by  @OnlyChristopher " ,"background: #1e88e5; padding:5px; font-size: 12px; color: #ffffff");



    </script>
</body>
</html>
