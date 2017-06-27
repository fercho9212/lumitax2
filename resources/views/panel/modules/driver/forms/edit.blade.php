<form role="form" method="POST" id="add_driver" action="create_driver" class="form_entrada">
  <!-- start roe-->
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="row">
      <h1>{{$driver->dri_name}}</h1>
      <div class="col-md-12">
          <div class="">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">nombre</label>
                <input name="dri_name" value="{{$driver->dri_name}}" type="text"  class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputPassword1">Apellido</label>
                <input name="dri_last"  value="{{$driver->dri_last}}" type="text"  class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Cedula</label>
                <input name="dri_cc"  value="{{$driver->dri_cc}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
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
            <input name="email"  value="{{$driver->email}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputPassword1">Dirección</label>
            <input name="dri_address"  value="{{$driver->dri_address}}" type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputEmail1">Celular</label>
            <input name="dri_movil"  value="{{$driver->dri_movil}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
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
          <input name="dri_phone"  value="{{$driver->dri_phone}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
        {!! Form::Label('item', 'Item:') !!}
        <select name="state_id" class="custom-select form-control">


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
                    <input name="lic_no" value="{{$driver->licence->lic_no}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                </div>
                <div class="col-md-4">
                 <div class="form-group">
                  {!! Form::Label('item', 'Categoria:') !!}
                  <select name="category_id" class="custom-select form-control">
                    <option selected>Seleccione</option>

                  </select>
                 </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Vigencia</label>
                    <input name="lic_validity" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
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
                  <input name="password" value="{{$driver->password}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Repetir Contraseña</label>
                  <input name="password" type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
