<?php
/* Smarty version 3.1.34-dev-7, created on 2022-02-08 20:36:32
  from '/home/god/public_html/CerNet2.0/templates/cliente/editar_cliente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6202d450317da8_32330529',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1bf13aea1fa87779adc68b228cd39e2f36ef51d' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/cliente/editar_cliente.tpl',
      1 => 1644352317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6202d450317da8_32330529 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="app-main__inner">
<form method="post" id="formulario_para_editar" enctype="multipart/form-data">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['empresa_array']->value, 'empresa');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['empresa']->value) {
?>

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
" id="n_tributario">
			</div>
			<div class="col-sm-6">
				<label>Razon social:</label>
				<input type="text" name="razon_social" class="form-control" placeholder="Razón Social" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['nombre'];?>
" id="razon_social">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6">
				<label>Dirección</label>
				<input type="text" name="direccion_empresa" class="form-control" placeholder="Dirección" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['direccion'];?>
" id="direccion_empresa">
			</div>
			<div class="col-sm-3">
				<label>País</label>
				<select name="pais_empresa" class="form-control" id="pais_empresa">
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
" id="ciudad_empresa">	
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-3">
				<label>Sigla pais</label>
				<input type="text" name="sigla_pais" placeholder="Sigla país" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['sigla_pais'];?>
" id="sigla_pais">
			</div>
			<div class="col-sm-3">
				<label>Sigla Empresa</label>
				<input type="text" name="sigla_empresa" class="form-control" placeholder="Sigla Empresa" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['sigla_empresa'];?>
" id="sigla_empresa">
			</div>
			<div class="col-sm-3">
				<label>Tipo de sede:</label>
				<input type="text" name="tipo_sede" class="form-control" placeholder="Tipo de sede" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['tipo_sede'];?>
" id="tipo_sede">
			</div>
			<div class="col-sm-3">
				<label>Giro empresa:</label>
				<input type="text" name="giro_empresa" class="form-control" placeholder="Giro" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['giro'];?>
" id="giro_empresa">
			</div>
		</div>
    <hr>
    <div class="row">
      <div class="col-sm-6">
        <label>Logo:</label>
        <input type="file" class="form-control" name="logo_empresa">
      </div>
      <div class="col-sm-6">
        <?php if ($_smarty_tpl->tpl_vars['empresa']->value['logo'] == 'No' || $_smarty_tpl->tpl_vars['empresa']->value['logo'] == 'design/images/no_imagen.png') {?>
        <img src="design/images/no_imagen.png" style="width: 70%;height: 85%;">
        
        <?php } else { ?>
        <label>Logo actual:</label>
        <img src="templates/cliente/<?php echo $_smarty_tpl->tpl_vars['empresa']->value['logo'];?>
" style="width: 70%;height: 85%;">
        <?php }?>
      </div>
    </div>  
		<br>
		<div class="row">
			<div class="col-sm-5"></div>
			<div class="col-sm-4"><button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" name="update" id="btn_editar_cliente_empresa">Actualizar</button></div>
		</div>
      
<input name='id_empresa'  type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id_empresa']->value;?>
" >
    
	</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </form>
</div>

<?php echo '<script'; ?>
 type="text/javascript" src="design/js/empresa_cliente.js"><?php echo '</script'; ?>
>
<?php }
}
