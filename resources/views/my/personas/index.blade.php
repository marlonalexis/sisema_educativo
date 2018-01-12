@extends('layout.admin')
@section('contenido')
<div class="card-header">
<div class="row">
	@include('alerts.success')
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
				<tbody>
				@foreach($personas as $per)
				<tr>
					<td>{{ $per->idpersonas}}</td>
					<td>{{ $per->nombres}}</td>
					<td>{{ $per->apellidos}}</td>
					@if ($per->estado == 'A')
					<td><div class="tag tag-pill tag-success">Activo</div></td>
					@else
					<td><div class="tag tag-pill tag-danger">Inactivo</div></td>
					@endif
					<td>
						<a href="{{URL::action('PersonasController@edit',$per->idpersonas)}}"><button class="btn btn-info">Editar</button></a>
						@if ($per->estado == 'A')
						<a href="" data-target="#modal-delete-{{$per->idpersonas}}" data-toggle="modal"><button class="btn btn-danger">Inactivar</button></a>
						@endif
					</td>
				</tr>
				@include('my.personas.modal')
				@endforeach
				</tbody>
			</table>
        	{{ $personas->render() }}
</div>
</div>
@endsection