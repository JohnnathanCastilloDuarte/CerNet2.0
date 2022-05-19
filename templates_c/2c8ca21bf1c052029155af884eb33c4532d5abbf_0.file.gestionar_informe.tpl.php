<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-13 00:03:56
  from 'C:\xampp\htdocs\CerNet2.0\templates\flujo_laminar\gestionar_informe.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_627d844c8f3ec3_56525343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c8ca21bf1c052029155af884eb33c4532d5abbf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\flujo_laminar\\gestionar_informe.tpl',
      1 => 1652393035,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_627d844c8f3ec3_56525343 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h6>
					Lista informes para flujo laminar
				</h6>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-header">
								<div class="form-row">
									<div class="col-sm-9">
										Informes Mapeo
									</div>
									<div class="col-sm-9">
										Generados: <span class="badge badge-pill badge-primary" id="mapeo_flujo_laminars_generados">-</span>
										En proceso: <span class="badge badge-pill badge-warning" id="mapeo_flujo_laminars_proceso">-</span>
										Terminados: <span class="badge badge-pill badge-danger" id="mapeo_flujo_laminars_terminados">-</span>
									</div>
								</div>
							</div>
							<div class="card-body">
								<table class="table">
									<thead>
										<th>OT</th>
										<th>Item</th>
										<th>Empresa</th>
										<th>Usuario asignado</th>
										<th>Acciones</th>
									</thead>
									<tbody>
										<?php if ($_smarty_tpl->tpl_vars['conteo_mapeo_flujo_laminar']->value == 0) {?>
										<tr>
											<td colspan="4">
												<h6>
													Sin resultados
												</h6>
											</td>	
										</tr>	
										<?php } else { ?>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_mapeo_flujo_laminar']->value, 'mapeo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mapeo']->value) {
?>
										<tr>
											<td><?php echo $_smarty_tpl->tpl_vars['mapeo']->value['numot'];?>
</td>
											<td><?php echo $_smarty_tpl->tpl_vars['mapeo']->value['item'];?>
</td>
											<td><?php echo $_smarty_tpl->tpl_vars['mapeo']->value['empresa'];?>
</td>
											<td><?php echo $_smarty_tpl->tpl_vars['mapeo']->value['nombre_usuario'];?>
 <?php echo $_smarty_tpl->tpl_vars['mapeo']->value['apellido_usuario'];?>
</td>
											<td>
												<a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[6];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[9];?>
&asignado=<?php echo $_smarty_tpl->tpl_vars['mapeo']->value['id_asignado'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['id_servicio_mapeo']->value;?>
" class="btn btn-outline-success">Informe</a>
											</td>
										</tr>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										<?php }?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
		
				</div>
			
			</div>
		</div>
	</div>
</div><?php }
}
