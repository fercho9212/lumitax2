@extends('panel.modules.vehicle.main')
@section('create-vehicle')
  <form  method="POST"   class="form_" id="create_vehicle">
    <!--Service Especial-->
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="row">
        <div class="col-md-12">

              <div class="row">
                <div class="col-md-2 col-md-offset-5">
                  <div class="form-group">
                    <label for="exampleInputEmail1">PLACA</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input name="veh_placa" type="text" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Modelo</label>
                    <div class="input-group">
                          <select name="veh_model"  class="selectpicker show-menu-arrow">
                              <option value="1">Mustard</option>
                              <option value="1">Ketchup</option>
                              <option value="1">Relish</option>
                         </select>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Número de Motor</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input name="veh_motor" type="text" maxlength="30" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Número de Serie</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                      <input name="veh_serie" type="number"  maxlength="10" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
            </div>

      </div>{{--End row--}}
    <!-- /.box-roe -->

  <!-- start row-->
  <div class="row">
    <div class="col-md-12">

          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Número VIN</label>
              <div class="input-group">
                <input name="veh_vin" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              </div>
            <div class="help-block with-errors"></div>
            </div>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputPassword1">Tipo Vehículo</label>

              <div class="input-group" id="typevehicles_id">

                <select name="veh_color"  class="selectpicker show-menu-arrow">
                    <option value="1">Mustard</option>
                    <option value="1">Ketchup</option>
                    <option value="1">Relish</option>
               </select>

              </div>

            </div>
          </div>


          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Marca</label>
              <div class="input-group">
                 <select name="brands_id"  class="selectpicker show-menu-arrow">
                     <option value="1">Mustard</option>
                     <option value="1">Ketchup</option>
                     <option value="1">Relish</option>
                 </select>
              </div>
            </div>
          </div>

        </div>
    </div>{{--End row--}}
  <!-- /.box-roe -->

  <!-- start row-->
  <div class="row">
      <div class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Color</label>
                <div class="input-group">
                  <input name="veh_color" type="text" type="number" maxlength="12" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Linea</label>
                <div class="input-group">
                  <input name="veh_line" type="text" type="number" maxlength="12" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <label for="exampleInputEmail1">Nivel de servicio</label>
              <div class="form-group">

                <label id="special" class="radio-inline"><input value='1' checked="checked" type="radio" name="veh_service">ESPECIAL</label>
                <label id="lujo"    class="radio-inline"><input value='2' type="radio" name="veh_service">LUJO</label>
            </div>
            </div>

          </div>
      </div>{{--End row--}}
  <!-- /.box-roe -->
  <!-- /.Start Panel Licence -->
  <!-- FIN SERVICE ESPECIAL-->
  <br>
  <br>


              <div id="servicelujo" class="ignore" style="display:none">
                    @include('panel.modules.vehicle.forms.luxury');
              </div>{{--End  LUJO--}}


            <div class="box-footer">
              <button type="button" class="btn btn-secondary" >Close</button>
              <button  type="submit"   class="btn btn-primary">Submit</button>
            </div>
          </form>





@endsection

@section('code_script')
<script type="text/javascript">
    $(document).ready(function(){

$('form').validator();


      $('#lujo').click(function(){
          $('#servicelujo').show(2000);
            $("#frenos").attr('required',true);
          //$('#servicelujo').toggle("slow");
      });

      $('#special').click(function(){
          $('#frenos').prop('required', false);
          $('#servicelujo').hide(2000);

      });

      $('#create_vehicle').submit(function(e){
        e.preventDefault();
        alert('dasdasd');
        var url='/vehicles';
        var datos=$(this).serialize();
            $.ajax({

                    type: "POST",
                    data: datos,
                    url : url,
                    datatype:'json',
                    success: function(data){
                      $.each(data.dat,function(i,value){
                        console.log(i+value);
                      });
                    }
            });
      });
    });
</script>
@endsection
