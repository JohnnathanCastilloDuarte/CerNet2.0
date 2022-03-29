 <div class="row">
 	<div class="col-sm-12">
 		{foreach from=$array_incubadora  item=incubadora}
 		<div class="card">
 			<div class="card-header">
 				<h5>
 					Edición del equipo <span>{$incubadora.nombre_incubadora}</span>
 				</h5>
 			</div>
 			<div class="card-body">
 				<div id="smartwizard2" class="forms-wizard-alt">
 					<ul class="forms-wizard">
 						<li>
 							<a href="#step-12">
 								<em>1</em><span>Identificación</span>
 							</a>
 						</li>
 						<li>
 							<a href="#step-22">
 								<em>2</em><span>Infraestructura</span>
 							</a>
 						</li>

							</ul>

							<div class="form-wizard-content">
								<div id="step-12">
									<div class="form-row">
										<div class="col-sm-6">
											<input type="hidden" id="id_item_incubadora" value="{$incubadora.id_incubadora}">
											<input type="hidden" id="id_item_2" value="{$incubadora.id_item}">
											<label>Nombre del incubadora</label>
											<input type="text" id="nombre_incubadora" class="form-control" value="{$incubadora.nombre_item}" placeholder="Nombre incubadora"> 
										</div>
										<div class="col-sm-6">
											<label>Empresa</label>
											<input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="{$incubadora.nombre_empresa}">
											<input type="hidden" id="id_empresa" value="{$incubadora.id_empresa}">
											<div>
												<table class="table" id="aqui_resultados_empresa" >
												</table>
											</div> 
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-6">
											<label>Fabricante/Marca:</label>
											<input type="text" id="marca_incubadora" class="form-control" placeholder="Fabricante incubadora" value="{$incubadora.fabricante}">
										</div>
										<div class="col-sm-6">
											<label>Modelo:</label>
											<input type="text" id="modelo_incubadora" class="form-control" placeholder="Modelo incubadora" value="{$incubadora.modelo}">
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-12">
											<label>Descripcion:</label>
											<textarea class="form-control" id="desc_incubadora">{$incubadora.descripcion}</textarea>
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-6">
											<label>N° Serie / Código interno:</label>
											<input type="text" id="n_serie_incubadora" class="form-control" placeholder="N° Serie" value="{$incubadora.n_serie}">
										</div>
										<div class="col-sm-6">
											<label>fecha fabricación</label>
											<input type="date" id="fecha_fabricacion_incubadora" class="form-control" placeholder="" value="{$incubadora.fecha_fabricacion}">
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-4">
											<label>Dirección equipo:</label>
											<input type="text" id="direccion_incubadora" class="form-control" placeholder="Dirección equipo" value="{$incubadora.direccion}">
										</div>
										<div class="col-sm-4">
											<label>Ubicación interna equipo:</label>
											<input type="text" id="ubicacion_interna_incubadora" class="form-control" placeholder="Ubicación equipo" value="{$incubadora.ubicacion_interna}">
										</div>
										<div class="col-sm-4">
											<label>Área interna equipo:</label>
											<input type="text" id="area_interna_incubadora" class="form-control" placeholder="Área equipo" value="{$incubadora.area_interna}">
										</div>
									</div>
								</div>

								<div id="step-22">
									<br>
									<div class="form-row">
										<div class="col-sm-4">
											<label>Valor seteado:</label>
											<input type="text" id="valor_seteado" class="form-control" placeholder="Valor seteado" value="{$incubadora.valor_seteado}">
										</div>
										<div class="col-sm-4">
											<label>Limite máximo (°C):</label>
											<input type="text" id="limite_maximo" class="form-control" placeholder="Limite máximo en °C" value="{$incubadora.limite_maximo}">
										</div>
										<div class="col-sm-4">
											<label>Limite minimo (°C):</label>
											<input type="text" id="limite_minimo" class="form-control" placeholder="Limite minimo en °C" value="{$incubadora.limite_minimo}">
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-12" style="text-align:center;">
											<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_item_incubadora">Nuevo</button> 
											<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_incubadora">Actualizar</button>
										</div>
									</div>

								</div>
							</div><!---Cierre del content-->
						</div><!--Cierre del wizard-->	
						<div class="divider"></div>
						<div class="clearfix">
							<button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
							<button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Anterior</button>
						</div>


					</div>
				</div>
				{/foreach}
			</div>
		</div>
		<script type="text/javascript" src="design/js/update_incubadora.js"></script>