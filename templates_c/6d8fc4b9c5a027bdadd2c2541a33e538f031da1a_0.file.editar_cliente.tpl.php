<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-14 18:23:40
  from '/var/www/html/Pruebas_Desarrollo/templates/cliente/editar_cliente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f0e225c7cc407_17209365',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d8fc4b9c5a027bdadd2c2541a33e538f031da1a' => 
    array (
      0 => '/var/www/html/Pruebas_Desarrollo/templates/cliente/editar_cliente.tpl',
      1 => 1594761809,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0e225c7cc407_17209365 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="app-main__inner">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['empresa_array']->value, 'empresa');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['empresa']->value) {
?>
<form method="post">
	<div class="card">
			<div class="card-header">
				<h5>
				 		Editar cliente : <strong><?php echo $_smarty_tpl->tpl_vars['empresa']->value['nombre'];?>
</strong> 
				</h5>
			</div>
	</div>
	<br>
	<div class="card">	
		<div class="card-body">
		<?php echo $_smarty_tpl->tpl_vars['alerta']->value;?>

		<div class="row">
			<div class="col-sm-3">
				<label>Registro en VTIGER</label>
				<input type="text" name="registro_vtiger" class="form-control" placeholder="# Registro VTIGER" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['id_vtiger'];?>
">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6">
				<label># Tributario:</label>
				<input type="text" name="n_tributario" class="form-control" placeholder="Numero Tributario" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['numero_tributario'];?>
">
			</div>
			<div class="col-sm-6">
				<label>Razon social:</label>
				<input type="text" name="razon_social" class="form-control" placeholder="Razón Social" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['nombre'];?>
">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6">
				<label>Dirección</label>
				<input type="text" name="direccion_empresa" class="form-control" placeholder="Dirección" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['direccion'];?>
">
			</div>
			<div class="col-sm-3">
				<label>País</label>
				<select name="pais_empresa" class="form-control">
					<option value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['pais'];?>
"><?php echo $_smarty_tpl->tpl_vars['empresa']->value['pais'];?>
</option>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['paises']->value, 'pais');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pais']->value) {
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['pais']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['pais']->value;?>
</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</select>
			</div>
			<div class="col-sm-3">
				<label>Ciudad:</label>
				<input type="text" name="ciudad_empresa" class="form-control" placeholder="Ciudad" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['ciudad'];?>
">	
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-3">
				<label>Sigla pais</label>
				<input type="text" name="sigla_pais" placeholder="Sigla país" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['sigla_pais'];?>
">
			</div>
			<div class="col-sm-3">
				<label>Sigla Empresa</label>
				<input type="text" name="sigla_empresa" class="form-control" placeholder="Sigla Empresa" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['sigla_empresa'];?>
">
			</div>
			<div class="col-sm-3">
				<label>Tipo de sede:</label>
				<input type="text" name="tipo_sede" class="form-control" placeholder="Tipo de sede" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['tipo_sede'];?>
">
			</div>
			<div class="col-sm-3">
				<label>Giro empresa:</label>
				<input type="text" name="giro_empresa" class="form-control" placeholder="Giro" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['giro'];?>
">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-5"></div>
			<div class="col-sm-4"><button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" name="update">Actualizar</button></div>
		</div>
	</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</form>	
</div>
<?php }
}
