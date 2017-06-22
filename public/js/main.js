function load_frm(opt){
  if (opt==1) {var url="/drivers/create"; console.log('Entra')}

  //$("#main_content").html()

    $("#contenido_principal").html($("#cargador_empresa").html());
      $.get(url,function(resul){
          $("#contenido_principal").html(resul);
      })
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

        alert(resul);
      }
        });

});
