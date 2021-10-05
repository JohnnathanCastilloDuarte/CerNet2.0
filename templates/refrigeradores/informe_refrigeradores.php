<?php 
	include("../../config.ini.php");

	$id_asignado = $_POST['id_asignado'];
	$id_valida = $_POST['id_valida'];

  

	//CONSULTAR LOS DATOS PARA GENERAR INFORMES
	
			//CONSULTAR CORRELATIVO 	
				$corr = mysqli_prepare($connect,"SELECT correlativo, id_servicio FROM item_asignado WHERE id_asignado = $id_asignado");
				mysqli_stmt_execute($corr);
				mysqli_stmt_store_result($corr);
				mysqli_stmt_bind_result($corr, $correlativo, $id_servicio);
				mysqli_stmt_fetch($corr);
  
		
			//CONSULTAR INFORMACIÓN EMPRESA
				$num_ot = mysqli_prepare($connect,"SELECT id_numot FROM servicio WHERE id_servicio = $id_servicio");
				mysqli_stmt_execute($num_ot);
				mysqli_stmt_store_result($num_ot);
				mysqli_stmt_bind_result($num_ot, $id_numot);
				mysqli_stmt_fetch($num_ot);

	

				$empresa = mysqli_prepare($connect,"SELECT id_empresa FROM numot WHERE id_numot = $id_numot");			
				mysqli_stmt_execute($empresa);
				mysqli_stmt_store_result($empresa);
				mysqli_stmt_bind_result($empresa, $id_empresa);
				mysqli_stmt_fetch($empresa);
			
		
		
				$final = mysqli_prepare($connect,"SELECT sigla_empresa , sigla_pais FROM empresa 	WHERE id_empresa = $id_empresa");
				mysqli_stmt_execute($final);
				mysqli_stmt_store_result($final);
				mysqli_stmt_bind_result($final, $sigla_empresa, $sigla_pais);
				mysqli_stmt_fetch($final);


        $buscar = mysqli_prepare($connect,"SELECT id_mapeo FROM refrigerador_mapeo WHERE id_asignado = $id_asignado ORDER BY fecha_registro DESC LIMIT 1");
        mysqli_stmt_execute($buscar);
        mysqli_stmt_store_result($buscar);
        mysqli_stmt_bind_result($buscar, $id_mapeo);
        mysqli_stmt_fetch($buscar);


	$i = 1;
	$tem = "";
	$hum = "";
	$estado = 0;
	$tem_add = 0;
	$hum_add = 0;
  $tipo = 2;
  $contador = 1;
  $increment = "";
  $grabando_consecutivo = "";
  $tipo_tem = 0;
  $tipo_hum = 1;





