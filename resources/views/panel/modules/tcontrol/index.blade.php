<div class="row">

  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <div class="col-md-12">
    <div class="col-md-6 col-md-offset-3">
      <center><label for="exampleInputEmail1" data-live-search="true">Clase</label></center>
      <div class="input-group">
        <select  name="dv_driver" class="selectpicker show-menu-arrow" id="selectDriver" data-live-search="true">
          <option value="">Seleccione...</option>
          @foreach ($drivers as $driver)
            <option value="{{$driver->id}}">cc:{{$driver->cc}} Nombre:{{$driver->name}}  </option>
          @endforeach
        </select>
      </div>
    </div>
  </div><!--Cierra col-md-12-->
  <div id="driver" class="" >
    <form class="" action="index.html" method="post" id="tcontrol">
      {!! csrf_field() !!}
      <input type="hidden" name="dv_driver" id="dv_driver" value="">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Nombre</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input name="dri_name" type="text" maxlength="30" class="form-control" id="dri_name" placeholder="Enter name" >
              </div>
              <div class="help-block with-errors"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputPassword1">Identificación</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input name="dri_cc" type="text" maxlength="30" class="form-control" id="dri_cc" placeholder="Enter last" >
              </div>
              <div class="help-block with-errors"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">

              <center><label for="exampleInputEmail1" data-live-search="true">Vehículo</label></center>
              <div class="input-group">
                <select  name="dv_vehicle" class="selectpicker show-menu-arrow" id="vehicle" data-live-search="true">
                  <option value="">Seleccione...</option>

                </select>
              </div>
            </div>

          <div class="col-md-6">
            <center><label for="exampleInputEmail1" data-live-search="true">Estado</label></center>
            <div class="input-group">

              <select  name="dv_state" class="selectpicker show-menu-arrow" id="state" data-live-search="true">
                <option value="">Seleccione...</option>
              </select>

            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Nit Empresa</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input name="dv_nit" type="text" maxlength="30" class="form-control" id="dri_name" placeholder="Enter name" >
              </div>
              <div class="help-block with-errors"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputPassword1">Número Único Trj Control</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input name="dv_no" type="text" maxlength="30" class="form-control" id="dri_cc" placeholder="Enter last" >
              </div>
              <div class="help-block with-errors"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputPassword1">Fecha Desde</label>
              <div class='input-group date' >
               <input name="dv_date_e" type='text' class="form-control" id='date_i'/>
               <span class="input-group-addon">
                   <i class="glyphicon glyphicon-calendar"></i>
               </span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Fecha hasta</label>
              <div class='input-group date' >
               <input name="dv_date_f" type='text' class="form-control" id='date_f'/>
               <span class="input-group-addon">
                   <i class="glyphicon glyphicon-calendar"></i>
               </span>
              </div>
            </div>
          </div>
        </div>


      </div>

      <div class="row">

        <div class="col-md-4 col-md-offset-4">
            <br><br>
            <center><button type="submit" class="btn btn-primary">Guardar</button><center>
        </div>
      </div>
    </form>


  </div>

<div class="reload_table">
  <div class="table-responsive text-center">
    <div class="table-responsive text-center">
        <table class="table table-borderless" id="table">
            <thead>
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">CC</th>
                    <th class="text-center">Placa</th>
                    <th class="text-center">No Tarjeta control</th>
                    <th class="text-center">No Nit Empresa</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Fecha Expedición</th>
                    <th class="text-center">Fecha Vencimiento</th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>
            @foreach($dvs as $dv)


                    <tr class="driver{{$dv->id}}">
                    <td>{{$dv->dri_name}}</td>
                    <td>{{$dv->dri_cc}}</td>
                    <td>{{$dv->placa}}</td>
                    <td>{{$dv->dv_no}}</td>
                    <td>{{$dv->dv_nit}}</td>
                    <td>{{$dv->state}}</td>
                    <td>{{$dv->dv_date_ex}}</td>
                    <td>{{$dv->dv_date_ven}}</td>
                    <td>
                      <button   class="btn-circle-medium btn btn-danger" data-toggle="modal"  data-target="#dataDelete" onclick="delete_passenger({{$dv->id}})">
                          <span class="glyphicon glyphicon-trash"></span>
                      </button>
                    </td>
                    </tr>
        @endforeach
        </table>
      </div>


</div>

</div>

<script>
$(function() {
  $('#date_i').datetimepicker({

    format: 'YYYY-MM-DD'
  });
  $('#date_f').datetimepicker({

    format: 'YYYY-MM-DD'
  });
$('#table').dataTable();
$('.selectpicker').selectpicker();
  $('#selectDriver').on('change', function(){
    var selected = $(this).find("option:selected").val();
    var tok=$('input[name=_token').val();

    var url='/tcontrol/search';
    $('#vehicle').html('<option value="">Seleccione...</option>').selectpicker('refresh');
    $('#state').html('<option value="">Seleccione...</option>').selectpicker('refresh');
    $.ajax({
        type:'POST',
        url:url,
        data:{ id: selected, _token : tok} ,

        success: function(data){

            console.log(data.rpt);
            $("#dri_name").val(data.rpt[0].dri_name);
            $("#dri_cc").val(data.rpt[0].dri_cc);
            $("#dv_driver").val(data.rpt[0].id);
            var _options =""
            $.each(data.vehicles, function(i, value) {
                  _options +=('<option value="'+ value.id+'">'+ value.placa +'</option>');
                });
            $('#vehicle').append(_options);
            $("#vehicle").selectpicker("refresh");

            var _optionstate =""
            $.each(data.states, function(i, value) {
                  _optionstate +=('<option value="'+ value.id+'">'+ value.state +'</option>');
                });
            $('#state').append(_optionstate);
            $("#state").selectpicker("refresh");
        },
    });
  });
  $('#tcontrol').submit(function(e){
      e.preventDefault();
      var frm=$(this);
      var data=frm.serialize();
      var url='/tcontrol/store'
      $.ajax({
          type:'POST',
          url:url,
          data:data,
          success: function(data){
            console.log(data.rpt)
            if (data.rpt=='success') {
                      loadData('/tcontrol',data);
                      swal("Registro Insertado!", "You clicked the button!", "success")
            }else if (data=='1062') {//Captura una excepción de duplicidad de Error
              swal("Error!", "Dato ya se encuentra registrado!", "warning")
              loadData(urlView,data);
            }else{
              alert('Error');
            }
          },

      });

  });
});



  $('#asig_drvh').DataTable();
  $('#asig_veh_dri').submit(function(e){
      e.preventDefault();
      var frm=$(this);
      var data=frm.serialize();
      var url='tcontrol/search'
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
