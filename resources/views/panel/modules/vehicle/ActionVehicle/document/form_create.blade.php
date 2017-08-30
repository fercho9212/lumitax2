<form class="" action="" method="post" id="create_document">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <input type="hidden" name="vehicle_id" id="idvehicle" value="{{$id}}">
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Seguro</label><br>
        <select name="insurance_id" class="selectpicker" data-live-search="true">
          @foreach ($insurance as $value)
            <option value="{{$value->id}}">{{$value->ins_name}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputPassword1">Compañia</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input name="doc_company" type="text" maxlength="30" class="form-control " id="exampleInputPassword1" placeholder="Compañia" required>
        </div>
        <div class="help-block with-errors"></div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputPassword1">No Poliza</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input name="doc_policy" type="text" maxlength="30" class="form-control " id="exampleInputPassword1" placeholder="No poliza" required>
        </div>
        <div class="help-block with-errors"></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="comment">Cobertura</label>
        <textarea name="description" class="form-control" rows="2" id="comment"></textarea>
      </div>
    </div>
  </div>
  <div class="box box-primary">
          <div class="box-header with-border">
            <center><h3 class="box-title">Vigencia</h3></center>
          </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="exampleInputPassword1">Fecha Desde</label>
        <div class='input-group date' >
         <input name="doc_datei" type='text' class="form-control" id='date_i'/>
         <span class="input-group-addon">
             <i class="glyphicon glyphicon-calendar"></i>
         </span>
        </div>

      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="exampleInputEmail1">Fecha hasta</label>
        <div class='input-group date' >
         <input name="doc_datef" type='text' class="form-control" id='date_f'/>
         <span class="input-group-addon">
             <i class="glyphicon glyphicon-calendar"></i>
         </span>
        </div>
      </div>
    </div>
  </div>

</div>
    <div class="modal-footer">
      <button  data-idv="{{$id}}" type="submit"   class="btn btn-primary">Guardar</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </form>

<script src="{{ asset('/js/modules/documents_all.js') }}" type="text/javascript"></script>
