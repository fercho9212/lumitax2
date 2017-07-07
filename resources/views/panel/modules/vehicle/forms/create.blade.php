@extends('panel.modules.vehicle.main')
@section('create-vehicle')
  <form  method="POST"   class="form_" id="create_vehicle">
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





@endsection

@section('code_script')
<script type="text/javascript">
$(document).ready(function(){
      $(':checkbox').checkboxpicker();
      $('form').validator();


      $('#lujo').click(function(){
            $('#servicelujo').show(2000);
            $("#frenos").attr('required',true);
            //  $('#servicelujo').find('input').attr("name");
            //$('#servicelujo').toggle("slow");
      });

      $('#special').click(function(){
        //  $('#servicelujo').find('input').val('');
          $('#frenos').prop('required', false);
          $('#servicelujo').hide(2000);

          //$('#servicelujo input').removeAttr('name');
      });

      $('#create_vehicle').submit(function(e){
        e.preventDefault();
        alert('dasdasd');
        var url='/vehicles';
        var datos=$(this).serialize();
            $.ajax({

                    type: "POST",
                    data: datos,
                    url : url,
                    datatype:'json',
                    success: function(data){
                      //$.each(data.dat,function(i,value){
                        //console.log(i+value);
                      //});
                      console.log(':D'+data.rpt);
                    }
            });
      });
    });
</script>
@endsection
