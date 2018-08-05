@extends('layout.templatepanel')

@section('titulo')
	Rescate de criaturas mágicas | Avistamientos
@stop

@section('contenidopanel')
	<h2>Mis comentarios</h2>
	
	<table class="table avistamientos">
		<thead>
			<tr>
				<th>Fecha</th>
				<th>Criatura Comentada</th>
				<th>Mis Comentarios</th>
			</tr>
		</thead>	
		<tbody>	
			@if(count($comentarios) > 0)
			<?php
				foreach($comentarios as $unComentario) {
			?>			
				<tr>
					<td class="align-middle">
						{{$unComentario->created_at->format('d-M-Y h:m')}}
					</td>
					<td class="align-middle">
						{{$unComentario->criatura->nombre_criatura}}
					</td>
					<td class="align-middle">
						{{$unComentario->comentario}}
					</td>
				</tr>
			<?php
				} ?>	
			@else
				<tr>
					<td colspan=3>Aún no has realizado ningún comentario</td>
				</tr>
			@endif	
		</tbody>
	</table>
@stop

