@section('style')
	<link rel="stylesheet" href="{{ asset('/complement/sweetalert/sweetalert.css') }}" href="/css/master.css">
	<link rel="stylesheet" href="{{ asset('/complement/datetimepicker/bootstrap-datetimepicker.min.css') }}" href="/css/master.css">
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
					<div class="panel-heading">Homesss</div>
					<div class="panel-body">
						<div id="contenido_principal">

						</div>
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
<script type="text/javascript" src="{{ asset('/complement/sweetalert/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/complement/bootstrap-validator/validator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/complement/moment/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/complement/datetimepicker/bootstrap-datetimepicker.js') }}"></script>

@endsection
