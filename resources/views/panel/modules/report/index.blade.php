<h1>Reports</h1>
<form role="form" method="POST" id="report_driver" action="create_driver" class="form_i" data-toggle="validator" enctype="multipart/form-data" data-toggle="validator">
  <!-- start roe-->
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="row">
      <div class="col-md-12">
        <div class="container">

          <div class="col-sm-3">
            <center><label for="exampleInputEmail1" data-live-search="true">Seleccione un Conductor</label></center>
            <div class="input-group">
              <select  name="dv_driver" class="selectpicker show-menu-arrow" id="selectDriver" data-live-search="true">
                <option value="">Seleccione...</option>
                @foreach ($drivers as $driver)
                  <option value="{{$driver->id}}">cc:{{$driver->dri_cc}} Nombre:{{$driver->dri_name}}  </option>
                @endforeach
              </select>
            </div>
          </div>


            <div class="col-sm-3" style="height:130px;">
                <div class="form-group">
                  <center><label for="exampleInputEmail1" data-live-search="true">Desde</label></center>
                    <div class='input-group date' id='datetime1'>
                        <input type='text' name="date_i" class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-3" style="height:130px;">
                <div class="form-group">
                  <center><label for="exampleInputEmail1" data-live-search="true">Hasta</label></center>
                    <div class='input-group date' id='datetime2'>
                        <input type='text' name="date_f" class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>
                </div>
            </div>


            <div class="col-sm-3" style="height:130px;">
                <div class="form-group">
                  <center><label for="exampleInputEmail1" data-live-search="true">Fecha Final</label></center>
                    <input type="submit" class="btn btn-info" value="Generar">
                </div>
            </div>



        </div>
      </div>
    </div>
</form>
  <script type="text/javascript">
      $(function () {
          $('#datetime1').datetimepicker({
              viewMode: 'years',
              format: 'YYYY-MM-DD HH:mm:ss'
          });

          $('#datetime2').datetimepicker({
              useCurrent: false, //Important! See issue #1075
              viewMode: 'years',
              format: 'YYYY-MM-DD HH:mm:ss'
          });
          $("#datetime1").on("dp.change", function (e) {
              $('#datetime2').data("DateTimePicker").minDate(e.date);
          });
          $("#datetime2").on("dp.change", function (e) {
              $('#datetime1').data("DateTimePicker").maxDate(e.date);
          });




          $('.selectpicker').selectpicker();

          $('#report_driver').on("submit",function(e){
            e.preventDefault();
            var data=$(this).serialize();
            var url='/reports/driver';
            $.ajax({
                url:    url,
                data:   data,
                type:   'POST',
                success: function (data){
                  console.log(data);
                },
                error:function(data){
                  console.log(data);
                }
            });
            console.log(data);
          })

      });
  </script>
