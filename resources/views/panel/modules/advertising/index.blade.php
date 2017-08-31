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
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
<div class="row">
  <div class="col-md-12">
      <div id="gallery-images">
        <ul>
          @foreach ($images as $image)
            <li>
              <a href="/advertising/{{$image->path}}" target="_blank" data-lightbox="roadtrip">
                <img src="{{url('/advertising/'.$image->path)}}" alt="">
              </a>
              <br>
              <center><button type="button" onclick="delImg({{$image->id}})" class="btn btn btn-danger"name="button"><span class="glyphicon glyphicon glyphicon-trash"></span></button></center>
              <br>
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
<input type="hidden" name="id" value="">
<div  id="boatAddForm">

</div>
</form>
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<script>
$(document).ready(function(){

  $("#id_dropzone").dropzone({
      headers: {
               'X-CSRF-Token': $('input[name="_token"]').val()
       },
      maxFiles: 5,
      acceptedFiles:'image/*',
      method :"post",
      url: "/images/",
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
           this.on('success', function(file, response) {
           });
           this.on("sending", function(file, xhr, formData) {
             formData.append('dddddddas', 'dasdas');
          });
}
  });
  var handleDropZoneFileUpload={
  handleSuccess:function(response){
    if (response.rpt=='error_c') {
      swal(
            'Oops...',
            'Número máximo permitido 6',
            'error'
          );
    }else {
      var imageList=$('#gallery-images ul');
      console.log(response);
      var imageSrc='/advertising/'+response.rpt.path;
      var html='';
      html+='<li>';
      html+='   <a href="'+imageSrc+'" target="_blank" +data-lightbox="roadtrip">'
      html+='     <img src="'+imageSrc+'"/>';
      html+='   </a>';
      html+='<br>';
      html+='<center>';
      html+='   <button type="button" class="btn btn btn-danger" name="button"  onclick="delImg('+response.rpt.id+')">'
      html+='   <span class="glyphicon glyphicon glyphicon-trash"></span></button>';
      html+='</center>';
      html+='<br></li>';
      $(imageList).append(html);
    }
    console.log("Holaa"+response);
    }
  }


        });

        function delImg(id){
          var urlDelte='/images/'+id;
          var token=$('input[name="_token"]').val();
          var urlSuccess='/images/';
          swal({
                title: "Estas seguro?",
                text: "Desea Eliminar el Seguro!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, Eliminar!",
                closeOnConfirm: false
        },
        function(){
          ajaxDelete(urlDelte,token,urlSuccess);
        });
        }
</script>
