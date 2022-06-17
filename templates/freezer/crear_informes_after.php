<?php 
  include("../../config.ini.php");

   $id_asignado = $_POST['id_asignado_freezer'];  
   $id_valida = $_POST['id_valida'];
   $vueltas = 0;
   $cuantos_segundo = 0;
   $informe_base_existe = 0; 

    $primero = mysqli_prepare($connect , "SELECT id_mapeo FROM freezer_mapeo WHERE id_asignado = ? AND informe_base = 0");
    mysqli_stmt_bind_param($primero, 'i', $id_asignado);
    mysqli_stmt_execute($primero);
    mysqli_stmt_store_result($primero);
    mysqli_stmt_bind_result($primero, $id_mapeo_recibe);
    $cuantos_primero = mysqli_stmt_num_rows($primero);


    $primero_1 = mysqli_prepare($connect , "SELECT id_mapeo FROM freezer_mapeo WHERE id_asignado = ? AND informe_base = 1");
    mysqli_stmt_bind_param($primero_1, 'i', $id_asignado);
    mysqli_stmt_execute($primero_1);
    mysqli_stmt_store_result($primero_1);
    mysqli_stmt_bind_result($primero_1, $id_mapeo_recibe_1);
    $cuantos_primero = mysqli_stmt_num_rows($primero_1);

  
  


    while($row = mysqli_stmt_fetch($primero)){
  
        $segundo = mysqli_prepare($connect , "SELECT id_informe_freezer FROM informe_freezer WHERE  id_mapeo = ? AND id_asignado = ? AND tipo != 0");
        mysqli_stmt_bind_param($segundo, 'ii', $id_mapeo_recibe, $id_asignado);
        mysqli_stmt_execute($segundo);
        mysqli_stmt_store_result($segundo);
        mysqli_stmt_bind_result($segundo, $id_informe_freezer);
        $cuantos_segundo =  mysqli_stmt_num_rows($segundo); 
    }

   while($row = mysqli_stmt_fetch($primero_1)){
  
        $tercero= mysqli_prepare($connect , "SELECT tipo FROM informe_freezer WHERE  id_mapeo = ? AND id_asignado = ? AND tipo = 0");
        mysqli_stmt_bind_param($tercero, 'ii', $id_mapeo_recibe_1, $id_asignado);
        mysqli_stmt_execute($tercero);
        mysqli_stmt_store_result($tercero);
        mysqli_stmt_bind_result($tercero,  $tipo);
        $informe_base_existe =  mysqli_stmt_num_rows($tercero);
    }

        $vueltas = $cuantos_primero - $cuantos_segundo;

          


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


        $buscar = mysqli_prepare($connect,"SELECT id_mapeo FROM freezer_mapeo WHERE id_asignado = $id_asignado ORDER BY fecha_registro DESC LIMIT 1");
        mysqli_stmt_execute($buscar);
        mysqli_stmt_store_result($buscar);
        mysqli_stmt_bind_result($buscar, $id_mapeo);
        mysqli_stmt_fetch($buscar);
          
        

        /////////////////////////////////CREACION DEL INFORME BASE
      $tipo_base = 2;
      $tipo_tem = 0;
      $tipo_hum = 1;

      if($informe_base_existe == 0){
        

        $nombre_informe_base = $sigla_pais."-".$correlativo."-".$sigla_empresa."-TEM";  
        $insert_inf_base = mysqli_prepare($connect,"INSERT INTO informe_freezer (nombre, tipo, id_mapeo, id_asignado, estado, id_usuario) 
        VALUES (?,?,?,?,?,?)");
        mysqli_stmt_bind_param($insert_inf_base, 'siiiii', $nombre_informe_base, $tipo_base, $id_mapeo, $id_asignado,  $estado, $id_valida);
        mysqli_stmt_execute($insert_inf_base);
        
             
       }


         $f = 1;
        for($i = 1; $i <= $vueltas; $i++){

          $consecutivo = mysqli_prepare($connect,"SELECT n_increment FROM informe_freezer WHERE id_asignado = $id_asignado  AND tipo = 1 ORDER BY id_informe_freezer DESC LIMIT 1");
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

          if($correlativo != "" or $correlativo != NULL){

              $insert_tem = mysqli_prepare($connect,"INSERT INTO informe_freezer (nombre, n_increment, tipo, id_mapeo, id_asignado, estado, id_usuario) 
              VALUES (?,?,?,?,?,?,?)");
              mysqli_stmt_bind_param($insert_tem, 'ssiiiii', $nombre_informe_tem, $grabando_consecutivo, $tipo_tem, $id_mapeo, $id_asignado,  $estado, $id_valida);
              mysqli_stmt_execute($insert_tem);

            
              $insert_hum = mysqli_prepare($connect,"INSERT INTO informe_freezer (nombre, n_increment, tipo, id_mapeo, id_asignado, estado, id_usuario) 
              VALUES (?,?,?,?,?,?,?)");
              mysqli_stmt_bind_param($insert_hum, 'ssiiiii', $nombre_informe_hum, $grabando_consecutivo, $tipo_hum, $id_mapeo, $id_asignado, $estado, $id_valida);
              mysqli_stmt_execute($insert_hum);

             
          }
         
         }



?>