  <?php 
	include("../../config.ini.php");

  $id_refrigerador_sensor = $_POST['id_sensor_refrigerados_dc'];
  $id_asignado = $_POST['id_asignado_form'];
  $id_mapeo = $_POST['id_mapeo'];
  $col_hum = $_POST['col_hum'];
  $col_temp = $_POST['col_temp'];
  $id_usuario = $_POST['id_usuario'];
  $cantidad_sensores = count($col_temp);

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


  

  //////////// consultar el archivo en la db tabla registro dc

  $consulta = mysqli_prepare($connect,"SELECT url_archivo FROM registro_dc WHERE id_mapeo = ? AND id_asignado = ? AND estado = 1");
  mysqli_stmt_bind_param($consulta, 'ii', $id_mapeo, $id_asignado);
  mysqli_stmt_execute($consulta);
  mysqli_stmt_store_result($consulta);
  mysqli_stmt_bind_result($consulta, $personalizado);
  mysqli_stmt_fetch($consulta);

  $ubicacion_archivo = "../datoscrudos/".$personalizado;


  $contador = 0;
  $z = 1;
  $fecha_suma ="";
  $temperatura = "";
  $humedad = "";
  $abre_archivo= array(fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),
                        fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),
                        fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),
                        fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),
                        fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),
                        fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),
                        fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),
                        fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'));
            



  for($i = 0; $i<count($id_refrigerador_sensor);$i++){

    $sensor = $id_refrigerador_sensor[$i];

    while(($column=fgetcsv($abre_archivo[$i],10000,";","\t"))!==false){


      $fecha_hora_sql = date("Y-m-d H:i:s",strtotime($column[0].' '.$column[1]));

      
      if($z==1)
      {
        $fecha_suma=$start;
      }else
      {
        $fecha_suma=$fecha_suma;
      }  

      if($contador > 6){

        if($fecha_suma>=$start && $fecha_suma<=$end){

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
          mysqli_stmt_bind_param($agregar, 'isssi',  $sensor,  $fecha_suma,  $temperatura, $humedad, $id_usuario);
          mysqli_stmt_execute($agregar);
          mysqli_free_result($agregar);
  
          $fecha_suma=date('Y-m-d H:i:s',strtotime("+ $intervalo seconds",strtotime($fecha_suma))); 
          $z=2;
        }/// cierre del if de rango de time
      }
      
      $contador++;
    }//// SE CIERRE EL CICLO WHILE

    

  }////SE CIERRA EL CICLO FOR


	mysqli_close($connect);
?>