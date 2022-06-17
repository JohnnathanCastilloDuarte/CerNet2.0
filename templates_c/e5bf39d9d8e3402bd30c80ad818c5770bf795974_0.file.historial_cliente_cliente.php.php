<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-23 11:42:11
  from '/var/www/html/Pruebas_Desarrollo/templates/cliente/historial_cliente_cliente.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6b5ec3bbc5b1_87119662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5bf39d9d8e3402bd30c80ad818c5770bf795974' => 
    array (
      0 => '/var/www/html/Pruebas_Desarrollo/templates/cliente/historial_cliente_cliente.php',
      1 => 1600872118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6b5ec3bbc5b1_87119662 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php 

	';?>
$smarty->display('cliente/historial_cliente_cliente.php');

	$query = "SELECT a.id_empresa FROM persona as a, usuario as b WHERE a.id_usuario = ? AND a.id_usuario = b.id_usuario";
	$execute_query = mysqli_prepare($connect,$query);
	mysqli_stmt_bind_param($execute_query, 'i', $mi_id);
	mysqli_stmt_execute($execute_query);
	mysqli_stmt_store_result($execute_query);
	mysqli_stmt_bind_result($execute_query, $id_empresa);
	mysqli_stmt_fetch($execute_query);

	//CONSULTAR HISTORIAL DEL MODULO
	$consultar_historial = mysqli_prepare($connect,"SELECT b.nombre, b.apellido, a.mensaje_historial, a.tipo_historial, a.fecha_registro FROM 
																									persona as b, historial_empresa as a WHERE a.id_usuario = b.id_usuario AND b.id_empresa = 																															$id_empresa");

	mysqli_stmt_execute($consultar_historial);
	mysqli_stmt_store_result($consultar_historial);
	mysqli_stmt_bind_result($consultar_historial, $nombre, $apellido, $mensaje, $tipo_historial, $fecha_registro);

	$array_historial = array();

	while($row = mysqli_stmt_fetch($consultar_historial)){
		$array_historial[]=array(
			'nombre'=>$nombre,
			'apellido'=>$apellido,
			'mensaje'=>$mensaje,
			'tipo_historial'=>$tipo_historial,
			'fecha_registro'=>$fecha_registro
		);
		
	}

	$smarty->assign("array_historial",$array_historial);

	$smarty->assign("color","");




<?php echo '?>';
}
}
