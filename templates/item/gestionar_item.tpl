<div class="app-main__inner">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<h5>
					Gestionar Items
				</h5>
			</div>
			<div class="card-body">
				<table class="table table-striped table-bordered" id="example">
					<thead>
						<th>ID</th>
						<th>Tipo</th>
						<th>Nombre</th>
						<th>Compañia</th>
						<th>Acciones</th>
					</thead>
			
					{foreach from=$array_gestionar item=gestionar}
					<tr>
						<td>{$gestionar.id_item}</td>
						<td>{$gestionar.nombre_tipo}</td>
						<td>{$gestionar.nombre_item}</td>
						<td>{$gestionar.nombre_empresa}</td>
						<td>
								<div class="col-sm-12" style="text-align: center;">
									<a id="btn_editar_item" href="index.php?module={$modulo[4].Item}&page={$page[2]}&item={$gestionar.id_item}&type={$gestionar.id_tipo}" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info"><i class="lnr-pencil btn-icon-wrapper"></i></a>
									<a data-id="{$gestionar.id_item}" id="btn_eliminar_item"  data-nombre="{$gestionar.nombre_item}"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger"><i class="lnr-cross btn-icon-wrapper"></i></a>
								</div>
							</td>
					</tr>	
					{/foreach}
				</table>
			</div>
		</div>
	</div>
</div>	

<script type="text/javascript" src="design/js/Item.js"></script>