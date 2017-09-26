
<div class="row">
	<div class="col-lg-3 col-xs-6">

		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>{{$countPass}}</h3>

				<p>Usuarios</p>
			</div>
			<div class="icon">
				<i class="ion-android-contacts"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>{{$countDri}}<!--<sup style="font-size: 20px">%</sup>--></h3>

				<p>Conductores</p>
			</div>
			<div class="icon">
				<i class="ion-person-stalker"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>{{$countVeh}}</h3>

				<p>Vehiculos registrados</p>
			</div>
			<div class="icon">
				<i class="ion-android-car"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>{{$countServe}}</h3>

				<p>Solicitudes de servicio</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-walk"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
</div>

<div class="row">
	<div class="col-lg-6 col-xs-6">

		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>

		<div id="container" style=""></div>
		<!-- small box -->

		<script>
		// Radialize the colors
Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
	return {
			radialGradient: {
					cx: 0.5,
					cy: 0.3,
					r: 0.7
			},
			stops: [
					[0, color],
					[1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
			]
	};
});

// Build the chart
Highcharts.chart('container', {
	chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
	},
	title: {
			text: 'Registro Conductores'
	},
	tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	},
	plotOptions: {
			pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %',
							style: {
									color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
							},
							connectorColor: 'silver'
					}
			}
	},
	series: [{
			name: 'Brands',
			data: [

					@foreach ($typeRegister as $data)

						{ name: "{{$data->type}}", y: {{$data->total}}},
					@endforeach
			]
	}]
});
		</script>


	</div>




	<div class="col-lg-6 col-xs-6">
		<div id="container2" style=""></div>
		<!-- small box -->

		<script>
		// Radialize the colors


// Build the chart
Highcharts.chart('container2', {
	chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
	},
	title: {
			text: 'Registro Vehículos'
	},
	tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	},
	plotOptions: {
			pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %',
							style: {
									color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
							},
							connectorColor: 'silver'
					}
			}
	},
	series: [{
			name: 'Brands',
			data: [

					@foreach ($typeRegvehicle as $datav)

						{ name: "{{$datav->type}}", y: {{$datav->total}}},
					@endforeach
			]
	}]
});
		</script>



	</div

</div>
<!-- /.row -->
<!-- Main row -->

<!-- GRAFICA
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width:310 px;heigh:400px; margin:0 auto">

</div>

<script type="">
$(document).ready(function () {
    Highcharts.setOptions({
        global: {
            useUTC: false
        }
    });

    Highcharts.chart('container', {
        chart: {
            type: 'spline',
            animation: Highcharts.svg, // don't animate in old IE
            marginRight: 10,
            events: {
                load: function () {

                    // set up the updating of the chart each second

                    var series = this.series[0];
                    setInterval(function () {
                        $.ajax({
                          url:'/graph',
                          type:'GET',
                          success:function(data){
                            var x = (new Date()).getTime(), // current time
                                y = data;
                            series.addPoint([x, y], true, true);
                          },error:function(data){
                            console.log(data);
                          }
                        });

                    }, 10000);
                }
            }
        },
        title: {
            text: 'Live random data'
        },
        xAxis: {
            type: 'datetime',
            tickPixelInterval: 150
        },
        yAxis: {
            title: {
                text: 'Value'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
                    Highcharts.numberFormat(this.y, 2);
            }
        },
        legend: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        series: [{
            name: 'Random data',
            data: (function () {
                // generate an array of random data
                var data = [],
                    time = (new Date()).getTime(),
                    i;

                for (i = -19; i <= 0; i += 1) {
                    data.push({
                        x: time + i * 1000,
                        y: Math.random()
                    });
                }
                return data;
              }())
            }]
          });
  });

</script>
-->
