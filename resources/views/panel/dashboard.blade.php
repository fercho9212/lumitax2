
@extends('panel.layouts.main')

@section('style')
	<link rel="stylesheet" href="{{ asset('/complement/repairsweet/sweet-alert.css') }}" >
	<link rel="stylesheet" href="{{ asset('/complement/datetimepicker/bootstrap-datetimepicker.min.css') }}" >
	<link rel="stylesheet" href="{{ asset('/complement/bootstrap-select/bootstrap-select.min.css') }}">
  <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
	<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/css/dataTables.checkboxes.css" rel="stylesheet" />

 @endsection

@section('panel.htmlheader_title')
	Home
@endsection
@section('menu')
	@include('panel.modules.menu')
@endsection

@section('main-content')
	<!--<div class="container spark-screen">-->
		<div class="row">
			<div class="col-md-12">
				<div class="panel  panel-primary">
					<div class="panel-heading"><center>LUMITAX</center></div>
					<div class="panel-body">
						<div id="contenido_principal">

						</div>
						<!-- load-->
										<div style="display: none" id="cargador_empresa" align="center">
											<br><br><br><br>
													 	<center><img src="img/cargando.gif" align="middle" alt="cargador"> &nbsp;</center>
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
		<script type="text/javascript" src="{{ asset('/complement/bootstrap-select/bootstrap-select.min.js') }}"></script>
		{{--DropZone--}}
		<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>




@endsection
