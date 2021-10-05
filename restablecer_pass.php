<?php 

	$id_protegido = $_GET['key'];

?>
<!doctype html>
<html lang="es">
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
  <link href="design/main.css" rel="stylesheet">
	<body>
	<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">	
		<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4  my-5">
				<div class="card">
					<div class="card-header">
						<div class="row">
								<div class="col-sm-7"></div>
								<div class="col-sm-5">
									<img src="design/assets/images/logo-inverse.png">
								</div>
						</div>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label>
								Usuario CerNet
							</label>
							<input type="text" name="usuario" id="usuario" class="form-control">
							<input type="hidden" name="id_protegido" id="id_protegido" value="<?php echo $id_protegido; ?>">
							<div id="cambiar">
								<p class="text-success" style="text-align:center;">Usuario Correcto</p>
								<label>Nueva contraseña</label>
								<input type="password" class="form-control" id="password">
								<label>repita la contraseña</label>
								<input type="password" class="form-control" id="password2">
								<br>
								<div id="contra">
									
								</div>
								<br>
								<button class="btn-block text-center btn btn-info" id="actualizar">
									Actualizar
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		</div>	
	</body>
	<!------------------------------------------------------script-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="design/js/function.js"></script>
<script type="text/javascript" src="design/Datatables/sweetalert2.all.min.js"></script>	
</head>
<body>