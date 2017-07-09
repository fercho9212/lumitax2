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
