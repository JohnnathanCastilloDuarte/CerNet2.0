<?php 
error_reporting(0);
include("../../config.ini.php");

$ot = 'OT-'.$_POST['ot'];

$consultar = mysqli_prepare($connect,"SELECT a.id_numot, a.numot ,a.id_usuario_asignado, c.nombre, c.apellido, d.nombre, e.departamento, a.id_empresa, a.fecha_creacion, a.fecha_asignacion, b.nombre, a.cantidad_informes FROM numot as a, empresa as b, persona as c, cargo as d, departamento as e WHERE a.id_empresa = b.id_empresa AND numot = ? AND a.id_usuario_asignado = c.id_usuario AND c.id_cargo = d.id_cargo AND d.id_departamento = e.id;");

mysqli_stmt_bind_param($consultar , 's', $ot);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $id_numot, $num_ot, $id_usuario_asignado, $nombre, $apellido, $departamento, $cargo,  $id_empresa, $fecha_creacion, $fecha_asignacion, $empresa, $cantidad_informes);


if($consultar != null){
	$json = array();
	while($row = mysqli_stmt_fetch($consultar)){
		$json[] = array(
			'id_numot'=>$id_numot,	
			'num_ot'=>$num_ot,
			'id_usuario'=>$id_usuario_asignado,
			'nombre'=>$nombre,
			'apellido'=>$apellido,
			'departamento'=>$departamento,
			'cargo'=>$cargo,	
			'id_empresa'=>$id_empresa,
			'fecha_creacion'=>$fecha_creacion,
			'fecha_asignacion'=>$fecha_asignacion,	
			'empresa'=>$empresa,
			'cantidad_informes'=>$cantidad_informes	
		);
	}
	
	$convert = json_encode($json[0]);

	echo $convert;

}else{
	echo "Sin resultado";
}




mysqli_close($connect);


?>