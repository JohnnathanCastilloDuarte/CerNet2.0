<?php 

include('../../config.ini.php');

$nombre_usuario = $_POST['nombre_usuario'];
$apellido_usuario = $_POST['apellido_usuario'];
$identificacion_usuario = $_POST['identificacion_usuario'];
$pais_usuario = $_POST['pais_usuario'];
$email_usuario = $_POST['email_usuario'];
$telefono_usuario = $_POST['telefono_usuario'];
$departamento_usuario = $_POST['departamento_usuario'];
$cargo_usuario = $_POST['cargo_usuario'];
$estado_usuario = $_POST['estado_usuario'];
$usuario = $_POST['usuario'];
$id_empresa = $_POST['empresa_usuario'];
$id_usuario = $_POST['id_usuario'];

////////////////// UPDATE IMAGE 
$personalizado = "";
//proceso de carga de imagen
$target_dir = "templates/usuario/images/images_profile/";
if(is_dir($target_dir)===false){
  mkdir($target_dir,0777,true);
}
$personalizado=$target_dir."profile_image".$id_usuario.".jpg";
$target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["profile_image"])){
  $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
  
  if($check !== false) {
    //echo " Este archivo es una imagen - " . $check["mime"] . ".";
    $uploadOk = 1;
  }else{
    //echo " Este archivo no es una imagen.";
    $uploadOk = 0;
  }
}
// Check file size
if ($_FILES["profile_image"]["size"] > 5000000){
  //echo "Tu archivo es demasiado grande.";
  $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ){
  //echo " Solo se permite cargar imagenes tipo JPG, JPEG, PNG & GIF";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  //echo " Tu archivo no pudo cargarse.";
  // if everything is ok, try to upload file
}else{
  if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
    rename("$target_file","$personalizado");
    //echo " El archivo ". $personalizado. " ha sido cargado.";
  }else{
    //echo " Hubo un error al intentar cargar el archivo.";
  }
}

///// query para obtener el valor del ID de persona

$buscando = mysqli_prepare($connect,"SELECT id_persona FROM persona WHERE id_usuario = ?");
mysqli_stmt_bind_param($buscando, 'i', $id_usuario);
mysqli_stmt_execute($buscando);
mysqli_stmt_store_result($buscando);
mysqli_stmt_bind_result($buscando, $id_persona);
mysqli_stmt_fetch($buscando);

/////// actualizando persona
$actualizando_p = mysqli_prepare($connect,"UPDATE persona SET nombre = ?, apellido = ?, telefono = ?, departamento = ?, cargo = ?, estado= ?, pais = ?, numero_identificacion = ?, id_empresa = ?, imagen_usuario = ? WHERE id_persona = ?");
mysqli_stmt_bind_param($actualizando_p, 'ssssssssisi', $nombre_usuario, $apellido_usuario, $telefono_usuario, $departamento_usuario, $cargo_usuario, $estado_usuario, $pais_usuario, $identificacion_usuario, $id_empresa, $personalizado, $id_persona);
mysqli_stmt_execute($actualizando_p);
echo mysqli_stmt_error($actualizando_p);

if($actualizando_p){
  echo "Actualizado";
}else{
  echo "Error";
}
mysqli_close($connect);

?>