<?php 

	include("../../config.ini.php");


	$id_informe = $_POST['id_informe'];

	$tipo_image_2 = $_POST['tipo_image_2'];

	$change = 0;
	$posicion_1 = 1;
	$posicion_2 = 2;
	$posicion_3 = 3;


		if($tipo_image_2 == "TEM"){
			$change = 2;
		}else{
			$change = 3;
		}

	
		
	//CONSULTAR DATOS PARA ARMAR EL NOMBRE DE LA CARPETA 
	$primera = mysqli_prepare($connect,"SELECT id_mapeo, id_asignado FROM informe_ultrafreezer WHERE id_informe_ultrafreezer = $id_informe");
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


  $target_dir = "Evidencia_Grafica/Ot_".$id_numot."/Id_servicio_".$id_asignado."/Id_mapeo_".$id_mapeo."/Posicion_sensores/";
	if(is_dir($target_dir)===false){
		mkdir($target_dir,0777,true);
	}

	$personalizado=$target_dir.$tipo_image_2."_posicion_sensores.jpg";



	$target_file = $target_dir . basename($_FILES["imagen_1"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image

	$check = getimagesize($_FILES["imagen_1"]["tmp_name"]);
		if($check !== false) {
			echo " Este archivo es una imagen - " . $check["mime"] . ".";
			$uploadOk = 1;
		}else{
			echo " Este archivo no es una imagen.";
			$uploadOk = 0;
		}


		// Check file size
		if ($_FILES["imagen_1"]["size"] > 5000000) {
			echo "Tu archivo es demasiado grande.";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			echo " Solo se permite cargar imagenes tipo JPG, JPEG, PNG & GIF";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
				echo " Tu archivo no pudo cargarse.";
		// if everything is ok, try to upload file
		}else{
			if (move_uploaded_file($_FILES["imagen_1"]["tmp_name"], $target_file)) {
			rename("$target_file","$personalizado");

				//validar la existencia 
				$preguntar = mysqli_prepare($connect,"SELECT id_imagen FROM images_informe_ultrafreezer WHERE id_informe = ? AND tipo_imagen = ? AND ubicacion = ?");
				mysqli_stmt_bind_param($preguntar, 'iis', $id_informe, $posicion_1, $personalizado);	
				mysqli_stmt_execute($preguntar);
				mysqli_stmt_store_result($preguntar);
				mysqli_stmt_bind_result($preguntar, $id_image);
				mysqli_stmt_fetch($preguntar);

					echo mysqli_stmt_num_rows($preguntar);
				
				if(mysqli_stmt_num_rows($preguntar) == 0){
						$creando = mysqli_prepare($connect,"INSERT INTO images_informe_ultrafreezer (id_informe, tipo_imagen, ubicacion) VALUES (?,?,?)");
						mysqli_stmt_bind_param($creando, 'iis', $id_informe, $posicion_1, $personalizado);
						mysqli_stmt_execute($creando);

						if($creando){
							echo "Creado";
							}else{
								echo "No creado";
							}
				}else{
					$update = mysqli_prepare($connect,"UPDATE images_informe_ultrafreezer SET ubicacion = ? WHERE id_imagen = ?");
					mysqli_stmt_bind_param($update, 'si', $personalizado, $id_image);
					mysqli_stmt_execute($update);

						if($update){
							echo "Actualizado";
						}else{
							echo "No actualizado";
						}
				}
			}else{
				echo " Hubo un error al intentar cargar el archivo.";
			} 
		}
	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



if($change == 2){
//CARGAR IMAGEN PARA LA DISTRIBUCIÓN DE LOS SENSORES


	////////////////////////////////////////////////////////////////////////////////CARGAR GRAFICO #1////////////////////////////////////////////////////////////////////
	$target_dir = "Evidencia_Grafica/Ot_".$id_numot."/Id_servicio_".$id_asignado."/Id_mapeo_".$id_mapeo."/Grafico_1/";
		if(is_dir($target_dir)===false)
		{
			mkdir($target_dir,0777,true);
		}

		$personalizado=$target_dir.$tipo_image_2."_Grafico_1.jpg";


		$target_file = $target_dir . basename($_FILES["imagen_2"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image

		$check = getimagesize($_FILES["imagen_2"]["tmp_name"]);
			if($check !== false) {
				echo " Este archivo es una imagen - " . $check["mime"] . ".";
				$uploadOk = 1;
			}else{
				echo " Este archivo no es una imagen.";
				$uploadOk = 0;
			}


			// Check file size
			if ($_FILES["imagen_2"]["size"] > 5000000) {
				echo "Tu archivo es demasiado grande.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ){
				echo " Solo se permite cargar imagenes tipo JPG, JPEG, PNG & GIF";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if($uploadOk == 0) {
				echo " Tu archivo no pudo cargarse.";
				// if everything is ok, try to upload file
			}else{
				if(move_uploaded_file($_FILES["imagen_2"]["tmp_name"], $target_file)) {
					rename("$target_file","$personalizado");

					//validar la existencia 
					$preguntar = mysqli_prepare($connect,"SELECT id_imagen FROM images_informe_ultrafreezer WHERE id_informe = ? AND tipo_imagen = ? AND ubicacion = ?");
					mysqli_stmt_bind_param($preguntar, 'iis', $id_informe, $posicion_2, $personalizado);	
					mysqli_stmt_execute($preguntar);
					mysqli_stmt_store_result($preguntar);
					mysqli_stmt_bind_result($preguntar, $id_image);
					mysqli_stmt_fetch($preguntar);

					if(mysqli_stmt_num_rows($preguntar) == 0){
						$creando = mysqli_prepare($connect,"INSERT INTO images_informe_ultrafreezer (id_informe, tipo_imagen, ubicacion) VALUES (?,?,?)");
						mysqli_stmt_bind_param($creando, 'iis', $id_informe, $posicion_2, $personalizado);
						mysqli_stmt_execute($creando);

						if($creando){
							echo "Creado";
						}else{
							echo "No creado";
						}
					}else{
						$update = mysqli_prepare($connect,"UPDATE images_informe_ultrafreezer  SET ubicacion = ? WHERE id_imagen = ?");
						mysqli_stmt_bind_param($update, 'si', $personalizado, $id_imagen);
						mysqli_stmt_execute($update);

						if($update){
							echo "Actualizado";
						}else{
							echo "No actualizado";
						}

				}

				}else{
					echo " Hubo un error al intentar cargar el archivo.";
				}
			}
	
	////////////////////////////////////////////////////////////////////////////////CARGAR GRAFICO #2////////////////////////////////////////////////////////////////////
	$target_dir = "Evidencia_Grafica/Ot_".$id_numot."/Id_servicio_".$id_asignado."/Id_mapeo_".$id_mapeo."/Grafico_2/";
		if(is_dir($target_dir)===false)
		{
			mkdir($target_dir,0777,true);
		}

		$personalizado=$target_dir.$tipo_image_2."_Grafico_2.jpg";


		$target_file = $target_dir . basename($_FILES["imagen_3"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image

		$check = getimagesize($_FILES["imagen_3"]["tmp_name"]);
			if($check !== false) {
				echo " Este archivo es una imagen - " . $check["mime"] . ".";
				$uploadOk = 1;
			}else{
				echo " Este archivo no es una imagen.";
				$uploadOk = 0;
			}


			// Check file size
			if ($_FILES["imagen_3"]["size"] > 5000000) {
				echo "Tu archivo es demasiado grande.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ){
				echo " Solo se permite cargar imagenes tipo JPG, JPEG, PNG & GIF";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if($uploadOk == 0) {
				echo " Tu archivo no pudo cargarse.";
				// if everything is ok, try to upload file
			}else{
				if(move_uploaded_file($_FILES["imagen_3"]["tmp_name"], $target_file)) {
					rename("$target_file","$personalizado");

					//validar la existencia 
					$preguntar = mysqli_prepare($connect,"SELECT id_imagen FROM images_informe_ultrafreezer WHERE id_informe = ? AND tipo_imagen = ? AND ubicacion = ?");
					mysqli_stmt_bind_param($preguntar, 'iis', $id_informe, $posicion_3, $personalizado);	
					mysqli_stmt_execute($preguntar);
					mysqli_stmt_store_result($preguntar);
					mysqli_stmt_bind_result($preguntar, $id_image);
					mysqli_stmt_fetch($preguntar);

					if(mysqli_stmt_num_rows($preguntar) == 0){
						$creando = mysqli_prepare($connect,"INSERT INTO images_informe_ultrafreezer (id_informe, tipo_imagen, ubicacion) VALUES (?,?,?)");
						mysqli_stmt_bind_param($creando, 'iis', $id_informe, $posicion_3, $personalizado);
						mysqli_stmt_execute($creando);

						if($creando){
							echo "Creado";
						}else{
							echo "No creado";
						}
					}else{
						$update = mysqli_prepare($connect,"UPDATE images_informe_ultrafreezer SET ubicacion = ? WHERE id_imagen = ?");
						mysqli_stmt_bind_param($update, 'si', $personalizado, $id_imagen);
						mysqli_stmt_execute($update);

						if($update){
							echo "Actualizado";
						}else{
							echo "No actualizado";
						}

				}

				}else{
					echo " Hubo un error al intentar cargar el archivo.";
				}
			}	
}

else if($change == 3){
	//CARGAR IMAGEN PARA LA DISTRIBUCIÓN DE LOS SENSORES


	////////////////////////////////////////////////////////////////////////////////CARGAR GRAFICO #1////////////////////////////////////////////////////////////////////
	$target_dir = "Evidencia_Grafica/Ot_".$id_numot."/Id_servicio_".$id_asignado."/Id_mapeo_".$id_mapeo."/Grafico_1/";
		if(is_dir($target_dir)===false)
		{
			mkdir($target_dir,0777,true);
		}

		$personalizado=$target_dir.$tipo_image_2."_Grafico_1.jpg";


		$target_file = $target_dir . basename($_FILES["imagen_2"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image

		$check = getimagesize($_FILES["imagen_2"]["tmp_name"]);
			if($check !== false) {
				echo " Este archivo es una imagen - " . $check["mime"] . ".";
				$uploadOk = 1;
			}else{
				echo " Este archivo no es una imagen.";
				$uploadOk = 0;
			}


			// Check file size
			if ($_FILES["imagen_2"]["size"] > 5000000) {
				echo "Tu archivo es demasiado grande.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ){
				echo " Solo se permite cargar imagenes tipo JPG, JPEG, PNG & GIF";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if($uploadOk == 0) {
				echo " Tu archivo no pudo cargarse.";
				// if everything is ok, try to upload file
			}else{
				if(move_uploaded_file($_FILES["imagen_2"]["tmp_name"], $target_file)) {
					rename("$target_file","$personalizado");

					//validar la existencia 
					$preguntar = mysqli_prepare($connect,"SELECT id_imagen FROM images_informe_ultrafreezer WHERE id_informe = ? AND tipo_imagen = ? AND ubicacion = ?");
					mysqli_stmt_bind_param($preguntar, 'iis', $id_informe, $posicion_2, $personalizado);	
					mysqli_stmt_execute($preguntar);
					mysqli_stmt_store_result($preguntar);
					mysqli_stmt_bind_result($preguntar, $id_image);
					mysqli_stmt_fetch($preguntar);

					if(mysqli_stmt_num_rows($preguntar) == 0){
						$creando = mysqli_prepare($connect,"INSERT INTO images_informe_ultrafreezer (id_informe, tipo_imagen, ubicacion) VALUES (?,?,?)");
						mysqli_stmt_bind_param($creando, 'iis', $id_informe, $posicion_2, $personalizado);
						mysqli_stmt_execute($creando);

						if($creando){
							echo "Creado";
						}else{
							echo "No creado";
						}
					}else{
						$update = mysqli_prepare($connect,"UPDATE images_informe_ultrafreezer SET ubicacion = ? WHERE id_imagen = ?");
						mysqli_stmt_bind_param($update, 'si', $personalizado, $id_imagen);
						mysqli_stmt_execute($update);

						if($update){
							echo "Actualizado";
						}else{
							echo "No actualizado";
						}

				}

				}else{
					echo " Hubo un error al intentar cargar el archivo.";
				}
			}
	
	////////////////////////////////////////////////////////////////////////////////CARGAR GRAFICO #2////////////////////////////////////////////////////////////////////
	$target_dir = "Evidencia_Grafica/Ot_".$id_numot."/Id_servicio_".$id_asignado."/Id_mapeo_".$id_mapeo."/Grafico_2/";
		if(is_dir($target_dir)===false)
		{
			mkdir($target_dir,0777,true);
		}

		$personalizado=$target_dir.$tipo_image_2."_Grafico_2.jpg";


		$target_file = $target_dir . basename($_FILES["imagen_3"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image

		$check = getimagesize($_FILES["imagen_3"]["tmp_name"]);
			if($check !== false) {
				echo " Este archivo es una imagen - " . $check["mime"] . ".";
				$uploadOk = 1;
			}else{
				echo " Este archivo no es una imagen.";
				$uploadOk = 0;
			}


			// Check file size
			if ($_FILES["imagen_3"]["size"] > 5000000) {
				echo "Tu archivo es demasiado grande.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ){
				echo " Solo se permite cargar imagenes tipo JPG, JPEG, PNG & GIF";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if($uploadOk == 0) {
				echo " Tu archivo no pudo cargarse.";
				// if everything is ok, try to upload file
			}else{
				if(move_uploaded_file($_FILES["imagen_3"]["tmp_name"], $target_file)) {
					rename("$target_file","$personalizado");

					//validar la existencia 
					$preguntar = mysqli_prepare($connect,"SELECT id_imagen FROM images_informe_ultrafreezer WHERE id_informe = ? AND tipo_imagen = ? AND ubicacion = ?");
					mysqli_stmt_bind_param($preguntar, 'iis', $id_informe, $posicion_3, $personalizado);	
					mysqli_stmt_execute($preguntar);
					mysqli_stmt_store_result($preguntar);
					mysqli_stmt_bind_result($preguntar, $id_image);
					mysqli_stmt_fetch($preguntar);

					if(mysqli_stmt_num_rows($preguntar) == 0){
						$creando = mysqli_prepare($connect,"INSERT INTO images_informe_ultrafreezer (id_informe, tipo_imagen, ubicacion) VALUES (?,?,?)");
						mysqli_stmt_bind_param($creando, 'iis', $id_informe, $posicion_3, $personalizado);
						mysqli_stmt_execute($creando);

						if($creando){
							echo "Creado";
						}else{
							echo "No creado";
						}
					}else{
						$update = mysqli_prepare($connect,"UPDATE images_informe_ultrafreezer SET ubicacion = ? WHERE id_imagen = ?");
						mysqli_stmt_bind_param($update, 'si', $personalizado, $id_imagen);
						mysqli_stmt_execute($update);

						if($update){
							echo "Actualizado";
						}else{
							echo "No actualizado";
						}

				}

				}else{
					echo " Hubo un error al intentar cargar el archivo.";
				}
			}	
}

mysqli_stmt_close($connect);


?>