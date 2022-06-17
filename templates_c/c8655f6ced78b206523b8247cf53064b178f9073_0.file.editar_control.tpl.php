<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-09 19:16:21
  from '/home/god/public_html/Pruebas_Desarrollo/templates/control_cambio/editar_control.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd12285c96d32_18741567',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8655f6ced78b206523b8247cf53064b178f9073' => 
    array (
      0 => '/home/god/public_html/Pruebas_Desarrollo/templates/control_cambio/editar_control.tpl',
      1 => 1606264370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fd12285c96d32_18741567 (Smarty_Internal_Template $_smarty_tpl) {
?><input type="hidden" id="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value['control'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[1];?>
">Gestionar controles de cambio</a></li>
              <li class="breadcrumb-item active">Editar control de cambio</li>			  
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h5>
					Modificar control
				</h5>
			</div>
			<div class="card-body">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['controls']->value, 'control');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['control']->value) {
?>
				<div class="row">
					<div class="col-sm-6">
							<label>Fecha registro:</label>
							<input type="text" id="fecha_registro" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['control']->value['fecha_registro'];?>
" style="width:50%;" readonly>	
					</div>
					<div class="col-sm-6">
							<label>Fecha modificación:</label>
							<input type="text" id="fecha_registro" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['fecha_modificacion']->value;?>
" style="width:50%;" readonly>	
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6">
							<label>Fecha cambio:</label>
							<input type="date" id="fecha_cambio" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['control']->value['fecha_cambio'];?>
" style="width:50%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label>Modulo:</label>
							<select id="modulo" class="form-control" style="width:50%;">
								<option value="<?php echo $_smarty_tpl->tpl_vars['control']->value['id_modulo'];?>
"><?php echo $_smarty_tpl->tpl_vars['control']->value['modulo'];?>
</option>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_modulo']->value, 'modulo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['modulo']->value) {
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['modulo']->value['id_modulo'];?>
"><?php echo $_smarty_tpl->tpl_vars['modulo']->value['nombre'];?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</select>	
					</div>
					<div class="col-sm-6">
						<label>Tipo de cambio:</label>
						<select id="tipo_cambio" class="form-control" style="width:50%;">
								<option value="<?php echo $_smarty_tpl->tpl_vars['control']->value['tipo_cambio'];?>
"><?php echo $_smarty_tpl->tpl_vars['control']->value['tipo_cambio'];?>
</option>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tipo_cambio']->value, 'cambio');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cambio']->value) {
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['cambio']->value;?>
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
						<label>Ruta del archivo</label>
						<input type="text" id="archivo" value="<?php echo $_smarty_tpl->tpl_vars['control']->value['archivo'];?>
" class="form-control" style="width:50%;">
					</div>
					<div class="col-sm-6">
						<label>Descripción:</label>
						<textarea  class="form-control" id="desc_control"><?php echo $_smarty_tpl->tpl_vars['control']->value['descripcion'];?>
</textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label>Tiempo:</label>
						<input type="text" id="tiempo" value="<?php echo $_smarty_tpl->tpl_vars['control']->value['tiempo'];?>
" class="form-control" style="width:50%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-5"></div>
					<div class="col-sm-6">
						<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_control">Actualizar</button>
					</div>
				</div>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>	
		</div>
	</div>
</div>		<?php }
}
