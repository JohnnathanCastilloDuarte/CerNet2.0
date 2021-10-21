<?php
/* Smarty version 3.1.34-dev-7, created on 2021-10-21 19:58:01
  from 'C:\xampp\htdocs\CerNet2.0\templates\item\gestionar_item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6171aa2965a6c6_13423849',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21b539e74cb37b666475e7a0a278285a815a105a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\item\\gestionar_item.tpl',
      1 => 1634829710,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6171aa2965a6c6_13423849 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="app-main__inner">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<h5>
					Gestionar Items
				</h5>
			</div>
			<div class="card-body">
				<table class="table table-striped table-bordered" id="example">
					<thead>
						<th>ID</th>
						<th>Tipo</th>
						<th>Nombre</th>
						<th>Compañia</th>
						<th>Acciones</th>
					</thead>
			
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_gestionar']->value, 'gestionar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gestionar']->value) {
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_item'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['gestionar']->value['nombre_tipo'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['gestionar']->value['nombre_item'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['gestionar']->value['nombre_empresa'];?>
</td>
						<td>
								<div class="col-sm-12" style="text-align: center;">
									<a id="btn_editar_item" href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[7];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[2];?>
&item=<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_item'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_tipo'];?>
" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info"><i class="lnr-pencil btn-icon-wrapper"></i></a>
									<a data-id="<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_item'];?>
" id="btn_eliminar_item"  data-nombre="<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['nombre_item'];?>
"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger"><i class="lnr-cross btn-icon-wrapper"></i></a>
								</div>
							</td>
					</tr>	
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</table>
			</div>
		</div>
	</div>
</div>	

<?php echo '<script'; ?>
 type="text/javascript" src="design/js/Item.js"><?php echo '</script'; ?>
><?php }
}
