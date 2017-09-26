<link href="{{ asset('/css/asset/general.css') }}" rel="stylesheet" type="text/css" />
<div class="row">

<div class="col-md-12">
  <div id="gallery-images">
      <ul>
          @foreach ($driver->imagedrivers as $image)
          <li>
              <a href="{{url('photos/drivers/'.$driver->dri_cc.'/documents/'.$image->path)}}" target="_blank" data-lightbox="roadtrip">
                <img src="{{url('photos/drivers/'.$driver->dri_cc.'/documents/'.$image->path)}}" alt="">
              </a>
              <br>
              <center><button type="button" onclick="DeleteDocument({{$image->id}},{{$driver->id}})" class="btn btn btn-danger"name="button"><span class="glyphicon glyphicon glyphicon-trash"></span></button></center>
              <br>
          </li>
          @endforeach
      </ul>
  </div>
</div>
</div>
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

  <form id="frm_dropzone"
        class="dropzone"
        enctype="multipart/form-data"
        method="post">
  <input type="hidden" name="id" value="{{$driver->id}}">
  </form>

<script src="{{ asset('/js/modules/driver_documents.js') }}" type="text/javascript"></script>
