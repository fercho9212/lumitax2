<link rel="stylesheet" href="//cdn.datatables.net/plug-ins/1.10.15/api/fnReloadAjax.js">
<style>
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
<!--
<table cellpadding="3" cellspacing="0" border="0" style="width: 67%; margin: 0 auto 2em auto;">
        <thead>
            <tr>
                <th>Target</th>
                <th>Search text</th>
                <th>Treat as regex</th>
                <th>Use smart search</th>
            </tr>
        </thead>
        <tbody>
            <tr id="filter_global">
                <td>Global search</td>
                <td align="center"><input type="text" class="global_filter" id="global_filter"></td>
                <td align="center"><input type="checkbox" class="global_filter" id="global_regex"></td>
                <td align="center"><input type="checkbox" class="global_filter" id="global_smart" checked="checked"></td>
            </tr>
            <tr id="filter_col1" data-column="0">
                <td>Column - Name</td>
                <td align="center"><input type="text" class="column_filter" id="col0_filter"></td>
                <td align="center"><input type="checkbox" class="column_filter" id="col0_regex"></td>
                <td align="center"><input type="checkbox" class="column_filter" id="col0_smart" checked="checked"></td>
            </tr>
            <tr id="filter_col2" data-column="1">
                <td>Column - Position</td>
                <td align="center"><input type="text" class="column_filter" id="col1_filter"></td>
                <td align="center"><input type="checkbox" class="column_filter" id="col1_regex"></td>
                <td align="center"><input type="checkbox" class="column_filter" id="col1_smart" checked="checked"></td>
            </tr>
            <tr id="filter_col3" data-column="2">
                <td>Column - Office</td>
                <td align="center"><input type="text" class="column_filter" id="col2_filter"></td>
                <td align="center"><input type="checkbox" class="column_filter" id="col2_regex"></td>
                <td align="center"><input type="checkbox" class="column_filter" id="col2_smart" checked="checked"></td>
            </tr>
            <tr id="filter_col4" data-column="3">
                <td>Column - Age</td>
                <td align="center"><input type="text" class="column_filter" id="col3_filter"></td>
                <td align="center"><input type="checkbox" class="column_filter" id="col3_regex"></td>
                <td align="center"><input type="checkbox" class="column_filter" id="col3_smart" checked="checked"></td>
            </tr>
            <tr id="filter_col5" data-column="4">
                <td>Column - Start date</td>
                <td align="center"><input type="text" class="column_filter" id="col4_filter"></td>
                <td align="center"><input type="checkbox" class="column_filter" id="col4_regex"></td>
                <td align="center"><input type="checkbox" class="column_filter" id="col4_smart" checked="checked"></td>
            </tr>
            <tr id="filter_col6" data-column="5">
                <td>Column - Salary</td>
                <td align="center"><input type="text" class="column_filter" id="col5_filter"></td>
                <td align="center"><input type="checkbox" class="column_filter" id="col5_regex"></td>
                <td align="center"><input type="checkbox" class="column_filter" id="col5_smart" checked="checked"></td>
            </tr>
        </tbody>

    </table>
-->
<div class="table-responsive text-center">
    <table class="table table-striped table-bordered dt-responsive display nowrap" id="tablehistory">
      <thead>
          <tr>
              <th>CC.driver</th>
              <th>Placa</th>
              <th>Conductor</th>
              <th>Pasajero</th>
              <th>Fecha Solicitud</th>
              <th>Origen</th>
              <th>Estado</th>
              <th>Pago</th>
              <th>Precio</th>
              <th>Destino</th>
              <th>Fecha destino</th>



          </tr>
      </thead>
      <tfoot>
          <tr>
            <th>CC.driver</th>
            <th>Placa</th>
            <th>Conductor</th>
            <th>Pasajero</th>
            <th>Fecha Solicitud</th>
            <th>Origen</th>
            <th>Estado</th>
            <th>Pago</th>
            <th>Precio</th>
            <th>Destino</th>
            <th>Fecha destino</th>


          </tr>
      </tfoot>

</table>
</div>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#tablehistory tfoot th').each( function () {

     var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Buscar Por:'+title+'" />' );

    });


      var table=$('#tablehistory').DataTable( {

        "dom": 'lBfrtip',

        "buttons": [
                    {
                        extend: 'collection',
                        text: 'Exportar',
                        buttons: [
                            'copy',
                            'excel',
                            'pdf',
                            'print'
                        ],
                        className: 'btn btn-info',
                    }
                ],

            "ajax": {
                    "url": "/gethistory",
                    "type": "GET",
                    "dataSrc": 'data',
               },
               columns: [
                { data: 'ccdriver' },
                { data: 'placa' },
                { data: 'driver' },
                { data: 'passenger' },
                { data: 'date_start' },
                { data: 'address_start' },
                { data: 'state' },
                { data: 'payment' },
                { data: 'price' },
                { data: 'address_end' },
                { data: 'date_end' },]


    } );
                table.columns().every( function () {
                        var that = this;

                     $( 'input', this.footer() ).on( 'keyup change', function () {
                         if ( that.search() !== this.value ) {
                             that
                                 .search( this.value )
                                 .draw();
                         }
                     });
                 });







  } );

  </script>
