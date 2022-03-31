<div class="row">
	<div class="col-sm-12">

	{foreach from=$array_aire_comprimido item=aire_comprimido}
		<div class="card">
			<div class="card-header">
				{if $aire_comprimido.id_aire_comprimido == ''}
				<h5>Crear item Aire comprimido</h5>
				{else}
				<h5>Editar item Aire comprimido</h5>
				{/if}
			</div>
			<div class="card-body">
				<input type="hidden" name="" id="id_aire_comprimido" value="{$aire_comprimido.id_aire_comprimido}">
				<input type="hidden" name="" id="id_item" value="{$aire_comprimido.id_item}">
				<div class="row">
					<div class="col-sm-6">
						<label>Nombre item aire comprimido</label>
						<input type="text" name="" class="form-control" placeholder="nombre del item" id="nombre_aire_comprimido" value="{$aire_comprimido.nombre_item}">
					</div>
					<div class="col-sm-6">
						<div class="position-relative form-group">
		                    <label>Empresa:</label>
		                    <input type="hidden" id="id_empresa" value="{$aire_comprimido.id_empresa}">
		                    <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="{$aire_comprimido.nombre_empresa}">
		                    <div >
		                      
		                      <table class="table" id="aqui_resultados_empresa">
		                         
		                      </table>
		                    </div>
                  		</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label>Nombre sala</label>
						<input type="text" name="" id="nombre_sala" class="form-control" placeholder="nombre sala" value="{$aire_comprimido.nombre_sala}">
					</div>
					<div class="col-sm-4">
						<label>Área</label>
						<input type="text" name="" id="area" class="form-control" placeholder="Área" value="{$aire_comprimido.area}">
					</div>
					<div class="col-sm-4">
						<label>Punto de uso de aire comprimido</label>
						<input type="text" name="" id="punto_aire_comprimido" class="form-control" placeholder="Punto de aire comprimido" value="{$aire_comprimido.punto_uso_aire_comprimido}">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6">
						<label>Código de punto</label>
						<input type="text" name="" id="codigo_punto" class="form-control" placeholder="Código del punto" value="{$aire_comprimido.codigo_punto}">
					</div>
					<div class="col-sm-6">
						<label>Grado ISO 8573-1</label>
						<input type="text" name="" id="grado_iso" class="form-control" placeholder="Grado de ISO 8573-1" value="{$aire_comprimido.grado_iso}">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6">
						<label>Dirección equipo</label>
						<input type="text" name="" id="direccion_aire_comprimido" class="form-control" placeholder="Código del punto" value="{$aire_comprimido.direccion}">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12" style="text-align: center;">
						<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_item_aire_comprimido" style="text-align: center;">Nuevo</button>
						 <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_aire_comprimido">Actualizar</button>
					</div>	
				</div>
			</div>
		</div>
		 {/foreach}
	</div>
</div>

<script type="text/javascript" src="design/js/update_aire_comprimido.js"></script>