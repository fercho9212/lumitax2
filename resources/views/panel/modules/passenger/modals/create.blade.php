<div class="modal fade" id="frmpassenger"  role="dialog" >
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
                      <input tabindex="1" name="pas_name" type="text" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Apellido</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input tabindex="2" name="pas_last" type="text" maxlength="30" class="form-control" id="exampleInputPassword1" placeholder="Enter last" required>
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
                      <input tabindex="3" name="email" type="email" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Telefono Movil</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input tabindex="4" name="pas_movil" type="number" min="0" maxlength="30" class="form-control" id="exampleInputPassword1" placeholder="Telefono movíl" required>
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
                      <input tabindex="6" name="password" type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
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
                <button  type="submit"   class="btn btn-primary">Guardar</button>
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
                success : function(data){
                        if (data.msg=='success') {
                                  //$('#frmpassenger').modal('hide');
                                  loadData(url,data);
                                  swal("Registro Insertado!", "You clicked the button!", "success")
                        }else {
                          console.log('eRROR Validator');
                          swal({
                                title: "Se encontraron los siguientes errores",
                                text:   $.each( data.error, function( key, value ) {
                                            "<p style='color: red'>"+value+"</p>"
                                              }),
                                confirmButtonText: "intentar nuevamente!",
                                confirmButtonClass: "btn-danger",
                                type: "warning",
                                showConfirmButton: true
                              },function(){
                                          loadData(url,data);
                              });

                          $.each( data.error, function( key, value ) {
				                         console.log(value);
			                          });
                          //console.log(data.error);
                        }
                        //$('#frmpassenger').modal('hide');
              },//end success
                error:function(data){
                      console.log('Error '+data);
                    }
              });//End Ajax

      });


  });


</script>
