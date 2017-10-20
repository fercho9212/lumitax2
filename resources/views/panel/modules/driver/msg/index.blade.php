<h3><a href="https://www.gyrocode.com/projects/jquery-datatables-checkboxes/"></a></h3>
<a href="https://www.gyrocode.com/projects/jquery-datatables-checkboxes/"></a>
<!-- load-->
  <div style="display: none" id="load_modal" align="center">
          <br><br><br><br>
                <center><img src="img/load.gif" align="middle" alt="cargador" width="60%" height="20%"> &nbsp;</center>
                <br><br>
               <hr style="color:#003" width="50%">
               <br>
  </div>
<!-- end load-->

@include('panel.modules.driver.msg.modalmsg')
<hr>
<div class="container" style="margin:15px auto">
  <center><h3 style="color: #337ab7;">ENVIO DE MENSAJE API</h3></center>
    <form  id="myform" action="index.html" method="post">
      <!--
        <p><b>Selected row data</b></p>
        <pre id="view-rows"></pre>
        <p><b>Form data as submited to the server</b></p> -->
        <center><p><button class="btn btn-default"><i class="fa fa-envelope fa-3x" aria-hidden="true"></i></button></p></center>
        <div class="table-responsive ">
          <table id="mytable" class="table table-striped table-bordered dt-responsive display nowrap">
            <thead>
                <tr>
                  <th></th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Dirección</th>
                  <th>Telefono</th>
                  <th>fecha registro</th>
                  <th>NPI</th>
                </tr>
            </thead>
            <tfoot>
              <tr>
                <th></th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>fecha registro</th>
                <th>NPI</th>
              </tr>
            </tfoot>
          <table>
        </div>
        <input type="hidden" name="" value="" id="ids">
    </form>
</div>

<script src="{{ asset('/js/modules/driver_msg.js') }}" type="text/javascript"></script>
