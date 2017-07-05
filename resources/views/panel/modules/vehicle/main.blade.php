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



              <div class="panel with-nav-tabs panel-default">
                  <div class="panel-heading">
                          <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab1primary" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Primary </a></li>
                              <li><a href="#tab2primary" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Primary</a></li>
                          </ul>
                  </div>
                  <div class="panel-body">
                      <div class="tab-content">
                          <div class="tab-pane fade in active" id="tab1primary">@yield('create-vehicle')</div>
                          <div class="tab-pane fade" id="tab2primary">Primary 2</div>
                          <div class="tab-pane fade" id="tab3primary">Primary 3</div>
                          <div class="tab-pane fade" id="tab4primary">Primary 4</div>
                          <div class="tab-pane fade" id="tab5primary">Primary 5</div>
                      </div>
                  </div>
              </div>


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

@endsection
