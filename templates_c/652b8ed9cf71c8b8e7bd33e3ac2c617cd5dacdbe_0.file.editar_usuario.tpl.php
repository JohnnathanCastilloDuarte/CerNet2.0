<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-25 20:19:50
  from 'C:\xampp\htdocs\CerNet2.0\templates\usuario\editar_usuario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61f04d567dbfa5_19802386',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '652b8ed9cf71c8b8e7bd33e3ac2c617cd5dacdbe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\usuario\\editar_usuario.tpl',
      1 => 1642600530,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f04d567dbfa5_19802386 (Smarty_Internal_Template $_smarty_tpl) {
?> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_persona']->value, 'persona');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['persona']->value) {
?>
  <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['persona']->value['id_departamento'];?>
" id="id_departamento_editar">
  <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['persona']->value['nombre_departamento'];?>
" id="nombre_departamento_editar">
  <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['persona']->value['id_cargo'];?>
" id="id_cargo_editar">
  <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['persona']->value['nombre_cargo'];?>
" id="nombre_cargo_editar">
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<form method="post" id="formulario_actualizacion_usuario" enctype="multipart/form-data">
	<input type="hidden" name="id_usuario" value="<?php echo $_smarty_tpl->tpl_vars['id_usuario']->value;?>
">
 
	<div class="app-main__inner">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
						<li class="breadcrumb-item"><a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[1];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[1];?>
">Usuarios</a></li>
						<li class="breadcrumb-item active">Editar Usuario</li>			  
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->

		<div class="card">
			<div class="card-header">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_persona']->value, 'persona_array');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['persona_array']->value) {
?>
				<h5>Editar usuario: <?php echo $_smarty_tpl->tpl_vars['persona_array']->value['nombre_persona'];?>
 <?php echo $_smarty_tpl->tpl_vars['persona_array']->value['apellido'];?>
</h5>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-5">
				<div class="card">
					<div class="card-header">
						Imagen Usuario
					</div>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_persona']->value, 'persona_array');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['persona_array']->value) {
?>
					<?php if (isset($_smarty_tpl->tpl_vars['persona_array']->value['imagen_usuario'])) {?>
					<?php $_smarty_tpl->_assignInScope('imagen_encontrada', "templates/usuario/".((string)$_smarty_tpl->tpl_vars['persona_array']->value['imagen_usuario']));?>
					<?php } else { ?>
					<?php $_smarty_tpl->_assignInScope('imagen_encontrada', "templates/usuario/images/images_profile/default.png");?>
					<?php }?>
					<div class="card-body">
						<br>

						<div class="row mx-auto">
							<div id="preview">
								<img style="width: 320px; height:180px; text-aling:center;" src="<?php echo $_smarty_tpl->tpl_vars['imagen_encontrada']->value;?>
" alt="" class="d-block ui-w-30 rounded-circle"  value="<?php echo $_smarty_tpl->tpl_vars['imagen_encontrada']->value;?>
">

							</div>
							<input type="file" name="profile_image" id="file" class="form-control" >
						</div>
					</div>
				</div>
				<br>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

			</div>
			<div class="col-sm-7">
				<div class="card">
					<div class="card-header">
						Datos Usuario
					</div>
					<div class="card-body">
						<?php echo $_smarty_tpl->tpl_vars['alerta']->value;?>

						<div class="row">
							<div class="col-sm-6">
								<?php echo $_smarty_tpl->tpl_vars['alerta_1']->value;?>

								<label>Nombre de usuario:</label>
								<input type="text" name="usuario" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['persona_array']->value['usuario'];?>
" readonly>

							</div>
							<div class="col-sm-6">
								<label>Empresa:</label>
								<select class="form-control" name="empresa_usuario">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['nombre_empresa']->value, 'extraer');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['extraer']->value) {
?> 	
									<option value="<?php echo $_smarty_tpl->tpl_vars['extraer']->value['id_empresa'];?>
"><?php echo $_smarty_tpl->tpl_vars['extraer']->value['nombre'];?>
</option>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_empresa']->value, 'empresas');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['empresas']->value) {
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['empresas']->value['id_empresa'];?>
"><?php echo $_smarty_tpl->tpl_vars['empresas']->value['nombre'];?>
</option>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label>Nombres:</label>
								<input type="text" name="nombre_usuario" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['persona_array']->value['nombre'];?>
">
							</div>
							<div class="col-sm-6">
								<label>Apellidos:</label>
								<input type="text" name="apellido_usuario" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['persona_array']->value['apellido'];?>
">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label># identificación:</label>
								<input type="text" name="identificacion_usuario" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['persona_array']->value['numero_identificacion'];?>
">
							</div>
							<div class="col-sm-6">
								<label>Pais:</label>
								<select class="form-control" name="pais_usuario">
									<option value="<?php echo $_smarty_tpl->tpl_vars['persona_array']->value['pais'];?>
"><?php echo $_smarty_tpl->tpl_vars['persona_array']->value['pais'];?>
</option>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['paises']->value, 'pais_actual');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pais_actual']->value) {
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['pais_actual']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['pais_actual']->value;?>
</option>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label>Email:</label>
								<input type="text" name="email_usuario" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['persona_array']->value['email'];?>
