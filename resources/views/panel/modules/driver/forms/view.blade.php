
@if(session('success'))
    @include('sweet::alert')
@endif
<style>
input:-webkit-autofill { -webkit-box-shadow: 0 0 0px 1000px white inset; }

</style>
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
                <td>
                      <button onclick="edit({{$driver->id}})" class="update btn btn-info" data-id="{{$driver->id}}"
                          data-name="{{$driver->name}}">
                          <span class="glyphicon glyphicon-edit"></span>
                      </button>
                      <button class="delete-modal btn btn-danger" data-id="{{$driver->id}}"
                          data-name="{{$driver->dri_name}}">
                          <span class="glyphicon glyphicon-trash"></span>
                      </button>
                  </td>
                </tr>
                @endif
        @endforeach
    @endforeach
    </table>
</div>
<script>

$(function(){
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
                  url: '/drivers/'+id,
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
});
function edit(id){
  var idd=id;
  var url='/drivers/'+idd+'/edit'
  $.ajax({
            type: 'GET',
            url: url,
            data: {
                '_token': $('input[name=_token]').val(),
            },
            beforeSend:function(){
              $("#contenido_principal").html($("#cargador_empresa").html());
            },
            complete:function(){

            },
            success: function(data) {
              $("#contenido_principal").html(data);
            }
        });
}
</script>
