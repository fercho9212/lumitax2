@extends('panel.layouts.main')

@section('panel.htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-12">

				<div class="panel panel-default">
					<div class="panel-heading">Home</div>
					<div class="panel-body">
						<div id="contenido_principal">
								contenido Principal
						</div>
						<!-- cargador empresa -->
							<div style="display: none;" id="cargador_empresa" align="center">
									<br>
							 <label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label>
							 <img src="imagenes/cargando.gif" align="middle" alt="cargador"> &nbsp;<label style="color:#ABB6BA">Realizando tarea solicitada ...</label>
								<br>
							 <hr style="color:#003" width="50%">
							 <br>
						 </div>


					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
