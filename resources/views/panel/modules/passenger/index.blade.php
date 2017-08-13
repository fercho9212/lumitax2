
@foreach($errors->all() as $error)
       <div class="alert alert-danger" role="alert">
        <center><strong>Warning!</strong>  {{$error}}</center>
       </div>
  @endforeach



<center>
           <button type="button" class="col-md-offset-11 btn btn-success  btn-circle-large" data-toggle="modal" data-target="#frmpassenger" id="addpassenger" >
             <span class="glyphicon glyphicon glyphicon-plus"> </span>
          </button>
</center>
<br>

{{--Modal--}}
@include('panel.modules.passenger.modals.create')
@include('panel.modules.passenger.modals.edit')
{{--End Modal--}}
<div class="modal" id="dataDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>

            <input type="hidden" id="delete" name="idid_pais">

            <div class="modal-body">
                <p>Are you sure you, want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="danger btn btn-sm btn-primary" id="del">Delete</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive text-center">
    <table class="table table-borderless" id="table">
        <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellaido</th>
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
                      <button  class="update btn btn-info btn-circle-medium" data-id="{{$passenger->id}}"
                                        data-name="{{$passenger->pas_name}}"
                                        data-last="{{$passenger->pas_last}}"
                                        data-email="{{$passenger->email}}"
                                        data-movil="{{$passenger->pas_movil}}"
                                        data-state="{{$passenger->state->id}}"
                                        data-date="{{$passenger->created_at}}"
                          data-toggle="modal" data-target="#edit_passenger" >
                          <span class="glyphicon glyphicon-edit"></span>
                      </button>
                      <button   class="btn-circle-medium btn btn-danger" data-toggle="modal"  data-target="#dataDelete" data-id="{{$passenger->id}}">
                          <span class="glyphicon glyphicon-trash"></span>
                      </button>
                  </td>
                </tr>


    @endforeach
    </table>
</div>
<script>

  //Inicializa la tabla
  $('#table').DataTable({
    'ajax':'{!! url('passengers/view') !!}',
    columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]

  });
  var otable=$('#table').DataTable();
  otable.ajax.reload();
  //Inicializa el modal registar
  $('#frmpassenger').on("shown.bs.modal", function () {
        $("body").removeClass("modal-open");
        $("body").css({"padding-right":"0px"});
  });
  //Funcíon al salir del modal
  $('#frmpassenger').on('hidden.bs.modal', function (e) {
        console.log('saleeeeeeeeeeeee');
        $("#frmpassenger").removeClass("modal-open");
  });
  //Eliminar modal


  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('data-id', $(e.relatedTarget).data('id'));
});

$('#dataDelete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botón que activó el modal
  var id = button.data('id') // Extraer la información de atributos de datos
  var modal = $(this)
  modal.find('#del').attr('data-id', id);
})

$('#del').on('click', function(e){
  e.preventDefault();
  var id = $('#del').data('id');
  alert(id);
});
/**
  $(document).on('click', '#delete', function() {
        var id=$(this).data('id');


        $.ajax({
                  type: 'DELETE',
                  url: '/passengers/'+id,
                  data: {
                      '_token': $('input[name=_token]').val(),
                  },
                  success: function(data) {
                          swal("Deleted!", "Registro Eliminado.", "success");
                          loadData('/passengers/',data);
                        //  $('#table').find('.driver'+id).remove();
                  }
              });

  });
//Editar
**/
  function edit_passenger(id){
    var idd=id;
    var url='/passengers/'+idd+'/edit'
    $.ajax({
              type: 'GET',
              url: url,
              beforeSend:function(){
                        $("#contenido_principal").html($("#cargador_empresa").html());
              },
              complete:function(){

              },
              success: function(data) {

                        $("#contenido_principal").html(data);
              }
          })
  }
</script>