if($asignado == 1){
  
  $nombre_informe_tem = $sigla_pais."-".$correlativo."-".$sigla_empresa."-TEM-";
  $nombre_informe_hum = $sigla_pais."-".$correlativo."-".$sigla_empresa."-HUM-";
  $nombre_informe_base = $sigla_pais."-".$correlativo."-".$sigla_empresa."-TEM";
  
  
  $actualizar_1 = mysqli_prepare($connect,"UPDATE informe_refrigerador SET nombre = ? WHERE id_asignado = ? AND tipo = 0");
  mysqli_stmt_bind_param($actualizar_1, 'si', $nombre_informe_tem, $id_asignado);
  mysqli_stmt_execute($actualizar_1);
  
  $actualizar_2 = mysqli_prepare($connect,"UPDATE informe_refrigerador SET nombre = ? WHERE id_asignado = ? AND tipo = 1");
  mysqli_stmt_bind_param($actualizar_2, 'si', $nombre_informe_hum, $id_asignado);
  mysqli_stmt_execute($actualizar_2);
  
  $actualizar_3 = mysqli_prepare($connect,"UPDATE informe_refrigerador SET nombre = ? WHERE id_asignado = ? AND tipo = 2");
  mysqli_stmt_bind_param($actualizar_3, 'si', $nombre_informe_base, $id_asignado);
  mysqli_stmt_execute($actualizar_3);
   
  
}
else{


  //CONSULTAR EL ULTIMO MAPEO EL CUAL DETERMINARE SI ES PARTE DEL INFORME BASE 
  $ultimo_mapeo = mysqli_prepare($connect,"SELECT informe_base FROM refrigerador_mapeo WHERE id_asignado = ? ORDER BY fecha_registro DESC LIMIT 1");
  mysqli_stmt_bind_param($ultimo_mapeo, 'i', $id_asignado);
  mysqli_stmt_execute($ultimo_mapeo);
  mysqli_stmt_store_result($ultimo_mapeo);
  mysqli_stmt_bind_result($ultimo_mapeo, $informe_base);
  mysqli_stmt_fetch($ultimo_mapeo);



  if($informe_base == 1){

    //si existen varios mapeos asignados al informe base, no creara el informe //// de lo contrario creara el informe con identificación 
    $existen_mapeo = mysqli_prepare($connect,"SELECT informe_base FROM refrigerador_mapeo WHERE id_asignado = ? AND informe_base = ?");
    mysqli_stmt_bind_param($existen_mapeo, 'ii', $id_asignado, $informe_base);
    mysqli_stmt_execute($existen_mapeo);
    mysqli_stmt_store_result($existen_mapeo);
    mysqli_stmt_bind_result($existen_mapeo, $total);
    mysqli_stmt_fetch($existen_mapeo);


    $segunda_validacion = mysqli_prepare($connect,"SELECT nombre FROM informe_refrigerador WHERE id_asignado = $id_asignado AND id_mapeo = $id_mapeo AND tipo = 2");
    mysqli_stmt_execute($segunda_validacion);
    mysqli_stmt_store_result($segunda_validacion);
    mysqli_stmt_bind_result($segunda_validacion, $nombre);
    mysqli_stmt_fetch($segunda_validacion);


    ##CONSULTO CUANTOS INFORMES EXISTEN CREADOS DEL INFORME BASE SI SON MAS DE UNO NO SE CREARA NINGUN INFORME
    if(mysqli_stmt_num_rows($existen_mapeo) == 1 AND mysqli_stmt_num_rows($segunda_validacion) == 0){


      $nombre_informe_base = $sigla_pais."-".$correlativo."-".$sigla_empresa."-TEM";  
      $insert_inf_base = mysqli_prepare($connect,"INSERT INTO informe_refrigerador (nombre, tipo, id_mapeo, id_asignado, estado, id_usuario) 
      VALUES (?,?,?,?,?,?)");
      mysqli_stmt_bind_param($insert_inf_base, 'siiiii', $nombre_informe_base, $tipo, $id_mapeo, $id_asignado,  $estado, $id_valida);
      mysqli_stmt_execute($insert_inf_base);


      if($insert_inf_base){
       echo "Creado";

      ##inserto el informe que pertenecera al informe base  
      $consecutivo = mysqli_prepare($connect,"SELECT n_increment FROM informe_refrigerador WHERE id_asignado = $id_asignado  AND tipo != 2 ORDER BY id_informe_refrigerador DESC LIMIT 1");
      mysqli_stmt_execute($consecutivo);
      mysqli_stmt_store_result($consecutivo);
      mysqli_stmt_bind_result($consecutivo, $ultimo);
      mysqli_stmt_fetch($consecutivo);

      if(mysqli_stmt_num_rows($consecutivo) == 0){
       $grabando_consecutivo = "01";
      }
      else{
        $nuevo_consecutivo = $ultimo + 1;
        if($nuevo_consecutivo < 10){
          $grabando_consecutivo = "0".$nuevo_consecutivo;
        }
      }

      $nombre_informe_tem = $sigla_pais."-".$correlativo."-".$sigla_empresa."-TEM-";
      $nombre_informe_hum = $sigla_pais."-".$correlativo."-".$sigla_empresa."-HUM-";


      $insert_tem = mysqli_prepare($connect,"INSERT INTO informe_refrigerador (nombre, n_increment, tipo, id_mapeo, id_asignado, estado, id_usuario) 
      VALUES (?,?,?,?,?,?,?)");
      mysqli_stmt_bind_param($insert_tem, 'ssiiiii', $nombre_informe_tem, $grabando_consecutivo, $tipo_tem, $id_mapeo, $id_asignado,  $estado, $id_valida);
      mysqli_stmt_execute($insert_tem);

      if($insert_tem){
        $tem_add++;
        echo "Si inserte temp";
      }


      $insert_hum = mysqli_prepare($connect,"INSERT INTO informe_refrigerador (nombre, n_increment, tipo, id_mapeo, id_asignado, estado, id_usuario) 
      VALUES (?,?,?,?,?,?,?)");
      mysqli_stmt_bind_param($insert_hum, 'ssiiiii', $nombre_informe_hum, $grabando_consecutivo, $tipo_hum, $id_mapeo, $id_asignado, $estado, $id_valida);
      mysqli_stmt_execute($insert_hum);

      if($insert_hum){
        $hum_add++;
        echo "Si inserte Hum";
      }

      $suma = $tem_add + $hum_add;

      if($suma = 2){
       echo "Si tem";
      }
      else{
        echo "Erro tem";
      } 


    }else{
      echo "No creao";
    }
   }//IF QUE VALIDA LA CANTIDAD DE MAPEOS Y ASI DETERMINA LA CREACIÓN DEL INFORME BASE
  else{
    
  ##inserto el informe que pertenecera al informe base  
  $consecutivo = mysqli_prepare($connect,"SELECT n_increment FROM informe_refrigerador WHERE id_asignado = $id_asignado  AND tipo != 2 ORDER BY id_informe_refrigerador DESC LIMIT 1");
  mysqli_stmt_execute($consecutivo);
  mysqli_stmt_store_result($consecutivo);
  mysqli_stmt_bind_result($consecutivo, $ultimo);
  mysqli_stmt_fetch($consecutivo);

  if(mysqli_stmt_num_rows($consecutivo) == 0){
  $grabando_consecutivo = "01";
  }
  else{
    
  $nuevo_consecutivo = $ultimo + 1;
  if($nuevo_consecutivo < 10){
    
  $grabando_consecutivo = "0".$nuevo_consecutivo;
    
  }
  }

  $nombre_informe_tem = $sigla_pais."-".$correlativo."-".$sigla_empresa."-TEM-";
  $nombre_informe_hum = $sigla_pais."-".$correlativo."-".$sigla_empresa."-HUM-";


  $insert_tem = mysqli_prepare($connect,"INSERT INTO informe_refrigerador (nombre, n_increment, tipo, id_mapeo, id_asignado, estado, id_usuario) 
  VALUES (?,?,?,?,?,?,?)");
  mysqli_stmt_bind_param($insert_tem, 'ssiiiii', $nombre_informe_tem, $grabando_consecutivo, $tipo_tem, $id_mapeo, $id_asignado,  $estado, $id_valida);
  mysqli_stmt_execute($insert_tem);

  if($insert_tem){
  $tem_add++;
  echo "Si inserte temp";
  }


  $insert_hum = mysqli_prepare($connect,"INSERT INTO informe_refrigerador (nombre, n_increment, tipo, id_mapeo, id_asignado, estado, id_usuario) 
  VALUES (?,?,?,?,?,?,?)");
  mysqli_stmt_bind_param($insert_hum, 'ssiiiii', $nombre_informe_hum, $grabando_consecutivo, $tipo_hum, $id_mapeo, $id_asignado, $estado, $id_valida);
  mysqli_stmt_execute($insert_hum);

  if($insert_hum){
  $hum_add++;
  echo "Si inserte Hum";
  }

  $suma = $tem_add + $hum_add;

  if($suma = 2){
  echo "Si tem";
  }
  else{
  echo "Erro tem";
  } 

  }

  }//CIERRE DEL IF QUE VALIDA SI EL ULTIMO MAPEO CREADO ES DEL INFORME BASE

  else{


  //CONSULTA PARA SABER EL ULTIMO CONSECUTIVO 
  $consecutivo = mysqli_prepare($connect,"SELECT n_increment FROM informe_refrigerador WHERE id_asignado = $id_asignado  AND tipo != 2 ORDER BY id_informe_refrigerador DESC LIMIT 1");
  mysqli_stmt_execute($consecutivo);
  mysqli_stmt_store_result($consecutivo);
  mysqli_stmt_bind_result($consecutivo, $ultimo);
  mysqli_stmt_fetch($consecutivo);


  $nuevo_consecutivo = $ultimo + 1;

  if($nuevo_consecutivo < 10){
  $grabando_consecutivo = "0".$nuevo_consecutivo;
  }


  $nombre_informe_tem = $sigla_pais."-".$correlativo."-".$sigla_empresa."-TEM-";
  $nombre_informe_hum = $sigla_pais."-".$correlativo."-".$sigla_empresa."-HUM-";


  $insert_tem = mysqli_prepare($connect,"INSERT INTO informe_refrigerador (nombre, n_increment, tipo, id_mapeo, id_asignado, estado, id_usuario) 
  VALUES (?,?,?,?,?,?,?)");
  mysqli_stmt_bind_param($insert_tem, 'ssiiiii', $nombre_informe_tem, $grabando_consecutivo, $tipo_tem, $id_mapeo, $id_asignado,  $estado, $id_valida);
  mysqli_stmt_execute($insert_tem);

  if($insert_tem){
  $tem_add++;
  echo "Si inserte temp";
  }


  $insert_hum = mysqli_prepare($connect,"INSERT INTO informe_refrigerador (nombre, n_increment, tipo, id_mapeo, id_asignado, estado, id_usuario) 
  VALUES (?,?,?,?,?,?,?)");
  mysqli_stmt_bind_param($insert_hum, 'ssiiiii', $nombre_informe_hum, $grabando_consecutivo, $tipo_hum, $id_mapeo, $id_asignado, $estado, $id_valida);
  mysqli_stmt_execute($insert_hum);

  if($insert_hum){
  $hum_add++;
  echo "Si inserte Hum";
  }


  $suma = $tem_add + $hum_add;

  if($suma = 2){
  echo "Si tem";
  }else{
  echo "Erro tem";
  }

  }

}




mysqli_stmt_close($connect);


?>