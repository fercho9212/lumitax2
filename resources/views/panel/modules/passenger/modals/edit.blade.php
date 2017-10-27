<div class="modal fade" id="edit_passenger" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar</h4>
          </div>
          <div class="modal-body">

            <form role="form" method="POST" id="edit_passenger" action="create_driver" class="create_passenger" data-toggle="validator">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" id='id' name="id" value="">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input id="name"  value="No data" tabindex="1" name="pas_name" type="text" maxlength="30" class="form-control"  placeholder="Enter name" >
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example">Apellido</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input id='last' value="No data" tabindex="2" name="pas_last" type="text" maxlength="30" class="form-control"  placeholder="Enter last" required>
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
                      <input  name="email" type="email" maxlength="30"  maxlength="30" class="form-control" id="email" placeholder="Enter email" required >
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example">Telefono Movil</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input name="pas_movil" type="text" tabindex="4"  maxlength="30" class="form-control" id="movil" placeholder="Telefono movíl" >
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
                  <label for="exampleInputEmail1">Contraseña</label>
                  <div class="input-group">
                    <input name="password" type="password" data-minlength="6" class="form-control" id="inputPassword" readonly
                        onfocus="this.removeAttribute('readonly');" placeholder="Password" >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  </div>
                   <div class="help-block">Minimum of 6 characters</div>
                   </div>

                   <div class="col-md-6">
                     <div class="form-group">
                       <label for="exampleInputPassword1">Repetir Contraseña</label>
                       <div class="input-group">
                         <input name="confiPass" type="password" class="form-control" id="inputPasswordConfirm"   data-match-error="Whoops, these don't match" placeholder="Confirm password">
                         <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                       </div>
                     </div>
                     <div class="help-block">Minimum of 6 characters</div>
                   </div>
                </div>
              </div>

                <div class="row">
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3" id="state">
                      {!! Form::Label('item', 'Estado:') !!}
                      <select name="state_id" class="custom-select form-control">

                        @foreach($states as $state)
                          <option   value="{{$state->id}}">{{$state->state}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button  type="submit"  id="send" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(function () {
          $('#edit_passenger').validator();
          $("input[name=password]").change(function () {
            $("input[name=confiPass]").prop('required',true);
          });
      });

    $('#edit_passenger').on("shown.bs.modal", function (event) {
        $("body").removeClass("modal-open");
        $("body").css({"padding-right":"0px"});

        var button  = $(event.relatedTarget);
        var id    = button.data('id');
        var name    = button.data('name');
        var last    = button.data('last');
        var movil   = button.data('movil');
        var email   = button.data('email');
        var state   = button.data('state');
        console.log('dsds'+state);
        var modal = $(this);
        modal.find('.modal-title').html('<center>Renovar : '+name+'<center>');
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);//id de documento
        modal.find('.modal-body #last').val(last);
        modal.find('.modal-body #movil').val(movil);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #state select').val(state);
        modal.find('.modal-body #password').val();
    });

      $('#send').click(function(e){

        var frm=$(this);
        var id=$('#id').val();
        var url='/passengers/'+id;
        var urlerror='/passengers/';
        var data=$("form").serialize();
        $.ajax({
              type: 'PUT',
              url: url,
              datatype:'json',
              data : data,
              success : function(data){
                if (data.rpt=='success') {
                  loadData('/passengers',data);
                  swal("Registro actualizado!", "You clicked the button!", "success")
                }else {
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
                                  loadData(urlerror,data);
                      });

                  $.each( data.error, function( key, value ) {
                         console.log(value);
                        });
                }

            },
        });
      });
</script>
