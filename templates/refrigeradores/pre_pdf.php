<?php 
	include("../../config.ini.php");
		
	$id_informe = $_POST['id_informe'];



          //VALIDO SI EL ESTADO ESTA TERMINADO PARA ASI IMPRIMIR EL PDF 	
      $query_1 = mysqli_prepare($connect,"SELECT estado FROM aprobacion_informes WHERE id_informe = ? AND estado = 2");
      mysqli_stmt_bind_param($query_1, 'i', $id_informe);
      mysqli_stmt_execute($query_1);
      mysqli_stmt_store_result($query_1);
      mysqli_stmt_bind_result($query_1, $estado);
      mysqli_stmt_fetch($query_1);

      if(mysqli_stmt_num_rows($query_1) > 0){

        echo "Ver";
      }else{
        echo "No";
      }
    
    
 


	



	mysqli_stmt_close($connect);
?>