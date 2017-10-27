
<h1></h1>
<div class="table-responsive text-center">
    <table class="table table-striped table-bordered dt-responsive display nowrap" cellspacing="0" width="100%"  id="table">
        <thead>
            <tr>

                <th class="text-center">View</th>
              @if (Auth::user()->typesrole_id==1 || Auth::user()->typesrole_id==2)  <th class="text-center">Action</th> @endif
                <th class="text-center">Placa</th>
                <th class="text-center">Servicio</th>
                <th class="text-center">Modelo</th>
                <th class="text-center">Motor</th>
                <th class="text-center">Serie</th>

                <th class="text-center">Tipo</th>
                <th class="text-center">Clase</th>
                <th class="text-center">Marca</th>
                <th class="text-center">Frenos</th>
                <th class="text-center">Air Bag</th>
                <th class="text-center">Head</th>
                <th class="text-center">Puertas</th>
                <th class="text-center">Cabina</th>
                <th class="text-center">Pasajeros</th>
                <th class="text-center">Space</th>
                <th class="text-center">Sillateria</th>
                <th class="text-center">Bodega</th>
                <th class="text-center">Cilindranje</th>
                <th class="text-center">Potencia</th>
                <th class="text-center">Carrocería</th>
                <th class="text-center">Espacio</th>
                <th class="text-center">Baúl</th>
                <th class="text-center">Medio</th>
                <th class="text-center">Fecha de Registro</th>
            </tr>
        </thead>
        @foreach($vehicles as $vehicle)


                <tr class="driver{{$vehicle->id}}">
                  <td></td>
                  @if (Auth::user()->typesrole_id==1 || Auth::user()->typesrole_id==2)
                    <td>
                      <a href="/vehicles/{{$vehicle->id}}/show">
                      <button   class="update btn btn-warning">
                          <span class="glyphicon glyphicon-edit"></span>
                      </button>
                      </a>

                          <button class="delete-modal  btn btn-danger" data-id="{{$vehicle->id}}"
                              data-name="{{$vehicle->placa}}">
                              <span class="glyphicon glyphicon-trash"></span>
                          </button>
                      </td>
                    @endif
                <td>{{$vehicle->placa}}</td>
                <td><?php
                  if ($vehicle->leveles_id=='1') {
                    echo 'Taxi';
                  }elseif ($vehicle->leveles_id=='2') {
                    echo 'Lujo';
                  }elseif ($vehicle->leveles_id=='3') {
                    echo "Premium";
                  }
                ?></td>
                <td>{{$vehicle->veh_model}}</td>
                <td>{{$vehicle->veh_motor}}</td>
                <td>{{$vehicle->veh_serie}}</td>
                <td>{{$vehicle->typevehicle->type}}</td>
                <td>{{$vehicle->classvehicle->class}}</td>
                <td>{{$vehicle->brandvehicle->brand}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_brakes}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_Airbags}}</td>
                <td> @if( $vehicle->vehiclecomplement->vc_head=='1' ) SI @else NO @endif</td>
                <td>{{$vehicle->vehiclecomplement->vc_doors}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_cabin}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_passagers}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_space}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_sillateria}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_cellar}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_cylinder}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_power}}
                @if (empty($vehicle->vehiclecomplement->typebodywork_id))
                  <td>{{'No registra'}}</td>
                @else
                    <td>{{$vehicle->vehiclecomplement->typebodywork->bodywork}}</td>
                @endif
                <td>{{$vehicle->spacevehicle->size}}</td>
                <td>{{$vehicle->baul->size}}</td>
                <td>{{$vehicle->typeregister->type}}</td>
                <td>{{$vehicle->created_at}}</td>

                </tr>


    @endforeach
    </table>
</div>


  <script type="text/javascript">



    $('#table').DataTable({
      "processing": true,
      "dom": 'lBfrtip',
      "order": [[ 25, "desc" ]],
      "buttons": [
                  {
                      extend: 'collection',
                      text: 'Export',
                      buttons: [
                          'copy',
                          'excel',
                          'csv',
                          'pdf',
                          'print'
                      ]
                  }
              ]
      });

    $(document).on('click', '.delete-modal', function() {


          var id=$(this).data('id');

          swal({
                title: "Estas seguro?",
                text: "Desea Eliminar el Vehículo de lujo!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, Eliminar!",
                closeOnConfirm: false
        },
        function(){

              var urlDelete=  '/vehicles/luxury/'+id;
              var token=      $('input[name=_token]').val();
              var urlView=    '/vehicles/luxury/';
              deleteNormal(urlDelete,token,urlView);

            });
    });
  </script>
