<?php 
error_reporting(0);
include("../../config.ini.php");

$nombre_pdf_full = $_POST['nombre_pdf_full'].".pdf";
$tipo = $_FILES['pdf_subiendo']['type'];
$tamanio = $_FILES['pdf_subiendo']['size'];
$archivotmp = $_FILES['pdf_subiendo']['tmp_name'];
$id_documentacion = $_POST['id_documentacion'];


$target_dir = "templates/documentacion/pdf/";
	if(is_dir($target_dir)===false){
		mkdir($target_dir,0777,true);
	}

	$personalizado=$target_dir.$nombre_pdf_full;

if(move_uploaded_file($archivotmp, 'pdf/'.$nombre_pdf_full)){
    $query = mysqli_prepare($connect,"SELECT id FROM archivos_documentacion WHERE id_documentacion = ?");
    mysqli_stmt_bind_param($query, 'i', $id_documentacion);
    mysqli_stmt_execute($query);
    mysqli_stmt_store_result($query);
    mysqli_stmt_bind_result($query, $id);
    mysqli_stmt_fetch($query);
  
    if(mysqli_stmt_num_rows($query) > 0){
      $update = mysqli_prepare($connect,"UPDATE archivos_documentacion  SET url = ? WHERE id = ?");
      mysqli_stmt_bind_param($update, 'si', $personalizado, $id);
      mysqli_stmt_execute($update);
      if($update){
        echo 1;
      }else{
        echo 0;
      }
    }else{
      $insert = mysqli_prepare($connect,'INSERT INTO archivos_documentacion (id_documentacion, url, nombre_archivo) VALUES (?,?,?)');
      mysqli_stmt_bind_param($insert, 'iss', $id_documentacion, $personalizado, $nombre_pdf_full);
      mysqli_stmt_execute($insert);
      if($insert){
        echo 1;
      }else{
        echo 0;
      }
    }
}else{
  echo "Error";
}

echo "Terminado";
	
?>