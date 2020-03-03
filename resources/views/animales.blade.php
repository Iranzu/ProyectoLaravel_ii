<!--COMPLETA: extiende el layout -->
@extends('layouts.app')
<!--COMPLETA: empieza la sección -->
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
		
			<!-- En este punto IRA el formulario para añadir una nueva actividad -->
			
			<!-- Actividades Actuales -->
			@if (<!--COMPLETA: Si el nº de actividades es >0 -->)
				<div class="panel panel-default">
					<div class="panel-heading">
						 Actividades Actuales
					</div>

					<div class="panel-body">
						@include('common.errors')
						<table class="table table-striped task-table">
							<thead>
								<th>Actividad</th>
								<th>Fecha</th>
							</thead>
							<tbody>
								@foreach (<!--COMPLETA: recorre el array de actividades -->)
									<tr>
										<td class="table-text"><div>{{ <!--COMPLETA: un campo --> }}</div></td>
										<td class="table-text"><div>{{ <!--COMPLETA: otro campo -->}}</div></td>
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
