<?php
/* Smarty version 3.1.34-dev-7, created on 2021-03-10 15:30:47
  from '/home/god/public_html/CERNET/templates/usuario/nombres_usuarios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6048e6272c9b75_75434018',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a940e1b45bf97e7b9ea859563ecca271f96eed70' => 
    array (
      0 => '/home/god/public_html/CERNET/templates/usuario/nombres_usuarios.tpl',
      1 => 1610543072,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6048e6272c9b75_75434018 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="post"  enctype="multipart/form-data">
<div class="app-main__inner">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[0]['Usuario'];?>
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
			<h5>Editar usuario <?php echo $_smarty_tpl->tpl_vars['persona_array']->value['nombre'];?>
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
					<?php if (file_exists($_smarty_tpl->tpl_vars['persona_array']->value['imagen_usuario'])) {?>
					<?php $_smarty_tpl->_assignInScope('imagen_encontrada', $_smarty_tpl->tpl_vars['persona_array']->value['imagen_usuario']);?>
					<?php } else { ?>
					<?php $_smarty_tpl->_assignInScope('imagen_encontrada', "templates/usuario/images/images_profile/default.png");?>
					<?php }?>
					<div class="card-body">
						<div class="row mx-auto">
							<div id="preview" class="mx-auto">
								<img style="width: 100%; height:150px; text-aling:center;" src="<?php echo $_smarty_tpl->tpl_vars['imagen_encontrada']->value;?>
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
			<div class="col-sm-12" >
				<div style="text-align:center;">
					<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" >Actualizar</button>
				</div>
			</div>
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

								<label>Usuario:</label>
								<input type="text" name="usuario" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['persona_array']->value['usuario'];?>
">
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
						<div class="row">
							<div class="col-sm-6">
								<label>Departamento:</label>
								<select class="form-control" name="departamento_usuario">
									<option value="<?php echo $_smarty_tpl->tpl_vars['persona_array']->value['departamento'];?>
"><?php echo $_smarty_tpl->tpl_vars['persona_array']->value['departamento'];?>
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
							<div class="col-sm-6">
								<label>Cargo:</label>
								<select class="form-control" name="cargo_usuario">
								<option value="<?php echo $_smarty_tpl->tpl_vars['persona_array']->value['cargo'];?>
"><?php echo $_smarty_tpl->tpl_vars['persona_array']->value['cargo'];?>
</option>
								<option value="Administrativo">Administrativo</option>
								<option value="Comercial">Comercial</option>
								<option value="Documentador">Documentador</option>
								<option value="Gerente general">Gerente general</option>
								<option value="Ingeniero">Ingeniero</option>
								<option value="T.I.">T.I.</option>
								</select>
							</div>
						</div>

						<?php if ($_smarty_tpl->tpl_vars['persona_array']->value['estado'] == "Activo") {?>
						<?php $_smarty_tpl->_assignInScope('checked1', "checked");?>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['persona_array']->value['estado'] == "Desvinculado") {?>
						<?php $_smarty_tpl->_assignInScope('checked2', "checked");?>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['persona_array']->value['estado'] == "Con licencia") {?>
						<?php $_smarty_tpl->_assignInScope('checked3', "checked");?>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['persona_array']->value['estado'] == "Vacaciones") {?>
						<?php $_smarty_tpl->_assignInScope('checked4', "checked");?>
						<?php }?>


						<div class="row">
							<div class="col-sm-12">
								<div class="position-relative form-group"><label>Estado:</label></div>
							</div>
							<div class="col-sm-3" style="text-align:center;">
								<div class="custom-radio custom-control">
									<input type="radio" id="exampleCustomRadio1" name="estado_usuario" class="custom-control-input" value="Activo" <?php echo $_smarty_tpl->tpl_vars['checked1']->value;?>
>
									<label class="custom-control-label" for="exampleCustomRadio1">Activo</label>
								</div>
							</div>
							<div class="col-sm-3" style="text-align:center;">					
								<div class="custom-radio custom-control">
									<input type="radio" id="exampleCustomRadio2" name="estado_usuario" class="custom-control-input" value="Desvinculado" <?php echo $_smarty_tpl->tpl_vars['checked2']->value;?>
>
									<label class="custom-control-label" for="exampleCustomRadio2">Desvinculado</label>	
								</div>
							</div>
							<div class="col-sm-3" style="text-align:center;">					
								<div class="custom-radio custom-control">
									<input type="radio" id="exampleCustomRadio3" name="estado_usuario" class="custom-control-input" value="Con licencia" <?php echo $_smarty_tpl->tpl_vars['checked3']->value;?>
>
									<label class="custom-control-label" for="exampleCustomRadio3">Con licencia</label>	
								</div>
							</div>
							<div class="col-sm-3" style="text-align:center;">					
								<div class="custom-radio custom-control">
									<input type="radio" id="exampleCustomRadio4" name="estado_usuario" class="custom-control-input" value="Vacaciones" <?php echo $_smarty_tpl->tpl_vars['checked4']->value;?>
>
									<label class="custom-control-label" for="exampleCustomRadio4">Vacaciones</label>	
								</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>	







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
>	<?php }
}
