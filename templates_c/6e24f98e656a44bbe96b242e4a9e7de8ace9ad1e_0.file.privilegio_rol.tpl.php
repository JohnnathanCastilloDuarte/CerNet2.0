<?php
/* Smarty version 3.1.34-dev-7, created on 2021-11-29 22:50:22
  from 'C:\xampp\htdocs\CerNet2.0\templates\usuario\privilegio_rol.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61a54b1e01a662_64003921',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e24f98e656a44bbe96b242e4a9e7de8ace9ad1e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\usuario\\privilegio_rol.tpl',
      1 => 1638222616,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61a54b1e01a662_64003921 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#privilegio">
		<span>Privilegio</span>
		</a>
	</li>
	<!--<li class="nav-item">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#rol">
		<span>Rol</span>
		</a>
	</li>-->
</ul>

<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="privilegio" role="tabpanel">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-11">
							<div id="capa_nuevo">
								<label>Crear Privilegio:</label>
								<input type="text" name="nuevo_privilegio" class="form-control" id="nuevo_privilegio" placeholder="Ingrese el Privilegio" style="width:30%">
								<br>
								<button class="btn-shadow btn-outline-2x btn btn-outline-info" id="crear_privilegio">Aceptar</button>
								
							</div>
						</div>
						<div class="col-sm-1">
							<button class="btn btn-success" id="añadir" title="Nuevo privilegio"><i class="ion-android-add" ></i></button>
							<button class="btn btn-danger" id="ocultar"><i class="ion-android-close" title="Ocultar privilegio"></i></button>	
						</div>
					</div>
					<br>
					<div class="row" id="capa_rol">
						<div class="col-sm-9">
							<label>Seleccione privilegio:</label>
							<select class="form-control" id="selecte" style="width:30%">
								
								
							</select>	
							
						</div>	
						<div class="col-sm-3">
							<div id="btn_actualizar">
								<br>
								<br>
								<button class="btn-shadow btn-outline-2x btn btn-outline-danger" id="eliminar_privilegio">Eliminar</button>
							</div>
						</div>
					</div>	
					
					<br>
					<form id="formulario_privilegios" enctype="multipart/form-data" method="post">
						<input type="hidden" id="id_privilegio" name="id_privilegio">
						<table  class="table table-striped table-bordered" style="text-align:center;">
							<thead >
								<th>Modulo</th>
								<th>Acciones</th>
							</thead>
							<tbody id="container_privilegio">
												
							</tbody>
						</table>
						

						<div class="row" style="text-align: center;">
							<div class="col-sm-12">
								<button class="btn-shadow btn-outline-2x btn btn-outline-info">Aceptar</button>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>		
</div>


<div class="tab-pane tabs-animation fade show" id="rol" role="tabpanel">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-11">
							<div id="capa_nuevo_rol">
								<label>Crear Rol:</label>
								<input type="text" name="nuevo_rol" class="form-control" id="nuevo_rol" placeholder="Ingrese el Rol" style="width:30%">
								<br>
								<button class="btn-shadow btn-outline-2x btn btn-outline-info" id="crear_rol">Aceptar</button>
								
							</div>
						</div>
						<div class="col-sm-1">
							<button class="btn btn-success" id="añadir_rol" title="Nuevo Rol"><i class="ion-android-add" ></i></button>
							<button class="btn btn-danger" id="ocultar_rol"><i class="ion-android-close" title="Ocultar Rol"></i></button>	
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-9">
							<label>Seleccione Rol:</label>
							<select class="form-control" id="selecte_rol" style="width:30%">
								<option>Seleccione...</option>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rol_encontrados']->value, 'rol');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rol']->value) {
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['rol']->value['rol'];?>
" ><?php echo $_smarty_tpl->tpl_vars['rol']->value['rol'];?>
</option>
								
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</select>	
							<br>
							<input type="text" id="nombre_rol" class="form-control" style="width:30%">
						</div>	
						<div class="col-sm-3">
							<div id="btn_actualizar_rol">
								<br>
								<br>
								<button class="btn-shadow btn-outline-2x btn btn-outline-info" id="actualizar_rol">Actualizar</button>
								<button class="btn-shadow btn-outline-2x btn btn-outline-danger" id="eliminar_rol">Eliminar</button>
							</div>
						</div>
					</div>	
					
					<br>
          
          
          <!--
					<table  class="table table-striped table-bordered" >
						<thead >
							<th>Modulo</th>
							<th>Acciones</th>
						</thead>
						<tbody id="container_rol">
											
						</tbody>
					</table>-->
				</div>
			</div>
		</div>
	</div>		
</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/privilegio.js"><?php echo '</script'; ?>
><?php }
}
