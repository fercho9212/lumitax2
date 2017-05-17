function load_frm(opt){
  if (opt==1) {var url="frm_create_user"; console.log('Entra')}

  //$("#main_content").html()

    $("#contenido_principal").html($("#cargador_empresa").html());
      $.get(url,function(resul){
          $("#contenido_principal").html(resul);
      })
}
