@extends('panel.dashboard')
@section('style')
  <link rel="stylesheet" href="{{ asset('/complement/repairsweet/sweet-alert.css') }}" href="/css/master.css">
  <link rel="stylesheet" href="{{ asset('/complement/datetimepicker/bootstrap-datetimepicker.min.css') }}" >
  <link rel="stylesheet" href="{{ asset('/complement/bootstrap-select/bootstrap-select.min.css') }}">

  <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">

  <link rel="stylesheet" href="{{ asset('/complement/lightbox2/lightbox.min.css') }}">



  <style>
  .skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
      background-color: #3E2723 !important;
  }
  .skin-red .wrapper, .skin-red .main-sidebar, .skin-red .left-side {
      background-color: #000000 !important;
}
  </style>

@endsection
@section('theme-body')
  <link href="{{ asset('/css/skins/skin-red.css') }}" rel="stylesheet" type="text/css" />
  <body class="skin-red sidebar-mini">
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
	            <p>{{$vehicle->placa}}</p>
	            <!-- Status
	            <a href="#"><i class="fa fa-circle text-success"></i>Panel</a>-->
	        </div>
	    </div>
	@endif

	<!-- Sidebar Menu -->
	<ul class="sidebar-menu">
	    <li class="header"><center>ADMINISTRACIÓN</center></li>
	    <!-- Optionally, you can add icons to the links -->

      <li><a href="/vehicles/{{$vehicle->id}}/show" ><i class='fa fa-link'></i> <span>Ver</span></a></li>
      <li><a href="javascript:void(0);" onclick="ActionDocument(4,{{$vehicle->id}});"><i class='fa fa-link'></i> <span>Editar</span></a></li>
	    <li><a href="javascript:void(0);" onclick="ActionDocument(2,{{$vehicle->id}});"><i class='fa fa-link'></i> <span>Agregar Docuemntos</span></a></li>
      <li><a href="javascript:void(0);" onclick="ActionDocument(3,{{$vehicle->id}});"><i class='fa fa-link'></i> <span>Agregar Fotos</span></a></li>

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
<script type="text/javascript" src="{{ asset('/complement/repairsweet/sweet-alert.js') }}"></script>
<script type="text/javascript" src="{{ asset('/complement/bootstrap-validator/validator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/complement/moment/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/complement/datetimepicker/bootstrap-datetimepicker.js') }}"></script>
{{--Select--}}
<script type="text/javascript" src="{{ asset('/complement/bootstrap-select/bootstrap-select.min.js') }}"></script>
{{--Checkbox--}}
<script type="text/javascript" src="{{ asset('/complement/bootstrap-checkbox/bootstrap-checkbox.min.js') }}"></script>
{{--DropZone--}}
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
{{--lightbox2--}}
<script type="text/javascript" src="{{ asset('/complement/lightbox2/lightbox.min.js') }}"></script>
@endsection
