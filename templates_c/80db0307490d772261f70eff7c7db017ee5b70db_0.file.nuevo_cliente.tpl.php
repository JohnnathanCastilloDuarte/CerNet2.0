<?php
/* Smarty version 3.1.34-dev-7, created on 2021-10-14 20:27:47
  from 'C:\xampp\htdocs\CerNet2.0\templates\cliente\nuevo_cliente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_616876a3cd4bd0_97480198',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80db0307490d772261f70eff7c7db017ee5b70db' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\cliente\\nuevo_cliente.tpl',
      1 => 1622317727,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616876a3cd4bd0_97480198 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="post" id="form_creacion_cliente">
<div class="app-main__inner">
	<div class="card">
			<div class="card-header">
				<h5>
				 		Creación empresas
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
					<input type="text" name="registro_vtiger"  id = "registro_vtiger" class="form-control" placeholder="# Registro VTIGER" value="<?php echo $_smarty_tpl->tpl_vars['registro_vtiger']->value;?>
">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-6">
					<label># Tributario:</label>
					<input type="text" name="n_tributario"  id="n_tributario" class="form-control" placeholder="Numero Tributario" value="<?php echo $_smarty_tpl->tpl_vars['n_tributario']->value;?>
">
				</div>
				<div class="col-sm-6">
					<label>Razon social:</label>
					<input type="text" name="razon_social"  id="razon_social" class="form-control" placeholder="Razón Social" value="<?php echo $_smarty_tpl->tpl_vars['razon_social']->value;?>
">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-6">
					<label>Dirección</label>
					<input type="text" name="direccion_empresa" id="direccion_empresa" class="form-control" placeholder="Dirección" value="<?php echo $_smarty_tpl->tpl_vars['direccion_empresa']->value;?>
">
				</div>
				<div class="col-sm-3">
					<label>País</label>
					<select name="pais_empresa"  id="pais_empresa" class="form-control">
						<option value="">Seleccione...</option>
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
					<input type="text" name="ciudad_empresa" id="ciudad_empresa"  class="form-control" placeholder="Ciudad" value="<?php echo $_smarty_tpl->tpl_vars['ciudad_empresa']->value;?>
">	
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-3">
					<label>Sigla pais</label>
					<input type="text" name="sigla_pais"  id="sigla_pais" placeholder="Sigla país" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['sigla_pais']->value;?>
">
				</div>
				<div class="col-sm-3">
					<label>Sigla Empresa</label>
					<input type="text" name="sigla_empresa"  id="sigla_empresa" class="form-control" placeholder="Sigla Empresa" value="<?php echo $_smarty_tpl->tpl_vars['sigla_empresa']->value;?>
">
				</div>
				<div class="col-sm-3">
					<label>Tipo de sede:</label>
					<input type="text" name="tipo_sede"  id="tipo_sede" class="form-control" placeholder="Tipo de sede" value="<?php echo $_smarty_tpl->tpl_vars['tipo_sede']->value;?>
">
				</div>
				<div class="col-sm-3">
					<label>Giro empresa:</label>
					<input type="text" name="giro_empresa" id="giro_empresa" class="form-control" placeholder="Giro" value="<?php echo $_smarty_tpl->tpl_vars['giro_empresa']->value;?>
">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-5"></div>
				<div class="col-sm-4"><button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nuevo_cliente">Aceptar</button></div>
			</div>
		</div>	
	</div>
</div>
</form>
<!--CARGA DE SCRIPT PARA CLIENTE--->
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/empresa_cliente.js"><?php echo '</script'; ?>
><?php }
}
