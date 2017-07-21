function load_frm(opt){

  //Functions of driver
  if (opt==1) {var url="/drivers/create"; console.log('Entra')}
  if (opt==2) {var url="/drivers/"; console.log('Entra a verd')}
  //Functions of passenger
  if (opt==10){var url="/passengers/"; console.log('Entra a passenger')}
  if (opt==11){var url="/drivers/create"; console.log('Entra a verd')}
  //function of module asig vheiclw & drivers
  if (opt==20){var url="/asig/"; console.log('Entra a asignación')}
  //function of module vehicle
  if (opt==30){var url="/vehicles/"; console.log('Entra a vista taxi ')}
  if (opt==31){var url="/vehicles/luxury"; console.log('Entra a vista Lujo ')}
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
//Funcion que recoge y procesa los errores de validación
// @data respuesta de los errores
function msgError(data){
  var errors=data.responseJSON;
  var msg='';
  $.each(errors, function( key, value ) {
                  msg+='<p class="text-danger">'+value+'</p>';
                  }),
    swal({
          html:  true,
          title: "Se encontraron los siguientes errores",
          text:  msg,
          confirmButtonText: "intentar nuevamente!",
          confirmButtonClass: "btn-danger",
          type: "warning",
          showConfirmButton: true
        },function(){
                  console.log('Confirmated error');
        });
      console.log(msg);
}
/*
* @urlDelte Url donde direccionado a la funcion eliminar
* @token token de seguridad
* @urlSuccess url donde se enviara despues de realizar la eliminación
*/
function ajaxDelete(urlDelte,token,urlSuccess){
  $.ajax({
            type: 'DELETE',
            url: urlDelte,
            data: {
                '_token': token,
            },
            success: function(data) {
                swal("Deleted!", "Registro Eliminado.", "success");
                //console.log(data);
                loadData(urlSuccess,data);
            }
        });
}
/*FUNCIÓN QUE EDITA Y ENTREGA UN FORMULARIO
* @id id del elemento a editar
* @url a direcionar el metodo editar
* @token token de seguridad
*/
function ajaxEdit(id,url,token){

  $.ajax({
            type: 'GET',
            url: url,
            data: {
                '_token': token,
            },
            beforeSend:function(){
              $("#contenido_principal").html($("#cargador_empresa").html());
            },
            complete:function(){

            },
            success: function(data) {
              // console.log(data);
              $("#contenido_principal").html(data);
            }
        });
}
function SweetAlertWithImg(title,type,img)
{
  swal({
        title: title,
        type:  type,
        imageUrl: img,
      });
}



function ActionDocument(opt,id=NULL){

    if (opt==1) {var url="/drivers/create"; console.log('Entra');}
    if (opt==2) {var url="/documents/"+id+"/create"; console.log('Entra');}
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
