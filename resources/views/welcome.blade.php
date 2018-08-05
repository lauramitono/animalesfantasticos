@extends('layout.template')

@section('titulo')
	Rescate de criaturas mágicas
@stop

@section('contenido')
	<div class="container-fluid" id="inicio">
	@if(Session::has('status'))
		<div class="alert alert-success">{{ Session::get('status') }}</div>
	@endif
		<div class="row justify-content-left align-items-center">
			<div class="col-md-5">
				<h1>Rescate de Criaturas Mágicas</h1>
				<p>Sos un alma curiosa? Amás a las criaturas fantásticas? Estás dispuesto a todo para protegerlas de los muggles?</p>
				<p>Necesitamos de tu ayuda!</p>
				<p>Sumate a nuestro grupo de aventureros y cuidemos a todas las criaturas fantásticas!</p>
				<p>No hace falta que seas un auror, con tan sólo tu espíritu aventurero alcanza.</p>
				<p>Reportanos todas las criaturas que encuentres para que podamos ir a rescatarlas y así puedan volver a un habitat seguro.</p>
				<p>Juntos podemos salvarlas a todas!!!</p>
				<div class="text-center">
					<a class="nav-link btn btn-primary" href="<?= url('public/formReportar');?>">Reportar criatura</a>
				</div>
			</div>
		</div>
	</div>
@stop