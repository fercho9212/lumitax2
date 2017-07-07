  <div class="row">
    <div class="col-md-12">

          <div class="row">
            <div class="col-md-2 col-md-offset-5">
              <div class="form-group">
                <label for="exampleInputEmail1">PLACA</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="veh_placa" type="number" maxlength="6" class="form-control" id="exampleInputEmail1" placeholder="Placa" required>
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
                      <select name="veh_model"  class="selectpicker show-menu-arrow" data-live-search="true">
                          @for ($i=2008; $i <2020 ; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                          @endfor

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
                  <input name="veh_motor" type="number" maxlength="30" class="form-control" id="exampleInputPassword1" placeholder="Número de Motor" required>
                </div>
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Número de Serie</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                  <input name="veh_serie" type="number"  maxlength="10" class="form-control" id="exampleInputEmail1" placeholder="Número de serie" required>
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
            <input name="veh_vin" type="number" class="form-control" id="exampleInputEmail1" placeholder="Número Vin">
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


           <select name="typevehicle_id" class="selectpicker show-menu-arrow" data-live-search="true">
             @foreach($types as $type)
               <option  value="{{$type->id}}">{{$type->type}}</option>
             @endforeach
           </select>


          </div>

        </div>
      </div>



      <div class="col-md-4">

        <div class="form-group">

          <label for="exampleInputEmail1">Marca</label>
          <div class="input-group">
            <select name="brand_id"  class="selectpicker show-menu-arrow" data-live-search="true">
            @foreach ($brands as $brand)
              <option value="{{$brand->id}}">{{$brand->brand}}</option>
            @endforeach
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
              <input name="veh_color" type="text" type="number" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Color">
              <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputEmail1">Clase</label>
            <div class="input-group">
              <select name="class_id"  class="selectpicker show-menu-arrow" data-live-search="true">
              @foreach ($class as $clas)
                <option value="{{$clas->id}}">{{$clas->class}}</option>
              @endforeach
              </select>
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
