<?php 
include("../../config.ini.php");


	$id_informe = $_POST['id_informe'];
  $imagen_1 = $_POST['imagen_1'];
  $imagen_2 = $_POST['imagen_2'];

  $posicion_1 = 1;
  $posicion_4 = 4;

  
  //CONSULTAR DATOS PARA ARMAR EL NOMBRE DE LA CARPETA 
	$primera = mysqli_prepare($connect,"SELECT id_mapeo, id_asignado FROM informe_refrigerador WHERE id_informe_refrigerador = $id_informe");
	mysqli_stmt_execute($primera);
	mysqli_stmt_store_result($primera);
	mysqli_stmt_bind_result($primera , $id_mapeo, $id_asignado);
	mysqli_stmt_fetch($primera);


	$segunda =  mysqli_prepare($connect,"SELECT id_servicio FROM item_asignado WHERE id_asignado = $id_asignado");
	mysqli_stmt_execute($segunda);
	mysqli_stmt_store_result($segunda);
	mysqli_stmt_bind_result($segunda , $id_servicio);
	mysqli_stmt_fetch($segunda); 


	$tercera =  mysqli_prepare($connect,"SELECT id_numot FROM servicio WHERE id_servicio = $id_servicio");
	mysqli_stmt_execute($tercera);
	mysqli_stmt_store_result($tercera);
	mysqli_stmt_bind_result($tercera , $id_numot);
	mysqli_stmt_fetch($tercera); 

  

if(!isset($imagen_1)){

	$target_dir = "Evidencia_Grafica/Ot_".$id_numot."/Id_servicio_".$id_asignado."/Id_mapeo_".$id_mapeo."/Posicion_sensores/";
	if(is_dir($target_dir)===false){
		mkdir($target_dir,0777,true);
	}

	$personalizado=$target_dir."_posicion_sensores.jpg";



	$target_file = $target_dir . basename($_FILES["imagen_1"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image

	$check = getimagesize($_FILES["imagen_1"]["tmp_name"]);
		if($check !== false) {
			//echo " Este archivo es una imagen - " . $check["mime"] . ".";
			$uploadOk = 1;
		}else{
			//echo " Este archivo no es una imagen.";
			$uploadOk = 0;
		}


		// Check file size
		if ($_FILES["imagen_1"]["size"] > 5000000) {
			//echo "Tu archivo es demasiado grande.";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			//echo " Solo se permite cargar imagenes tipo JPG, JPEG, PNG & GIF";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
				//echo " Tu archivo no pudo cargarse.";
		// if everything is ok, try to upload file
		}else{
			if (move_uploaded_file($_FILES["imagen_1"]["tmp_name"], $target_file)) {
			rename("$target_file","$personalizado");

				
						$creando = mysqli_prepare($connect,"INSERT INTO images_informe_refrigeradores (id_informe, tipo_imagen, ubicacion) VALUES (?,?,?)");
						mysqli_stmt_bind_param($creando, 'iis', $id_informe, $posicion_1, $personalizado);
						mysqli_stmt_execute($creando);

						if($creando){
							echo "Creado";
							}else{
								echo "No creado";
							}
			}else{
				echo " Hubo un error al intentar cargar el archivo.";
			} 	
		}
}


/////////////////////////////////////////////////////////////////////Cargar imagen 2///////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



if(!isset($imagen_2)){
 
  
  $target_dir = "Evidencia_Grafica/Ot_".$id_numot."/Id_servicio_".$id_asignado."/Id_mapeo_".$id_mapeo."/Equipo_refrigerador/";
	if(is_dir($target_dir)===false){
		mkdir($target_dir,0777,true);
	}
  
 $nombre_img = "";
 $digito = ""; 

$buscando = mysqli_prepare($connect,"SELECT ubicacion FROM images_informe_refrigeradores WHERE id_informe = ?  AND tipo_imagen = 4 ORDER BY fecha_registro DESC limit 1");
mysqli_stmt_bind_param($buscando, 'i', $id_informe);
mysqli_stmt_execute($buscando);
mysqli_stmt_store_result($buscando);
mysqli_stmt_bind_result($buscando, $ubicacion_anterior);
mysqli_stmt_fetch($buscando);
  
  echo "ubicacion".$ubicacion_anterior;

if(mysqli_stmt_num_rows($buscando) == 0){
    $digito = "01";
  
}else{
  
  $buscar_2 = mysqli_prepare($connect,"SELECT SUBSTR(ubicacion,-6,2) FROM images_informe_refrigeradores WHERE id_informe = ?  AND tipo_imagen = 4 ORDER BY fecha_registro DESC limit 1");
  mysqli_stmt_bind_param($buscar_2, 'i', $id_informe);
  mysqli_stmt_execute($buscar_2);
  mysqli_stmt_store_result($buscar_2);
  mysqli_stmt_bind_result($buscar_2, $digitos);
  mysqli_stmt_fetch($buscar_2);
  
  $digito = $digitos + 1;
  
  if($digito < 10){
    
    $digito = "0".$digito;
  }
    
}

	$personalizado=$target_dir."Equipo_Refrigerador".$digito.".jpg";



	$target_file = $target_dir . basename($_FILES["imagen_2"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image

	$check = getimagesize($_FILES["imagen_2"]["tmp_name"]);
		if($check !== false) {
			//echo " Este archivo es una imagen - " . $check["mime"] . ".";
			$uploadOk = 1;
		}else{
			//echo " Este archivo no es una imagen.";
			$uploadOk = 0;
		}


		// Check file size
		if ($_FILES["imagen_2"]["size"] > 5000000) {
			//echo "Tu archivo es demasiado grande.";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			//echo " Solo se permite cargar imagenes tipo JPG, JPEG, PNG & GIF";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
				//echo " Tu archivo no pudo cargarse.";
		// if everything is ok, try to upload file
		}else{
			if (move_uploaded_file($_FILES["imagen_2"]["tmp_name"], $target_file)) {
			rename("$target_file","$personalizado");

				
						$creando = mysqli_prepare($connect,"INSERT INTO images_informe_refrigeradores (id_informe, tipo_imagen, ubicacion) VALUES (?,?,?)");
						mysqli_stmt_bind_param($creando, 'iis', $id_informe, $posicion_4, $personalizado);
						mysqli_stmt_execute($creando);

						if($creando){
							echo "Creado";
							}else{
								echo "No creado";
			        }
      }else{
				echo " Hubo un error al intentar cargar el archivo.";
			} 
		}
    
}





?>