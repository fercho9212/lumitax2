<style>
table{
  table-layout: fixed;
}

#miTablaPersonalizada th{
  width: 130px;
  overflow: auto;
  border: 1px solid;
}
</style>


    <table  id="miTablaPersonalizada" style="width:100%" class="table table-condensed">
      <tbody>
        <tr>
          <td  class="col-black">Placa:</td>
          <td>{{$vehicle->placa}}</td>
          <td class="col-black">Modelo</td>
          <td>{{$vehicle->veh_model}}</td>
          <td class="col-black">Marca</td>
          <td>{{$vehicle->brandvehicle->brand}}</td>
        </tr>
        <tr>
          <td class="col-black">Tipo</td>
          <td>{{$vehicle->leveles_id}}</td>
          <td class="col-black">Color</td>
          <td>{{$vehicle->veh_color}}</td>
          <td class="col-black">Clase</td>
          <td>{{$vehicle->classvehicle->class}}</td>
        </tr>
      </tbody>
    </table>
