<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">Creación de activo</div>
			<div class="card-body">
			  <div class="form-row">
				 	<div class="col-sm-6">
						<label>Tipo de activo:</label>
						<select class="form-control" id="selection_activo">
							<option value="sinseleccion">Selecciona...</option>
							<option value="Computador">Computador</option>
							<option value="Celular">Celular</option>
							<option value="Impresora">Impresora</option>
							<option value="Otro">Otro</option>
						</select>
				 	</div>
					<div class="col-sm-6" id="otro_tipo_div">
						<label>Otro tipo:</label>
						<input type="text" placeholder="Especifique que tipo de activo" id="otro_activo" class="form-control">
					</div>
				</div>
					
				<br>
				
				<div class="form-row" id="sin_seleccion">
					<div class="col-sm-12" style="text-align:center;">
						<span class="text-warning"><h5>Selecciona un tipo de activo</h5></span>
					</div>
				</div>
				
				<div id="formulario_computador">
					<div class="form-row">
						<div class="col-sm-6">
							<label>Ubicación del activo</label>
							<select class="form-control" id="ubicacion_computador">
								<option value="Colombia">Colombia</option>
								<option value="Chile">Chile</option>
							</select>
						</div>
						<div class="col-sm-6">
							<label>Marca:</label>
							<input type="text" id="marca_computador" class="form-control" placeholder="Ingresa la marca del computador">
						</div>
					</div>
					<br>
					<div class="form-row">
						<div class="col-sm-4">
							<label>Serial:</label>
							<input type="text" id="serial_computador" class="form-control" placeholder="Ingresa el serial del computador">
						</div>
						<div class="col-sm-4">
							<label>Modelo:</label>
							<input type="text" id="modelo_computador" class="form-control" placeholder="Ingrese el modelo del computador">
						</div>
						<div class="col-sm-4">
							<label>Sistema Operativo:</label>
							<input type="text" id="SO_computador" class="form-control" placeholder="Ingrese el sistema operativo">
						</div>
					</div>
					<br>
					
					<div class="form-row">
						<div class="col-sm-4">
							<label>Disco duro:</label>
							<input type="text" id="disco_duro_computador" class="form-control" placeholder="Ingresa el tamaño del disco duro">
						</div>
						<div class="col-sm-4">
							<label>Ram:</label>
							<input type="text" id="ram_computador" class="form-control" placeholder="Ingrese el tamaño de la RAM">
						</div>
						<div class="col-sm-4">
							<label>Procesado:</label>
							<input type="text" id="procesador_computador" class="form-control" placeholder="Ingrese la referencia del procesador">
						</div>
					</div>
					<br>
					<div class="form-row">
						<div class="col-sm-12">
							<label>Observaciones:</label>
							<textarea id="observaciones_computador" class="form-control" placeholder="Observaciones"></textarea>
						</div>
					</div>
				</div><!--Cierre del div formulario computador-->	
				<br>
				
				<div id="formulario_celular">
					<div class="form-row">
						<div class="col-sm-6">
							<label>Ubicación del activo</label>
							<select class="form-control" id="ubicacion_celular">
								<option value="Colombia">Colombia</option>
								<option value="Chile">Chile</option>
							</select>
						</div>
						<div class="col-sm-6">
							<label>Marca:</label>
							<input type="text" id="marca_celular" class="form-control" placeholder="Ingresa la marca del computador">
						</div>
					</div>
					<br>
					<div class="form-row">
						<div class="col-sm-4">
							<label>IMEI:</label>
							<input type="text" id="imei_celular" placeholder="Ingresa el codigo IMEI" class="form-control">
						</div>
						<div class="col-sm-4">
							<label>Serial</label>
							<input type="text" id="serial_celular" placeholder="Ingresa el serial del celular" class="form-control">
						</div>
						<div class="col-sm-4">
							<label>Numero de celular</label>
							<input type="text" id="numero_celular" placeholder="Ingresa el numero del celular" class="form-control">
						</div>
					</div>
					<br>
					<div class="form-row">
						<div class="col-sm-12">
							<label>Observaciones:</label>
							<textarea id="observaciones_celular" class="form-control" placeholder="Observaciones"></textarea>
						</div>
					</div>
				</div>
				<br>
				
				<div id="formulario_impresora">
					<div class="row">
						<div class="col-sm-6">
							<label>Ubicación del activo</label>
							<select class="form-control" id="ubicacion_computador">
								<option value="Colombia">Colombia</option>
								<option value="Chile">Chile</option>
							</select>
						</div>
						<div class="col-sm-6">
							<label>Marca:</label>
							<input type="text" id="marca_impresora" placeholder="Ingresa la marca de la impresora" class="form-control">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-3">
							<label>Serial:</label>
							<input type="text" id="serial_impresora" class="form-control" placeholder="Ingresa el serial de la impresora">
						</div>
						<div class="col-sm-3">
							<label>Modelo:</label>
							<input type="text" id="modelo_impresora" class="form-control" placeholder="Ingresa el modelo de la impresora">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<label>Observaciones:</label>
							<textarea id="observaciones_impresora" class="form-control"  placeholder="Observaciones"></textarea>
						</div>
					</div>
				</div>
				<br>
				
				<div class="form-row">
					<div class="col-sm-12" style="text-align:center;">
						<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nuevo_activo_pc">Aceptar</button>
						<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nuevo_activo_celular">Aceptar</button>
						<button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_nuevo_activo_impresora">Aceptar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>