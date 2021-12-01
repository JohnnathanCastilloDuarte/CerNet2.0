<?php
/* Smarty version 3.1.34-dev-7, created on 2021-12-01 15:01:41
  from 'C:\xampp\htdocs\CerNet2.0\templates\freezer\datos_informe_mapeo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61a780455f4398_48931051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03041c77d5f364c2ea7062249c49902982bddab1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\freezer\\datos_informe_mapeo.tpl',
      1 => 1638367299,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61a780455f4398_48931051 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#creacion">
			<span>Creación</span>
		</a>
	</li>
	<li class="nav-item" id="asignacion_mapeo_freezer">
		<a role="tab" class="nav-link" id="asignacion" data-toggle="tab" href="#asignacion_freezer">
			<span>Asignación</span>
		</a>
	</li>

	<li class="nav-item" id="asignacion_participantes_freezer">
		<a role="tab" class="nav-link" id="Complemento" data-toggle="tab" href="#participantes_freezer">
			<span>Complemento</span>
		</a>
	</li>

	<li class="nav-item" id="asignacion_informe_freezer">
		<a role="tab" class="nav-link" id="informes" data-toggle="tab" href="#informes_1_freezer">
			<span>Informes</span>
		</a>
	</li>
</ul>


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
					<div class="card-body">
						<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado']->value;?>
" id="id_asignado_freezer">
						<input type="hidden"  id="cuantas_bandeja_freezer">
						<input type="hidden" id="id_bandeja_actualizar_freezer">
						<div class="form-row">
							<div class="col-sm-10">
								<label>Agregue la cantidad de bandejas para el Freezer</label>	
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-12">
								<input type="text" id="bandeja_freezer" placeholder="Ingresa el nombre de la bandeja" class="form-control">
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-sm-5"></div>
							<div class="col-sm-4">
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nueva_bandeja_freezer">Aceptar</button>
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_actualizar_bandeja_freezer">Actualizar</button>

							</div>
						</div>
						<br>
						<div class="form-row">
							<table class="table" width="100%">
								<thead style="text-align:center;">
									<th>Nombre</th>
									<th>Acciones</th>
								</thead>
								<tbody id="resultados_bandeja_freezer" style="text-align:center;">
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
								<a role="tab" class="nav-link  active" id="mapeo" data-toggle="tab" href="#crear_mapeo_freezer">
									<span>Mapeo</span>
								</a>
							</li>
							<li class="nav-item">
								<a role="tab" class="nav-link" id="vermapeo" data-toggle="tab" href="#ver_mapeo_freezer">
									<span>Ver mapeo</span>
								</a>
							</li>
							<li class="nav-item">
								<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#consecutivo_informe_freezer">
									<span>Correlativo</span>
								</a>
							</li>
							<!--
							<li class="nav-item">
								<a role="tab" class="nav-link" id="informes_freezer" data-toggle="tab" href="#cargar_informes">
									<span>Genera informes</span>
								</a>
							</li>
						-->
						</ul>				
					</div>

					<div class="tab-content">
						<div class="tab-pane tabs-animation fade show active" id="crear_mapeo_freezer" role="tabpanel">
							<div class="card-body">
								<h6 class="text-warning" style="text-align:center;" id="anuncio_mapeo_1_freezer">Debes completar la información de bandejas</h6>
								<div id="cuerpo_mapeo_freezer">
									<input type="hidden" id="id_mapeo_creado_freezer">
									
									<div class="form-row">
										<div class="col-sm-5">
											<label>Nombre mapeo:</label>
											<select id="nombre_mapeo_freezer" class="form-control" required>
												<option value="0">Seleccione...</option>
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
										<div class="col-sm-12" style="text-align:center;">
											<h6>Fecha inicio mapeo:</h6>
											<div class="form-row">
												<div class="col-sm-3">
													<label>Fecha:</label>
													<input type="date" class="form-control" id="fecha_inicio_mapeo_freezer" >
												</div>
												<div class="col-sm-3">
													<label>H:</label>
													<select  class="form-control" id="hora_inicio_mapeo_freezer" >
														<?php
$_smarty_tpl->tpl_vars['hora'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['hora']->step = 1;$_smarty_tpl->tpl_vars['hora']->total = (int) ceil(($_smarty_tpl->tpl_vars['hora']->step > 0 ? 24+1 - (0) : 0-(24)+1)/abs($_smarty_tpl->tpl_vars['hora']->step));
if ($_smarty_tpl->tpl_vars['hora']->total > 0) {
for ($_smarty_tpl->tpl_vars['hora']->value = 0, $_smarty_tpl->tpl_vars['hora']->iteration = 1;$_smarty_tpl->tpl_vars['hora']->iteration <= $_smarty_tpl->tpl_vars['hora']->total;$_smarty_tpl->tpl_vars['hora']->value += $_smarty_tpl->tpl_vars['hora']->step, $_smarty_tpl->tpl_vars['hora']->iteration++) {
$_smarty_tpl->tpl_vars['hora']->first = $_smarty_tpl->tpl_vars['hora']->iteration === 1;$_smarty_tpl->tpl_vars['hora']->last = $_smarty_tpl->tpl_vars['hora']->iteration === $_smarty_tpl->tpl_vars['hora']->total;?>
														<?php if ($_smarty_tpl->tpl_vars['hora']->value < 10) {?>
														<option value="0<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
">0<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
</option>
														<?php } else { ?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
</option>
														<?php }?>									
														<?php }
}
?>
													</select>
												</div>
												<div class="col-sm-3">
													<label>M:</label>
													<select  class="form-control" id="minuto_inicio_mapeo_freezer" >
														<?php
$_smarty_tpl->tpl_vars['minuto'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['minuto']->step = 1;$_smarty_tpl->tpl_vars['minuto']->total = (int) ceil(($_smarty_tpl->tpl_vars['minuto']->step > 0 ? 60+1 - (0) : 0-(60)+1)/abs($_smarty_tpl->tpl_vars['minuto']->step));
if ($_smarty_tpl->tpl_vars['minuto']->total > 0) {
for ($_smarty_tpl->tpl_vars['minuto']->value = 0, $_smarty_tpl->tpl_vars['minuto']->iteration = 1;$_smarty_tpl->tpl_vars['minuto']->iteration <= $_smarty_tpl->tpl_vars['minuto']->total;$_smarty_tpl->tpl_vars['minuto']->value += $_smarty_tpl->tpl_vars['minuto']->step, $_smarty_tpl->tpl_vars['minuto']->iteration++) {
$_smarty_tpl->tpl_vars['minuto']->first = $_smarty_tpl->tpl_vars['minuto']->iteration === 1;$_smarty_tpl->tpl_vars['minuto']->last = $_smarty_tpl->tpl_vars['minuto']->iteration === $_smarty_tpl->tpl_vars['minuto']->total;?>
														<?php if ($_smarty_tpl->tpl_vars['minuto']->value < 10) {?>
														<option value="0<?php echo $_smarty_tpl->tpl_vars['minuto']->value;?>
">0<?php echo $_smarty_tpl->tpl_vars['minuto']->value;?>
</option>
														<?php } else { ?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['minuto']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['minuto']->value;?>
</option>
														<?php }?>									
														<?php }
}
?>
													</select>
												</div>
												<div class="col-sm-3">
													<label>S:</label>
													<select  class="form-control" id="segundo_inicio_mapeo_freezer" >
														<?php
$_smarty_tpl->tpl_vars['segundo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['segundo']->step = 1;$_smarty_tpl->tpl_vars['segundo']->total = (int) ceil(($_smarty_tpl->tpl_vars['segundo']->step > 0 ? 60+1 - (0) : 0-(60)+1)/abs($_smarty_tpl->tpl_vars['segundo']->step));
if ($_smarty_tpl->tpl_vars['segundo']->total > 0) {
for ($_smarty_tpl->tpl_vars['segundo']->value = 0, $_smarty_tpl->tpl_vars['segundo']->iteration = 1;$_smarty_tpl->tpl_vars['segundo']->iteration <= $_smarty_tpl->tpl_vars['segundo']->total;$_smarty_tpl->tpl_vars['segundo']->value += $_smarty_tpl->tpl_vars['segundo']->step, $_smarty_tpl->tpl_vars['segundo']->iteration++) {
$_smarty_tpl->tpl_vars['segundo']->first = $_smarty_tpl->tpl_vars['segundo']->iteration === 1;$_smarty_tpl->tpl_vars['segundo']->last = $_smarty_tpl->tpl_vars['segundo']->iteration === $_smarty_tpl->tpl_vars['segundo']->total;?>
														<?php if ($_smarty_tpl->tpl_vars['segundo']->value < 10) {?>
														<option value="0<?php echo $_smarty_tpl->tpl_vars['segundo']->value;?>
">0<?php echo $_smarty_tpl->tpl_vars['segundo']->value;?>
</option>
														<?php } else { ?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['segundo']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['segundo']->value;?>
</option>
														<?php }?>									
														<?php }
}
?>
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
													<input type="date" class="form-control" id="fecha_fin_mapeo_freezer" >
												</div>
												<div class="col-sm-3">
													<label>H:</label>
													<select  class="form-control" id="hora_fin_mapeo_freezer" >
														<?php
$_smarty_tpl->tpl_vars['hora'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['hora']->step = 1;$_smarty_tpl->tpl_vars['hora']->total = (int) ceil(($_smarty_tpl->tpl_vars['hora']->step > 0 ? 24+1 - (0) : 0-(24)+1)/abs($_smarty_tpl->tpl_vars['hora']->step));
if ($_smarty_tpl->tpl_vars['hora']->total > 0) {
for ($_smarty_tpl->tpl_vars['hora']->value = 0, $_smarty_tpl->tpl_vars['hora']->iteration = 1;$_smarty_tpl->tpl_vars['hora']->iteration <= $_smarty_tpl->tpl_vars['hora']->total;$_smarty_tpl->tpl_vars['hora']->value += $_smarty_tpl->tpl_vars['hora']->step, $_smarty_tpl->tpl_vars['hora']->iteration++) {
$_smarty_tpl->tpl_vars['hora']->first = $_smarty_tpl->tpl_vars['hora']->iteration === 1;$_smarty_tpl->tpl_vars['hora']->last = $_smarty_tpl->tpl_vars['hora']->iteration === $_smarty_tpl->tpl_vars['hora']->total;?>
														<?php if ($_smarty_tpl->tpl_vars['hora']->value < 10) {?>
														<option value="0<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
">0<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
</option>
														<?php } else { ?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
</option>
														<?php }?>									
														<?php }
}
?>
													</select>
												</div>
												<div class="col-sm-3">
													<label>M:</label>
													<select  class="form-control" id="minuto_fin_mapeo_freezer" >
														<?php
$_smarty_tpl->tpl_vars['minuto'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['minuto']->step = 1;$_smarty_tpl->tpl_vars['minuto']->total = (int) ceil(($_smarty_tpl->tpl_vars['minuto']->step > 0 ? 60+1 - (0) : 0-(60)+1)/abs($_smarty_tpl->tpl_vars['minuto']->step));
if ($_smarty_tpl->tpl_vars['minuto']->total > 0) {
for ($_smarty_tpl->tpl_vars['minuto']->value = 0, $_smarty_tpl->tpl_vars['minuto']->iteration = 1;$_smarty_tpl->tpl_vars['minuto']->iteration <= $_smarty_tpl->tpl_vars['minuto']->total;$_smarty_tpl->tpl_vars['minuto']->value += $_smarty_tpl->tpl_vars['minuto']->step, $_smarty_tpl->tpl_vars['minuto']->iteration++) {
$_smarty_tpl->tpl_vars['minuto']->first = $_smarty_tpl->tpl_vars['minuto']->iteration === 1;$_smarty_tpl->tpl_vars['minuto']->last = $_smarty_tpl->tpl_vars['minuto']->iteration === $_smarty_tpl->tpl_vars['minuto']->total;?>
														<?php if ($_smarty_tpl->tpl_vars['minuto']->value < 10) {?>
														<option value="0<?php echo $_smarty_tpl->tpl_vars['minuto']->value;?>
">0<?php echo $_smarty_tpl->tpl_vars['minuto']->value;?>
</option>
														<?php } else { ?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['minuto']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['minuto']->value;?>
</option>
														<?php }?>									
														<?php }
}
?>
													</select>
												</div>
												<div class="col-sm-3">
													<label>S:</label>
													<select  class="form-control" id="segundo_fin_mapeo_freezer" >
														<?php
$_smarty_tpl->tpl_vars['segundo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['segundo']->step = 1;$_smarty_tpl->tpl_vars['segundo']->total = (int) ceil(($_smarty_tpl->tpl_vars['segundo']->step > 0 ? 60+1 - (0) : 0-(60)+1)/abs($_smarty_tpl->tpl_vars['segundo']->step));
if ($_smarty_tpl->tpl_vars['segundo']->total > 0) {
for ($_smarty_tpl->tpl_vars['segundo']->value = 0, $_smarty_tpl->tpl_vars['segundo']->iteration = 1;$_smarty_tpl->tpl_vars['segundo']->iteration <= $_smarty_tpl->tpl_vars['segundo']->total;$_smarty_tpl->tpl_vars['segundo']->value += $_smarty_tpl->tpl_vars['segundo']->step, $_smarty_tpl->tpl_vars['segundo']->iteration++) {
$_smarty_tpl->tpl_vars['segundo']->first = $_smarty_tpl->tpl_vars['segundo']->iteration === 1;$_smarty_tpl->tpl_vars['segundo']->last = $_smarty_tpl->tpl_vars['segundo']->iteration === $_smarty_tpl->tpl_vars['segundo']->total;?>
														<?php if ($_smarty_tpl->tpl_vars['segundo']->value < 10) {?>
														<option value="0<?php echo $_smarty_tpl->tpl_vars['segundo']->value;?>
">0<?php echo $_smarty_tpl->tpl_vars['segundo']->value;?>
</option>
														<?php } else { ?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['segundo']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['segundo']->value;?>
</option>
														<?php }?>									
														<?php }
}
?>
													</select>
												</div>
											</div>
										</div>
									</div>

									<br>

									<div class="form-row">
										<div class="col-sm-4">
											<label>	Intervalo:</label>
											<input type="text" id="intervalo_freezer" class="form-control" placeholder="En segundos" required>
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
											<input type="text" id="valor_seteado_temperatura_freezer" class="form-control" placeholder="Valor seteado" required>
										</div>
										<div class="col-sm-3">
											<label>Minima:</label>
											<input type="text" id="temperatura_minima_freezer" class="form-control" placeholder="Temperatura minima" required>
										</div>

										<div class="col-sm-3">
											<label>Maxima:</label>
											<input type="text" id="temperatura_maxima_freezer" class="form-control" placeholder="Temperatura maxima" required>
										</div>
									</div>


									<br>

									<div class="form-row">
										<div class="col-sm-3">
											<h6>
												Humedad
											</h6>
										</div>
										<div class="col-sm-3">
											<label>	Valor seteado:</label>
											<input type="text" id="valor_seteado_humedad_freezer" class="form-control" placeholder="Valor seteado" required>
										</div>
										<div class="col-sm-3">
											<label>Minima:</label>
											<input type="text" id="humedad_minima_freezer" class="form-control" placeholder="Humedad minima" required>
										</div>

										<div class="col-sm-3">
											<label>Maxima:</label>
											<input type="text" id="humedad_maxima_freezer" class="form-control" placeholder="Humedad maxima" required>
										</div>
									</div>
									<br>


									<div class="form-row">
										<div class="col-sm-6">
											<label>¿ Incluir en informe base ?</label>
											<select class="form-control" id="informe_base_freezer">
												<option value="null">Seleccione...</option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										<div class="col-sm-6">
											<label></label>
										</div>
										<div class="col-sm-4"></div>
										<div class="col-sm-4" style="text-align:center;">
											<br>
											<button class="btn-shadow btn-outline-2x btn btn-outline-info"  id="btn_nuevo_mapeo_freezer">Aceptar</button>
											<button class="btn-shadow btn-outline-2x btn btn-outline-info"  id="btn_actualizar_mapeo_freezer">Actualizar</button>

											<button class="btn-shadow btn-outline-2x btn btn-outline-danger" id="change_mapeo_freezer">X</button>
										</div>
									</div>




									<br>

									
								</div>
							</div>
						</div>

						<div class="tab-pane tabs-animation fade" id="ver_mapeo_freezer" role="tabpanel">
							<div class="card-body">
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
										<tbody id="listando_mapeos_freezer">

										</tbody>

									</table>
								</div>	
							</div>
						</div>

						<div class="tab-pane tabs-animation fade show" id="consecutivo_informe_freezer" role="tabpanel">
							<div class="card-body">
								<div class="form-row">
									<div class="col-sm-12">

										<label>Ingresa el correlativo:</label>
										<input type="text" id="correlativo_informe_freezer" class="form-control">
										<br>
										<button class="btn btn-success" id="cambiando_correlativo_freezer">
											Aceptar
										</button>
									</div>
								</div>
								<br>
								<div class="form-row">
									<div class="col-sm-12">
										<label>Consecutivo actual:</label>
										<br>
										<label class="text-danger" id="aqui_consecutivo_freezer"></label>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div><!--Cierre del tab creacion-->

	<div class="tab-pane tabs-animation fade show" id="asignacion_freezer" role="tabpanel">

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
							<tbody id="listando_mapeos_creados_freezer">

							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="card">
					<div class="card-header">
						Bandejas disponibles  para 
						<span id="mapeo_actual_freezer">
						</span>
					</div>
					<div class="card-body">
						<table class="table" style="text-align:center;">
							<thead>
								<th>Nombre</th>
								<th>Asociar</th>
							</thead>
							<tbody id="listar_bandejas_creadas_freezer">

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
						<div class="buscador_de_sensores_acme_freerzer">
							<div class="row">
								<div class="col-sm-6">
									<input type="text" id="buscar_sensores_freezer" class="form-control" placeholder="Ingresa el sensor a buscar">

								</div>
							</div>

						</div>
						<div class="scroll-area-sm">
							<div class="scrollbar-container">
								<div class="mostrar_sensores_contenedor_buscados_freezer">
									<table class="table" width="100%">
										<thead>
											<th >Nombre</th>
											<th >Tipo</th>
											<th >Asociar</th>
										</thead>
										<tbody id="sensores_encontrados_freezer">

										</tbody>	
									</table>
								</div>

								<div class="mostrar_sensores_contenedor_freezer">
									<table class="table" width="100%">
										<thead>
											<th >Nombre</th>
											<th >Tipo</th>
											<th >Asociar</th>
										</thead>
										<tbody id="sensores_resultado_freezer">

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
							<div class="col-sm-12">
								<div class="scroll-area-sm">
									<div class="scrollbar-container">
										<table class="table" width="100%">
											<thead>
												<th>Bandeja</th>
												<th>Sensor</th>
												<th>Posicion</th>
												<th>Fecha registro</th>
												<!--<th >Datos crudos</th>-->
											</thead>	
											<tbody id="mapeos_listos_freezer"> 

											</tbody>
										</table>
									<div style="text-align: center;">
										<button class="btn btn-success" id="boton_condatos_cargados">Datos crudos cargados</button>
										<button class="btn btn-danger" id="boton_sindatos_cargados">Datos crudos por cargar</button>
									 </div>
									</div>
								</div>	
							</div>	
						</div>

						<div class="form-row"> 
							<div class="col-sm-12" id="botton_datos_crudos_">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<br>

		<div class="cargar_datos_crudos">
			<div class="form-row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-header">
							Carga de datos crudos
						</div>
						<div class="card-body">
						<div class="form-row">
							<div class="col-sm-12" style="text-align:center;">
								<form id="form_freezer" enctype="multipart/form-data" method="post">
									<div class="form-group" style="text-align:left;">
										<h6>Nombre Mapeo:&nbsp;&nbsp;<label id="nombre_mapeo_freezer_dc"></label></h6>
									</div>
									<input type="hidden" id="id_mapeo_freezer" name="id_mapeo_freezer">
									<input type="hidden" id="id_asignado_freezer" name="id_asignado_freezer">

									<div class="form-row">
										<div class="col-sm-12">
											<table class="table">
												<thead>
													<th>Columna</th>
													<th>Sensor</th>
												</thead>
												<tbody id="dc_freezer_seleccionador">

												</tbody>
											</table>
										</div>
									</div>
									<button class="btn btn-success">Cargar mapeos</button>

								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		<!--	<div class="col-sm-6">
				<div class="card">
					<div class="card-header"> Resultados Datos Crudos</div>
					<div class="card-body">
						<div class="form-row">
							<div class="col-sm-12" style="text-align:center;">
								<div id="fechas_freezer">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>-->
		</div>
	</div>
</div><!--Cierre del tab asignacion-->

<div class="tab-pane tabs-animation fade show" id="participantes_freezer" role="tabpanel">
	<div class="row">
		<div class="col-sm-6">
			<div class="card"> 
				<div class="card-header">
					Participantes del informe

					<div class="btn-actions-pane-right">
						<div role="group" class="btn-group-sm nav btn-group">
							<button class="btn btn-danger" id="cerrar_crear_personal_freezer">X</button>
						</div>
					</div>
				</div>
				<div class="card-body">

					<!--REGISTRO DEL PERSONAL -->
					<div id="personal_1_freezer">

						<div class="row">
							<input type="hidden" id="id_oculto_personal_freezer">
							<div class="col-sm-4">
								<label>Nombres:</label>
								<input type="text" id="nombres_personal_freezer" class="form-control" placeholder="Escribe los nombres"> 
							</div> 

							<div class="col-sm-4">
								<label>Apellidos:</label>
								<input type="text" id="apellidos_personal_freezer" class="form-control" placeholder="Escribe los apellidos"> 
							</div>

							<div class="col-sm-4">
								<label>Cargo:</label>
								<input type="text" id="cargo_personal_freezer" class="form-control" placeholder="Escribe el cargo"> 
							</div>
						</div>

						<br>

						<div class="row">
							<div class="col-sm-12" style="text-align:center;">
								<button class="btn btn-success" id="guardar_personal_freezer">
									Guardar 
								</button>
								<button class="btn btn-success" id="editar_personal_freezer">
									Editar 
								</button>
							</div>
						</div>

					</div>   




					<div class="row" id="personal_2_freezer">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									Personal
									<div class="btn-actions-pane-right">
										<div role="group" class="btn-group-sm nav btn-group">
											<button class="btn btn-success" id="crear_personal_empresa_freezer">+</button>
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
										<tbody id="resultados_personal_freezer">

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
</div>  <!--Cierre del tab Participantes-->

<div class="tab-pane tabs-animation fade show" 	 id="informes_1_freezer" role="tabpanel">
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
							<select class="form-control" id="quien_firma_freezer">

							</select>
							<br>
						</div>
					</div>

					<div class="btn-actions-pane-right">
						<div role="group" class="btn-group-sm nav btn-group">
							Persona firma : <span class="text-danger" id="persona_firma_freezer"></span>
						</div>
					</div>

				</div>
				<br>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12">

							<div class="card" id="informe_base_mostrar_freezer">
								<div class="card-header"> 
									<h2 id="informe_base_no_freezer"  class="text-danger">No has generado un informe base</h2>
									<h5><strong>Nombre Informe:&nbsp;&nbsp;</strong></h5><h5 id="nombre_infome_freezer"></h5>
								</div>
								<div class="card-body" >
									<div class="row" id="solicitar_aprobacion_freezer">
									</div>
									<br>


									<div class="row">
										<div class="col-sm-4">
											<label>Conclusion:</label>
											<textarea id="conclusion_informe_base_freezer" class="form-control" placeholder="Conclusion informe base"></textarea>
										</div>
										<div class="col-sm-4">
											<label>Metodologia</label>
											<textarea id="metodologia_informe_base_freezer" class="form-control" placeholder="Metodologia informe base"></textarea>
										</div>
										<div class="col-sm-4">
											<label>Conclusion final</label>
											<textarea id="conclusion_final_informe_base_freezer" class="form-control" placeholder="Conclusión final informe base"></textarea>
										</div>
									</div>
									<br>
									<div class="row" id="traer_imagenes_base_freezer">

									</div>
									<br>
									<div class="row" id="traer_otras_imagenes_base_freezer">

									</div>
									<br>
									<div class="row" id="traer_otras_imagenes_base_2_freezer">

									</div>
									<br>
									<div class="row" id="traer_mapeos_base_freezer" >

									</div>

									<br>

									<div id="final_inf_base_freezer" style="text-align:center;">

									</div>
								</div>
							</div> 

							<br>

							<div id="sin_correlativo_freezer" style="text-align:center;">
								<span class="badge badge-warning">
									Para acceder a los informes recuerda asignar el correlativo
								</span>
								<button class="btn btn-primary" id="solicitar_correlativo_freezer">
									Solicitar
								</button>
							</div>

							<div class="row" id="mostrar_grafica_freezer">
								<div class="col-sm-12">
									<div class="card">
										<div class="card-header" style="text-align:center">
											Graficos
											<div class="btn-actions-pane-right">
												<div role="group" class="btn-group-sm nav btn-group">
													<a data-toggle="tab" class="btn-shadow active btn btn-primary" id="minimizar_graficos_freezer">-</a>
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
															<canvas id="myChart_freezer" width="100px" height="100px"></canvas>
															<a id="download_freezer"
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
														<canvas id="myChart_2_freezer" width="100px" height="100px"></canvas>
														<a id="download_2_freezer"
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


					<div id="traer_informes_freezer">
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
</div><!--Cierre del tab informes_1-->
</div>

</div><!--Cierre del content-->
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/control_mapeo_freezer.js"><?php echo '</script'; ?>
>


<?php }
}
