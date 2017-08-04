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
  width:250px;
  height:200px;
  padding:15px;
  border-style:dashed;
  border-color:#2c003a;
  border-width:2px;
  background-color:#fdfbfb;
  color:#462a51;
}
</style>


  <!-- Change /upload-target to your upload address -->


<form role="form" method="POST" id="create_driver" action="create_driver" class="form_i" data-toggle="validator" enctype="multipart/form-data">
  <!-- start roe-->
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

    <div class="row">

      <div class="col-md-12">
          <div class="">
            <div class="col-md-8">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">NOMBRE</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input name="dri_name" type="text" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                  </div>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Apellido</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input name="dri_last" type="text" maxlength="30" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                  </div>
                  <div class="help-block with-errors"></div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Cedula</label>
                  <div class="input-group">
                    <input name="dri_cc" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
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
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                  </div>
                <div class="help-block with-errors"></div>
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Dirección</label>
                  <div class="input-group">
                    <input name="dri_address" type="text" maxlength="50" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                  </div>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Celular</label>
                  <div class="input-group">
                    <input name="dri_movil" type="number" maxlength="12" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Telefono Fijo</label>
                  <div class="input-group">
                    <input name="dri_phone" type="text" type="number" maxlength="12" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">

                  <div class="form-group">
                  {!! Form::Label('item', 'Item:') !!}
                  <select name="state_id" class="custom-select form-control">

                    @foreach($states as $state)
                      <option  value="{{$state->id}}">{{$state->state}}</option>
                    @endforeach
                  </select>
                </div>

              </div>

            </div>


            <div class="col-md-4 ">
              <center>
              <label for="exampleInputEmail1">Foto</label>
              <div class="dropzone" id="myDropzone">

              </div>
            </center>
            </div>
          </div>
      </div>

  <div class="col-md-12">

  </div>
</div>
<!-- /.box-roe -->

<!-- start row-->
<div class="row">
<div class="col-md-12">
    <div class="">


    </div>
</div>
</div>

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
                      <input name="lic_no" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                 <div class="form-group">
                  {!! Form::Label('item', 'Categoria:') !!}
                  <select name="category_id" class="custom-select form-control">
                    <option selected>Seleccione</option>
                    @foreach($categories as $category)
                      <option  value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                  </select>
                 </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Vigencia</label>
                    <div class='input-group date' >
                     <input name="lic_validity" type='text' class="form-control" id='date_vigencia'/>
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
                   <select name="type_id" class="custom-select form-control" >

                     @foreach($types as $type)
                       <option  value="{{$type->id}}">{{$type->type}}</option>
                     @endforeach
                   </select>
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
                    <input name="password" type="password" data-minlength="6" class="form-control"id="inputPassword" placeholder="Password" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  </div>
                   <div class="help-block">Minimum of 6 characters</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Repetir Contraseña</label>
                  <div class="input-group">
                    <input name="password" type="text" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
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
    <button type="submit" id="submit-all" class="btn btn-primary">Submit</button>
  </div>
</form>
<script>

  $(function () {
                //$('form').validator();
                $('#date_vigencia').datetimepicker({
                  defaultDate: "2017-06-27",
                  format: 'YYYY-MM-DD'
                });

$('#create_driver').validator();
              var myDropzone = new Dropzone("div#myDropzone", {
                    url:"/drivers",
                    autoProcessQueue: false,
                    uploadMultiple: false,
                    parallelUploads: 5,
                    maxFiles: 1,
                    maxFilesize: 1,
                    acceptedFiles: 'image/*',
                    addRemoveLinks: true,

                    sending: function(file, xhr, formData) {
    // Pass token. You can use the same method to pass any other values as well such as a id to associate the image with for example.

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

                        // for Dropzone to process the queue (instead of default form behavior):
                        document.getElementById("submit-all").addEventListener("click", function(e) {
                            // Make sure that the form isn't actually being sent.
                            e.preventDefault();
                            e.stopPropagation();
                            myDropzone.processQueue();



                        });
                        this.on("success", function(file, responseText) {
                          if (responseText.rpt=='success') {
                             swal("Good job!", "You clicked the button!", "success")
                             load_frm(2);
                          }else{
                            console.log('dfad'+responseText);
                          }
});

                        //send all the form data along with the files:
                        this.on("sendingmultiple", function(data, xhr, formData) {
                            formData.append("firstname", jQuery("#firstname").val());
                            formData.append("lastname", jQuery("#lastname").val());
                        });

                        this.on("maxfilesexceeded", function(file) {
          this.removeAllFiles();
          this.addFile(file);
    });
                    }
                });

/*
                $(document).on("submit",".form_i",function(e){

                  e.preventDefault();

                  console.log("Entra");
                  var frm=$(this);
                  var id_frm=$(this).attr("id");

                    var url="/drivers";
                    myDropzone.processQueue();
                    console.log('->');

                /*  if (id_frm=="create_passenger"){
                    var url="/driverssss"
                    console.log('passenger');
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
*/
            });

</script>
