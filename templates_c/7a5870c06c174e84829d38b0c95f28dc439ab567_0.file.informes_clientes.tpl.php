<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-18 19:50:38
  from '/home/god/public_html/CerNet2.0/templates/informes/informes_clientes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e71a0e4c1944_24189039',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a5870c06c174e84829d38b0c95f28dc439ab567' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/informes/informes_clientes.tpl',
      1 => 1642087957,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e71a0e4c1944_24189039 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
 	<div class="col-sm-12">
 		
 		<div class="card">
 			<div class="card-header">
 				<h5>
 					INFORMES
 				</h5>
 			</div>
 			<!-- boddy -->
 			<div class="card-body">
 					<div class="form-row">
						<div class="col-sm-4">
							<label>Seleccione OT</label>
							<select class="form-control" id="mostrar_ot">
						
							</select>							
						</div>
						<div class="col-sm-4">
							<label>Seleccione OT</label>
							<select class="form-control" id="mostrar_servicio">
								<option>Seleccione...</option>
							</select>							
						</div>
						
					</div>	
					<br>	
					
					<div id="mostrar_informes" class="row">
						
					</div>
			</div>
		</div>
			
			</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/informes_clientes.js"><?php echo '</script'; ?>
><?php }
}
