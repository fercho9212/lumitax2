$(function(){
  $('#table').DataTable({
        dom: 'Bfrtip',
        buttons: [
             'pdf', 'print',
        ],
        "order": [[ 9, "desc" ]]
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
  function openveh(id){




  }
  $('#frmdriver').on("shown.bs.modal", function (event) {
        $("body").removeClass("modal-open");
        $("body").css({"padding-right":"0px"});
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id'); /// Extract info from data-* attributes
        var url="/drivers/vehicles"
        var modal = $(this);
        $.ajax({

              type: "POST",
              url : url,
              data: {
                    '_token': $('input[name=_token]').val(),
                    'id':id,
              },
              datatype:'json',
              beforeSend:function(){
                $("#contentVeh").html($("#load_modal").html());
              },
              success : function(data){
                if (!data.rpt) {
                  console.log('Entradasd sdasd');
                }
                var array = new Array();
                var fLen;
                $.each(data.rpt, function(i,index) {
                    array.push(index.placa+'id'+index.id);
                  });
                    fLen = array.length;
                    text = "<ul>";
                    for (i = 0; i < fLen; i++) {
                        va=array[i].split("id");
                        text += "<a href='/vehicles/"+va[1]+"/show'><li>" + va[0] + "</li></a>";
                    }
                    

                    console.log('dasd'+data.rpt);
                  modal.find('.modal-body div#contentVeh').html(text)
                  //console.log(vehicle);
                    //  $("#contenido_principal").html(resul);
             },
              error: function(jqXhr, json, errorThrown){
               console.log(jqXhr+json+errorThrown);
             }

          });

            console.log('Entra a la functión');
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
