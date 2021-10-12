<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#privilegio">
		<span>Privilegio</span>
		</a>
	</li>
	<!--<li class="nav-item">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#rol">
		<span>Rol</span>
		</a>
	</li>-->
</ul>

<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="privilegio" role="tabpanel">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-11">
							<div id="capa_nuevo">
								<label>Crear Privilegio:</label>
								<input type="text" name="nuevo_privilegio" class="form-control" id="nuevo_privilegio" placeholder="Ingrese el Privilegio" style="width:30%">
								<br>
								<button class="btn-shadow btn-outline-2x btn btn-outline-info" id="crear_privilegio">Aceptar</button>
								
							</div>
						</div>
						<div class="col-sm-1">
							<button class="btn btn-success" id="añadir" title="Nuevo privilegio"><i class="ion-android-add" ></i></button>
							<button class="btn btn-danger" id="ocultar"><i class="ion-android-close" title="Ocultar privilegio"></i></button>	
						</div>
					</div>
					<br>
					<div class="row" id="capa_rol">
						<div class="col-sm-9">
							<label>Seleccione privilegio:</label>
							<select class="form-control" id="selecte" style="width:30%">
								
								
							</select>	
							
						</div>	
						<div class="col-sm-3">
							<div id="btn_actualizar">
								<br>
								<br>
								<button class="btn-shadow btn-outline-2x btn btn-outline-danger" id="eliminar_privilegio">Eliminar</button>
							</div>
						</div>
					</div>	
					
					<br>
        
					<table  class="table table-striped table-bordered" style="text-align:center;">
						<thead >
							<th>Modulo</th>
							<th>Acciones</th>
						</thead>
						<tbody id="container">
											
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>		
</div>


<div class="tab-pane tabs-animation fade show" id="rol" role="tabpanel">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-11">
							<div id="capa_nuevo_rol">
								<label>Crear Rol:</label>
								<input type="text" name="nuevo_rol" class="form-control" id="nuevo_rol" placeholder="Ingrese el Rol" style="width:30%">
								<br>
								<button class="btn-shadow btn-outline-2x btn btn-outline-info" id="crear_rol">Aceptar</button>
								
							</div>
						</div>
						<div class="col-sm-1">
							<button class="btn btn-success" id="añadir_rol" title="Nuevo Rol"><i class="ion-android-add" ></i></button>
							<button class="btn btn-danger" id="ocultar_rol"><i class="ion-android-close" title="Ocultar Rol"></i></button>	
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-9">
							<label>Seleccione Rol:</label>
							<select class="form-control" id="selecte_rol" style="width:30%">
								<option>Seleccione...</option>
								{foreach from=$rol_encontrados item=rol}
								<option value="{$rol.rol}" >{$rol.rol}</option>
								
								{/foreach}
							</select>	
							<br>
							<input type="text" id="nombre_rol" class="form-control" style="width:30%">
						</div>	
						<div class="col-sm-3">
							<div id="btn_actualizar_rol">
								<br>
								<br>
								<button class="btn-shadow btn-outline-2x btn btn-outline-info" id="actualizar_rol">Actualizar</button>
								<button class="btn-shadow btn-outline-2x btn btn-outline-danger" id="eliminar_rol">Eliminar</button>
							</div>
						</div>
					</div>	
					
					<br>
          
          
          <!--
					<table  class="table table-striped table-bordered" >
						<thead >
							<th>Modulo</th>
							<th>Acciones</th>
						</thead>
						<tbody id="container_rol">
											
						</tbody>
					</table>-->
				</div>
			</div>
		</div>
	</div>		
</div>
</div>
<script type="text/javascript" src="design/js/privilegio.js"></script>