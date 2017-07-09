@section('style')
	<link rel="stylesheet" href="{{ asset('/complement/bootstrap-sweetalert/sweetalert.css') }}" href="/css/master.css">
	<link rel="stylesheet" href="{{ asset('/complement/datetimepicker/bootstrap-datetimepicker.min.css') }}" href="/css/master.css">
	<link rel="stylesheet" href="{{ asset('/complement/bootstrap-select/bootstrap-select.min.css') }}">

@endsection
@extends('panel.layouts.main')

@section('panel.htmlheader_title')
	Home
@endsection


@section('main-content')
	<!--<div class="container spark-screen">-->
		<div class="row">
			<div class="col-md-12">
				<div class="panel  panel-primary">
					<div class="panel-heading"><center>Lumitax</center></div>
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
