
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
@include('panel.modules.vehicle.ActionVehicle.view.data_vehicle')
<div class="row">
  <div class="col-md-12">
      <div id="gallery-images">
        <ul>
          @foreach ($vehicle->imagevehciles as $image)
            <li>
              <a href="/vehicle/{{$image->path}}" target="_blank" data-lightbox="roadtrip">
                <img src="{{url('/vehicle/'.$vehicle->placa.'/'.$image->path)}}" alt="">
              </a>
              <br>
              <center><button type="button" onclick="deletePhoto({{$image->id}},{{$vehicle->id}})" class="btn btn btn-danger"name="button"><span class="glyphicon glyphicon glyphicon-trash"></span></button></center>
              <br>
            </li>
          @endforeach
        </ul>
      </div>
  </div>
</div>



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
    if (response=='Error') {
      swal(
            'Oops...',
            'Número máximo permitido 6',
            'error'
          );
    }else {
      var imageList=$('#gallery-images ul');
      var imageSrc='/vehicle/'+response.vehicle.placa+'/'+response.path;
      var html='';
      html+='<li>';
      html+='   <a href="'+imageSrc+'" target="_blank" +data-lightbox="roadtrip">'
      html+='     <img src="'+imageSrc+'"/>';
      html+='   </a>';
      html+='<br>';
      html+='<center>';
      html+='   <button type="button" class="btn btn btn-danger" name="button"  onclick="deletePhoto('+response.id+','+response.vehicle.id+')">'
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
  var toke=$('input[name="_token"]').val();
  var urlSuccess='/vehimages/'+idvehicle+'/create'
  ajaxDelete(urlDelte,toke,urlSuccess);
}
</script>
