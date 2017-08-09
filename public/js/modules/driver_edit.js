
  $(function () {
                //$('form').validator();
                $('#date_vigencia').datetimepicker({
                  defaultDate: "2017-06-27",
                  format: 'YYYY-MM-DD'
                });

                $('#update_driver').validator();

                $('.selectpicker').selectpicker();

                $("input[name=password]").change(function () {
			$("input[name=confiPass]").prop('required',true);
			});

              var id=$('#id').val();
              var toke=$('#token').val();
              console.log(toke);

              var myDropzone = new Dropzone("div#myDropzone", {
                    url:"/drivers/"+id+"/update/photo",
                    method:"POST",
                    uploadMultiple: false,
                    maxFiles: 1,
                    maxFilesize: 1,
                    acceptedFiles: 'image/*',
                    addRemoveLinks: true,



                    sending: function(file, xhr, formData) { //Fución que envia datos al servidor
                              formData.append('_token', $('input[name="_token"]').val());
                              formData.append('id', $('input[name="id"]').val());
                              formData.append('photo', $('input[name="photo"]').val());
                          },

                    init: function() {
                          dzClosure = this; // Makes sure that 'this' is understood inside the functions below.



                        //Función que se activa cuando es exitoso la subida de imagenes y datos
                        this.on("success", function(file, responseText) {

                        var  urlView='/drivers/'+id+'/edit'
                          if (responseText.rpt=='success') {
                            swal({
                                  title: "Foto con éxito!",
                                  timer: 3000,
                                  imageUrl: "img/up.jpg",
                                  showConfirmButton: false,
                                });

                             loadData(urlView);
                          }else{
                            console.log('Error->'+responseText);

                          }
                        });


                        //Cuando se envia más de una archivos
                        this.on("maxfilesexceeded", function(file) {
                            this.removeAllFiles();
                            this.addFile(file);
                        });


                        this.on("error", function(file, data) {
                                    var urlView='/drivers/'+id+'/edit';
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

                var mockFile = {
                    name: 'Photo driver',
                    size: '0.2',
                    kind: 'image',
                    thumbnailWidth:"300",
                    thumbnailHeight:"300",
                    url:  '/photos/drivers/'+$('input[name="dri_cc"]').val()+'/'+$('input[name="dri_photo"]').val(),
                };
                myDropzone.emit("addedfile", mockFile);
                myDropzone.emit("thumbnail", mockFile, mockFile.url);
                myDropzone.emit('complete', mockFile);



                $(document).on("submit","#update_driver",function(e){

                  e.preventDefault();
                  var datos=$(this).serialize();
                  $.ajax({
                        url:'/drivers/'+id,
                        type: "PUT",
                        data: datos,
                        datatype:'json',
                        success:function (data){
                          if (data.rpt=='success') {
                            swal("Good job!", "You clicked the button!", "success");
                            var url='/drivers/'+id+'/edit'
                            loadData(url);
                          }else {
                            sweetAlert("Oops...", "Something went wrong!", "error");
                          }
                        },
                         error: function (xhr, ajaxOptions, thrownError) {
                           msgError(xhr);
                        }
                  });

                });

            });
