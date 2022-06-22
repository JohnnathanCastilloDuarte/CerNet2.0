<div class="app-main__inner">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="index.php?module={$modulo.item}&page={$page[0]}">Items</a></li>
              <li class="breadcrumb-item active">Editar item</li>			  
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			{foreach from=$array_item item=items}
			<div class="card-header">
				<h5>
					<strong>Editar:</strong> Bodega {$items.nombre} 
				</h5>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text btn btn-primary">Nombre:</span>
							</div>
							<input type="text" class="form-control" id="nombre_item_cliente" value="{$items.nombre}">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text btn btn-primary">Estado:</span>
							</div>
							{$msj = ""}
							{$msj = ""}
							{$valor = ""}
							{$valor = ""}
							{if $items.estado == 0}
							{$msj = "Activo"}
							{$msj2 = "Inactivo"}
							{$valor = 1}
							{$valor = 0}
							{else}
							{$msj = "Inactivo"}
							{$msj = "Activo"}
							{$valor = 0}
							{$valor = 1}
							{/if}
							<select class="form-control">
								<option value="{$valor}">{$msj}</option>
								<option value="{$valor2}">{$msj2}</option>
							</select>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12">
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text btn btn-primary">Descripción:</span>
							</div>
							<textarea class="form-control" rows="1">{$items.descripcion}</textarea>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-5"></div>
					<div class="col-sm-7">
						<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" >Actualizar</button>
					</div>
				</div>
			</div>
			{/foreach}
		</div>
	</div>
</div>