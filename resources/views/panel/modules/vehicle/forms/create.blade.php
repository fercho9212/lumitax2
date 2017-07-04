@extends('panel.modules.vehicle.main')
@section('create-vehicle')
  <form role="form" method="POST" id="create_passenger" action="create_driver" class="form_entrada" >

    <!--Service Especial-->
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="row">
        <div class="col-md-12">
            <div class="">
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
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Modelo</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input name="dri_name" type="text" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
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
        <div class="">
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
                <input name="dri_address" type="text" maxlength="50" class="form-control" id="exampleInputPassword1" placeholder="Password">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Marca</label>
              <div class="input-group">
                <input name="dri_movil" type="number" maxlength="12" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>{{--End row--}}
  <!-- /.box-roe -->

  <!-- start row-->
  <div class="row">
  <div class="col-md-12">
      <div class="">
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
          <div class="form-group">
            <label for="exampleInputEmail1">Nivel de servicio</label>
            <div class="input-group">
              <input name="dri_phone" type="text" type="number" maxlength="12" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
            </div>
        </div>
        </div>
      </div>
  </div>
  </div>{{--End row--}}
  <!-- /.box-roe -->
  <!-- /.Start Panel Licence -->
  <!-- FIN SERVICE ESPECIAL-->
  <br>
  <br>
  <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">SERVICIO DE LUJO</h3>
          </div>

          <!-- /.Start Panel Licence -->
          <!-- FIN SERVICE LUJO-->

          <div class="row">
            <div class="col-md-12">
                <div class="">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Numero de Licencia</label>
                      <div class="input-group">
                        <input name="lic_no" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Frenoss</label>
                     <div class="input-group">
                       <input name="lic_no" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                       <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                     </div>
                   </div>
                   </div>
                   <div class="col-md-4">
                     <div class="form-group">
                       <label for="exampleInputEmail1">Cantidad Air bags</label>
                       <div class='input-group date' >
                        <input name="lic_validity" type='text' class="form-control" id='date_vigencia'/>
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                       </div>
                     </div>
                   </div>
                  </div>
                </div>
               </div>{{--End row--}}


                  <div class="row">
                    <div class="col-md-12">
                        <div class="">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Apoyacabezas</label>
                              <div class="input-group">
                                <input name="lic_no" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                           <div class="form-group">
                            <label for="exampleInputEmail1">Puertas Laterales</label>
                             <div class="input-group">
                               <input name="lic_no" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                               <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                             </div>
                           </div>
                           </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Tipo de cabina</label>
                              <div class='input-group date' >
                               <input name="lic_validity" type='text' class="form-control" id='date_vigencia'/>
                               <span class="input-group-addon">
                                   <i class="glyphicon glyphicon-calendar"></i>
                               </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>{{--End row--}}

                          <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Capacidad de Pasajeros</label>
                                      <div class="input-group">
                                        <input name="lic_no" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                   <div class="form-group">
                                    <label for="exampleInputEmail1">Espacio Minímo</label>
                                     <div class="input-group">
                                       <input name="lic_no" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                       <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                     </div>
                                   </div>

                                   </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Sillateria de 750</label>
                                      <div class='input-group date' >
                                       <input name="lic_validity" type='text' class="form-control" id='date_vigencia'/>
                                       <span class="input-group-addon">
                                           <i class="glyphicon glyphicon-calendar"></i>
                                       </span>
                                      </div>
                                    </div>
                                  </div>
                                    </div>
                              </div>{{--End row--}}



                                        <div class="row">
                                          <div class="col-md-12">
                                              <div class="">
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label for="exampleInputEmail1">Capacidad:bodega</label>
                                                    <div class="input-group">
                                                      <input name="lic_no" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                                      <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-md-4">
                                                 <div class="form-group">
                                                  <label for="exampleInputEmail1">Tipo de Carroceria</label>
                                                   <div class="input-group">
                                                     <input name="lic_no" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                                     <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                                   </div>
                                                 </div>
                                                    {{--
                                                  {!! Form::Label('item', 'Categoria:') !!}
                                                  <select name="category_id" class="custom-select form-control">
                                                    <option selected>Seleccione</option>
                                                    @foreach($categories as $category)
                                                      <option  value="{{$category->id}}">{{$category->category}}</option>
                                                    @endforeach
                                                  </select>
                                                  --}}
                                                 </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label for="exampleInputEmail1">Cilindraje</label>
                                                    <div class='input-group date' >
                                                     <input name="lic_validity" type='text' class="form-control" id='date_vigencia'/>
                                                     <span class="input-group-addon">
                                                         <i class="glyphicon glyphicon-calendar"></i>
                                                     </span>
                                                    </div>
                                                  </div>
                                                </div>

                                              </div>
                                        </div>{{--End Row--}}
                                    </div>{{--End SERVICE LEVEL OF LUJO--}}

  <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Datos de Acceso</h3>
          </div>

          <div class="row">
          <div class="col-md-12">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          </div>
  </div>
@endsection
