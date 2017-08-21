$(function () {

                $('#date_vigencia').datetimepicker({
                    defaultDate: "2017-08-21",
                    format: 'YYYY-MM-DD'
                });

                $('#create_driver').validator();
                $('#myDropzone').validator();
                $('.selectpicker').selectpicker();
                console.log('entra driver_create');

              var myDropzone = new Dropzone("div#myDropzone", {
                    url:"/drivers",
                    autoProcessQueue: false,
                    uploadMultiple: false,
                    parallelUploads: 5,
                    maxFiles: 1,
                    maxFilesize: 1,
                    acceptedFiles: 'image/*',
                    addRemoveLinks: true,

                    sending: function(file, xhr, formData) { //Fución que envia datos al servidor

    // Pass token. You can use the same method to pass any other values as well such as a id to associate the image with for example.
                            //Datos enviados al servior
                            formData.append("_token", $('[name=_token').val()); // Laravel expect the token post value to be named _token by default
                            formData.append("lic_no", $('[name=lic_no').val());
                            formData.append("category_id", $('[name=category_id').val());
                            formData.append("type_id", $('[name=type_id').val());
                            formData.append("dri_name", $('[name=dri_name').val());
                            formData.append("dri_last", $('[name=dri_last').val());
                            formData.append("dri_cc", $('[name=dri_cc').val());
                            formData.append("dri_address", $('[name=dri_address').val());
                            formData.append("dri_movil", $('[name=dri_movil').val());
                            formData.append("dri_phone", $('[name=dri_phone').val());
                            formData.append("password", $('[name=password').val());
                            formData.append("email", $('[name=email').val());
                            formData.append("state_id", $('[name=state_id').val());
                            formData.append("lic_validity", $('[name=lic_validity').val());

                          },

                    init: function() {
                          dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                            // Selecciona el evento submit para enviar la información al momento de dar click
                              document.getElementById("submit-all").addEventListener("click", function(e) {
                              // Make sure that the form isn't actually being sent.
                              e.preventDefault();
                              e.stopPropagation();
                                if(myDropzone.files.length>0){  //valida si contiene archivos
                                      myDropzone.processQueue();
                                  } else {//Si no contiene imagen
                                      myDropzone.processQueue();
                                      swal("Imagen Invaliada", "Por favor Seleccione una foto", "warning")
                                  }

                                });
                        //Función que se activa cuando es exitoso la subida de imagenes y datos
                        this.on("success", function(file, responseText) {
                          if (responseText.rpt=='success') {
                             swal("Conductor Registrado", "Presione para Continuar!", "success")
                             load_frm(2);
                          }else{
                            console.log('dfad'+responseText);
                            load_frm(1);
                          }
                        });

                        //send all the form data along with the files:
                        this.on("sendingmultiple", function(data, xhr, formData) {
                            formData.append("firstname", jQuery("#firstname").val());
                            formData.append("lastname", jQuery("#lastname").val());
                        });
                        //Cuando se envia más de una archivos
                        this.on("maxfilesexceeded", function(file) {
                            this.removeAllFiles();
                            this.addFile(file);
                        });

                        this.on("error", function(file, data) {
                                    var urlView='/drivers/create'
                                    var msg="";
                                    $.each(data, function( key, value ) {
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
                                          this.removeFile(file);
                        });
                    }
                });
                });
