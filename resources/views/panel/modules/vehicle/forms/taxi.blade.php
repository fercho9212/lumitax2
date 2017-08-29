


  <div class="row">
    <div class="col-md-12">

          <div class="row">
            <div class="col-md-4 col-md-offset-4">
              <div class="form-group">
                <center><label for="exampleInputEmail1">PLACA</label></center><br>
                <div class="input-group">
                  <input name="placa" type="text" pattern="[A-Z|a-z]{3}[0-9]{3}" data-error="formato requerido{WWW666}" minlength="6"  maxlength="6" class="form-control" id="exampleInputEmail1" placeholder="Placa" required>
                  <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                </div>
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>
          <br>
            <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Modelo</label>

                <div class="input-group">

                      <select name="veh_model"  class="selectpicker show-menu-arrow" data-live-search="true">
                          @for ($i=2008; $i <2020 ; $i++)
                            <option data-icon="glyphicon glyphicon-certificate" value="{{$i}}">{{$i}}</option>
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
                  <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                  <input name="veh_motor" type="number" maxlength="15" class="form-control" id="exampleInputmotor" placeholder="Número de Motor" required>
                </div>
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Número de Serie</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                  <input name="veh_serie" type="text"  maxlength="15" class="form-control" id="exampleInputserie" placeholder="Número de serie" required>
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
            <input name="veh_vin" type="text" maxlength="15" class="form-control" id="exampleInputEmail1" placeholder="Número Vin" required>
            <span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
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
               <option data-icon="glyphicon glyphicon-compressed" value="{{$type->id}}">{{$type->type}}</option>
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
              <option data-icon="glyphicon glyphicon-compressed" value="{{$brand->id}}">{{$brand->brand}}</option>
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
              <input name="veh_color" maxlength="40" type="text" type="number" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Color" required>
              <span class="input-group-addon"><i class="glyphicon glyphicon-unchecked"></i></span>
            </div>
            <div class="help-block with-errors"></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputEmail1">Clase</label>
            <div class="input-group">
              <select name="class_id"  class="selectpicker show-menu-arrow" data-live-search="true">
              @foreach ($class as $clas)
                <option data-icon="glyphicon glyphicon-compressed" value="{{$clas->id}}">{{$clas->class}}</option>
              @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          {!! Form::Label('item', 'Estado:') !!}
          <select name="state_id"  data-trigger="change"  class="custom-select form-control selectpicker" data-live-search="true" required>
            @foreach($states as $state)
              <option  data-icon="glyphicon glyphicon-compressed" value="{{$state->id}}">{{$state->state}}</option>
            @endforeach
          </select>
          <div class="help-block with-errors"></div>
        </div>
      </div>
      </div>
  </div>{{--End row--}}

  <!-- start row-->
  <div class="row">
    <div class="col-md-12">
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Espacio de Baúl</label>
              <div class="input-group">
                <select name="baul_id"  class="selectpicker show-menu-arrow" data-live-search="true">
                @foreach ($baules as $baul)
                  <option data-icon="glyphicon glyphicon-compressed" value="{{$baul->id}}">{{$baul->size}}</option>
                @endforeach
                </select>
              </div>
              <div class="help-block with-errors"></div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Espacio Interno</label>
              <div class="input-group">
                <select name="spacevehicle_id"  class="selectpicker show-menu-arrow" data-live-search="true">
                @foreach ($spaces as $space)
                  <option data-icon="glyphicon glyphicon-compressed" value="{{$space->id}}">{{$space->size}}</option>
                @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <label for="exampleInputEmail1">Nivel de servicio</label>
            <div class="form-group">
              <label id="special" class="radio-inline btn-circle btn-lg"><input value='1'  type="radio" name="leveles_id" required>Taxi</label>
              <label id="premium" class="radio-inline btn-circle btn-lg"><input value='3'  type="radio" name="leveles_id" required>Premium</label>
              <label id="lujo"    class="radio-inline btn-circle btn-lg" ><input value='2' type="radio" name="leveles_id" required>Lujo</label>
          </div>
          </div>

        </div>
    </div>{{--End row--}}
  <!-- /.box-roe -->


<!-- /.box-roe -->
<!-- /.Start Panel Licence -->
<!-- FIN SERVICE ESPECIAL-->
