<?php 
	include("../../config.ini.php");

	$id_asignado = $_POST['id_asignado_estufaeincubadora'];
	$id_valida = $_POST['id_valida_estufaeincubadora'];
  $tipo_tem = 0;
  

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


        $buscar = mysqli_prepare($connect,"SELECT id_mapeo FROM estufaeincubadora_mapeo WHERE id_asignado = $id_asignado ORDER BY fecha_registro DESC LIMIT 1");
        mysqli_stmt_execute($buscar);
        mysqli_stmt_store_result($buscar);
        mysqli_stmt_bind_result($buscar, $id_mapeo);
        mysqli_stmt_fetch($buscar);

        
        $consecutivo = mysqli_prepare($connect,"SELECT n_increment FROM informe_estufaeincubadora WHERE id_asignado = $id_asignado  AND tipo = 0 ORDER BY id_informe_estufaeincubadora DESC LIMIT 1");
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

        if($correlativo != "" or $correlativo != NULL){
          
            $insert_tem = mysqli_prepare($connect,"INSERT INTO informe_estufaeincubadora (nombre, n_increment, tipo, id_mapeo, id_asignado, estado, id_usuario) 
            VALUES (?,?,?,?,?,?,?)");
            mysqli_stmt_bind_param($insert_tem, 'ssiiiii', $nombre_informe_tem, $grabando_consecutivo, $tipo_tem, $id_mapeo, $id_asignado,  $estado, $id_valida);
            mysqli_stmt_execute($insert_tem);

            if($insert_tem)
            {
              echo "Si inserte temp";
            }
        }  
mysqli_stmt_close($connect);
?>
