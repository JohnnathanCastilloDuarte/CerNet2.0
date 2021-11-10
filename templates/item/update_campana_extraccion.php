<?php 


$id_tipo = $_GET['type'];
$id_item = $_GET['item'];


echo "<input type='hidden' id='type_campana' value='".$id_tipo."'>";

echo "<input type='hidden' id='id_item_campana' value='".$id_item."'>";

$empresas = mysqli_prepare($connect,"SELECT id_empresa, nombre FROM empresa");
mysqli_stmt_execute($empresas);
mysqli_stmt_store_result($empresas);
mysqli_stmt_bind_result($empresas, $id_empresa, $nombre_empresa);

$array_empresa = array();

while($row = mysqli_stmt_fetch($empresas)){

$array_empresa[]=array(
  'id_empresa'=>$id_empresa,
  'nombre_empresa'=>$nombre_empresa	
  );
}

$smarty->assign("array_empresa",$array_empresa);

$smarty->display("item/update_campana_extraccion.tpl");    
?>