<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#creacion">
			<span>Creación</span>
		</a>
	</li>
	<li class="nav-item" id="asignacion_mapeo_automovil">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#asignacion">
			<span>Asignación</span>
		</a>
	</li>
	
	<li class="nav-item" id="asignacion_participantes_automovil">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#participantes">
			<span>Complemento</span>
		</a>
	</li>
	
	<li class="nav-item" id="asignacion_informe_automovil">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#informes_1">
			<span>Informes</span>
		</a>
	</li>
</ul>


<!--Comienza el contenido de las tabs-->
<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="creacion" role="tabpanel">
		<div class="row">
			<div class="col-sm-6">
				<div class="card" style="height:100%;">
					<div class="card-header">
						<h6 style="text-align:center;">
							Creación de alturas
						</h6>
					</div>
					<div class="card-body" id="primer_card_automovil">
						<input type="hidden" value="{$id_asignado}" id="id_asignado_automovil">
						<input type="hidden"  id="cuantas_bandeja_automovil">
						<input type="hidden" id="id_bandeja_actualizar_ultrafreeze">
						<div class="form-row">
							<div class="col-sm-10">
								<label>Agregue las alturas</label>	
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-12">
								<input type="text" id="altura_automovil" placeholder="Nombre del tipo de altura" class="form-control" required>
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-12">
								<select id="tipo_altura_automovil" class="form-control" required>
									<option value="sin altura">Seleccione...</option>
									<option value="Alta">Alta</option>
									<option value="Media">Media</option>
									<option value="Baja">Baja</option>
								</select>  
							</div>  
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-5"></div>
							<div class="col-sm-4">
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nueva_altura_automovil">Aceptar</button>
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_actualizar_altura_automovil">Actualizar</button>
							</div>
						</div>
						<br>
						<div class="form-row">
							<table class="table" width="100%">
								<thead style="text-align:center;">
									<th>Nombre</th>
									<th>Tipo</th>
									<th>Acciones</th>
								</thead>
								<tbody id="resultados_bandeja_automovil" style="text-align:center;">
									
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
								<a role="tab" class="nav-link  active" id="tab-0" data-toggle="tab" href="#crear_mapeo_automovil">
									<span>Mapeo</span>
								</a>
							</li>
							<li class="nav-item">
								<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#ver_mapeo_automovil">
									<span>Ver mapeo</span>
								</a>
							</li>
							<li class="nav-item">
								<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#consecutivo_informe_automovil">
									<span>Correlativo</span>
								</a>
							</li>
							<!--<li class="nav-item">
								<a role="tab" class="btn btn-danger" id="cargar_informes_automovil" data-toggle="tab" href="#cargar_informes_automovil">
									<span>Genera informes</span>
								</a>
							</li>-->
						</ul>				
					</div>

					<div class="tab-content">
						<div class="tab-pane tabs-animation fade show active" id="crear_mapeo_automovil" role="tabpanel">
							<div class="card-body">
								<div id="cuerpo_mapeo_automovil">
									<input type="hidden" id="id_mapeo_creado_automovil">
									<div class="form-row">
										<div class="col-sm-12">
											
											<label id="anuncio_traido_mapeo_automovil">Nombre Actual:</label>
											<input type="text" id="nombre_traido_automovil" class="form-control">
											<label id="anuncio_nombre_mapeo_automovil">Nombre mapeo:</label>
											<select id="nombre_mapeo_automovil" class="form-control" required>
												<option value="Sin_seleccion" id="aqui_cambiara_automovil">Seleccione...</option>
												<option value="asignar_nombre_automovil">CREAR NOMBRE</option>
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
											<input type="text" id="nombre_eleccion_automovil" class="form-control" placeholder="Ingresa el nombre">  
										</div>
									</div>
									
									
									
									<br>
									<div class="form-row">
										<div class="col-sm-12" style="text-align:center;">
											<h6>Fecha inicio mapeo:</h6>
											<div class="form-row">
												<div class="col-sm-3">
													<label>Fecha:</label>
													<input type="date" class="form-control" id="fecha_inicio_mapeo_automovil" >
												</div>
												<div class="col-sm-3">
													<label>H:</label>
													<select  class="form-control" id="hora_inicio_mapeo_automovil" >
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
													<select  class="form-control" id="minuto_inicio_mapeo_automovil" >
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
													<select  class="form-control" id="segundo_inicio_mapeo_automovil" >
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
													<input type="date" class="form-control" id="fecha_fin_mapeo_automovil" >
												</div>
												<div class="col-sm-3">
													<label>H:</label>
													<select  class="form-control" id="hora_fin_mapeo_automovil" >
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
													<select  class="form-control" id="minuto_fin_mapeo_automovil" >
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
													<select  class="form-control" id="segundo_fin_mapeo_automovil" >
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
											<input type="text" id="intervalo_automovil" class="form-control" placeholder="En segundos" required>
										</div>
									</div>

									<br>




									<!-- <div class="form-row">
										<div class="col-sm-3">
											<h6>
												Temperatura
											</h6>
										</div>
										<div class="col-sm-3">
											<label>	Valor seteado:</label>
											<input type="text" id="valor_seteado_temperatura_automovil" class="form-control" placeholder="Valor seteado" required>
										</div>
										<div class="col-sm-3">
											<label>Minima:</label>
											<input type="text" id="temperatura_minima_automovil" class="form-control" placeholder="Temperatura minima" required>
										</div>

										<div class="col-sm-3">
											<label>Maxima:</label>
											<input type="text" id="temperatura_maxima_automovil" class="form-control" placeholder="Temperatura maxima" required>
										</div>
									</div> -->
									<br>
									
									<div class="form-row">
										<div class="col-sm-12" style="text-align:center;">
											<button class="btn-shadow btn-outline-2x btn btn-outline-info"  id="btn_nuevo_mapeo_automovil">Aceptar</button>
										</div>
										<br>
										<div class="col-sm-12" style="text-align:center;">
											<button class="btn-shadow btn-outline-2x btn btn-outline-info"  id="btn_actualizar_mapeo_automovil">Actualizar</button>
											<button class="btn-shadow btn-outline-2x btn btn-outline-danger" id="change_mapeo_automovil">X</button>
										</div>
										
									</div>  

									<br>
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

