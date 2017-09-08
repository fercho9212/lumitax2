<style>
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
<div class="reload_table" id="reload-table">
  <div class="table-responsive text-center">
    <div class="table-responsive text-center">
        <table class="table table-borderless" id="table-rq">
            <thead>
                <tr>
                    <th  h class="text-center">No Service</th>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Apellido</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Fecha solicitud</th>

                </tr>
            </thead>
            @foreach($users as $user)
                    <tr class="request{{$user->id}}">
                    <td>{{$user->id}}</td>
                    <td>{{$user->pas_name}}</td>
                    <td>{{$user->pas_last}}</td>
                    <td>{{$user->state}}</td>
                    <td>{{$user->created_at}}</td>

                  <!--  <td>

                          <button   class="btn-circle-medium btn btn-danger" data-toggle="modal"  data-target="#dataDelete" onclick="del_tjopt({{--$dv->id--}})">
                              <span class="glyphicon glyphicon-trash"></span>
                          </button>
                    </td> -->
                    </tr>
        @endforeach
        </table>
      </div>
    </div>
</div>
<script>
var table=$('#table-rq').DataTable( {

  "dom": 'lBfrtip',
  "order": [[ 4, "desc" ]],
  "buttons": [
              {
                  extend: 'collection',
                  text: 'Exportar',
                  buttons: [
                      'copy',
                      'excel',
                      'pdf',
                      'print'
                  ],
                  className: 'btn btn-info',
              }
          ],
        } );
</script>
