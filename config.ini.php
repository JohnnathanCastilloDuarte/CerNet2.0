<?php 
//base de datos de prueba db_desarrollo
//base de datos real cercal
include("smarty/libs/Smarty.class.php");

$smarty = new smarty;

$db_server='localhost';
$db_username='root';
$db_pass='';
//Variables para productivo
//$db_username='god_consultario';
//$db_pass='14ad7a591227b3733c6b9b56793bb10c';
$db_database='god_CerNet_2_0';
$connect = mysqli_connect($db_server,$db_username,$db_pass,$db_database);


	if($connect === false)
	{
		die("Error, no se puede establecer conexion a la base de datos ".mysqli_connect_error());
	}
mysqli_set_charset($connect,"utf8");
?>