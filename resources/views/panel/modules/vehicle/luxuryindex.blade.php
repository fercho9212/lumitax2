@extends('panel.modules.vehicle.main')
@section('contenido_principal')

<div class="table-responsive text-center">
    <table class="table table-borderless" id="table">
        <thead>
            <tr>
                <th class="text-center">Placa</th>
                <th class="text-center">Modelo</th>
                <th class="text-center">Motor</th>
                <th class="text-center">Serie</th>
                <th class="text-center">Vin</th>
                <th class="text-center">Color</th>
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

                <th class="text-center">Acción</th>
            </tr>
        </thead>
        @foreach($vehicles as $vehicle)


                <tr class="driver{{$vehicle->id}}">
                <td>{{$vehicle->placa}}</td>
                <td>{{$vehicle->veh_model}}</td>
                <td>{{$vehicle->veh_motor}}</td>
                <td>{{$vehicle->veh_serie}}</td>
                <td>{{$vehicle->veh_vin}}</td>
                <td>{{$vehicle->veh_color}}</td>
                <td>{{$vehicle->typevehicle->type}}</td>
                <td>{{$vehicle->classvehicle->class}}</td>
                <td>{{$vehicle->brandvehicle->brand}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_brakes}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_airbags}}</td>
                <td> @if( $vehicle->vehiclecomplement->vc_head=='1' ) SI @else NO @endif</td>
                <td>{{$vehicle->vehiclecomplement->vc_doors}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_cabin}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_passagers}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_space}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_sillateria}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_cellar}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_cylinder}}</td>
                <td>{{$vehicle->vehiclecomplement->vc_power}}</td>
                <td>{{$vehicle->vehiclecomplement->typebodywork->bodywork}}</td>


                <td>
                      <button  class="update btn btn-info btn-circle-medium" data-id="{{$vehicle->id}}"
                                        data-name="{{$vehicle->placa}}"
                                        data-last="{{$vehicle->veh_model}}"
                                        data-email="{{$vehicle->veh_motor}}"
                                        data-movil="{{$vehicle->veh_serie}}"
                                        data-state="{{$vehicle->veh_vin}}"
                                        data-date="{{$vehicle->veh_vin}}"
                          data-toggle="modal" data-target="#edit_passenger" >
                          <span class="glyphicon glyphicon-edit"></span>
                      </button>
                      <button class="delete-modal btn-circle-medium btn btn-danger" data-id="{{$vehicle->id}}"
                          data-name="{{$vehicle->placa}}">
                          <span class="glyphicon glyphicon-trash"></span>
                      </button>
                  </td>
                </tr>


    @endforeach
    </table>
</div>

@endsection
@section('code_script')
  <script type="text/javascript">
    $('#table').DataTable();
  </script>
@endsection
