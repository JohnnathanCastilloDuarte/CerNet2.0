<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="app-main__inner">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<h5>
					Gestionar Items
				</h5>
			</div>
			<div class="card-body">
				<table class="table table-striped table-bordered" id="example" style="width: 100%;">
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
									<a id="btn_editar_item" href="index.php?module={$modulo[7]}&page={$page[2]}&item={$gestionar.id_item}&type={$gestionar.id_tipo}&pdf=0" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info btn-sm"><i class="lnr-pencil btn-icon-wrapper"></i></a>
									<a data-id="{$gestionar.id_item}" data-tipoitem="{$gestionar.id_tipo}" id="btn_eliminar_item" data-nombre="{$gestionar.nombre_item}"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger btn-sm" ><i class="lnr-cross btn-icon-wrapper"></i></a>
									<br> 
									<a target="_blank" id="btn_genear_pdf_item" href="index.php?module={$modulo[7]}&page={$page[2]}&item={$gestionar.id_item}&type={$gestionar.id_tipo}&pdf=1" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-warning btn-sm"><i class="fa fa-file-pdf-o" style="font-size:20.5px; color:red;"></i></a>

									<!--<button id="enviar_correo_pdf" data-id="{$gestionar.id_item}" data-tipo="{$gestionar.id_tipo}" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-success btn-sm"><i class="fa fa-envelope-o" style="font-size:20.5px; color:green;"></i></button>-->

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