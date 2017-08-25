<form id="create_user" action="#" method="post" role="form" data-toggle="validator">
 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
 <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputEmail1">Nombre</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
            <input name="name" type="text" maxlength="30" class="form-control" id="exampleInputEmail1" required placeholder="Enter Name" >
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Correo</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
          <input name="email" type="email" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter mail" required>
        </div>
        <div class="help-block with-errors"></div>
      </div>
    </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputEmail1">Password</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
            <input name="password" type="password" maxlength="30" class="form-control" id="exampleInputEmail1" placeholder="Enter Password">
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </div>
      </div>

    <div class="row">
      <div class="col-md-4">
       <div class="form-group">
        {!! Form::Label('item', 'Typo de usuario:') !!}
        <select name="typesrole_id"    class="custom-select form-control selectpicker" data-live-search="true" required>
          <option value="">Seleccione...</option>
          @foreach($typesroles as $typesrole)
              <option value="{{$typesrole->id}}">{{$typesrole->type}}</option>
          @endforeach
        </select>
        <div class="help-block with-errors"></div>
       </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <center><input type="submit" name="" class="btn btn-primary" value="Guardar"><center>
        </div>
      </div>
    </div>


  </form>
<script type="text/javascript">
  $('.selectpicker').selectpicker({
});
</script>
