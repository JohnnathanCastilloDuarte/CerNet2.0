<?php 
  include("../../config.ini.php");

  $id_bandeja = $_POST['parameter'];

  $query = mysqli_prepare($connect,"SELECT datos_crudos FROM ultrafreezer_sensor WHERE id_bandeja = $id_bandeja");
	mysqli_stmt_execute($query);
	mysqli_stmt_store_result($query);
	mysqli_stmt_bind_result($query, $datos_crudos);
	mysqli_stmt_fetch($query);
  echo mysqli_stmt_error($query);

 if(mysqli_stmt_num_rows($query) > 0){
    
    echo $datos_crudos;  
  }else{
    
    echo "No";
  }

  mysqli_stmt_close($connect);

?>