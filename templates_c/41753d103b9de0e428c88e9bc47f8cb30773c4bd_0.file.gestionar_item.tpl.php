<?php
/* Smarty version 3.1.34-dev-7, created on 2021-12-09 14:20:54
  from '/home/god/public_html/CerNet2.0/templates/item/gestionar_item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61b210c6d4b916_38315343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41753d103b9de0e428c88e9bc47f8cb30773c4bd' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/item/gestionar_item.tpl',
      1 => 1639059650,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b210c6d4b916_38315343 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="app-main__inner">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<h5>
					Gestionar Items
				</h5>
			</div>
			<div class="card-body">
				<table class="table table-striped table-bordered" id="example" style="width: 100%;">
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
&pdf=0" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info btn-sm"><i class="lnr-pencil btn-icon-wrapper"></i></a>
									<a data-id="<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_item'];?>
" data-tipoitem="<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_tipo'];?>
" id="btn_eliminar_item" data-nombre="<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['nombre_item'];?>
"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger btn-sm" ><i class="lnr-cross btn-icon-wrapper"></i></a>
									<br> 
									<a target="_blank" id="btn_genear_pdf_item" href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[7];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[2];?>
&item=<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_item'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_tipo'];?>
&pdf=1" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-warning btn-sm"><i class="fa fa-file-pdf-o" style="font-size:20.5px; color:red;"></i></a>

									<!--<button id="enviar_correo_pdf" data-id="<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_item'];?>
" data-tipo="<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_tipo'];?>
" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-success btn-sm"><i class="fa fa-envelope-o" style="font-size:20.5px; color:green;"></i></button>-->

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
