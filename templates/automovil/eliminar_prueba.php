<?php 
include('../../config.ini.php');

$id = $_POST['id'];

$consultar_informes = mysqli_prepare($connect,"SELECT id_informe_automovil FROM informes_automovil WHERE id_mapeo = ?");
mysqli_stmt_bind_param($consultar_informes, 'i', $id);
mysqli_stmt_execute($consultar_informes);
mysqli_stmt_store_result($consultar_informes);
mysqli_stmt_bind_result($consultar_informes, $id_informe_automovil);
mysqli_stmt_fetch($consultar_informes);

if(mysqli_stmt_num_rows($consultar_informes) > 0){
  echo "NO";
}else{
    $eliminar_informe = mysqli_prepare($connect, "DELETE FROM informes_automovil WHERE id_informe_automovil = ?");
    mysqli_stmt_bind_param($eliminar_informe, 'i', $id_informe_automovil);
    mysqli_stmt_execute($eliminar_informe);
    
    if($eliminar_informe){
      $eliminar = mysqli_prepare($connect,"DELETE FROM automovil_mapeo WHERE id_mapeo = ?");
      mysqli_stmt_bind_param($eliminar, 'i', $id);
      mysqli_stmt_execute($eliminar);

      if($eliminar){
        echo 1;
      }else{
        echo 0;
      }
    }  
 } 
mysqli_close($connect);
?>