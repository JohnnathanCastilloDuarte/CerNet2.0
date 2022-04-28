<?php 
include('../../config.ini.php');

$orden = $_POST['orden'];


////BUSCAR INFORMACION DEL INFORME
if ($orden == 1) {
	$array_informe = array();
	$id_asignado = $_POST['id_asignado'];

	$buscar_informe = mysqli_prepare($connect, "SELECT id, nombre_informe, solicitante, usuario_responsable, atencion_a, n_actas, conclusion FROM aire_comprimido_informe WHERE id_asignado = ?");
		mysqli_stmt_bind_param($buscar_informe, 'i', $id_asignado);
		mysqli_stmt_execute($buscar_informe);
		mysqli_stmt_store_result($buscar_informe);
		mysqli_stmt_bind_result($buscar_informe,$id_informe, $nombre_informe, $solicitante, $usuario_responsable, $atencion_a, $n_actas, $conclusion);

		while ($row = mysqli_stmt_fetch($buscar_informe)) {
		   $array_informe[]= array(
		   		'id_informe' => $id_informe,
				'nombre_informe' => $nombre_informe,
				'solicitante' => $solicitante,
				'usuario_responsable' => $usuario_responsable,
				'atencion_a' => $atencion_a,
				'n_actas' => $n_actas,
				'conclusion' => $conclusion
		   );
		}	

		$convert = json_encode($array_informe);  

		echo $convert;	

/////BUSCA LA INFORMACION DE NORMA 
}elseif ($orden == 2) {

	$array_item = array();
	$id_asignado = $_POST['id_asignado'];

	$buscar_items = mysqli_prepare($connect, "SELECT a.id, a.id_asignado,a.id_item_aire_comprimido, a.conteo_particulas, a.punto_rocio, a.temperatura, a.humedad_relativa, a.presencia_aceite, a.presencia_agua, a.cumple_clases, b.nombre_sala 
		FROM aire_comprimido_prueba_1 a, item_aire_comprimido b 
		WHERE a.id_item_aire_comprimido = b.id_aire_comprimido AND a.id_asignado = ?");
		mysqli_stmt_bind_param($buscar_items, 'i', $id_asignado);
		mysqli_stmt_execute($buscar_items);
		mysqli_stmt_store_result($buscar_items);
		mysqli_stmt_bind_result($buscar_items, $id, $id_asignado, $id_item_aire_comprimido, $conteo_particulas, $punto_rocio, $temperatura, $humedad_relativa, $presencia_aceite, $presencia_agua, $cumple_clases, $nombre_sala);
	

	while ($row = mysqli_stmt_fetch($buscar_items)) {
		   $array_item[]= array(
		   		'id' => $id,
				'id_asignado' => $id_asignado,
				'id_item_aire_comprimido' => $id_item_aire_comprimido,
				'conteo_particulas' => $conteo_particulas,
				'punto_rocio' => $punto_rocio,
				'temperatura' => $temperatura,
				'humedad_relativa' => $humedad_relativa,
				'presencia_aceite' => $presencia_aceite,
				'presencia_agua' => $presencia_agua,
				'cumple_clases' => $cumple_clases,
				'nombre_sala' => $nombre_sala
		   );
		}	

		$convert = json_encode($array_item);  

		echo $convert;	

}elseif($orden == 3) {
	$array_inspecion_visual = array();
	$id_asignado = $_POST['id_asignado'];

		$inspeccion_visual = mysqli_prepare($connect, "SELECT id, insp_1, insp_2, insp_3, insp_4, insp_5
		FROM aire_comprimido_inspeccion
		WHERE id_asignado = ?");
		mysqli_stmt_bind_param($inspeccion_visual, 'i', $id_asignado);
		mysqli_stmt_execute($inspeccion_visual);
		mysqli_stmt_store_result($inspeccion_visual);
		mysqli_stmt_bind_result($inspeccion_visual,$id_inspeccion_visual, $insp_1, $insp_2, $insp_3, $insp_4, $insp_5);
	

	while ($row = mysqli_stmt_fetch($inspeccion_visual)) {
		   $array_inspecion_visual[]= array(
		   		'id_inspeccion_visual' => $id_inspeccion_visual,
				'insp_1' => $insp_1,
				'insp_2' => $insp_2,
				'insp_3' => $insp_3,
				'insp_4' => $insp_4,
				'insp_5' => $insp_5
		   );
		}	

		$convert = json_encode($array_inspecion_visual);  

		echo $convert;	

}elseif ($orden == 4) {
	$array_mediciones = array();
	$id_asignado = $_POST['id_asignado'];

	$buscar_mediciones = mysqli_prepare($connect, "SELECT a.id, a.volumen_muestreo, a.clase_iso, a.medicion_1, a.medicion_2, a.medicion_3, a.cumple, a.n_medicion, b.nombre_sala 
		FROM aire_comprimido_mediciones a, item_aire_comprimido b 
		WHERE a.id_item_aire_comprimido = b.id_aire_comprimido AND id_asignado = ?");
		mysqli_stmt_bind_param($buscar_mediciones, 'i', $id_asignado);
		mysqli_stmt_execute($buscar_mediciones);
		mysqli_stmt_store_result($buscar_mediciones);
		mysqli_stmt_bind_result($buscar_mediciones,$id_medicion, $volumen_muestreo, $clase_iso, $medicion_1, $medicion_2, $medicion_3, $cumple, $n_medicion, $nombre_sala);
	

	while ($row = mysqli_stmt_fetch($buscar_mediciones)) {
		   $array_mediciones[]= array(
		   		'id_medicion' => $id_medicion,
				'volumen_muestreo' => $volumen_muestreo,
				'clase_iso' => $clase_iso,
				'medicion_1' => $medicion_1,
				'medicion_2' => $medicion_2,
				'medicion_3' => $medicion_3,
				'cumple' => $cumple,
				'n_medicion' => $n_medicion,
				'nombre_sala' => $nombre_sala
		   );
		}	

		$convert = json_encode($array_mediciones);  

		echo $convert;	
	
}elseif ($orden == 5) {
	$array_mediciones_temperatura = array();
	$id_asignado = $_POST['id_asignado'];

	$buscar_mediciones = mysqli_prepare($connect, "SELECT a.id, a.tiempo_muestreo, a.clase_iso, a.medicion_1, a.medicion_2, a.medicion_3, a.cumple, b.nombre_sala, b.punto_uso_aire_comprimido 
		FROM aire_comprimido_mediciones_temp a, item_aire_comprimido b 
		WHERE a.id_item_aire_comprimido = b.id_aire_comprimido AND id_asignado = ?");
		mysqli_stmt_bind_param($buscar_mediciones, 'i', $id_asignado);
		mysqli_stmt_execute($buscar_mediciones);
		mysqli_stmt_store_result($buscar_mediciones);
		mysqli_stmt_bind_result($buscar_mediciones,$id_medicion, $tiempo_muestreo, $clase_iso, $medicion_1, $medicion_2, $medicion_3, $cumple, $nombre_sala, $punto_uso_aire_comprimido);

	while ($row = mysqli_stmt_fetch($buscar_mediciones)) {
		   $array_mediciones_temperatura[]= array(
		   		'id_medicion' => $id_medicion,
				'tiempo_muestreo' => $tiempo_muestreo,
				'clase_iso' => $clase_iso,
				'medicion_1' => $medicion_1,
				'medicion_2' => $medicion_2,
				'medicion_3' => $medicion_3,
				'cumple' => $cumple,
				'nombre_sala' => $nombre_sala,
				'punto_uso_aire_comprimido'=>$punto_uso_aire_comprimido
		   );
		}	

		$convert = json_encode($array_mediciones_temperatura);  

		echo $convert;	

}elseif ($orden == 6) {
	$array_requisitos = array();
	$id_asignado = $_POST['id_asignado'];

	$buscar_requisitos = mysqli_prepare($connect, "SELECT id, id_asignado, clase, informacion_1, informacion_2, informacion_3, tipo, fecha_registro
		FROM aire_comprimido_requisitos
		WHERE id_asignado = ?");
		mysqli_stmt_bind_param($buscar_requisitos, 'i', $id_asignado);
		mysqli_stmt_execute($buscar_requisitos);
		mysqli_stmt_store_result($buscar_requisitos);
		mysqli_stmt_bind_result($buscar_requisitos, $id, $id_asignado, $clase, $informacion_1, $informacion_2, $informacion_3, $tipo, $fecha_registro);

	while ($row = mysqli_stmt_fetch($buscar_requisitos)) {
		   $array_requisitos[]= array(
		   		'id' => $id,
				'id_asignado' => $id_asignado,
				'clase' => $clase,
				'informacion_1' => $informacion_1,
				'informacion_2' => $informacion_2,
				'informacion_3' => $informacion_3,
				'tipo' => $tipo,
				'fecha_registro' => $fecha_registro
		   );
		}	

		$convert = json_encode($array_requisitos);  

		echo $convert;	
}


 elseif ($orden == 100) {

	$id_asignado = $_POST['id_asignado'];
	
	$validador1 = mysqli_prepare($connect,"SELECT id FROM aire_comprimido_informe WHERE id_asignado = ?");
			      mysqli_stmt_bind_param($validador1, 'i', $id_asignado);
			      mysqli_stmt_execute($validador1);
			      mysqli_stmt_store_result($validador1);
			      mysqli_stmt_bind_result($validador1, $id_prueba);
			      mysqli_stmt_fetch($validador1);


	if(mysqli_stmt_num_rows($validador1) == 0){

            $creando1 = mysqli_prepare($connect,"INSERT INTO aire_comprimido_informe (id_asignado) VALUES (?)");
            mysqli_stmt_bind_param($creando1, 'i', $id_asignado);
            mysqli_stmt_execute($creando1);
     }

///////VALIDADOR Y CREADOR DE PRUEBA1	
}elseif ($orden == 200){

	$id_asignado = $_POST['id_asignado'];
	$array_resultado = array();
	$array_resultado_2 = array();

	$validador2 = mysqli_prepare($connect,"SELECT id FROM aire_comprimido_prueba_1 WHERE id_asignado = ?");
			      mysqli_stmt_bind_param($validador2, 'i', $id_asignado);
			      mysqli_stmt_execute($validador2);
			      mysqli_stmt_store_result($validador2);
			      mysqli_stmt_bind_result($validador2, $id_prueba);
			      mysqli_stmt_fetch($validador2);

	$validador2_1 = mysqli_prepare($connect,"SELECT a.id_aire_comprimido 
											FROM item_aire_comprimido a, item_asignado b 
											WHERE a.id_item = b.id_item AND b.id_asignado = ?");
			      mysqli_stmt_bind_param($validador2_1, 'i', $id_asignado);
			      mysqli_stmt_execute($validador2_1);
			      mysqli_stmt_store_result($validador2_1);
			      mysqli_stmt_bind_result($validador2_1, $id_item_aire_comprimido);


			          while($row = mysqli_stmt_fetch($validador2_1)){

				        $array_resultado[] = array(
				           'id_item_aire_comprimido'=>$id_item_aire_comprimido
				        );
				    }

			      //Busca el total de los registros 
    $validador2_2 = mysqli_prepare($connect,"SELECT DISTINCT  a.id_aire_comprimido FROM item_aire_comprimido a, aire_comprimido_mediciones b 
											WHERE a.id_aire_comprimido = b.id_item_aire_comprimido AND b.id_asignado = ?");
			      mysqli_stmt_bind_param($validador2_2, 'i', $id_asignado);
			      mysqli_stmt_execute($validador2_2);
			      mysqli_stmt_store_result($validador2_2);
			      mysqli_stmt_bind_result($validador2_2, $id_aire_medicion);
			      

			      while ($row2 = mysqli_stmt_fetch($validador2_2)) {

			      	$array_resultado_2[] = array(

			      	'id_aire_medicion' => $id_aire_medicion
			      	);
			      }


/*	$validador2_3 = mysqli_prepare($connect,"SELECT count(a.id_aire_comprimido) FROM item_aire_comprimido a, item_asignado b 
											WHERE a.id_item = b.id_item AND b.id_asignado = ?");
			      mysqli_stmt_bind_param($validador2_3, 'i', $id_asignado);
			      mysqli_stmt_execute($validador2_3);
			      mysqli_stmt_store_result($validador2_3);
			      mysqli_stmt_bind_result($validador2_3, $total_items);
			      mysqli_stmt_fetch($validador2_3);
			   	      		      */
			   	      
			      //buscar el total de regisrtos 
			//    echo $total_medicion = $total_mediciones / 3;  

			  //  echo $total_items;

			    //Variable mostrara el total de areas de aire  asigandos al item
			    $total_items= count($array_resultado);
			    //Variable contara el total de areas en el informe
			    $total_item_informe = count($array_resultado_2);

			   // echo $total_item_informe;

	/*if(mysqli_stmt_num_rows($validador2) == 0){

        for($i2 = 0; $i2<count($array_resultado); $i2++){

        	//Se crea informacion en  la tabla de aire comprimido 
            $creando2 = mysqli_prepare($connect,"INSERT INTO aire_comprimido_prueba_1 (id_asignado, id_item_aire_comprimido) VALUES (?,?)");
            mysqli_stmt_bind_param($creando2, 'ii', $id_asignado, $array_resultado[$i2]['id_item_aire_comprimido']);
            mysqli_stmt_execute($creando2);
            //Se crean lo items en la tabla de validaciones por temperatura
            $creando2_0 = mysqli_prepare($connect,"INSERT INTO aire_comprimido_mediciones_temp (id_asignado, id_item_aire_comprimido) VALUES (?,?)");
            mysqli_stmt_bind_param($creando2_0, 'ii', $id_asignado, $array_resultado[$i2]['id_item_aire_comprimido']);
            mysqli_stmt_execute($creando2_0);

            //Se insertan los items segun el validador 
            $creando2_1 = mysqli_prepare($connect,"INSERT INTO aire_comprimido_mediciones (id_asignado, id_item_aire_comprimido, n_medicion) VALUES (?,?,1)");
            mysqli_stmt_bind_param($creando2_1, 'ii', $id_asignado, $array_resultado[$i2]['id_item_aire_comprimido']);
            mysqli_stmt_execute($creando2_1);

            $creando2_2 = mysqli_prepare($connect,"INSERT INTO aire_comprimido_mediciones (id_asignado, id_item_aire_comprimido, n_medicion) VALUES (?,?,2)");
            mysqli_stmt_bind_param($creando2_2, 'ii', $id_asignado, $array_resultado[$i2]['id_item_aire_comprimido']);
            mysqli_stmt_execute($creando2_2);

            $creando2_3 = mysqli_prepare($connect,"INSERT INTO aire_comprimido_mediciones (id_asignado, id_item_aire_comprimido, n_medicion) VALUES (?,?,3)");
            mysqli_stmt_bind_param($creando2_3, 'ii', $id_asignado, $array_resultado[$i2]['id_item_aire_comprimido']);
            mysqli_stmt_execute($creando2_3);

        } 

     echo "listo//";
    }else */if ($total_items > $total_item_informe ){ 

		    	for ($i3=0; $i3 < $total_items ; $i3++) { 
		    		
			    		if ($array_resultado[$i3]['id_item_aire_comprimido'] == $array_resultado_2[$i3]['id_aire_medicion']){
			    			echo "ok";
			    			echo $total_items;

			    		}elseif($array_resultado[$i3]['id_item_aire_comprimido'] != $array_resultado_2[$i3]['id_aire_medicion']){
			    			
				    			//Se crea informacion en  la tabla de aire comprimido 
					            $creando2 = mysqli_prepare($connect,"INSERT INTO aire_comprimido_prueba_1 (id_asignado, id_item_aire_comprimido) VALUES (?,?)");
					            mysqli_stmt_bind_param($creando2, 'ii', $id_asignado, $array_resultado[$i3]['id_item_aire_comprimido']);
					            mysqli_stmt_execute($creando2);
					            //Se crean lo items en la tabla de validaciones por temperatura
					            $creando2_0 = mysqli_prepare($connect,"INSERT INTO aire_comprimido_mediciones_temp (id_asignado, id_item_aire_comprimido) VALUES (?,?)");
					            mysqli_stmt_bind_param($creando2_0, 'ii', $id_asignado, $array_resultado[$i3]['id_item_aire_comprimido']);
					            mysqli_stmt_execute($creando2_0);

					            //Se insertan los items segun el validador 
					            $creando2_1 = mysqli_prepare($connect,"INSERT INTO aire_comprimido_mediciones (id_asignado, id_item_aire_comprimido, n_medicion) VALUES (?,?,1)");
					            mysqli_stmt_bind_param($creando2_1, 'ii', $id_asignado, $array_resultado[$i3]['id_item_aire_comprimido']);
					            mysqli_stmt_execute($creando2_1);

					            $creando2_2 = mysqli_prepare($connect,"INSERT INTO aire_comprimido_mediciones (id_asignado, id_item_aire_comprimido, n_medicion) VALUES (?,?,2)");
					            mysqli_stmt_bind_param($creando2_2, 'ii', $id_asignado, $array_resultado[$i3]['id_item_aire_comprimido']);
					            mysqli_stmt_execute($creando2_2);

					            $creando2_3 = mysqli_prepare($connect,"INSERT INTO aire_comprimido_mediciones (id_asignado, id_item_aire_comprimido, n_medicion) VALUES (?,?,3)");
					            mysqli_stmt_bind_param($creando2_3, 'ii', $id_asignado, $array_resultado[$i3]['id_item_aire_comprimido']);
			         		    mysqli_stmt_execute($creando2_3);

		         		  //  echo $array_resultado[$i3]['id_item_aire_comprimido'];

			    		}
		    	}
    
	}elseif($total_item_informe > $total_items ){

		for ($i3=0; $i3 < $total_item_informe; $i3++) { 
			
			   			if ($array_resultado_2[$i3]['id_aire_medicion'] == $array_resultado[$i3]['id_item_aire_comprimido']) {
			   				
			   			}elseif($array_resultado_2[$i3]['id_aire_medicion'] != $array_resultado[$i3]['id_item_aire_comprimido']){
							//eliminia informacion en  la tabla de aire comprimido 
				            $eliminar2 = mysqli_prepare($connect,"DELETE FROM aire_comprimido_prueba_1 WHERE id_asignado = ? AND id_item_aire_comprimido = ?");
				            mysqli_stmt_bind_param($eliminar2, 'ii', $id_asignado, $array_resultado_2[$i3]['id_aire_medicion']);
				            mysqli_stmt_execute($eliminar2);

				            //elimina lo items en la tabla de validaciones por temperatura
				            $eliminar2_0 = mysqli_prepare($connect,"DELETE FROM aire_comprimido_mediciones_temp WHERE id_asignado = ? AND id_item_aire_comprimido = ?");
				            mysqli_stmt_bind_param($eliminar2_0, 'ii', $id_asignado, $array_resultado_2[$i3]['id_aire_medicion']);
				            mysqli_stmt_execute($eliminar2_0);

				            //Se eliminan los items segun el validador 
				            $eliminar2_1 = mysqli_prepare($connect,"DELETE FROM aire_comprimido_mediciones WHERE id_asignado = ? AND id_item_aire_comprimido = ?");
				            mysqli_stmt_bind_param($eliminar2_1, 'ii', $id_asignado, $array_resultado_2[$i3]['id_aire_medicion']);
				            mysqli_stmt_execute($eliminar2_1);

				            $eliminar2_2 = mysqli_prepare($connect,"DELETE FROM aire_comprimido_mediciones WHERE id_asignado = ? AND id_item_aire_comprimido = ?");
				            mysqli_stmt_bind_param($eliminar2_2, 'ii', $id_asignado, $array_resultado_2[$i3]['id_aire_medicion']);
				            mysqli_stmt_execute($eliminar2_2);

				            $eliminar2_3 = mysqli_prepare($connect,"DELETE FROM aire_comprimido_mediciones WHERE id_asignado = ? AND id_item_aire_comprimido = ?");
				            mysqli_stmt_bind_param($eliminar2_3, 'ii', $id_asignado, $array_resultado_2[$i3]['id_aire_medicion']);
		         		    mysqli_stmt_execute($eliminar2_3);


		         		  /*  echo "((."$array_resultado_2[$i3]['id_aire_medicion']."))";*/
			   			}

		}

	}
//////VALIDADOR Y CREADOR DE LA INSPECCIÓN    
}elseif ($orden == 300) {
	
	$id_asignado = $_POST['id_asignado'];
	
	$validador3 = mysqli_prepare($connect,"SELECT id FROM aire_comprimido_inspeccion WHERE id_asignado = ?");
			      mysqli_stmt_bind_param($validador3, 'i', $id_asignado);
			      mysqli_stmt_execute($validador3);
			      mysqli_stmt_store_result($validador3);
			      mysqli_stmt_bind_result($validador3, $id_prueba);
			      mysqli_stmt_fetch($validador3);


	if(mysqli_stmt_num_rows($validador3) == 0){

            $creando3 = mysqli_prepare($connect,"INSERT INTO aire_comprimido_inspeccion (id_asignado) VALUES (?)");
            mysqli_stmt_bind_param($creando3, 'i', $id_asignado);
            mysqli_stmt_execute($creando3);
    }
    echo "Listo_inspeccion";

}elseif ($orden == 400) {
	$id_asignado = $_POST['id_asignado'];

	$validador4 = mysqli_prepare($connect,"SELECT id FROM aire_comprimido_requisitos WHERE id_asignado = ?");
			      mysqli_stmt_bind_param($validador4, 'i', $id_asignado);	
			      mysqli_stmt_execute($validador4);
			      mysqli_stmt_store_result($validador4);
			      mysqli_stmt_bind_result($validador4, $id_prueba);
			      mysqli_stmt_fetch($validador4);

	if (mysqli_stmt_num_rows($validador4) == 0) {

		for ($i=1; $i < 3; $i++) { 
			
		  $creando4 = mysqli_prepare($connect,"INSERT INTO aire_comprimido_requisitos (id_asignado,tipo) VALUES (?,?)");
            mysqli_stmt_bind_param($creando4, 'ii', $id_asignado, $i);
            mysqli_stmt_execute($creando4);
		}
	 }	
	 echo "listo_requisitos";		   	   
}

 ?>