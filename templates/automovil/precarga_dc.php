<?php 
include('../../config.ini.php');

$id_mapeo_automovil = $_POST['id_mapeo_automovil'];
$id_asignado_automovil2 = $_POST['id_asignado_automovil2'];

$array_id_sensores = array($_POST['id_sensor_automovil_super0'],$_POST['id_sensor_automovil_super1'],$_POST['id_sensor_automovil_super2'],$_POST['id_sensor_automovil_super3'],
                          $_POST['id_sensor_automovil_super4'],$_POST['id_sensor_automovil_super5'],$_POST['id_sensor_automovil_super6'],$_POST['id_sensor_automovil_super7'],
                          $_POST['id_sensor_automovil_super8'],$_POST['id_sensor_automovil_super9'],$_POST['id_sensor_automovil_super10'],$_POST['id_sensor_automovil_super11'],
                          $_POST['id_sensor_automovil_super12'],$_POST['id_sensor_automovil_super13'],$_POST['id_sensor_automovil_super14'],$_POST['id_sensor_automovil_super15'],
                          $_POST['id_sensor_automovil_super16'],$_POST['id_sensor_automovil_super17'],$_POST['id_sensor_automovil_super18'],$_POST['id_sensor_automovil_super19'],
                          $_POST['id_sensor_automovil_super20']);

$array_id_columnas = array($_POST['columna_excel_automovil0'], $_POST['columna_excel_automovil1'],$_POST['columna_excel_automovil2'],$_POST['columna_excel_automovil3'],$_POST['columna_excel_automovil4'],
                           $_POST['columna_excel_automovil4'],$_POST['columna_excel_automovil5'],$_POST['columna_excel_automovil6'],$_POST['columna_excel_automovil7'],
                           $_POST['columna_excel_automovil8'],$_POST['columna_excel_automovil9'],$_POST['columna_excel_automovil10'],$_POST['columna_excel_automovil11'],
                           $_POST['columna_excel_automovil12'],$_POST['columna_excel_automovil13'],$_POST['columna_excel_automovil14'],$_POST['columna_excel_automovil15'],
                           $_POST['columna_excel_automovil16'],$_POST['columna_excel_automovil17'],$_POST['columna_excel_automovil18'],$_POST['columna_excel_automovil19'],
                           $_POST['columna_excel_automovil20']);



$compruebator = 0;
$almacena = "";
$error_columnas_iguales = 0;
foreach($array_id_columnas as $columnas){

  if($columnas != ""){
    
    if($compruebator != 0){
      if($almacena == $columnas){
        $error_columnas_iguales++;
      }
    }else{
      $almacena = $columnas;
    }
    $compruebator++;
  } 
}

