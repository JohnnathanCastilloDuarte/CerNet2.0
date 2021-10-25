<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#creacion">
			<span>Creación</span>
		</a>
	</li>
	<li class="nav-item" id="asignacion_mapeo">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#asignacion">
			<span>Asignación</span>
		</a>
	</li>

	<li class="nav-item" id="asignacion_participantes">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#participantes">
			<span>Complemento</span>
		</a>
	</li>

	<li class="nav-item" id="asignacion_informe">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#informes_1">
			<span>Informes</span>
		</a>
	</li>
</ul>

<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="creacion" role="tabpanel">
		<div class="row">
			<div class="col-sm-5">
				<div class="card" style="height:100%;">
					<div class="card-header">
						<h6 style="text-align:center;">
							Creación de bandejas
						</h6>
					</div>
					<div class="card-body">
						<input type="hidden" value="{$id_asignado}" id="id_asignado">
						<input type="hidden"  id="cuantas_bandeja">
						<div class="form-row">
							<div class="col-sm-10">
								<label>Ingrese el nombre de la bandeja</label>	
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-12">
								<input type="text" id="bandeja" placeholder="Ingresa el nombre de la bandeja" class="form-control">
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-5"></div>
							<div class="col-sm-4">
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nueva_bandeja">Aceptar</button>
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_actualizar_bandeja">Actualizar</button>
							</div>
						</div>
						<br>
						<div class="form-row">
							<table class="table" width="100%">
								<thead style="text-align:center;">
									<th>Nombre</th>
									<th>Acciones</th>
								</thead>
								<tbody id="resultados_bandeja_refrigerador" style="text-align:center;">
								</tbody>
							</table>
						</div>
					</div>	
				</div>	
			</div>

			<div class="col-sm-7">
				<div class="card">
					<div class="card-header">
						<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
							<li class="nav-item" id="mapeo">
								<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#crear_mapeo_refrigerador">
									<span>Mapeo</span>
								</a>
							</li>
							<li class="nav-item" id="mapeo2">
								<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#ver_mapeo_refrigerador">
									<span>Ver mapeo</span>
								</a>
							</li>

							<li class="nav-item">
								<a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#consecutivo_refrigeradores">
									<span>Consecutivo</span>
								</a>
							</li>
						</ul>				
					</div>

					<div class="tab-content">
						<div class="tab-pane tabs-animation"  id="crear_mapeo_refrigerador" role="tabpanel">
							<div class="card-body" id="cuerpo_crear_mapeo_refrigerador">
								<!--<h6 class="text-warning" style="text-align:center;" id="anuncio_mapeo_1">Debes completar la información de bandejas</h6>-->
								
								<form id="formulario">
									<div class="form-row">
										<div class="col-sm-12">
											<input type="hidden" id="id_mapeo_creado">
											<select class="form-control" id="selector_mapeo_refrigerador">
												<option value="0">Seleccione</option>
												<option value="crear_nombre">Crear nombre</option>
											</select>
											<br>
											<input type="text" placeholder="Ingrese el nombre de la prueba" id="crear_nombre_refrigeradores" class="form-control">
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-12" style="text-align:center;">
											<h6>Fecha inicio mapeo:</h6>
											<div class="form-row">
												<div class="col-sm-6">
													<label>Fecha:</label>
													<input type="date" class="form-control" id="fecha_inicio_mapeo" >
												</div>
												<div class="col-sm-2">
													<label>H:</label>
													<select  class="form-control" id="hora_inicio_mapeo" >
														{for $hora=0 to 24}
														{if $hora lt 10}
														<option value="0{$hora}">0{$hora}</option>
														{else}
														<option value="{$hora}">{$hora}</option>
														{/if}									
														{/for}
													</select>
												</div>
												<div class="col-sm-2">
													<label>M:</label>
													<select  class="form-control" id="minuto_inicio_mapeo" >
														{for $minuto=0 to 60}
														{if $minuto lt 10}
														<option value="0{$minuto}">0{$minuto}</option>
														{else}
														<option value="{$minuto}">{$minuto}</option>
														{/if}									
														{/for}
													</select>
												</div>
												<div class="col-sm-2">
													<label>S:</label>
													<select  class="form-control" id="segundo_inicio_mapeo" >
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
												<div class="col-sm-6">
													<label>Fecha:</label>
													<input type="date" class="form-control" id="fecha_fin_mapeo" >
												</div>
												<div class="col-sm-2">
													<label>H:</label>
													<select  class="form-control" id="hora_fin_mapeo" >
														{for $hora=0 to 24}
														{if $hora lt 10}
														<option value="0{$hora}">0{$hora}</option>
														{else}
														<option value="{$hora}">{$hora}</option>
														{/if}									
														{/for}
													</select>
												</div>
												<div class="col-sm-2">
													<label>M:</label>
													<select  class="form-control" id="minuto_fin_mapeo" >
														{for $minuto=0 to 60}
														{if $minuto lt 10}
														<option value="0{$minuto}">0{$minuto}</option>
														{else}
														<option value="{$minuto}">{$minuto}</option>
														{/if}									
														{/for}
													</select>
												</div>
												<div class="col-sm-2">
													<label>S:</label>
													<select  class="form-control" id="segundo_fin_mapeo" >
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
											<input type="text" id="intervalo" class="form-control" placeholder="En segundos" required>
										</div>
									</div>

									<br>

									<div class="form-row">
										<div class="col-sm-3">
											<H6>
												Humedad   
											</H6>
										</div>
										<div class="col-sm-3">
											<label>	Valor seteado:</label>
											<input type="text" id="valor_seteado_humedad" class="form-control" placeholder="Valor seteado" required>
										</div>
										<div class="col-sm-3">
											<label>Minima:</label>
											<input type="text" id="humendad_minima" class="form-control" placeholder="Humedad minima" required>
										</div>
										<div class="col-sm-3">
											<label>Maxima:</label>
											<input type="text" id="humendad_maxima" class="form-control" placeholder="Humedad maxima" required>
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
											<input type="text" id="valor_seteado_temperatura" class="form-control" placeholder="Valor seteado" required>
										</div>
										<div class="col-sm-3">
											<label>Minima:</label>
											<input type="text" id="temperatura_minima" class="form-control" placeholder="Temperatura minima" required>
										</div>

										<div class="col-sm-3">
											<label>Maxima:</label>
											<input type="text" id="temperatura_maxima" class="form-control" placeholder="Temperatura maxima" required>
										</div>
									</div>


									<br>
									<br>
									<div class="form-row" style="text-align:center;">                         
										<div class="col-sm-6"> 
											<label>Incluir informe base</label>
											<br>
											<select id="informe_base_refrigerador" class="form-control">
												<option value="0">No</option>
												<option value="1">Si</option>
											</select>
										</div>
									</div>

									<br>

									<div class="form-row">
										<div class="col-sm-12" style="text-align:center;">
											<button class="btn-shadow btn-outline-2x btn btn-outline-info"  id="btn_nuevo_mapeo">Aceptar</button>
											<button class="btn-shadow btn-outline-2x btn btn-outline-info"  id="btn_actualizar_mapeo">Actualizar</button>
											<button class="btn btn-danger" id="change_mapeo"><span class="text-white">X</span></button>
										</div>
									</div>
								</form>
							</div>
						</div>

						<div class="tab-pane tabs-animation fade show" id="ver_mapeo_refrigerador" role="tabpanel">
							<div class="card-body" id="cuerpo_ver_mapeo_refrigerador">
								<div class="table-responsive">
									<table class="table">
										<thead style="text-align:center;">
											<th >Nombre:</th>
											<th>Fecha y Hora inicio:</th>
											<th>Fecha y Hora fin:</th>
											<th>Intervalo</th>
											<th>Humedad Min</th>
											<th>Humedad Max</th>
											<th>Temperatura Min</th>
											<th>Temperatura Max</th>
											<th>Acciones</th>
										</thead>
										<tbody id="listando_mapeos">

										</tbody>

									</table>
								</div>	
							</div>
						</div>

						<div class="tab-pane tabs-animation fade show" id="consecutivo_refrigeradores" role="tabpanel">
							<div class="card">  
								<div class="card-body">
									<div class="row">
										<div class="col-sm-12">
											<input type="text" placeholder="Ingrese el consecutivo" class="form-control" id="consecutivo_refrigeradores_texto">
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-sm-12" style="text-align:center;">
											<button class="btn btn-success" id="btn_refrigeradores_consecutivo">
												Generar
											</button>                    
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-sm-12" style="text-align:center;">
											<label class="text-danger">Actual consecutivo</label>
											<span id="aqui_consecutivo_refrigerador" class="text-danger"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div><!--Cierre del tab creacion-->

	<div class="tab-pane tabs-animation fade show" id="asignacion" role="tabpanel">

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
							<tbody id="listando_mapeos_creados">

							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="card">
					<div class="card-header">
						Sensores disponibles
					</div>
					<div class="card-body">
						<div class="scroll-area-sm">
							<div class="scrollbar-container">
								<div class="buscador_de_sensores_acme">
									<div class="row">
									</div>

								</div>
								<div class="scroll-area-sm">
									<div class="scrollbar-container">
										<div class="mostrar_sensores_contenedor_buscados_refrigerador">
											<table class="table" width="100%">
												<thead>
													<th >Nombre</th>
													<th >Asociar</th>
												</thead>
												<tbody id="listar_bandejas_creadas">

												</tbody>	
											</table>
										</div>

										<div class="mostrar_sensores_contenedor_refrigerador">
											<table class="table" width="100%">
												<thead>
													<th >Nombre</th>
													<th >Acciones</th>
												</thead>
												<tbody id="listar_bandejas_creadas">

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
			<br>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6">
				<div class="card">
					<div class="card-header">
						Sensores disponibles
					</div>
					<div class="card-body">
						<div class="scroll-area-sm">
							<div class="scrollbar-container">
								<div class="buscador_de_sensores_acme">
									<div class="row">
										<div class="col-sm-6">
											<input type="text" id="buscar_sensores_refrigerador" class="form-control" placeholder="Ingresa el sensor a buscar">

										</div>
									</div>

								</div>
								<div class="scroll-area-sm">
									<div class="scrollbar-container">
										<div class="mostrar_sensores_contenedor_buscados_refrigerador">
											<table class="table" width="100%">
												<thead>
													<th >Nombre</th>
													<th >Tipo</th>
													<th >Acciones</th>
												</thead>
												<tbody id="sensores_encontrados_refrigerador">

												</tbody>	
											</table>
										</div>

										<div class="mostrar_sensores_contenedor_refrigerador">
											<table class="table" width="100%">
												<thead>
													<th >Nombre</th>
													<th >Tipo</th>
													<th >Acciones</th>
												</thead>
												<tbody id="sensores_resultado_refrigerador">

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

			<div class="col-sm-6">
				<div class="card">
					<div class="card-header">
						Mapeos 
					</div>
					<div class="card-body">
						<div class="form-row">
							<div class="col-sm-12">
								<div class="scroll-area-sm">
									<div class="scrollbar-container">
										<table class="table" width="100%" style="text-align:center;">
											<thead>
												<th>Bandeja</th>
												<th>Sensor</th>
												<th>Eliminar</th>
												<th>Posicion</th>
											</thead>	
											<tbody id="mapeos_listos"> 

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

		<br>

		<div class="cargar_datos_crudos">
			<div class="form-row">
				<div class="col-sm-3"> </div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-header">
							Carga de datos crudos
						</div>
						<div class="card-body">
							<div class="form-row">
								<div class="col-sm-12" style="text-align:center;">
									<form id="form" enctype="multipart/form-data" method="post">
										<div class="form-group">
											<h6>Nombre bandeja: <label id="nombre_bandeja"></label></h6>
										</div>
										<input type="hidden" id="id_mapeo" name="id_mapeo">
										<input type="hidden" id="id_asignado_form" name="id_asignado_form">
										<div class="row">
											<div class="col-sm-4">
												Sensor
											</div>
											<div class="col-sm-4">
												Colum. Hum
											</div>

											<div class="col-sm-4">
												Colum. Tem
											</div>
										</div>
										<br>
										<div class="row" id="trayendo_sensores_asignados_refrigeradores">

										</div>
										<div class="form-group">
											<label for="file">File</label>
											<input type="file" class="form-control" id="file" name="file"  required />
										</div>

										<div class="form-group">
											<div class="dc_refrigerador_archivo">  </div>
										 <button class="btn btn-success" id="btn_cargar_datos_crudos">
												Cargar
											</button>

										 <img src="design/images/cargando.gif" id="cargando">

										</div>
									</form>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div><!--Cierre del tab asignacion-->
	<div class="tab-pane tabs-animation fade show" id="participantes" role="tabpanel">
		<div class="row">
			<div class="col-sm-6">
				<div class="card"> 
					<div class="card-header">
						Participantes del informe

						<div class="btn-actions-pane-right">
							<div role="group" class="btn-group-sm nav btn-group">
								<button class="btn btn-danger" id="cerrar_crear_personal">X</button>
							</div>
						</div>
					</div>
					<div class="card-body">

						<!--REGISTRO DEL PERSONAL -->
						<div id="personal_1">

							<div class="row">
								<input type="hidden" id="id_oculto_personal">
								<div class="col-sm-4">
									<label>Nombres:</label>
									<input type="text" id="nombres_personal" class="form-control" placeholder="Escribe los nombres"> 
								</div> 

								<div class="col-sm-4">
									<label>Apellidos:</label>
									<input type="text" id="apellidos_personal" class="form-control" placeholder="Escribe los apellidos"> 
								</div>

								<div class="col-sm-4">
									<label>Cargo:</label>
									<input type="text" id="cargo_personal" class="form-control" placeholder="Escribe el cargo"> 
								</div>
							</div>

							<br>

							<div class="row">
								<div class="col-sm-12" style="text-align:center;">
									<button class="btn btn-success" id="guardar_personal">
										Guardar 
									</button>
									<button class="btn btn-success" id="editar_personal">
										Editar 
									</button>
								</div>
							</div>

						</div>   




						<div class="row" id="personal_2">
							<div class="col-sm-12">
								<div class="card">
									<div class="card-header">
										Personal
										<div class="btn-actions-pane-right">
											<div role="group" class="btn-group-sm nav btn-group">
												<button class="btn btn-success" id="crear_personal_empresa">+</button>
											</div>
										</div>
									</div>
									<div class="card-body">
										<table class="table">
											<thead>
												<th>Personal</th>
												<th>Cargo</th>
												<th colspan="2">Acciones</th>
											</thead>
											<tbody id="resultados_personal">

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
	</div>  




	
	<div class="tab-pane tabs-animation fade show" 	 id="informes_1" role="tabpanel">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">

						Informes Generados
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

						<div class="btn-actions-pane-left">
							<div role="group" class="btn-group-sm nav btn-group">
								Quien firma 
								<select class="form-control" id="quien_firma">

								</select>
								<br>
							</div>
						</div>

						<div class="btn-actions-pane-right">
							<div role="group" class="btn-group-sm nav btn-group">
								Persona firma : <span class="text-danger" id="persona_firma"></span>
							</div>
						</div>

					</div>
					<br>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">

								<div class="card" id="informe_base_mostrar">
									<div class="card-header"> 
										<h2 id="informe_base_no"  class="text-danger">No has generado un informe base</h2>
										<h5><strong>Nombre Informe:&nbsp;&nbsp;</strong></h5><h5 id="nombre_infome"></h5>
									</div>
									<div class="card-body" >
										<div class="row" id="solicitar_aprobacion">
										</div>
										<br>


										<div class="row">
											<div class="col-sm-4">
												<label>Conclusion:</label>
												<textarea id="conclusion_informe_base" class="form-control" placeholder="Conclusion informe base"></textarea>
											</div>
											<div class="col-sm-4">
												<label>Metodologia</label>
												<textarea id="metodologia_informe_base" class="form-control" placeholder="Metodologia informe base"></textarea>
											</div>
											<div class="col-sm-4">
												<label>Conclusion final</label>
												<textarea id="conclusion_final_informe_base" class="form-control" placeholder="Conclusión final informe base"></textarea>
											</div>
										</div>
										<br>
										<div class="row" id="traer_imagenes_base">

										</div>
										<br>
										<div class="row" id="traer_otras_imagenes_base">

										</div>
										<br>
										<div class="row" id="traer_otras_imagenes_base_2">

										</div>
										<br>
										<div class="row" id="traer_mapeos_base" >

										</div>

										<br>

										<div id="final_inf_base" style="text-align:center;">

										</div>
									</div>
								</div> 

								<br>

								<div id="sin_correlativo_refrigerador" style="text-align:center;">
									<span class="badge badge-warning">
										Para acceder a los informes recuerda asignar el correlativo
									</span>
									<button class="btn btn-primary" id="solicitar_correlativo">
										Solicitar
									</button>
								</div>
								
								<div class="row" id="mostrar_grafica">
									<div class="col-sm-12">
										<div class="card">
											<div class="card-header" style="text-align:center">
												Graficos
												<div class="btn-actions-pane-right">
													<div role="group" class="btn-group-sm nav btn-group">
														<a data-toggle="tab" class="btn-shadow active btn btn-primary" id="minimizar_graficos">-</a>
													</div>
												</div>	
											</div>
											<div class="card-body">
												<div class="row">
													<div class="col-sm-6">
														
														<div class="card">
															<div class="card-header">
																Valores Promedio, Mínimo, Maximo 
															</div>
															<div class="card-body">		
																<canvas id="myChart" width="100px" height="100px"></canvas>
																<a id="download"
																download="Grafico promedio.jpg" 
																href=""
																class="btn btn-primary float-right bg-flat-color-1"
																title="Descargar Gráfico">
																<i class="fa fa-download"></i>
															</a>
														</div>
													</div>

												</div>


												<div class="col-sm-6">

													<div class="card">
														<div class="card-header">
															Datos de todos los sensores en periodo representativo  
														</div>
														<div class="card-body">		
															<canvas id="myChart_2" width="100px" height="100px"></canvas>
															<a id="download_2"
															download="GraficoXbandejas.jpg" 
															href=""
															class="btn btn-primary float-right bg-flat-color-1"
															title="Descargar Gráfico">
															<i class="fa fa-download"></i>
														</a>
													</div>
												</div>

											</div>

										</div>
									</div>
								</div>
							</div>
						</div>


						<div id="traer_informes_refrigeradores">
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div><!--Cierre del tab informes_1-->
</div>
</div>
<script type="text/javascript" src="design/js/control_mapeo_refrigerador.js"></script>