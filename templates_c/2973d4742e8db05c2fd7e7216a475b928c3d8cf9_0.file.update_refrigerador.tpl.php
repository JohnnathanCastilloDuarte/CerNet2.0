<?php
/* Smarty version 3.1.34-dev-7, created on 2021-11-24 20:35:52
  from '/home/god/public_html/CerNet2.0/templates/item/update_refrigerador.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_619ea2280710b6_61182050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2973d4742e8db05c2fd7e7216a475b928c3d8cf9' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/item/update_refrigerador.tpl',
      1 => 1637780111,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619ea2280710b6_61182050 (Smarty_Internal_Template $_smarty_tpl) {
?> <div class="row">
 	<div class="col-sm-12">
 		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_refrigerador']->value, 'refrigerador');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['refrigerador']->value) {
?>
 		<div class="card">
 			<div class="card-header">
 				<h5>
 					Edición del equipo <span><?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['nombre_refrigerador'];?>
</span>
 				</h5>
 			</div>
 			<div class="card-body">
 				<div id="smartwizard2" class="forms-wizard-alt">
 					<ul class="forms-wizard">
 						<li>
 							<a href="#step-12">
 								<em>1</em><span>Identificación del equipo</span>
 							</a>
 						</li>
 						<li>
 							<a href="#step-22">
 								<em>2</em><span>Caracteristica del equipo</span>
 							</a>
 						</li>
						<!--	<li>
									<a href="#step-32">
											<em>3</em><span>Equipos</span>
									</a>
							</li>
						<li id="si_envia">
									<a href="#step-42">
											<em>4</em><span>Evidencia</span>
									</a>
								</li>-->
							</ul>

							<div class="form-wizard-content">
								<div id="step-12">
									<div class="form-row">
										<div class="col-sm-6">
											<input type="hidden" id="id_item_refrigerador" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['id_refrigerador'];?>
">
											<input type="hidden" id="id_item_2" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['id_item'];?>
">
											<label>Nombre del refrigerador</label>
											<input type="text" id="nombre_refrigerador" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['nombre_refrigerador'];?>
" placeholder="Nombre refrigerador"> 
										</div>
										<div class="col-sm-6">
											<label>Empresa:</label>
											<select id="empresa_refrigerador" class="form-control">
												<?php if ($_smarty_tpl->tpl_vars['refrigerador']->value['id_empresa'] == '') {?>
												<option value="0">Seleccione....</option>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_empresas']->value, 'empresa');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['empresa']->value) {
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['id_empresas'];?>
"><?php echo $_smarty_tpl->tpl_vars['empresa']->value['nombre_empresas'];?>
</option>							
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
												<?php } else { ?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['id_empresa'];?>
"><?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['nombre_empresa'];?>
</option>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_empresas']->value, 'empresa');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['empresa']->value) {
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['id_empresas'];?>
"><?php echo $_smarty_tpl->tpl_vars['empresa']->value['nombre_empresas'];?>
</option>							
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
												<?php }?>
											</select>
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-6">
											<label>Fabricante/Marca:</label>
											<input type="text" id="fabricante_refrigerador" class="form-control" placeholder="Fabricante refrigerador" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['fabricante'];?>
">
										</div>
										<div class="col-sm-6">
											<label>Modelo:</label>
											<input type="text" id="modelo_refrigerador" class="form-control" placeholder="Modelo refrigerador" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['modelo'];?>
">
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-12">
											<label>Descripcion:</label>
											<textarea class="form-control" id="desc_refrigerador"><?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['descripcion_refrigerador'];?>
</textarea>
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-4">
											<label>N° Serie:</label>
											<input type="text" id="n_serie_refrigerador" class="form-control" placeholder="N° Serie" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['n_serie'];?>
">
										</div>
										<div class="col-sm-4">
											<label>Codigo interno:</label>
											<input type="text" id="codigo_interno_refrigerador" class="form-control" placeholder="Codigo interno" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['c_interno'];?>
">
										</div>
										<div class="col-sm-4">
											<label>Año fabricación</label>
											<input type="date" id="fecha_fabricacion_refrigerador" class="form-control" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['fecha_fabricacion'];?>
">
										</div>
									</div>
								</div>

								<div id="step-22">
									<div class="form-row">
										<div class="col-sm-6">
											<label>Dirección equipo:</label>
											<input type="text" id="direccion_refrigerador" class="form-control" placeholder="Dirección equipo" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['direccion'];?>
">
										</div>
										<div class="col-sm-6">
											<label>Ubicación interna equipo:</label>
											<input type="text" id="ubicacion_interna_refrigerador" class="form-control" placeholder="Ubicación equipo" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['ubicacion'];?>
">
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-4">
											<label>Voltaje:</label>
											<input type="text" id="voltaje_refrigerador" class="form-control" placeholder="Voltaje" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['voltaje'];?>
">
										</div>
										<div class="col-sm-4">
											<label>Potencia:</label>
											<input type="text" id="potencia_refrigerador" class="form-control" placeholder="Potencia" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['potencia'];?>
">
										</div>
										<div class="col-sm-4">
											<label>Capacidad:</label>
											<input type="text" id="capacidad_refrigerador" class="form-control" placeholder="Capacidad" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['capacidad'];?>
">
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-3">
											<label>Peso:</label>
											<input type="text" id="peso_refrigerador" class="form-control" placeholder="Peso" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['peso'];?>
">
										</div>
										<div class="col-sm-3">
											<label>Alto(mm):</label>
											<input type="text" id="alto_refrigerador" class="form-control" placeholder="Alto" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['alto'];?>
">
										</div>
										<div class="col-sm-3">
											<label>Largo(mm):</label>
											<input type="text" id="largo_refrigerador" class="form-control" placeholder="Largo" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['largo'];?>
">
										</div>
										<div class="col-sm-3">
											<label>Ancho(mm):</label>
											<input type="text" id="ancho_refrigerador" class="form-control" placeholder="Ancho" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['ancho'];?>
">
										</div>	
									</div>
									<br>

									<div class="form-row">
										<div class="col-sm-4">
											<label>Valor seteado humedad:</label>
											<input type="text" id="valor_seteado_hum" class="form-control" placeholder="Valor seteado humedad" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['seteado_hum'];?>
" required>
										</div>

										<div class="col-sm-4">
											<label>Humedad minima:</label>
											<input type="text" id="humedad_minima" class="form-control" placeholder="Humedad minima" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['hum_min'];?>
" required>
										</div>

										<div class="col-sm-4">
											<label>Humedad maxima:</label>
											<input type="text" id="humedad_maxima" class="form-control" placeholder="Humedad maxima" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['hum_max'];?>
" required>
										</div>
									</div>

									<br>

									<div class="form-row">
										<div class="col-sm-4">
											<label>Valor seteado temperatura:</label>
											<input type="text" id="valor_seteado_tem" class="form-control" placeholder="Valor seteado humedad" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['seteado_tem'];?>
" required>
										</div>

										<div class="col-sm-4">
											<label>Temperatura minima:</label>
											<input type="text" id="temperatura_minima" class="form-control" placeholder="Humedad minima" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['tem_min'];?>
" required>
										</div>

										<div class="col-sm-4">
											<label>Temperatura maxima:</label>
											<input type="text" id="temperatura_maxima" class="form-control" placeholder="Humedad maxima" value="<?php echo $_smarty_tpl->tpl_vars['refrigerador']->value['tem_max'];?>
" required>
										</div>
									</div>



									<br>
									<div class="form-row">
										<div class="col-sm-12" style="text-align:center;">
											<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_item_refrigerador">Nuevo</button> 
											<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_refrigerador">Actualizar</button>
										</div>
									</div>

								</div>
							</div><!---Cierre del content-->
						</div><!--Cierre del wizard-->	
						<div class="divider"></div>
						<div class="clearfix">
							<button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
							<button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Anterior</button>
						</div>


					</div>
				</div>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		</div>
		<?php echo '<script'; ?>
 type="text/javascript" src="design/js/update_refrigerador.js"><?php echo '</script'; ?>
><?php }
}
