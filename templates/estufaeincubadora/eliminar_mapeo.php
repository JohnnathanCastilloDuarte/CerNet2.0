<?php
	include("../../config.ini.php");

	$id_mapeo = $_POST['id_mapeo_estufaeincubadora'];
	$id_asignado = $_POST['id_asignado_estufaeincubadora'];
	$id_valida = $_POST['id_valida_estufaeincubadora'];

	/////////////////////////////CONSULTA DE INFORMACIÓN PARA EL BACKTRAKING//////////////////////////////////////////////////////////////////
/*
	$consultar_item = mysqli_prepare($connect,"SELECT a.servicio, d.numot FROM servicio_tipo as a, item_asignado as b, servicio as c, numot as d  WHERE b.id_asignado = $id_asignado 		AND c.id_servicio = b.id_servicio 	 AND  c.id_servicio_tipo = 	a.id_servicio_tipo AND c.id_numot = d.id_numot ");
	mysqli_stmt_execute($consultar_item);
	mysqli_stmt_store_result($consultar_item);
	mysqli_stmt_bind_result($consultar_item,  $nombre_servicio, $ot);
	mysqli_stmt_fetch($consultar_item);



	$antiguo_mapeo = mysqli_prepare($connect,"SELECT nombre FROM refrigerador_mapeo WHERE id_mapeo = $id_mapeo");
	mysqli_stmt_execute($antiguo_mapeo);
	mysqli_stmt_store_result($antiguo_mapeo);
	mysqli_stmt_bind_result($antiguo_mapeo, $viejo_mapeo);
	mysqli_stmt_fetch($antiguo_mapeo);

	$mensaje = "Ha eliminado el mapeo: ".$viejo_mapeo." para el servicio: ".$nombre_servicio." y la OT: ".$ot;
	$tipo_historial = 3;

	$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_refrigeradores (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
	mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
	mysqli_stmt_execute($insertando_historial); 

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////FIN DE INGRESO DEL BACKTRAKING///////////////////////////////////////////////////////////////////////////////////////////
*/

    $segundo_filtro = mysqli_prepare($connect, "SELECT id_mapeo FROM estufaeincubadora_sensor WHERE id_mapeo = $id_mapeo");
    mysqli_stmt_execute($segundo_filtro);
    mysqli_stmt_store_result($segundo_filtro);
    mysqli_stmt_bind_result($segundo_filtro, $id_mapeo_e);
    mysqli_stmt_fetch($segundo_filtro);
      
    if($id_mapeo_e){ 

      $primer_filtro = mysqli_prepare($connect, "SELECT id_mapeo FROM informe_estufaeincubadora WHERE id_mapeo = $id_mapeo");
      mysqli_stmt_execute($primer_filtro);
      mysqli_stmt_store_result($primer_filtro);
      mysqli_stmt_bind_result($primer_filtro, $id_mapeo_existente);
      mysqli_stmt_fetch($primer_filtro);

      if($id_mapeo_existente){

            echo "1";
          }else{
            echo "2";
          }

      }else{
		
		$eliminar = mysqli_prepare($connect,"DELETE FROM estufaeincubadora_mapeo WHERE id_mapeo = $id_mapeo");
		mysqli_stmt_execute($eliminar);
		
		if($eliminar){
			echo "Eliminado";
		}else{
			echo "Error interno";
		}
	}

mysqli_stmt_close($connect);

?>