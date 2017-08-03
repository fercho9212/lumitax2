<div class="col-md-12 col-md-offset-4">
  <!-- Modal -->
  <div id="edit_insurance" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
          <form id="edit_insurance"  method="post">
        <div class="modal-body">

          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <input type="hidden" name="id" id="id">

           <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NOMBRE DE SEGURO</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input name="ins_name" type="text" maxlength="30" class="form-control" id="name" placeholder="Enter email" required>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">CÓDIGO DE SEGURO</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input name="ins_code" type="text" maxlength="30" class="form-control" id="code" placeholder="Enter email" required>
                  </div>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="comment">DESCRIPCIÓN</label>
                    <textarea name="ins_description" class="form-control" rows="2" id="description"></textarea>
                  </div>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button  type="submit"  id="sendI" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>

    </div>
  </div>


<form id="create_insurance" action="#" method="post">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
 <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputEmail1">NOMBRE DE SEGURO</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="ins_name" type="text" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">CÓDIGO DE SEGURO</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input name="ins_code" type="text" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
        </div>
        <div class="help-block with-errors"></div>
      </div>
    </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="comment">DESCRIPCIÓN</label>
          <textarea name="ins_description" class="form-control" rows="2" id="comment"></textarea>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <center><input type="submit" name="" class="btn btn-primary" value="Send"><center>
        </div>
      </div>
    </div>


  </form>

</div>
<table id="tableI" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Insurance</th>
                <th>Code</th>
                <th>Descripction</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>

                @foreach ($insurances as $insurce)
                  <tr>
                      <td>{{$insurce->ins_name}}</td>
                      <td>{{$insurce->ins_code}}</td>
                      <td>{{$insurce->ins_description}}</td>
                      <td>
                          <button type="button" name="button" data-id="{{$insurce->id}}"
                                                              data-name="{{$insurce->ins_name}}"
                                                              data-code="{{$insurce->ins_code}}"
                                                              data-description="{{$insurce->ins_description}}"
                                                              data-toggle="modal" data-target="#edit_insurance">
                                                              Editar</button>
                          <button type="button" name="button" onclick="delete_insu({{$insurce->id}})">Eliminar</button>
                      </td>
                  </tr>
                @endforeach

        </tbody>
    </table>

<script>
//Inicializa la tabla
$('#tableI').DataTable();
$(function(){
      $('#create_insurance').on('submit',function(e){
        e.preventDefault();
        var data=$(this).serialize();
        var url='insurance';
        $.ajax({
            type:"POST",
            url:url,
            datatype:'json',
            data:data,
            success: function(data){
              if (data.msg=='success') {
                var urlSuccess='/insurance/create/';
                loadData(urlSuccess,data);
                swal("Registro Insertado!", "You clicked the button!", "success");
              }
            }
        });
      });
      $('#edit_insurance').on("shown.bs.modal", function (event) {
        $("body").removeClass("modal-open");
        $("body").css({"padding-right":"0px"});
            var button  = $(event.relatedTarget);
            var id=button.data('id');
            var code=button.data('code');
            var name=button.data('name');
            var description=button.data('description');
            console.log("dasdas"+name);
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #code').val(code);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #description').val(description);
      });
      $('#sendI').click(function(e){
          e.preventDefault();
          var data=$("form#edit_insurance").serialize();
          var id=$('#id').val();
          var url='/insurance/'+id;

          $.ajax({
                type:'PUT',
                data:data,
                url:url,
                datatype:'json',
                success:function(data){
                  if (data.rpt=='success') {
                    loadData('/insurance',data);
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


                  }

          });

      });

      function delete_insu(id){
        var urlDelte='/insurance'
        var toke='';
        var urlSuccess='/insurance/create';
        ajaxDelete(urlDelte,token,urlSuccess);
      }
      });
</script>
