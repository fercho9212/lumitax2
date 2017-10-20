$(document).ready(function(){
    var mytable=$("#mytable").DataTable({
      "ajax": {
              "url": "/drivers/getdriver/",
              "type": "GET",
              "dataSrc": 'data',
         },
         columnDefs:[
           {
             targets:0,
             checkboxes:{
               selectRow:true
             }
           }
         ],
         select:{
           style:'multi'
         },

         columns: [
          { data: 'id' },
          { data: 'dri_name' },
          { data: 'dri_last' },
          { data: 'dri_movil' },
          { data: 'dri_address' },
          { data: 'dri_cc' },
          { data: 'created_at' }],

      order:[[1,'asc']]
    })

    $("#myform").on('submit',function(e){
      e.preventDefault()
      var form = this;
        var rowsel=mytable.column(0).checkboxes.selected();
        console.log(rowsel);
         // Iterate over all checkboxes in the table
         $.each(rowsel,function(index,rowid){
           $(form).append(
             $('<input>').attr('type','hidden').attr('name','id[]').val(rowid)
           )
         });
         $("#ids").val(rowsel.join(","));
         $('#myModal').modal()
         $("#view-rows").text($(form).serialize());
         //console.log($(form).serialize());
    });

});

$('#myModal').on("shown.bs.modal", function (event) {
      $("body").removeClass("modal-open");
      $("body").css({"padding-right":"0px"});
          console.log('Entra a la functión');
      });
    $("#frm_msg").on("submit",function(e){
      e.preventDefault();
      console.log("Envia"+$("#ids").val());
      var url="/drivers/broadcastmsg"
      var modal = $(this);
      $.ajax({

            type: "POST",
            url : url,
            data: {
                  '_token': $('input[name=_token]').val(),
                  'data':$("#ids").val(),
                  'msg':$("#msg").val(),
            },
            datatype:'json',
            beforeSend:function(){
               $("#send").html("Enviado...");
            },
            success : function(data){
              var da=JSON.parse(data);
              if (data=='error') {
                swal ( "Oops" ,  "Something went wrong!" ,  "error" )
              }else{
                $("#send").html("Enviar");
                $('#myModal').hide();
                    swal({
                      html:true,
                      title: "Mensaje Enviado!",
                      text: "#de de mensajes exitosos <strong>"+da.success+"</strong></br>"+"#de de mensajes no enviados <strong>"+da.failure+"</strong>" ,
                      type: "success"
                  },
                  function(isConfirm) {
                      $('#myModal').show();
                  });
                console.log("->>>>"+da.failure);
              }

           },
            error: function(jqXhr, json, errorThrown){
             console.log("errodddr"+jqXhr+json+errorThrown);
           }

        });

        $('#myModal').on('hidden.bs.modal', function(){
            $(this).find('form')[0].reset();
        });

    })
