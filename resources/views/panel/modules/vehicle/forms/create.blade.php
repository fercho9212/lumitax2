@extends('panel.modules.vehicle.main')
@section('create-vehicle')
  <form role="form" method="POST"  action="/vehicles" class="form_" id="create_vehicle">

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
                      <input name="dri_name" type="text" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
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
                          <select name="type"  class="selectpicker show-menu-arrow">
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
                      <input name="dri_last" type="text" maxlength="30" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Número de Serie</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                      <input name="dri_cc" type="number"  maxlength="10" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
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
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              </div>
            <div class="help-block with-errors"></div>
            </div>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputPassword1">Tipo Vehículo</label>

              <div class="input-group">

                <select name="type"  class="selectpicker show-menu-arrow">
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
                 <select name="type"  class="selectpicker show-menu-arrow">
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
                  <input name="dri_phone" type="text" type="number" maxlength="12" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Linea</label>
                <div class="input-group">
                  <input name="dri_phone" type="text" type="number" maxlength="12" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <label for="exampleInputEmail1">Nivel de servicio</label>
              <div class="form-group">

                <label id="special" class="radio-inline"><input checked="checked" type="radio" name="service">ESPECIAL</label>
                <label id="lujo"    class="radio-inline"><input type="radio" name="service">LUJO</label>
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
      $('#create_vehicle').on('submit',function(e){
        e.preventDefault;
        alert('dasdasd');
        var url='/vehicles';
            $.ajax({

                    type: "POST",
                    url : url,
                    datatype:'json',
                    success: function(data){
                      alert(data);
                    }
            });
      });
    });
</script>
@endsection
