									<div class="modal fade modal-slide-in-right" id="modal-delete-{{$per->idpersonas}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
										{{Form::Open(array('action'=>array('PersonasController@destroy',$per->idpersonas),'method'=>'delete'))}}
									  <div class="modal-dialog">
									  	<div class="modal-content">
									  		<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">x</span>
											</button>
											<h4 class="modal-title">Eliminar Persona</h4>
									  		</div>
									  		<div class="modal-body">
									  			<p>Confirme SI desea Eliminar a la Persona <strong>{{$per->nombres}}</strong></p>
									  		</div>
									  		<div class="modal-footer">
									  			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									  			<button type="sutmit" class="btn btn-primary">Confirmar</button>
									  		</div>
									  	</div>
									  </div>
										{{Form::Close()}}
									</div>