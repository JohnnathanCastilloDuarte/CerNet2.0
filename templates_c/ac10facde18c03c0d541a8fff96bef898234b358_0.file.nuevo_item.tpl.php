<?php
/* Smarty version 3.1.34-dev-7, created on 2021-10-26 23:39:36
  from 'C:\xampp\htdocs\CerNet2.0\templates\item\nuevo_item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6178759875cd24_27359143',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac10facde18c03c0d541a8fff96bef898234b358' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\item\\nuevo_item.tpl',
      1 => 1635284373,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6178759875cd24_27359143 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="app-main__inner">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<h5>
					Creación de Item
				</h5>	
			</div>
			<div class="card-body" id="listado_tipo_item">
				<div class="row">						
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_tipo']->value, 'tipo_item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tipo_item']->value) {
?>	
				<div class="col-sm-6 col-xl-4">
					<div class="widget-chart widget-chart-hover">
						<div class="icon-wrapper rounded-circle">
							<div class="icon-wrapper-bg bg-primary"></div>
							<i class="pe-7s-tools text-primary"></i></div>
						<div class="widget-numbers"><h5 class="text-primary"><?php echo $_smarty_tpl->tpl_vars['tipo_item']->value['nombre'];?>
</h5></div>
						<div class="widget-subheading"><button class="mb-2 mr-2 btn-shadow btn-outline-2x btn btn-outline-info" id="btn_abrir_item" data-id="<?php echo $_smarty_tpl->tpl_vars['tipo_item']->value['id_tipo'];?>
">Crear</button></div>
						<div class="widget-description text-primary">
							
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


	<?php echo '<script'; ?>
 type="text/javascript" src="design/js/Item.js"><?php echo '</script'; ?>
>		<?php }
}
