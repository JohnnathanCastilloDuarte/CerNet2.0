<div class="app-main__inner">
	<div class="card">
			<div class="card-header">
				<h5>
					Gestionar usuarios
				</h5>
			</div>
			<div class="card-body">
			<div class="col-sm-12">
				<table class="table table-striped table-bordered" id="example">
					<thead>
					
							<th data-field="usuario" data-field="stargazers_count" data-sortable="true">
								Usuario
							</th>
							<th data-field="nombres" data-field="stargazers_count" data-sortable="true">
								Nombres
							</th>
							<th data-field="apellidos" data-field="stargazers_count" data-sortable="true">
								Apellidos
							</th>
							<th data-field="cargo" data-field="stargazers_count" data-sortable="true">
								Cargo
							</th>
							<th data-field="estado" data-field="stargazers_count" data-sortable="true">
								Estado
							</th>
							<th data-field="Editar">
								Acción a realizar
							</th>
					
					</thead>
					<tbody>
					{foreach from=$array_buscando item=table_usuario}
					{if file_exists($table_usuario.imagen_usuario)}
						{$imagen_encontrada = $table_usuario.imagen_usuario }
					{else}
						{$imagen_encontrada = "templates/usuario/images/images_profile/default.png"}
					{/if}
						<tr>
							<td>
								<div class="row">
									<div class="col-sm-3"><img style="width: 40px; height: auto;" src="{$imagen_encontrada}" alt="" class="d-block ui-w-30 rounded-circle"></div>
									<div class="col-sm-9">{$table_usuario.usuario}</div>
								</div>
							</td>
							<td id="nombre_usuario" data-nombre="{$table_usuario.nombre}">{$table_usuario.nombre}</td>
							<td>{$table_usuario.apellido}</td>
							<td>{$table_usuario.cargo}</td>
							<td>{$table_usuario.estado}</td>
							<td>
								<div class="col-sm-12" style="text-align: center;padding: 0;">
									<a id="btn_editar_usuario" href="index.php?module={$modulo[1]}&page={$page[2]}&user={$table_usuario.id_usuario}" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info" ><i class="lnr-pencil btn-icon-wrapper"></i></a>
									<!--<a id="btn_restablecer_usuario"  data-id="{$table_usuario.id_usuario}" data-email="{$table_usuario.email}"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-warning"><i class="pe-7s-lock btn-icon-wrapper"></i></a>
									<a data-id="{$table_usuario.id_usuario}" id="btn_eliminar_usuario"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger"><i class="lnr-cross btn-icon-wrapper"></i></a>-->
								</div>
							</td>
						</tr>
					{/foreach}	
					</tbody>
				</table>
				</div>
			</div>
	</div><!--Cierre del div card-->		
</div><!--Cierre del div principal , contenedor de la sección-->





