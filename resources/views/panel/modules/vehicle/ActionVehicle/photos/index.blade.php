
  <style type="text/css">
      #gallery-images img{
        width: 240px;
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
          @foreach ($vehicle->imagevehciles as $image)
            <li>
              <a href="/vehicle/{{$image->path}}" target="_blank" data-lightbox="roadtrip">
                <img src="/vehicle/{{$image->path}}" alt="">
              </a>
              <br>
              <button type="button" class="btn btn-primary"name="button">{{$image->img_name}}</button>
              <br>
            </li>

          @endforeach
        </ul>
      </div>
  </div>
</div>



<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
{{$vehicle->id}}
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
               maxFiles: 5,
               acceptedFiles:'image/*',
               url: "/vehimages/store",
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
    console.log("Holaa"+response);
    var imageList=$('#gallery-images ul');
    var imageSrc='/vehicle/'+response.path;
    $(imageList).append('<li><a href="'+imageSrc+'" target="_blank" data-lightbox="roadtrip"><img src="'+imageSrc+'"></a><br><button type="button" class="btn btn-primary"name="button">'+response.img_name+'</button><br></li>')
  }
};


});

</script>
