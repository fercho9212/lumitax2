@if(session('success'))
    @include('sweet::alert')
@endif
@foreach($errors->all() as $error)
       <div>
          {{$error}}
       </div>
  @endforeach
<style>
#myDropzone{
  width: 200px;
  height: 220px;
  padding:2px;
  border-style:dashed;
  border-color:#2c003a;
  border-width:2px;
  background-color:#fdfbfb;
  color:#462a51;
}
.dropzone .dz-preview .dz-image {
  width: 170px;
  height: 150px;
    }
</style>


  <!-- Change /upload-target to your upload address -->
  <div class="panel with-nav-tabs panel-default">
      <div class="panel-heading">
              <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab1primary" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Primary </a></li>
                  <li><a href="#tab2primary" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Primary</a></li>
              </ul>
      </div>
      <div class="panel-body">
          <div class="tab-content">
              <div class="tab-pane fade in active" id="tab1primary">




                <form role="form" method="POST"  id="update_driver" action="driveredit" class="update_form" data-toggle="validator">

                <!-- start roe-->
                <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id" id="id" value="{{$driver->id}}">
                <input type="hidden" name="dri_photo" id="id" value="{{$driver->dri_photo}}">
                  <div class="row">

                    <div class="col-md-12">

                          <div class="col-md-9">

                            <div class="row">

                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Nombre</label>
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                          <input name="dri_name" value="{{$driver->dri_name}}" type="text" maxlength="30" class="form-control" id="dri_name" placeholder="Enter name" required>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                      </div>
                                    </div>


                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Apellido</label>
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                          <input name="dri_last" value="{{$driver->dri_last}}" type="text" maxlength="30" class="form-control" id="exampleInputPassword1" placeholder="Enter last" required>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                      </div>
                                    </div>


                            </div>

                            <div class="row">


                                <div class="col-md-6">

                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Cédula</label>
                                      <div class="input-group">
                                        <input name="dri_cc" value="{{$driver->dri_cc}}" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter identification" required>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                      </div>
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                  </div>


                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Correo</label>
                                      <div class="input-group">
                                        <input name="email" value="{{$driver->email}}" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                      </div>
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                  </div>


                            </div>

                            <div class="row">

                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Dirección</label>
                                <div class="input-group">
                                  <input name="dri_address" value="{{$driver->dri_address}}" type="text" maxlength="50" class="form-control" id="exampleInputPassword1" placeholder="Enter address" required>
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                </div>
                                <div class="help-block with-errors"></div>
                              </div>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>


                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Número: Celular</label>
                                <div class="input-group">
                                  <input name="dri_movil" value="{{$driver->dri_movil}}" type="number" maxlength="12" class="form-control" id="exampleInputEmail1" placeholder="Enter Cell phone" required>
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                </div>
                                <div class="help-block with-errors"></div>
                              </div>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                          </div>

                          <div class="row">


                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Telefono Fijo</label>
                                <div class="input-group">
                                  <input name="dri_phone" value="{{$driver->dri_phone}}" type="text" type="number" maxlength="12" class="form-control" id="exampleInputEmail1" placeholder="Enter phone" required>
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                </div>
                                <div class="help-block with-errors"></div>
                              </div>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                {!! Form::Label('item', 'Estado:') !!}
                                <select name="state_id"    class="custom-select form-control selectpicker" data-live-search="true" required>
                                  <option value="">Seleccione...</option>
                                  @foreach($states as $state)
                                      <option value="{{$state->id}}" @if($state->id==$driver->state_id) selected='selected' @endif >{{$state->state}}</option>
                                  @endforeach
                                </select>
                                <div class="help-block with-errors"></div>
                              </div>

                            </div>
                          </div>

                          </div>


                          <div class="col-md-3">
                          <!--  <img src="{{url('/photos/drivers/'.$driver->dri_cc.'/'.$driver->dri_photo)}}" alt="">--!>

                            <br><br>
                            <center>
                            <label for="exampleInputEmail1">Foto</label>
                            <div class="dropzone" id="myDropzone">
                            </div>
                          </center>
                          </div>

                    </div>

              </div>
              <!-- /.box-roe -->

              <!-- start row-->


              <!-- /.box-roe -->
              <!-- /.Start Panel Licence -->
              <br>
              <br>
              <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Licencia de Conducción</h3>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Numero de Licencia</label>
                                  <div class="input-group">
                                    <input name="lic_no" value="{{$driver->licence->lic_no}}" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter License" required>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                  </div>
                                  <div class="help-block with-errors"></div>
                                </div>

                              </div>
                              <div class="col-md-4">
                               <div class="form-group">
                                {!! Form::Label('item', 'Categoria:') !!}
                                <select name="category_id" class="custom-select form-control selectpicker" data-live-search="true" required>
                                  <option value="">Seleccione...</option>
                                  @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($category->id==$driver->licence->category_id) selected='selected' @endif >{{$category->category}}</option>
                                  @endforeach
                                </select>
                                <div class="help-block with-errors"></div>
                               </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Vigencia</label>
                                  <div class='input-group date' >
                                   <input name="lic_validity" value="{{$driver->licence->lic_validity}}" type='text' class="form-control" id='date_vigencia'/>
                                   <span class="input-group-addon">
                                       <i class="glyphicon glyphicon-calendar"></i>
                                   </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                      <!-- start row-->
                      <div class="row">
                        <div class="col-md-12">
                            <div class="">
                              <div class="col-md-4">
                                <div class="form-group">
                                 {!! Form::Label('item', 'Typo:') !!}
                                 <select name="type_id" class="custom-select form-control selectpicker"  required>
                                   <option value="" selected="selected">Seleccio..</option>
                                   @foreach($types as $type)
                                     <option value="{{$type->id}}" @if($type->id==$driver->licence->type_id) selected='selected' @endif >{{$type->type}}</option>
                                   @endforeach
                                 </select>
                                 <div class="help-block with-errors"></div>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    <!-- /.box-roe -->


              </div>

              <br>
              <br>
              <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Datos de Acceso</h3>
                      </div>

                      <div class="row">
                      <div class="col-md-12">
                          <div class="">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Contraseña</label>
                                <div class="input-group">
                                  <input name="password" type="password" data-minlength="6" class="form-control" id="inputPassword" readonly
                                      onfocus="this.removeAttribute('readonly');" placeholder="Password" >
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                </div>
                                 <div class="help-block">Minimum of 6 characters</div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Repetir Contraseña</label>
                                <div class="input-group">
                                  <input name="confiPass" type="text" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm password" >
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      </div>
              </div>
              <!-- /.End panel Licence -->
                <div class="box-footer">
                  <button type="submit" id="submit-all"  class="btn btn-primary">Guardar</button>
                </div>
              </form>

            </div><!--End Primary1-->
            <div class="tab-pane fade" id="tab2primary">

            <style type="text/css">
  #gallery-images img{
    width: 230px;
    height: 160px;
    border:2px solid black;
    margin-bottom: 10px;
  }
  #gallery-images ul{
    margin: 0;
    padding: 0;
  }
  #gallery-images li{
    margin: 0;
    padding: 0;
    list-style: none;
    float: left;
    padding-right: 10px;
  }
