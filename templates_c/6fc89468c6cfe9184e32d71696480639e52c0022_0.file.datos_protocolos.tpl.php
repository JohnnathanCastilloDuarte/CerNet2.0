<?php
/* Smarty version 3.1.34-dev-7, created on 2021-12-13 20:50:11
  from 'C:\xampp\htdocs\CerNet2.0\templates\protocolos\datos_protocolos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61b7a3f3f3d018_28656602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fc89468c6cfe9184e32d71696480639e52c0022' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\protocolos\\datos_protocolos.tpl',
      1 => 1639421688,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b7a3f3f3d018_28656602 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#Protocolo1">
			<span>Protocolo1</span>
		</a>
	</li>
	<li class="nav-item" id="asignacion_mapeo_freezer">
		<a role="tab" class="nav-link" data-toggle="tab" href="#Protocolo2">
			<span>Protocolo2</span>
		</a>
	</li>

	<li class="nav-item" id="asignacion_participantes_freezer">
		<a role="tab" class="nav-link" data-toggle="tab" href="#Protocolo3">
			<span>Protocolo3</span>
		</a>
	</li>

	<li class="nav-item" id="asignacion_informe_freezer">
		<a role="tab" class="nav-link" data-toggle="tab" href="#Protocolo4">
			<span>Protocolo4</span>
		</a>
	</li>
	<li class="nav-item" id="asignacion_informe_freezer">
		<a role="tab" class="nav-link" data-toggle="tab" href="#Protocolo5">
			<span>Protocolo5</span>
		</a>
	</li>
	<li class="nav-item" id="asignacion_informe_freezer">
		<a role="tab" class="nav-link" href="templates/protocolos/informes/pdf/informe_protocolo.php">
			<span>Generar PDF</span>
		</a>
	</li>
</ul>

<div class="tab-content">

	<!-- Protocolo 1 -->
	<div class="tab-pane tabs-animation fade show active" id="Protocolo1" role="tabpanel">
		<div class="row">
			<div class="col-sm-12">
				<div class="card" style="height:100%;">
					<div class="card-header">
						<h6 style="text-align:center;">
							PROTOCOLO DE MAPEO T??RMICO
						</h6>
					</div>
					<div class="card-body">
						<div class="form-row">
							<div class="col-sm-10">
								<label>DESCRIPCI??N PARA MAPEO T??RMICO</label>	
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-12">
								<table class="table" border="0" style="text-align: center;" >
									<tr>
										<th>N??</th>
										<th style="width: 500px;">Datos de identificaci??n</th>
										<th>Especificaci??n</th>
									</tr>
									<tr>
										<td>1</td>
										<td>Almacenamiento</td>
										<td><input type="text" name="" class="form-control col-sm-12" placeholder="Especificaci??n.." id="especificacion_almacenamiento"></td>
									</tr>
									<tr>
										<td>2</td>
										<td>Ubicaci??n</td>
										<td><input type="text" name="" class="form-control col-sm-12" placeholder="Especificaci??n..." id="especificacion_ubicacion"></td>
									</tr>
									<tr>
										<td>3</td>
										<td>Tipo de muro</td>
										<td><input type="text" name="" class="form-control col-sm-12" placeholder="Especificaci??n..." id="especificacion_tipo_muro"></td>
									</tr>
									<tr>
										<td>4</td>
										<td>Tipo de cielo</td>
										<td><input type="text" name="" class="form-control col-sm-12" placeholder="Especificaci??n..." id="especificacion_tipo_cielo"></td>
									</tr>
									<tr>
										<td>5</td>
										<td>Volumen</td>
										<td><input type="text" name="" class="form-control col-sm-12" placeholder="Especificaci??n..." id="espeficicacion_volumen"></td>
									</tr>
									<tr>
										<td>6</td>
										<td>Superficie</td>
										<td><input type="text" name="" class="form-control col-sm-12" placeholder="Especificaci??n..." id="espeficicacion_superficie"></td>
									</tr>
									<tr>
										<td>7</td>
										<td>Altura M??x. de Almacenamiento</td>
										<td><input type="text" name="" class="form-control col-sm-12" placeholder="Especificaci??n..." id="espeficicacion_altura_max"></td>
									</tr>
									<tr>
										<td>8</td>
										<td>Altura de la Bodega</td>
										<td><input type="text" name="" class="form-control col-sm-12" placeholder="Especificaci??n..." id="espeficicacion_altura_bodega"></td>
									</tr>
								</table>
								<hr>
							</div>
						</div>
						<div class="form-row">
							<div class="col-3.1">
								<label>Docum. complementaria</label>
							</div>
							<div class="col-12">
								<input type="text" class="form-control" placeholder="docum. complementaria:" id="docum_complementaria1">
							</div>
						</div>
						<div class="form-row">
							<div class="col-12">
								<label>Observaciones:</label>
								<textarea class="form-control " placeholder="Observaciones..." id="observaciones1"></textarea>
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm-5">
								<label>Desviaciones:</label>
								<select class="form-control" id="desviaciones1">
									<option selected="" value="0">Seleccione...</option>
									<option value="1">Si</option>
									<option value="2">No</option>
								</select>
							</div>
							<div class="col-sm-5" style="margin-top: 35px; color: red;" id="desviaciones_no">
								<span><h6>No se detectaron desviaciones.</h6></span>
							</div>
							<div class="col-sm-5" id="desviaciones_si">
								<label>Descripci??n desviaciones </label>
								<textarea class="form-control" id="descripcion_desviacion1" placeholder="Que desviaciones se detectaron..."></textarea>
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-5">
								<label>Resultado:</label>
								<select class="form-control" id="resultado1">
									<option value="0">Seleccione...</option>
									<option value="cumple">Cumple</option>
									<option value="no_cumple">No cumple</option>
									<option value="no_aplica">No aplica</option>
								</select>
							</div>
						</div>
						<hr>
						<div class="form-row">
							<div class="col-sm-6">
								<label>Realizado por:</label>
								<input type="text" name="" class="form-control" id="realizado_por_1">
							</div>
							<div class="col-sm-6">
								<label>Verificado por:</label>
								<input type="text" name="" class="form-control" id="verificado_por_1">
							</div>
						</div>

						<div class="form-row">
							<div class="col-sm-6">
								<label>firma quien realiza:</label>
								<input type="text" name="" class="form-control" id="firma_realiza1">
							</div>
							<div class="col-sm-6">
								<label>Firma quien verifica:</label>
								<input type="text" name="" class="form-control" id="firma_verifica1">
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm-6">
								<label>Fecha</label>
								<input type="date" name="" class="form-control" id="fecha_realiza1">
							</div>
							<div class="col-sm-6">
								<label>Fecha </label>
								<input type="date" name="" class="form-control" id="fecha_verifica1">
							</div>
						</div>

						<br>
						<div class="form-row">
							<div class="col-sm-5"></div>
							<div class="col-sm-4">
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_crear_protocolo">Aceptar</button>
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_actualizar_protocolo">Actualizar</button>

							</div>
						</div>
						<br>
					</div>	
				</div>	
			</div>
		</div>
	</div>	

	<!-- Protocolo 2 -->
	<div class="tab-pane tabs-animation fade show " id="Protocolo2" role="tabpanel">
		<div class="row">
			<div class="col-sm-12">
				<div class="card" style="height:100%;">
					<div class="card-header">
						<h6 style="text-align:center;">
							PROTOCOLO DE MAPEO T??RMICO
						</h6>
					</div>
					<div class="card-body">
						<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado']->value;?>
" id="id_asignado_freezer">
						<input type="hidden"  id="cuantas_bandeja_freezer">
						<input type="hidden" id="id_bandeja_actualizar_freezer">
						<div class="form-row">
							<div class="col-sm-10">
								<label>Se verifica que la documentaci??n necesaria para el funcionamiento de la bodega est?? presente:</label>	
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-12">
								<table class="table" border="0" style="text-align: center;" >
									<tr>
										<th>N??</th>
										<th >Documentaci??n</th>
										<th>Especificaci??n</th>
										<th>Ubicaci??n</th>
									</tr>
									<tr>
										<td rowspan="2">1</td>
										<td rowspan="2">Plano Arquitectura</td>
										<td>
										   <div class="form-row">
										   	 <div class="col-sm-4">
										   	   <label>Nombre: </label>
										   	 </div>  
											   <input type="text" name="" class="form-control col-sm-6" id="nombre_p_arquitectura_especificacion">
										   </div>
										</td>
										<td>
										   <div class="form-row">
										   	 <div class="col-sm-4">
										   	   <label>Nombre: </label>
										   	 </div>  
											   <input type="text" name="" class="form-control col-sm-6" id="nombre_p_arquitectura_ubicacion">
										   </div>
										</td>
									</tr>
									<tr>
										<td>
										   <div class="form-row">
										   	 <div class="col-sm-4">
										   	   <label>C??digo: </label>
										   	 </div>  
											   <input type="text" name="" class="form-control col-sm-6" id="codigo_p_arquitectura_especificacion">
										   </div>
										</td>
										<td>
										   <div class="form-row">
										   	 <div class="col-sm-4">
										   	   <label>C??digo: </label>
										   	 </div>  
											   <input type="text" name="" class="form-control col-sm-6" id="codigo_p_arquitectura_ubicacion">
										   </div>
										</td>
									</tr>
									<!-- ---- -->
									<tr>
										<td rowspan="2">2</td>
										<td rowspan="2">Plano de flujo operacional/materiales</td>
										<td>
										   <div class="form-row">
										   	 <div class="col-sm-4">
										   	   <label>Nombre: </label>
										   	 </div>  
											   <input type="text" name="" class="form-control col-sm-6" id="nombre_p_flujo_especificacion">
										   </div>
										</td>
										<td>
										   <div class="form-row">
										   	 <div class="col-sm-4">
										   	   <label>Nombre: </label>
										   	 </div>  
											   <input type="text" name="" class="form-control col-sm-6" id="nombre_p_flujo_ubicacion">
										   </div>
										</td>
									</tr>
									<tr>
										<td>
										   <div class="form-row">
										   	 <div class="col-sm-4">
										   	   <label>C??digo: </label>
										   	 </div>  
											   <input type="text" name="" class="form-control col-sm-6" id="codigo_p_flujo_especificacion">
										   </div>
										</td>
										<td>
										   <div class="form-row">
										   	 <div class="col-sm-4">
										   	   <label>C??digo: </label>
										   	 </div>  
											   <input type="text" name="" class="form-control col-sm-6" id="codigo_p_flujo_ubicacion">
										   </div>
										</td>
									</tr>
									<!-- --- -->
									<tr>
										<td rowspan="2">3</td>
										<td rowspan="2">Plano ubicaci??n sensores monitoreo</td>
										<td>
										   <div class="form-row">
										   	 <div class="col-sm-4">
										   	   <label>Nombre: </label>
										   	 </div>  
											   <input type="text" name="" class="form-control col-sm-6" id="nombre_p_ubsensores_especificacion">
										   </div>
										</td>
										<td>
										   <div class="form-row">
										   	 <div class="col-sm-4">
										   	   <label>Nombre: </label>
										   	 </div>  
											   <input type="text" name="" class="form-control col-sm-6" id="nombre_p_ubsensores_ubicacion">
										   </div>
										</td>
									</tr>
									<tr>
										<td>
										   <div class="form-row">
										   	 <div class="col-sm-4">
										   	   <label>C??digo: </label>
										   	 </div>  
											   <input type="text" name="" class="form-control col-sm-6" id="codigo_p_ubsensores_especificacion">
										   </div>
										</td>
										<td>
										   <div class="form-row">
										   	 <div class="col-sm-4">
										   	   <label>C??digo: </label>
										   	 </div>  
											   <input type="text" name="" class="form-control col-sm-6" id="codigo_p_ubsensores_ubicacion">
										   </div>
										</td>
									</tr>
									
								</table>
								<hr>
							</div>
						</div>
						<div class="form-row">
							<div class="col-3.1">
								<label>Docum. complementaria</label>
							</div>
							<div class="col-12">
								<input type="text" class="form-control" placeholder="Docum. complementaria:" id="docum_complementaria2">
							</div>
						</div>
						<div class="form-row">
							<div class="col-12">
								<label>Observaciones:</label>
								<textarea class="form-control " placeholder="Observaciones..." id="observaciones2"></textarea>
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm-5">
								<label>Desviaciones:</label>
								<select class="form-control" id="desviaciones2">
									<option selected="" value="0">Seleccione...</option>
									<option value="1">Si</option>
									<option value="2">No</option>
								</select>
							</div>
							<div class="col-sm-5" style="margin-top: 35px; color: red;" id="desviaciones_no2">
								<span><h6>No se detectaron desviaciones.</h6></span>
							</div>
							<div class="col-sm-5" id="desviaciones_si2">
								<label>Descripci??n desviaciones </label>
								<textarea class="form-control" id="descripcion_desviacion2" placeholder="Que desviaciones se detectaron..."></textarea>
							</div>
							
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-5">
								<label>Resultado:</label>
								<select class="form-control" id="resultado2">
									<option value="0">Seleccione...</option>
									<option value="cumple">Cumple</option>
									<option value="no_cumple">No cumple</option>
									<option value="no_aplica">No aplica</option>
								</select>
							</div>
						</div>
						<hr>
						<div class="form-row">
							<div class="col-sm-6">
								<label>Realizado por:</label>
								<input type="text" name="" class="form-control" id="realizado_por_2">
							</div>
							<div class="col-sm-6">
								<label>Verificado por:</label>
								<input type="text" name="" class="form-control" id="verificado_por_2">
							</div>
						</div>

						<div class="form-row">
							<div class="col-sm-6">
								<label>firma quien realiza:</label>
								<input type="text" name="" class="form-control" placeholder="" id="firma_realiza2">
							</div>
							<div class="col-sm-6">
								<label>Firma quien verifica:</label>
								<input type="text" name="" class="form-control" placeholder="" id="firma_verifica2">
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm-6">
								<label>Fecha:</label>
								<input type="date" name="" class="form-control" id="fecha_realiza2">
							</div>
							<div class="col-sm-6">
								<label>Fecha:</label>
								<input type="date" name="" class="form-control" id="fecha_verifica2">
							</div>
						</div>

						<br>
						<div class="form-row">
							<div class="col-sm-5"></div>
							<div class="col-sm-4">
							</div>
						</div>
						<br>
					</div>	
				</div>	
			</div>
		</div>
	</div>	

	<!-- Protocolo 3 -->
	<div class="tab-pane tabs-animation fade show " id="Protocolo3" role="tabpanel">
		<div class="row">
			<div class="col-sm-12">
				<div class="card" style="height:100%;">
					<div class="card-header">
						<h6 style="text-align:center;">
							PROTOCOLO DE MAPEO T??RMICO
						</h6>
					</div>
					<div class="card-body">
						<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado']->value;?>
" id="id_asignado_freezer">
						<input type="hidden"  id="cuantas_bandeja_freezer">
						<input type="hidden" id="id_bandeja_actualizar_freezer">
						<div class="form-row">
							<div class="col-sm-10">
								<label>Verificar que los sensores de monitoreo se encuentren calibrados o verificados.</label>	
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-12">
								<table class="table" border="0"  >
									<tr>
										<th rowspan="2">N??</th>
										<th rowspan="2">Instrumento</th>
										<th rowspan="2">Funci??n</th>
										<th colspan="3">Especificaci??n</th>
									</tr>
									<tr>
										<th>sensor</th>
										<th>ubicaci??n</th>
										<th>altura</th>
									</tr>
									<tr>
										<td>1</td>
										<td>Sensor de temperatura/alarma</td>
										<td><input type="text" name="" class="form-control" placeholder="Funci??n" id="sensor_temperatura_funcion"></td>
										<td><input type="text" name="" class="form-control" placeholder="sensor" id="sensor_temperatura_sensor"></td>
										<td><input type="text" name="" class="form-control" placeholder="ubicaci??n" id="sensor_temperatura_ubicacion"></td>
										<td><input type="text" name="" class="form-control" placeholder="0,0 m" id="sensor_temperatura_altura"></td>
									</tr>
									<tr>
										<td>2</td>
										<td>Sensor de humedad relativa/alarma</td>
										<td><input type="text" name="" class="form-control" placeholder="Funci??n" id="sensor_humedad_funcion"></td>
										<td><input type="text" name="" class="form-control" placeholder="sensor" id="sensor_humedad_sensor"></td>
										<td><input type="text" name="" class="form-control" placeholder="ubicaci??n" id="sensor_humedad_ubicacion"></td>
										<td><input type="text" name="" class="form-control" placeholder="0,0 m" id="sensor_humedad_altura"></td>
									</tr>
									<tr>
										<td>2</td>
										<td>Sensor de humedad relativa/alarma</td>
										<td><input type="text" name="" class="form-control" placeholder="Funci??n" id="sensor_humedad_funcion2"></td>
										<td><input type="text" name="" class="form-control" placeholder="sensor" id="sensor_humedad_sensor2"></td>
										<td><input type="text" name="" class="form-control" placeholder="ubicaci??n" id="sensor_humedad_ubicacion2"></td>
										<td><input type="text" name="" class="form-control" placeholder="0,0 m" id="sensor_humedad_altura2"></td>
									</tr>

								</table>
								<hr>
							</div>
						</div>
						<div class="form-row">
							<div class="col-3.1">
								<label>Docum. complementaria</label>
							</div>
							<div class="col-12">
								<input type="text" class="form-control" placeholder="Docum. complementaria:" id="docum_complementaria3">
							</div>
						</div>
						<div class="form-row">
							<div class="col-12">
								<label>Observaciones:</label>
								<textarea class="form-control " placeholder="Observaciones..." id="observaciones3"></textarea>
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm-5">
								<label>Desviaciones:</label>
								<select class="form-control" id="desviaciones3">
									<option selected="" value="0">Seleccione...</option>
									<option value="1">Si</option>
									<option value="2">No</option>
								</select>
							</div>
							<div class="col-sm-5" style="margin-top: 35px; color: red;" id="desviaciones_no3">
								<span><h6>No se detectaron desviaciones.</h6></span>
							</div>
							<div class="col-sm-5" id="desviaciones_si3">
								<label>Descripci??n desviaciones </label>
								<textarea class="form-control" id="descripcion_desviacion2" placeholder="Que desviaciones se detectaron..."></textarea>
							</div>
							
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-5">
								<label>Resultado:</label>
								<select class="form-control" id="resultado3">
									<option value="0">Seleccione...</option>
									<option value="cumple">Cumple</option>
									<option value="no_cumple">No cumple</option>
									<option value="no_aplica">No aplica</option>
								</select>
							</div>
						</div>
						<hr>
						<div class="form-row">
							<div class="col-sm-6">
								<label>Realizado por:</label>
								<input type="text" name="" class="form-control" id="realizado_por_3">
							</div>
							<div class="col-sm-6">
								<label>Verificado por:</label>
								<input type="text" name="" class="form-control" id="verificado_por_3">
							</div>
						</div>

						<div class="form-row">
							<div class="col-sm-6">
								<label>firma quien realiza:</label>
								<input type="text" name="" class="form-control" placeholder="" id="firma_realiza3">
							</div>
							<div class="col-sm-6">
								<label>Firma quien verifica:</label>
								<input type="text" name="" class="form-control" placeholder="" id="firma_verifica3">
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm-6">
								<label>Fecha:</label>
								<input type="date" name="" class="form-control" id="fecha_realiza3">
							</div>
							<div class="col-sm-6">
								<label>Fecha:</label>
								<input type="date" name="" class="form-control" id="fecha_verifica3">
							</div>
						</div>

						<br>
						<br>
					</div>	
				</div>	
			</div>
		</div>
	</div>

	<!-- Protocolo 4 -->
	<div class="tab-pane tabs-animation fade show " id="Protocolo4" role="tabpanel">
		<div class="row">
			<div class="col-sm-12">
				<div class="card" style="height:100%;">
					<div class="card-header">
						<h6 style="text-align:center;">
							PROTOCOLO DE MAPEO T??RMICO
						</h6>
					</div>
					<div class="card-body">
						<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado']->value;?>
" id="id_asignado_freezer">
						<input type="hidden"  id="cuantas_bandeja_freezer">
						<input type="hidden" id="id_bandeja_actualizar_freezer">
						<div class="form-row">
							<div class="col-sm-10">
								<label>Verificar los servicios de apoyo ??? Sistema de Climatizaci??n.</label>	
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-12">
								<table class="table" border="0"  >
									<tr>
										<th colspan="3" style="text-align: center;">Servicios de Apoyo ??? Sistema de Climatizaci??n</th>
									</tr>
									<tr>
										<td>Climatizaci??n</td>
										<td><input type="text" name="" class="form-control col-sm-12" placeholder="No aplica" id="climatizacion"></td>
									</tr>
									<tr>
										<td>Marca</td>
										<td><input type="text" name="" class="form-control col-sm-12" placeholder="No aplica" id="marca"></td>
									</tr>
									<tr>
										<td>Seteo de temperatura</td>
										<td><input type="text" name="" class="form-control col-sm-12" placeholder="No aplica" id="seteo_temperatura"></td>
									</tr>
									<tr>
										<td>Documentaci??n de Calificaci??n o commissioning</td>
										<td><input type="text" name="" class="form-control col-sm-12" placeholder="No aplica" id="doc_calificacion"></td>
									</tr>
								</table>
								<hr>
							</div>
						</div>
						<div class="form-row">
							<div class="col-3.1">
								<label>Docum. complementaria</label>
							</div>
							<div class="col-12">
								<input type="text" class="form-control" placeholder="Docum. complementaria:" id="docum_complementaria4">
							</div>
						</div>
						<div class="form-row">
							<div class="col-12">
								<label>Observaciones:</label>
								<textarea class="form-control " placeholder="Observaciones..." id="observaciones4"></textarea>
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm-5">
								<label>Desviaciones:</label>
								<select class="form-control" id="desviaciones4">
									<option selected="" value="0">Seleccione...</option>
									<option value="1">Si</option>
									<option value="2">No</option>
								</select>
							</div>
							<div class="col-sm-5" style="margin-top: 35px; color: red;" id="desviaciones_no4">
								<span><h6>No se detectaron desviaciones.</h6></span>
							</div>
							<div class="col-sm-5" id="desviaciones_si4">
								<label>Descripci??n desviaciones </label>
								<textarea class="form-control" id="descripcion_desviacion4" placeholder="Que desviaciones se detectaron..."></textarea>
							</div>
							
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-5">
								<label>Resultado:</label>
								<select class="form-control" id="resultado4">
									<option value="0">Seleccione...</option>
									<option value="cumple">Cumple</option>
									<option value="no_cumple">No cumple</option>
									<option value="no_aplica">No aplica</option>
								</select>
							</div>
						</div>
						<hr>
						<div class="form-row">
							<div class="col-sm-6">
								<label>Realizado por:</label>
								<input type="text" name="" class="form-control" id="realizado_por_4">
							</div>
							<div class="col-sm-6">
								<label>Verificado por:</label>
								<input type="text" name="" class="form-control" id="verificado_por_4">
							</div>
						</div>

						<div class="form-row">
							<div class="col-sm-6">
								<label>firma quien realiza:</label>
								<input type="text" name="" class="form-control" placeholder="" id="firma_realiza4">
							</div>
							<div class="col-sm-6">
								<label>Firma quien verifica:</label>
								<input type="text" name="" class="form-control" placeholder="" id="firma_verifica4">
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm-6">
								<label>Fecha</label>
								<input type="date" name="" class="form-control" id="fecha_realiza4">
							</div>
							<div class="col-sm-6">
								<label>Fecha </label>
								<input type="date" name="" class="form-control" id="fecha_verifica4">
							</div>
						</div>

						<br>

						<br>
					</div>	
				</div>	
			</div>
		</div>
	</div>	

	<!-- Protocolo 5 -->
	<div class="tab-pane tabs-animation fade show " id="Protocolo5" role="tabpanel">
		<div class="row">
			<div class="col-sm-12">
				<div class="card" style="height:100%;">
					<div class="card-header">
						<h6 style="text-align:center;">
							PROTOCOLO DE MAPEO T??RMICO
						</h6>
					</div>
					<div class="card-body">
						<div class="form-row">
							<div class="col-sm-10">
								<label>En la inspecci??n a la bodega se podr??n definir los riesgos asociados al almacenamiento para identificar los puntos cr??ticos de la bodega, lo cual permitir?? generar un documento del an??lisis de riesgo de la Bodega Rob??tica (M??dulo A12).</label>	
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-12">
								<table class="table"  style="text-align: center;" >
									<tr>
										<th>N??</th>
										<th>Documento</th>
										<th>Descripci??n</th>
									</tr>
									<tr>
										<th rowspan="2">1</th>
										<td rowspan="2">An??lisis de Riesgo</td>
										<td>
										   <div class="form-row">
										   	 <div class="col-sm-4">
										   	   <label>C??digo: </label>
										   	 </div>  
											   <input type="text" name="" class="form-control col-sm-6" placeholder="C??digo" id="codigo_analisis">
										   </div>
										</td>
									</tr>
									<tr>
										<td>
										   <div class="form-row">
										   	 <div class="col-sm-4">
										   	   <label>No Revisi??n: </label>
										   	 </div>  
											   <input type="text" name="" class="form-control col-sm-6" placeholder="0.0.0" id="numero_revision">
										   </div>
										</td>
									</tr>
								</table>
								<hr>
							</div>
						</div>
						<div class="form-row">
							<div class="col-3.1">
								<label>Docum. complementaria</label>
							</div>
							<div class="col-12">
								<input type="text" class="form-control" placeholder="Docum. complementaria:" id="docum_complementaria5">
							</div>
						</div>
						<div class="form-row">
							<div class="col-12">
								<label>Observaciones:</label>
								<textarea class="form-control " placeholder="Observaciones..." id="observaciones5"></textarea>
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm-5">
								<label>Desviaciones:</label>
								<select class="form-control" id="desviaciones5">
									<option selected="" value="0">Seleccione...</option>
									<option value="1">Si</option>
									<option value="2">No</option>
								</select>
							</div>
							<div class="col-sm-5" style="margin-top: 35px; color: red;" id="desviaciones_no5">
								<span><h6>No se detectaron desviaciones.</h6></span>
							</div>
							<div class="col-sm-5" id="desviaciones_si5">
								<label>Descripci??n desviaciones </label>
								<textarea class="form-control" id="descripcion_desviacion5" placeholder="Que desviaciones se detectaron..."></textarea>
							</div>
							
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-5">
								<label>Resultado:</label>
								<select class="form-control" id="resultado5">
									<option value="0">Seleccione...</option>
									<option value="cumple">Cumple</option>
									<option value="no_cumple">No cumple</option>
									<option value="no_aplica">No aplica</option>
								</select>
							</div>
						</div>
						<hr>
						<div class="form-row">
							<div class="col-sm-6">
								<label>Realizado por:</label>
								<input type="text" name="" class="form-control" id="realizado_por_5">
							</div>
							<div class="col-sm-6">
								<label>Verificado por:</label>
								<input type="text" name="" class="form-control" id="verificado_por_5">
							</div>
						</div>

						<div class="form-row">
							<div class="col-sm-6">
								<label>firma quien realiza:</label>
								<input type="text" name="" class="form-control" placeholder="" id="firma_realiza5">
							</div>
							<div class="col-sm-6">
								<label>Firma quien verifica:</label>
								<input type="text" name="" class="form-control" placeholder="" id="firma_verifica5">
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm-6">
								<label>Fecha</label>
								<input type="date" name="" class="form-control" id="fecha_realiza5">
							</div>
							<div class="col-sm-6">
								<label>Fecha </label>
								<input type="date" name="" class="form-control" id="fecha_verifica5">
							</div>
						</div>

						<br>
						<div class="form-row">
							<div class="col-sm-5"></div>
							<div class="col-sm-4">
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_crear_protocolo">Aceptar</button>
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_actualizar_protocolo">Actualizar</button>
							</div>
						</div>
						<br>
					</div>	
				</div>	
			</div>
		</div>
	</div>				
</div>


 <?php echo '<script'; ?>
 type="text/javascript" src="design/js/control_protocolos.js"><?php echo '</script'; ?>
>


<?php }
}