if($error_columnas_iguales > 0){
  
  echo "Error001";
  
}else{

//////////// CONSULTAR LA INFORMACIÓN  DEL MAPEO
  $info1 = mysqli_prepare($connect,"SELECT fecha_inicio , hora_inicio, fecha_final, hora_final, intervalo FROM automovil_mapeo WHERE id_mapeo = ?");
  mysqli_stmt_bind_param($info1, 'i', $id_mapeo_automovil);
  mysqli_stmt_execute($info1);
  mysqli_stmt_store_result($info1);
  mysqli_stmt_bind_result($info1, $fecha_inicio, $hora_inicio, $fecha_final, $hora_final, $intervalo);
  mysqli_stmt_fetch($info1);


  $fecha_inicial = $fecha_inicio.' '.$hora_inicio;
  $fecha_termino = $fecha_final.' '.$hora_final;


  $directorio_carga = "datos_crudos/id_serv_".$id_asignado_automovil2."/id_mapeo_".$id_mapeo_automovil."/";
  $personalizado = $directorio_carga."datos_crudos.csv";

  ///////////////// CREACIÓN DEL DIRECTORIO
  if(is_dir($directorio_carga)===false)
  {
    mkdir($directorio_carga,0777,true);
    //echo "directorio creado";
  }

  $archivo=$directorio_carga.basename($_FILES["file_automovil"]["name"]);
  $cargaok=1;
  $escsv=strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
  $formato_valido=array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
  $nombre_archivo=basename($_FILES["file_automovil"]["name"]);

  if(isset($_POST["file_automovil"]))
  {
    if(in_array($_FILES["file_automovil"]["type"],$formato_valido))
    {
      $cargaok=1;
    }
    else
    {
      echo "El formato de archivo no es valido ".$_FILES["file_automovil"]["name"];
      $cargaok=0;
    }
  }

  if($_FILES["file_automovil"]["size"]>50000000)
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
    if(move_uploaded_file($_FILES['file_automovil']['tmp_name'],$archivo))
    {
      
      rename("$archivo","$personalizado");
      
      $consult = mysqli_prepare($connect, "SELECT id FROM gestion_dc_automovil WHERE id_mapeo = ?");
      mysqli_stmt_bind_param($consult, 'i', $id_mapeo_automovil);
      mysqli_stmt_execute($consult);
      mysqli_stmt_store_result($consult);
      mysqli_stmt_bind_result($consult, $id_gestion);
      mysqli_stmt_fetch($consult);
      
      if(mysqli_stmt_num_rows($consult)>0){
        $update = mysqli_prepare($connect, 'UPDATE gestion_dc_automovil SET url = ? WHERE id = ?');
        mysqli_stmt_bind_param($update, 'si', $personalizado, $id_gestion);
        mysqli_stmt_execute($update);
      }else{
        $creando = mysqli_prepare($connect,"INSERT INTO gestion_dc_automovil (id_mapeo, url) VALUES (?,?)");
        mysqli_stmt_bind_param($creando, 'is', $id_mapeo_automovil, $personalizado);
        mysqli_stmt_execute($creando);
      }

      $z = 1;

      $vueltas = 0;

      $fecha_suma = "";

      

      $abre_archivo=fopen($personalizado,'r');

      $temperatura = "";
      
      $negacion = 0;

      $array_abrir = array(fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),
                           fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),
                           fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'),fopen($personalizado,'r'));


      //////////// RECORRER ARCHIVO
      foreach($array_id_columnas as $columnas){
        if($columnas != ""){
          $vueltas++;
        }
      }

      for($i = 0; $i < $vueltas; $i++){
        while(($column=fgetcsv($array_abrir[$i],10000,";","\t"))!==false){

          $columnita = $array_id_columnas[$i] - 1;
          $fecha_hora_sql = date("Y-m-d H:i:s",strtotime($column[1]));


          /////////// VALIDACIÓN PARA FORMATEAR LA FECHA DE CREACIÓN
          if($z==1)
          {
          $fecha_suma=$fecha_inicial;
          }
          else
          {
          $fecha_suma=$fecha_suma;
          }  

          if($fecha_hora_sql>=$fecha_inicial && $fecha_hora_sql<=$fecha_termino){
          
            
          
          if(strpos($column[$array_id_columnas[$i]],","))
          {
          $temperatura=str_replace(",",".",$column[$array_id_columnas[$i]]);
          }
          else
          {
          $temperatura=$column[$array_id_columnas[$i]];						
          }

          
          $insertando = mysqli_prepare($connect,"INSERT INTO automovil_datos_crudos (id_automovil_sensor, columna, time, temperatura, aprobacion) VALUES (?,?,?,?,?)");
          mysqli_stmt_bind_param($insertando, 'iissi', $array_id_sensores[$i], $columnita, $fecha_suma, $temperatura, $negacion);
          mysqli_stmt_execute($insertando);             

          $fecha_suma=date('Y-m-d H:i:s',strtotime("+ $intervalo seconds",strtotime($fecha_suma)));  
          $z=2;    

          }
          
        }//////////// CIERE DEL WHILE
        
        $z=1;
      }

      }
    }
  echo "Complete";
}////////////// FIN DEL ELSE DE ERROR COLUMNAS    
  

?>