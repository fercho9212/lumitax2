@if(session('success'))
    @include('sweet::alert')
@endif
@foreach($errors->all() as $error)
       <div>
          {{$error}}
       </div>
  @endforeach
<form role="form" method="POST" id="add_driver" action="create_driver" class="form_entrada" data-toggle="validator">
  <!-- start roe-->
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="row">

      <div class="col-md-12">
          <div class="">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">NOMBRE</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="dri_name" value="{{$driver->dri_name}}" type="text" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                </div>
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputPassword1">Apellido</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="dri_last" value="{{$driver->dri_last}}" type="text" maxlength="30" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Cedula</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                  <input name="dri_cc" value="{{$driver->dri_cc}}" type="number"  maxlength="10" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                </div>
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>
      </div>
    </div>
  <!-- /.box-roe -->

<!-- start row-->
<div class="row">
  <div class="col-md-12">
      <div class="">
        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputEmail1">Correo</label>
            <div class="input-group">
              <input name="email" value="{{$driver->email}}" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            </div>
          <div class="help-block with-errors"></div>
          </div>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputPassword1">Dirección</label>
            <div class="input-group">
              <input name="dri_address" value="{{$driver->dri_address}}" type="text" maxlength="50" class="form-control" id="exampleInputPassword1" placeholder="Password">
              <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputEmail1">Celular</label>
            <div class="input-group">
              <input name="dri_movil" value="{{$driver->dri_movil}}" type="number" maxlength="12" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<!-- /.box-roe -->

<!-- start row-->
<div class="row">
<div class="col-md-12">
    <div class="">
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputEmail1">Telefono Fijo</label>
          <div class="input-group">
            <input name="dri_phone" value="{{$driver->dri_phone}}" type="text" type="number" maxlength="12" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
        {!! Form::Label('item', 'Item:') !!}
        <select name="state_id" class="custom-select form-control">
          @foreach($states as $state)
              <option value="{{$state->id}}" @if($state->id==$driver->state_id) selected='selected' @endif >{{$state->state}}</option>
          @endforeach
        </select>
      </div>
      </div>
    </div>
</div>
</div>
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
                      <input name="lic_no" value="{{$driver->licence->lic_no}}" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                 <div class="form-group">
                  {!! Form::Label('item', 'Categoria:') !!}
                  <select name="category_id" class="custom-select form-control">
                    <option selected>Seleccione</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($category->id==$driver->licence->category_id) selected='selected' @endif >{{$category->category}}</option>
                    @endforeach
                  </select>
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
                   <select name="type_id" class="custom-select form-control" >
                       {{--
                     @foreach($types as $type)
                       <option  value="{{$type->id}}">{{$type->type}}</option>
                     @endforeach--}}
                     @foreach($types as $type)
                         <option value="{{$type->id}}" @if($type->id==$driver->licence->type_id) selected='selected' @endif >{{$type->type}}</option>
                     @endforeach
                   </select>
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
                    <input name="password" type="text" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
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
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
<script>

  $(function () {
                $('#add_driver').validator();
                $('#date_vigencia').datetimepicker({
                  defaultDate: "2017-06-27",
                  format: 'YYYY-MM-DD'
                });

            });
</script>
