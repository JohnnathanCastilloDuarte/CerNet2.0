<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-29 17:53:03
  from 'C:\xampp\htdocs\CerNet2.0\templates\item\update_incubadora.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62432b5f703ca4_50501056',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa154793e02dd43523808460fbe75e87845536ec' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\item\\update_incubadora.tpl',
      1 => 1648569182,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62432b5f703ca4_50501056 (Smarty_Internal_Template $_smarty_tpl) {
?> <div class="row">
 	<div class="col-sm-12">
 		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_incubadora']->value, 'incubadora');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['incubadora']->value) {
?>
 		<div class="card">
 			<div class="card-header">
 				<h5>
 					Edición del equipo <span><?php echo $_smarty_tpl->tpl_vars['incubadora']->value['nombre_incubadora'];?>
</span>
 				</h5>
 			</div>
 			<div class="card-body">
 				<div id="smartwizard2" class="forms-wizard-alt">
 					<ul class="forms-wizard">
 						<li>
 							<a href="#step-12">
 								<em>1</em><span>Identificación</span>
 							</a>
 						</li>
 						<li>
 							<a href="#step-22">
 								<em>2</em><span>Especificación </span>
 							</a>
 						</li>
 						<li>
 							<a href="#step-32">
 								<em>2</em><span>Infraestructura</span>
 							</a>
 						</li>

					</ul>

							<div class="form-wizard-content">
								<div id="step-12">
									<div class="form-row">
										<div class="col-sm-6">
											<input type="hidden" id="id_item_incubadora" value="<?php echo $_smarty_tpl->tpl_vars['incubadora']->value['id_incubadora'];?>
">
											<input type="hidden" id="id_item_2" value="<?php echo $_smarty_tpl->tpl_vars['incubadora']->value['id_item'];?>
">
											<label>Nombre del incubadora</label>
											<input type="text" id="nombre_incubadora" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['incubadora']->value['nombre_item'];?>
" placeholder="Nombre incubadora"> 
										</div>
										<div class="col-sm-6">
											<label>Empresa</label>
											<input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="<?php echo $_smarty_tpl->tpl_vars['incubadora']->value['nombre_empresa'];?>
">
											<input type="hidden" id="id_empresa" value="<?php echo $_smarty_tpl->tpl_vars['incubadora']->value['id_empresa'];?>
">
											<div>
												<table class="table" id="aqui_resultados_empresa" >
												</table>
											</div> 
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-6">
											<label>Fabricante/Marca:</label>
											<input type="text" id="marca_incubadora" class="form-control" placeholder="Fabricante incubadora" value="<?php echo $_smarty_tpl->tpl_vars['incubadora']->value['fabricante'];?>
">
										</div>
										<div class="col-sm-6">
											<label>Modelo:</label>
											<input type="text" id="modelo_incubadora" class="form-control" placeholder="Modelo incubadora" value="<?php echo $_smarty_tpl->tpl_vars['incubadora']->value['modelo'];?>
">
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-12">
											<label>Descripcion:</label>
											<textarea class="form-control" id="desc_incubadora"><?php echo $_smarty_tpl->tpl_vars['incubadora']->value['descripcion'];?>
</textarea>
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-6">
											<label>N° Serie / Código interno:</label>
											<input type="text" id="n_serie_incubadora" class="form-control" placeholder="N° Serie" value="<?php echo $_smarty_tpl->tpl_vars['incubadora']->value['n_serie'];?>
">
										</div>
										<div class="col-sm-6">
											<label>fecha fabricación</label>
											<input type="date" id="fecha_fabricacion_incubadora" class="form-control" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['incubadora']->value['fecha_fabricacion'];?>
">
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-4">
											<label>Dirección equipo:</label>
											<input type="text" id="direccion_incubadora" class="form-control" placeholder="Dirección equipo" value="<?php echo $_smarty_tpl->tpl_vars['incubadora']->value['direccion'];?>
">
										</div>
										<div class="col-sm-4">
											<label>Ubicación interna equipo:</label>
											<input type="text" id="ubicacion_interna_incubadora" class="form-control" placeholder="Ubicación equipo" value="<?php echo $_smarty_tpl->tpl_vars['incubadora']->value['ubicacion_interna'];?>
">
										</div>
										<div class="col-sm-4">
											<label>Área interna equipo:</label>
											<input type="text" id="area_interna_incubadora" class="form-control" placeholder="Área equipo" value="<?php echo $_smarty_tpl->tpl_vars['incubadora']->value['area_interna'];?>
">
										</div>
									</div>
								</div>

								<div id="step-22">
									<br>
									<div class="form-row">
										<div class="col-sm-4">
											<label>Valor seteado:</label>
											<input type="text" id="valor_seteado" class="form-control" placeholder="Valor seteado" value="<?php echo $_smarty_tpl->tpl_vars['incubadora']->value['valor_seteado'];?>
">
										</div>
										<div class="col-sm-4">
											<label>Limite máximo (°C):</label>
											<input type="text" id="limite_maximo" class="form-control" placeholder="Limite máximo en °C" value="<?php echo $_smarty_tpl->tpl_vars['incubadora']->value['limite_maximo'];?>
">
										</div>
										<div class="col-sm-4">
											<label>Limite minimo (°C):</label>
											<input type="text" id="limite_minimo" class="form-control" placeholder="Limite minimo en °C" value="<?php echo $_smarty_tpl->tpl_vars['incubadora']->value['limite_minimo'];?>
">
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="col-sm-12" style="text-align:center;">
											<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_item_incubadora">Nuevo</button> 
											<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_incubadora">Actualizar</button>
										</div>
									</div>

								</div>
								<div id="step-12">

									
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
 type="text/javascript" src="design/js/update_incubadora.js"><?php echo '</script'; ?>
><?php }
}
