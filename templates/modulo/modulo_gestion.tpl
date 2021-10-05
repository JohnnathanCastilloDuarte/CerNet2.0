<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#crear_modulo">
		<span>Crear modulo</span>
		</a>
	</li>
	<li class="nav-item">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#historial_modulo">
		<span>Historial de modulo</span>
		</a>
	</li>
</ul>
<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="crear_modulo" role="tabpanel">
		<div class="row">
			<div class="col-sm-5">
				<div class="card">
					<div class="card-header">
						<h5>
							Crear Modulo
						</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<input type="hidden" id="id_oculto">
							<label>Nombre modulo:</label>
							<input type="text" id="nombre_modulo" class="form-control" placeholder="Ingresa el nombre del modulo">
						</div>
						<br>
						<div class="row">
							<label>Area:</label>
							<input type="text" id="area_modulo" class="form-control" placeholder="Ingresa el area del modulo">
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4"></div>
							<div class="col-sm-4">
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nuevo_modulo">Aceptar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-sm-7">
				<div class="card">
					<div class="card-header">
						<h5>
							Modulos creados
						</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="mb-0 table table-bordered" id="example">
									<th  style="text-align: center;"  width="40%">Nombre</th>
									<th  style="text-align: center;"  width="30%">Area</th>
									<th  style="text-align: center;"  width="30%">Acciones</th>
							</table>
							<div class="scroll-area-sm">
            		<div class="scrollbar-container">
									<table class="mb-0 table table-bordered" >
										<tbody id="lista_modulos">
										</tbody>
									</table>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
	
	<div class="tab-pane tabs-animation fade show" id="historial_modulo" role="tabpanel">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>
							Historial Modulo
						</h4>				
					</div>
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
														<h4 class="timeline-title">{$historial.nombre} {$historial.apellido} <br><span class="badge badge-dark"></span></h4>
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
