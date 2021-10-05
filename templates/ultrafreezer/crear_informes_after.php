<?php 
  include("../../config.ini.php");

   $id_asignado = $_POST['id_asignado'];
   $vueltas = 0;
   $cuantos_segundo = 0;

    $primero = mysqli_prepare($connect , "SELECT id_mapeo FROM ultrafreezer_mapeo WHERE id_asignado = ?");
    mysqli_stmt_bind_param($primero, 'i', $id_asignado);
    mysqli_stmt_execute($primero);
    mysqli_stmt_store_result($primero);
    mysqli_stmt_bind_result($primero, $id_mapeo_recibe);
    $cuantos_primero = mysqli_stmt_num_rows($primero);

    $primero_f = mysqli_prepare($connect , "SELECT id_mapeo FROM ultrafreezer_mapeo WHERE id_asignado = ?");
    mysqli_stmt_bind_param($primero_f, 'i', $id_asignado);
    mysqli_stmt_execute($primero_f);
    mysqli_stmt_store_result($primero_f);
    mysqli_stmt_bind_result($primero_f, $id_mapeo_ingresar);



   
    while($row = mysqli_stmt_fetch($primero)){
       
        $segundo = mysqli_prepare($connect , "SELECT id_informe_ultrafreezer FROM informe_ultrafreezer WHERE  id_mapeo = ? AND id_asignado = ?");
        mysqli_stmt_bind_param($segundo, 'ii', $id_mapeo_recibe, $id_asignado);
        mysqli_stmt_execute($segundo);
        mysqli_stmt_store_result($segundo);
        mysqli_stmt_bind_result($segundo, $id_informe_ultrafreezer);
        $cuantos_segundo =  mysqli_stmt_num_rows($segundo);
    
   
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


        $buscar = mysqli_prepare($connect,"SELECT id_mapeo FROM ultrafreezer_mapeo WHERE id_asignado = $id_asignado ORDER BY fecha_registro DESC LIMIT 1");
        mysqli_stmt_execute($buscar);
        mysqli_stmt_store_result($buscar);
        mysqli_stmt_bind_result($buscar, $id_mapeo);
        mysqli_stmt_fetch($buscar);

         $f = 1;
         $t = ""; 
        $sumar = 1;
        for($i = 1; $i <= $vueltas; $i++){
          mysqli_stmt_fetch($primero_f);
            
  
          $consecutivo = mysqli_prepare($connect,"SELECT n_increment FROM informe_ultrafreezer WHERE id_asignado = $id_asignado  AND tipo = 0 ORDER BY id_informe_ultrafreezer DESC LIMIT 1");
          mysqli_stmt_execute($consecutivo);
          mysqli_stmt_store_result($consecutivo);
          mysqli_stmt_bind_result($consecutivo, $ultimo);
          mysqli_stmt_fetch($consecutivo);
          
            if($ultimo = 0){
              $t = 1;
            }else{
              $t = $ultimo;
            }        
          
            $nuevo_consecutivo = $t + $sumar;
            
            if($nuevo_consecutivo < 10){

              $grabando_consecutivo = "0".$nuevo_consecutivo;

            }else{
              $grabando_consecutivo = $nuevo_consecutivo;
            }
          
          
          $nombre_informe_tem = $sigla_pais."-".$correlativo."-".$sigla_empresa."-TEM-";

          if($correlativo != "" or $correlativo != NULL){

              $insert_tem = mysqli_prepare($connect,"INSERT INTO informe_ultrafreezer (nombre, n_increment, tipo, id_mapeo, id_asignado, estado, id_usuario) 
              VALUES (?,?,?,?,?,?,?)");
              mysqli_stmt_bind_param($insert_tem, 'ssiiiii', $nombre_informe_tem, $grabando_consecutivo, $tipo_tem, $id_mapeo_ingresar, $id_asignado,  $estado, $id_valida);
              mysqli_stmt_execute($insert_tem);

              if($insert_tem)
              {
               //echo "Si inserte temp";
                $f++;
              }
          }
          $sumar++;
         }



      if($f == $vueltas){
        echo "Si";
      }


?>