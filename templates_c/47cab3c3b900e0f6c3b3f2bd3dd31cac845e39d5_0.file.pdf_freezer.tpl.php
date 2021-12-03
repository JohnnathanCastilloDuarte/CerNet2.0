<?php
/* Smarty version 3.1.34-dev-7, created on 2021-12-02 19:03:58
  from 'C:\xampp\htdocs\CerNet2.0\templates\item\pdf\pdf_freezer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61a90a8e6c7941_51419840',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47cab3c3b900e0f6c3b3f2bd3dd31cac845e39d5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\item\\pdf\\pdf_freezer.tpl',
      1 => 1638467564,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61a90a8e6c7941_51419840 (Smarty_Internal_Template $_smarty_tpl) {
?> <div class="row">
 	<div class="col-sm-12">
 		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_freezer']->value, 'freezer');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['freezer']->value) {
?>
 		<div class="card">
 			<div class="card-header">
 				<h5>
 					Generar y enviar pdf <span><?php echo $_smarty_tpl->tpl_vars['freezer']->value['nombre_freezer'];?>
</span>
 				</h5>
 			</div>
 			<div class="card-body">
 					<div class="form-row">
						<div class="col-sm-6">
							<label>Email</label>
							<input type="email" class="form-control" name="email">
							<br>
						<button class="btn btn-primary">enviar</button>
						<a href="templates/item/pdf/pdf/pdf_freezer.php"><button class="btn btn-danger">Ver PDF</button></a>
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
		<?php echo '<script'; ?>
 type="text/javascript" src="design/js/update_freezer.js"><?php echo '</script'; ?>
><?php }
}
