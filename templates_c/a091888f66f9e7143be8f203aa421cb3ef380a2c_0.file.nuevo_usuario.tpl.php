<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-14 15:51:56
  from '/home/god/public_html/Pruebas_Desarrollo/templates/usuario/nuevo_usuario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd78a1c108808_63824252',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a091888f66f9e7143be8f203aa421cb3ef380a2c' => 
    array (
      0 => '/home/god/public_html/Pruebas_Desarrollo/templates/usuario/nuevo_usuario.tpl',
      1 => 1606264373,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fd78a1c108808_63824252 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
	<div class="col-sm-5">	
		<div class="card">
			<div class="card-header">	
				<h2 class="card-title">Datos de usuario</h2>
			</div><!--Cierre del card-header-->
			
			<div class="card-body">
				<?php echo $_smarty_tpl->tpl_vars['alerta']->value;?>

				<div class="col-sm-12">
					<div class="position-relative form-group"><label for="nombre_usuario" class=""><span class="text-danger">*</span>Usuario</label>
						<input name="usuario" id="usuario_principal" placeholder="Ingrese un usuario" type="text" class="form-control" required>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="position-relative form-group"><label for="pass_usuario" class=""><span class="text-danger">*</span>Contraseña</label>
						<input name="clave_usuario" id="clave_usuario" placeholder="Ingresa una contraseña" type="password" class="form-control" required>	
					</div>
				</div>   
				<div class="col-sm-12">
					<div class="position-relative form-group"><label for="pass_usuario" class=""><span class="text-danger">*</span>Repita su Contraseña</label>
						<input name="re_clave_usuario" id="re_clave_usuario" placeholder="Repita su contraseña" type="password" class="form-control" required>
					</div>
				</div>
				<div id="coinciden_pass">

				</div>
			</div><!--Cierre del card-body-->
	</div><!--Cierre de la card 1 -->	
		<br><br>
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<div class="col-sm-12">
							<h2 class="card-title">Carga de foto</h2>
						</div>
					</div>

					<div class="card-body">
						<div class="col-sm-12" style="text-align:center">
							<input type="file" name="profile_image" id="file_usuario">
						</div>
					<br>
					<div class="col-sm-12" id="preview">
					</div>
					</div>	
				</div>
			</div>	
		</div>	
	</div><!--Cierre de col-sm-5-->	

	<!--Inicio  de la segunda tarjeta-->
	<div class="col-sm-7">
		<div class="card">
			<div class="card-header">
				<h2 class="card-title">Datos adicionales</h2>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="position-relative form-group">
							<label>Nombres:</label>
							<input type="text" id="nombre_usuario" class="form-control" placeholder="Nombres del usuario"  required>	
						</div>
					</div>	
					<div class="col-sm-6">
						<label>Apellidos:</label>
						<input type="text" id="apellido_usuario" class="form-control"  placeholder="Apellidos del usuario"  required>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="position-relative form-group">	
							<label>Email:</label>
							<input type="email" id="email_usuario" class="form-control"  placeholder="mi@correo.cl"  required>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="position-relative form-group">	
							<label>Telefono</label>
							<input type="number" id="telefono_usuario" class="form-control" placeholder="123456789"  required>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
							<div class="position-relative form-group">
							<label>Numero de identificación</label>
							<input type="text" class="form-control" id="numero_identificacion" placeholder="# de identificación" >
						</div>
					</div>
					<div class="col-sm-6">
						<label>Cargo:</label>
						<select class="form-control" id="cargo_usuario">
							<option>Selecciona...</option>
							<option value="Administrativo">Administrativo</option>
							<option value="Comercial">Comercial</option>
							<option value="Documentador">Documentador</option>
							<option value="Gerente general">Gerente general</option>
							<option value="Ingeniero">Ingeniero</option>
							<option value="T.I.">T.I.</option>
						</select>	
					</div>
				</div>	

				<div class="row">
					<div class="col-sm-6">
						<div class="position-relative form-group">
							<label>Departamento</label>
							<select class="form-control" id="departamento_usuario">
								<option>Selecciona...</option>
								<option value="<?php echo $_smarty_tpl->tpl_vars['departamento_usuario']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['departamento_usuario']->value;?>
</option>
								<option value='ADMINISTRACIÓN'>ADMINISTRACIÓN</option>
								<option value='COMERCIAL'>COMERCIAL</option>
								<option value='CSV'>CSV</option>
								<option value='GEP'>GEP</option>
								<option value='MARKETING'>MARKETING</option>
								<option value='SPOT'>SPOT</option>
								<option value='T.I.'>T.I.</option>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="position-relative form-group">						
							<label>Pais:</label>
							<select class="form-control" id="pais_usuario">
							<option>Selecciona...</option>
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
				</div>

				<div class="row">
					<div class="col-sm-6">
						<label>Empresa:</label>
							<select class="form-control" id="empresa_usuario">
								<option>Selecciona...</option>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['empresas']->value, 'empresa');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['empresa']->value) {
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['id_empresa'];?>
"><?php echo $_smarty_tpl->tpl_vars['empresa']->value['nombre'];?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="position-relative form-group"><label>Estado:</label></div>
					</div>
					<div class="col-sm-3" style="text-align:center;">
						<div class="custom-radio custom-control">
							<input type="radio" id="exampleCustomRadio1" name="estado_usuario" class="custom-control-input" value="Activo">
							<label class="custom-control-label" for="exampleCustomRadio1" checked>Activo</label>
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
							<input type="radio" id="exampleCustomRadio3" name="estado_usuario" class="custom-control-input" value="Con licencia">
							<label class="custom-control-label" for="exampleCustomRadio3">Con licencia</label>	
						</div>
					</div>
					<div class="col-sm-3" style="text-align:center;">					
						<div class="custom-radio custom-control">
							<input type="radio" id="exampleCustomRadio4" name="estado_usuario" class="custom-control-input" value="Vacaciones">
							<label class="custom-control-label" for="exampleCustomRadio4">Vacaciones</label>	
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="col-sm-12">
			<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nuevo_usuario" name="btn_nuevo_usuario">Aceptar</button>
			</div>
		</div><!--Cierre del card-body--> 
	</div><!--Cierre del col-sm-7-->
</div>	
<?php echo '<script'; ?>
>
	document.getElementById("file").onchange = function(e) {
	let reader = new FileReader();
	reader.readAsDataURL(e.target.files[0]);
	reader.onload = function(){
	let preview = document.getElementById('preview'),
	image = document.createElement('img');

	image.src = reader.result;

	preview.innerHTML = '';
	preview.append(image);
	};
	}
<?php echo '</script'; ?>
>








<?php }
}
