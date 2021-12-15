<?php
/* Smarty version 3.1.34-dev-7, created on 2021-12-12 18:46:51
  from 'C:\xampp\htdocs\CerNet2.0\templates\OT\asignar_servicio_ot.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61b6358ba46034_86600313',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80b6c7e41ba5b9412eabc9ecec47ac04c119b2ad' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\OT\\asignar_servicio_ot.tpl',
      1 => 1639331111,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b6358ba46034_86600313 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
				<li class="breadcrumb-item"><a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[5]['OT'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
">OT</a></li>
				<li class="breadcrumb-item active">Asginar servicio</li>			  
			</ol>
		</div>
	</div>
</div><!-- /.container-fluid -->

<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#asignar_servicio">
		<span>Asignar servicio</span>
		</a>
	</li>
	<li class="nav-item">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#asignar_item">
		<span>Asignar Item</span>
		</a>
	</li>
</ul>

<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="asignar_servicio" role="tabpanel">
		<div class="row">
			<div class="col-sm-7">
				<div class="card">
					<div class="card-header">
					<input type="hidden" id="id_ot_asignar_oculto" value="<?php echo $_smarty_tpl->tpl_vars['ot']->value;?>
">
						<input type="hidden" id="id_empresa_numot" value="<?php echo $_smarty_tpl->tpl_vars['id_empresa_numot']->value;?>
">
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text">Buscar</span></div>
							<input type="text" id="buscar_tipo_servicio" class="form-control" placeholder="Ingrese el nombre del servicio">
						</div>
					</div>
					<div class="card-body">
						<div class="row" id="resultados_tipo_servicios">

						</div>
						
						<div class="row" id="resultados_busqueda_tipo_servicios">
						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-5">
				<div class="card">
					<div class="card-header">
						<h6>
							Servicios asignados a la <?php echo $_smarty_tpl->tpl_vars['numot']->value;?>

						</h6>
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<th>ID</th>
								<th>Servicio</th>
								<th>Estado</th>
							</thead>
							<tbody id="resultado_servicios_asignados">

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--Cierre del row principal-->	
	</div>	<!--Cierre del primer ul-->
	
	<div class="tab-pane tabs-animation fade show" id="asignar_item" role="tabpanel">
		<div class="row">
			<div class="col-sm-6">
				<div class="card">
					<div class="card-header">
						<h6>
							Servicios asignados a <?php echo $_smarty_tpl->tpl_vars['numot']->value;?>

						</h6>
					</div>
					<div class="card-body">
						<div class="row" id="servicios_para_items">
							
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-sm-6">
				<div class="card">
					<div class="card-header">
						<h6>
							Selecciona el equipo para el servicio
						</h6>
					</div>
					<div class="card-body">
						<div class="row" id="equipos_disponibles" style="text-align:center;">
							<div class="col-sm-12">
								<table id="example" style="width:100%;">
									<thead>
										<th>ID</th>
										<th>Nombre</th>
										<th>Descripcion</th>
										<th>Acción</th>
									</thead>
									<tbody id="resultados_equipos_servicio">

									</tbody>

								</table>
							</div>	
						</div>
					</div>
				</div>
				
				<div class="card">
					<div class="card-body">
						<div class="card-header">
							<h6 style="text-align:center;" id="anuncio_click_gestionar">Selecciona un servicio para continuar</h6>
							<h6 style="text-align:center;" id="anuncio_click_gestionar_2" class="text-danger">No hay item´s asignados	</h6>
							<h6 style="text-align:center;" id="anuncio_click_gestionar_3">Items asignados</h6>
						</div>	
						<div class="row" id="equipos_asignados" style="text-align:center;">
							<div class="col-sm-12">
								<table id="example" style="width:100%;" class="tabla_equipos_asignados">
									<thead>
										<th>ITEM</th>
										<th>Servicio</th>
										<th>Fecha asignado</th>
									</thead>
									<tbody id="resultado_equipos_asignados">

									</tbody>
								</table>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div><!--Cierre del DIV -->	
<?php echo '<script'; ?>
 src="design/js/asignar_servicio.js"><?php echo '</script'; ?>
>
	<?php }
}
