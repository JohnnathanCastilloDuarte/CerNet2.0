<div class="app-main__inner">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<h5>
					Creación de Item
				</h5>	
			</div>
			<div class="card-body" id="listado_tipo_item">
				<div class="row">						
				{foreach from = $array_tipo item=tipo_item}	
				<div class="col-sm-6 col-xl-4">
					<div class="widget-chart widget-chart-hover">
						<div class="icon-wrapper rounded-circle">
							<div class="icon-wrapper-bg bg-primary"></div>
							<i class="pe-7s-tools text-primary"></i></div>
						<div class="widget-numbers"><h5 class="text-primary">{$tipo_item.nombre}</h5></div>
						<div class="widget-subheading"><button class="mb-2 mr-2 btn-shadow btn-outline-2x btn btn-outline-info" id="btn_abrir_item" data-id="{$tipo_item.id_tipo}">Crear</button></div>
						<div class="widget-description text-primary">
							
						</div>
					</div>
				</div>	
				{/foreach}							
				</div>									
			</div>
		</div>	
	</div>		


	<script type="text/javascript" src="design/js/Item.js"></script>		