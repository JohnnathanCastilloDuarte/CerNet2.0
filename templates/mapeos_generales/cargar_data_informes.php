<?php
include('../../config.ini.php');


$comentario_informe_temp = $_POST['comentario_informe_temp'];
$observacion_informe_temp = $_POST['observacion_informe_temp'];
$id_informe = $_POST['id_informe_actual'];
$imagen_1 = $_POST['imagen_tipo_1'];
$imagen_2 = $_POST['imagen_tipo_2'];
$imagen_3 = $_POST['imagen_tipo_3'];


if(!isset($imagen_1)){

    $tipo = 1;

	$target_dir = "evidencia_grafica/ubicacion_sensores".$id_informe."/";
	if(is_dir($target_dir)===false){
		mkdir($target_dir,0777,true);
	}


	$personalizado=$target_dir."posicion_sensores.jpg";

    $target_file = $target_dir . basename($_FILES["imagen_tipo_1"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image

	$check = getimagesize($_FILES["imagen_tipo_1"]["tmp_name"]);
    if($check !== false) {
        //echo " Este archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    }else{
        //echo " Este archivo no es una imagen.";
        $uploadOk = 0;
    }


    // Check file size
    if ($_FILES["imagen_tipo_1"]["size"] > 5000000) {
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
        if (move_uploaded_file($_FILES["imagen_tipo_1"]["tmp_name"], $target_file)) {
            rename("$target_file","$personalizado");
            
            $creando = mysqli_prepare($connect,"INSERT INTO imagenes_general_informe (id_informe, tipo, url) VALUES (?,?,?)");
            mysqli_stmt_bind_param($creando, 'iis', $id_informe, $tipo, $personalizado);
            mysqli_stmt_execute($creando);
        }else{
                //echo " Hubo un error al intentar cargar el archivo.";
            } 	
    }
}////////// CIERRE DEL ISSET DE IMAGEN1    

if(!isset($imagen_2)){

    $tipo = 2;

	$target_dir = "evidencia_grafica/valores_promedios".$id_informe."/";
	if(is_dir($target_dir)===false){
		mkdir($target_dir,0777,true);
	}

	$personalizado=$target_dir."promedio_minimo_maximo.jpg";

    $target_file = $target_dir . basename($_FILES["imagen_tipo_2"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image

	$check = getimagesize($_FILES["imagen_tipo_2"]["tmp_name"]);
    if($check !== false) {
        //echo " Este archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    }else{
        //echo " Este archivo no es una imagen.";
        $uploadOk = 0;
    }


    // Check file size
    if ($_FILES["imagen_tipo_2"]["size"] > 5000000) {
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
        if (move_uploaded_file($_FILES["imagen_tipo_2"]["tmp_name"], $target_file)) {
        rename("$target_file","$personalizado");

        $creando = mysqli_prepare($connect,"INSERT INTO imagenes_general_informe (id_informe, tipo, url) VALUES (?,?,?)");
        mysqli_stmt_bind_param($creando, 'iis', $id_informe, $tipo, $personalizado);
        mysqli_stmt_execute($creando);
    }else{
        //echo " Hubo un error al intentar cargar el archivo.";
    } 	
}
}////////// CIERRE DEL ISSET DE IMAGEN2 

if(!isset($imagen_3)){

    $tipo = 3;

	$target_dir = "evidencia_grafica/periodo_representativo".$id_informe."/";
	if(is_dir($target_dir)===false){
		mkdir($target_dir,0777,true);
	}

	$personalizado=$target_dir."periodo_representativo.jpg";

    $target_file = $target_dir . basename($_FILES["imagen_tipo_3"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image

	$check = getimagesize($_FILES["imagen_tipo_3"]["tmp_name"]);
    if($check !== false) {
        //echo " Este archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    }else{
        //echo " Este archivo no es una imagen.";
        $uploadOk = 0;
    }


    // Check file size
    if ($_FILES["imagen_tipo_3"]["size"] > 5000000) {
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
        if (move_uploaded_file($_FILES["imagen_tipo_3"]["tmp_name"], $target_file)) {
        rename("$target_file","$personalizado");

        $creando = mysqli_prepare($connect,"INSERT INTO imagenes_general_informe (id_informe, tipo, url) VALUES (?,?,?)");
        mysqli_stmt_bind_param($creando, 'iis', $id_informe, $tipo, $personalizado);
        mysqli_stmt_execute($creando);
    }else{
        echo " Hubo un error al intentar cargar el archivo.";
    } 	
}
}////////// CIERRE DEL ISSET DE IMAGEN2 


$actualizando_comentarios = mysqli_prepare($connect,"UPDATE informes_general SET comentario = ? , observacion = ? WHERE id_informe = ?");
mysqli_stmt_bind_param($actualizando_comentarios, 'ssi', $comentario_informe_temp, $observacion_informe_temp, $id_informe);
mysqli_stmt_execute($actualizando_comentarios);

if($actualizando_comentarios){
    echo $id_informe;
}else{
    echo "Error";
}

mysqli_close($connect);

?>