<div class="tab-pane tabs-animation fade show" id="ver_mapeo_automovil" role="tabpanel">
	<div id="cuerpo_ver_mapeo_automovil">
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
					<tbody id="listando_mapeos_automovil" style="text-align:center;">

					</tbody>

				</table>
			</div>	
		</div>
	</div>
</div>

<div class="tab-pane tabs-animation fade show" id="consecutivo_informe_automovil" role="tabpanel">
	<div class="card-body">
		<div class="form-row">
			<div class="col-sm-12">

				<label>Ingresa el correlativo:</label>
				<input type="text" id="correlativo_informe_automovil" class="form-control">
				<br>
				<button class="btn btn-success" id="cambiando_correlativo_automovil">
					Aceptar
				</button>
			</div>
		</div>
		<br>
		<div class="form-row">
			<div class="col-sm-12">
				<label>Consecutivo actual:</label>
				<br>
				<label class="text-danger" id="aqui_consecutivo_automovil"></label>
			</div>
		</div>
	</div>
</div>

</div>	
</div>
</div>
</div>
</div><!---Cierre del div de la primera pestaña-->



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
						<tbody id="listando_mapeos_creados_automovil">

						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		
		
		
		
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					Alturas disponibles  para &nbsp;&nbsp;&nbsp;
					<h6 id="mapeo_actual_automovil">
					</h6>
					<input type="hidden" id="reposa_id_mapeo_automovil">
					<input type="hidden" id="reposa_id_altura_automovil">
				</div>
				<div class="card-body">
					<table class="table" style="text-align:center;">
						<thead>
							<th>Nombre</th>
							<th>Asociar</th>
						</thead>
						<tbody id="listar_bandejas_creadas_automovil">

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
								<input type="text" id="buscar_sensores_automovil" class="form-control" placeholder="Ingresa el sensor a buscar">
								
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
										<th >Acciones</th>
									</thead>
									<tbody id="sensores_encontrados_automovil">

									</tbody>	
								</table>
							</div>
							
							<div class="mostrar_sensores_contenedor">
								<table class="table" width="100%">
									<thead>
										<th >Nombre</th>
										<th >Tipo</th>
										<th >Acciones</th>
									</thead>
									<tbody id="sensores_resultado_automovil">

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
					SENSORES ASIGNADO PARA 
					<label id="mapeo_actual_automovil_2"></label>
				</div>
				<div class="card-body">
					<div class="form-row">
						<div class="col-sm-12" style="text-align:center;">
							<div class="scroll-area-sm">
								<div class="scrollbar-container">
									<table class="table">
										<thead>
											<th>Altura</th>
											<th>Sensor</th>
											<th>Fecha registro</th>
											<th>Posicion</th>
											<th>Remover</th>
										</thead>	
										<tbody id="mapeos_listos_automovil"> 

										</tbody>
									</table>
								</div>
							</div>	
						</div>	
					</div>
					<br>
					<br>
					<div id="aqui_boton_dc" style="text-align: center;">
						
					</div>
					
					<div class="form-row"> 
						<div class="col-sm-12" id="botton_datos_crudos_automovil">
							
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
						Carga de datos crudos &nbsp;&nbsp;<label id="mapeo_actual_automovil_3"></label>
					</div>
					<div class="card-body">
						<div class="form-row">
							<div class="col-sm-12" style="text-align:center;">
								<form id="form_automovil" enctype="multipart/form-data" method="post">
									<input type="hidden" id="id_mapeo_automovil" name="id_mapeo_automovil">
									<input type="hidden" id="id_asignado_automovil2" name="id_asignado_automovil2">
									
									<div class="form-row">
										<div class="col-sm-12">
											<table class="table">
												<thead>
													<th>Columna</th>
													<th>Sensor</th>
												</thead>
												<tbody id="dc_automovil_seleccionador">
													
												</tbody>
											</table>
										</div>
									</div>
									<!--
									<div class="form-group" id="file_automovil_dc">
										<label for="file">File</label>
										<input type="file" class="form-control" id="file_automovil" name="file_automovil"  required />
									</div>
								-->

								<div class="form-group" id="botoncito_automovil_dc">
									<button class="btn btn-success">
										Cargar
									</button>
								</div>
							</form>

							<div class="form-group" id="carga_up_automovil" style="text-align:center">
								<img src="templates/automovil/recursos/cargaup.gif" style="width:150px;">
							</div>

							<div class="form-group" id="si_existe_dc_autmovil">

							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
      <!--
      <div class="form-row">
        <div class="col-sm-12">
				<div class="card">
					<div class="card-header"> Resultados Datos Crudos &nbsp;&nbsp;
            <label id="mapeo_actual_automovil_3"></label>
          </div>
					<div class="card-body">
						<div class="form-row">
							<div class="col-sm-12" style="text-align:center;">
								<div id="resultados_dc">
								</div>
							</div>
						</div>
            
            <div id="trayendo_resultados">
              <div class="form-row" style="text-align:center;">
                <div class="col-sm-3">
                  <h4>
                     Columna 1
                  </h4>
                 <div class="scroll-area-sm">
                  <div class="scrollbar-container">
                    <table class="table" width="100%">
                    <thead>
                      <th>Tiempo</th>
                      <th>Temperatura</th>
                    </thead>
                    <tbody id="columna_1">
                    </tbody>
                    </table>
                 </div>
                </div>   
                
                </div>
                <div class="col-sm-3">
                  <h4>
                     Columna 2
                  </h4>
                  <div class="scroll-area-sm">
                  <div class="scrollbar-container">
                    <table class="table" width="100%">
                    <thead>
                      <th>Tiempo</th>
                      <th>Temperatura</th>
                    </thead>
                    <tbody id="columna_2">
                    </tbody>
                    </table>
                 </div>
                </div>
                </div>
                <div class="col-sm-3">
                  <h4>
                     Columna 3
                  </h4>
                   <div class="scroll-area-sm">
                  <div class="scrollbar-container">
                    <table class="table" width="100%">
                    <thead>
                      <th>Tiempo</th>
                      <th>Temperatura</th>
                    </thead>
                    <tbody id="columna_3">
                    </tbody>
                    </table>
                 </div>
                </div>
                </div>
                <div class="col-sm-3">
                  <h4>
                     Columna 4
                  </h4>
                   <div class="scroll-area-sm">
                  <div class="scrollbar-container">
                    <table class="table" width="100%">
                    <thead>
                      <th>Tiempo</th>
                      <th>Temperatura</th>
                    </thead>
                    <tbody id="columna_4">
                    </tbody>
                    </table>
                 </div>
                </div>
                </div>
              </div>
              <br>
              <div class="form-row" style="text-align:center;">
                <div class="col-sm-6">
                  <button class="btn btn-success" id="aprobar_dc">
                    Aprobar carga de DC
                  </button>
                </div>
                
                <div class="col-sm-6">
                  <button class="btn btn-danger" id="eliminar_dc">
                    Eliminar DC
                  </button>
                </div>
              </div>
            </div>
					</div>
				</div>
			</div>
      </div>
  -->
