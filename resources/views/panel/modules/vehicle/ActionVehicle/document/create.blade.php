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
              @include('panel.modules.vehicle.ActionVehicle.document.form_create')
          </div>
        </div>

 </div>
</div>

<div id="edit_document" class="modal fade" role="dialog">
  <div class="modal-dialog ">
            <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Headedasssr</h4>
          </div>
          <div class="modal-body">
              @include('panel.modules.vehicle.ActionVehicle.document.form_edit')
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
                      <button  class="update btn btn-info " data-id="{{$document->id}}"
                                        data-idvehicle="{{$document->vehicle_id}}"
                                        data-idinsurance="{{$document->insurance_id}}"
                                        data-name_insurance="{{$document->insurance->ins_name}}"
                                        data-description="{{$document->description}}"
                                        data-datei="{{$document->doc_datei}}"
                                        data-datef="{{$document->doc_datef}}"
                                        data-company="{{$document->doc_company}}"
                                        data-policy="{{$document->doc_policy}}"
                          data-toggle="modal" data-target="#edit_document" >
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

                $('#date_ei').datetimepicker({

                  format: 'YYYY-MM-DD'
                });
                $('#date_ef').datetimepicker({

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
//Función que crea
                $('#create_document').on('submit',function(e){
                    e.preventDefault();
                    var url='/documents/store';
                    var idvehicle=$("#idvehicle").val();
                    var data=$(this).serialize();
                    var urlView='/documents/'+idvehicle+'/create'
                    create_in_modal(url,data,urlView);
                });


                $('#edit_document').on("shown.bs.modal", function (event) {

                  var button  = $(event.relatedTarget);
                  var id    = button.data('id');
                  var id_vehicle    = button.data('idvehicle');
                  var id_insurance  = button.data('idinsurance');
                  var name_insurance = button.data('name_insurance');
                  var description   = button.data('description');
                  var date_start    = button.data('datei');
                  var date_end      = button.data('datef');
                  var company       = button.data('company');
                  var policy        = button.data('policy');

                  var modal = $(this);

                  $(".modal-body #insu").prop("selectedIndex", 3);
                  modal.find('.modal-title').html('<h4><center><strong>Seguro : '+name_insurance+'</strong><center><h4>');
                  modal.find('.modal-body #id').val(id);
                  modal.find('.modal-body #idvehicle').val(id_vehicle);//id de documento
                  modal.find('.modal-body #insurance_id').val(id_insurance);
                  modal.find('.modal-body #name_insurance').val(name_insurance);
                  modal.find('.modal-body #description').val(description);
                  modal.find('.modal-body #date_start').val(date_start);
                  modal.find('.modal-body #date_fin').val(date_end);
                  modal.find('.modal-body #company').val(company);
                  modal.find('.modal-body #policy').val(policy);
                  modal.find('.modal-body #test').html(id_insurance);
                  modal.find('.modal-body  ').prop("selectedIndex", id_insurance-1);
                  modal.find($("#insu option[value='"+3+"']").attr('selected', 'selected'));
                  console.log('cambiaaa'+id_insurance)
                  //Crear una function recibiendo el id

                });


            });

</script>
