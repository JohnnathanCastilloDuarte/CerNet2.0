<?php
/* Smarty version 3.1.34-dev-7, created on 2021-03-30 18:11:25
  from '/home/god/public_html/CERNET/templates/control_cambio/nuevo_control.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_606369cdc1c908_97704332',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25ebc50d623f04e4d3c00fe5f4e315f8a41ca028' => 
    array (
      0 => '/home/god/public_html/CERNET/templates/control_cambio/nuevo_control.tpl',
      1 => 1610543072,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_606369cdc1c908_97704332 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#cambio">
		<span>Agregar cambios</span>
		</a>
	</li>
	<li class="nav-item">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#error">
		<span>Agregar errores</span>
		</a>
	</li>
</ul>

<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="cambio" role="tabpanel">
		<div class="row">
			<div class="col-sm-5">
				<div class="card">
					<div class="card-header">
						Agregar cambio
					</div>
					<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="position-relative form-group">
										<label><strong>Fecha de realización del cambio:</strong></label>
										<input type="date" class="form-control" id="fecha_realizacion">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="position-relative form-group">
										<label><strong>Tiempo que se requirió:</strong></label>
										<input type="text"  class="form-control" placeholder="en minutos" value="" id="tiempo_requerido">				
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="position-relative form-group">
										<label><strong>Descripción de los cambios realizados:</strong></label>
										<textarea id="descripcion_cambio" class="form-control" placeholder="Explica a detalle" value=""></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="position-relative form-group">
										<label><strong>Tipo de cambio</strong></label>
										<select id="tipo_cambio" class="form-control" >
											<option value="Seleccione">Seleccione...</option>
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
							</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="position-relative form-group">
									<label><strong>Ruta archivo</strong></label>
									<input type="text" id="archivo" class="form-control" placeholder="Ruta/nombrearchivo.extension">
								</div>
							</div>
						</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="position-relative form-group">
										<label><strong>Módulo</strong></label>
										<select id="modulo" class="form-control" >
											<option value="0">Seleccione...</option>
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
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-12" style="text-align:center;">
									<div class="position-relative form-group">	
										<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nuevo_cambio">Aceptar</button>	
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>	

			<div class="col-sm-7">
				<div class="card">
					<div class="card-header">
						Últimos cambios realizados
					</div>
					<div class="card-body">
           <div class="table-responsive">
							<table class="table">
								<thead>
									<th>Fecha registro</th>
									<th>Modulo</th>
									<th>Fecha fin</th>
									<th>Archivo</th>
									<th>Descripción</th>
									<th>Tipo cambio</th>
									<th>Tiempo</th>
								</thead>
								<tbody id="registros_controlcambios">

								</tbody>
							</table>
						</div> 
					</div>
				</div>
			</div>				
		</div>
	</div>

	<div class="tab-pane tabs-animation fade show" id="error" role="tabpanel">
		<div class="row">
			<div class="col-sm-5">
				<div class="card">
					<div class="card-header">Listado de errores
					</div>
					<div class="card-body">
						<label>Concepto</label>
						<input type="text" id="concepto_error" class="form-control" placeholder="Ingrese el concepto">
						<label>Modulo</label>
						<select id="modulo_error" class="form-control" >
						<option value="0">Seleccione...</option>
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
						<label>Solución:</label>
						<textarea class="form-control" id="solucion_error" placeholder="Ingrese la solución del error"></textarea>
						<br>
						<div class="row">
							<div class="col-sm-5"></div>
							<div class="col-sm-7"><button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nuevo_error">Aceptar</button>	</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-7">
				<div class="card">
					<div class="card-header">
						Ultimos errores creados
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover table-striped table-bordered">
								<thead>
									<th>#Codigo</th>
									<th>Concepto</th>
									<th>Modulo</th>
									<th>Solución</th>
								</thead>
								<tbody  id="errores">
								</tbody>
							</table>
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</div>

</div><?php }
}
