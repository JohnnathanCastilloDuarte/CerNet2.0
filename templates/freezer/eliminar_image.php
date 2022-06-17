<?php 
include("../../config.ini.php");

	$id_informe = $_POST['id_informe'];
	$url = $_POST['url'];
  $id_imagen = $_POST['id_imagen'];

$fh = fopen($url, 'w');
fclose($fh);	
$eliminar_1 = unlink($url);

if($eliminar_1){
  
  if(!isset($id_imagen)){
	
    $eliminar_2 = mysqli_prepare($connect,"DELETE FROM images_informe_freezer WHERE id_informe = $id_informe AND ubicacion = '$url'");
    mysqli_stmt_execute($eliminar_2);

    if($eliminar_2){
      echo "Si";
    }else{
      echo "No";
    }
  }else{
    $eliminar_2 = mysqli_prepare($connect,"DELETE FROM images_informe_freezer WHERE id_informe = $id_informe AND ubicacion = '$url' AND id_imagen = $id_imagen");
    mysqli_stmt_execute($eliminar_2);

    if($eliminar_2){
      echo "Si";
    }else{
      echo "No";
    }
  }  
}
	


mysqli_stmt_close($connect);
?>