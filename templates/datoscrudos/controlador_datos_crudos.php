<?php 

include("../../config.ini.php");

$id_valida = $_POST['id_valida'];
$id_asignado = $_POST['id_asignado'];
$id_mapeo = $_POST['id_mapeo'];
$tipo_archivo_dc = $_POST['tipo_archivo_dc'];
$rango_mayor_igual = $_POST['rango_mayor_igual'];
$rango_menor_igual = $_POST['rango_menor_igual'];


$query1 = mysqli_prepare($connect,"SELECT c.nombre FROM item_asignado as a, item as b, tipo_item as c WHERE a.id_asignado = ? AND 
a.id_item = b.id_item AND b.id_tipo = c.id_item");
mysqli_stmt_bind_param($query1, 'i', $id_asignado);
mysqli_stmt_execute($query1);
mysqli_stmt_store_result($query1);
mysqli_stmt_bind_result($query1, $nombre);
mysqli_stmt_fetch($query1);

$url_archivo = "";


switch ($nombre){
    case 'UltraFreezer':
        
        $fechas = mysqli_prepare($connect,"SELECT fecha_inicio, hora_inicio, fecha_final, hora_final, intervalo FROM ultrafreezer_mapeo WHERE id_mapeo = ?");
		mysqli_stmt_bind_param($fechas, 'i', $id_mapeo);
		mysqli_stmt_execute($fechas);
		mysqli_stmt_store_result($fechas);
		mysqli_stmt_bind_result($fechas, $fecha_inicio, $hora_inicio, $fecha_final, $hora_final, $intervalo);
		mysqli_stmt_fetch($fechas);


		$pre_start = $fecha_inicio." ".$hora_inicio;
		$pre_end = $fecha_final." ".$hora_final;

		$start = date("Y-m-d H:i:s",strtotime($pre_start));
		$end = date("Y-m-d H:i:s",strtotime($pre_end));


    break;
}


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

$incrementador = "01";

$nombre_archivo_n = "datos_crudos".$incrementador.".csv";
$$nombre_archivo_txt  = "error_datos_crudos".$incrementador.".csv";



$directorio_carga = "datos_crudos_".$nombre."/id_ot_".$id_numot."/id_serv_".$id_asignado."/id_mapeo_".$id_mapeo."/";
$personalizado = $directorio_carga.$nombre_archivo_n;
$nombre_final_sin_errores = $directorio_carga."datos_crudos_version_sin_errores.csv";

if(is_dir($directorio_carga)===false)
{
  mkdir($directorio_carga,0777,true);
  echo "directorio creado";
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
   
    $validador = 0;
    do {
        if (file_exists($personalizado)){
           
            $incrementador = $incrementador + 1;
            
            if($incrementador <= 9){
                $nombre_archivo_n = "datos_crudos0".$incrementador.".csv";
                $nombre_archivo_txt = "error_datos_crudos0".$incrementador.".csv";
            }else{
                $nombre_archivo_n = "datos_crudos".$incrementador.".csv";
                $nombre_archivo_txt = "error_datos_crudos0".$incrementador.".csv";
            }

            
        } else {
           
            $validador++;
        }
        
        $personalizado = $directorio_carga.$nombre_archivo_n;
        $personalida_txt = $directorio_carga.$nombre_archivo_txt;
        $url_archivo =  $personalizado;

    }while($validador == 0);  

    $personalida_txt = $directorio_carga.$nombre_archivo_txt;
  if(move_uploaded_file($_FILES['file']['tmp_name'],$archivo))
  {
         
    rename("$archivo","$personalizado"); 

    $variable_contador = 0;
    $array_datos_crudos = array();
    $z_1 = 1;
    $errores = "";

    $abrir_archivo = fopen($personalizado,'r');

    //fopen($personalida_txt, 'w');

    while(($column=fgetcsv($abrir_archivo,10000,";","\t"))!==false){

        if($variable_contador > 6){

            $fecha_archivo = $column[0]." ".$column[1];
            $fecha_hora_sql = date("Y-m-d H:i:s",strtotime($fecha_archivo));

            if($z_1==1)
            {
                $fecha_suma=$start;
            }
            else
            {
                $fecha_suma=$fecha_suma;
            } 
            
            if(($fecha_suma>=$start) && ($fecha_suma<=$end)){

                

                if($column[2] < $rango_menor_igual || $column[2] > $rango_mayor_igual){
                    
                    $errores = "si";
                }else{

                    
                    $errores = "no";
                }

                $array_datos_crudos[] = array(
                    'fecha_hora'=>$fecha_suma,
                    'v1'=>str_replace(",",".",$column[2]),
                    'v2'=>str_replace(",",".",$column[3]),
                    'v3'=>str_replace(",",".",$column[4]),
                    'v4'=>str_replace(",",".",$column[5]),
                    'v5'=>str_replace(",",".",$column[6]),
                    'v6'=>str_replace(",",".",$column[7]),
                    'v7'=>str_replace(",",".",$column[8]),
                    'v8'=>str_replace(",",".",$column[9]),
                    'v9'=>str_replace(",",".",$column[10]),
                    'v10'=>str_replace(",",".",$column[11])
                );

                $fecha_suma=date('Y-m-d H:i:s',strtotime("+$intervalo seconds",strtotime($fecha_suma)));  
                $z_1=2; 
            }
            
                
        }

        $variable_contador++;
    }   
    
    $estado = "";
   
    if($errores == "si"){
        
        $estado = 0;

        $variable_contador = 0;
        $abrir_archivo1 = fopen($personalizado,'r');
        unlink($personalida_txt);
        $archivo_txt = fopen($personalida_txt, 'w');
        $fecha_suma = "";
        $z_1 = 1;

        fwrite($archivo_txt, "fecha hora;v1;v2;v3;v4;v5;v6;v7;v8;v9;v10;\r\n");
        while(($column=fgetcsv($abrir_archivo1,10000,";","\t"))!==false){
           
            if($variable_contador > 6){

                $fecha_archivo = $column[0]." ".$column[1];
                $fecha_hora_sql = date("Y-m-d H:i:s",strtotime($fecha_archivo));
              
                if($z_1==1)
                {
                    $fecha_suma=$start;
                }
                else
                {
                    $fecha_suma=$fecha_suma;
                } 

                
                
                if(($fecha_suma>=$start) && ($fecha_suma<=$end)){
                   
                   /* fwrite($archivo_txt, "| fecha hora : ".$fecha_suma." | V1:".$column[2]." | V2:".$column[3]." | V3:".$column[4]
                    ." | V4:".$column[5]." | V5:".$column[6]." | V6:".$column[7]." | V7:".$column[8]." | V8:".$column[9]." | V9:".$column[10]
                    ." | V10:".$column[11]." |".PHP_EOL);]*/

                    fwrite($archivo_txt, $fecha_suma.";".$column[2].";".$column[3].";".$column[4]
                    .";".$column[5].";".$column[6].";".$column[7].";".$column[8].";".$column[9].";".$column[10]
                    .";".$column[11].";\r\n");
        

                    $fecha_suma=date('Y-m-d H:i:s',strtotime("+$intervalo seconds",strtotime($fecha_suma)));  
                    $z_1=2; 
                }
                
                    
            }

            $variable_contador++;
        }  
        fclose($archivo_txt); 
    }else{
        $estado = 1;
        $personalizado_FINAL = $directorio_carga."ORIGINAL_".$nombre_archivo_n;
        rename("$personalizado","$personalizado_FINAL"); 
        $url_archivo =  $personalizado_FINAL;
    }
    
    //////////////////// INSERTAMOS LA INFORMACIÓN DE DATOS CRUDOS

    $insertar = mysqli_prepare($connect,"INSERT INTO registro_dc (id_mapeo, id_asignado, url_archivo, url_error, estado, id_usuario) VALUES (?,?,?,?,?,?)");
    mysqli_stmt_bind_param($insertar, 'iissii', $id_mapeo, $id_asignado, $url_archivo, $personalida_txt, $estado, $id_valida);
    mysqli_stmt_execute($insertar);

    $convert = json_encode($array_datos_crudos);
    echo $convert;


  

    

    
}




  
}  
    
?>