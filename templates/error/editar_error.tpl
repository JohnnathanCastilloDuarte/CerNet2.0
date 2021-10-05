<div class="container-fluid">
	<div class="row mb-2">
	 <div class="col-sm-6">
	 </div>
	 <div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
				<li class="breadcrumb-item"><a href="index.php?module={$modulo.control}&page={$page[1]}">Gestionar errores</a></li>
				<li class="breadcrumb-item active">Editar error</li>			  
			</ol>
		</div>
	</div>
</div><!-- /.container-fluid -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h5>
					Editar Error
				</h5>
			</div>
			<div class="card-body">
				{foreach from=$array_error item=error}
				<div class="row">
					<div class="col-sm-6">
						<label>Concepto:</label>
						<input type="hidden" value="{$error.id_error}" id="id_error_editar">
						<input type="text" id="concepto_editar" class="form-control" value="{$error.concepto}">
					</div>
					<div class="col-sm-6">
						<label>Modulo:</label>
						<select id="modulo_editar" class="form-control">
							<option value="{$error.id_modulo}">{$error.modulo}</option>
							{foreach from=$array_modulo  item=modulo}
								<option value="{$modulo.id_item}">{$modulo.nombre}</option>
							{/foreach}
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label>Solución:</label>
						<textarea class="form-control" id="solucion_editar" value="{$error.solucion}">{$error.solucion}</textarea>
					</div>
				</div>
				{/foreach}
				<br>
				<div class="row">
					<div class="col-sm-5"></div>
					<div class="col-sm-6">
						<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_error">Actualizar</button>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>