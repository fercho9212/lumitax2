@if(session('success'))
    @include('sweet::alert')
@endif
@foreach($errors->all() as $error)
       <div>
          {{$error}}
       </div>
  @endforeach
<style>
#myDropzone{

  padding:5px;
  border-style:dashed;
  border-color:#2c003a;
  border-width:2px;
  background-color:#fdfbfb;
  color:#462a51;
}
</style>


  <!-- Change /upload-target to your upload address -->


<form role="form" method="POST" id="create_driver" action="create_driver" class="form_i" data-toggle="validator" enctype="multipart/form-data" data-toggle="validator">
  <!-- start roe-->
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

    <div class="row">

      <div class="col-md-12">

            <div class="col-md-9">

              <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nombre</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="dri_name" type="text" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required>
                          </div>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Apellido</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="dri_last" type="text" maxlength="30" class="form-control" id="exampleInputPassword1" placeholder="Enter last" required>
                          </div>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>


              </div>

              <div class="row">


                  <div class="col-md-6">

                      <div class="form-group">
                        <label for="exampleInputEmail1">Cédula</label>
                        <div class="input-group">
                          <input name="dri_cc" type="number" min="0" class="form-control" id="exampleInputEmail1" placeholder="Enter identification" required>
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        </div>
                      <div class="help-block with-errors"></div>
                      </div>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                    </div>


                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Correo</label>
                        <div class="input-group">
                          <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        </div>
                      <div class="help-block with-errors"></div>
                      </div>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                    </div>


              </div>

              <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Dirección</label>
                  <div class="input-group">
                    <input name="dri_address" type="text" maxlength="50" class="form-control" id="exampleInputPassword1" placeholder="Enter address" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                  </div>
                  <div class="help-block with-errors"></div>
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Número: Celular</label>
                  <div class="input-group">
                    <input name="dri_movil" type="number" min="0" maxlength="12" class="form-control" id="exampleInputEmail1" placeholder="Enter Cell phone" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                  </div>
                  <div class="help-block with-errors"></div>
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
              </div>

            </div>

            <div class="row">


              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Telefono Fijo</label>
                  <div class="input-group">
                    <input name="dri_phone" type="text" type="number" maxlength="12" class="form-control" id="exampleInputEmail1" placeholder="Enter phone" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                  </div>
                  <div class="help-block with-errors"></div>
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
              </div>
              <div class="col-md-6">

                  <div class="form-group">
                  {!! Form::Label('item', 'Estado:') !!}
                  <select name="state_id"  data-trigger="change"  class="custom-select form-control selectpicker" data-live-search="true" required>
                    <option value="">Seleccione...</option>
                    @foreach($states as $state)
                      <option  value="{{$state->id}}">{{$state->state}}</option>
                    @endforeach
                  </select>
                  <div class="help-block with-errors"></div>
                </div>

              </div>
            </div>

            </div>


            <div class="col-md-3">
              <br><br>
              <center>
              <label for="exampleInputEmail1">Foto</label>
              <div class="dropzone" id="myDropzone">
              </div>
            </center>
            </div>

      </div>

</div>
<!-- /.box-roe -->

<!-- start row-->


<!-- /.box-roe -->
<!-- /.Start Panel Licence -->
<br>
<br>
<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Licencia de Conducción</h3>
        </div>
        <div class="row">
          <div class="col-md-12">
              <div class="">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Numero de Licencia</label>
                    <div class="input-group">
                      <input name="lic_no" type="number" min="0" class="form-control" id="exampleInputEmail1" placeholder="Enter License" required>
                      <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>

                </div>
                <div class="col-md-4">
                 <div class="form-group">
                  {!! Form::Label('item', 'Categoria:') !!}
                  <select name="category_id" class="custom-select form-control selectpicker" data-live-search="true" required>
                    <option value="">Seleccione...</option>
                    @foreach($categories as $category)
                      <option  value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                  </select>
                  <div class="help-block with-errors"></div>
                 </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Vigencia</label>
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
        </div>
        <!-- start row-->
        <div class="row">
          <div class="col-md-12">
              <div class="">
                <div class="col-md-4">
                  <div class="form-group">
                   {!! Form::Label('item', 'Typo:') !!}
                   <select name="type_id" class="custom-select form-control selectpicker"  required>
                     <option value="" selected="selected">Seleccio..</option>
                     @foreach($types as $type)
                       <option  value="{{$type->id}}">{{$type->type}}</option>
                     @endforeach
                   </select>
                   <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      <!-- /.box-roe -->


</div>

<br>
<br>
<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Datos de Acceso</h3>
        </div>
        <div class="row">
        <div class="col-md-12">
            <div class="">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Contraseña</label>
                  <div class="input-group">
                    <input name="password" type="password" data-minlength="6" class="form-control"id="inputPassword" placeholder="Password" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  </div>
                   <div class="help-block">Minimum of 6 characters</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Repetir Contraseña</label>
                  <div class="input-group">
                    <input name="password" type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm password" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>
</div>
<!-- /.End panel Licence -->
  <div class="box-footer">
    <button type="submit" id="submit-all" class="btn btn-primary">GUARDAR</button>
  </div>
</form>


<script src="{{ asset('/js/modules/driver_create.js') }}" type="text/javascript"></script>
