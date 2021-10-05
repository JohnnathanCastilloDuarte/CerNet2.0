<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-27 22:30:26
  from '/var/www/html/Pruebas_Desarrollo/templates/refrigeradores/informes/datos_informe_mapeo_1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f485e32b41567_48658535',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2518dd0c11df26a9fe620da316da8cc9dedc170d' => 
    array (
      0 => '/var/www/html/Pruebas_Desarrollo/templates/refrigeradores/informes/datos_informe_mapeo_1.tpl',
      1 => 1598573577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f485e32b41567_48658535 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
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
" id="id_asignado">
						<input type="hidden"  id="cuantas_bandeja">
						<div class="form-row">
							<div class="col-sm-10">
							<label>Agregue la cantidad de bandejas para el refrigerador</label>	
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

			<div class="col-sm-6">
				<div class="card">
					<div class="card-header">
						<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
							<li class="nav-item">
								<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#crear_mapeo">
									<span>Mapeo</span>
								</a>
							</li>
							<li class="nav-item">
								<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#ver_mapeo">
									<span>Ver mapeo</span>
								</a>
							</li>
						</ul>				
					</div>

					<div class="tab-content">
						<div class="tab-pane tabs-animation fade show active" id="crear_mapeo" role="tabpanel">
							<div class="card-body">
								<h6 class="text-warning" style="text-align:center;" id="anuncio_mapeo_1">Debes completar la información de bandejas</h6>
									<div id="cuerpo_mapeo">
										<form id="formulario">
											<div class="form-row">
												<div class="col-sm-5">
													<input type="hidden" id="id_mapeo_creado">
													<label>Nombre mapeo:</label>
													<input type="text" id="nombre_mapeo" class="form-control" placeholder="Ingresa el nombre del mapeo" required>
												</div>
												<div class="col-sm-4"></div>
												<div class="col-sm-3" style="text-align:center;">
													<br>
													<button class="btn-shadow btn-outline-2x btn btn-outline-info"  id="btn_nuevo_mapeo">Aceptar</button>
													<button class="btn-shadow btn-outline-2x btn btn-outline-info"  id="btn_actualizar_mapeo">Actualizar</button>
													<button class="btn btn-danger" id="change_mapeo"><span class="text-white">X</span></button>
												</div>
											</div>
											<br>
											<div class="form-row">
												<div class="col-sm-12" style="text-align:center;">
													<h6>Fecha inicio mapeo:</h6>
														<div class="form-row">
															<div class="col-sm-3">
																<label>Fecha:</label>
																<input type="date" class="form-control" id="fecha_inicio_mapeo" >
															</div>
															<div class="col-sm-3">
																<label>H:</label>
																<select  class="form-control" id="hora_inicio_mapeo" >
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
																<select  class="form-control" id="minuto_inicio_mapeo" >
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
																<select  class="form-control" id="segundo_inicio_mapeo" >
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
															<input type="date" class="form-control" id="fecha_fin_mapeo" >
															</div>
															<div class="col-sm-3">
															<label>H:</label>
															<select  class="form-control" id="hora_fin_mapeo" >
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
																<select  class="form-control" id="minuto_fin_mapeo" >
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
																<select  class="form-control" id="segundo_fin_mapeo" >
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
														<input type="text" id="intervalo" class="form-control" placeholder="En segundos" required>
													</div>
												</div>

												<br>

												<div class="form-row">
													<div class="col-sm-4">
														<br>
														<h6>Humedad:</h6>
													</div>
													<div class="col-sm-4">
														<label>Minima:</label>
														<input type="text" id="humendad_minima" class="form-control" placeholder="Humedad minima" required>
													</div>
													<div class="col-sm-4">
														<label>Maxima:</label>
														<input type="text" id="humendad_maxima" class="form-control" placeholder="Humedad maxima" required>
													</div>
												</div>

												<br>

												<div class="form-row">
													<div class="col-sm-4">
														<br>
														<h6>Temperatura:</h6>
													</div>
													<div class="col-sm-4">
														<label>Minima:</label>
														<input type="text" id="temperatura_minima" class="form-control" placeholder="Temperatura minima" required>
													</div>

													<div class="col-sm-4">
														<label>Maxima:</label>
														<input type="text" id="temperatura_maxima" class="form-control" placeholder="Temperatura maxima" required>
													</div>
												</div>

												<br>

												<div class="form-row">
													<div class="col-sm-4">
														<label>	Valor seteado:</label>
														<input type="text" id="valor_seteado" class="form-control" placeholder="Valor seteado" required>
													</div>
												</div>
									</form>
						</div>
						</div>
						</div>

		<div class="tab-pane tabs-animation fade show" id="ver_mapeo" role="tabpanel">
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
		<th>Valor seteado</th>
		<th>Acciones</th>
		</thead>
		<tbody id="listando_mapeos">

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
						Bandejas disponibles  para 
						<span id="mapeo_actual">
						</span>
					</div>
					<div class="card-body">
						<table class="table" style="text-align:center;">
							<thead>
							<th>Nombre</th>
							<th>Asociar</th>
							</thead>
							<tbody id="listar_bandejas_creadas">

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
						<div class="scroll-area-sm">
							<div class="scrollbar-container">
								<table class="table" id="example" width="100%">
									<thead>
										<th >Nombre</th>
										<th >Tipo</th>
										<th >Asociar</th>
									</thead>
									<tbody id="sensores_resultado">

									</tbody>	
								</table>
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
												<th>Fecha registro</th>
												<th >Datos crudos</th>
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
										<h6>Nombre sensor: <label id="nombre_sensor"></label></h6>
									</div>
										<input type="hidden" id="id_refrigerador_sensor" name="id_refrigerador_sensor">
										<input type="hidden" id="id_mapeo" name="id_mapeo">
										<input type="hidden" id="id_asignado_form" name="id_asignado_form">

									<div class="form-group">
									<label for="file">File</label>
									<input type="file" class="form-control" id="file" name="file"  required />
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
			<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
						<div id="fechas">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<?php }
}
