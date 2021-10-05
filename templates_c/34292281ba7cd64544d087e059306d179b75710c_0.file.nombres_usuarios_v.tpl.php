<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-13 07:53:50
  from '/home/god/public_html/Pruebas_Desarrollo/templates/usuario/nombres_usuarios_v.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ffea70e45a785_60635433',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34292281ba7cd64544d087e059306d179b75710c' => 
    array (
      0 => '/home/god/public_html/Pruebas_Desarrollo/templates/usuario/nombres_usuarios_v.tpl',
      1 => 1610524215,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ffea70e45a785_60635433 (Smarty_Internal_Template $_smarty_tpl) {
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

			<h5>Editar usuario </h5>
		
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-5">
			<div class="card">
				<div class="card-header">
					Imagen Usuario
				</div>
					<div class="card-body">
						<div class="row mx-auto">
							<div id="preview" class="mx-auto">
								<img style="width: 100%; height:150px; text-aling:center;" src="templates/usuario/images/images_profile/default.png" alt="" class="d-block ui-w-30 rounded-circle"  >
							</div>
							<input type="file" name="profile_image" id="file" class="form-control" >
						</div>
					</div>
			</div>
			<br>
			
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
								<input type="text" name="usuario" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['mi_usuario']->value;?>
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
								<input type="text" name="nombre_usuario" class="form-control">
							</div>
							<div class="col-sm-6">
								<label>Apellidos:</label>
								<input type="text" name="apellido_usuario" class="form-control" >
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label># identificación:</label>
								<input type="text" name="identificacion_usuario" class="form-control">
							</div>
							<div class="col-sm-6">
								<label>Pais:</label>
								<select class="form-control" name="pais_usuario">
								<option value="0">Seleccione...</option>
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
								<input type="text" name="email_usuario" class="form-control">
							</div>
							<div class="col-sm-6">
								<label>Telefono:</label>
								<input type="text" name="telefono_usuario" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label>Departamento:</label>
								<select class="form-control" name="departamento_usuario">
									<option value="0">Seleccione</option>
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
								<option value="0">Seleccione</option>
								<option value="Administrativo">Administrativo</option>
								<option value="Comercial">Comercial</option>
								<option value="Documentador">Documentador</option>
								<option value="Gerente general">Gerente general</option>
								<option value="Ingeniero">Ingeniero</option>
								<option value="T.I.">T.I.</option>
								</select>
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
