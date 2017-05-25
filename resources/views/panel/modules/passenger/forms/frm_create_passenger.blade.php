<form role="form" method="POST" id="add_passenger" action="create_passenger" class="form_entrada">
  <!-- start roe-->
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="row">

      <div class="col-md-12">
          <div class="">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input name="pas_name" type="text"  class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputPassword1">Apellido</label>
                <input name="pas_last" type="text"  class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Correo</label>
                <input name="pas_mail" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
            </div>
          </div>
      </div>
    </div>

    <div class="row">

      <div class="col-md-12">
          <div class="">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Telefono movil</label>
                <input name="pas_movil" type="text"  class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="pas_pwd" type="text"  class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Confirmar Password</label>
                <input  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
            </div>
          </div>
      </div>
    </div>
    <div class="row">

      <div class="col-md-12">

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Estado</label>
                <input name="states_id" type="text"  class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
            </div>

          </div>
      </div>
    </div>

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
  </form>
