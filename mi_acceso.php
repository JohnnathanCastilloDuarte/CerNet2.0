<?php
session_start();
//LLAMADA AL ARCHIVO PRINCIPAL DE ACCESO A BASE DE DATOS E INTEGRACION DE SMARTY
include("config.ini.php");
$smarty->assign("error_0001","");
if(isset($_GET["error"]))
{
	switch($_GET["error"])
	{
		case 'error_0001':
			$smarty->assign("error_0001","<div class='alert alert-warning fade show' role='alert'>Error 0001: Usuario o contraseña erroneos</div>");
		break;
			
		case 'error_0002':
			$smarty->assign("error_0001","<div class='alert alert-warning fade show' role='alert'>Error 0002: Acceso no autorizado. Por favor inicie sesión</div>");
		break;	

		case 'error_0003':
			$smarty->assign("error_0001","<div class='alert alert-success fade show' role='alert'>Sesión cerrada correctamente.</div>");
		break;			
			
		default:
			$smarty->assign("error_0001","");
		break;			
			
	}
}
//ARRAYS DE MODULOS Y NAVEGAVILIDAD hace referencia al modulo ej: usuario = 1 
$smarty->assign('modulo',array('usuario' => 1));
$smarty->assign("page",array(1,2,3));

//HEADER PRINCIPAL DONDE SE GUARDA TODO LO QUE VA ENTRE LA ETIQUETA <HEAD></HEAD> DE HTML
$smarty->display("main_header.php"); 

$smarty->display("login.tpl");

$smarty->display("main_footer.php"); 
mysqli_close($connect); 
?>