<?php
/* Smarty version 3.1.34-dev-7, created on 2021-10-07 15:48:11
  from 'C:\xampp\htdocs\CerNet2.0\templates\usuario\historial_usuario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_615efa9bb5cd34_05236664',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6cbdb945d6dc91f166c35f165eeddffd0eda764e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\usuario\\historial_usuario.tpl',
      1 => 1626721182,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_615efa9bb5cd34_05236664 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>
							Historial usuario
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
									<div class="vertical-time-icons vertical-timeline  vertical-timeline--one-column">
										<div class="vertical-timeline-item vertical-timeline-element ">
											<div>
												<span class="vertical-timeline-element-icon bounce-in">
													<div class="timeline-icon border-<?php echo $_smarty_tpl->tpl_vars['color']->value;?>
">
														<i class="badge badge-dot badge-dot-xl badge-<?php echo $_smarty_tpl->tpl_vars['color']->value;?>
"></i>
													</div>
												</span>
												<div class="vertical-timeline-element-content wow bounceIn" data-wow-delay="0.1s" >
													<h4 class="timeline-title"><?php echo $_smarty_tpl->tpl_vars['historial']->value['nombre'];?>
 <?php echo $_smarty_tpl->tpl_vars['historial']->value['apellido'];?>
<br><span class="badge badge-dark">Hora movimiento: <?php echo $_smarty_tpl->tpl_vars['historial']->value['fecha_registro'];?>
</span></h4>
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
<?php echo '<script'; ?>
>
              new WOW().init();
              <?php echo '</script'; ?>
><?php }
}
