$(function () {
              $('#create_document').validator();

              $('#date_f').datetimepicker({
                  useCurrent: false, //Important! See issue #1075
                  format: 'YYYY-MM-DD',
              });
              $('#date_i').datetimepicker({
                  useCurrent: false, //Important! See issue #1075
                  format: 'YYYY-MM-DD',
              });
              $('#date_ei').datetimepicker({
                  useCurrent: false, //Important! See issue #1075
                  format: 'YYYY-MM-DD',
              });
              $('#date_ef').datetimepicker({
                  useCurrent: false, //Important! See issue #1075
                  format: 'YYYY-MM-DD',
              });

              $("#date_i").on("dp.change", function (e) {
                  $('#date_f').data("DateTimePicker").minDate(e.date);
              });
              $("#date_f").on("dp.change", function (e) {
                  $('#date_i').data("DateTimePicker").maxDate(e.date);
              });

              $('#date_ef').datetimepicker({
                  useCurrent: false, //Important! See issue #1075
                  format: 'YYYY-MM-DD',
              });
              $("#date_ei").on("dp.change", function (e) {
                  $('#date_ef').data("DateTimePicker").minDate(e.date);
              });
              $("#date_ef").on("dp.change", function (e) {
                  $('#date_ei').data("DateTimePicker").maxDate(e.date);
              });




              $('.selectpicker').selectpicker();

              //Inicializa la tabla
              $('#table').DataTable();
              $(document).on('click', '.delete-modal', function() {


                    var id=$(this).data('id');
                    var idvehicle=$(this).data('idv');

                    swal({
                          title: "Estas seguro?",
                          text: "Desea Eliminar el Documento!",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "Si, Eliminar!",
                          closeOnConfirm: false
                  },
                  function(){

                        var urlDelete=  '/documents/'+id+'/delete';
                        var token=      $('input[name=_token]').val();
                        var urlView=    '/documents/'+idvehicle+'/create'
                        ajaxDelete(urlDelete,token,urlView);

                      });
              });
//Función que crea
              $('#create_document').on('submit',function(e){
                  e.preventDefault();

                  var url='/documents/store';
                  var idvehicle=$("#idvehicle").val();
                  var data=$(this).serialize();
                  var urlView='/documents/'+idvehicle+'/create'
                  create_in_modal(url,data,urlView);
              });
              $('#createDocument').on("shown.bs.modal", function (event) {
                $("body").removeClass("modal-open");
                $("body").css({"padding-right":"0px"});
              });


              $('#edit_document').on("shown.bs.modal", function (event) {
                $("body").removeClass("modal-open");
                $("body").css({"padding-right":"0px"});
                var button  = $(event.relatedTarget);
                var id    = button.data('id');
                var id_vehicle    = button.data('idvehicle');
                var id_insurance  = button.data('idinsurance');
                var name_insurance = button.data('name_insurance');
                var description   = button.data('description');
                var date_start    = button.data('datei');
                var date_end      = button.data('datef');
                var company       = button.data('company');
                var policy        = button.data('policy');

                var modal = $(this);

                $(".modal-body #insu").prop("selectedIndex", 3);
                modal.find('.modal-title').html('<h4><center><strong>Seguro : '+name_insurance+'</strong><center><h4>');
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #idvehicle').val(id_vehicle);//id de documento
                modal.find('.modal-body #insurance_id').val(id_insurance);
                modal.find('.modal-body #name_insurance').val(name_insurance);
                modal.find('.modal-body #description').val(description);
                modal.find('.modal-body #date_ei').val(date_start);
                modal.find('.modal-body #date_ef').val(date_end);
                modal.find('.modal-body #company').val(company);
                modal.find('.modal-body #policy').val(policy);
                modal.find('.modal-body #test').html(id_insurance);
                modal.find('.modal-body  ').prop("selectedIndex", id_insurance-1);
                modal.find($("#insu option[value='"+3+"']").attr('selected', 'selected'));
                console.log('cambiaaa'+id_insurance)
                //Crear una function recibiendo el id

              });

              $('#edit_doc').on('submit',function(e){
                e.preventDefault();
                  var form=$(this);
                  var data=form.serialize();
                  var id=$('input[name=doc_id]').val();
                  var idvehicle=$('input[name=vehicle_id]').val();
                  var url='/documents/'+id+'/update/'

                  $.ajax({
                      url:url,
                      data:data,
                      type:'PUT',
                      beforeSend:function(){
                        $("#docu").html($("#cargador_empresa").html());
                      },
                      success:function(data){
                        if (data.rpt=='success') {
                          loadData('/documents/'+idvehicle+'/create');
                          swal("Registro Actualizado!", "clicked the button!", "success");
                        }else{
                          swal("Se presentaron problemas al actualizar!", "clicked the button!", "warning")
                        }
                        console.log(data);
                      },error:function(data){
                        msgError(data);
                      }
                  });
              });


          });
