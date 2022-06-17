<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-29 15:33:39
  from '/var/www/html/Pruebas_Desarrollo/templates/error/editar_error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f21c103635047_29355329',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd1e9716e1cab9a062fb4664282f9edee1ee029a' => 
    array (
      0 => '/var/www/html/Pruebas_Desarrollo/templates/error/editar_error.tpl',
      1 => 1596046971,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f21c103635047_29355329 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container-fluid">
	<div class="row mb-2">
	 <div class="col-sm-6">
	 </div>
	 <div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
				<li class="breadcrumb-item"><a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value['control'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[1];?>
">Gestionar errores</a></li>
				<li class="breadcrumb-item active">Editar error</li>			  
			</ol>
		</div>
	</div>
</div><!-- /.container-fluid -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h5>
					Editar Error
				</h5>
			</div>
			<div class="card-body">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_error']->value, 'error');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
?>
				<div class="row">
					<div class="col-sm-6">
						<label>Concepto:</label>
						<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['error']->value['id_error'];?>
" id="id_error_editar">
						<input type="text" id="concepto_editar" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['error']->value['concepto'];?>
">
					</div>
					<div class="col-sm-6">
						<label>Modulo:</label>
						<select id="modulo_editar" class="form-control">
							<option value="<?php echo $_smarty_tpl->tpl_vars['error']->value['id_modulo'];?>
"><?php echo $_smarty_tpl->tpl_vars['error']->value['modulo'];?>
</option>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_modulo']->value, 'modulo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['modulo']->value) {
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['modulo']->value['id_item'];?>
"><?php echo $_smarty_tpl->tpl_vars['modulo']->value['nombre'];?>
</option>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label>Solución:</label>
						<textarea class="form-control" id="solucion_editar" value="<?php echo $_smarty_tpl->tpl_vars['error']->value['solucion'];?>
"><?php echo $_smarty_tpl->tpl_vars['error']->value['solucion'];?>
</textarea>
					</div>
				</div>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<br>
				<div class="row">
					<div class="col-sm-5"></div>
					<div class="col-sm-6">
						<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_error">Actualizar</button>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div><?php }
}
