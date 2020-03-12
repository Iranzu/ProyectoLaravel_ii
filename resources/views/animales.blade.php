<!--COMPLETA: extiende el layout -->
@extends('layouts.app')
<!--COMPLETA: empieza la sección -->
@section('content')
<div class="container">
	<div class="col-offset-2 col-10">
		<!-- En este punto IRA el formulario para añadir una nueva actividad -->
		<div class="panel panel-default" id="nuevo">
			<div class="panel-heading">
				Nuevo Animal
			</div>
			<div class="panel-body">
				@include('common.errors')

				<form action="{{url('/animal')}}" method="POST" class="form-horizontal">
					{{csrf_field()}}
					<div class="form-group col-md-12 control-label">
						<label for="numchip">NumChip: </label>
						<input type="number" class="form-control" name="numchip" value="{{old('numchip')}}">
						<span class="text-danger">{{ $errors->first('numchip') }}</span>
					</div>
					<div class="form-group col-md-12 control-label">
						<label for="nombre">Nombre: </label>
						<input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
						<span class="text-danger">{{ $errors->first('nombre') }}</span>
					</div>
					<div class="form-group col-md-12 control-label">
						<label for="edad">Edad: </label>
						<input type="number" class="form-control" name="edad" value="{{old('edad')}}">
						<span class="text-danger">{{ $errors->first('edad') }}</span>
					</div>
					<div class="form-group col-md-12 control-label">
						<label for="genero">Género: </label>
						<div class="col-md-12" id="genero" name="genero">
							<div class="radio">
								<label for="genero-0">
									<input type="radio" name="genero" id="genero-0" value="Macho" {{(old('genero') == 'Macho') ? 'checked' : ''}}>Macho
								</label>
							</div>
							<div class="radio">
								<label for="genero-1">
									<input type="radio" name="genero" id="genero-1" value="Hembra" {{(old('genero') == 'Hembra') ? 'checked' : ''}}>Hembra
								</label>
							</div>
							<span class="text-danger">{{ $errors->first('genero') }}</span>
						</div>

					</div>
					<div class="form-group col-md-12 control-label">
						<label for="raza">Raza: </label>
						<input type="text" class="form-control" name="raza" value="{{old('raza')}}">
						<span class="text-danger">{{ $errors->first('raza') }}</span>
					</div>
					<div class="form-group col-md-12 control-label">
						<label for="salud">Salud: </label>
						<div>
							<select id="salud" name="salud" class="form-control">
								<?php
								$valores = ["Buena Salud", "Mala Salud"];
								foreach ($valores as $clave => $val) {
									echo "<option value='$val'>$val</option>";
								}
								?>
							</select>
						</div>
						<span class="text-danger">{{ $errors->first('salud') }}</span>
					</div>
					<div class="form-group col-md-12 control-label">
						<label for="descripcion">Descripcion: </label>
						<textarea class="form-control" id="descripcion" name="descripcion" placeholder="Introduzca una breve descripción">{{old('descripcion')}}</textarea>
						<span class="text-danger">{{ $errors->first('descripcion') }}</span>
					</div>
					<div class="form-group col-md-12 control-label">
						<button type="submit" class="btn btn-primary col-md-12">Añadir</button>
					</div>

				</form>
			</div>


		</div>

		<!-- Actividades Actuales -->
		@if(count($animales) > 0)
		<!--COMPLETA: Si el nº de actividades es >0 -->
		<div class="panel panel-default" id="actuales">
			<div class="panel-heading">
				Animales Actuales
			</div>

			<div class="panel-body">
				<table class="table table-striped task-table">
					<thead>
						<th>NumChip</th>
						<th>Nombre</th>
						<th>Edad</th>
						<th>Genero</th>
						<th>Raza</th>
						<th>Salud</th>
						<th>Descripcion</th>
					</thead>
					<tbody>
						@foreach($animales as $animal)
						<!--COMPLETA: recorre el array de actividades -->
						<tr>
							<td class="table-text">
								<div>{{$animal->numchip}}</div>
							</td>
							<td class="table-text">
								<div>{{$animal->nombre}}</div>
							</td>
							<td class="table-text">
								<div>{{$animal->edad}}</div>
							</td>
							<td class="table-text">
								<div>{{$animal->genero}}</div>
							</td>
							<td class="table-text">
								<div>{{$animal->raza}}</div>
							</td>
							<td class="table-text">
								<div>{{$animal->salud}}</div>
							</td>
							<td class="table-text">
								<div>{{$animal->descripcion}}</div>
							</td>
							<td>
								<form action="{{url('/animal/deleteanimal')}}" method="POST">
									{{csrf_field()}}
									<input type="hidden" name="id_animal" value="{{$animal->id}}">
									<button type="submit" class="btn btn-danger">
										<i class="fa fa-trash"></i>Borrar
									</button>
								</form>
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