</div><!--FIN DE LA PESTAÑA DE DATOS CRUDOS-->

</div><!--CIERRE DE LA PESTAÑA DE ASIGNACIÓN-->


<div class="tab-pane tabs-animation fade show" id="participantes" role="tabpanel">
	<div class="row">
		<div class="col-sm-8">
			<div class="card"> 
				<div class="card-header">
					Participantes del informe
					
					<div class="btn-actions-pane-right">
						<div role="group" class="btn-group-sm nav btn-group">
							<button class="btn btn-danger" id="cerrar_crear_personal_automovil">X</button>
						</div>
					</div>
				</div>
				<div class="card-body">
					
					<!--REGISTRO DEL PERSONAL -->
					<div id="personal_1_automovil">

						<div class="row">
							<input type="hidden" id="id_oculto_personal_automovil">
							<div class="col-sm-4">
								<label>Nombres:</label>
								<input type="text" id="nombres_personal_automovil" class="form-control" placeholder="Escribe los nombres"> 
							</div> 

							<div class="col-sm-4">
								<label>Apellidos:</label>
								<input type="text" id="apellidos_personal_automovil" class="form-control" placeholder="Escribe los apellidos"> 
							</div>

							<div class="col-sm-4">
								<label>Cargo:</label>
								<input type="text" id="cargo_personal_automovil" class="form-control" placeholder="Escribe el cargo"> 
							</div>
						</div>
						
						<br>
						
						<div class="row">
							<div class="col-sm-12" style="text-align:center;">
								<button class="btn btn-success" id="guardar_personal_automovil">
									Guardar 
								</button>
								<button class="btn btn-success" id="editar_personal_automovil">
									Editar 
								</button>
							</div>
						</div>
						
					</div>   
					
					
					
					
					<div class="row" id="personal_2_automovil">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									Personal
									<div class="btn-actions-pane-right">
										<div role="group" class="btn-group-sm nav btn-group">
											<button class="btn btn-success" id="crear_personal_empresa_automovil">+</button>
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
										<tbody id="resultados_personal_automovil">
											
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
				<div class="card-header" style="height: 90x;">
					
					Informes Generados
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<div class="btn-actions-pane-left">
						<div role="group" class="btn-group-sm nav btn-group">
							Quien firma 
							<select class="form-control" id="quien_firma_automovil">
								
							</select>
							<br>
						</div>
					</div>
					
					<div class="btn-actions-pane-right">
						<div role="group" class="btn-group-sm nav btn-group">
							Persona firma : <span class="text-danger" id="persona_firma_automovil"></span>
						</div>
						<br>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
				<div id="traer_informes_automovil">
					
				</div>
			</div>
		</div>
	</div>
	
</div>  

</div><!--Cierre del div content-->
<script type="text/javascript" src="design/js/control_mapeo_automovil.js"></script>