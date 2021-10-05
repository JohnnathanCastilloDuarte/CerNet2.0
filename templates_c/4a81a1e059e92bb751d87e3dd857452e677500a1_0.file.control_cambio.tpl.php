<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-15 19:14:03
  from '/var/www/html/Pruebas_Desarrollo/templates/control_cambio/control_cambio.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f0f7fab6846e7_61908241',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a81a1e059e92bb751d87e3dd857452e677500a1' => 
    array (
      0 => '/var/www/html/Pruebas_Desarrollo/templates/control_cambio/control_cambio.tpl',
      1 => 1594851240,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f7fab6846e7_61908241 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#cambio">
		<span>Lista cambios</span>
		</a>
	</li>
	<li class="nav-item">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#error">
		<span>Lista de errores</span>
		</a>
	</li>
</ul>

<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="cambio" role="tabpanel">
		<div class="card">
			<div class="card-header">
				Cambios
			</div>
			<div class="card-body">
			aqui van los cambios
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
