@include('panel.modules.vehicle.ActionVehicle.view.data_vehicle')
<div class="col-md-10 col-md-offset-1">
  <form class="" action="index.html" method="post">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">

          <label for="exampleInputPassword1">Tipo Vehículo</label>
          <div class="input-group" id="typevehicles_id">


            <select class="p">
              <option>Mustard</option>
              <option>Ketchup</option>
              <option>Relish</option>
            </select>


          </div>

        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputPassword1">Compañia</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="dri_last" type="text" maxlength="30" class="form-control input-sm" id="exampleInputPassword1" placeholder="Password" required>
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputPassword1">No Poliza</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="dri_last" type="text" maxlength="30" class="form-control input-sm" id="exampleInputPassword1" placeholder="Password" required>
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputPassword1">No Poliza</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="dri_last" type="text" maxlength="30" class="form-control input-sm" id="exampleInputPassword1" placeholder="Password" required>
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="form-group">
          <label for="comment">Cobertura</label>
          <textarea class="form-control" rows="1" id="comment"></textarea>
        </div>
      </div>
    </div>
    <div class="box box-primary">
            <div class="box-header with-border">
              <center><h3 class="box-title">Vigencia</h3></center>
            </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputPassword1">Fecha Desde</label>
          <div class='input-group date' >
           <input name="lic_validity" type='text' class="form-control" id='date_i'/>
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
           <input name="lic_validity" type='text' class="form-control" id='date_f'/>
           <span class="input-group-addon">
               <i class="glyphicon glyphicon-calendar"></i>
           </span>
          </div>
        </div>
      </div>
    </div>
</div>
  </form>
</div>


<script>

  $(function () {
                //$('form').validator();
                $('#date_i').datetimepicker({

                  format: 'YYYY-MM-DD'
                });
                $('#date_f').datetimepicker({

                  format: 'YYYY-MM-DD'
                });
                $('.p').selectpicker({

});




            });
</script>
