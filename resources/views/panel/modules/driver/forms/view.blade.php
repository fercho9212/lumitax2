@if(session('success'))
    @include('sweet::alert')
@endif
{{--

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" type="text/css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" type="text/css"/>

--}}

<style>
.modal {
text-align: center;
}

@media screen and (min-width: 768px) {
.modal:before {
  display: inline-block;
  vertical-align: middle;
  content: " ";
  height: 100%;
}
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}
.modal-header-primary {
	color:#fff;
  padding:9px 15px;
  border-bottom:1px solid #eee;
  background-color: #337ab7;
  -webkit-border-top-left-radius: 5px;
  -webkit-border-top-right-radius: 5px;
  -moz-border-radius-topleft: 5px;
  -moz-border-radius-topright: 5px;
   border-top-left-radius: 5px;
   border-top-right-radius: 5px;
}
</style>
<!-- load-->
  <div style="display: none" id="load_modal" align="center">
          <br><br><br><br>
                <center><img src="img/load.gif" align="middle" alt="cargador" width="60%" height="20%"> &nbsp;</center>
                <br><br>
               <hr style="color:#003" width="50%">
               <br>
  </div>
<!-- end load-->

@include('panel.modules.driver.forms.modalVehicle')


<div class="table-responsive text-center">
    <table class="table table-striped table-bordered dt-responsive display nowrap"  id="table">
        <thead>
            <tr>
              <th class="text-center"><span class="glyphicon glyphicon-star-empty"></span></th>
                <th class="text-center">Cedula</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Movíl</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Typo</th>
                <th class="text-center">Category</th>
                <th class="text-center">Vigencia</th>
                <th class="text-center">Registrado el</th>
                <th class="text-center">Medio</th>
                @if (Auth::user()->typesrole_id==1 || Auth::user()->typesrole_id==2)<th class="text-center">Acción</th>@endif
            </tr>
        </thead>
        @foreach($drivers as $driver)
          @foreach ($licences as $licence)
                @if ($licence->id == $driver->id)
                <tr class="driver{{$driver->id}}">
                <td><span class="glyphicon glyphicon-star-empty"></span>{{$driver->dri_qual}}</td>
                <td>{{$driver->dri_cc}}</td>
                <td>{{$driver->dri_name}}</td>
                <td>{{$driver->dri_last}}</td>
                <td>{{$driver->dri_movil}}</td>
                <td>{{$driver->state->state}}</td>
                <td>{{$driver->licence->typeslicence->type}}</td>
                <td>{{$driver->licence->categorylicence->category}}</td>
                <td>{{$driver->licence->lic_validity}}</td>
                <td>{{$driver->created_at}}</td>
                <td>{{$driver->typeregister->type}}</td>
                @if (Auth::user()->typesrole_id==1 || Auth::user()->typesrole_id==2)

                    <td>
                      <button onclick="" class="update btn btn-warning" data-id="{{$driver->id}}" data-toggle="modal" data-target="#frmdriver"
                          data-name="{{$driver->name}}">
                          <span class="fa fa-taxi"></span>
                      </button>
                      <button onclick="edit({{$driver->id}})" class="update btn btn-info" data-id="{{$driver->id}}"
                          data-name="{{$driver->name}}">
                          <span class="glyphicon glyphicon-edit"></span>
                      </button>
                      <button class="delete-modal btn btn-danger" href="javascript:void(0);" data-id="{{$driver->id}}"
                          data-name="{{$driver->dri_name}}">
                          <span class="glyphicon glyphicon-trash"></span>
                      </button>


                  </td>
                @endif
                </tr>
                @endif
        @endforeach
    @endforeach
    </table>
</div>
<script src="{{ asset('/js/modules/driver_index.js') }}" type="text/javascript"></script>
