@include('panel.modules.tcontrol.forms.edit')
@include('panel.modules.tcontrol.forms.view')
<div class="row">

  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <div class="col-md-12">
    <div class="col-md-6 col-md-offset-3">
      <center><label for="exampleInputEmail1" data-live-search="true">Seleccione un Conductor</label></center>
      <div class="input-group">
        <select  name="dv_driver" class="selectpicker show-menu-arrow" id="selectDriver" data-live-search="true">
          <option value="">Seleccione...</option>
          @foreach ($drivers as $driver)
            <option value="{{$driver->id}}">cc:{{$driver->cc}} Nombre:{{$driver->name}}  </option>
          @endforeach
        </select>
      </div>
        <br><br>
    </div>
  </div><!--Cierra col-md-12-->


</div>
  <div id="driver" class="" >
    @include('panel.modules.tcontrol.forms.create')
  </div>

<div class="reload_table" id="reload-table">
  <div class="table-responsive text-center">
    <div class="table-responsive text-center">
        <table class="table table-borderless" id="table">
            <thead>
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">CC</th>
                    <th class="text-center">Placa</th>
                    <th class="text-center">No Tarjeta control</th>
                    <th class="text-center">No Nit Empresa</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Fecha Expedición</th>
                    <th class="text-center">Fecha Vencimiento</th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>
            @foreach($dvs as $dv)
                    <tr class="driver{{$dv->id}}">
                    <td>{{$dv->dri_name}}</td>
                    <td>{{$dv->dri_cc}}</td>
                    <td>{{$dv->placa}}</td>
                    <td>{{$dv->dv_no}}</td>
                    <td>{{$dv->dv_nit}}</td>
                    <td>{{$dv->state}}</td>
                    <td>{{$dv->dv_date_ex}}</td>
                    <td>{{$dv->dv_date_ven}}</td>
                    <td>
                      <button  class="update btn btn-info btn-circle-medium" data-id="{{$dv->id}}"
                                            data-name="{{$dv->dri_name}}"
                                            data-cc="{{$dv->dri_cc}}"
                                            data-placa="{{$dv->placa}}"
                                            data-no="{{$dv->dv_no}}"
                                            data-nit="{{$dv->dv_nit}}"
                                            data-state="{{$dv->idstate}}"
                                            data-date_ex="{{$dv->dv_date_ex}}"
                                            data-date_ven="{{$dv->dv_date_ven}}"
                                            data-iddriver="{{$dv->iddriver}}"
                                            data-idvehicle="{{$dv->idvehicle}}"
                              data-toggle="modal" data-target="#viewcontrol" >
                              <span class="glyphicon glyphicon-eye-open"></span>
                        </button>


                      <button  class="update btn btn-warning btn-circle-medium" data-id="{{$dv->id}}"
                                            data-name="{{$dv->dri_name}}"
                                            data-cc="{{$dv->dri_cc}}"
                                            data-placa="{{$dv->placa}}"
                                            data-no="{{$dv->dv_no}}"
                                            data-nit="{{$dv->dv_nit}}"
                                            data-state="{{$dv->idstate}}"
                                            data-date_ex="{{$dv->dv_date_ex}}"
                                            data-date_ven="{{$dv->dv_date_ven}}"
                                            data-iddriver="{{$dv->iddriver}}"
                                            data-idvehicle="{{$dv->idvehicle}}"
                              data-toggle="modal" data-target="#edit_passenger" >
                              <span class="glyphicon glyphicon-edit"></span>
                        </button>
                          <button   class="btn-circle-medium btn btn-danger" data-toggle="modal"  data-target="#dataDelete" onclick="del_tjopt({{$dv->id}})">
                              <span class="glyphicon glyphicon-trash"></span>
                          </button>
                    </td>
                    </tr>
        @endforeach
        </table>
      </div>


</div>

</div>

<script src="{{ asset('/js/modules/tcontrol_create.js') }}" type="text/javascript"></script>
