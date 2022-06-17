<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#cambio">
		<span>Lista cambios</span>
		</a>
	</li>
	<li class="nav-item">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#error">
		<span>Lista de errores</span>
		</a>
	</li>
</ul>

<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="cambio" role="tabpanel">
		<div class="card">
			<div class="card-header">
				Cambios
			</div>
			<div class="card-body">
				<div class="table-responsive">
        	<table class="mb-0 table" id="example">
						<thead>
							<th>Fecha registro</th>
							<th>Fecha fin</th>
							<th>Fecha modificación</th>
							<th>Modulo</th>
							<th>Archivo</th>
							<th>Descripción</th>
							<th>Tipo cambio</th>
							<th>Tiempo</th>
							<th>Usuario</th>
							<th>Acciones</th>
						</thead>
						<tbody id="gestionar_control">
							{foreach from=$array_control item=control}
							<tr>
								<td>{$control.fecha_registro}</td>
								<td>{$control.fecha_cambio}</td>
								<td>{$control.fecha_modificacion}</td>
								<td>{$control.modulo}</td>
								<td>{$control.archivo}</td>
								<td>{$control.descripcion}</td>
								<td>{$control.tipo_cambio}</td>
								<td>{$control.tiempo}(Minutos)</td>
								<td>{$control.usuario}</td>
								<td>
									<div class="col-sm-12" style="text-align: center;">
										<a id="btn_editar_item" href="index.php?module={$modulo[2].ControldeCambios}&page={$page[2]}&control={$control.id_controlcambio}" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info">
										<i class="lnr-pencil btn-icon-wrapper"></i></a>
									</div>	
								</td>
							</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
			</div>	
		</div>
	</div>	

	<div class="tab-pane tabs-animation fade show" id="error" role="tabpanel">
		<div class="card">
			<div class="card-header">
				Listado de errores
			</div>
			<div class="card-body">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<th>#Codigo</th>
						<th>Concepto</th>
						<th>Modulo</th>
						<th>Solución</th>
						<th>Acciones</th>
					</thead>
					<tbody>
						{foreach from=$array_errores  item=error}
							<tr>
								<td>{$error.id_error}</td>
								<td>{$error.concepto}</td>
								<td>{$error.modulo}</td>
								<td>{$error.solucion}</td>
								<td>
									<div class="col-sm-12" style="text-align: center;">
										<a id="btn_editar_item" href="index.php?module={$modulo.control}&page={$page[2]}&error={$error.id_error}" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info">
										<i class="lnr-pencil btn-icon-wrapper"></i></a>
									</div>	
								</td>
							</tr>	
						{/foreach}
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>