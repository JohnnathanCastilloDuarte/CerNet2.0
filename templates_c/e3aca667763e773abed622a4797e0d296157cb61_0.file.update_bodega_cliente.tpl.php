<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-30 21:52:42
  from '/var/www/html/Pruebas_Desarrollo/templates/item/update_bodega_cliente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f236b5af3af82_85766531',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3aca667763e773abed622a4797e0d296157cb61' => 
    array (
      0 => '/var/www/html/Pruebas_Desarrollo/templates/item/update_bodega_cliente.tpl',
      1 => 1596156748,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f236b5af3af82_85766531 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="app-main__inner">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value['item'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
">Items</a></li>
              <li class="breadcrumb-item active">Editar item</li>			  
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_item']->value, 'items');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
?>
			<div class="card-header">
				<h5>
					<strong>Editar:</strong> Bodega <?php echo $_smarty_tpl->tpl_vars['items']->value['nombre'];?>
 
				</h5>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text btn btn-primary">Nombre:</span>
							</div>
							<input type="text" class="form-control" id="nombre_item_cliente" value="<?php echo $_smarty_tpl->tpl_vars['items']->value['nombre'];?>
">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text btn btn-primary">Estado:</span>
							</div>
							<?php $_smarty_tpl->_assignInScope('msj', '');?>
							<?php $_smarty_tpl->_assignInScope('msj', '');?>
							<?php $_smarty_tpl->_assignInScope('valor', '');?>
							<?php $_smarty_tpl->_assignInScope('valor', '');?>
							<?php if ($_smarty_tpl->tpl_vars['items']->value['estado'] == 0) {?>
							<?php $_smarty_tpl->_assignInScope('msj', "Activo");?>
							<?php $_smarty_tpl->_assignInScope('msj2', "Inactivo");?>
							<?php $_smarty_tpl->_assignInScope('valor', 1);?>
							<?php $_smarty_tpl->_assignInScope('valor', 0);?>
							<?php } else { ?>
							<?php $_smarty_tpl->_assignInScope('msj', "Inactivo");?>
							<?php $_smarty_tpl->_assignInScope('msj', "Activo");?>
							<?php $_smarty_tpl->_assignInScope('valor', 0);?>
							<?php $_smarty_tpl->_assignInScope('valor', 1);?>
							<?php }?>
							<select class="form-control">
								<option value="<?php echo $_smarty_tpl->tpl_vars['valor']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['msj']->value;?>
</option>
								<option value="<?php echo $_smarty_tpl->tpl_vars['valor2']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['msj2']->value;?>
</option>
							</select>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12">
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text btn btn-primary">Descripción:</span>
							</div>
							<textarea class="form-control" rows="1"><?php echo $_smarty_tpl->tpl_vars['items']->value['descripcion'];?>
</textarea>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-5"></div>
					<div class="col-sm-7">
						<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" >Actualizar</button>
					</div>
				</div>
			</div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	</div>
</div><?php }
}
