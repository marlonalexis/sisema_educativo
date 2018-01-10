@extends('layout.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Personas <a href="personas/create"><button class="btn btn-primary">Nuevo</button></a></h3>
		@include('my.personas.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
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
						<a href=""><button class="btn btn-info">Editar</button></a>
						<a href=""><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
@if($personas->hasPages())
	<div class="pagination-wrapper">
    	<div class="pagination-wrapper-inner">
        	{!! $personas->render() !!}
        </div>
	</div>
@endif
		
	</div>
</div>
@endsection