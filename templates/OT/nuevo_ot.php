<?php 
error_reporting(0);

include("../../config.ini.php");

$num_ot = 'OT'.$_POST['num_ot'];
$empresa= $_POST['empresa'];
$c_informes= $_POST['c_informes'];
$u_asignado= $_POST['u_asignado'];
$f_creacion= $_POST['f_creacion'];
$f_asignacion= $_POST['f_asignacion'];
$u_creador = $_POST['u_creador'];
$id_valida = $_POST['id_valida'];
$id_empresa = $_POST['id_empresa'];


$consultar_persona = mysqli_prepare($connect,"SELECT nombre, apellido FROM persona WHERE id_usuario = ?");
mysqli_stmt_bind_param($consultar_persona, 'i', $u_asignado);
mysqli_stmt_execute($consultar_persona);
mysqli_stmt_store_result($consultar_persona);
mysqli_stmt_bind_result($consultar_persona, $nombre , $apellido);
mysqli_stmt_fetch($consultar_persona);


$consultar_empresa = mysqli_prepare($connect,"SELECT nombre FROM empresa WHERE id_empresa = ?");
mysqli_stmt_bind_param($consultar_empresa, 'i', $empresa);
mysqli_stmt_execute($consultar_empresa);
mysqli_stmt_store_result($consultar_empresa);
mysqli_stmt_bind_result($consultar_empresa, $empresa_nueva);
mysqli_stmt_fetch($consultar_empresa);


$mensaje = "Ha creado una nuevo OT: ".$num_ot.", para la empresa: ".$empresa_nueva.", asignadas al usuario: ".$nombre." ".$apellido;
$tipo_historial = 1;

//insertar en el backtraking 
//1 insertar en la tabla historal_modulo

$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_numot (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
mysqli_stmt_execute($insertando_historial);
mysqli_stmt_store_result($insertando_historial);	





$insertar = mysqli_prepare($connect,"INSERT INTO numot (numot, id_empresa, cantidad_informes, fecha_creacion, fecha_asignacion, id_usuario_asignado, id_usuario) VALUES
(?, ?, ?, ?, ?, ?, ?)");

mysqli_stmt_bind_param($insertar, 'siissii', $num_ot, $id_empresa, $c_informes, $f_creacion, $f_asignacion, $u_asignado, $u_creador);
mysqli_stmt_execute($insertar);
mysqli_stmt_store_result($insertar);


$consultar_ultimo = mysqli_prepare($connect,"SELECT id_numot FROM numot ORDER BY fecha_registro DESC LIMIT 1");
mysqli_stmt_execute($consultar_ultimo);
mysqli_stmt_store_result($consultar_ultimo);
mysqli_stmt_bind_result($consultar_ultimo, $id_ultimo_numot);

$json	= array();

while($row = mysqli_stmt_fetch($consultar_ultimo)){
$json[] = array(
'id_ultimo'=>$id_ultimo_numot
);
}

$convert = json_encode($json[0]);

echo $convert;

mysqli_stmt_close($connect);
	
?>