<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#creacion">
			<span>Creación</span>
		</a>
	</li>
	<li class="nav-item" id="asignacion">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#asignacion_estufaeincubadora">
			<span>Asignación</span>
		</a>
	</li>

	<!--<li class="nav-item" id="asignacion_participantes_estufaeincubadora">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#participantes">
			<span>Complemento</span>
		</a>
	</li>-->

	<li class="nav-item" id="asignacion_informe_estufaeincubadora">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#informes_1">
			<span>Informes</span>
		</a>
	</li>
</ul>

<!--COMIENZO DE LOS TABS--->
<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="creacion" role="tabpanel">
		<div class="row">
			<div class="col-sm-6">
				<div class="card" style="height:100%;">
					<div class="card-header">
						<h6 style="text-align:center;">
							Creación de bandejas
						</h6>
					</div>
					<div class="card-body" id="cuerpo_bandeja_estufaeincubadora">
						<input type="hidden" value="{$id_asignado}" id="id_asignado_estufaeincubadora">
						<input type="hidden"  id="cuantas_bandeja_estufaeincubadora">
						<input type="hidden" id="id_bandeja_actualizar_estufaeincubadora">
						<br>
						<div class="form-row">
							<div class="col-sm-12">
								<input type="text" id="bandeja_estufaeincubadora" placeholder="Ingresa el nombre de la bandeja" class="form-control">
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-5"></div>
							<div class="col-sm-4">
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nueva_bandeja_estufaeincubadora">Aceptar</button>
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_actualizar_bandeja_estufaeincubadora">Actualizar</button>
							</div>
						</div>
						<br>
						<div class="form-row">
							<table class="table" width="100%">
								<thead style="text-align:center;">
									<th>Nombre</th>
									<th>Acciones</th>
								</thead>
								<tbody id="resultados_bandeja_estufaeincubadora" style="text-align:center;">
								</tbody>
							</table>
						</div>
					</div>	
				</div>	
			</div>

			<div class="col-sm-6">
				<div class="card">
					<div class="card-header">
						<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
							<li class="nav-item">
								<a role="tab" class="nav-link  active" id="crearmapeo" data-toggle="tab" href="#crear_mapeo_estufaeincubadora">
									<span>Mapeo</span>
								</a>
							</li>
							<li class="nav-item">
								<a role="tab" class="nav-link" id="vermapeo" data-toggle="tab" href="#ver_mapeo_estufaeincubadora">
									<span>Ver mapeo</span>
								</a>
							</li>
							<li class="nav-item">
								<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#consecutivo_informe_estufaeincubadora">
									<span>Correlativo</span>
								</a>
							</li>
							<!--<li class="nav-item">
								<a role="tab" class="nav-link" id="#" data-toggle="tab" href="#cargar_informes_estufaeincubadora">
									<span>Genera informes</span>
								</a>
							</li>-->
						</ul>				
					</div>

					<div class="tab-content">
						<div class="tab-pane tabs-animation fade show active" id="crear_mapeo_estufaeincubadora" role="tabpanel">
							<div class="card-body">
								<h6 class="text-warning" style="text-align:center;" id="anuncio_mapeo_1_estufaeincubadora">Debes completar la información de bandejas</h6>
								<div id="cuerpo_mapeo_estufaeincubadora">
									<input type="hidden" id="id_mapeo_creado_estufaeincubadora">

										<div class="form-row">
											<div class="col-sm-12">

												<label>Nombre mapeo:</label>
												<select id="nombre_mapeo_estufaeincubadora" class="form-control" required>
													<option value="0">Seleccione...</option>
													<option value="nombre_eleccion">ASIGNAR NOMBRE</option>
													<option value="SIN CARGA">SIN CARGA</option>
													<option value="CON CARGA">CON CARGA</option>
													<option value="CON CARGA MÍNIMA">CON CARGA MÍNIMA</option>
													<option value="CON CARGA MÁXIMA">CON CARGA MÁXIMA</option>
													<option value="APERTURA DE PUERTAS">APERTURA DE PUERTAS</option>
													<option value="ARRANQUE">ARRANQUE</option>
													<option value="DISTRIBUCIÓN TERMICA SIN CARGA">DISTRIBUCIÓN TERMICA SIN CARGA</option>
													<option value="DISTRIBUCIÓN TERMICA CON CARGA">DISTRIBUCIÓN TERMICA CON CARGA</option>
													<option value="PRUEBA DE CARGA / DESCARGA">PRUEBA DE CARGA / DESCARGA</option>
													<option value="PRUEBA DE APERTURA SIN CARGA">PRUEBA DE APERTURA SIN CARGA</option>
													<option value="PRUEBA DE APERTURA CON CARGA">PRUEBA DE APERTURA CON CARGA</option>
													<option value="PRUEBA DE FALLA MENOR">PRUEBA DE FALLA MENOR</option>
													<option value="PRUEBA DE FALLA MAYOR">PRUEBA DE FALLA MAYOR</option>
													<option value="APERTURA DE PUERTAS CON CARGA MÁXIMA">APERTURA DE PUERTAS CON CARGA MÁXIMA</option>
													<option value="SENSOR CONTROL">SENSOR CONTROL</option>
													<option value="SENSOR AMBIENTE">SENSOR AMBIENTE</option>
													<option value="SENSOR DE MONITOREO">SENSOR DE MONITOREO</option>
													<option value="SENSOR DE CONTROL CARGA MÁXIMA">SENSOR DE CONTROL CARGA MÁXIMA</option>
													<option value="SENSOR AMBIENTE CARGA MÁXIMA">SENSOR AMBIENTE CARGA MÁXIMA</option>
													<option value="SENSORES DE MONITOREO CARGA MÁXIMA">SENSORES DE MONITOREO CARGA MÁXIMA</option>
												</select>
											</div>
										</div>
										<br>
										<div class="form-row">
											<div class="col-sm-12">
												<input type="text"  class="form-control" id="nombre_mapeo_eleccion" placeholder="Nombre de la prueba">
											</div>
										</div>
										<br>  
										<div class="form-row">
											<div class="col-sm-12" style="text-align:center;">
												<h6>Fecha inicio mapeo:</h6>
												<div class="form-row">
													<div class="col-sm-3">
														<label>Fecha:</label>
														<input type="date" class="form-control" id="fecha_inicio_mapeo_estufaeincubadora" >
													</div>
													<div class="col-sm-3">
														<label>H:</label>
														<select  class="form-control" id="hora_inicio_mapeo_estufaeincubadora">
															{for $hora=0 to 24}
															{if $hora lt 10}
															<option value="0{$hora}">0{$hora}</option>
															{else}
															<option value="{$hora}">{$hora}</option>
															{/if}									
															{/for}
														</select>
													</div>
													<div class="col-sm-3">
														<label>M:</label>
														<select  class="form-control" id="minuto_inicio_mapeo_estufaeincubadora" >
															{for $minuto=0 to 60}
															{if $minuto lt 10}
															<option value="0{$minuto}">0{$minuto}</option>
															{else}
															<option value="{$minuto}">{$minuto}</option>
															{/if}									
															{/for}
														</select>
													</div>
													<div class="col-sm-3">
														<label>S:</label>
														<select  class="form-control" id="segundo_inicio_mapeo_estufaeincubadora" >
															{for $segundo=0 to 60}
															{if $segundo lt 10}
															<option value="0{$segundo}">0{$segundo}</option>
															{else}
															<option value="{$segundo}">{$segundo}</option>
															{/if}									
															{/for}
														</select>
													</div>
												</div>
											</div>
										</div>


										<br>

										<div class="form-row">
											<div class="col-sm-12" style="text-align:center;">
												<h6>Fecha fin mapeo:</h6>
												<div class="form-row">
													<div class="col-sm-3">
														<label>Fecha:</label>
														<input type="date" class="form-control" id="fecha_fin_mapeo_estufaeincubadora">
													</div>
													<div class="col-sm-3">
														<label>H:</label>
														<select  class="form-control" id="hora_fin_mapeo_estufaeincubadora">
															{for $hora=0 to 24}
															{if $hora lt 10}
															<option value="0{$hora}">0{$hora}</option>
															{else}
															<option value="{$hora}">{$hora}</option>
															{/if}									
															{/for}
														</select>
													</div>
													<div class="col-sm-3">
														<label>M:</label>
														<select  class="form-control" id="minuto_fin_mapeo_estufaeincubadora">
															{for $minuto=0 to 60}
															{if $minuto lt 10}
															<option value="0{$minuto}">0{$minuto}</option>
															{else}
															<option value="{$minuto}">{$minuto}</option>
															{/if}									
															{/for}
														</select>
													</div>
													<div class="col-sm-3">
														<label>S:</label>
														<select  class="form-control" id="segundo_fin_mapeo_estufaeincubadora">
															{for $segundo=0 to 60}
															{if $segundo lt 10}
															<option value="0{$segundo}">0{$segundo}</option>
															{else}
															<option value="{$segundo}">{$segundo}</option>
															{/if}									
															{/for}
														</select>
													</div>
												</div>
											</div>
										</div>

										<br>

										<div class="form-row">
											<div class="col-sm-4">
												<label>	Intervalo:</label>
												<input type="text" id="intervalo_estufaeincubadora" class="form-control" placeholder="En segundos" required>
											</div>
										</div>

										<br>

										<div class="form-row">
											<div class="col-sm-3">
												<h6>
													Temperatura
												</h6>
											</div>
											<div class="col-sm-3">
												<label>	Valor seteado:</label>
												<input type="text" id="valor_seteado_temperatura_estufaeincubadora" class="form-control" placeholder="Valor seteado" required>
											</div>
											<div class="col-sm-3">
												<label>Minima:</label>
												<input type="text" id="temperatura_minima_estufaeincubadora" class="form-control" placeholder="Temperatura minima" required>
											</div>

											<div class="col-sm-3">
												<label>Maxima:</label>
												<input type="text" id="temperatura_maxima_estufaeincubadora" class="form-control" placeholder="Temperatura maxima" required>
											</div>
										</div>
										<br>
										<div class="form-row">
											<div class="col-sm-5"></div>
											<div class="col-sm-5">
												<button class="btn-shadow btn-outline-2x btn btn-outline-info"  id="btn_nuevo_mapeo_estufaeincubadora">Aceptar</button>
												<button class="btn-shadow btn-outline-2x btn btn-outline-info"  id="btn_actualizar_mapeo_estufaeincubadora">Actualizar</button><button class="btn-shadow btn-outline-2x btn btn-outline-danger"  id="btn_setear_campos">X</button>
												
											</div>  
										</div>

