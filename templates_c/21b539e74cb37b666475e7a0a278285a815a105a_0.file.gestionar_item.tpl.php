<?php
/* Smarty version 3.1.34-dev-7, created on 2022-06-13 18:45:50
  from 'C:\xampp\htdocs\CerNet2.0\templates\item\gestionar_item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62a769becbca42_05880286',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21b539e74cb37b666475e7a0a278285a815a105a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\item\\gestionar_item.tpl',
      1 => 1655138740,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a769becbca42_05880286 (Smarty_Internal_Template $_smarty_tpl) {
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
				<table class="table table-striped table-bordered" id="example" style="width: 100%; text-align:center;">
					<thead>
						<th>ID</th>
						<th>Tipo</th>
						<th>Nombre</th>
						<th>Compañia</th>
						<th>Editar</th>
						<th>Eliminar</th>
						<th>PDF</th>
						<th>Aprobación</th>
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
							<a id="btn_editar_item" href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[7];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[2];?>
&item=<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_item'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_tipo'];?>
&pdf=0" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info btn-sm"><i class="lnr-pencil btn-icon-wrapper"></i></a>
						</td>
						<td>
							<a data-id="<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_item'];?>
" data-tipoitem="<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_tipo'];?>
" id="btn_eliminar_item" data-nombre="<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['nombre_item'];?>
"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger btn-sm" ><i class="lnr-cross btn-icon-wrapper"></i></a>
						</td>
						<td>
							<a target="_blank" id="btn_genear_pdf_item" href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[7];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[2];?>
&item=<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_item'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_tipo'];?>
&pdf=1" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-warning btn-sm"><i class="fa fa-file-pdf-o" style="font-size:20.5px; color:red;"></i></a>
						</td>
						<td>
							<?php if ($_smarty_tpl->tpl_vars['gestionar']->value['estado'] == 0) {?>
							<input type="text" class="form-control" name="estado_aprobacion" value="No" readonly style="color: #fff;background: #dd0707;border-radius: 150px;text-align: center;">
							<?php } else { ?>
							<input type="text" class="form-control" name="estado_aprobacion" value="Si" readonly style="color: #fff;background: #06c606;border-radius: 150px;text-align: center;">
							<?php }?>
						</td>	
						<!--
						<div class="col-sm-12" style="text-align: center;">
							<br> 
							<button id="enviar_correo_pdf" data-id="<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_item'];?>
" data-tipo="<?php echo $_smarty_tpl->tpl_vars['gestionar']->value['id_tipo'];?>
" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-success btn-sm"><i class="fa fa-envelope-o" style="font-size:20.5px; color:green;"></i></button>
							</div>
						</td>-->	
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
