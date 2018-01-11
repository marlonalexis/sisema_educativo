@extends('layout.admin')
@section('contenido')
<div class="card-header">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<th>Id</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
				<tbody>
				@foreach($personas as $per)
				<tr>
					<td>{{ $per->idpersonas}}</td>
					<td>{{ $per->nombres}}</td>
					<td>{{ $per->apellidos}}</td>
					<td>{{ $per->estado}}</td>
					<td>
						<a href=""><button class="btn btn-info">Editar</button></a>
						<a href=""><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@endforeach
				</tbody>
			</table>
        	{{ $personas->render() }}
</div>
</div>
@endsection