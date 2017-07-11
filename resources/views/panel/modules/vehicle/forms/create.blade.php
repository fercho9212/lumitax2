@extends('panel.modules.vehicle.main')
@section('contenido_principal')


    <div id='message-error' class="alert alert-danger" role='alert' style="display:none">
      <strongs id='error'>Errores:</strong>
    </div>


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

              {{--FORMULARIO DE REGISTRO--}}

                    <form  method="POST"   class="form_" id="create_vehicle" data-toggle="validator" >
                      <!--Service Especial-->
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="servicelujo">
                            @include('panel.modules.vehicle.forms.taxi')
                        </div>

                          <br>
                          <br>

                        <div id="servicelujo" class="ignore" style="display:none">
                            @include('panel.modules.vehicle.forms.luxury')
                        </div>{{--End  LUJO--}}


                              <div class="box-footer">
                                <button type="button" class="btn btn-secondary" >Close</button>
                                <button  type="submit"   class="btn btn-primary">Submit</button>
                              </div>
                  </form>
                {{-- END FORMULARIO --}}

</div>
          <div class="tab-pane fade" id="tab2primary">Primary 2</div>
          <div class="tab-pane fade" id="tab3primary">Primary 3</div>
          <div class="tab-pane fade" id="tab4primary">Primary 4</div>
          <div class="tab-pane fade" id="tab5primary">Primary 5</div>
</div>
</div>
</div>


@endsection


@section('code_script')
<script type="text/javascript">
$(document).ready(function(){
      $(':checkbox').checkboxpicker();

    // Función que desahbilita la tecla Enter
$("form").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });

    // Selecciona Lujo
      $('#lujo').click(function(){
            $('#servicelujo').show(2000);
            $("#servicelujo input").attr('required',true);
            //  $('#servicelujo').find('input').attr("name");
            //$('#servicelujo').toggle("slow");
      });
      //Selecciona Vehículo especia
      $('#special').click(function(){
        //  $('#servicelujo').find('input').val('');
          //$('#frenos').prop('required', false);
          $('#servicelujo').hide(2000);
          $('#servicelujo input').removeAttr('required');
          //$('#servicelujo input').removeAttr('name');
      });
      //Al seleccionar el vehiculo

      $('#create_vehicle').submit(function(e){
        e.preventDefault();
        var datos=$(this).serialize();
        var  tag= $('input[name=leveles_id]:checked').val();
        if (tag=='1') {
            var url='/vehicles/tax';
        }else if (tag=='2') {
            var url='/vehicles/luxury';
        }
            $.ajax({
                    type: "POST",
                    data: datos,
                    url : url,
                    datatype:'json',
                    success: function(data){
                      //$.each(data.dat,function(i,value){
                        //console.log(i+value);
                      //});
                      $('#message-error').hide();
                      if (data.rpt=='taxi') {

                        swal({
                              title: "Taxi registrado",
                              type: "success",
                              imageUrl: "/img/panel/taxi.png",
                            });

                      }else if (data.rpt=='luxury') {
                        swal({
                              title: "Taxi de Lujo registrado",
                              type: "success",
                            });
                      }
                      console.log(':D'+data.rpt);
                    },error:function(data){
                      var errors=data.responseJSON;
                      var errorsHtml='<ul>'
                      $.each( errors , function( key, value ) {
                        errorsHtml += '<li>'+ value+'</li>';
       });

                      errorsHtml+='</ul>'
                      $('#message-error').show().html(errorsHtml);
                    }
            });
      });
    });
</script>
@endsection
