<form role="form" method="POST" id="add_driver" action="create_driver" class="form_entrada">
  <!-- start roe-->
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="row">

      <div class="col-md-12">
          <div class="">
            <div class="col-md-4">
              <div class="form-group">
<<<<<<< HEAD
                <label for="exampleInputEmail1">Naombre</label>
=======
                <label for="exampleInputEmail1">Nombre</label>
>>>>>>> 63a498a15c6f07a5bea8cc3cda77dae5c1433fdc
                <input name="dri_name" type="text"  class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputPassword1">Apellido</label>
                <input name="dri_last" type="text"  class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Cedula</label>
                <input name="dri_cc" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
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
<<<<<<< HEAD
            <input name="email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
=======
            <input name="dri_mail" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
>>>>>>> 63a498a15c6f07a5bea8cc3cda77dae5c1433fdc
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputPassword1">Dirección</label>
            <input name="dri_address" type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputEmail1">Celular</label>
            <input name="dri_movil" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
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
          <input name="dri_phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputPassword1">Estado</label>
          <input name="states_id" type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
                    <input name="lic_no" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Categoria</label>
                    <input name="linccat_id" type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
                    <label for="exampleInputEmail1">Typo</label>
                    <input name="linctype_id" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
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
<<<<<<< HEAD
                  <input name="password" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
=======
                  <input name="dri_psw" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
>>>>>>> 63a498a15c6f07a5bea8cc3cda77dae5c1433fdc
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Repetir Contraseña</label>
<<<<<<< HEAD
                  <input name="password" type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
=======
                  <input name="" type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
>>>>>>> 63a498a15c6f07a5bea8cc3cda77dae5c1433fdc
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
