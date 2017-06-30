@if(session('success'))
    @include('sweet::alert')
@endif
@foreach($errors->all() as $error)
       <div class="alert alert-danger" role="alert">
        <center><strong>Warning!</strong>  {{$error}}</center>
       </div>
  @endforeach
<br><br>
<center>
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Agregar Usuario del Servicio
          </button>
</center>
<br>

{{--Modal--}}
@include('panel.modules.passenger.modals.create');
{{--End Modal--}}
<div class="table-responsive text-center">
    <table class="table table-borderless" id="table">
        <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Email</th>
                <th class="text-center">Tel:Movíl</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Acción</th>
                <th class="text-center">Registrado el</th>
            </tr>
        </thead>
        @foreach($passengers as $passenger)


                <tr class="driver{{$passenger->id}}">
                <td>{{$passenger->pas_name}}</td>
                <td>{{$passenger->pas_last}}</td>
                <td>{{$passenger->email}}</td>
                <td>{{$passenger->pas_movil}}</td>
                <td>{{$passenger->state->state}}</td>
                <td>{{$passenger->created_at}}</td>
                <td>
                      <button onclick="edit({{$passenger->id}})" class="update btn btn-info" data-id="{{$passenger->id}}"
                          data-name="{{$passenger->name}}">
                          <span class="glyphicon glyphicon-edit"></span>
                      </button>
                      <button class="delete-modal btn btn-danger" data-id="{{$passenger->id}}"
                          data-name="{{$passenger->dri_name}}">
                          <span class="glyphicon glyphicon-trash"></span>
                      </button>
                  </td>
                </tr>


    @endforeach
    </table>
</div>
<script>
  $('#table').DataTable();
  $(document).on('click', '.delete-modal', function() {
        var id=$(this).data('id');
        swal({
              title: "Estas seguro?",
              text: "Desea Eliminar el Conductor!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Si, Eliminar!",
              closeOnConfirm: false
      },
      function(){
        $.ajax({
                  type: 'DELETE',
                  url: '/passengers/'+id,
                  data: {
                      '_token': $('input[name=_token]').val(),
                  },
                  success: function(data) {
                      swal("Deleted!", "Registro Eliminado.", "success");
                      $('#table').find('.driver'+id).remove();
                  }
              });
          });
  });
</script>
