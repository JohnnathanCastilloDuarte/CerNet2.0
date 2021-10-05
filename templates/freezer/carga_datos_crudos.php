  <?php 
	include("../../config.ini.php");
	
		$id_freezer_sensor = $_POST['id_freezer_sensor'];
		$id_asignado = $_POST['id_asignado_form_freezer'];
		$id_mapeo = $_POST['id_mapeo_freezer'];


	$json = array();

		//Recuperar fechas 
		$fechas = mysqli_prepare($connect,"SELECT fecha_inicio, hora_inicio, fecha_final, hora_final FROM freezer_mapeo WHERE id_mapeo = ?");
		mysqli_stmt_bind_param($fechas, 'i', $id_mapeo);
		mysqli_stmt_execute($fechas);
		mysqli_stmt_store_result($fechas);
		mysqli_stmt_bind_result($fechas, $fecha_inicio, $hora_inicio, $fecha_final, $hora_final);
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



        $directorio_carga = "datos_crudos/id_ot_".$id_numot."/id_serv_".$id_asignado."/id_mapeo_".$id_mapeo."/";
        $personalizado = $directorio_carga."id_sensor_".$id_freezer_sensor.".csv";



        if(is_dir($directorio_carga)===false)
          {
            mkdir($directorio_carga,0777,true);
            //echo "directorio creado";
          }else{
          //echo "Existe";
        }

          $archivo=$directorio_carga.basename($_FILES["file_freezer"]["name"]);
          $cargaok=1;
          $escsv=strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
          $formato_valido=array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
          $nombre_archivo=basename($_FILES["file_freezer"]["name"]);

          if(isset($_POST["file_freezer"]))
          {
            if(in_array($_FILES["file_freezer"]["type"],$formato_valido))
            {
              $cargaok=1;
            }
            else
            {
              echo "El formato de archivo no es valido ".$_FILES["file_freezer"]["name"];
              $cargaok=0;
            }
          }
          if($_FILES["file_freezer"]["size"]>50000000)
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
            if(move_uploaded_file($_FILES['file_freezer']['tmp_name'],$archivo))
            {
              rename("$archivo","$personalizado");
              //INSERTAR LINK DEL DATO CRUDO 

                //echo "Se cargo correctamente ".$personalizado;

                $crudo = mysqli_prepare($connect,"UPDATE  freezer_sensor  SET datos_crudos = ? WHERE id_freezer_sensor = ?");
                mysqli_stmt_bind_param($crudo, 'si', $personalizado, $id_freezer_sensor);
                mysqli_stmt_execute($crudo);
              }//cierre del if

            }


        //VERIIFICAR EL ARCHIVO 
              $sin_dato = 0;
              $hr_bajo = 0;
              $hr_alto = 0;
              $error = 0;
              $leidos = 0;


            if(file_exists($personalizado))
              {

              $abre_archivo=fopen($personalizado,'r');

                while(($column=fgetcsv($abre_archivo,10000,";","\t"))!==false){

                $fecha_hora_sql = date("Y-m-d H:i:s",strtotime($column[1]));




                //PROCESO PARA RETIRAR COMAS Y DEJAR VALORES CON PUNTO DECIMAL
                if(strpos($column[2],","))
                {
                  $temperatura=str_replace(",",".",$column[2]);
                }
                else
                {
                  $temperatura=$column[2];						
                }

                if(strpos($column[3],","))
                {
                  $humedad=str_replace(",",".",$column[3]);
                }
                else
                {
                  $humedad=$column[3];						
                }


                if($fecha_hora_sql>=$start && $fecha_hora_sql<=$end){



                    if($column[2] == "" || $column[3] == ""){
                      $sin_dato++;
                    }

                    if($humedad < 10){
                      echo $column[0];
                      $hr_bajo++;
                    }

                    if($humedad > 90){

                      $hr_alto++;
                    }


                    if($column[2] == "ERROR" || $column[3] == "ERROR"){
                      $error++;
                    }

                  $leidos++; 
                }//cierre del if


                }//cierre del while
                $json[] = array
                  (
                    'id_freezer_sensor'=>$id_freezer_sensor,
                    'url_datos'=>$personalizado,	
                    'leidos'=>$leidos,
                    'sin_datos'=>$sin_dato,
                    'hr_bajo'=>$hr_bajo,
                    'hr_alto'=>$hr_alto,
                    'error'=>$error
                  );

                }//cierre del if file_existe	

              $convert = json_encode($json);

                echo $convert;



	mysqli_stmt_close($connect);
?>