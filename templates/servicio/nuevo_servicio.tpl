<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#crear_servicio_tipo">
		<span>Nuevo servicio</span>
		</a>
	</li>
	<li class="nav-item">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#historial_servicio_tipo">
		<span>Historial de servicios</span>
		</a>
	</li>
</ul>

<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="crear_servicio_tipo" role="tabpanel">
		<div class="row">
			<div class="col-sm-4">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12" style="text-align:center;">
								<input type="hidden"  id="id_tipo_servicio">
								<label>Nombre del servicio:</label>
								<input type="text" id="servicio_nuevo" class="form-control" placeholder="Ingrese el nombre del servicio">
								<br>
								<label>Modulo</label>
								<select class="form-control" id="modulo_tipo_servicio">
									<option value="" id="ultimo_modulo">Seleccione...</option>
									{foreach from=$array_modulo  item=modulo}
									<option value="{$modulo.id_modulo}">{$modulo.nombre_modulo} - {$modulo.area}</option>
									{/foreach}
								</select>
								<br>
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nuevo_tipo_servicio">Aceptar</button>
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_servicio_tipo">Actualizar</button>
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="reload"><i class="pe-7s-repeat"></i></button>
								
							</div>
						</div>
					</div>
				</div>	
			</div>
			
			<div class="col-sm-8">
				<div class="card">
					<div class="card-header"><h6>Ultimos servicios creados</h6></div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<table class="table">
									<thead style="text-align:center;">
										<th>Servicio</th>
										<th>Modulo</th>
										<th>Usuario</th>
										<th>Fecha creación</th>
										<th>Acciones</th>
									</thead>
									<tbody id="resultados_servicios">
									
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
		
	</div>
	
	<div class="tab-pane tabs-animation fade show" id="historial_servicio_tipo" role="tabpanel">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<i class="badge badge-dot badge-dot-xl badge-success">.</i>Crear
						<i class="badge badge-dot badge-dot-xl badge-warning">.</i>Editar
						<i class="badge badge-dot badge-dot-xl badge-danger">.</i>Eliminar
						 <div class="scroll-area-lg">
								<div class="scrollbar-container">
									{foreach from=$array_historial item=historial}
									{if $historial.tipo_historial eq 1}
									{$color="success"}
									{elseif $historial.tipo_historial eq 2}
									{$color="warning"}
									{elseif $historial.tipo_historial eq 3}
									{$color="danger"}
									{/if}
			
									<div class="vertical-time-icons vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
										<div class="vertical-timeline-item vertical-timeline-element">
											<div>
												<span class="vertical-timeline-element-icon bounce-in">
													<div class="timeline-icon border-{$color}">
														<i class="badge badge-dot badge-dot-xl badge-{$color}"></i>
													</div>
												</span>
												<div class="vertical-timeline-element-content bounce-in">
													<h4 class="timeline-title">{$historial.nombre} {$historial.apellido}<br><span class="badge badge-dark">Hora movimiento: {$historial.fecha_registro}</span></h4>
														<p><h6>{$historial.mensaje}</h6></p>
												</div>
											</div>
										</div>	
									</div>
									{/foreach}
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
</div>