<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-23 11:26:50
  from '/var/www/html/Pruebas_Desarrollo/templates/cliente/editar_empresa_cliente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6b5b2a1a9de2_34906523',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53b7a7624780b284fbbe9fde585558a1cf85308c' => 
    array (
      0 => '/var/www/html/Pruebas_Desarrollo/templates/cliente/editar_empresa_cliente.tpl',
      1 => 1600871206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6b5b2a1a9de2_34906523 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#empresa">
		<span>Información empresa</span>
		</a>
	</li>
</ul>

<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="empresa" role="tabpanel">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['empresa_array']->value, 'empresa');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['empresa']->value) {
?>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<label># Tributario:</label>
								<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['id_empresa'];?>
" id="id_empresa">
								<input type="text" id="n_tributario" class="form-control" placeholder="Numero Tributario" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['numero_tributario'];?>
">
							</div>
							<div class="col-sm-6">
								<label>Razon social:</label>
								<input type="text" id="razon_social" class="form-control" placeholder="Razón Social" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['nombre'];?>
">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">
								<label>Dirección</label>
								<input type="text" id="direccion_empresa" class="form-control" placeholder="Dirección" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['direccion'];?>
">
							</div>
							<div class="col-sm-3">
								<label>País</label>
								<select id="pais_empresa" class="form-control">
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
								<input type="text" id="ciudad_empresa" class="form-control" placeholder="Ciudad" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['ciudad'];?>
">	
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label>Sigla pais</label>
								<input type="text" id="sigla_pais" placeholder="Sigla país" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['sigla_pais'];?>
">
							</div>
							<div class="col-sm-3">
								<label>Sigla Empresa</label>
								<input type="text" id="sigla_empresa" class="form-control" placeholder="Sigla Empresa" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['sigla_empresa'];?>
">
							</div>
							<div class="col-sm-3">
								<label>Tipo de sede:</label>
								<input type="text" id="tipo_sede" class="form-control" placeholder="Tipo de sede" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['tipo_sede'];?>
">
							</div>
							<div class="col-sm-3">
								<label>Giro empresa:</label>
								<input type="text" id="giro_empresa" class="form-control" placeholder="Giro" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['giro'];?>
">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-5"></div>
							<div class="col-sm-4"><button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_empresa_cliente">Actualizar</button></div>
						</div>
					</div>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
			</div>
		</div>
	</div>	
	

	<div class="tab-pane tabs-animation fade show" id="historico" role="tabpanel">
		<h2>
			Registro historico
		</h2>
	</div>		
</div>	
	<?php }
}
