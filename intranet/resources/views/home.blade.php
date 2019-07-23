@extends('layouts.app')
@section('clase-active-inicio', 'active')
@section('content')
			<!-- begin breadcrumb -->
			{{--<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="javascript:;">Inicio</a></li>
			</ol>--}}
			<!-- end breadcrumb -->
			<!-- begin page-header -->
{{--
			<h1 class="page-header">Inicio </h1>
--}}
			<!-- end page-header -->

			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Inicio</h4>
				</div>
				<div class="panel-body">
					<video width="100%" height="800" controls autoplay>
						<source src="{{asset('assets/video/SIVHE.mp4')}}" type="video/mp4">
						Your browser does not support the video tag.
					</video>
				</div>
			</div>
			<!-- end panel -->

@endsection