<!-- <div class="form-row" style="text-align:center;"> 
<div class="col-sm-6">
<label>Tipo de mapeo:</label>
<select id="tipo_de_mapeo" class="form-control" >
<option value="0">Sin Carga</option>
<option value="1">Con Carga</option>
<option value="2">Apertura de puerta Con Carga</option>
<option value="3">Apertura de puerta Sin Carga</option>
</select>
</div>

<div class="col-sm-6"> 
<label>Incluir informe base</label>
<br>
<input type="checkbox" id="incluir_informe_base" value="1">
</div>
</div>-->
</div>
</div>
</div>

<div class="tab-pane tabs-animation fade show" id="ver_mapeo_estufaeincubadora" role="tabpanel">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table">
				<thead style="text-align:center;">
					<th >Nombre:</th>
					<th>Fecha y Hora inicio:</th>
					<th>Fecha y Hora fin:</th>
					<th>Intervalo</th>
					<th>Temperatura Min</th>
					<th>Temperatura Max</th>
					<th>Acciones</th>
				</thead>
				<tbody id="listando_mapeos_estufaeincubadora">

				</tbody>

			</table>
		</div>	
	</div>
</div>

<div class="tab-pane tabs-animation " id="consecutivo_informe_estufaeincubadora" role="tabpanel">
	<div class="card-body">
		<div class="form-row">
			<div class="col-sm-12">

				<label>Ingresa el correlativo:</label>
				<input type="text" id="correlativo_informe_estufaeincubadora" class="form-control">
				<br>
				<button class="btn btn-success" id="cambiando_correlativo_estufaeincubadora">
					Aceptar
				</button>
			</div>
		</div>
		<br>
		<div class="form-row">
			<div class="col-sm-12">
				<label>Consecutivo actual:</label>
				<br>
				<label class="text-danger" id="aqui_consecutivo_estufaeincubadora"></label>
			</div>
		</div>
	</div>
