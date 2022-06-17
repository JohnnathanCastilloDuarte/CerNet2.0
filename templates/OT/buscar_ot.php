<?php 
error_reporting(0);
include("../../config.ini.php");

$ot = 'OT'.$_POST['ot'];


$primera_consulta = mysqli_prepare($connect,'SELECT id_numot, numot ,id_usuario_asignado, id_empresa, fecha_creacion, fecha_asignacion
FROM numot as a WHERE  numot = ?');
mysqli_stmt_bind_param($primera_consulta , 's', $ot);
mysqli_stmt_execute($primera_consulta);
mysqli_stmt_store_result($primera_consulta);
mysqli_stmt_bind_result($primera_consulta, $id_numot, $num_ot, $id_usuario_asignado, $id_empresad, $fecha_creacion, $fecha_asignacion);

if(mysqli_stmt_num_rows($primera_consulta) != 0){

	while($row = mysqli_stmt_fetch($primera_consulta)){

		$consulta_complemento = mysqli_prepare($connect, "SELECT nombre, apellido FROM persona WHERE id_usuario = ?");
		mysqli_stmt_bind_param($consulta_complemento, 'i', $id_usuario_asignado);
		mysqli_stmt_execute($consulta_complemento);
		mysqli_stmt_store_result($consulta_complemento);
		mysqli_stmt_bind_result($consulta_complemento, $nombre, $apellido);
		mysqli_stmt_fetch($consulta_complemento);

		$consulta_complemento2 = mysqli_prepare($connect,"SELECT nombre FROM empresa WHERE id_empresa = ?");
		mysqli_stmt_bind_param($consulta_complemento2, 'i', $id_empresad);
		mysqli_stmt_execute($consulta_complemento2);
		mysqli_stmt_store_result($consulta_complemento2);
		mysqli_stmt_bind_result($consulta_complemento2, $empresa);
		mysqli_stmt_fetch($consulta_complemento2);


		$json = array();

		$json[] = array(
			'id_numot'=>$id_numot,	
			'num_ot'=>$num_ot,
			'id_usuario'=>$id_usuario_asignado,
			'nombre'=>$nombre,
			'apellido'=>$apellido,
			'id_empresa'=>$id_empresad,
			'fecha_creacion'=>$fecha_creacion,
			'fecha_asignacion'=>$fecha_asignacion,	
			'empresa'=>$empresa
		);

		$convert = json_encode($json[0]);

		echo $convert;

	}

}else{
	echo "Sin resultado";
}

mysqli_close($connect);
?>