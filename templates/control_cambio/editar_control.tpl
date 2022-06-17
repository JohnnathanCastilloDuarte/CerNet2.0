<input type="hidden" id="id" value="{$id}">
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="index.php?module={$modulo.control}&page={$page[1]}">Gestionar controles de cambio</a></li>
              <li class="breadcrumb-item active">Editar control de cambio</li>			  
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h5>
					Modificar control
				</h5>
			</div>
			<div class="card-body">
				{foreach from=$controls  item=control}
				<div class="row">
					<div class="col-sm-6">
							<label>Fecha registro:</label>
							<input type="text" id="fecha_registro" class="form-control" value="{$control.fecha_registro}" style="width:50%;" readonly>	
					</div>
					<div class="col-sm-6">
							<label>Fecha modificación:</label>
							<input type="text" id="fecha_registro" class="form-control" value="{$fecha_modificacion}" style="width:50%;" readonly>	
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6">
							<label>Fecha cambio:</label>
							<input type="date" id="fecha_cambio" class="form-control" value="{$control.fecha_cambio}" style="width:50%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label>Modulo:</label>
							<select id="modulo" class="form-control" style="width:50%;">
								<option value="{$control.id_modulo}">{$control.modulo}</option>
								{foreach from=$array_modulo item=modulo}
								<option value="{$modulo.id_modulo}">{$modulo.nombre}</option>
								{/foreach}
							</select>	
					</div>
					<div class="col-sm-6">
						<label>Tipo de cambio:</label>
						<select id="tipo_cambio" class="form-control" style="width:50%;">
								<option value="{$control.tipo_cambio}">{$control.tipo_cambio}</option>
								{foreach from=$tipo_cambio  item=cambio}
								<option value="{$cambio}">{$cambio}</option>	
								{/foreach}
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label>Ruta del archivo</label>
						<input type="text" id="archivo" value="{$control.archivo}" class="form-control" style="width:50%;">
					</div>
					<div class="col-sm-6">
						<label>Descripción:</label>
						<textarea  class="form-control" id="desc_control">{$control.descripcion}</textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label>Tiempo:</label>
						<input type="text" id="tiempo" value="{$control.tiempo}" class="form-control" style="width:50%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-5"></div>
					<div class="col-sm-6">
						<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_control">Actualizar</button>
					</div>
				</div>
				{/foreach}
			</div>	
		</div>
	</div>
</div>		