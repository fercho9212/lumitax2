@extends('panel.dashboard')
@section('htmlheader')
    @include('panel.layouts.partials.head')
    <style>
    .skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
        background-color: #3E2723 !important;
    }
    </style>
@show
@section('theme-body')
  <link href="{{ asset('/css/skins/skin-red.css') }}" rel="stylesheet" type="text/css" />
  <body class="skin-red sidebar-mini">
@endsection
@section('style')
	<link rel="stylesheet" href="{{ asset('/complement/bootstrap-sweetalert/sweetalert.css') }}" href="/css/master.css">
	<link rel="stylesheet" href="{{ asset('/complement/datetimepicker/bootstrap-datetimepicker.min.css') }}" href="/css/master.css">
	<link rel="stylesheet" href="{{ asset('/complement/bootstrap-select/bootstrap-select.min.css') }}">
@endsection


@section('panel.htmlheader_title')
	Home
@endsection

@section('menu')
	@if (! Auth::guest())
	    <div class="user-panel">
	        <div class="pull-left image">
	            <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
	        </div>
	        <div class="pull-left info">
	            <p>{{ Auth::user()->name }}</p>
	            <!-- Status -->
	            <a href="#"><i class="fa fa-circle text-success"></i>Panel</a>
	        </div>
	    </div>
	@endif

	<!-- Sidebar Menu -->
	<ul class="sidebar-menu">
	    <li class="header"><center>ADMINISTRACIÓN</center></li>
	    <!-- Optionally, you can add icons to the links -->


	    <li class="treeview">
	        <a href="#"><i class='fa fa-link'></i> <span>Editar</span> <i class="fa fa-angle-left pull-right"></i></a>
	        <ul class="treeview-menu">
	            <li class="active"><a href="javascript:void(0);" onclick="load_frm(1);">Crear</a></li>
	            <li ><a href="javascript:void(0);" onclick="load_frm(2);">Ver</a></li>
	        </ul>
	    </li>
	    <li><a href="javascript:void(0);" onclick="load_frm(10);"><i class='fa fa-link'></i> <span>Usuarios</span></a></li>
	    <li><a href="javascript:void(0);" onclick="load_frm(20);"><i class='fa fa-link'></i> <span>Asignación</span></a></li>
	    <li class="treeview">
	        <a href="#"><i class='fa fa-link'></i> <span>Vehículos</span> <i class="fa fa-angle-left pull-right"></i></a>
	        <ul class="treeview-menu">
	            <li><a href="/vehicles/create">Pruebaa</a></li>
	            <li><a href="javascript:void(0);"  onclick="ActionDocument(1)">Vehículo Taxi</a></li>
	            <li><a href="javascript:void(0);"  onclick="load_frm(31);">Vehículo Lujo</a></li>
	        </ul>
	    </li>

	</ul><!-- /.sidebar-menu -->
@endsection


@section('main-content')
	<!--<div class="container spark-screen">-->
		<div class="row">
			<div class="col-md-12">
				<div class="panel  panel-primary" >
					<div class="panel-heading" style="background-color: #000000"><center>MODULO DE VEHICULOS</center></div>
					<div class="panel-body">
						<div id="contenido_principal">
							@yield('contenido_principal')
						</div>
						<!-- load-->
										<div style="display: none" id="cargador_empresa" align="center">
											<br><br><br><br>
													 	<center><img src="/img/cargando.gif" align="middle" alt="cargador"> &nbsp;</center>
														<center><label style="color:#ABB6BA">Realizando tarea solicitada ...</label></center>
														<br><br>
													 <hr style="color:#003" width="50%">
													 <br>
									 </div>
						<!-- end load-->
					</div>
				</div>
			</div>
		</div>
	<!--</div>-->
@endsection


@section('scripts_table')
@include('panel.layouts.partials.script_for_table')
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('/complement/bootstrap-sweetalert/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/complement/bootstrap-validator/validator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/complement/moment/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/complement/datetimepicker/bootstrap-datetimepicker.js') }}"></script>
{{--Select--}}
<script type="text/javascript" src="{{ asset('/complement/bootstrap-select/bootstrap-select.min.js') }}"></script>
{{--Checkbox--}}
<script type="text/javascript" src="{{ asset('/complement/bootstrap-checkbox/bootstrap-checkbox.min.js') }}"></script>

@endsection
