function load_frm(opt){
  if (opt==1) {var url="/drivers/create"; console.log('Entra')}
  if (opt==2) {var url="/drivers/"; console.log('Entra a verd')}

  //$("#main_content").html()

    $.ajax({
          async: true,
          type: "GET",
          url : url,
          datatype:'json',
          beforeSend:function(){
            $("#contenido_principal").html($("#cargador_empresa").html());
          },
          success : function(resul){
                  $("#contenido_principal").html(resul);
        },
          error:function(data){
            console.log('d'+data.responseJSON.dri_name);
          }
          });
}
$(document).on("submit",".form_entrada",function(e){

  e.preventDefault();

  console.log("Entra");
  var frm=$(this);
  var id_frm=$(this).attr("id");
  if (id_frm=="add_driver"){
    var url="/drivers"
    console.log('->');
  }
  $.ajax({

        type: "POST",
        url : url,
        datatype:'json',
        data : frm.serialize(),
        success : function(resul){
                $("#contenido_principal").html(resul);
      },
        error:function(data){
            var errors=data.responseJSON
            console.log('d'+errors);
        }
        });

});
