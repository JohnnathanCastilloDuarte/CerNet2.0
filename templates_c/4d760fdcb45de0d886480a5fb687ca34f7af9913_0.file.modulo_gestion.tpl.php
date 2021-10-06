<?php
/* Smarty version 3.1.34-dev-7, created on 2021-10-06 03:12:59
  from 'C:\xampp\htdocs\CerNet2.0\templates\modulo\modulo_gestion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_615cf81b6b56f5_77481020',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d760fdcb45de0d886480a5fb687ca34f7af9913' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\modulo\\modulo_gestion.tpl',
      1 => 1633482773,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_615cf81b6b56f5_77481020 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#crear_modulo">
		<span>Crear modulo</span>
		</a>
	</li>
	<li class="nav-item">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#historial_modulo">
		<span>Historial de modulo</span>
		</a>
	</li>
</ul>
<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="crear_modulo" role="tabpanel">
		<div class="row">
			<div class="col-sm-5">
				<div class="card">
					<div class="card-header">
						<h5>
							Crear Modulo
						</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<input type="hidden" id="id_oculto">
							<label>Nombre modulo:</label>
							<input type="text" id="nombre_modulo" class="form-control" placeholder="Ingresa el nombre del modulo">
						</div>
						<br>
						<div class="row">
							<label>Area:</label>
							<input type="text" id="area_modulo" class="form-control" placeholder="Ingresa el area del modulo">
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4"></div>
							<div class="col-sm-4">
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nuevo_modulo">Aceptar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-sm-7">
				<div class="card">
					<div class="card-header">
						<h5>
							Modulos creados
						</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="mb-0 table table-bordered" id="example">
									<th  style="text-align: center;"  width="40%">Nombre</th>
									<th  style="text-align: center;"  width="30%">Area</th>
									<th  style="text-align: center;"  width="30%">Acciones</th>
							</table>
							<div class="scroll-area-sm">
            		<div class="scrollbar-container">
									<table class="mb-0 table table-bordered" >
										<tbody id="lista_modulos">
										</tbody>
									</table>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
	
	<div class="tab-pane tabs-animation fade show" id="historial_modulo" role="tabpanel">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>
							Historial Modulo
						</h4>				
					</div>
					<div class="card-body">
						<i class="badge badge-dot badge-dot-xl badge-success">.</i>Crear
						<i class="badge badge-dot badge-dot-xl badge-warning">.</i>Editar
						<i class="badge badge-dot badge-dot-xl badge-danger">.</i>Eliminar
						 <div class="scroll-area-lg">
              	<div class="scrollbar-container">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_historial']->value, 'historial');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['historial']->value) {
?>
								<?php if ($_smarty_tpl->tpl_vars['historial']->value['tipo_historial'] == 1) {?>
									<?php $_smarty_tpl->_assignInScope('color', "success");?>
									<?php } elseif ($_smarty_tpl->tpl_vars['historial']->value['tipo_historial'] == 2) {?>
									<?php $_smarty_tpl->_assignInScope('color', "warning");?>
										<?php } elseif ($_smarty_tpl->tpl_vars['historial']->value['tipo_historial'] == 3) {?>
										<?php $_smarty_tpl->_assignInScope('color', "danger");?>
										<?php }?>
										<div class="vertical-time-icons vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
											<div class="vertical-timeline-item vertical-timeline-element">
												<div>
													<span class="vertical-timeline-element-icon bounce-in">
														<div class="timeline-icon border-<?php echo $_smarty_tpl->tpl_vars['color']->value;?>
">
															<i class="badge badge-dot badge-dot-xl badge-<?php echo $_smarty_tpl->tpl_vars['color']->value;?>
"></i>
														</div>
													</span>
													<div class="vertical-timeline-element-content bounce-in">
														<h4 class="timeline-title"><?php echo $_smarty_tpl->tpl_vars['historial']->value['nombre'];?>
 <?php echo $_smarty_tpl->tpl_vars['historial']->value['apellido'];?>
 <br><span class="badge badge-dark"></span></h4>
															<p><h6><?php echo $_smarty_tpl->tpl_vars['historial']->value['mensaje'];?>
</h6></p>
													</div>
												</div>
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
			</div>
		</div>	
	</div>
	<?php echo '<script'; ?>
 type="text/javascript" src="design/js/modulo.js">
<?php }
}
