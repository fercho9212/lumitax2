@include('panel.modules.vehicle.ActionVehicle.view.data_vehicle')

<center>
           <button type="button" class=" btn btn-success  " data-toggle="modal" data-target="#createDocument" id="addpassenger" >
             <span class="glyphicon glyphicon glyphicon-plus"> </span> Agregar Seguro
          </button>
</center>
<div id="createDocument" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
            <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
              @include('panel.modules.vehicle.ActionVehicle.document.form')
          </div>
        </div>

 </div>
</div>

<div class="table-responsive text-center">
    <table class="table table-borderless" id="table">
        <thead>
            <tr>
                <th class="text-center">Seguro</th>
                <th class="text-center">Desde</th>
                <th class="text-center">Hasta</th>
                <th class="text-center">Proveedor</th>
                <th class="text-center">No Poliza</th>
                <th class="text-center">Acción</th>
            </tr>
        </thead>
        @foreach($documents as $document)


                <tr class="driver{{$document->id}}">
                <td>{{$document->insurance->ins_name}}</td>
                <td>{{$document->doc_datei}}</td>
                <td>{{$document->doc_datef}}</td>
                <td>{{$document->doc_company}}</td>
                <td>{{$document->doc_policy}}</td>


                <td>
                      <button  class="update btn btn-info btn-circle-medium" data-id="{{$document->id}}"
                                        data-name="{{$document->insurance->ins_name}}"
                                        data-movil="{{$document->doc_datei}}"
                                        data-state="{{$document->doc_datef}}"
                                        data-date="{{$document->doc_company}}"
                          data-toggle="modal" data-target="#edit_passenger" >
                          <span class="glyphicon glyphicon-edit"></span>
                      </button>
                      <button class="delete-modal btn btn-danger" href="javascript:void(0);" data-idv="{{$id}}" data-id="{{$document->id}}"
                          >
                          <span class="glyphicon glyphicon-trash"></span>
                      </button>
                  </td>
                </tr>


    @endforeach
    </table>
</div>



<script>

  $(function () {
                //$('form').validator();
                $('#date_i').datetimepicker({

                  format: 'YYYY-MM-DD'
                });
                $('#date_f').datetimepicker({

                  format: 'YYYY-MM-DD'
                });

                $('.selectpicker').selectpicker();

                //Inicializa la tabla
                $('#table').DataTable();
                $(document).on('click', '.delete-modal', function() {


                      var id=$(this).data('id');
                      var idvehicle=$(this).data('idv');

                      swal({
                            title: "Estas seguro?",
                            text: "Desea Eliminar el Documento!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Si, Eliminar!",
                            closeOnConfirm: false
                    },
                    function(){

                          var urlDelete=  '/documents/'+id+'/delete';
                          var token=      $('input[name=_token]').val();
                          var urlView=    '/documents/'+idvehicle+'/create'
                          ajaxDelete(urlDelete,token,urlView);

                        });
                });


            });

</script>
