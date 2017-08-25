<div class="col-md-12 col-md-offset-4">
  <!-- Modal -->
  <div id="edit_admin" class="modal fade" role="dialog">
      <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
                @include('panel.modules.admin.edit');
          </div>

      </div>
  </div>


 @include('panel.modules.admin.create')

</div>

<table id="tableadmin" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Creado:</th>
                <th>Tipo de rol</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>

                @foreach ($users as $user)
                  <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->created_at}}</td>
                      <td>{{$user->typesrole->type}}</td>
                      <td>
                          <button class="btn btn-danger" type="button" name="button" onclick="delete_usu({{$user->id}})">
                            <span class="glyphicon glyphicon-trash"></span>
                          </button>
                      </td>
                  </tr>
                @endforeach

        </tbody>
    </table>

<script>
//Inicializa la tabla
var table=$('#tableadmin').DataTable({
  "order": [[ 2, 'desc' ]]
});
$(function(){
      $('#create_user').on('submit',function(e){
          e.preventDefault();
          var data=$(this).serialize();
          var url='/users';
          $.ajax({
              type:"POST",
              url:url,
              datatype:'json',
              data:data,
              beforeSend:function(){
                        $("#contenido_principal").html($("#cargador_empresa").html());
              },
              success: function(data){
                var urlSuccess='/users';
                loadData(urlSuccess,data);
                swal("Registro Insertado!", "You clicked the button!", "success");
              }
        });
      });
      });
      function delete_usu(id){
        var urlDelte='/users/'+id;
        var token=$('input[name=_token]').val();
        var urlSuccess='/users';
        swal({
              title: "Estas seguro?",
              text: "Desea Eliminar el Usuario!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Si, Eliminar!",
              closeOnConfirm: false
      },
      function(){
        ajaxDelete(urlDelte,token,urlSuccess);
      });

    }
      $('#create_user').validator();

</script>
