<?php 
//consultar Empresas
error_reporting(0);
$consultar_empresas = mysqli_query($connect,"SELECT * FROM empresa");
$array_empresas = array();
while($fila = mysqli_fetch_array($consultar_empresas)){
	
	$array_empresas[]=$fila;
}
	$smarty->assign("array_empresas",$array_empresas);

$smarty->display("cliente/gestionar_cliente.tpl");
?>