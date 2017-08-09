
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
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
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
                  <th><input name="select_all" data-na="{{$driver->dri_cc}}" value="{{$driver->dri_name}}" type="checkbox"></th>
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



      var val = [];
      var dat=[];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
          dat[i]=$(this).data('na');
        });
        console.log(val);
        console.log(dat);
        $("#myModal").modal();
} );

} );
</script>
