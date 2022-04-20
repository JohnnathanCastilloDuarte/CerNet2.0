<?php
/* Smarty version 3.1.34-dev-7, created on 2022-04-04 15:56:04
  from 'C:\xampp\htdocs\CerNet2.0\templates\item\update_aire_comprimido.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_624af8f4381cc9_09713355',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8acbb0c43972bf3174331f2cfddd2a37fe862bc2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\item\\update_aire_comprimido.tpl',
      1 => 1648844818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_624af8f4381cc9_09713355 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
	<div class="col-sm-12">

		<div class="card">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_item_aire']->value, 'aire_comprimido');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['aire_comprimido']->value) {
?>		
			<div class="card-header">
				<?php if ($_smarty_tpl->tpl_vars['aire_comprimido']->value['id_aire_comprimido'] == '') {?>
				<h5>Crear item Aire comprimido</h5>
				<?php } else { ?>
				<h5>Editar item Aire comprimido</h5>
				<?php }?>
			</div>
			<div class="card-body">
				<input type="hidden" name="" id="id_item" value="<?php echo $_smarty_tpl->tpl_vars['aire_comprimido']->value['id_item'];?>
">
				<div class="row">
					<div class="col-sm-6">
						<label>Nombre item aire comprimido</label>
						<input type="text" name="" class="form-control" placeholder="nombre del item" id="nombre_aire_comprimido" value="<?php echo $_smarty_tpl->tpl_vars['aire_comprimido']->value['nombre_item'];?>
">
					</div>
					<div class="col-sm-6">
						<div class="position-relative form-group">
		                    <label>Empresa:</label>
		                    <input type="hidden" id="id_empresa" value="<?php echo $_smarty_tpl->tpl_vars['aire_comprimido']->value['id_empresa'];?>
">
		                    <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="<?php echo $_smarty_tpl->tpl_vars['aire_comprimido']->value['nombre_empresa'];?>
">
		                    <div >
		                      
		                      <table class="table" id="aqui_resultados_empresa">
		                         
		                      </table>
		                    </div>
                  		</div>
					</div>
	
				</div>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>		
				<div class="row">
					<div class="col-sm-12" style="text-align: center;">
						<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_item_aire_comprimido" style="text-align: center;">Nuevo</button>
						 <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_aire_comprimido">Actualizar</button>
					</div>	
				</div>
			  <div id="asignar_aires">
			  	<hr>
				<div class="col-sm-12 card">
					<div class="card-header">
					 	<a data-toggle="collapse" data-target="#collapseOne11"  aria-controls="collapseOne11">
            				Asignar items
           			    </a>
					</div>
					  <div class="card-body collapse collapse show" id="collapseOne11" >
							<input type="hidden" name="" id="id_item_aire_comprimido">
						<div class="row">
							<div class="col-sm-4">
								<label>Nombre sala</label>
								<input type="text" name="" id="nombre_sala" class="form-control" placeholder="nombre sala" value="">
							</div>
							<div class="col-sm-4">
								<label>Área</label>
								<input type="text" name="" id="area" class="form-control" placeholder="Área" value="">
							</div>
							<div class="col-sm-4">
								<label>Punto de uso de aire comprimido</label>
								<input type="text" name="" id="punto_aire_comprimido" class="form-control" placeholder="Punto de aire comprimido" value="">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">
								<label>Código de punto</label>
								<input type="text" name="" id="codigo_punto" class="form-control" placeholder="Código del punto" value="">
							</div>
							<div class="col-sm-6">
								<label>Grado ISO 8573-1</label>
								<input type="text" name="" id="grado_iso" class="form-control" placeholder="Grado de ISO 8573-1" value="">
							</div>
						</div>
						<br>
					<!-- 	<div class="row">
							<div class="col-sm-6">
								<label>Dirección equipo</label>
								<input type="text" name="" id="direccion_aire_comprimido" class="form-control" placeholder="Código del punto" value="">
							</div>
						</div> -->
						<br>
						<div class="row">
							<div class="col-sm-12" style="text-align: center;">
								<button class="btn btn-success" id="crear_aire">Crear</button>
								<button class="btn btn-info" id="editar_aire">Actualizar</button>
								<button class="btn btn-danger" id="cancelar_aire">Cancelar</button>
							</div>							
						</div>
					</div>
				</div><!-- Fin -->
				<br>
				<div class="col-sm-12 card">
					<div class="card-header">
					 	<a data-toggle="collapse" data-target="#collapseOne22"  aria-controls="collapseOne22">
            				Listado de items
           			    </a>
					</div>
					  <div class="card-body collapse collapse " id="collapseOne22" >
					  		<table class="table" id="tabla_items">
					  			
					  		</table>
						</div>	
						
					</div>
				</div><!-- Fin -->
			  </div>	


			</div>
		</div>
	
	</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript" src="design/js/update_aire_comprimido.js"><?php echo '</script'; ?>
><?php }
}
