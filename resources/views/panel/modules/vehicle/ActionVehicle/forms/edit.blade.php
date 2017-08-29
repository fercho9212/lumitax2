<form  method="POST"   class="form_" id="update_vehicle" data-toggle="validator" >
  <!--Service Especial-->
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <input type="hidden" name="leveles_id" id="leveles_id" value="{{$vehicle->leveles_id}}">
  <input type="hidden" name="vehicle_id" id="id" value="{{$vehicle->id}}">
  <div class="row">
    <div class="col-md-12">
      <?php
        if ($vehicle->leveles_id=='1'){
          $r="Servicio de taxi";
        } elseif ($vehicle->leveles_id=='2') {
          $r="Servicio de Lujo";
        }elseif ($vehicle->leveles_id=='3') {
          $r="Servicio Premium";
        }
       ?>

          <div class="row">
            <div class="col-md-4 col-md-offset-4">
              <div class="form-group">
                <center><label for="exampleInputEmail1"><b><h4>{{strtoupper($r)}}</h4></b></label></center><br>
                <center><label for="exampleInputEmail1">PLACA</label></center><br>
                <div class="input-group">
                  <input name="placa" value="{{$vehicle->placa}}" type="text" pattern="[A-Z|a-z]{3}[0-9]{3}" data-error="formato requerido{WWW666}" minlength="6"  maxlength="6" class="form-control" id="exampleInputEmail1" placeholder="Placa" required>
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
                              <option data-icon="glyphicon glyphicon-certificate" value="{{$i}}"
                              <?php
                                if ($vehicle->veh_model==$i){
                                  echo 'selected="selected"';
                                }
                               ?> > {{$i}}
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
                  <input name="veh_motor" value={{$vehicle->veh_motor}} type="number" maxlength="15" class="form-control" id="exampleInputmotor" placeholder="Número de Motor" required>
                </div>
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Número de Serie</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                  <input name="veh_serie" value={{$vehicle->veh_serie}} type="text"  maxlength="15" class="form-control" id="exampleInputserie" placeholder="Número de serie" required>
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
            <input name="veh_vin" value={{$vehicle->veh_vin}}  type="text" maxlength="15" class="form-control" id="exampleInputEmail1" placeholder="Número Vin" required>
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
            @foreach ($types as $type)
              <option data-icon="glyphicon glyphicon-certificate" value="{{$type->id}}"
              <?php
                if ($vehicle->typevehicle_id==$type->id){
                  echo 'selected="selected"';
                }
               ?> > {{$type->type}}
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
                <option data-icon="glyphicon glyphicon-certificate" value="{{$brand->id}}"
                <?php
                  if ($vehicle->brand_id==$brand->id){
                    echo 'selected="selected"';
                  }
                 ?> > {{$brand->brand}}
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
              <input name="veh_color" value={{$vehicle->veh_color}} maxlength="40" type="text" type="number" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Color" required>
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
                <option data-icon="glyphicon glyphicon-certificate" value="{{$clas->id}}"
                <?php
                  if ($vehicle->brand_id==$clas->id){
                    echo 'selected="selected"';
                  }
                 ?> > {{$clas->class}}
               @endforeach
               <select>
            </div>
          </div>
        </div>
        <div class="col-md-4">

            <div class="form-group">
            {!! Form::Label('item', 'Estado:') !!}
            <select name="state_id"    class="custom-select form-control selectpicker" data-live-search="true" required>
              <option value="">Seleccione...</option>
              @foreach($states as $state)
                  <option value="{{$state->id}}" @if($state->id==$vehicle->state_id) selected='selected' @endif >{{$state->state}}</option>
              @endforeach
            </select>
            <div class="help-block with-errors"></div>
          </div>

        </div>

        <div class="col-md-4">

          <div class="form-group">
            <label for="exampleInputEmail1"></label>
            <div class="input-group">

              <input  type="hidden" value="{{$vehicle->leveles_id}}" name="leveles_id">

          </div>
        </div>

      </div>
  </div>
