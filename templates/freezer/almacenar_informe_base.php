<?php 
   include("../../config.ini.php");

   $conclusion_informe_base = $_POST['conclusion_informe_base'];
   $metodologia_informe_base = $_POST['metodologia_informe_base'];
   $conclusion_final_informe_base = $_POST['conclusion_final_informe_base'];
   $comentario_x_mapeo_base = $_POST['comentario_x_mapeo_base'];
   $id_mapeo_comentario = $_POST['id_mapeo_comentario'];
   $id_informe_mapeos = $_POST['id_informe_mapeos'];

   $query_2 = mysqli_prepare($connect,"UPDATE informe_freezer SET observacion = ?, comentarios = ?, concepto = ? WHERE id_informe_freezer = ?");
    mysqli_stmt_bind_param($query_2, 'sssi', $conclusion_informe_base, $metodologia_informe_base, $conclusion_final_informe_base, $id_informe_mapeos);
    mysqli_stmt_execute($query_2);
    
    if($query_2){
      echo "Creado";
    }   

  
    for($i = 0; $i <= count($id_mapeo_comentario);$i++){  
      $query = mysqli_prepare($connect,"UPDATE freezer_mapeo SET comentario = ?  WHERE id_mapeo = ?");
      mysqli_stmt_bind_param($query, 'si', $comentario_x_mapeo_base[$i], $id_mapeo_comentario[$i]);
      mysqli_stmt_execute($query);        
    }


  	mysqli_stmt_close($connect);
?>