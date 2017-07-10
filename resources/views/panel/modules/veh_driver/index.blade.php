<div class="row">
<form class="" id="asig_veh_dri" ction="" method="post">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <div class="col-md-12">
    <div class="col-md-6">
      <center><label for="exampleInputEmail1" data-live-search="true">Clase</label></center>
      <div class="input-group">
        <select  name="driver" class="selectpicker show-menu-arrow" data-live-search="true">
          @foreach ($drivers as $driver)
            <option value="{{$driver->id}}">cc:{{$driver->cc}} Nombre:{{$driver->name}}  </option>
          @endforeach
        </select>
      </div>

    </div>
    <div class="col-md-6">
      <center><label for="exampleInputEmail1" data-live-search="true">Vehículos</label></center>
      <div class="input-group">
        <select  name="vehicle" class="selectpicker show-menu-arrow" data-live-search="true">
          @foreach ($vehicles as $vehicle)
            <option value="{{$vehicle->id}}">Placa:{{$vehicle->placa}} Modelo{{$vehicle->model}}</option>
          @endforeach
        </select>
      </div>
    </div>


  <div class="row">

    <div class="col-md-4 col-md-offset-4">
        <br><br>
        <center><button type="submit" class="btn btn-primary">Asignar</button><center>
    </div>
  </div>

  </div><!--Cierra col-md-12-->
</form>
</div>
<div class="table_asign">
  <table class="table">
      <thead>
        <tr>
          <th>Cedula</th>
          <th>Nombre</th>
          <th>Vehicle</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($drivehs as $driveh)
        <tr>
            <td>{{$driveh->dri_cc}}</td>
            <td>{{$driveh->dri_name}}</td>
            <td>j{{$driveh->placa}}  </td>
        </tr>
          @endforeach
      </tbody>
    </table>

</div>

<script>
  $('.selectpicker').selectpicker();
  $('#asig_veh_dri').submit(function(e){
      e.preventDefault();
      var frm=$(this);
      var data=frm.serialize();
      var url='/asig/create'
      $.ajax({
          type:'POST',
          url:url,
          data:data,
          success: function(data){
              loadData('/asig',data);
          },

      });

  });
</script>
