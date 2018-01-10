@extends('layout.admin')
@section('contenido')
<div class="card-header">
<div class="row">
	<div>
		<h3>Listado de Personas <a href="personas/create"><button class="btn btn-primary">Nuevo</button></a></h3>
		@include('my.personas.search')
	</div>
</div>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<th>Id</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
				@foreach($personas as $per)
				<tr>
					<td>{{ $per->idpersonas}}</td>
					<td>{{ $per->nombres}}</td>
					<td>{{ $per->apellidos}}</td>
					<td>{{ $per->estado}}</td>
					<td>
						<a href="{{URL::action('PersonasController@edit',$per->idpersonas)}}"><button class="btn btn-info">Editar</button></a>
						<a href=""><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@endforeach
			</table>
        	{!!$personas->render()!!}
@endsection
</div>