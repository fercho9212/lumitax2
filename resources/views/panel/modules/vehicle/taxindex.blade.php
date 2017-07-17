<div class="table-responsive text-center">
    <table class="table table-borderless" id="table">
        <thead>
            <tr>
                <th class="text-center">Placa</th>
                <th class="text-center">Modelo</th>
                <th class="text-center">Motor</th>
                <th class="text-center">Serie</th>
                <th class="text-center">Vin</th>
                <th class="text-center">Color</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Clase</th>
                <th class="text-center">Marca</th>
                <th class="text-center">Documentos</th>
            </tr>
        </thead>
        @foreach($vehicles as $vehicle)


                <tr class="driver{{$vehicle->id}}">
                <td>{{$vehicle->placa}}</td>
                <td>{{$vehicle->veh_model}}</td>
                <td>{{$vehicle->veh_motor}}</td>
                <td>{{$vehicle->veh_serie}}</td>
                <td>{{$vehicle->veh_vin}}</td>
                <td>{{$vehicle->veh_color}}</td>
                <td>{{$vehicle->typevehicle->type}}</td>
                <td>{{$vehicle->classvehicle->class}}</td>
                <td>{{$vehicle->brandvehicle->brand}}</td>
              {{-- <td>
                  @if ($vehicle->document=='0')
                    <button onclick="add_document({{$vehicle->id}})" class="delete-modal  btn btn-primary" data-id="{{$vehicle->id}}"
                        data-id="{{$vehicle->id}}">
                        <span >X</span>
                    </button>
                  @else

                  @endif
                </td>
                      --}}
                  <td>
                    <a href="vehicles/{{$vehicle->id}}/show">
                    <button   class="update btn btn-warning">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    </a>

                    <button class="delete-modal btn btn-danger" href="javascript:void(0);" data-id="{{$vehicle->id}}"
                        data-name="{{$vehicle->dri_name}}">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>


                  {{--   <button  class="update btn btn-info btn-circle-medium" data-id="{{$vehicle->id}}"
                                        data-name="{{$vehicle->placa}}"
                                        data-last="{{$vehicle->veh_model}}"
                                        data-email="{{$vehicle->veh_motor}}"
                                        data-movil="{{$vehicle->veh_serie}}"
                                        data-state="{{$vehicle->veh_vin}}"
                                        data-date="{{$vehicle->veh_vin}}"
                          data-toggle="modal" data-target="#edit_passenger" >
                          <span class="glyphicon glyphicon-edit"></span>
                      </button>
                      <button class="delete-modal btn-circle-medium btn btn-danger" data-id="{{$vehicle->id}}"
                          data-name="{{$vehicle->placa}}">
                          <span class="glyphicon glyphicon-trash"></span>
                      </button>--}}

                  </td>
                </tr>


    @endforeach
    </table>
</div>


  <script type="text/javascript">
    $('#table').DataTable();
    function add_document(id){
      url='/documents/'+id;
      $.ajax({
        type:'GET',
        url:url,
        success:function(data){
          loadData(url,data);
        },
    });
    }
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
              var urlDelete= '/vehicles/'+id;
              var token=$('input[name=_token]').val();
              var urlView='/vehicles/';
              ajaxDelete(urlDelete,token,urlView);
            });
    });

    function edit(id){
      var url='/vehicles/'+id+'/edit'
      var token=$('input[name=_token]').val();
      ajaxEdit(id,url,token);
    }
    function action(id){
      var url=""+id+"/show";
      $.ajax({
        type:'GET',
        url:url,
        success:function(data){
          console.log(data);
        }
      });

      }




  </script>
