<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div id="smartwizard2" class="forms-wizard-alt">
			
				<ul class="forms-wizard">
					<li>
							<a href="#step-1">
									<em>1</em><span>Seleccion OT</span>
							</a>
					</li>
					<li>
							<a href="#step-2">
									<em>2</em><span>Información <span class="text-primary" id="ot_traer"></span> </span>
							</a>
					</li>
				</ul>
				
			<div class="form-wizard-content">
				<div id="step-1">
					<table class="table">
						<thead>
							<th>OT</th>
							<th>Empresa</th>
							<th>Usuario asignado</th>
							<th>Seleccionar</th>
						</thead>
						<tbody>
							{foreach from=$array_numot item=numot}
							<tr>
								<td>{$numot.ot}</td>
								<td>{$numot.empresa}</td>
								<td>{$numot.nombre_usuario} {$numot.apellido_usuario}</td>
								<td><input type="checkbox" class="form_control" id="select_ot" value="{$numot.id_numot}" data-nombre="{$numot.ot}"></td>
							</tr>
							{/foreach}
						</tbody>
					</table>
				</div><!--Cierre del step-12-->
				
				
				<div id="step-2">
					<div class="row">	
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">	
								</div>
								<div class="card-body">
									
									<div class="row" style="text-align:center"id="message_sin_ot">
										<div class="col-sm-12">
											<span class="text-danger">
												<h3>
												Debes seleccionar una OT
												</h3>
											</span>
										</div>
									</div>
									
									<div id="cuando_si_selecciona_ot">
										
									
										<div class="row">
											<div class="col-sm-6">
												<label>Empresa asignada:</label>
												<label class="text-secondary" id="empresa_ot"></label>
											</div>

											<div class="col-sm-6">
												<label>Fecha de registro:</label>
												<label class="text-secondary" id="fecha_ot"></label>
											</div>
										</div>

										<br>

										<div class="row">
											<div class="col-sm-6">
												<label>Usuario asignad@:</label>
												<label class="text-secondary" id="usuario_ot"></label>
											</div>
										</div>



										<br>
										<div class="row">
											<div class="col-sm-12">
												<label>Servicios asociados:</label>

												<table class="table">
													<thead>
														<th>Servicio</th>
														<th>Fecha</th>
														<th>Asignado</th>
														<th>Acciones</th>
													</thead>
													<tbody id="listando_servicios_para_ot">
													</tbody>
												</table>

											</div>
										</div>

										<br>

										<div class="row">
											<div class="col-sm-12">
												<label>Informes generados</label>
												<table class="table">
													<thead>
														<th>Informe</th>
														<th>Mapeo</th>
														<th>Estado</th>
														<th>Acciones</th>
													</thead>
													<tbody id="informes_ot">
													</tbody>
												</table>
											</div>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div><!--Cierre del step-12-->
				
				
			</div><!--Cierre del form-wizard content-->	
			</div><!--Cierre de smartwizard-->	
		</div>
		<div class="divider"></div>
		<div class="clearfix">
				<button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
				<button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Anterior</button>
		</div>
	</div>
</div>