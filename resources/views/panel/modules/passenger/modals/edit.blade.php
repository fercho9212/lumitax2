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
                      <input  name="email" type="text" tabindex="3" maxlength="30" class="form-control" id="email" placeholder="Enter email" >
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
                  <div class="form-group">
                    <label for="input" >Nueva contraseña</label>
                      <div class="input-group ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="form-control" id="password" type="password" name="password" data-minLength="5" data-error="some error" required/>
                      </div>
                      <div class="help-block with-errors"></div>
                   </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="input" >Password</label>
                       <div class="input-group ">
                         <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                         <input class="form-control " id="password2" type="password" name="password2" data-match="#password" data-minLength="5" data-match-error="some error 2"  required/>
                       </div>
                     <div class="help-block with-errors"></div>
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
                <button  type="submit"  id="send" class="btn btn-primary">Submit</button>
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
        $("body").removeClass("modal-open");
        $("body").css({"padding-right":"0px"});

        var button  = $(event.relatedTarget);
        var id    = button.data('id');
        var name    = button.data('name');
        var last    = button.data('last');
        var movil   = button.data('movil');
        var email   = button.data('email');
        var state   = button.data('state');
        console.log(name+last);
        var modal = $(this);
        modal.find('.modal-title').html('<center>Renovar : '+name+'<center>');
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);//id de documento
        modal.find('.modal-body #last').val(last);
        modal.find('.modal-body #movil').val(movil);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #state').val(state);
        modal.find('.modal-body #password').val();
    });

    $('form').validator();
      $('#send').click(function(e){
        var frm=$(this);
        var id=$('#id').val();
        var url='/passengers/'+id;
        var data=$("form").serialize();
        console.log(data);
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
                                  loadData(url,data);
                      });

                  $.each( data.error, function( key, value ) {
                         console.log(value);
                        });
                }

            },
        });
      });

  });
</script>
