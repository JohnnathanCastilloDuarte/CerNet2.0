<div class="app-main__inner">
	{foreach from=$empresa_array item=empresa}
<form method="post">
	<div class="card">
			<div class="card-header">
				<h5>
				 		Editar cliente : <strong>{$empresa.nombre}</strong> 
				</h5>
			</div>
	</div>
	<br>
	<div class="card">	
		<div class="card-body">
		{$alerta}
		<div class="row">
			<div class="col-sm-3">
				<label>Registro en VTIGER</label>
				<input type="text" name="registro_vtiger" class="form-control" placeholder="# Registro VTIGER" value="{$empresa.id_vtiger}">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6">
				<label># Tributario:</label>
				<input type="text" name="n_tributario" class="form-control" placeholder="Numero Tributario" value="{$empresa.numero_tributario}">
			</div>
			<div class="col-sm-6">
				<label>Razon social:</label>
				<input type="text" name="razon_social" class="form-control" placeholder="Razón Social" value="{$empresa.nombre}">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6">
				<label>Dirección</label>
				<input type="text" name="direccion_empresa" class="form-control" placeholder="Dirección" value="{$empresa.direccion}">
			</div>
			<div class="col-sm-3">
				<label>País</label>
				<select name="pais_empresa" class="form-control">
					<option value="{$empresa.pais}">{$empresa.pais}</option>
					{foreach from=$paises item=pais}
					<option value="{$pais}">{$pais}</option>
					{/foreach}
				</select>
			</div>
			<div class="col-sm-3">
				<label>Ciudad:</label>
				<input type="text" name="ciudad_empresa" class="form-control" placeholder="Ciudad" value="{$empresa.ciudad}">	
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-3">
				<label>Sigla pais</label>
				<input type="text" name="sigla_pais" placeholder="Sigla país" class="form-control" value="{$empresa.sigla_pais}">
			</div>
			<div class="col-sm-3">
				<label>Sigla Empresa</label>
				<input type="text" name="sigla_empresa" class="form-control" placeholder="Sigla Empresa" value="{$empresa.sigla_empresa}">
			</div>
			<div class="col-sm-3">
				<label>Tipo de sede:</label>
				<input type="text" name="tipo_sede" class="form-control" placeholder="Tipo de sede" value="{$empresa.tipo_sede}">
			</div>
			<div class="col-sm-3">
				<label>Giro empresa:</label>
				<input type="text" name="giro_empresa" class="form-control" placeholder="Giro" value="{$empresa.giro}">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-5"></div>
			<div class="col-sm-4"><button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" name="update">Actualizar</button></div>
		</div>
	</div>
	{/foreach}
</form>	
</div>
