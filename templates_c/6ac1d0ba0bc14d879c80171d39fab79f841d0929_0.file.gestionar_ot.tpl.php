<?php
/* Smarty version 3.1.34-dev-7, created on 2021-11-24 11:29:02
  from '/home/god/public_html/CerNet2.0/templates/OT/gestionar_ot.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_619e21fe024445_10241199',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ac1d0ba0bc14d879c80171d39fab79f841d0929' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/OT/gestionar_ot.tpl',
      1 => 1634879378,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619e21fe024445_10241199 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
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
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_numot']->value, 'numot');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['numot']->value) {
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['numot']->value['ot'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['numot']->value['empresa'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['numot']->value['nombre_usuario'];?>
 <?php echo $_smarty_tpl->tpl_vars['numot']->value['apellido_usuario'];?>
</td>
								<td><input type="checkbox" class="form_control" id="select_ot" value="<?php echo $_smarty_tpl->tpl_vars['numot']->value['id_numot'];?>
" data-nombre="<?php echo $_smarty_tpl->tpl_vars['numot']->value['ot'];?>
"></td>
							</tr>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
</div><?php }
}
