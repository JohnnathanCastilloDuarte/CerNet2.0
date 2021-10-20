<form method="post" id="form_creacion_cliente">
<div class="app-main__inner">
	<div class="card">
			<div class="card-header">
				<h5>
				 		Creación empresas
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
					<input type="text" name="registro_vtiger"  id = "registro_vtiger" class="form-control" placeholder="# Registro VTIGER" value="{$registro_vtiger}" required="">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-6">
					<label># Tributario:</label>
					<input type="text" name="n_tributario"  id="n_tributario" class="form-control" placeholder="Numero Tributario" value="{$n_tributario}" required="">
				</div>
				<div class="col-sm-6">
					<label>Razon social:</label>
					<input type="text" name="razon_social"  id="razon_social" class="form-control" placeholder="Razón Social" value="{$razon_social}" required="">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-6">
					<label>Dirección</label>
					<input type="text" name="direccion_empresa" id="direccion_empresa" class="form-control" placeholder="Dirección" value="{$direccion_empresa}" required="">
				</div>
				<div class="col-sm-3">
					<label>País</label>
					<select name="pais_empresa"  id="pais_empresa" class="form-control">
						<option value="">Seleccione...</option>
						{foreach from=$paises item=pais}
						<option value="{$pais}">{$pais}</option>
						{/foreach}
					</select>
				</div>
				<div class="col-sm-3">
					<label>Ciudad:</label>
					<input type="text" name="ciudad_empresa" id="ciudad_empresa"  class="form-control" placeholder="Ciudad" value="{$ciudad_empresa}">	
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-3">
					<label>Sigla pais</label>
					<input type="text" name="sigla_pais"  id="sigla_pais" placeholder="Sigla país" class="form-control" value="{$sigla_pais}">
				</div>
				<div class="col-sm-3">
					<label>Sigla Empresa</label>
					<input type="text" name="sigla_empresa"  id="sigla_empresa" class="form-control" placeholder="Sigla Empresa" value="{$sigla_empresa}" required="">
				</div>
				<div class="col-sm-3">
					<label>Tipo de sede:</label>
					<input type="text" name="tipo_sede"  id="tipo_sede" class="form-control" placeholder="Tipo de sede" value="{$tipo_sede}" required="">
				</div>
				<div class="col-sm-3">
					<label>Giro empresa:</label>
					<input type="text" name="giro_empresa" id="giro_empresa" class="form-control" placeholder="Giro" value="{$giro_empresa}" required="">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-5"></div>
				<div class="col-sm-4"><button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nuevo_cliente">Aceptar</button></div>

			</div>
				
		</div>	
	</div>
</div>
</form>
<!--CARGA DE SCRIPT PARA CLIENTE--->

<script type="text/javascript" src="design/js/empresa_cliente.js"></script>