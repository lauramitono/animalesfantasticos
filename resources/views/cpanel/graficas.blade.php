@extends('layout.templatepanel')

@section('titulo')
	Rescate de criaturas mágicas | Avistamientos
@stop

@section('contenidopanel')
	<h2>Estadísticas</h2>
	

		<div class="row graficas">
			<div class="col-md-4">
				<div class="box-grafica">
					<h3>Tipos de Usuarios</h3>
					<div id="donutchart_usuarios"></div>
				</div>	
			</div>
			<div class="col-md-3">
				<div class="box-grafica">
					<h3>Últimos Usuarios Registrados</h3>
					<div id="ultimosUsuarios">
						<table class="table">
							<tbody>
								<?php
									foreach($ultimosusuarios as $usuario) {
								?>
									<tr>
										<td class="align-middle">
											@if(!empty($usuario->img_users))
												<div class="avatar-ultimos-usuarios"><img class="mr-3 avatar" src="{{url('/storage/'. $usuario->img_users)}}" alt="{{ $usuario->name }}"></div>
											@else
												<div class="avatar-ultimos-usuarios"><img class="mr-3 avatar" src="{{ url('img/no_imagen_64x64.jpg') }}" alt="imagen por defecto"></div>
											@endif
										</td>
										<td class="align-middle">
											{{$usuario->name}} {{$usuario->apellido}}
										</td>
									</tr>
								<?php
									} 
								?>
							</body>
						</table>
					</div>		
				</div>	
			</div>
			<div class="col-md-5">
				<div class="box-grafica">
					<h3>Estados de los Usuarios</h3>
					<div id="donutchart_estadosUsuarios"></div>
				</div>	
			</div>
		</div>
		
		<div class="row graficas">
			<div class="col-md-4">
				<div class="box-grafica">
					<h3>Últimas Criaturas Rescatadas</h3>
					<div id="ultimosUsuarios">
						<table class="table">
							<tbody>
								<?php
									foreach($ultimascriaturas as $criatura) {
								?>
									<tr>
										<td class="align-middle">
											@if(!empty($criatura->imagen))
												<div class="avatar-ultimas-criaturas"><img class="mr-3 avatar" src="{{url('/storage/'. $criatura->imagen)}}" alt="{{ $criatura->nombre_criatura }}"></div>
											@else
												<div class="avatar-ultimas-criaturas"><img class="mr-3 avatar" src="{{ url('img/maleta.jpg') }}" alt="imagen por defecto"></div>
											@endif
										</td>
										<td class="align-middle">
											{{ str_limit($criatura->nombre_criatura, 30)}}
										</td>
									</tr>
								<?php
									} 
								?>
							</body>
						</table>
					</div>			
				</div>		
			</div>
			<div class="col-md-8">
				<div class="box-grafica">
					<h3>Cantidad de Criaturas Rescatadas por Habitat</h3>
					<div id="top_x_div_criaturasHabitats"></div>
				</div>	
			</div>
		</div>
		
		<div class="row graficas">
			<div class="col-md-6">
				<div class="box-grafica">
					<h3>Últimos Comentarios</h3>
					<div id="ultimosComentarios">
						<table class="table">
							<tbody>
								<?php
									foreach($ultimoscomentarios as $comentario) {
								?>
									<tr>
										<td class="align-middle">
											@if(!empty($comentario->img_users))
												<div class="avatar-ultimos-usuarios"><img class="mr-3 avatar" src="{{url('/storage/'. $comentario->img_users)}}" alt="{{ $comentario->name }}"></div>
											@else
												<div class="avatar-ultimos-usuarios"><img class="mr-3 avatar" src="{{ url('img/no_imagen_64x64.jpg') }}" alt="imagen por defecto"></div>
											@endif
										</td>
										<td class="align-middle">
											{{$comentario->apellido}}
										</td>
										<td class="align-middle">
											{{ str_limit($comentario->comentario, 50)}}
										</td>
									</tr>
								<?php
									} 
								?>
							</body>
						</table>
					</div>		
				</div>	
			</div>
			<div class="col-md-3">
				<div class="box-grafica">
					<h3>Total Usuarios</h3>
					<div id="totalUsuarios">
						<p>{{ $totalusuarios }}</p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="box-grafica">
					<h3>Total Criaturas Rescatadas</h3>
					<div id="totalCriaturas">
						<p>{{ $totalcriaturas }}</p>
					</div>
				</div>
			</div>			
		</div>

		<div class="row graficas">
			<div class="col-md-8">
				<div class="box-grafica">
					<h3>Estados de los Avistamientos</h3>
					<div id="chart_div_avistamientos"></div>
				</div>	
			</div>
			<div class="col-md-4">
				<div class="box-grafica">
					<h3>Últimos Avistamientos</h3>
					<div id="ultimosAvistamientos">
						<table class="table">
							<tbody>
								<?php
									foreach($ultimosavistamientos as $avistamiento) {
								?>
									<tr>
										<td class="align-middle">
											{{ str_limit($avistamiento->lugar, 20)}}
										</td>
										<td class="align-middle">
											@if($avistamiento->estado == 'encontrada')
												<span class="status text-success">•</span>
												{{$avistamiento->estado}}
											@else
												<span class="status text-danger">•</span>
												{{$avistamiento->estado}}
											@endif
										</td>
									</tr>
								<?php
									} 
								?>
							</body>
						</table>
					</div>	
				</div>
			</div>	
		</div>
				

	
	<!--Google chart-->
		<script type="text/javascript" src="<?= url('js/loader.js');?>"></script>
		<!--online-->
		<!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
		
		<!--Tipos de Usuario-->
		<script type="text/javascript">
		  google.charts.load("current", {packages:["corechart"]});
		  google.charts.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Tipo', 'Cantidad'],
				@foreach ($tiposUsuarios as $tipoUsuario)
					['{{ $tipoUsuario->tipo_usuario}}', {{ $tipoUsuario->total}}],
				@endforeach
			]);

			var options = {
			  pieHole: 0.4,
			  colors: ['#003546', '#006F92'],
			   chartArea:{width:'80%'}
			};

			var chart = new google.visualization.PieChart(document.getElementById('donutchart_usuarios'));
			chart.draw(data, options);
		  }
		</script>
		
		<!--Estados de los usuarios-->
		<script type="text/javascript">
		  google.charts.load("current", {packages:["corechart"]});
		  google.charts.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Estado', 'Cantidad'],
				@foreach ($estadosUsuarios as $pastels)
					['{{ $pastels->estado}}', {{ $pastels->total}}],
				@endforeach
			]);

			var options = {
			  pieHole: 0.4,
			  colors: ['#28a745', '#ffc107']
			};

			var chart = new google.visualization.PieChart(document.getElementById('donutchart_estadosUsuarios'));
			chart.draw(data, options);
		  }
		</script>
		
		<!--Estados de los Avistamientos-->
		<script type="text/javascript">
		  google.charts.load('current', {'packages':['bar']});
		  google.charts.setOnLoadCallback(drawStuff);

		  function drawStuff() {
			var data = new google.visualization.arrayToDataTable([
			  ['Estado', 'Cantidad'],
				@foreach ($estadosAvistamientos as $pastels)
					['{{ $pastels->estado}}', {{ $pastels->total}}],
				@endforeach
			]);

			var options = {
			  legend: { position: 'none' },
			  bars: 'horizontal', // Required for Material Bar Charts.
			  axes: {
				x: {
				  0: { side: 'top', label: 'Cantidad'} // Top x-axis.
				}
			  },
			  bar: { groupWidth: "70%" }
			};

			var chart = new google.charts.Bar(document.getElementById('chart_div_avistamientos'));
			chart.draw(data, options);
		  };
		</script>
		
		<!--Criaturas por Habitats-->
		<script type="text/javascript">
		  google.charts.load('current', {'packages':['bar']});
		  google.charts.setOnLoadCallback(drawStuff);

		  function drawStuff() {
			var data = new google.visualization.arrayToDataTable([
			  ['Habitats', 'Cantidad Criaturas'],
				@foreach ($criaturasPorHabitat as $criaturaPorHabitat)
					['{{ $criaturaPorHabitat->tipo}}', {{ $criaturaPorHabitat->total}}],
				@endforeach
			]);

			var options = {
          legend: { position: 'none' },
          axes: {
            x: {
              0: { side: 'top', label: 'Habitats'} // Top x-axis.
            },
			y: {
              0: { side: 'top', label: 'Cantidad'}
            }
          },
          bar: { groupWidth: "70%" },
		  colors: ['#006F92'],
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div_criaturasHabitats'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
		</script>
		
		
@stop