</div>
</div>	
</div>
</div>
</div>
</div><!--Cierre del tab creacion-->

<div class="tab-pane tabs-animation fade show" id="asignacion_estufaeincubadora" role="tabpanel">

	<div class="row">
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					Mapeos disponibles

				</div>
				<div class="card-body">
					<table class="table" style="text-align:center;">
						<thead>
							<th>Nombre</th>
							<th>Gestionar</th>
						</thead>
						<tbody id="listando_mapeos_creados_estufaeincubadora">

						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					Bandejas disponibles  para &nbsp;&nbsp;&nbsp;
					<span id="mapeo_actual_estufaeincubadora">
					</span>
				</div>
				<div class="card-body">
					<table class="table" style="text-align:center;">
						<thead>
							<th>Nombre</th>
							<th>Asociar</th>
						</thead>
						<tbody id="listar_bandejas_creadas_estufaeincubadora">

						</tbody>
					</table>
				</div>
			</div>
		</div>


	</div>

	<br>

	<div class="row">
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					Sensores disponibles
				</div>
				<div class="card-body">

					<div class="buscador_de_sensores_acme">
						<div class="row">
							<div class="col-sm-6">
								<input type="text" id="buscar_sensores_estufaeincubadora" class="form-control" placeholder="Ingresa el sensor a buscar">

							</div>
						</div>

					</div>
					<div class="scroll-area-sm">
						<div class="scrollbar-container">
							<div class="mostrar_sensores_contenedor_buscados">
								<table class="table" width="100%">
									<thead>
										<th >Nombre</th>
										<th >Tipo</th>
										<th >Asociar</th>
									</thead>
									<tbody id="sensores_encontrados_estufaeincubadora">

									</tbody>	
								</table>
							</div>

							<div class="mostrar_sensores_contenedor">
								<table class="table" width="100%">
									<thead>
										<th >Nombre</th>
										<th >Tipo</th>
										<th >Asociar</th>
									</thead>
									<tbody id="sensores_resultado_estufaeincubadora">

									</tbody>	
								</table>
							</div>

						</div>
					</div>	
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					Mapeos 
				</div>
				<div class="card-body">
					<div class="form-row">
						<div class="col-sm-12" style="text-align:center;">
							<div class="scroll-area-sm">
								<div class="scrollbar-container">
									<table class="table">
										<thead>
											<th>Bandeja</th>
											<th>Sensor</th>
											<th>Fecha registro</th>
											<th>Posicion</th>
										</thead>	
										<tbody id="mapeos_listos_estufaeincubadora"> 

										</tbody>
									</table>
										<div id="aqui_boton_dc">
											
										</div>
										
								</div>
							</div>	
						</div>	
					</div>

					<div class="form-row"> 
						<div class="col-sm-12" id="botton_datos_crudos_estufaeincubadora">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<br>

	<div class="cargar_datos_crudos">
		<div class="form-row" style="text-align:center;">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="card">
					<div class="card-header">
						Carga de datos crudos
					</div>
					<div class="card-body">
						<div class="form-row">
							<div class="col-sm-12" style="text-align:center;">
								<form id="form_estufaeincubadora" enctype="multipart/form-data" method="post">
									<div class="form-group" style="text-align:left;">
										<h6>Nombre Mapeo:&nbsp;&nbsp;<label id="nombre_mapeo_estufaeincubadora_dc"></label></h6>
									</div>
									<input type="hidden" id="id_mapeo_estufaeincubadora" name="id_mapeo_estufaeincubadora">
									<input type="hidden" id="id_asignado_estufaeincubadora" name="id_asignado_estufaeincubadora">

									<div class="form-row">
										<div class="col-sm-12">
											<table class="table">
												<thead>
													<th>Columna</th>
													<th>Sensor</th>
												</thead>
												<tbody id="dc_estufaeincubadora_seleccionador">

												</tbody>
											</table>
										</div>
									</div>

									<div class="form-group">
									<!--	<label for="file">File</label>
										<input type="file" class="form-control" id="file_estufaeincubadora" name="file_estufaeincubadora"  required /> -->
									</div>

									<div class="form-group">
										<button class="btn btn-success">
											Cargar
										</button>
									</div>
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		
	</div>

</div>
<!--FIN DE LA TABS ASIGNACIÓN-->  

<!--COMIENZO DE LA TAB DE INFORMES-->
<div class="tab-pane tabs-animation fade show" 	id="informes_1" role="tabpanel">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header" style="height: 4.5rem;">

					Informes Generados
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

					<div class="btn-actions-pane-left">
						<div role="group" class="btn-group-sm nav btn-group">
							Quien firma 
							<select class="form-control" id="quien_firma_estufaeincubadora">

							</select>
							<br>
						</div>
					</div>

					<div class="btn-actions-pane-right">
						<div role="group" class="btn-group-sm nav btn-group">
							Persona firma : <span class="text-danger" id="persona_firma_estufaeincubadora"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
				<div id="traer_informes_estufaeincubadora">
				</div>
			</div>
		</div>
	</div>

</div>  


</div><!--CIERRE DEL TAB CONTENT-->

<script type="text/javascript" src="design/js/control_mapeo_estufaeincubadora.js"></script>