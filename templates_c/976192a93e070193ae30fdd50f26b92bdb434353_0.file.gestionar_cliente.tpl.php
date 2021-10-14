<?php
/* Smarty version 3.1.34-dev-7, created on 2021-10-14 20:28:35
  from 'C:\xampp\htdocs\CerNet2.0\templates\cliente\gestionar_cliente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_616876d30ad4b6_10663094',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '976192a93e070193ae30fdd50f26b92bdb434353' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\cliente\\gestionar_cliente.tpl',
      1 => 1622318088,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616876d30ad4b6_10663094 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="app-main__inner">
	<div class="card">
			<div class="card-header">
				<h5>
				 		Gestionar Empresas
				</h5>
			</div>
	</div>
	<br>
	<div class="card">
		<div class="card-body">
			<div class="col-sm-12">
				<table class="table table-striped table-bordered" id="example">
					<thead>
						<th>N° Tributario</th>
						<th>Nombre</th>
						<th>Direccion</th>
						<th>Sede</th>
						<th>Accion a realizar</th>
					</thead>
					<tbody>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_empresas']->value, 'empresa');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['empresa']->value) {
?>
							<tr>
								<input type="hidden"  id="nombre" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['nombre'];?>
">
								<td><?php echo $_smarty_tpl->tpl_vars['empresa']->value['numero_tributario'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['empresa']->value['nombre'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['empresa']->value['direccion'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['empresa']->value['tipo_sede'];?>
</td>
								<td>
									<div class="col-sm-12" style="text-align: center;">
									<a id="btn_editar_cliente" href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[3]['Clientes'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[2];?>
&empresa=<?php echo $_smarty_tpl->tpl_vars['empresa']->value['id_empresa'];?>
" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info">
										<i class="lnr-pencil btn-icon-wrapper"></i>
									<a id="btn_eliminar_cliente" data-nombre="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['nombre'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['id_empresa'];?>
" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger">
										<i class="lnr-cross btn-icon-wrapper"></i></a>	
									</a>
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
</div><!--Cierre del app-main__inner-->
<?php }
}
