
<div class="panel with-nav-tabs panel-default">
    <div class="panel-heading">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1primary" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Primary </a></li>
                <li><a href="#tab2primary" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Primary</a></li>
            </ul>
    </div>
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1primary">

              {{--FORMULARIO DE REGISTRO--}}

                    <form  method="POST"   class="form_" id="create_vehicle" data-toggle="validator" >
                      <!--Service Especial-->
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="servicelujo">
                            @include('panel.modules.vehicle.forms.taxi')
                        </div>

                          <br>
                          <br>

                        <div id="servicelujo" class="ignore" style="display:none">
                            @include('panel.modules.vehicle.forms.luxury')
                        </div>{{--End  LUJO--}}


                              <div class="box-footer">
                                <button type="button" class="btn btn-secondary" >Close</button>
                                <button  type="submit"   class="btn btn-primary">Submit</button>
                              </div>
                  </form>
                {{-- END FORMULARIO --}}

</div>
          <div class="tab-pane fade" id="tab2primary">Primary 2</div>
          <div class="tab-pane fade" id="tab3primary">Primary 3</div>
          <div class="tab-pane fade" id="tab4primary">Primary 4</div>
          <div class="tab-pane fade" id="tab5primary">Primary 5</div>
</div>
</div>
</div>