</style>


              <div class="row">
  <div class="col-md-12">
      <div id="gallery-images">
        <ul>
          @foreach ($driver->imagedrivers as $image)
            <li>

              <a href="{{url('/driImgDoc/documents'.$driver->dri_cc.'/'.$image->path)}}" target="_blank" data-lightbox="roadtrip">
                <img src="{{url('/driImgDoc/documents/'.$driver->dri_cc.'/'.$image->path)}}" alt="">
              </a>
              <br>
              <center><button type="button" onclick="deletePhoto({{$image->id}},{{$driver->id}})" class="btn btn btn-danger"name="button"><span class="glyphicon glyphicon glyphicon-trash"></span></button></center>
              <br>
            </li>
          @endforeach
        </ul>
      </div>
  </div>
</div>



              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <form id="frm_dropzone"
                    class="dropzone"
                    enctype="multipart/form-data"
                    method="post">
              <input type="hidden" name="id" value="{{$driver->id}}">
              </form>

              <script>
              $(document).ready(function(){

                         $("#frm_dropzone").dropzone({
                           headers: {
                                    'X-CSRF-Token': $('input[name="_token"]').val()
                            },
                             maxFiles: 5,
                             acceptedFiles:'image/*',
                             url: "/drimages/store",
                             success: function (file, response) {
                                 if (file.status=='success') {
                                   handleDropZoneFileUpload.handleSuccess(response);
                                 }else {
                                   handleDropZoneFileUpload.handleError(response);
                                 }
                             },
                             init: function() {
                                  this.on("maxfilesexceeded", function(file){
                                      alert("No more files please!");
                                  });
                }
                         });

              var handleDropZoneFileUpload={
                handleError:function(response){
                  console.log(response);
                },
                handleSuccess:function(response){
                  console.log(response);
                  if (response=='Error') {
                    swal(
                          'Oops...',
                          'Número máximo permitido 6',
                          'error'
                        );
                  }else {
                    var imageList=$('#gallery-images ul');
                    var imageSrc='/driImgDoc/documents/'+response.driver.dri_cc+'/'+response.path;
                    var html='';
                    html+='<li>';
                    html+='   <a href="'+imageSrc+'" target="_blank" +data-lightbox="roadtrip">'
                    html+='     <img src="'+imageSrc+'"/>';
                    html+='   </a>';
                    html+='<br>';
                    html+='<center>';
                    html+='   <button type="button" class="btn btn btn-danger" name="button"  onclick="deletePhoto('+response.id+','+response.driver.id+')">'
                    html+='   <span class="glyphicon glyphicon glyphicon-trash"></span></button>';
                    html+='</center>';
                    html+='<br></li>';
                    $(imageList).append(html);
                  }
                  console.log("Holaa"+response);


                }
              };



              });
              function deletePhoto(id,idvehicle){
                var urlDelte='/vehimages/'+id+'/delete/';
                var token=$('input[name="_token"]').val();
                var urlSuccess='/vehimages/'+idvehicle+'/create';
                swal({
                      title: "Estas seguro?",
                      text: "Desea Eliminar el Seguro!",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Si, Eliminar!",
                      closeOnConfirm: false
              },
              function(){
                ajaxDelete(urlDelte,token,urlSuccess);
              });

              }
              </script>




            </div>


            <div class="tab-pane fade" id="tab3primary">Primary 3</div>
            <div class="tab-pane fade" id="tab4primary">Primary 4</div>
            <div class="tab-pane fade" id="tab5primary">Primary 5</div>
  </div>
  </div>
  </div>




<script>

  $(function () {
                //$('form').validator();
                $('#date_vigencia').datetimepicker({

                  format: 'YYYY-MM-DD'
                });
  console.log('entra driver_update');
                $('#update_driver').validator();

                $('.selectpicker').selectpicker();

                $("input[name=password]").change(function () {
      $("input[name=confiPass]").prop('required',true);
      });

              var id=$('#id').val();
              var toke=$('#token').val();


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
                            console.log('Error->'+responseText.rpt);

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


                $('#submit-all').click(function(e){
                  e.preventDefault();

                  var datos=$("#update_driver").serialize();
                  $.ajax({
                        url:'/drivers/'+id,
                        type: "PUT",
                        data: datos,
                        datatype:'json',
                        success:function (data){
                          if (data.rpt=='success') {
                            console.log('loaddd.....');

                            var url='/drivers/';
                            swal("Registro actualizado!", "You clicked the button!", "success");
                            loadData(url,data);
                          }else {
                            sweetAlert("Oops...", "Something went wrong!", "error");
                          }
                        },
                         error: function (xhr, ajaxOptions, thrownError) {
                           msgError(xhr);
                        }
                  });
                    } );


            });

</script>
