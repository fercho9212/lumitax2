function load_frm(opt){

  //Functions of driver
  if (opt==1) {var url="/drivers/create"; console.log('Entra')}
  if (opt==2) {var url="/drivers/"; console.log('Entra a verd')}
  //Functions of passenger
  if (opt==10) {var url="/passengers/"; console.log('Entra a passenger')}
  if (opt==11) {var url="/drivers/create"; console.log('Entra a verd')}

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
            console.log('Error main');
          }
          });
}
$(document).on("submit",".form_entrada",function(e){

  e.preventDefault();

  console.log("Entra");
  var frm=$(this);
  var id_frm=$(this).attr("id");
  if (id_frm=="create_passenger"){
    var url="/drivers"
    console.log('->');
  }
/*  if (id_frm=="create_passenger"){
    var url="/driverssss"
    console.log('passenger');
  }*/
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
function loadData(url,data){
  $.get(url,function(data){
    $("#contenido_principal").html(data);
  })
}
