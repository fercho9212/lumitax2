<div class="col-md-12 col-md-offset-4">
  <!-- Modal -->
  <div id="edit_insurance" class="modal fade" role="dialog">
      <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
                @include('panel.modules.insurance.edit');
          </div>

      </div>
  </div>

<!--Formulario de creación-->
  @include('panel.modules.insurance.create')

</div>

<table id="tableI" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Insurance</th>
                <th>Code</th>
                <th>Descripction</th>
                @if (Auth::user()->typesrole_id==1 && Auth::user()->typesrole_id==2)  <th>Action</th>@endif

            </tr>
        </thead>
        <tbody>

                @foreach ($insurances as $insurce)
                  <tr>
                      <td>{{$insurce->ins_name}}</td>
                      <td>{{$insurce->ins_code}}</td>
                      <td>{{$insurce->ins_description}}</td>
                      @if (Auth::user()->typesrole_id==1 && Auth::user()->typesrole_id==2)<td>
                          <button type="button" class="btn btn-info" name="button" data-id="{{$insurce->id}}"
                                                              data-name="{{$insurce->ins_name}}"
                                                              data-code="{{$insurce->ins_code}}"
                                                              data-description="{{$insurce->ins_description}}"
                                                              data-toggle="modal" data-target="#edit_insurance">
                                                              <span class="glyphicon glyphicon-edit"></span>
                                                            </button>
                          <button class="btn btn-danger" type="button" name="button" onclick="delete_insu({{$insurce->id}})">

                            <span class="glyphicon glyphicon-trash"></span>
                          </button>
                      </td>
                  </tr>@endif
                @endforeach

        </tbody>
    </table>

<script>
//Inicializa la tabla
$('#tableI').DataTable();
$(function(){
      $('#create_insurance').on('submit',function(e){
        e.preventDefault();
        var data=$(this).serialize();
        var url='/insurance';
        $.ajax({
            type:"POST",
            url:url,
            datatype:'json',
            data:data,
            success: function(data){
              if (data.msg=='success') {
                var urlSuccess='/insurance/create/';
                loadData(urlSuccess,data);
                swal("Registro Insertado!", "You clicked the button!", "success");
              }
              $.each( data.error, function( key, value ) {
                     console.log("DDDDASDADSA"+value);
                    });
            },error:function(data){
                msgError(data);
            }
        });
      });
      $('#edit_insurance').on("shown.bs.modal", function (event) {

        $("body").removeClass("modal-open");
        $("body").css({"padding-right":"0px"});
            var button  = $(event.relatedTarget);
            var id=button.data('id');
            var code=button.data('code');
            var name=button.data('name');



            var description=button.data('description');
            console.log("dasdas"+name);
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #code').val(code);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #description').val(description);
            $('#edit_insurance').validator();
      });
      $('#sendI').click(function(e){
          e.preventDefault();
          var data=$("form#edit_insurance").serialize();
          var id=$('#id').val();
          var url='/insurance/'+id;

          $.ajax({
                type:'PUT',
                data:data,
                url:url,
                datatype:'json',
                success:function(data){
                  if (data.rpt=='success') {
                    loadData('/insurance',data);
                    swal("Registro actualizado!", "You clicked the button!", "success")
                  }else {
                    swal({
                          title: "Se encontraron los siguientes errores",
                          text:   $.each( data.error, function( key, value ) {
                                      "<p style='color: red'>"+value+"</p>"
                                        }),
                          confirmButtonText: "intentar nuevamente!",
                          confirmButtonClass: "btn-danger",
                          type: "warning",
                          showConfirmButton: true
                        },function(){
                                    loadData(url,data);
                        });

                    $.each( data.error, function( key, value ) {
                           console.log("DDDDASDADSA"+value);
                          });
                  }


                },
                error:function(data){
                  msgError(data);
                }

          });

      });


      });
      function delete_insu(id){

        var urlDelte='/insurance/'+id;
        var token=$('input[name=_token]').val();
        var urlSuccess='/insurance/create';
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
      $('#create_insurance').validator();


</script>
