<?php 
include("../../config.ini.php");

if ($_POST['accion'] == 'buscarot') {

	$id_usuario = $_POST['id_valida'];
	
	//consultar id_empresa
	$idempresa = mysqli_prepare($connect,"SELECT b.id_empresa FROM persona a, empresa b
			  WHERE a.id_usuario = ? AND b.id_empresa = a.id_empresa");
	mysqli_stmt_bind_param($idempresa, 'i', $id_usuario);
 	mysqli_stmt_execute($idempresa);
 	mysqli_stmt_store_result($idempresa);
 	mysqli_stmt_bind_result($idempresa, $id_empresa);
 	mysqli_stmt_fetch($idempresa);	

 	if ($id_empresa) {

	//consultar buscarOT
	$buscarOT = mysqli_prepare($connect,"SELECT id_numot, numot FROM numot WHERE id_empresa = $id_empresa");
	mysqli_stmt_execute($buscarOT);
	mysqli_stmt_store_result($buscarOT);
	mysqli_stmt_bind_result($buscarOT, $id_numot, $numot);
	//mysqli_stmt_fetch($buscarOT);	

while($row = mysqli_stmt_fetch($buscarOT)){
	$array_buscarOT[] = array(
		    'id_numot'=>$id_numot,
			'numot'=>$numot
	);	
}

	$convert = json_encode($array_buscarOT); 

	echo $convert;
	
 	}else{
 		echo "No se encontraron OT asignadas";
 	}



}elseif($_POST['accion'] == 'buscarservicio'){

	$id_ot = $_POST['id_numot'];

	$buscarservicios = mysqli_prepare($connect,"SELECT a.id_servicio, b.servicio
					FROM servicio a, servicio_tipo b
					WHERE a. id_numot = $id_ot AND a.id_servicio_tipo=b.id_servicio_tipo");
	mysqli_stmt_execute($buscarservicios);
	mysqli_stmt_store_result($buscarservicios);
	mysqli_stmt_bind_result($buscarservicios, $id_servicio, $servicio);

	
	while($row = mysqli_stmt_fetch($buscarservicios)){
		$array_buscarservicios[] = array(
			    'id_servicio'=>$id_servicio,
				'servicio'=>$servicio
		);	
	}

		$convert = json_encode($array_buscarservicios); 
		echo $convert;

		//echo "No se encontraron servicios asignados";
	
}elseif($_POST['accion'] == 'buscarinforme') {
	
	$id_servicio = $_POST['id_servicio'];

	$buscar_item_asignado = mysqli_prepare($connect,"SELECT id_asignado
					FROM item_asignado
					WHERE id_servicio = $id_servicio");
	mysqli_stmt_execute($buscar_item_asignado);
	mysqli_stmt_store_result($buscar_item_asignado);
	mysqli_stmt_bind_result($buscar_item_asignado, $id_asignado);
	mysqli_stmt_fetch($buscar_item_asignado);


	if ($id_asignado) {

		$consultar = mysqli_prepare($connect,"SELECT id_informe, nombre, tipo, fecha_registro FROM informes_general WHERE id_asignado = ? ");
	    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
	    mysqli_stmt_execute($consultar);
	    mysqli_stmt_store_result($consultar);
	    mysqli_stmt_bind_result($consultar, $id_informe, $nombre, $tipo, $fecha_registro);

	    while($row = mysqli_stmt_fetch($consultar)){

	        $array_informes[]=array(
	            'id_informe'=>$id_informe,
	            'nombre'=>$nombre,
	            'tipo'=>$tipo,
	            'fecha_registro'=>$fecha_registro
	        );
	    }
	    $convert = json_encode($array_informes); 
		echo $convert;

	}




}


 ?>