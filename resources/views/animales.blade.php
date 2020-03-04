<!--COMPLETA: extiende el layout -->
@extends('layouts.app')
<!--COMPLETA: empieza la sección -->
@section('content')
<div class="container">
	<div class="col-sm-offset-2 col-sm-8">

		<!-- En este punto IRA el formulario para añadir una nueva actividad -->
		<div class="panel panel-default">
			<div class="panel-heading">
				Nuevo Animal
			</div>
			<div class="panel-body">
				@include('common.errors')

				<form action="{{url('/animal')}}" method="POST" class="form-horizontal">
					{{csrf_field()}}
					<div class="form-group">
						<label for="numChip">NumChip: </label>
						<input type="text" class="form-control" id="numChip">
					</div>
					<div class="form-group">
						<label for="nombre">Nombre: </label>
						<input type="text" class="form-control" id="nombre">
					</div>
					<button type="submit" class="btn btn-primary">Añadir</button>
				</form>
			</div>


		</div>

		<!-- Actividades Actuales -->
		@if (count($animales) > 0)
		<!--COMPLETA: Si el nº de actividades es >0 -->
		<div class="panel panel-default">
			<div class="panel-heading">
				Animales Actuales
			</div>

			<div class="panel-body">
				@include('common.errors')
				<table class="table table-striped task-table">
					<thead>
						<th>NumChip</th>
						<th>Nombre</th>
					</thead>
					<tbody>
						@foreach ($animales as $valor)
						<!--COMPLETA: recorre el array de actividades -->
						<tr>
							<td class="table-text">
								<div>{{ $valor->numChip}}</div>
							</td>
							<td class="table-text">
								<div>{{ $valor->nombre}}</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		@endif
	</div>
</div>
<!--COMPLETA: termina la sección -->
@endsection