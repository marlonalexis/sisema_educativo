@extends('layout.admin')
@section('contenido')
		<div class="card-header">
			<h3>Editar Persona: {{$personas->nombres}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger mb-2" role="alert">
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
			</div>
			@endif
			{!! Form::model($personas, ['route' => ['personas.update', $personas->idpersonas], 'method' => 'PUT']) !!}
			{{Form::token()}}
									<form class="form">
							<div class="form-body">
								<h4 class="form-section"><i class="icon-head"></i> Informacion Personal</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="nombres">Nombres</label>
											<input type="text" id="nombres" class="form-control" value="{{$personas->nombres}}" placeholder="Nombres" name="nombres">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="apellidos">Apellidos</label>
											<input type="text" id="apellidos" class="form-control" value="{{$personas->apellidos}}" placeholder="Apellidos" name="apellidos">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">E-mail</label>
											<input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="email" value="{{$user->email}}" disabled="disabled">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput4">Contact Number</label>
											<input type="text" id="projectinput4" class="form-control" placeholder="Phone" name="phone">
										</div>
									</div>
								</div>

								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

								<div class="form-group">
									<label for="companyName">Company</label>
									<input type="text" id="companyName" class="form-control" placeholder="Company Name" name="company">
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="estado">Estado</label>
											<select id="estado" name="estado" class="form-control">
												<option @if($personas->estado=='A') selected="selected" @endif value="A" >Activar</option>
												<option @if($personas->estado=='I') selected="selected" @endif value="I">Inactivar</option>
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput6">Budget</label>
											<select id="projectinput6" name="budget" class="form-control">
												<option value="0" selected="" disabled="">Budget</option>
												<option value="less than 5000$">less than 5000$</option>
												<option value="5000$ - 10000$">5000$ - 10000$</option>
												<option value="10000$ - 20000$">10000$ - 20000$</option>
												<option value="more than 20000$">more than 20000$</option>
											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label>Select File</label>
									<label id="projectinput7" class="file center-block">
										<input type="file" id="file">
										<span class="file-custom"></span>
									</label>
								</div>

								<div class="form-group">
									<label for="projectinput8">About Project</label>
									<textarea id="projectinput8" rows="5" class="form-control" name="comment" placeholder="About Project"></textarea>
								</div>
							</div>

							<div class="form-actions">
								<a href="{{ URL::previous() }}"><button type="button" class="btn btn-warning mr-1">
									<i class="icon-cross2"></i> Cancelar
								</button></a>
								<button type="submit" class="btn btn-primary">
									<i class="icon-check2"></i> Guardar
								</button>
							</div>
						</form>
			{!!Form::close()!!}
		</div>
@stop