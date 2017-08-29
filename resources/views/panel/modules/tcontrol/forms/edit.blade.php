<div class="modal fade" id="edit_passenger" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar</h4>
          </div>
          <div class="modal-body">

            <form role="form" method="POST" id="edit_tcontrol" action="create_driver" class="create_passenger" data-toggle="validator">
                <input type="hidden" id='id' name="id" value="">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" id='iddriver' name="dv_driver" value="">
                <input type="hidden" id='idvehicle' name="dv_vehicle" value="">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input id="name"  value="" tabindex="1" name="dri_name" type="text" maxlength="30" class="form-control"  placeholder="Enter name" disabled>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example">Cédula</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input id='cc' value="" tabindex="2" name="pas_last" type="text" maxlength="30" class="form-control"  placeholder="Enter cédula" disabled>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Placa de vehículo</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  name="placa" type="text" tabindex="3" maxlength="30" class="form-control" id="placa" placeholder="Enter placa" disabled>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example">No tarjeta control</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input name="dv_no" type="text" tabindex="4"  maxlength="30" class="form-control" id="dv_no" placeholder="No tarjeta de control" >
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nit Empresa</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  name="dv_nit" type="text" tabindex="3" maxlength="30" class="form-control" id="dv_nit" placeholder="Nit de Empresa" >
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">

                    <label for="exampleInputEmail1">Estado</label>

                          <div class="input-group">
                            <div id="st">
                              <select name="dv_state" class="selectpicker show-menu-arrow"  placeholder="Nit de Empresa" data-live-search="true">
                                <option value="">Seleccione...</option>
                                @foreach($states as $state)
                                  <option   value="{{$state->id}}">{{$state->state}}</option>
                                @endforeach
                              </select>
                                <div class="help-block with-errors"></div>
                            </div>

                          </div>
                  </div>
                </div>

              </div>


              <div class="box box-primary">
              <div class="box-header with-border">

              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fecha Desde</label>
                    <div class='input-group date' >
                     <input name="dv_date_e" type='text' class="form-control" id='edit_date_i'/>
                     <span class="input-group-addon">
                         <i class="glyphicon glyphicon-calendar"></i>
                     </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Fecha hasta</label>
                    <div class='input-group date' >
                     <input name="dv_date_f" type='text' class="form-control" id='edit_date_f'/>
                     <span class="input-group-addon">
                         <i class="glyphicon glyphicon-calendar"></i>
                     </span>
                    </div>
                  </div>
                </div>
              </div>
                </div>
                <div class="row">

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button  type="submit"  id="send" class="btn btn-primary">Actualizar</button>
              </div>
            </form>
          </div>

        </div>
    </div>
  </div>
</div>
<script src="{{ asset('/js/modules/tcontrol_edit.js') }}" type="text/javascript"></script>
