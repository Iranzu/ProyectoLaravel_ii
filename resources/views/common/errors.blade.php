@if (count($errors) > 0)
	<!-- Mostrar la lista de errores  -->
	<div class="alert alert-danger">
		<strong>¡ERROR!</strong>

		<br><br>

		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
