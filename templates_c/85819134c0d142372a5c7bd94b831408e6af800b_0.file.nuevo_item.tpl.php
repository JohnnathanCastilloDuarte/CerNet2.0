<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-30 15:49:34
  from '/home/god/public_html/Pruebas_Desarrollo/templates/item/nuevo_item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc5148ed2fc10_50419289',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85819134c0d142372a5c7bd94b831408e6af800b' => 
    array (
      0 => '/home/god/public_html/Pruebas_Desarrollo/templates/item/nuevo_item.tpl',
      1 => 1606264370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc5148ed2fc10_50419289 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="app-main__inner">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<h5>
					Creación de Item
				</h5>	
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
						<label>Empresa:</label>
						<select id="empresa_item" class="form-control">
							<option value="null">Seleccione...</option>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_empresa']->value, 'empresa');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['empresa']->value) {
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['id_empresa'];?>
"><?php echo $_smarty_tpl->tpl_vars['empresa']->value['nombre'];?>
</option>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</select> 
					</div>
					<div class="col-sm-6">
						<label>Tipo Item:</label>
						<select id="tipo_item" class="form-control">
							<option value="null">Seleccione...</option>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_tipo']->value, 'tipo_item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tipo_item']->value) {
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['tipo_item']->value['id_tipo'];?>
"><?php echo $_smarty_tpl->tpl_vars['tipo_item']->value['nombre'];?>
</option>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</select>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6">
						<lable>Nombre Item:</lable>
						<input type="text" id="nombre_item" class="form-control" placeholder="Ingrese el nombre del Item">
					</div>
					<div class="col-sm-6">
						<lable>Descripción Item:</lable>
						<textarea class="form-control" id="desc_item" placeholder="Describe el Item"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label>Estado:</label>
						<div class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" id="defaultUnchecked"  name="estado" value="1">
								<label class="custom-control-label" for="defaultUnchecked">Activo</label>
						</div>
						<div class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" id="defaultUnchecked_1"  name="estado" value="0">
								<label class="custom-control-label" for="defaultUnchecked_1">Inactivo</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-5">
					</div>
					<div class="col-sm-5">
						<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nuevo_item">Aceptar</button>
					</div>
				</div>
				
			</div>
		</div>
	</div>	
</div>				<?php }
}
