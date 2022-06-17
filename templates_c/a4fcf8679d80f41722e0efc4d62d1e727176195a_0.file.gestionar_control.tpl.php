<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-04 16:24:13
  from '/var/www/html/Pruebas_Desarrollo/templates/control_cambio/gestionar_control.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f29b5ddae5645_96307734',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4fcf8679d80f41722e0efc4d62d1e727176195a' => 
    array (
      0 => '/var/www/html/Pruebas_Desarrollo/templates/control_cambio/gestionar_control.tpl',
      1 => 1596569048,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f29b5ddae5645_96307734 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#cambio">
		<span>Lista cambios</span>
		</a>
	</li>
	<li class="nav-item">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#error">
		<span>Lista de errores</span>
		</a>
	</li>
</ul>

<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="cambio" role="tabpanel">
		<div class="card">
			<div class="card-header">
				Cambios
			</div>
			<div class="card-body">
				<div class="table-responsive">
        	<table class="mb-0 table" id="example">
						<thead>
							<th>Fecha registro</th>
							<th>Fecha fin</th>
							<th>Fecha modificación</th>
							<th>Modulo</th>
							<th>Archivo</th>
							<th>Descripción</th>
							<th>Tipo cambio</th>
							<th>Tiempo</th>
							<th>Usuario</th>
							<th>Acciones</th>
						</thead>
						<tbody id="gestionar_control">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_control']->value, 'control');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['control']->value) {
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['control']->value['fecha_registro'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['control']->value['fecha_cambio'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['control']->value['fecha_modificacion'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['control']->value['modulo'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['control']->value['archivo'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['control']->value['descripcion'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['control']->value['tipo_cambio'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['control']->value['tiempo'];?>
(Minutos)</td>
								<td><?php echo $_smarty_tpl->tpl_vars['control']->value['usuario'];?>
</td>
								<td>
									<div class="col-sm-12" style="text-align: center;">
										<a id="btn_editar_item" href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[2]['ControldeCambios'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[2];?>
&control=<?php echo $_smarty_tpl->tpl_vars['control']->value['id_controlcambio'];?>
" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info">
										<i class="lnr-pencil btn-icon-wrapper"></i></a>
									</div>	
								</td>
							</tr>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</tbody>
					</table>
				</div>
			</div>	
		</div>
	</div>	

	<div class="tab-pane tabs-animation fade show" id="error" role="tabpanel">
		<div class="card">
			<div class="card-header">
				Listado de errores
			</div>
			<div class="card-body">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<th>#Codigo</th>
						<th>Concepto</th>
						<th>Modulo</th>
						<th>Solución</th>
						<th>Acciones</th>
					</thead>
					<tbody>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_errores']->value, 'error');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['error']->value['id_error'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['error']->value['concepto'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['error']->value['modulo'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['error']->value['solucion'];?>
</td>
								<td>
									<div class="col-sm-12" style="text-align: center;">
										<a id="btn_editar_item" href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value['control'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[2];?>
&error=<?php echo $_smarty_tpl->tpl_vars['error']->value['id_error'];?>
" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info">
										<i class="lnr-pencil btn-icon-wrapper"></i></a>
									</div>	
								</td>
							</tr>	
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div><?php }
}
