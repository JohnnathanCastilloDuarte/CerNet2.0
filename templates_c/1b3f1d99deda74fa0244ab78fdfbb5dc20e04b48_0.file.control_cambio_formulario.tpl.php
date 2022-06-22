<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-24 17:03:47
  from '/var/www/html/Pruebas_Desarrollo/templates/control_cambio/control_cambio_formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f1b3ea3273262_65722590',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b3f1d99deda74fa0244ab78fdfbb5dc20e04b48' => 
    array (
      0 => '/var/www/html/Pruebas_Desarrollo/templates/control_cambio/control_cambio_formulario.tpl',
      1 => 1595616356,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f1b3ea3273262_65722590 (Smarty_Internal_Template $_smarty_tpl) {
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
			<div class="col-sm-7">
				<div class="card">
					<div class="card-header">
						Agregar cambio
					</div>
					<div class="card-body">
						<form method="post">
							<div class="row">
								<div class="col-sm-6">
									<div class="position-relative form-group">
										<label><strong>Fecha de realización del cambio:</strong></label>
										<input type="date" class="form-control" name="fecha_cambio">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="position-relative form-group">
										<label><strong>Tiempo que se requirió:</strong></label>
										<input type="text" name="tiempo" class="form-control" placeholder="en minutos" value="">				
									</div>
								</div>
							</div>
					
							<div class="row">
								<div class="col-sm-12">
									<div class="position-relative form-group">
										<label><strong>Descripción de los cambios realizados:</strong></label>
										<textarea name="descripcion" class="form-control" placeholder="Explica a detalle" value=""></textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="position-relative form-group">
										<label><strong>Módulo:</strong></label>
										<select name="descripcion" class="form-control" >
											<option>Elige una opción...</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-12" style="text-align:center;">
									<div class="position-relative form-group">	
										<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" name="carga_cambio">Aceptar</button>	
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>	

			<div class="col-sm-5">
				<div class="card">
					<div class="card-header">
						Últimos cambios realizados
					</div>
					<div class="card-body">
						<?php echo $_smarty_tpl->tpl_vars['desc_cambio']->value;?>

					</div>
				</div>
			</div>				
		</div>
	</div>

	<div class="tab-pane tabs-animation fade show" id="error" role="tabpanel">
		<div class="card">
			<div class="card-header">
				Listado de errores
			</div>
			<div class="card-body">
			aqui van los errores
			</div>
		</div>
	</div>

</div><?php }
}
