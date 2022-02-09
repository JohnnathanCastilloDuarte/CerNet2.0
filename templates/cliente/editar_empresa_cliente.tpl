<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#empresa">
		<span>Información empresa</span>
		</a>
	</li>
</ul>

<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="empresa" role="tabpanel">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					{foreach from=$empresa_array item=empresa}
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<label># Tributario:</label>
								<input type="hidden" value="{$empresa.id_empresa}" id="id_empresa">
								<input type="text" id="n_tributario" class="form-control" placeholder="Numero Tributario" value="{$empresa.numero_tributario}">
							</div>
							<div class="col-sm-6">
								<label>Razon social:</label>
								<input type="text" id="razon_social" class="form-control" placeholder="Razón Social" value="{$empresa.nombre}">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">
								<label>Dirección</label>
								<input type="text" id="direccion_empresa" class="form-control" placeholder="Dirección" value="{$empresa.direccion}">
							</div>
							<div class="col-sm-3">
								<label>País</label>
								<select id="pais_empresa" class="form-control">
									<option value="{$empresa.pais}">{$empresa.pais}</option>
									{foreach from=$paises item=pais}
									<option value="{$pais}">{$pais}</option>
									{/foreach}
								</select>
							</div>
							<div class="col-sm-3">
								<label>Ciudad:</label>
								<input type="text" id="ciudad_empresa" class="form-control" placeholder="Ciudad" value="{$empresa.ciudad}">	
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label>Sigla pais</label>
								<input type="text" id="sigla_pais" placeholder="Sigla país" class="form-control" value="{$empresa.sigla_pais}">
							</div>
							<div class="col-sm-3">
								<label>Sigla Empresa</label>
								<input type="text" id="sigla_empresa" class="form-control" placeholder="Sigla Empresa" value="{$empresa.sigla_empresa}">
							</div>
							<div class="col-sm-3">
								<label>Tipo de sede:</label>
								<input type="text" id="tipo_sede" class="form-control" placeholder="Tipo de sede" value="{$empresa.tipo_sede}">
							</div>
							<div class="col-sm-3">
								<label>Giro empresa:</label>
								<input type="text" id="giro_empresa" class="form-control" placeholder="Giro" value="{$empresa.giro}">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-5"></div>
							<div class="col-sm-4"><button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_empresa_cliente">Actualizar</button></div>
						</div>
                <hr>
      <label>Logo:</label>
					</div>
					{/foreach}
				</div>
			</div>
		</div>
	</div>	
	

	<div class="tab-pane tabs-animation fade show" id="historico" role="tabpanel">
		<h2>
			Registro historico
		</h2>
	</div>		
</div>	
	