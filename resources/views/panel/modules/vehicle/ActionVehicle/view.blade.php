<style>
.col-black{
    color:#000000;
    font-weight:bold;
}
</style>

<div class="panel panel-default">
  <div class="panel-heading col-black"><center>Datos del vehiculo</center></div>
  <div class="panel-body">
    <table class="table  table-striped">
      <tbody>
      <tr>
        <td class="col-black">Placa:</td>
        <td>{{$vehicle->placa}}</td>
        <td class="col-black">Modelo</td>
        <td>{{$vehicle->veh_model}}</td>
      </tr>
      <tr>
        <td class="col-black">Color</td>
        <td>{{$vehicle->veh_color}}</td>
        <td class="col-black">Clase</td>
        <td>{{$vehicle->classvehicle->class}}</td>
      </tr>
      <tr>
        <td class="col-black">Marca</td>
        <td>{{$vehicle->brandvehicle->brand}}</td>
        <td class="col-black">Tipo</td>
        <td>{{$vehicle->leveles_id}}</td>
      </tr>
      <tr>
        <td class="col-black">motor</td>
        <td>{{$vehicle->veh_motor}}</td>
        <td class="col-black">Serie</td>
        <td>{{$vehicle->veh_serie}}</td>
      </tr>
      <tr>
        <td class="col-black">Vin</td>
        <td>{{$vehicle->veh_vin}}</td>
        <td class="col-black">Creado</td>
        <td>{{$vehicle->created_at}}</td>
      </tr>
      @if ($vehicle->leveles_id=='2')
        <tr>
          <td class="col-black">Frenos</td>
          <td>{{$vehicle->vehiclecomplement->vc_brakes}}</td>
          <td class="col-black">Air bags</td>
          <td>{{$vehicle->vehiclecomplement->vc_airbags}}</td>
        </tr>
        <tr>
          <td class="col-black">Frenos</td>
          <td>{{$vehicle->vehiclecomplement->vc_brakes}}</td>
          <td class="col-black">Air bags</td>
          <td>{{$vehicle->vehiclecomplement->vc_airbags}}</td>
        </tr>
        <tr>
          <td class="col-black">Frenos</td>
          <td>{{$vehicle->vehiclecomplement->vc_brakes}}</td>
          <td class="col-black">Air bags</td>
          <td>{{$vehicle->vehiclecomplement->vc_airbags}}</td>
        </tr>
        <tr>
          <td class="col-black">Frenos</td>
          <td>{{$vehicle->vehiclecomplement->vc_brakes}}</td>
          <td class="col-black">Air bags</td>
          <td>{{$vehicle->vehiclecomplement->vc_airbags}}</td>
        </tr>
      @endif
    </tbody>
    </table>
  </div>
</div>
