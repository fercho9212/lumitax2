

function load_frm(opt){

  //Functions of driver
  if (opt==1) {var url="/drivers/create"; console.log('Entra')}
  if (opt==2) {var url="/drivers/"; console.log('Entra a verd')}
  if (opt==3) {var url="/drivers/msg"; console.log('Entra a verd')}

  //Functions of passenger
  if (opt==10){var url="/passengers/"; console.log('Entra a passenger')}
  if (opt==11){var url="/drivers/create"; console.log('Entra a verd')}
  //function of module asig vheiclw & drivers
  if (opt==20){var url="/asig/"; console.log('Entra a asignación')}
  //function of module vehicle
  if (opt==30){var url="/vehicles/"; console.log('Entra a vista taxi ')}
  if (opt==31){var url="/vehicles/luxury"; console.log('Entra a vista Lujo ')}
  if (opt==32){var url="/vehicles/create"; console.log('Entra a Crear ')}
  //$("#main_content").html()s
  // Functions of module secure
  if (opt==40){var url="/insurance/create/"; console.log('Entra a vista Seguro')}
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
$(document).on("submit",".form_enfffftrada",function(e){

  e.preventDefault();

  console.log("Entra");
  var frm=$(this);
  var id_frm=$(this).attr("id");
  if (id_frm=="create_passenger"){
    var url="/drivers"
    myDropzone.processQueue();
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
function msgError(data,urlView=''){
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
                  if (urlView!='') {
                    loadData(urlView,data);
                  }
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
              // swal("Deleted!", "Registro Eliminado.", "success");

                if (data.rpt=='success') {
                  loadData(urlSuccess,data);
                  swal("Registro Eliminado!", "You clicked the button!", "success")
                }else if (data==1451) {//Numero de error en las realaciones de vhiculación
                  swal("Error!", "El seguro se encuentra en uso  ", "warning")
                  loadData(urlSuccess,data);
                }

              // loadData(urlSuccess,data);
            },
            error: function(data){
              console.log('Errorttttta->'+data)
            }
        });
}

function deleteNormal(urlDelte,token,urlSuccess){
  $.ajax({
            type: 'DELETE',
            url: urlDelte,
            data: {
                '_token': token,
            },
            success: function(data) {
              // swal("Deleted!", "Registro Eliminado.", "success");

                if (data.rpt=='success') {
                  loadData(urlSuccess,data);
                  swal("Registro Eliminado!", "You clicked the button!", "success")
                }else if (data.rpt=='error') {//Numero de error en las realaciones de vhiculación
                  swal("Error!", "Por favor Comunicarse con el administrador ", "warning")
                  loadData(urlSuccess,data);
                }

              // loadData(urlSuccess,data);
            },
            error: function(data){
              console.log('Errorttttta->'+data)
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
            type: 'GET',//Cambio de get a PUT
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


/*Funciones del documento*/
function ActionDocument(opt,id=NULL){

    if (opt==1) {var url="/drivers/create"; console.log('Entra');}
    if (opt==2) {var url="/documents/"+id+"/create"; console.log('Entra');}
    if (opt==3) {var url="/vehimages/"+id+"/create"; }
    if (opt==4) {var url="/vehicles/"+id+"/edit/"; console.log('Entra');}

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
            console.log(data);
          }
          });


}






/*Function que crea y muestra errores en los modals */

function create_in_modal(url,data,urlView){

  $.ajax({
        type: "POST",
        url : url,
        datatype:'json',
        data : data,
        beforeSend:function(){
                $("#contenido_principal").html($("#cargador_empresa").html());
        },
        success : function(data){
                if (data.msg=='success') {
                          loadData(urlView,data);
                          swal("Registro Insertado!", "You clicked the button!", "success")
                }else if (data=='1062') {//Captura una excepción de duplicidad de Error
                  swal("Error!", "Dato ya se encuentra registrado!", "warning")
                  loadData(urlView,data);
                }else{
                  alert('Error');
                }
      },//end success
        error:function(data){
              msgError(data,urlView);
            }
      });//End Ajax
}// End function create_in_modal
