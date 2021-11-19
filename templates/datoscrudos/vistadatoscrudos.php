<?php

$id_valida = $_GET['id_valida'];
$id_asignado = $_GET['id_asignado'];
$id_mapeo = $_GET['id_mapeo'];


echo "<input type='hidden' value='$id_valida' id='id_valida'/>";
echo "<input type='hidden' value='$id_asignado' id='id_asignado'/>";
echo "<input type='hidden' value='$id_mapeo' id='id_mapeo'/>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Language" content="es">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>CerNet</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
  <meta name="description" content="This is an example dashboard created using build-in elements and components.">
  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<br><br>
	<div class="row">
		<div class="col-sm-3"></div>

		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">Datos crudos</div>
				<div class="card-body">

					<div class="row">
						<div class="col-sm-12">
							<label for="">Tipo archivo</label>
					
							<select name="" id="tipo_archivo_dc" class="form-control">
								<option value="0">Seleccione</option>
								<option value="1">Sensor</option>
								<option value="2">Termocupla</option>			
							</select>
						</div>	
					</div>
					
						
					
				</div>
			</div>
			<br>
			<div class="card" id="tipo_termocupla">
				<div class="card-header">Tipo Termocupla</div>
				<div class="card-body">
				
					<div class="row">
						
						
						<div class="col-sm-12" style="text-align: center;">

							<form enctype="multipart/form-data" method="post" id="form_datos_crudos">

								<input type="hidden" name="tipo_archivo_dc" value="1">
								<?php 
									
									echo "<input type='hidden' value='$id_valida' name='id_valida'/>";
									echo "<input type='hidden' value='$id_asignado' name='id_asignado'/>";
									echo "<input type='hidden' value='$id_mapeo' name='id_mapeo'/>";
								?>

								<label>Archivo DC</label>
								<input type="file" class="form-control" name="file">

								<label for="">Rango >=</label>
								<input type="text" name="rango_mayor_igual" id="rango_mayor_igual" class="form-control">

								<label for="">Rango <=</label>
								<input type="text" name="rango_menor_igual" id="rango_menor_igual" class="form-control">

								<br>
								<button class="btn btn-success">Cargar</button>
							</form>	

						</div>
						
					</div>
					

						
				</div>

			</div>


			<div class="card" id="tipo_sensor">
				<div class="card-header">Tipo sensor</div>
				<div class="card-body"></div>
			</div>
			
		</div>
	</div>
	<br><br>

	<div class="row">
		<div class="col-sm-6">
		<div class="card" id="resultados_tipo_termocupla">
			<div class="card-header">Resultados datos crudos</div>
			<div class="card-body">
				<table class="table">
					<thead>
						<th>#</th>
						<th>Fecha / Hora</th>
						<th>Colm1</th>
						<th>Colm2</th>
						<th>Colm3</th>
						<th>Colm4</th>
						<th>Colm5</th>
						<th>Colm6</th>
						<th>Colm7</th>
						<th>Colm8</th>
						<th>Colm9</th>
						<th>Colm10</th>
					</thead>
					<tbody id="mostrar_dc_1"></tbody>
				</table>
			</div>
			</div>
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../../design/js/datos_crudos.js"></script>
</body>
</html>