<?php 
	require("../../config.ini.php");

	$perfil = $_POST['perfil'];
  
  $query2 = mysqli_prepare($connect,"SELECT id_privilegio, Modulos, Control_cambios, Usuarios, Clientes, Items, Ordenes_trabajo, Servicios, Informes, Documentacion FROM privilegio WHERE perfil = ?");
  mysqli_stmt_bind_param($query2, 's', $perfil);
  mysqli_stmt_execute($query2);
  mysqli_stmt_store_result($query2);
  mysqli_stmt_bind_result($query2, $id_privilegio, $primer_modulo, $segundo_modulo, $tercer_modulo, $cuarto_modulo, $quinto_modulo, $sexto_modulo, $septimo_modulo, $octavo_modulo, $noveno_modulo);


	$json = array();
	
	while($fila = mysqli_stmt_fetch($query2)){
		
		$json[]=array(
			'id'=>$id_privilegio,
      'modulo_1'=>$primer_modulo,
      'modulo_2'=>$segundo_modulo,
      'modulo_3'=>$tercer_modulo,
      'modulo_4'=>$cuarto_modulo,
      'modulo_5'=>$quinto_modulo,
      'modulo_6'=>$sexto_modulo,
      'modulo_7'=>$septimo_modulo,
      'modulo_8'=>$octavo_modulo,
      'modulo_9'=>$noveno_modulo
		);
	}

	$jsonString = json_encode($json);
	
		echo $jsonString;
	
mysqli_close($connect);
  
?>