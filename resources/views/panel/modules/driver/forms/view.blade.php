@if(session('success'))
    @include('sweet::alert')
@endif
{{--

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" type="text/css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" type="text/css"/>

--}}

<div class="">
    <table class="display nowrap"  id="table">
        <thead>
            <tr>
              <th class="text-center"><span class="glyphicon glyphicon-star-empty"></span></th>
                <th class="text-center">Cedula</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Movíl</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Typo</th>
                <th class="text-center">Category</th>
                <th class="text-center">Vigencia</th>
                <th class="text-center">Registrado el</th>
                <th class="text-center">Medio</th>
                @if (Auth::user()->typesrole_id==1 || Auth::user()->typesrole_id==2)<th class="text-center">Acción</th>@endif
            </tr>
        </thead>
        @foreach($drivers as $driver)
          @foreach ($licences as $licence)
                @if ($licence->id == $driver->id)
                <tr class="driver{{$driver->id}}">
                <td><span class="glyphicon glyphicon-star-empty"></span>{{$driver->dri_qual}}</td>
                <td>{{$driver->dri_cc}}</td>
                <td>{{$driver->dri_name}}</td>
                <td>{{$driver->dri_last}}</td>
                <td>{{$driver->dri_movil}}</td>
                <td>{{$driver->state->state}}</td>
                <td>{{$driver->licence->typeslicence->type}}</td>
                <td>{{$driver->licence->categorylicence->category}}</td>
                <td>{{$driver->licence->lic_validity}}</td>
                <td>{{$driver->created_at}}</td>
                <td>{{$driver->typeregister->type}}</td>
                @if (Auth::user()->typesrole_id==1 || Auth::user()->typesrole_id==2)
                    <td>  <button onclick="edit({{$driver->id}})" class="update btn btn-info" data-id="{{$driver->id}}"
                          data-name="{{$driver->name}}">
                          <span class="glyphicon glyphicon-edit"></span>
                      </button>
                      <button class="delete-modal btn btn-danger" href="javascript:void(0);" data-id="{{$driver->id}}"
                          data-name="{{$driver->dri_name}}">
                          <span class="glyphicon glyphicon-trash"></span>
                      </button>

                  </td>
                @endif
                </tr>
                @endif
        @endforeach
    @endforeach
    </table>
</div>
<script>
$(function(){
  $('#table').DataTable({
        dom: 'Bfrtip',
        buttons: [
             'pdf', 'print',
        ]
    });
  $(document).on('click', '.delete-modal', function() {
    var previousWindowKeyDown = window.onkeydown;
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
        window.onkeydown = previousWindowKeyDown;
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
