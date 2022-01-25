<?php 
error_reporting(0);
include("../../config.ini.php");

$ot = 'OT'.$_POST['ot'];

$consultar = mysqli_prepare($connect,"SELECT a.id_numot, a.numot ,a.id_usuario_asignado, c.nombre, c.apellido, a.id_empresa, a.fecha_creacion, a.fecha_asignacion,
b.nombre FROM numot as a, empresa as b, persona as c WHERE a.id_empresa = b.id_empresa AND numot = ? AND a.id_usuario_asignado = c.id_usuario");
mysqli_stmt_bind_param($consultar , 's', $ot);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $id_numot, $num_ot, $id_usuario_asignado, $nombre, $apellido,  $id_empresa, $fecha_creacion, $fecha_asignacion, $empresa);


if($consultar != null){
	$json = array();
	while($row = mysqli_stmt_fetch($consultar)){
		$json[] = array(
			'id_numot'=>$id_numot,	
			'num_ot'=>$num_ot,
			'id_usuario'=>$id_usuario_asignado,
			'nombre'=>$nombre,
			'apellido'=>$apellido,
			'id_empresa'=>$id_empresa,
			'fecha_creacion'=>$fecha_creacion,
			'fecha_asignacion'=>$fecha_asignacion,	
			'empresa'=>$empresa
		);
	}
	
	$convert = json_encode($json[0]);

	echo $convert;

}else{
	echo "Sin resultado";
}




mysqli_close($connect);


?>