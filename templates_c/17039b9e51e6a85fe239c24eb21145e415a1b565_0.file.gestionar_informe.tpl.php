<?php
/* Smarty version 3.1.34-dev-7, created on 2022-02-15 14:18:37
  from '/home/god/public_html/CerNet2.0/templates/sala_limpia/gestionar_informe.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_620bb63daa0fa5_68732180',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17039b9e51e6a85fe239c24eb21145e415a1b565' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/sala_limpia/gestionar_informe.tpl',
      1 => 1644934716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_620bb63daa0fa5_68732180 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h6>
					Lista informes para sala limpia
				</h6>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="card">
							<div class="card-header">
								<div class="form-row">
									<div class="col-sm-9">
										Informes Mapeo
									</div>
									<div class="col-sm-9">
										Generados: <span class="badge badge-pill badge-primary" id="mapeo_sala_limpia_generados">-</span>
										En proceso: <span class="badge badge-pill badge-warning" id="mapeo_sala_limpia_proceso">-</span>
										Terminados: <span class="badge badge-pill badge-danger" id="mapeo_sala_limpia_terminados">-</span>
									</div>
								</div>
							</div>
							<div class="card-body">
								<table class="table">
									<thead>
										<th>OT</th>
										<th>Item</th>
										<th>Empresa</th>
										<th>Usuario asignado</th>
										<th>Acciones</th>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			
			</div>
		</div>
	</div>
</div><?php }
}
