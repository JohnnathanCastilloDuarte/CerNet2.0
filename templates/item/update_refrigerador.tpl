 <div class="row">
 	<div class="col-sm-12">
 		{foreach from=$array_refrigerador  item=refrigerador}
 		<div class="card">
 			<div class="card-header">
 				<h5>
 					Edición del equipo <span>{$refrigerador.nombre_refrigerador}</span>
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
								<em>3</em><span>Especificación</span>
							</a>
						</li>
 						<li>
 							<a href="#step-32">
 								<em>2</em><span>Infraestructura</span>
 							</a>
 						</li>
						<!--	
						<li id="si_envia">
									<a href="#step-42">
											<em>4</em><span>Evidencia</span>
									</a>
								</li>-->
					</ul>

							<div class="form-wizard-content">
								<div id="step-12">
									<div class="form-row">
										<div class="col-sm-6">
											<input type="hidden" id="id_item_refrigerador" value="{$refrigerador.id_refrigerador}">
											<input type="hidden" id="id_item_2" value="{$refrigerador.id_item}">
											<label>Nombre del refrigerador</label>
											<input type="text" id="nombre_refrigerador" class="form-control" value="{$refrigerador.nombre_item}" placeholder="Nombre refrigerador"> 
										</div>
										<div class="col-sm-6">
											 <label>Empresa:</label>
					                    <input type="hidden" id="id_empresa" value="{$refrigerador.id_empresa}">
					                    <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="{$refrigerador.nombre_empresa}">
					                    <div >
					                      <table class="table" id="aqui_resultados_empresa">
					                      </table>
					                    </div>
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-6">
											<label>Fabricante/Marca:</label>
											<input type="text" id="fabricante_refrigerador" class="form-control" placeholder="Fabricante refrigerador" value="{$refrigerador.fabricante}">
										</div>
										<div class="col-sm-6">
											<label>Modelo:</label>
											<input type="text" id="modelo_refrigerador" class="form-control" placeholder="Modelo refrigerador" value="{$refrigerador.modelo}">
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-12">
											<label>Descripcion:</label>
											<textarea class="form-control" id="desc_refrigerador">{$refrigerador.descripcion}</textarea>
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-4">
											<label>N° Serie:</label>
											<input type="text" id="n_serie_refrigerador" class="form-control" placeholder="N° Serie" value="{$refrigerador.n_serie}">
										</div>
										<div class="col-sm-4">
											<label>Codigo interno:</label>
											<input type="text" id="codigo_interno_refrigerador" class="form-control" placeholder="Codigo interno" value="{$refrigerador.c_interno}">
										</div>
										<div class="col-sm-4">
											<label>Año fabricación</label>
											<input type="date" id="fecha_fabricacion_refrigerador" class="form-control" placeholder="" value="{$refrigerador.fecha_fabricacion}">
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-4">
											<label>Dirección equipo:</label>
											<input type="text" id="direccion_refrigerador" class="form-control" placeholder="Dirección equipo" value="{$refrigerador.direccion}">
										</div>
										<div class="col-sm-4">
											<label>Ubicación interna equipo:</label>
											<input type="text" id="ubicacion_interna_refrigerador" class="form-control" placeholder="Ubicación equipo" value="{$refrigerador.ubicacion_interna}">
										</div>
									</div>
								</div>

								<div id="step-22">
									<div class="form-row">
										<div class="col-sm-4">
											<label>Valor seteado humedad:</label>
											<input type="text" id="valor_seteado_hum" class="form-control" placeholder="Valor seteado humedad" value="{$refrigerador.seteado_hum}" required>
										</div>

										<div class="col-sm-4">
											<label>Humedad minima:</label>
											<input type="text" id="humedad_minima" class="form-control" placeholder="Humedad minima" value="{$refrigerador.hum_min}" required>
										</div>

										<div class="col-sm-4">
											<label>Humedad maxima:</label>
											<input type="text" id="humedad_maxima" class="form-control" placeholder="Humedad maxima" value="{$refrigerador.hum_max}" required>
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-4">
											<label>Valor seteado temperatura:</label>
											<input type="text" id="valor_seteado_tem" class="form-control" placeholder="Valor seteado humedad" value="{$refrigerador.seteado_tem}" required>
										</div>

										<div class="col-sm-4">
											<label>Temperatura minima:</label>
											<input type="text" id="temperatura_minima" class="form-control" placeholder="Humedad minima" value="{$refrigerador.tem_min}" required>
										</div>

										<div class="col-sm-4">
											<label>Temperatura maxima:</label>
											<input type="text" id="temperatura_maxima" class="form-control" placeholder="Humedad maxima" value="{$refrigerador.tem_max}" required>
										</div>
									</div>
								</div>

								<div id="step-32">	
									<div class="form-row">
										<div class="col-sm-3">
											<label>Área del equipo :</label>
											<input type="text" id="area_refrigerador" class="form-control" placeholder="Área equipo" value="{$refrigerador.area_interna}">
										</div>
										<div class="col-sm-3">
											<label>Voltaje:</label>
											<input type="text" id="voltaje_refrigerador" class="form-control" placeholder="Voltaje" value="{$refrigerador.voltaje}">
										</div>
										<div class="col-sm-3">
											<label>Potencia:</label>
											<input type="text" id="potencia_refrigerador" class="form-control" placeholder="Potencia" value="{$refrigerador.potencia}">
										</div>
										<div class="col-sm-3">
											<label>Capacidad:</label>
											<input type="text" id="capacidad_refrigerador" class="form-control" placeholder="Capacidad" value="{$refrigerador.capacidad}">
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-3">
											<label>Peso:</label>
											<input type="text" id="peso_refrigerador" class="form-control" placeholder="Peso" value="{$refrigerador.peso}">
										</div>
										<div class="col-sm-3">
											<label>Alto(mm):</label>
											<input type="text" id="alto_refrigerador" class="form-control" placeholder="Alto" value="{$refrigerador.alto}">
										</div>
										<div class="col-sm-3">
											<label>Largo(mm):</label>
											<input type="text" id="largo_refrigerador" class="form-control" placeholder="Largo" value="{$refrigerador.largo}">
										</div>
										<div class="col-sm-3">
											<label>Ancho(mm):</label>
											<input type="text" id="ancho_refrigerador" class="form-control" placeholder="Ancho" value="{$refrigerador.ancho}">
										</div>	
									</div>
									<br>


									<br>
									<div class="form-row">
										<div class="col-sm-12" style="text-align:center;">
											<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_item_refrigerador">Nuevo</button> 
											<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_refrigerador">Actualizar</button>
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
		<script type="text/javascript" src="design/js/update_refrigerador.js"></script>