

        $('#edit_date_i').datetimepicker({
          format: 'YYYY-MM-DD'
        });



        $('#edit_date_f').datetimepicker({
            useCurrent: false, //Important! See issue #1075
            format: 'YYYY-MM-DD',
        });
        $("#edit_date_i").on("dp.change", function (e) {
            $('#edit_date_f').data("DateTimePicker").minDate(e.date);
        });
        $("#edit_date_f").on("dp.change", function (e) {
            $('#edit_date_i').data("DateTimePicker").maxDate(e.date);
        });

    $('#edit_passenger').on("shown.bs.modal", function (event) {
        $("body").removeClass("modal-open");
        $("body").css({"padding-right":"0px"});

        var button  = $(event.relatedTarget);
        var id    = button.data('id');
        var name    = button.data('name');
        var cc    = button.data('cc');
        var no    = button.data('no');
        var nit    = button.data('nit');
        var date_ex    = button.data('date_ex');
        var placa   = button.data('placa');
        var date_ven   = button.data('date_ven');
        var state   = button.data('state');
        var iddriver   = button.data('iddriver');
        var idvehicle   = button.data('idstate');
        console.log('dsds'+state);
        var modal = $(this);
        modal.find('.modal-title').html('<center>Renovar : '+name+'<center>');
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);//id de documento
        modal.find('.modal-body #placa').val(placa);
        modal.find('.modal-body #iddriver').val(iddriver);
        modal.find('.modal-body #idvehicle').val(idvehicle);
        modal.find('.modal-body #cc').val(cc);
        modal.find('.modal-body #dv_no').val(no);
        modal.find('.modal-body #dv_nit').val(nit);
        //modal.find('.modal-body #dv_no').val(no);
        modal.find('.modal-body #st select').val(state);
        $('.selectpicker').selectpicker('refresh')
        modal.find('.modal-body #edit_date_i').val(date_ex);
        modal.find('.modal-body #edit_date_f').val(date_ven);
    });

      $('#send').unbind().click(function(e){
        e.preventDefault();
        var frm=$(this);
        var id=$('#id').val();
        var url='/tcontrol/'+id+'/update';
        var data=$("#edit_tcontrol").serialize();
        $.ajax({
              type: 'PUT',
              url: url,
              datatype:'json',
              data : data,
              beforeSend:function(){
                $("#table").html($("#cargador_empresa").html());
              },
              success : function(data){
                $('#edit_passenger').modal('hide')
            if (data.rpt=='success') {
                  loadData('/tcontrol');
                  swal("Registro actualizado!", "clicked the button!", "success")
                }else {
                    console.log("Error"+data.rpt);
                }
            },
        });
      });
