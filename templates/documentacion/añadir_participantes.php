<?php 
  $parametro = $_GET['clave'];
  
  $smarty->assign("id_documentacion",$parametro);
  
  $array_empresa = array();

  $consulta = mysqli_prepare($connect,"SELECT c.id_empresa, c.nombre FROM documentacion as a, numot as b, empresa as c WHERE b.id_numot = a.id_numot AND b.id_empresa = c.id_empresa AND a.id = ?");
  mysqli_stmt_bind_param($consulta, 'i', $parametro);
  mysqli_stmt_execute($consulta);
  mysqli_stmt_store_result($consulta);
  mysqli_stmt_bind_result($consulta, $id_empresa, $nombre_empresa);
  
    
   
  
  while($row = mysqli_stmt_fetch($consulta)){
    $array_empresa[] = array(
      'id_empresa'=>$id_empresa,
      'nombre_empresa'=>$nombre_empresa
    );
  }

  $smarty->assign("array_empresa_documentacion",$array_empresa);

  $smarty->display("documentacion/añadir_participantes.tpl");
?>