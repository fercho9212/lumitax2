


<div class="box box-primary">
   <div class="box-header with-border">
    <h3 class="box-title">SERVICIO DE LUJO</h3>
  </div>

<!-- /.Start Panel Licence -->
<!-- FIN SERVICE LUJO-->



<div class="row">
<div class="col-md-12">

      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputEmail1">Tipo de frenos ABS</label>
          <div class="input-group">
            <input name="vc_brakes" type="text" class="form-control" id="frenos"  placeholder="Frenos ABS" >
            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </div>
      <div class="col-md-4">
       <div class="form-group">
        <label for="exampleInputEmail1">Tipo de cabina</label>
         <div class="input-group">
           <input name="vc_cabin" type="text" class="form-control" id="exampleInputEmail1" placeholder="Tipo de cabina">
           <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
         </div>
         <div class="help-block with-errors"></div>
       </div>
       </div>

       <div class="col-md-4">
         <div class="form-group">
           <label for="exampleInputEmail1">Bodega equipaje</label>
           <div class='input-group date' >
            <input name="vc_cellar" type='text' class="form-control" id='' placeholder="Capacidad"/>
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-calendar"></i>
            </span>
           </div>
           <div class="help-block with-errors"></div>
         </div>
       </div>

    </div>
   </div>{{--End row--}}


      <div class="row">
        <div class="col-md-12">
          <div class="col-md-2">
            <div class="form-group">
              <label for="exampleInputEmail1">Apoyacabezas</label>
              <div class='input-group '  >
                <div class="form-group">
                  <label id="head_yes" class="radio-inline"><input value='1' checked="checked" type="radio" name="vc_head">SI</label>
                  <label id="head_no"    class="radio-inline"><input value='0' type="radio" name="vc_head">NO</label>
              </div>
              </div>
              <div class="help-block with-errors"></div>
            </div>
          </div>


              <div class="col-md-2">
                <div class="form-group">
                  <label for="exampleInputEmail1">Puertas Laterales</label>
                  <div class="input-group">

                      <input name="vc_doors" type="number" class="form-control" id="exampleInputEmail1" placeholder="Puertas Laterales" required>

                      <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>


                  </div>
                  <div class="help-block with-errors"></div>
                </div>
              </div>

              <div class="col-md-2">
               <div class="form-group">
                <label for="exampleInputEmail1">Air Bags</label>
                 <div class="input-group">
                   <input name="vc_airbags" type="number" class="form-control" id="airbag" placeholder="Cantidad">
                   <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                 </div>
                 <div class="help-block with-errors"></div>
               </div>
               </div>


              <div class="col-md-2">
                <div class="form-group">
                  <label for="exampleInputEmail1">Capacidad Psajeros</label>
                  <div class='input-group' >
                   <input name="vc_passagers" type='text' class="form-control" placeholder="Camtidad pasajeros" id='date_vigencia'/>
                   <span class="input-group-addon">
                       <i class="glyphicon glyphicon-calendar"></i>
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
                      <input name="vc_ancho" type="number" class="form-control" id="exampleInputEmail1" placeholder="Ancho">
                    </div>
                    <div class="col-md-6">
                      <input name="vc_alto" type="number" class="form-control" id="exampleInputEmail1" placeholder="Alto">
                    </div>
                  </div>
                  <div class="help-block with-errors"></div>
                </div>
              </div>


            </div>
          </div>{{--End row--}}


                            <div class="row">
                              <div class="col-md-12">
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Tipo de carroceria</label>
                                        <div class="input-group">

                                           <select name="typebodywork_id" class="selectpicker show-menu-arrow" data-live-search="true">

                                             @foreach($bodyworks as $bodywork)
                                               <option  value="{{$bodywork->id}}">{{$bodywork->bodywork}}</option>
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
                                         <input name="vc_cylinder" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                         <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                       </div>
                                       <div class="help-block with-errors"></div>
                                     </div>

                                     </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Potencia</label>
                                        <div class='input-group date' >
                                         <input name="vc_power" type='text' class="form-control" id='date_vigencia'/>
                                         <span class="input-group-addon">
                                             <i class="glyphicon glyphicon-calendar"></i>
                                         </span>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                     <div class="form-group">
                                      <label for="exampleInputEmail1">Sillateria</label>
                                       <div class="input-group">
                                         <input name="vc_sillateria" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                         <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                       </div>
                                       <div class="help-block with-errors"></div>
                                     </div>
                                     </div>

                                  </div>
                            </div>{{--End Row--}}
                        {{--End SERVICE LEVEL OF LUJO--}}
                </div> {{--End  box--}}
  </div>