</div>
<?php if ($vehicle->leveles_id=='2' or $vehicle->leveles_id=='3') {?>
  <br><br>
  <div class="row">
      <div class="col-md-12">

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Tipo de frenos ABS</label>
                <div class="input-group">
                  <input name="vc_brakes" value="{{$vehicle->vehiclecomplement->vc_brakes}}" type="text" class="form-control" id="frenos"  maxlength="30" placeholder="Frenos ABS" required>
                  <span class="input-group-addon"><i class="glyphicon glyphicon-random"></i></span>
                </div>
                <div class="help-block with-errors"></div>
              </div>
            </div>

            <div class="col-md-4">
             <div class="form-group">
              <label for="exampleInputEmail1">Tipo de cabina</label>
               <div class="input-group">
                 <input name="vc_cabin" value="{{$vehicle->vehiclecomplement->vc_cabin}}"  type="text" class="form-control" id="exampleInputEmail1" maxlength="30" placeholder="Tipo de cabina">
                 <span class="input-group-addon"><i class="glyphicon glyphicon-fullscreen"></i></span>
               </div>
               <div class="help-block with-errors"></div>
             </div>
             </div>

             <div class="col-md-4">
               <div class="form-group">
                 <label for="exampleInputEmail1">Bodega equipaje</label>
                 <div class='input-group date' >
                  <input name="vc_cellar" value="{{$vehicle->vehiclecomplement->vc_cellar}}" type='text' class="form-control" id='' maxlength="30" placeholder="Capacidad" required/>
                  <span class="input-group-addon">
                      <i class="glyphicon glyphicon-folder-close"></i>
                  </span>
                 </div>
                 <div class="help-block with-errors"></div>
               </div>
             </div>

          </div>{{--End col-md-12--}}
     </div>{{--End row--}}


        <div class="row">
          <div class="col-md-12">
            <div class="col-md-2">
              <div class="form-group">
                <label for="exampleInputEmail1">Apoyacabezas</label>
                <div class='input-group '  >
                  <div class="form-group">
                    <label id="head_yes" class="radio-inline"><input value="1"  type="radio" name="vc_head" required {{ $vehicle->vehiclecomplement->vc_head=='1' ? "checked" : "" }}>SI</label>
                    <label id="head_no"    class="radio-inline"><input value="0" type="radio" name="vc_head" required {{ $vehicle->vehiclecomplement->vc_head=='0' ? "checked" : ""}}>NO</label>
                </div>
                </div>
                <div class="help-block with-errors"></div>
              </div>
            </div>


                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Puertas Laterales</label>
                    <div class="input-group">

                        <input name="vc_doors" value="{{$vehicle->vehiclecomplement->vc_doors}}" type="number" class="form-control" id="exampleInputEmail1" maxlength="2"  placeholder="Puertas Laterales" required>

                        <span class="input-group-addon"><i class="glyphicon glyphicon-stop"></i></span>


                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-md-2">
                 <div class="form-group">
                  <label for="exampleInputEmail1">Air Bags</label>
                   <div class="input-group">
                     <input name="vc_airbags" value="{{$vehicle->vehiclecomplement->vc_Airbags}}" type="number" class="form-control" maxlength="2"  id="airbag" placeholder="Cantidad" required>
                     <span class="input-group-addon"><i class="glyphicon glyphicon-link"></i></span>
                   </div>
                   <div class="help-block with-errors"></div>
                 </div>
                 </div>


                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Capacidad Psajeros</label>
                    <div class='input-group' >
                     <input name="vc_passagers" value="{{$vehicle->vehiclecomplement->vc_passagers}}" type='number' class="form-control" maxlength="2" placeholder="Camtidad pasajeros" id='passeng' required/>
                     <span class="input-group-addon">
                         <i class="glyphicon glyphicon-user"></i>
                     </span>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Espacio Minimo</label>
                    <div class="input-group">
                      <div class="col-md-6">
                        <?php $r=explode("*",$vehicle->vehiclecomplement->vc_space)?>
                        <input name="vc_ancho" value="{{ (int)$r[0] }}" type="number" class="form-control" id="exampleInputEmail1" placeholder="Ancho" required>
                      </div>
                      <div class="col-md-6">
                        <input name="vc_alto"  value="{{ (int)$r[1] }}" type="number" class="form-control" id="exampleInputEmail1" placeholder="Alto" required>
                      </div>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>


              </div>{{--End col-md-1--}}
            </div>{{--End row--}}


                              <div class="row">
                                <div class="col-md-12">
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Tipo de carroceria</label>
                                          <div class="input-group">

                                             <select name="typebodywork_id" class="selectpicker show-menu-arrow" data-live-search="true">
                                               @foreach ($bodyworks as $bodywork)
                                                 <option data-icon="glyphicon glyphicon-certificate" value="{{$bodywork->id}}"
                                                 <?php
                                                   if ($vehicle->vehiclecomplement->typebodywork_id==$bodywork->id){
                                                     echo 'selected="selected"';
                                                   }
                                                  ?> > {{$bodywork->bodywork}}
                                                @endforeach

                                             </select>
                                          </div>
                                          <div class="help-block with-errors"></div>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                       <div class="form-group">
                                        <label for="exampleInputEmail1">Cilindraje</label>
                                         <div class="input-group">
                                           <input name="vc_cylinder" value="{{$vehicle->vehiclecomplement->vc_cylinder}}" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                           <span class="input-group-addon"><i class="glyphicon glyphicon-copyright-mark"></i></span>
                                         </div>
                                         <div class="help-block with-errors"></div>
                                       </div>

                                       </div>

                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Potencia</label>
                                          <div class='input-group date' >
                                           <input name="vc_power" value="{{$vehicle->vehiclecomplement->vc_power}}" type='text' maxlength="30" class="form-control" id='date_vigencia' required/>
                                           <span class="input-group-addon">
                                               <i class="glyphicon glyphicon-screenshot"></i>
                                           </span>
                                          </div>
                                          <div class="help-block with-errors"></div>
                                        </div>
                                      </div>

                                      <div class="col-md-3">
                                       <div class="form-group">
                                        <label for="exampleInputEmail1">Sillateria</label>
                                         <div class="input-group">
                                           <input name="vc_sillateria" value="{{$vehicle->vehiclecomplement->vc_sillateria}}" type="text" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Sillateria" required>
                                           <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                                         </div>
                                         <div class="help-block with-errors"></div>
                                       </div>
                                       </div>

                                    </div>
                              </div>{{--End Row--}}
                          {{--End SERVICE LEVEL OF LUJO--}}
                  </div> {{--End  box--}}

<?php  }?>
{{--<button type="button" class="btn btn-secondary" >Guardar</button>--}}
<button  type="submit"   class="btn btn-primary">Guardar</button>
</form>
<script type="text/javascript">

$('.selectpicker').selectpicker();
$('#update_vehicle').validator();
$("#update_vehicle").on('submit',function(e){
  e.preventDefault();
  var  level= $('#leveles_id').val();
  var  id= $('#id').val();
  if (level=='1') {
    url='/vehicles/'+id;
    var image ="/img/panel/taxi.png";
    var text="Taxi Actualizado";
  }else if (level=='2') {
    url='/vehiclesluxury/'+id;
    var image ="/img/panel/luxury.jpg";
    var text="Taxi de lujo Actualizado";
  }else if (level=='3') {
    url='/vehiclesluxury/'+id;
    var image ="/img/panel/premium.png";
    var text="Vehículo Premium Actualizado";
  }
  console.log(id);
  console.log(level);
  $.ajax({
      url:url,
      type:'PUT',
      data:$(this).serialize(),
      success:function(data){
          if (data.rpt=='success') {
            var title = text;
            var type ="success";
            var imageUrl =image;
            SweetAlertWithImg(title,type,imageUrl);
          }else {
            console.log(data);
            alert('Error');
          }
      },
      error:function(data){
          msgError(data)
      }
  });
});

</script>
