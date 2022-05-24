<?php 

include('../../config.ini.php');

$id_mapeo_sensor = $_POST['id_mapeo_sensor'];
$archivo_sensor = $_POST['archivo_sensor'];

$consultando = mysqli_prepare($connect,"SELECT a.fecha_inicio, a.fecha_fin, a.intervalo, 
((DATEDIFF(a.fecha_fin,a.fecha_inicio) * 1440) / (a.intervalo / 60)) as cantidad_mediciones  
FROM mapeo_general AS a,  mapeo_general_sensor AS b WHERE a.id_mapeo = b.id_mapeo AND b.id_sensor_mapeo = ?");
mysqli_stmt_bind_param($consultando, 'i', $id_mapeo_sensor);
mysqli_stmt_execute($consultando);
mysqli_stmt_store_result($consultando);
mysqli_stmt_bind_result($consultando, $fecha_inicio, $fecha_fin, $intervalo, $diferencia);
mysqli_stmt_fetch($consultando);

$directorio_carga="datos_crudos/mapeo_termico_#_".$id_mapeo_sensor."/";
$nombre_archivo_n = "data_cruda.csv";
$personalizado = $directorio_carga.$nombre_archivo_n;

$incremet = 1;
$i = 0;
do {
   if(file_exists($personalizado)){
     $nombre_archivo_n = "data_cruda_".$incremet.".csv";
     $personalizado = $directorio_carga.$nombre_archivo_n;
     $incremet++;
   }else{
     $i=2;
   }
} while ($i == 0);


if(is_dir($directorio_carga)===false)
{
  mkdir($directorio_carga,0777,true);
  echo "directorio creado";
}//


$archivo=$directorio_carga.basename($_FILES["archivo_sensor"]["name"]);
$cargaok=1;
$escsv=strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
$formato_valido=array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
$nombre_archivo=basename($_FILES["archivo_sensor"]["name"]);

if(isset($_POST["archivo_sensor"]))
{
  if(in_array($_FILES["archivo_sensor"]["type"],$formato_valido))
  {
    $cargaok=1;
  }
  else
  {
    echo "El formato de archivo no es valido ".$_FILES["archivo_sensor"]["name"];
    $cargaok=0;
  }
}


if($_FILES["archivo_sensor"]["size"]>50000000)
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
    if(move_uploaded_file($_FILES['archivo_sensor']['tmp_name'],$archivo))
    {
      $contador = 0;
      $aciertos = 1;
      $z_1 = 1;
      rename("$archivo","$personalizado");
      
      $abrir_archivo = fopen($personalizado,'r');
      
     
      
      $supra_eliminador = mysqli_prepare($connect,"SELECT id_dato_crudo FROM datos_crudos_general WHERE id_sensor_mapeo = ?");
      mysqli_stmt_bind_param($supra_eliminador, 'i', $id_mapeo_sensor);
      mysqli_stmt_execute($supra_eliminador);
      mysqli_stmt_store_result($supra_eliminador);
      mysqli_stmt_bind_result($supra_eliminador, $id_dato_crudo);
    
      while($row = mysqli_stmt_fetch($supra_eliminador)){
        
          $eliminar_supra = mysqli_prepare($connect,"DELETE FROM datos_crudos_general WHERE id_dato_crudo = ?");
          mysqli_stmt_bind_param($eliminar_supra, 'i',$id_dato_crudo);
          mysqli_stmt_execute($eliminar_supra);
        
      }
      
   
      $contador_sub = 1;
      while(($column=fgetcsv($abrir_archivo,10000,";","\t"))!==false){
        
          
        
       
        
        if($contador > 20){
          
   
         $validador_fecha = strpos($column[1], '/');
          
         if($validador_fecha){
            str_replace("/","-",$column[1]);
           break;
         }else{
           

            if($z_1==1){
              
                $fecha_suma=$fecha_inicio;
            }else{
                  
                $fecha_suma=$fecha_suma;
            } 
            
       
            
            
            $fecha_sql=date("Y-m-d H:i:s",strtotime($column[1]));
          
            if($fecha_sql>=$fecha_inicio && $contador_sub  <= $diferencia){
              
              $temp = str_replace(',','.', $column[2]);
              $hum = str_replace(',','.', $column[3]);
                
                  
                $insertando = mysqli_prepare($connect,"INSERT INTO datos_crudos_general (id_sensor_mapeo, time, temp, hum) VALUES (?,?,?,?)");
                mysqli_stmt_bind_param($insertando, 'isss', $id_mapeo_sensor, $fecha_suma, $temp, $hum);
                mysqli_stmt_execute($insertando);
                $fecha_suma=date('Y-m-d H:i:s',strtotime("+$intervalo seconds",strtotime($fecha_suma)));
                $z_1=2;
               
              
              $contador_sub++;
            } 
                            
        }
       }                                     
         $contador++;
       
      }
    }
}

mysqli_close($connect);

?>