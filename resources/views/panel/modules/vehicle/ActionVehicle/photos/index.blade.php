<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

<form id="id_dropzone"
      class="dropzone"

      enctype="multipart/form-data"
      method="post">
<input type="hidden" name="id" value="{{$vehicle->id}}">
</form>

<script>

$(document).ready(function(){

           $("#id_dropzone").dropzone({
             headers: {
                      'X-CSRF-Token': $('input[name="_token"]').val()
              },
               maxFiles: 2000,
               url: "/vehimages/store",
               success: function (file, response) {
                   console.log(response);
               }
           });


});

</script>
