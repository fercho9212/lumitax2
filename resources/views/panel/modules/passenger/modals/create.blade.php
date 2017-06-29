<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">

            <form role="form" method="POST" id="create_passenger" action="create_driver" class="create_passenger" data-toggle="validator">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input name="pas_name" type="text" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Apellido</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input name="pas_last" type="text" maxlength="30" class="form-control" id="exampleInputPassword1" placeholder="Enter last" required>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Correo</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input name="email" type="text" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Telefono Movil</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input name="pas_movil" type="text" maxlength="30" class="form-control" id="exampleInputPassword1" placeholder="Telefono movíl" required>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

              </div>
              <div class="box box-primary">
              <div class="box-header with-border">
                <center><h3 class="box-title">Datos de Acceso</h3><center>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contraseña</label>
                    <div class="input-group">
                      <input name="password" type="password" data-minlength="6" class="form-control"id="inputPassword" placeholder="Password" required readonly
                            onfocus="this.removeAttribute('readonly');">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    </div>
                     <div class="help-block">Minimum of 6 characters</div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Repetir Contraseña</label>
                    <div class="input-group">
                      <input name="password" type="text" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    </div>
                  </div>
                </div>
              </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      {!! Form::Label('item', 'Estado:') !!}
                      <select name="state_id" class="custom-select form-control">
                        <option selected>Seleccione</option>
                        @foreach($states as $state)
                          <option  value="{{$state->id}}">{{$state->state}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

        </div>
    </div>
  </div>
</div>
<script type="text/javascript">

  $(document).ready(function(){
    $('#create_passenger').validator();
      $('#table').DataTable();
    $(document).on("submit",".create_passenger",function(e){
        e.preventDefault();
        var url='/passengers';
        var frm=$(this);
        var data=frm.serialize();
        $.ajax({

              type: "POST",
              url : url,
              datatype:'json',
              data : frm.serialize(),
              success : function(resul){
                      $("#contenido_principal").html(resul);
            },
              error:function(data){
                    console.log('Error '+data);
              }
              });
    });

  });
</script>
