<style>

</style>

<div class="panel panel-default">
  <div class="panel-heading col-black"><center>Datos del vehiculo</center></div>
  <br><br>


    <div class="panel-body">
      <div class="col-md-8  col-md-offset-2">
        <div class="row">
          <strong>DATOS BASICOS</strong>
      <table class="table table-bordered" >


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
      </tbody>
      </table>
  </div>

</div>
@if ($vehicle->leveles_id=='2' or $vehicle->leveles_id=='3')
    <div class="col-md-10  col-md-offset-1">
      <div class="row">
            <br>
            <center><strong>DATOS SERVICIO LUJO</strong><center>
              <br>
                <table class="table table-bordered" >

                  <tbody>
                      <tr>
                        <td class="col-black">Frenos</td>
                        <td>{{$vehicle->vehiclecomplement->vc_brakes}}</td>
                        <td class="col-black">Bolsas de aire</td>
                        <td>{{$vehicle->vehiclecomplement->vc_Airbags}}</td>

                        <td class="col-black">Cabecera</td>
                        <td>{{$vehicle->vehiclecomplement->vc_head}}</td>
                        <td class="col-black">Puertas</td>
                        <td>{{$vehicle->vehiclecomplement->vc_doors}}</td>
                      </tr>
                      <tr>
                        <td class="col-black">Cabina</td>
                        <td>{{$vehicle->vehiclecomplement->vc_cabin}}</td>
                        <td class="col-black">Cant Pasajeros</td>
                        <td>{{$vehicle->vehiclecomplement->vc_passagers}}</td>

                        <td class="col-black">Espacio</td>
                        <td>{{$vehicle->vehiclecomplement->vc_space}}</td>
                        <td class="col-black">Sillateria</td>
                        <td>{{$vehicle->vehiclecomplement->vc_sillateria}}</td>
                      </tr>
                      <tr>
                        <td class="col-black">Bodega</td>
                        <td>{{$vehicle->vehiclecomplement->vc_cellar}}</td>
                        <td class="col-black">Cilindraje</td>
                        <td>{{$vehicle->vehiclecomplement->vc_cylinder}}</td>

                        <td class="col-black">Potencia</td>
                        <td>{{$vehicle->vehiclecomplement->vc_power}}</td>
                        @if (empty($vehicle->vehiclecomplement->typebodywork_id))
                          <td>{{'No registra'}}</td>
                        @else
                            <td>{{$vehicle->vehiclecomplement->typebodywork->bodywork}}</td>
                        @endif
                      </tr>
              </tbody>
             </table>
           </div>
         </div>
              @endif

    </div>


</div>
