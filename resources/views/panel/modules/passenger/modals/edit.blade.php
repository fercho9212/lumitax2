

<div class="modal fade" id="edit_passenger" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar</h4>
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
                      <input id="name" tabindex="1" name="pas_name" type="text" maxlength="30" class="form-control"  placeholder="Enter name" required>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Apellido</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input id='last' tabindex="2" name="pas_last" type="text" maxlength="30" class="form-control"  placeholder="Enter last" required>
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
                      <input tabindex="3" name="email" type="text" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Telefono Movil</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input tabindex="4" name="pas_movil" type="text" maxlength="30" class="form-control" id="exampleInputPassword1" placeholder="Telefono movíl" required>
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
                      <input tabindex="5" name="password" type="password" data-minlength="6" class="form-control"id="inputPassword" placeholder="Password" required readonly
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
                      <input tabindex="6" name="password" type="text" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
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
                <button  type="submit"   class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

        </div>
    </div>
  </div>
</div>
<script type="text/javascript">

  $(document).ready(function(){
    $('#edit_passenger').on("shown.bs.modal", function (event) {
        var button  = $(event.relatedTarget);
        var name    = button.data('name');
        var last    = button.data('last');
        var movil   = button.data('movil');
        var email   = button.data('email');
        var state   = button.data('state');
        console.log(name+last);
        var modal = $(this)
        modal.find('.modal-title').html('<center>Renovar : '+name+'<center>');
      //  modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);//id de documento
        modal.find('.modal-body #last').val(last);


    });

    $('#create_passenger').validator();
      $('#create_passenger').on('submit',function(e){
          e.preventDefault();
          var url='/passengers';
          var frm=$(this);
          var data=frm.serialize();
          $.ajax({
                type: "POST",
                url : url,
                datatype:'json',
                data : frm.serialize(),
                beforeSend:function(){
                        $("#contenido_principal").html($("#cargador_empresa").html());
                },
                success : function(resul){
                        $("#body").removeClass("modal-open");
                        $("#contenido_principal").html(resul);
                        $("#create_passenger").trigger("reset");

                        //$('#frmpassenger').modal('hide');
              },
                error:function(data){
                      console.log('Error '+data);
                    }
              });

      });


  });
</script>
