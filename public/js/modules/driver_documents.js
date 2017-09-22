$(document).ready(function(){
           $("#frm_dropzone").dropzone({
               headers: {
                        'X-CSRF-Token': $('input[name="_token"]').val()
                },
               maxFiles: 5,
               acceptedFiles:       'image/*',
               url:                 "/drimages/store",
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
    swal(
          'Oops...',
          'Something went wrong!',
          'error'
        )
  },
  handleSuccess:function(response){
    console.log(response);
    if (response=='Error') {
      swal(
            'Oops...',
            'Número máximo permitido 6',
            'error'
          );
    }else {
          var imageList=$('#gallery-images ul');
          var imageSrc='/driImgDoc/documents/'+response.driver.dri_cc+'/'+response.path;
          var html='';
          html+='<li>';
          html+='   <a href="'+imageSrc+'" target="_blank" +data-lightbox="roadtrip">'
          html+='     <img src="'+imageSrc+'"/>';
          html+='   </a>';
          html+='<br>';
          html+='<center>';
          html+='   <button type="button" class="btn btn btn-danger" name="button"  onclick="deletePhoto('+response.id+','+response.driver.id+')">'
          html+='   <span class="glyphicon glyphicon glyphicon-trash"></span></button>';
          html+='</center>';
          html+='<br></li>';
          $(imageList).append(html);
    }
  }
};



});
function deletePhoto(idimage,iddriver){
  var urlDelte='/drimages/'+idimage+'/delete/';
  var token=$('input[name="_token"]').val();
  var urlSuccess='/drivers/'+iddriver+'/edit'
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
