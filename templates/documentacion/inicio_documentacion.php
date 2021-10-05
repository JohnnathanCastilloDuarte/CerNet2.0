<?php 

  $consultar_empresa = mysqli_prepare($connect,"SELECT id_empresa, nombre FROM empresa ORDER BY nombre ASC");
  mysqli_stmt_execute($consultar_empresa);
  mysqli_stmt_store_result($consultar_empresa);
  mysqli_stmt_bind_result($consultar_empresa, $id_empresa, $nombre);

   
  
  $array_empresa = array();

  while($row = mysqli_stmt_fetch($consultar_empresa)){
    
    $array_empresa[] = array (
      'id_empresa'=>$id_empresa,
      'nombre_empresa'=>$nombre
    );
  }

  $smarty->assign("array_empresa",$array_empresa);


  $smarty->display("documentacion/inicio_documentacion.tpl");

?>