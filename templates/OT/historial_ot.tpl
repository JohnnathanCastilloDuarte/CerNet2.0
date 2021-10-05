<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>
							Historial OT 
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