<?php 
	include("../../config.ini.php");

	$empresa = $_POST['empresa_ultrafreezer'];
  $tipo_item = $_POST['id_item_ultrafreezer'];
  $nombre_item =$_POST['nombre_ultrafreezer'];
  $desc_item = $_POST['desc_ultrafreezer'];
  //$estado = $_POST['estado'];
	$id_valida = $_POST['id_valida'];

  
  ////////// DATOS CON LA CREACIÓN 
	$consultar_tipo = mysqli_prepare($connect,"SELECT nombre FROM tipo_item WHERE id_item = ?");
	mysqli_stmt_bind_param($consultar_tipo, 'i', $tipo_item);
	mysqli_stmt_execute($consultar_tipo);
	mysqli_stmt_store_result($consultar_tipo);
	mysqli_stmt_bind_result($consultar_tipo, $tipo);
	mysqli_stmt_fetch($consultar_tipo);

	$consultar_empresa = mysqli_prepare($connect,"SELECT nombre FROM empresa WHERE id_empresa = ?");
	mysqli_stmt_bind_param($consultar_empresa, 'i', $empresa);
	mysqli_stmt_execute($consultar_empresa);
	mysqli_stmt_store_result($consultar_empresa);
	mysqli_stmt_bind_result($consultar_empresa, $nombre_empresa);
	mysqli_stmt_fetch($consultar_empresa);


	$mensaje = "Ha creado un nuevo item: ".$nombre_item." de tipo: ".$tipo." para la empresa: ".$nombre_empresa;
	$tipo_historial = 1;

			//insertar en el backtraking 
				//1 insertar en la tabla historal_modulo

				$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_item (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
				mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
				mysqli_stmt_execute($insertando_historial);
				mysqli_stmt_store_result($insertando_historial);



	
	$query = "INSERT INTO item (id_empresa, id_tipo, nombre, descripcion, estado, id_usuario) VALUES (?, ?, ?, ?, ?, ?)"; 
	$crear = mysqli_prepare($connect,$query);
	mysqli_stmt_bind_param($crear, 'iissii', $empresa, $tipo_item, $nombre_item, $desc_item, $estado, $id_valida);
	mysqli_stmt_execute($crear);
  $ultimo_id  =  mysqli_stmt_insert_id($crear);


	if($tipo_item == 1){
		
		$insertar_bodega = mysqli_prepare($connect,"INSERT INTO item_bodega (id_item, id_usuario) VALUES (?, ?)");
		mysqli_stmt_bind_param($insertar_bodega, 'ii', $ultimo_id, $id_valida);
		mysqli_stmt_execute($insertar_bodega);
		if($insertar_bodega){
		echo "si";
	}else{
		echo "no";
	}
	}


	else if($tipo_item == 2){

		$insertar_refrigerador = mysqli_prepare($connect,"INSERT INTO item_refrigerador (id_item, id_usuario) VALUES (?, ?)");
		mysqli_stmt_bind_param($insertar_refrigerador, 'ii', $ultimo_id, $id_valida);
		mysqli_stmt_execute($insertar_refrigerador);
	
    if($insertar_refrigerador){
		echo "si";
	}else{
		echo "no";
	}
	}

else if($tipo_item == 3){
  
  $insertar_freezer = mysqli_prepare($connect,"INSERT INTO item_freezer (id_item, id_usuario) VALUES (?, ?)");
	mysqli_stmt_bind_param($insertar_freezer, 'ii', $ultimo_id, $id_valida);
	mysqli_stmt_execute($insertar_freezer);
  
  if($insertar_freezer){
		echo "si";
	}else{
		echo "no";
	}
}

else if($tipo_item == 4){
  
  $insertar_utrafreezer = mysqli_prepare($connect,"INSERT INTO item_ultrafreezer (id_item, id_usuario) VALUES (?, ?)");
	mysqli_stmt_bind_param($insertar_utrafreezer, 'ii', $ultimo_id, $id_valida);
	mysqli_stmt_execute($insertar_utrafreezer);
  
  if($insertar_utrafreezer){
		echo "si";
	}else{
		echo "no";
	}
}

else if($tipo_item == 5){
  
  $insertar_estufa = mysqli_prepare($connect,"INSERT INTO item_estufa (id_item, id_usuario) VALUES (?, ?)");
	mysqli_stmt_bind_param($insertar_estufa, 'ii', $ultimo_id, $id_valida);
	mysqli_stmt_execute($insertar_estufa);
  
  if($insertar_estufa){
		echo "si";
	}else{
		echo "no";
	}
}

else if($tipo_item == 6){
  
  $insertar_incubadora = mysqli_prepare($connect,"INSERT INTO item_incubadora (id_item, id_usuario) VALUES (?, ?)");
	mysqli_stmt_bind_param($insertar_incubadora, 'ii', $ultimo_id, $id_valida);
	mysqli_stmt_execute($insertar_incubadora);
  
  if($insertar_incubadora){
		echo "si";
	}else{
		echo "no";
	}
}

else if($tipo_item == 7){
  
  $insertar_automovil = mysqli_prepare($connect,"INSERT INTO item_automovil (id_item, id_usuario) VALUES (?, ?)");
	mysqli_stmt_bind_param($insertar_automovil, 'ii', $ultimo_id, $id_valida);
	mysqli_stmt_execute($insertar_automovil);
  
  if($insertar_automovil){
		echo "si";
	}else{
		echo "no";
	}
}




	mysqli_stmt_close($connect);
?>