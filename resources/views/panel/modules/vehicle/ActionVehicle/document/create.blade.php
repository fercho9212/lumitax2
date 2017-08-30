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
            <h4 class="modal-title">Editar</h4>
          </div>
          <div class="modal-body">
              @include('panel.modules.vehicle.ActionVehicle.document.form_edit')
          </div>
        </div>
 </div>
</div>
<div id="docu">
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
</div>
