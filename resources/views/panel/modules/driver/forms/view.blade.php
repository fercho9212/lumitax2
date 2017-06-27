
@if(session('success'))
    @include('sweet::alert')
@endif

<div class="table-responsive text-center">
    <table class="table table-borderless" id="table">
        <thead>
            <tr>
                <th class="text-center">Cedula</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Movíl</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Typo</th>
                <th class="text-center">Category</th>
                <th class="text-center">Vigencia</th>
                <th class="text-center">Acción</th>
            </tr>
        </thead>
        @foreach($drivers as $driver)
          @foreach ($licences as $licence)
                @if ($licence->id == $driver->id)
                <tr class="driver{{$driver->id}}">
                <td>{{$driver->dri_cc}}</td>
                <td>{{$driver->dri_name}}</td>
                <td>{{$driver->dri_last}}</td>
                <td>{{$driver->dri_movil}}</td>
                <td>{{$driver->state->state}}</td>
                <td>{{$driver->licence->typeslicence->type}}</td>
                <td>{{$driver->licence->categorylicence->category}}</td>
                <td>{{$driver->licence->lic_validity}}</td>
                <td><button class="edit-modal btn btn-info" data-id="{{$driver->id}}"
                        data-name="{{$driver->name}}">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <button class="delete-modal btn btn-danger" data-id="{{$driver->id}}"
                        data-name="{{$driver->dri_name}}">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button></td>
                </tr>
                @endif
        @endforeach
    @endforeach
    </table>
</div>
<script>
$(document).ready(function(){
  $('#table').DataTable();
});
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
            url: '/drivers/'+id,
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
                $('#table').find('.driver'+id).remove();
            }
        });
    });
});
$(document).on('click', '.edit-modal', function() {
  var id=$(this).data('id');
  var url='/drivers/'+id+'/edit'
  $.get(url,function(resul){
      $("#contenido_principal").html(resul);
  })
});
</script>
