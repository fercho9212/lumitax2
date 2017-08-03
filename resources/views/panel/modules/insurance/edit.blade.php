<form id="edit_insurance"  method="post" data-toggle="validator">
<div class="modal-body">

<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<input type="hidden" name="id" id="id">

 <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="exampleInputEmail1">NOMBRE DE SEGURO</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
            <input name="ins_name" type="text" maxlength="30" class="form-control" id="name" placeholder="Enter Insurance" required>
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="exampleInputEmail1">CÓDIGO DE SEGURO</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
          <input name="ins_code" type="number" maxlength="30" class="form-control" id="code" placeholder="Enter Code" >
        </div>
        <div class="help-block with-errors"></div>
      </div>
    </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="comment">DESCRIPCIÓN</label>
          <textarea name="ins_description" class="form-control" rows="2" id="description"></textarea>
        </div>
      </div>
    </div>
</div>
<div class="modal-footer">
<button  type="submit"  id="sendI" class="btn btn-primary">Submit</button>
</div>
</form>
