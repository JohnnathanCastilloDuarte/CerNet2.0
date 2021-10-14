<div class="app-main__inner">
	<div class="card">
			<div class="card-header">
				<h5>
				 		Gestionar Empresas
				</h5>
			</div>
	</div>
	<br>
	<div class="card">
		<div class="card-body">
			<div class="col-sm-12">
				<table class="table table-striped table-bordered" id="example">
					<thead>
						<th>N° Tributario</th>
						<th>Nombre</th>
						<th>Direccion</th>
						<th>Sede</th>
						<th>Accion a realizar</th>
					</thead>
					<tbody>
						{foreach from=$array_empresas item=empresa}
							<tr>
								<input type="hidden"  id="nombre" value="{$empresa.nombre}">
								<td>{$empresa.numero_tributario}</td>
								<td>{$empresa.nombre}</td>
								<td>{$empresa.direccion}</td>
								<td>{$empresa.tipo_sede}</td>
								<td>
									<div class="col-sm-12" style="text-align: center;">
									<a id="btn_editar_cliente" href="index.php?module={$modulo[3].Clientes}&page={$page[2]}&empresa={$empresa.id_empresa}" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info">
										<i class="lnr-pencil btn-icon-wrapper"></i>
									<a id="btn_eliminar_cliente" data-nombre="{$empresa.nombre}" data-id="{$empresa.id_empresa}" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger">
										<i class="lnr-cross btn-icon-wrapper"></i></a>	
									</a>
									</div>
								</td>
							</tr>
						{/foreach}
					</tbody>
				</table>
			</div>
		</div>
	</div>	
</div><!--Cierre del app-main__inner-->
