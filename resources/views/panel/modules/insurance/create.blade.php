<form id="create_insurance" action="#" method="post" role="form" data-toggle="validator">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
 <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputEmail1">NOMBRE DE SEGURO</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
            <input name="ins_name" type="text" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter Insurance" required>
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">CÓDIGO DE SEGURO</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
          <input name="ins_code" type="number" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter Code">
        </div>
        <div class="help-block with-errors"></div>
      </div>
    </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="comment">DESCRIPCIÓN</label>
          <textarea name="ins_description" class="form-control" rows="2" id="comment"></textarea>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <center><input type="submit" name="" class="btn btn-primary" value="Send"><center>
        </div>
      </div>
    </div>


  </form>
