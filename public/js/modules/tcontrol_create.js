$(function() {

  $('#date_i').datetimepicker({

    format: 'YYYY-MM-DD'
  });

    $('#tcontrol').validator();

        $('#date_f').datetimepicker({
            useCurrent: false, //Important! See issue #1075
            format: 'YYYY-MM-DD',
        });
        $("#date_i").on("dp.change", function (e) {
            $('#date_f').data("DateTimePicker").minDate(e.date);
        });
        $("#date_f").on("dp.change", function (e) {
            $('#date_i').data("DateTimePicker").maxDate(e.date);
        });


$('#table').dataTable({
  "dom": 'lBfrtip',

  "buttons": [
              {
                  extend: 'collection',
                  text: 'Exportar',
                  buttons: [
                      'copy',
                      'excel',
                      'pdf',
                      'print'
                  ],
                  className: 'btn btn-info',
              }
          ],
});
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

            console.log("dsads"+data.rpt);
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
      var urlSuccess="/tcontrol/";
      var frm=$(this);
      var data=frm.serialize();
      var url='/tcontrol/store'
      $.ajax({
          type:'POST',
          url:url,
          data:data,
          beforeSend:function(){
            $("#driver").html($("#cargador_empresa").html());
          },
          success: function(data){
            console.log(data);
            if (data.rpt=='success') {

                      swal("Registro Insertado!", "clicked the button!", "success")
                      loadData('/tcontrol',data);
            }else if (data=='1062') {//Captura una excepción de duplicidad de Error
              swal("Error!", "Dato ya se encuentra registrado!", "warning")
              loadData(urlSuccess,data);
            }else{
              alert('Error');
            }
          },error: function(data){
            msgError(data)
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
 function del_tjopt(id){
    var urlSuccess="/tcontrol/";
    swal({
          title: "Estas seguro?",
          text: "Desea Eliminar el La Asignación y la tarjeta de control!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Si, Eliminar!",
          closeOnConfirm: false
  },
  function(){
    $.ajax({
              type: 'DELETE',
              url: '/tcontrol/'+id+'/delete',
              data: {
                  '_token': $('input[name=_token]').val(),
              },
              beforeSend:function(){
                $("#table").html($("#cargador_empresa").html());
              },
              success: function(data) {
                    if (data.rpt=='success') {
                      swal("Deleted!", "Registro Eliminado.", "success");
                      loadData(urlSuccess,data);
                    }else if (data.rpt=='error') {
                      swal("Error!", "No se pudo Eliminar", "warning")
                      loadData(urlSuccess,data);
                    }
                    console.log(data);
                  //swal("Deleted!", "Registro Eliminado.", "success");
                  //$('#table').find('.driver'+id).remove();
              },error: function(jqXhr, json, errorThrown){
                console.log(jqXhr+json+errorThrown);
              }
          });
      });
  }
  /*
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
      */
