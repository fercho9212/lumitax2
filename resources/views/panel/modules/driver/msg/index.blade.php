
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">

          <form role="form" method="POST" id="send_msg" action="#" class="send_msg" data-toggle="validator">
          <input id="token_api"  type="hidden"   name="token_api" type="text" maxlength="30" class="form-control"  placeholder="Enter name" >
          <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Conductor</label>
                <div class="input-group">
                  <input id="pas_name"  disabled value="" tabindex="1" name="pas_name" type="text" maxlength="30" class="form-control"  placeholder="Enter name" >
                </div>
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Mensage</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="pas_msg"  value="No data" tabindex="1" name="pas_msg" type="text" maxlength="30" class="form-control"  placeholder="Enter name" >
                </div>
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button  type="submit"  id="btn_msg" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>

    </div>
  </div>

</div>



<form id="frm-example" action="/path/to/your/script.php" method="POST">
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
                <th class="text-center">Cedula</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Movíl</th>
                <th class="text-center">Correo</th>
                <th class="text-center">Estado</th>
            </tr>
        </thead>
        @foreach($drivers as $driver)
                <tr class="driver{{$driver->id}}">
                <th><input name="select_all" data-token="{{$driver->token_api}}" value="{{$driver->dri_name}}" type="checkbox"></th>
                <td>{{$driver->dri_cc}}</td>
                <td>{{$driver->dri_name}}</td>
                <td>{{$driver->dri_last}}</td>
                <td>{{$driver->dri_movil}}</td>
                <td>{{$driver->email}}</td>
                <td>{{$driver->state->state}}</td>
                </tr>

    @endforeach
    </table>

    <hr>

    <p>Press <b>Submit</b> and check console for URL-encoded form data that would be submitted.</p>

    <p><button>Submit</button></p>

    <p><b>Selected rows data:</b></p>
    <pre id="example-console-rows"></pre>

    <p><b>Form data as submitted to the server:</b></p>
    <pre id="example-console-form"></pre>


</form>


<script>
$(document).ready(function() {
  var table = $('#example').DataTable({
    'columnDefs': [
             {
                'targets': 0,
                'checkboxes': {
                   'selectRow': true
                }
             }
          ],
          'select': {
             'style': 'multi'
          },
          'order': [[1, 'asc']]
       });

  // Handle form submission event
  $('#frm-example').on('submit', function(e){
        e.preventDefault();
        $('input:checkbox:checked').each(function(){
          $("#text").text($("#text").text() + $(this).val()+ " ,");
      });
        $("#myModal").modal();
} );

$('#myModal').on("shown.bs.modal", function (event) {
  var val = [];
  var dat=[];
  $(':checkbox:checked').each(function(i){
    val[i] = $(this).val();
    dat[i]=$(this).data('na');
  });
  var modal = $(this);
  modal.find('.modal-title').html('<center>Renovar : '+name+'<center>');
  modal.find('.modal-body #pas_name').val(val);
  modal.find('.modal-body #token_api').val(val);

  console.log("ddddd"+val);
  console.log("ddddd"+dat);

});

$("#btn_msg").click(function(e){
  e.preventDefault();
  var data=$('#send_msg').serialize();
  var url='/drivers/msg';

  $.ajax({
        url:url,
        type:'POST',
        data:data,
        success:function(data){
          console.log(data);
        },
        error:function(data){
          console.log(data);
        }
  });
});

} );
</script>
