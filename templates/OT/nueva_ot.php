<?php 
	error_reporting(0);
//CONSULTAR HISTORIAL DEL MODULO
	$consultar_historial = mysqli_prepare($connect,"SELECT b.nombre, b.apellido, a.mensaje_historial, a.tipo_historial, a.fecha_registro FROM 
	persona as b, historial_numot as a WHERE a.id_usuario = b.id_usuario ORDER BY fecha_registro DESC");

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




	$empresas = mysqli_prepare($connect,"SELECT id_empresa, nombre FROM empresa ");
	mysqli_stmt_execute($empresas);
	mysqli_stmt_store_result($empresas);
	mysqli_stmt_bind_result($empresas, $id_empresa, $nombre);

	$array_empresa = array();
	
	while($row = mysqli_stmt_fetch($empresas)){
    
		$array_empresa[] = array(
			'id_empresa'=>$id_empresa,
			'empresa'=>$nombre
		);		
	}

	$smarty->assign("array_empresa",$array_empresa);


	$personas = mysqli_prepare($connect,"SELECT a.id_persona, a.nombre, a.apellido,  c.departamento, b.nombre  FROM persona as a, departamento as c, cargo as b WHERE a.id_cargo = b.id_cargo AND b.id_departamento = c.id");
	mysqli_stmt_execute($personas);
	mysqli_stmt_store_result($personas);
	mysqli_stmt_bind_result($personas, $id_persona, $nombre, $apellido, $departamento, $cargo);

	$array_personas = array();

	while($row = mysqli_stmt_fetch($personas)){
		$array_personas[]=array(
		'id_persona'=>$id_persona,
		'nombre'=>$nombre,
		'apellido'=>$apellido,
		'departamento'=>$departamento,
		'cargo'=>$cargo	
		);
	}

	$smarty->assign('array_personas',$array_personas);

	$smarty->assign("algo","");
	$smarty->display("OT/nueva_ot.tpl");





?>