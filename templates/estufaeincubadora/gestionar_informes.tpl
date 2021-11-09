<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h6>
					Lista informes para estufa
				</h6>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="card">
							<div class="card-header">
								<div class="form-row">
									<div class="col-sm-9">
										Informes Mapeo
									</div>
									<div class="col-sm-9">
										Generados: <span class="badge badge-pill badge-primary" id="mapeo_estufa_generados">-</span>
										En proceso: <span class="badge badge-pill badge-warning" id="mapeo_estufa_proceso">-</span>
										Terminados: <span class="badge badge-pill badge-danger" id="mapeo_estufa_terminados">-</span>
									</div>
								</div>
							</div>
							<div class="card-body">
								<table class="table">
									<thead>
										<th>OT</th>
										<th>Item</th>
										<th>Empresa</th>
										<th>Usuario asignado</th>
										<th>Acciones</th>
									</thead>
									<tbody>
										{if $conteo_mapeo == 0}
										<tr>
											<td>
											
													Sin resultados
												
											</td>	
										</tr>	
										{else}
										{foreach from=$array_mapeo item=mapeo}
										<tr>
											<td>{$mapeo.numot}</td>
											<td>{$mapeo.item}</td>
											<td>{$mapeo.empresa}</td>
											<td>{$mapeo.nombre_usuario} {$mapeo.apellido_usuario}</td>
											<td>
												<a href="index.php?module={$modulo[6]}&page={$page[1]}&asignado={$mapeo.id_asignado}&type={$id_servicio_mapeo}" class="btn btn-outline-success">Informe</a>
											</td>
										</tr>
										{/foreach}
										{/if}
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="card">
							<div class="card-header">
								<div class="form-row">
									<div class="col-sm-9">
										Informes Calificación
									</div>
									<div class="col-sm-9">
										Generados: <span class="badge badge-pill badge-primary" id="calificacion_refrigerador_generados">-</span>
										En proceso: <span class="badge badge-pill badge-warning" id="calificacion_refrigerador_proceso">-</span>
										Terminados: <span class="badge badge-pill badge-danger" id="calificacion_refrigerador_terminados">-</span>
									</div>
								</div>
							</div>
							<div class="card-body">
								<table class="table">
									<thead>
										<th>OT</th>
										<th>Item</th>
										<th>Empresa</th>
										<th>Usuario asignado</th>
										<th>Acciones</th>
									</thead>
									<tbody>
									{foreach from=$array_calificacion  item = calificacion}
										<tr>
											<td>{$calificacion.numot}</td>
											<td>{$calificacion.item}</td>
											<td>{$calificacion.empresa}</td>
											<td>{$calificacion.nombre_usuario} {$calificacion.apellido_usuario}</td>
											<td>
												<!--<a href="index.php?module={$modulo[9].Informes}&page={$page[1]}&type={$id_servicio_mapeo}" class="btn btn-outline-success" >Informe</a>-->
											</td>
										</tr>
										
									{/foreach}	
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