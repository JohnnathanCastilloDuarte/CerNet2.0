<?php
/* Smarty version 3.1.34-dev-7, created on 2021-10-20 17:42:54
  from 'C:\xampp\htdocs\CerNet2.0\templates\cliente\historial_cliente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_617038fe087ac1_02741354',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47c52f56046d3b86a4f4a01633ddfd427a9591c7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\cliente\\historial_cliente.tpl',
      1 => 1634655979,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_617038fe087ac1_02741354 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
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
										<div class="vertical-time-icons vertical-timeline  vertical-timeline--one-column">
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
		</div><?php }
}
