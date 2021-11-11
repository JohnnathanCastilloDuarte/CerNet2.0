 <?php 
	include("../../config.ini.php");
	
    $id_mapeo_ultrafreezer = $_POST['id_mapeo_ultrafreezer'];
    $id_asignado_ultrafreezer = $_POST['id_asignado_ultrafreezer'];
    $id_valida = $_POST['id_valida'];
  
    $columna_dc1 = $_POST['columna_dc1'];
    $columna_dc2 = $_POST['columna_dc2'];
    $columna_dc3 = $_POST['columna_dc3']; 
    $columna_dc4 = $_POST['columna_dc4'];
    $columna_dc5 = $_POST['columna_dc5'];
    $columna_dc6 = $_POST['columna_dc6'];
    $columna_dc7 = $_POST['columna_dc7'];
    $columna_dc8 = $_POST['columna_dc8'];
    $columna_dc9 = $_POST['columna_dc9'];
    $columna_dc10 = $_POST['columna_dc10'];
    $columna_dc11 = $_POST['columna_dc11'];
    $columna_dc12 = $_POST['columna_dc12'];

    $bandejas = $_POST['bandejas'];
    $array_valor = array($columna_dc1,$columna_dc2,$columna_dc3,$columna_dc4,$columna_dc5,$columna_dc6,$columna_dc7,$columna_dc8,$columna_dc9,$columna_dc10,$columna_dc11,$columna_dc12);


    ///////////////////// CONOCER LA CANTIDAD DE VUELTAS QUE INSERTARE LOS DATOS

    $query_master = mysqli_prepare($connect,"SELECT id_ultrafreezer_sensor FROM ultrafreezer_sensor WHERE id_mapeo = ? AND id_bandeja = ?");
    mysqli_stmt_bind_param($query_master, 'ii', $id_mapeo_ultrafreezer, $bandejas);
    mysqli_stmt_execute($query_master);
    mysqli_stmt_store_result($query_master);
    mysqli_stmt_bind_result($query_master, $id_contar);
    
    $cuantos = mysqli_stmt_num_rows($query_master);


    $algoritmo_1 = 0;
    $algoritmo_2 = 0;
    $algoritmo_3 = 0;
    $algoritmo_4 = 0;

    $No = 0;
    $Si = 0;

/*

    ///////////////////PROCESOS DE VALIDACIÓN PARA CONOCER SI LOS DATOS CRUDOS SE INSERTARAN O SE ACTUALIZARAN
    $primer_valida = mysqli_prepare($connect,"SELECT id_ultrafreezer_sensor FROM ultrafreezer_datos_crudos WHERE  id_ultrafreezer_sensor = ?");
    mysqli_stmt_bind_param($primer_valida, 'i',$id_sensor_ultrafreezer_dc1);
    mysqli_stmt_execute($primer_valida);
    mysqli_stmt_store_result($primer_valida);
    mysqli_stmt_bind_result($primer_valida, $que_trae_1);
    mysqli_stmt_fetch($primer_valida);
    
    if(mysqli_stmt_num_rows($primer_valida)>0){
      $algoritmo_1 = 1;
      $No = $No + 1;
    }

    $segundo_valida = mysqli_prepare($connect,"SELECT id_ultrafreezer_sensor FROM ultrafreezer_datos_crudos WHERE  id_ultrafreezer_sensor = ?");
    mysqli_stmt_bind_param($segundo_valida, 'i',$id_sensor_ultrafreezer_dc2);
    mysqli_stmt_execute($segundo_valida);
    mysqli_stmt_store_result($segundo_valida);
    mysqli_stmt_bind_result($segundo_valida, $que_trae_2);
    mysqli_stmt_fetch($segundo_valida);
    
    if(mysqli_stmt_num_rows($segundo_valida)>0){
      $algoritmo_2 = 1;
      $No = $No + 1;
    }


    $tercer_valida = mysqli_prepare($connect,"SELECT id_ultrafreezer_sensor FROM ultrafreezer_datos_crudos WHERE  id_ultrafreezer_sensor = ?");
    mysqli_stmt_bind_param($tercer_valida, 'i',$id_sensor_ultrafreezer_dc3);
    mysqli_stmt_execute($tercer_valida);
    mysqli_stmt_store_result($tercer_valida);
    mysqli_stmt_bind_result($tercer_valida, $que_trae_3);
    mysqli_stmt_fetch($tercer_valida);
    
    if(mysqli_stmt_num_rows($tercer_valida)>0){
      $algoritmo_3 = 1;
      $No = $No + 1;
    }


    $cuarto_valida = mysqli_prepare($connect,"SELECT id_ultrafreezer_sensor FROM ultrafreezer_datos_crudos WHERE  id_ultrafreezer_sensor = ?");
    mysqli_stmt_bind_param($cuarto_valida, 'i',$id_sensor_ultrafreezer_dc4);
    mysqli_stmt_execute($cuarto_valida);
    mysqli_stmt_store_result($cuarto_valida);
    mysqli_stmt_bind_result($cuarto_valida, $que_trae_4);
    mysqli_stmt_fetch($cuarto_valida);
    
    if(mysqli_stmt_num_rows($cuarto_valida)>0){
      $algoritmo_4 = 1;
      $No = $No + 1;
    } 
*/

    



    $fechas = mysqli_prepare($connect,"SELECT fecha_inicio, hora_inicio, fecha_final, hora_final, intervalo FROM ultrafreezer_mapeo WHERE id_mapeo = ?");
		mysqli_stmt_bind_param($fechas, 'i', $id_mapeo_ultrafreezer);
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
			mysqli_stmt_bind_param($consultar_servicio_1, 'i', $id_asignado_ultrafreezer);
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
		


			$directorio_carga = "datos_crudos_ultrafreezer/id_ot_".$id_numot."/id_serv_".$id_asignado_ultrafreezer."/id_mapeo_".$id_mapeo_ultrafreezer."/";
			$personalizado = $directorio_carga."datos_crudos.csv";

      
    
		