">
							</div>
							<div class="col-sm-6">
								<label>Telefono:</label>
								<input type="text" name="telefono_usuario" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['persona_array']->value['telefono'];?>
">
							</div>
						</div>
						<!--<div class="row">
							<div class="col-sm-6">
								<label>Departamento:</label>
								<select class="form-control" id="departamento_usuario_editar" name="departamento_usuario">
									
								</select>
							</div>
							<div class="col-sm-6">
								<label>Cargo:</label>
								<select class="form-control" id="cargo_usuario_editar"  name="cargo_usuario">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_persona']->value, 'persona');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['persona']->value) {
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['persona']->value['id_cargo'];?>
"><?php echo $_smarty_tpl->tpl_vars['persona']->value['nombre_cargo'];?>
</option>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</select>
							</div>
						</div>-->
            <div class="row">
              <div class="col-sm-6">
                <div class="position-relative form-group">
                  <label>Departamento</label>
                  <select class="form-control" id="departamento_usuario_editar">

                  </select>
                </div>
              </div>
          
              <div class="col-sm-6">
                <label>Tipo Usuario:</label>
                  <select class="form-control" id="privilegios_usuario" name="privilegios_usuario">
                    <option value="0" selected>Seleccione...</option>

                  </select>
				  	  </div>
				  </div>

						<?php if ($_smarty_tpl->tpl_vars['persona_array']->value['estado'] == "Activo") {?>
						<?php $_smarty_tpl->_assignInScope('checked1', "checked");?>

						<?php } elseif ($_smarty_tpl->tpl_vars['persona_array']->value['estado'] == "Desvinculado") {?>
						<?php $_smarty_tpl->_assignInScope('checked2', "checked");?>

						<?php } elseif ($_smarty_tpl->tpl_vars['persona_array']->value['estado'] == "Con licencia") {?>
						<?php $_smarty_tpl->_assignInScope('checked3', "checked");?>

						<?php } else { ?>
						<?php $_smarty_tpl->_assignInScope('checked4', "checked");?>
						<?php }?>

						<div class="row">
							<div class="col-sm-6">
								<div class="position-relative form-group"><label>Estado:</label>
								<select class="form-control" name="estado_usuario">
                   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_persona']->value, 'persona');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['persona']->value) {
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['persona']->value['estado_persona'];?>
"><?php echo $_smarty_tpl->tpl_vars['persona']->value['estado_persona'];?>
</option>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									<option value="Activo">Activo</option>
									<option value="Desvinculado">Desvinculado</option>
									<option value="Con licencia">Con licencia</option>
									<option value="Vacaciones">Vacaciones</option>
								</select>
                </div>
              </div>
            </div>  
              <div class="row">
                <div class="col-sm-12" >
                 <div style="text-align:center;">
                    <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" >Actualizar</button>
                 </div> 
               </div>
              </div>
            </form>	
                <!--
								<div class="position-relative form-group"><label>Estado:</label></div>
							</div>
							<div class="col-sm-3" style="text-align:center;">
								<div class="custom-radio custom-control">
									<input type="radio" id="exampleCustomRadio1" name="estado_usuario" class="custom-control-input" value="Activo" >
									<label class="custom-control-label" for="exampleCustomRadio1">Activo</label>
								</div>
							</div>
							<div class="col-sm-3" style="text-align:center;">					
								<div class="custom-radio custom-control">
									<input type="radio" id="exampleCustomRadio2" name="estado_usuario" class="custom-control-input" value="Desvinculado">
									<label class="custom-control-label" for="exampleCustomRadio2">Desvinculado</label>	
								</div>
							</div>
							<div class="col-sm-3" style="text-align:center;">					
								<div class="custom-radio custom-control">
									<input type="radio" id="exampleCustomRadio3" name="estado_usuario" class="custom-control-input" value="Con licencia" >
									<label class="custom-control-label" for="exampleCustomRadio3">Con licencia</label>	
								</div>
							</div>
							<div class="col-sm-3" style="text-align:center;">					
								<div class="custom-radio custom-control">
									<input type="radio" id="exampleCustomRadio4" name="estado_usuario" class="custom-control-input" value="Vacaciones" >
									<label class="custom-control-label" for="exampleCustomRadio4">Vacaciones</label>	
								</div>
							</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	


<?php echo '<script'; ?>
>
	document.getElementById("file").onchange = function(e) {
		let reader = new FileReader();
		reader.readAsDataURL(e.target.files[0]);
		reader.onload = function(){
			let preview = document.getElementById('preview'),
			image = document.createElement('img');
			document.getElementById(image.style.width = "350px")

			image.src = reader.result;

			preview.innerHTML = '';
			preview.append(image);
		};
	}
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="design/js/usuario.js"><?php echo '</script'; ?>
>	<?php }
}
