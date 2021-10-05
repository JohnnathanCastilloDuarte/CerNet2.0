<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-10 21:06:54
  from '/var/www/html/Pruebas_Desarrollo/templates/servicio/nuevo_servicio.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f31e11ed1f914_60140889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a65594441972680e2316b008bc470c758e53aae' => 
    array (
      0 => '/var/www/html/Pruebas_Desarrollo/templates/servicio/nuevo_servicio.tpl',
      1 => 1597104412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f31e11ed1f914_60140889 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#crear_servicio_tipo">
		<span>Nuevo servicio</span>
		</a>
	</li>
	<li class="nav-item">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#historial_servicio_tipo">
		<span>Historial de servicios</span>
		</a>
	</li>
</ul>

<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="crear_servicio_tipo" role="tabpanel">
		<div class="row">
			<div class="col-sm-4">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12" style="text-align:center;">
								<input type="hidden"  id="id_tipo_servicio">
								<label>Nombre del servicio:</label>
								<input type="text" id="servicio_nuevo" class="form-control" placeholder="Ingrese el nombre del servicio">
								<br>
								<label>Modulo</label>
								<select class="form-control" id="modulo_tipo_servicio">
									<option value="" id="ultimo_modulo">Seleccione...</option>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_modulo']->value, 'modulo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['modulo']->value) {
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['modulo']->value['id_modulo'];?>
"><?php echo $_smarty_tpl->tpl_vars['modulo']->value['nombre_modulo'];?>
 - <?php echo $_smarty_tpl->tpl_vars['modulo']->value['area'];?>
</option>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</select>
								<br>
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nuevo_tipo_servicio">Aceptar</button>
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_servicio_tipo">Actualizar</button>
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="reload"><i class="pe-7s-repeat"></i></button>
								
							</div>
						</div>
					</div>
				</div>	
			</div>
			
			<div class="col-sm-8">
				<div class="card">
					<div class="card-header"><h6>Ultimos servicios creados</h6></div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<table class="table">
									<thead style="text-align:center;">
										<th>Servicio</th>
										<th>Modulo</th>
										<th>Usuario</th>
										<th>Fecha creación</th>
										<th>Acciones</th>
									</thead>
									<tbody id="resultados_servicios">
									
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
		
	</div>
	
	<div class="tab-pane tabs-animation fade show" id="historial_servicio_tipo" role="tabpanel">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<i class="badge badge-dot badge-dot-xl badge-success">.</i>Crear
						<i class="badge badge-dot badge-dot-xl badge-warning">.</i>Editar
						<i class="badge badge-dot badge-dot-xl badge-danger">.</i>Eliminar
						 <div class="scroll-area-lg">
								<div class="scrollbar-container">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_historial']->value, 'historial');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['historial']->value) {
?>
									<?php if ($_smarty_tpl->tpl_vars['historial']->value['tipo_historial'] == 1) {?>
									<?php $_smarty_tpl->_assignInScope('color', "success");?>
									<?php } elseif ($_smarty_tpl->tpl_vars['historial']->value['tipo_historial'] == 2) {?>
									<?php $_smarty_tpl->_assignInScope('color', "warning");?>
									<?php } elseif ($_smarty_tpl->tpl_vars['historial']->value['tipo_historial'] == 3) {?>
									<?php $_smarty_tpl->_assignInScope('color', "danger");?>
									<?php }?>
			
									<div class="vertical-time-icons vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
										<div class="vertical-timeline-item vertical-timeline-element">
											<div>
												<span class="vertical-timeline-element-icon bounce-in">
													<div class="timeline-icon border-<?php echo $_smarty_tpl->tpl_vars['color']->value;?>
">
														<i class="badge badge-dot badge-dot-xl badge-<?php echo $_smarty_tpl->tpl_vars['color']->value;?>
"></i>
													</div>
												</span>
												<div class="vertical-timeline-element-content bounce-in">
													<h4 class="timeline-title"><?php echo $_smarty_tpl->tpl_vars['historial']->value['nombre'];?>
 <?php echo $_smarty_tpl->tpl_vars['historial']->value['apellido'];?>
<br><span class="badge badge-dark">Hora movimiento: <?php echo $_smarty_tpl->tpl_vars['historial']->value['fecha_registro'];?>
</span></h4>
														<p><h6><?php echo $_smarty_tpl->tpl_vars['historial']->value['mensaje'];?>
</h6></p>
												</div>
											</div>
										</div>	
									</div>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
</div><?php }
}
