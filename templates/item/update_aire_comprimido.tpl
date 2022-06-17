<div class="row">
	<div class="col-sm-12">

		<div class="card">
	{foreach from=$array_item_aire item=aire_comprimido}		
			<div class="card-header">
				{if $aire_comprimido.id_aire_comprimido == ''}
				<h5>Crear item Aire comprimido</h5>
				{else}
				<h5>Editar item Aire comprimido</h5>
				{/if}
			</div>
			<div class="card-body">
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
		{/foreach}		
				<div class="row">
					<div class="col-sm-12" style="text-align: center;">
						<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_item_aire_comprimido" style="text-align: center;">Nuevo</button>
						 <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_aire_comprimido">Actualizar</button>
					</div>	
				</div>
			  <div id="asignar_aires">
			  	<hr>
				<div class="col-sm-12 card">
					<div class="card-header">
					 	<a data-toggle="collapse" data-target="#collapseOne11"  aria-controls="collapseOne11">
            				Asignar items
           			    </a>
					</div>
					  <div class="card-body collapse collapse show" id="collapseOne11" >
							<input type="hidden" name="" id="id_item_aire_comprimido">
						<div class="row">
							<div class="col-sm-4">
								<label>Nombre sala</label>
								<input type="text" name="" id="nombre_sala" class="form-control" placeholder="nombre sala" value="">
							</div>
							<div class="col-sm-4">
								<label>Área</label>
								<input type="text" name="" id="area" class="form-control" placeholder="Área" value="">
							</div>
							<div class="col-sm-4">
								<label>Punto de uso de aire comprimido</label>
								<input type="text" name="" id="punto_aire_comprimido" class="form-control" placeholder="Punto de aire comprimido" value="">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">
								<label>Código de punto</label>
								<input type="text" name="" id="codigo_punto" class="form-control" placeholder="Código del punto" value="">
							</div>
							<div class="col-sm-6">
								<label>Grado ISO 8573-1</label>
								<input type="text" name="" id="grado_iso" class="form-control" placeholder="Grado de ISO 8573-1" value="">
							</div>
						</div>
						<br>
					<!-- 	<div class="row">
							<div class="col-sm-6">
								<label>Dirección equipo</label>
								<input type="text" name="" id="direccion_aire_comprimido" class="form-control" placeholder="Código del punto" value="">
							</div>
						</div> -->
						<br>
						<div class="row">
							<div class="col-sm-12" style="text-align: center;">
								<button class="btn btn-success" id="crear_aire">Crear</button>
								<button class="btn btn-info" id="editar_aire">Actualizar</button>
								<button class="btn btn-danger" id="cancelar_aire">Cancelar</button>
							</div>							
						</div>
					</div>
				</div><!-- Fin -->
				<br>
				<div class="col-sm-12 card">
					<div class="card-header">
					 	<a data-toggle="collapse" data-target="#collapseOne22"  aria-controls="collapseOne22">
            				Listado de items
           			    </a>
					</div>
					  <div class="card-body collapse collapse " id="collapseOne22" >
					  		<table class="table" id="tabla_items">
					  			
					  		</table>
						</div>	
						
					</div>
				</div><!-- Fin -->
			  </div>	


			</div>
		</div>
	
	</div>
</div>

<script type="text/javascript" src="design/js/update_aire_comprimido.js"></script>