if(is_dir($directorio_carga)===false)
{
  mkdir($directorio_carga,0777,true);
  echo "directorio creado";
}

$archivo=$directorio_carga.basename($_FILES["file_ultrafreezer"]["name"]);
$cargaok=1;
$escsv=strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
$formato_valido=array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
$nombre_archivo=basename($_FILES["file_ultrafreezer"]["name"]);

if(isset($_POST["file_ultrafreezer"]))
{
  if(in_array($_FILES["file_ultrafreezer"]["type"],$formato_valido))
  {
    $cargaok=1;
  }
  else
  {
    echo "El formato de archivo no es valido ".$_FILES["file_ultrafreezer"]["name"];
    $cargaok=0;
  }
}


if($_FILES["file_ultrafreezer"]["size"]>50000000)
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
  if(move_uploaded_file($_FILES['file_ultrafreezer']['tmp_name'],$archivo))
  {
    rename("$archivo","$personalizado");
    //INSERTAR LINK DEL DATO CRUDO 

    //echo "Se cargo correctamente ".$personalizado;

    $crudo = mysqli_prepare($connect,"UPDATE  ultrafreezer_sensor  SET datos_crudos = ? WHERE id_mapeo = ?");
    mysqli_stmt_bind_param($crudo, 'si', $personalizado, $id_mapeo_ultrafreezer);
    mysqli_stmt_execute($crudo);

    if($crudo){
    //echo "Listo";

    //VERIIFICAR EL ARCHIVO 
    $sin_dato = 0;
    $hr_bajo = 0;
    $hr_alto = 0;
    $error = 0;
    $leidos = 0;
    $temperatura_1 = "";
    $temperatura_2 = "";
    $temperatura_3 = "";
    $temperatura_4 = "";
       $z_1=1;  
    $z_2 = 1;
    $z_3 = 1;      
    $z_4 = 1;    
    $i = 0;
    $abre_archivo0=fopen($personalizado,'r');
    $abre_archivo1=fopen($personalizado,'r');
    $abre_archivo2=fopen($personalizado,'r');
    $abre_archivo3=fopen($personalizado,'r');

    $array_abrir = array(fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),
                         fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),
                         fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'));
    
  
for($f = 0; $f<$cuantos; $f++){
    
    mysqli_stmt_fetch($query_master);
      while(($column=fgetcsv($array_abrir[$i],10000,";","\t"))!==false){
       $columna = $array_valor[$f] - 1;
       $fecha_archivo = $column[0]." ".$column[1];
       $fecha_hora_sql = date("Y-m-d H:i:s",strtotime($fecha_archivo));    
      //$hora_sql = date("H:i:s",strtotime($column[1]));  


      //VALIDACION PARA SUMARLE  LOS SEGUNDOS DE INTERVALO A LA FECHA-HORA INICIAL Y ASI CARGAR ESTA SUMATORIA EN LUGAR DE LA FECHA-HORA DEL ARCHIVO
      if($z_1==1)
        {
          $fecha_suma=$start;
        }
        else
        {
          $fecha_suma=$fecha_suma;
        } 

    
        
  
      if(($fecha_suma>=$start) && ($fecha_suma<=$end)){
          
        
          echo $fecha_suma;
          //PROCESO PARA RETIRAR COMAS Y DEJAR VALORES CON PUNTO DECIMAL
          if(strpos($column[$array_valor[$f]],","))
          {
            $temperatura_1=str_replace(",",".",$column[$array_valor[$f]]);
          }
          else
          {
            $temperatura_1=$column[$array_valor[$f]];						
          }    
          if($algoritmo_1 == 0){
          
          
            /*
              $inserta_columna_1 = mysqli_prepare($connect,"INSERT INTO ultrafreezer_datos_crudos(id_ultrafreezer_sensor, columna, time, temperatura, id_usuario) VALUES ( ?, ?, ?, ?, ?)");
              mysqli_stmt_bind_param($inserta_columna_1, 'iissi',$id_contar,$columna,$fecha_suma, $temperatura_1, $id_valida);
              mysqli_stmt_execute($inserta_columna_1);*/      
          }
     
      $fecha_suma=date('Y-m-d H:i:s',strtotime("+$intervalo seconds",strtotime($fecha_suma)));  
      $z_1=2; 
      }//cierre del if
    }/////////////FIN DEL WHILE
  $i++;
  $z_1=1;
  
}      
  mysqli_stmt_close($connect);    
    }//cierre if del $curdo
  }// Cierre del if del move_upload
}//Else de carga de archivo

  echo $No;

?>