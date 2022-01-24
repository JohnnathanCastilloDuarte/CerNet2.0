<?php 

include('../../config.ini.php');

$directorio_carga="archivos/";
$nombre_archivo_n = "sensor".$incrementador.".csv";
$personalizado = $directorio_carga.$nombre_archivo_n;

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
      rename("$archivo","$personalizado");
      
      $abrir_archivo = fopen($personalizado,'r');

      while(($column=fgetcsv($abrir_archivo,10000,";","\t"))!==false){
        
        if($contador > 0){
          
          
            $validador_supra = mysqli_prepare($connect,"SELECT id_certificado FROM sensores_certificados WHERE certificado = ?");
            mysqli_stmt_bind_param($validador_supra, 's', $column[3]);
            mysqli_stmt_execute($validador_supra);
            mysqli_stmt_store_result($validador_supra);
            mysqli_stmt_bind_result($validador_supra, $id_certificado);
            mysqli_stmt_fetch($validador_supra);
          
            if(mysqli_stmt_num_rows($validador_supra) == 0){
              
            
            
              $validar1 = mysqli_prepare($connect,"SELECT id_sensor FROM sensores WHERE nombre = ?");
              mysqli_stmt_bind_param($validar1, 's', $column[0]);
              mysqli_stmt_execute($validar1);
              mysqli_stmt_store_result($validar1);
              mysqli_stmt_bind_result($validar1, $id_sensor);
              mysqli_stmt_fetch($validar1);

              if(mysqli_stmt_num_rows($validar1) == 0){


                  $insertar = mysqli_prepare($connect,"INSERT INTO sensores (nombre, serie, tipo, pais) VALUES (?, ?, ?, ?)");
                  mysqli_stmt_bind_param($insertar, 'ssss', $column[0], $column[1], $column[2], $column[8]);
                  mysqli_stmt_execute($insertar);

                  $id = mysqli_stmt_insert_id($insertar);

                  $certificado = mysqli_prepare($connect,"INSERT INTO sensores_certificados (id_sensor, certificado, fecha_emision, fecha_vencimiento, pais, estado) VALUES (?, ?, ?, ?, ?, ?)");
                  mysqli_stmt_bind_param($certificado, 'isssss', $id, $column[3], $column[4], $column[5], $column[8], $column[7]);
                  mysqli_stmt_execute($certificado);

                  if($certificado){
                    $aciertos++;
                  }

              }else{
                    $certificado = mysqli_prepare($connect,"INSERT INTO sensores_certificados (id_sensor, certificado, fecha_emision, fecha_vencimiento, pais, estado) VALUES (?, ?, ?, ?, ?, ?)");
                    mysqli_stmt_bind_param($certificado, 'isssss', $id_sensor, $column[3], $column[4], $column[5], $column[8], $column[7]);
                    mysqli_stmt_execute($certificado);
                    if($certificado){
                      $aciertos++;
                    }
              }
            }else{
              echo "El certificado $column[3] ya se encuentra asociado<br>";
            }  
          
        }
        
        $contador++;
      }
      
      echo "<span class='text-success'>Se ha insertado $aciertos sensores de $contador encontrados </span>";

    }
}
?>