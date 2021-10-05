<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-05 19:42:24
  from '/home/god/public_html/CERNET/templates/usuario/gestionar_usuario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_610c3f20884bd0_25844928',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '334f2a97d69a56a9543d0a88bd8a3e08cfa071c9' => 
    array (
      0 => '/home/god/public_html/CERNET/templates/usuario/gestionar_usuario.tpl',
      1 => 1626721182,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610c3f20884bd0_25844928 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="app-main__inner">
	<div class="card">
			<div class="card-header">
				<h5>
					Gestionar usuarios
				</h5>
			</div>
			<div class="card-body">
			<div class="col-sm-12">
				<table class="table table-striped table-bordered" id="example">
					<thead>
					
							<th data-field="usuario" data-field="stargazers_count" data-sortable="true">
								Usuario
							</th>
							<th data-field="nombres" data-field="stargazers_count" data-sortable="true">
								Nombres
							</th>
							<th data-field="apellidos" data-field="stargazers_count" data-sortable="true">
								Apellidos
							</th>
							<th data-field="cargo" data-field="stargazers_count" data-sortable="true">
								Cargo
							</th>
							<th data-field="estado" data-field="stargazers_count" data-sortable="true">
								Estado
							</th>
							<th data-field="Editar">
								Acción a realizar
							</th>
					
					</thead>
					<tbody>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_buscando']->value, 'table_usuario');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['table_usuario']->value) {
?>
					<?php if (file_exists($_smarty_tpl->tpl_vars['table_usuario']->value['imagen_usuario'])) {?>
						<?php $_smarty_tpl->_assignInScope('imagen_encontrada', $_smarty_tpl->tpl_vars['table_usuario']->value['imagen_usuario']);?>
					<?php } else { ?>
						<?php $_smarty_tpl->_assignInScope('imagen_encontrada', "templates/usuario/images/images_profile/default.png");?>
					<?php }?>
						<tr>
							<td>
								<div class="row">
									<div class="col-sm-3"><img style="width: 40px; height: auto;" src="<?php echo $_smarty_tpl->tpl_vars['imagen_encontrada']->value;?>
" alt="" class="d-block ui-w-30 rounded-circle"></div>
									<div class="col-sm-9"><?php echo $_smarty_tpl->tpl_vars['table_usuario']->value['usuario'];?>
</div>
								</div>
							</td>
							<td id="nombre_usuario" data-nombre="<?php echo $_smarty_tpl->tpl_vars['table_usuario']->value['nombre'];?>
"><?php echo $_smarty_tpl->tpl_vars['table_usuario']->value['nombre'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['table_usuario']->value['apellido'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['table_usuario']->value['cargo'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['table_usuario']->value['estado'];?>
</td>
							<td>
								<div class="col-sm-12" style="text-align: center;">
									<a id="btn_editar_usuario" href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[2]['Usuario'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[2];?>
&user=<?php echo $_smarty_tpl->tpl_vars['table_usuario']->value['id_usuario'];?>
" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info" ><i class="lnr-pencil btn-icon-wrapper"></i></a>
									<a id="btn_restablecer_usuario"  data-id="<?php echo $_smarty_tpl->tpl_vars['table_usuario']->value['id_usuario'];?>
" data-email="<?php echo $_smarty_tpl->tpl_vars['table_usuario']->value['email'];?>
"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-warning"><i class="pe-7s-lock btn-icon-wrapper"></i></a>
									<a data-id="<?php echo $_smarty_tpl->tpl_vars['table_usuario']->value['id_usuario'];?>
" id="btn_eliminar_usuario"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger"><i class="lnr-cross btn-icon-wrapper"></i></a>
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
	</div><!--Cierre del div card-->		
</div><!--Cierre del div principal , contenedor de la sección-->





<?php }
}
