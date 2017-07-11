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
<div class="table_asign table table-borderless">
  <table class="table" id="asig_drvh">
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
            <td>{{$driveh->placa}}  </td>
            <th><button data-id='{{$driveh->id}}' data-placa='{{$driveh->placa}}' type="button" class="btn btn-danger delete_driveh" name="button" >Eliminar</button></th>
        </tr>
          @endforeach
      </tbody>
    </table>

</div>

<script>
  $('.selectpicker').selectpicker();
  $('#asig_drvh').DataTable();
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
  $(document).on('click', '.delete_driveh', function() {
    var id=$(this).data('id');
    var placa=$(this).data('placa');
    swal({
          title: "Estas seguro?",
          text: "Desea Eliminar el La Asignación!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Si, Eliminar!",
          closeOnConfirm: false
  },
  function(){
    $.ajax({
              type: 'DELETE',
              url: '/asig/delete/'+id+'/'+placa,
              data: {
                  '_token': $('input[name=_token]').val(),
              },
              success: function(data) {
                    if (data=='ok') {
                      swal("Deleted!", "Registro Eliminado.", "success");
                      loadData('/asig',data);
                    }
                    console.log(data);
                  //swal("Deleted!", "Registro Eliminado.", "success");
                  //$('#table').find('.driver'+id).remove();
              }
          });
      });
  });
</script>
