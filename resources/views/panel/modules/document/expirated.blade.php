<div class="reload_table" id="reload-table">
  <br>

  <div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title text-warning"><center>Documentos Vencidos</center></h3>
  </div>
</div>
  <div class="table-responsive text-center">
    <div class="table-responsive text-center">
        <table class="table table-borderless" id="table-docexpirated">
            <thead>
                <tr>
                    <th  h class="text-center">Placa</th>
                    <th class="text-center">Seguro</th>
                    <th class="text-center">Fecha de Expedición</th>
                    <th class="text-center">Fecha de Vencimiento</th>
                    <th class="text-center">Compañia</th>

                </tr>
            </thead>
            @foreach($document as $docu)
                    <tr class="request">
                    <td class="bg-danger"><a href='/vehicles/{{$docu->idv}}/show'>{{$docu->placa}}</a></td>
                    <td >{{$docu->ins_name}}</td>
                    <td>{{$docu->doc_datei}}</td>
                    <td>{{$docu->doc_datef}}</td>
                    <td>{{$docu->doc_company}}</td>

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
var table=$('#table-docexpirated').DataTable( {

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
