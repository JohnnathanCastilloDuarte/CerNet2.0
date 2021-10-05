<?php 
  include("../../config.ini.php");

  $id_bandeja = $_POST['parameter'];

  $query = mysqli_prepare($connect,"SELECT datos_crudos FROM ultrafreezer_sensor WHERE id_bandeja = $id_bandeja");
	mysqli_stmt_execute($primer_filtro);
	mysqli_stmt_store_result($primer_filtro);
	mysqli_stmt_bind_result($primer_filtro, $datos_crudos);
	mysqli_stmt_fetch($primer_filtro);

  $cuantos = mysqli_stmt_num_rows($primer_filtro);
  
  
  if($cuantos > 0){
    
    echo $datos_crudos;  
  }else{
    
    echo "No";
  }

  mysqli_stmt_close($connect);

?>