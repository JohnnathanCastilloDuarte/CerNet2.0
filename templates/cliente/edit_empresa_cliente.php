<?php 
include("../../config.ini.php");

$id_empresa = $_POST['id_empresa'];
$n_tributario = $_POST['n_tributario'];
$razon_social = $_POST['razon_social'];
$direccion_empresa = $_POST['direccion_empresa'];
$pais_empresa = $_POST['pais_empresa'];
$ciudad_empresa = $_POST['ciudad_empresa'];
$sigla_pais = $_POST['sigla_pais'];
$sigla_empresa = $_POST['sigla_empresa'];
$tipo_sede = $_POST['tipo_sede'];
$giro_empresa = $_POST['giro_empresa'];
$imagen_1 = $_POST['logo_empresa'];



if(!isset($imagen_1)){

    $tipo = 1;

  $target_dir = "logo_clientes/".$razon_social."/";
  if(is_dir($target_dir)===false){
    mkdir($target_dir,0777,true);
  }

  $personalizado=$target_dir."logo_empresa.jpg";

    $target_file = $target_dir . basename($_FILES["logo_empresa"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["logo_empresa"]["tmp_name"]);
    if($check !== false) {
        //echo " Este archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    }else{
        //echo " Este archivo no es una imagen.";
        $uploadOk = 0;
    }


    // Check file size
    if ($_FILES["logo_empresa"]["size"] > 5000000) {
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
        if (move_uploaded_file($_FILES["logo_empresa"]["tmp_name"], $target_file)) {
            rename("$target_file","$personalizado");
            $tipo = 11;
          
          //proceso de actualización
          $actualizar = mysqli_prepare($connect,"UPDATE empresa SET  numero_tributario = ?, nombre = ?, giro = ?, direccion = ?,
          ciudad = ?, sigla_empresa = ?, sigla_pais = ?, pais = ?, tipo_sede = ?, logo = ? WHERE id_empresa = ?");

          mysqli_stmt_bind_param($actualizar, 'ssssssssssi', $n_tributario, $razon_social, $giro_empresa, $direccion_empresa,
          $ciudad_empresa, $sigla_empresa, $sigla_pais, $pais_empresa, $tipo_sede, $personalizado, $id_empresa);

          mysqli_stmt_execute($actualizar);

if($actualizar){
	echo "Si";
}else 
{
	echo "no";
}
            
}else{
                //echo " Hubo un error al intentar cargar el archivo.";
            } 	
    }
}////////// CIERRE DEL ISSET DE IMAGEN1 



		
?>