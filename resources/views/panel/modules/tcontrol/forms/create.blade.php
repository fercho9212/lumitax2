<form class="" action="index.html" method="post" id="tcontrol">
  {!! csrf_field() !!}

  <input type="hidden" name="dv_driver" id="dv_driver" value="">
  <div class="col-md-8 col-md-offset-2">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputEmail1">Nombre</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="dri_name" type="text" maxlength="30" class="form-control" id="dri_name" placeholder="Enter name" disabled>
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputPassword1">Identificación</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="dri_cc" type="text" maxlength="30" class="form-control" id="dri_cc" placeholder="Enter last" disabled>
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">

          <center><label for="exampleInputEmail1" data-live-search="true">Vehículo</label></center>
          <div class="input-group">
            <select  name="dv_vehicle" class="selectpicker show-menu-arrow" id="vehicle" data-live-search="true" required>
              <option value="">Seleccione...</option>

            </select>

          </div>
        </div>

      <div class="col-md-6">
        <center><label for="exampleInputEmail1" data-live-search="true">Estado</label></center>
        <div class="input-group">

          <select  name="dv_state" class="selectpicker show-menu-arrow" id="state" data-live-search="true">
            <option value="">Seleccione...</option>
          </select>

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputEmail1">Nit Empresa</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="dv_nit" type="number" maxlength="15" class="form-control" id="dri_name" placeholder="Enter Nit " >
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputPassword1">Número Único Trj Control</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="dv_no" type="number" maxlength="15" class="form-control" id="dri_cc" placeholder="No Tarjeta de control" >
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputPassword1">Fecha Desde</label>
          <div class='input-group date' >
           <input name="dv_date_e" type='text' placeholder="Fecha expedición" class="form-control" id='date_i'/>
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
           <input name="dv_date_f" type='text' class="form-control" id='date_f' placeholder="Fecha de vencimiento"/>
           <span class="input-group-addon">
               <i class="glyphicon glyphicon-calendar"></i>
           </span>
          </div>
        </div>
      </div>
    </div>


  </div>

  <div class="row">

    <div class="col-md-4 col-md-offset-4">
        <br><br>

        <center><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button><center>
    </div>
  </div>
</form>
