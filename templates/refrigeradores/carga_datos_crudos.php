  <?php 
	include("../../config.ini.php");
	
		$id_refrigerador_sensor = $_POST['id_sensor_refrigerados_dc'];
		$id_asignado = $_POST['id_asignado_form'];
		$id_mapeo = $_POST['id_mapeo'];
    $col_hum = $_POST['col_hum'];
    $col_temp = $_POST['col_temp'];

    $cantidad_sensores = count($col_temp);
    
 
		//Recuperar fechas 
		$fechas = mysqli_prepare($connect,"SELECT fecha_inicio, hora_inicio, fecha_final, hora_final, intervalo FROM refrigerador_mapeo WHERE id_mapeo = ?");
		mysqli_stmt_bind_param($fechas, 'i', $id_mapeo);
		mysqli_stmt_execute($fechas);
		mysqli_stmt_store_result($fechas);
		mysqli_stmt_bind_result($fechas, $fecha_inicio, $hora_inicio, $fecha_final, $hora_final, $intervalo);
		mysqli_stmt_fetch($fechas);


		$pre_start = $fecha_inicio." ".$hora_inicio;
		$pre_end = $fecha_final." ".$hora_final;

		$start = date("Y-m-d H:i:s",strtotime($pre_start));
		$end = date("Y-m-d H:i:s",strtotime($pre_end));
    

   
		//buscar ot

			$consultar_servicio_1 = mysqli_prepare($connect,"SELECT id_servicio FROM item_asignado WHERE id_asignado = ?");
			mysqli_stmt_bind_param($consultar_servicio_1, 'i', $id_asignado);
			mysqli_stmt_execute($consultar_servicio_1);
			mysqli_stmt_store_result($consultar_servicio_1);
			mysqli_stmt_bind_result($consultar_servicio_1, $id_servicio);
			mysqli_stmt_fetch($consultar_servicio_1);
			
		    
		
			$consultar_servicio_2 = mysqli_prepare($connect,"SELECT id_numot FROM servicio WHERE id_servicio = ?");
			mysqli_stmt_bind_param($consultar_servicio_2, 'i', $id_servicio);
			mysqli_stmt_execute($consultar_servicio_2);
			mysqli_stmt_store_result($consultar_servicio_2);
			mysqli_stmt_bind_result($consultar_servicio_2, $id_numot);
			mysqli_stmt_fetch($consultar_servicio_2);
			
		
        ///////////////////////CARGA DE DATOS CRUDOS//////////////////////////////////////////////////

      
        $directorio_carga = "datos_crudos/id_ot_".$id_numot."/id_serv_".$id_asignado."/";
        $personalizado = $directorio_carga."id_mapeo_".$id_mapeo.".csv";

        if(is_dir($directorio_carga)===false)
          {
            mkdir($directorio_carga,0777,true);
            //echo "directorio creado";
          }else{
            //echo "Directorio existe";
        }


          $archivo=$directorio_carga.basename($_FILES["file"]["name"]);
          $cargaok=1;
          $escsv=strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
          $formato_valido=array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
          $nombre_archivo=basename($_FILES["file"]["name"]);

          if(isset($_POST["file"]))
          {
            if(in_array($_FILES["file"]["type"],$formato_valido))
            {
              $cargaok=1;
            }
            else
            {
              echo "El formato de archivo no es valido ".$_FILES["file"]["name"];
              $cargaok=0;
            }
          }
          if($_FILES["file"]["size"]>50000000)
          {
            echo "Archivo demasiado grande, tama&ntilde;o m&aacute;ximo 50MB";
            $cargaok=0;
          }
          if($cargaok==0)
          {
            echo "el archivo no pudo cargarse";
          }
          else
          {
            if(move_uploaded_file($_FILES['file']['tmp_name'],$archivo))
            {
              rename("$archivo","$personalizado");
              //INSERTAR LINK DEL DATO CRUDO 

                //echo "Se cargo correctamente ".$personalizado;
          
                $validar = mysqli_prepare($connect,"SELECT id FROM archivo_dc_refrigerador WHERE id_mapeo = ?");
                mysqli_stmt_bind_param($validar, 'i', $id_mapeo);
                mysqli_stmt_execute($validar);
                mysqli_stmt_store_result($validar);
                mysqli_stmt_bind_result($validar, $id_dc);
                mysqli_stmt_fetch($validar);
              
              
         
                if(mysqli_stmt_num_rows($validar) > 0){
                
                  $update = mysqli_prepare($connect,"UPDATE  archivo_dc_refrigerador SET url  = ? WHERE id = ?");
                  mysqli_stmt_bind_param($update, 'si', $personalizado, $id_dc);
                  mysqli_stmt_execute($update);
                  mysqli_free_result($update);
                }else{
                
                  $insertar = mysqli_prepare($connect,"INSERT INTO archivo_dc_refrigerador (id_mapeo, url) VALUES (?,?)");
                  mysqli_stmt_bind_param($insertar, 'is', $id_mapeo, $personalizado);
                  mysqli_stmt_execute($insertar);
                  mysqli_free_result($insertar);
                }
                
                $z = 1;
                $fecha_suma ="";
                $temperatura = "";
                $humedad = "";
                $abre_archivo= array(fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),
                                     fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),
                                     fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),
                                     fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),
                                     fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),
                                     fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),
                                     fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),
                                     fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'));
              
              
                 
                for($i=0; $i < $cantidad_sensores; $i++){
                  
                  
                  $sensor = $id_refrigerador_sensor[$i];
             
                  $usuario = 2;
                  
                  while(($column=fgetcsv($abre_archivo[$i],10000,";","\t"))!==false){

                    $fecha_hora_sql = date("Y-m-d H:i:s",strtotime($column[1]));
                    
                    if($z==1)
                    {
                      $fecha_suma=$start;
                    }else
                    {
                      $fecha_suma=$fecha_suma;
                    }  
                                      

                    if($fecha_hora_sql>=$start && $fecha_hora_sql<=$end){
                      
                      if(strpos($column[$col_temp[$i]],","))
                      {
                        $temperatura=str_replace(",",".",$column[$col_temp[$i]]);
                      }else
                      {
                        $temperatura=$column[$col_temp[$i]];						
                      }
                      
                      if(strpos($column[$col_hum[$i]],","))
                      {
                        $humedad=str_replace(",",".",$column[$col_hum[$i]]);
                      }else
                      {
                        $humedad=$column[$col_hum[$i]];						
                      }
                                    
                      $agregar = mysqli_prepare($connect,"INSERT INTO refrigerador_datos_crudos (id_refrigerador_sensor, time, temperatura, humedad, id_usuario) VALUES (?, ?, ?, ?, ?)");
                      mysqli_stmt_bind_param($agregar, 'isssi',  $sensor,  $fecha_suma,  $temperatura, $humedad, $usuario);
                      mysqli_stmt_execute($agregar);
                      mysqli_free_result($agregar);
                      $fecha_suma=date('Y-m-d H:i:s',strtotime("+ $intervalo seconds",strtotime($fecha_suma)));  
                      $z=2;
                    }//// cierre del if fecha
          
                  }//////////////// CIERRE DEL WHILE
                $z=1; 
                }///////////// CIERRE DEL FOR
              
              }//cierre del if carga archivo

            } //////////// CIERRE DEL ELSE
echo "Listo";
	mysqli_stms_close($connect);
?>