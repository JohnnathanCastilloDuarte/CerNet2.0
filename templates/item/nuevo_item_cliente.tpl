<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#nuevo_item">
		<span>Crear nuevo item</span>
		</a>
	</li>
</ul>

<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="nuevo_item" role="tabpanel">
		<div class="row">
			<div class="col-sm-5">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-10">
								<input type="hidden" value="{$id_empresa}" id="empresa_item">
								<label>Tipo Item:</label>
								<select id="tipo_item" class="form-control">
									<option value="null">Seleccione...</option>
									{foreach from = $array_tipo item=tipo_item}
									<option value="{$tipo_item.id_tipo}">{$tipo_item.nombre}</option>
									{/foreach}
								</select>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-10">
								<lable>Nombre Item:</lable>
								<input type="text" id="nombre_item" class="form-control" placeholder="Ingrese el nombre del Item">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-10">
								<lable>Descripción Item:</lable>
								<textarea class="form-control" id="desc_item" placeholder="Describe el Item"></textarea>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-10">
								<label>Estado:</label>
								<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" id="defaultUnchecked"  name="estado" value="1">
										<label class="custom-control-label" for="defaultUnchecked">Activo</label>
								</div>
								<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" id="defaultUnchecked_1"  name="estado" value="0">
										<label class="custom-control-label" for="defaultUnchecked_1">Inactivo</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-5">
							</div>
							<div class="col-sm-5">
								<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nuevo_item">Aceptar</button>
							</div>
						</div>
					</div>	
				</div>
			</div>
			<div class="col-sm-7">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover table-striped table-bordered">
								<thead>
									<th>Nombre</th>
									<th>Tipo</th>
									<th>Descripción</th>
									<th>Fecha registro</th>
									<th>Acciones</th>
								</thead>	
								<tbody id="items_cliente">
								
								</tbody>
							</table>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	