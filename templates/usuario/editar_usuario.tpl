<form method="post" id="formulario_actualizacion_usuario" enctype="multipart/form-data">
	<input type="hidden" name="id_usuario" value="{$id_usuario}">
	<div class="app-main__inner">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
						<li class="breadcrumb-item"><a href="index.php?module={$modulo[1]}&page={$page[1]}">Usuarios</a></li>
						<li class="breadcrumb-item active">Editar Usuario</li>			  
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->

		<div class="card">
			<div class="card-header">
				{foreach from=$array_persona item=persona_array}
				<h5>Editar usuario {$persona_array.nombre} {$persona_array.apellido}</h5>
				{/foreach}
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-5">
				<div class="card">
					<div class="card-header">
						Imagen Usuario
					</div>
					{foreach from=$array_persona item=persona_array}
					{if isset($persona_array.imagen_usuario)}
					{$imagen_encontrada = "templates/usuario/{$persona_array.imagen_usuario}"}
					{else}
					{$imagen_encontrada = "templates/usuario/images/images_profile/default.png"}
					{/if}
					<div class="card-body">
						<br>

						<div class="row mx-auto">
							<div id="preview" class="mx-auto">
								<img style="width: 100%; height:150px; text-aling:center;" src="{$imagen_encontrada}" alt="" class="d-block ui-w-30 rounded-circle"  value="{$imagen_encontrada}">
							</div>
							<input type="file" name="profile_image" id="file" class="form-control" >
						</div>
					</div>
				</div>
				<br>
				{/foreach}

			</div>
			<div class="col-sm-7">
				<div class="card">
					<div class="card-header">
						Datos Usuario
					</div>
					<div class="card-body">
						{$alerta}
						<div class="row">
							<div class="col-sm-6">
								{$alerta_1}
								<label>Usuario:</label>
								<input type="text" name="usuario" class="form-control" value="{$persona_array.usuario}" readonly>

							</div>
							<div class="col-sm-6">
								<label>Empresa:</label>
								<select class="form-control" name="empresa_usuario">
									{foreach from=$nombre_empresa item=extraer} 	
									<option value="{$extraer.id_empresa}">{$extraer.nombre}</option>
									{/foreach}
									{foreach from=$array_empresa item=empresas}
									<option value="{$empresas.id_empresa}">{$empresas.nombre}</option>
									{/foreach}
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label>Nombres:</label>
								<input type="text" name="nombre_usuario" class="form-control" value="{$persona_array.nombre}">
							</div>
							<div class="col-sm-6">
								<label>Apellidos:</label>
								<input type="text" name="apellido_usuario" class="form-control" value="{$persona_array.apellido}">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label># identificación:</label>
								<input type="text" name="identificacion_usuario" class="form-control" value="{$persona_array.numero_identificacion}">
							</div>
							<div class="col-sm-6">
								<label>Pais:</label>
								<select class="form-control" name="pais_usuario">
									<option value="{$persona_array.pais}">{$persona_array.pais}</option>
									{foreach from=$paises item=pais_actual}
									<option value="{$pais_actual}">{$pais_actual}</option>
									{/foreach}
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label>Email:</label>
								<input type="text" name="email_usuario" class="form-control" value="{$persona_array.email}">
							</div>
							<div class="col-sm-6">
								<label>Telefono:</label>
								<input type="text" name="telefono_usuario" class="form-control" value="{$persona_array.telefono}">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label>Departamento:</label>
								<select class="form-control" name="departamento_usuario">
									<option value="{$persona_array.departamento}">{$persona_array.departamento}</option>
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
									<option value="{$persona_array.cargo}">{$persona_array.cargo}</option>
									<option value="Administrativo">Administrativo</option>
									<option value="Comercial">Comercial</option>
									<option value="Documentador">Documentador</option>
									<option value="Gerente general">Gerente general</option>
									<option value="Ingeniero">Ingeniero</option>
									<option value="T.I.">T.I.</option>
								</select>
							</div>
						</div>

						{if $persona_array.estado == "Activo"}
						{$checked1="checked"}

						{elseif $persona_array.estado == "Desvinculado"}
						{$checked2="checked"}

						{elseif $persona_array.estado == "Con licencia"}
						{$checked3="checked"}

						{else}
						{$checked4 = "checked"}
						{/if}
						<br>

						<div class="row">
							<div class="col-sm-6">
								<div class="position-relative form-group"><label>Estado:</label></div>
								<select class="form-control" name="estado_usuario">
									<option value="{$persona_array.estado}">{$persona_array.estado}</option>
									<option value="Activo">Activo</option>
									<option value="Desvinculado">Desvinculado</option>
									<option value="Con licencia">Con licencia</option>
									<option value="Vacaciones">Vacaciones</option>
								</select>
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
	<div class="row">
		<div class="col-sm-12" >
			<div style="text-align:center;">
				<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" >Actualizar</button>
			</div>
		</div>
	</div>

</form>	
<script>
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
</script>
<script src="design/js/usuario.js"></script>	