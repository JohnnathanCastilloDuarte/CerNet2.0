<?php 
require('../../../../recursos/itemencabezadopdf.php');
require('../../../../config.ini.php');


$clave = $_GET['clave'];

$id_asignado = substr($clave, 97);

//echo $id_asignado;
/////// CONSULTA TRAE INFORMACIÓN DEL EQUIPO
$consulta_informacion_informe = mysqli_prepare($connect,"SELECT a.descripcion, a.nombre, b.marca,  b.modelo, b.ubicacion, b.ubicado_en, b.lugar_filtro, b.tipo_filtro, b.filtro_dimension, b.cantidad_filtro, b.limite_penetracion, b.eficiencia, b.serie FROM item as a, item_filtro as b, item_asignado as c WHERE c.id_asignado = ? AND c.id_item = b.id_item AND b.id_item = c.id_item AND a.id_tipo = 11");

mysqli_stmt_bind_param($consulta_informacion_informe, 'i', $id_asignado);
mysqli_stmt_execute($consulta_informacion_informe);
mysqli_stmt_store_result($consulta_informacion_informe);
mysqli_stmt_bind_result($consulta_informacion_informe, $descripcion, $nombre_item, $marca, $modelo, $direccion, 
   $ubicado_en, $lugar_filtro, $tipo_filtro, $dimenciones, $cantidad_filtro, $limite_penetracion, $eficiencia, $n_serie);
mysqli_stmt_fetch($consulta_informacion_informe);


/// CONSULTA TRAE INFORMACIÓN DE LA EMPRESA

$consulta_empresa = mysqli_prepare($connect,"SELECT d.logo, e.nombre_informe, c.numot, DATE_FORMAT(e.fecha_registro, '%m/%d/%Y'), d.nombre, d.direccion, e.insp1, e.insp2, e.insp3, e.insp4, e.insp5, e.insp6, e.id_informe , e.solicitante, e.conclusion, e.usuario_responsable, e.fecha_medicion 
FROM item_asignado as a, servicio as b, numot as c, empresa as d, informe_filtro as e  
   WHERE a.id_asignado = ? AND a.id_servicio = b.id_servicio AND b.id_numot = c.id_numot AND c.id_empresa = d.id_empresa AND a.id_asignado = e.id_asignado");

mysqli_stmt_bind_param($consulta_empresa, 'i', $id_asignado);
mysqli_stmt_execute($consulta_empresa);
mysqli_stmt_store_result($consulta_empresa);
mysqli_stmt_bind_result($consulta_empresa,$logo_empresa, $nombre_informe, $numot, $fecha_registro, $empresa, $direccion_empresa, $insp1, $insp2, $insp3, $insp4,  $insp5, $insp6, $id_informe, $solicitante, $conclusion, $usuario_responsable, $fecha_medicion);
mysqli_stmt_fetch($consulta_empresa);

  
  $consultar_responsable = mysqli_prepare($connect,"SELECT b.nombre, b.apellido, c.nombre 
  FROM usuario a, persona b, cargo c WHERE a.id_usuario = b.id_usuario AND c.id_cargo = b.id_cargo AND a.usuario = ?");

mysqli_stmt_bind_param($consultar_responsable, 's', $usuario_responsable);
mysqli_stmt_execute($consultar_responsable);
mysqli_stmt_store_result($consultar_responsable);
mysqli_stmt_bind_result($consultar_responsable, $nombre_responsable, $apellido_responsable, $nombre_cargo);
mysqli_stmt_fetch($consultar_responsable);


$num_numot = substr($numot,2);
$logo = $logo_empresa;

if($conclusion == 'Pre-Informe'){
  $tipo_info = 'Pre-Informe';
} 
$pdf->AddPage('A4');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
   
}
</style>
<br><br><br><br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>CERTIFICADO DE INSPECCIÓN INTEGRIDAD DE FILTRO</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->SetFillColor(221,221,221);
$pdf->SetDrawColor(202,202,202);

     $pdf->Cell(25,5,'Informe referencia:',0,0,'L',0,'',0);
     $pdf->Cell(50,5,$nombre_informe,1,0,'J',0,'',0);
     $pdf->Cell(15,5,'OT N°',0,0,'C',0,'',0);
     $pdf->Cell(15,5,$num_numot,1,0,'C',0,'',0);
     $pdf->Cell(20,5,'',0,0,'C',0,'',0);
     $pdf->Cell(30,5,'Fecha de Emisión:',0,0,'L',0,'',0);
     $pdf->Cell(25,5,$fecha_registro,1,0,'C',0,'',0);

   $pdf->ln(7);   

   $pdf->Cell(25,5,'Empresa:',0,0,'L',0,'',0);
   $pdf->Cell(80,5,$empresa,1,0,'C',0,'',0);
   $pdf->Cell(20,5,'',0,0,'C',0,'',0);
   $pdf->Cell(20,5,'Solicita:',0,0,'L',0,'',0);
   $pdf->Cell(35,5,$solicitante,1,0,'C',0,'',0);

   $pdf->ln(7);  

   $pdf->Cell(25,5,'Dirección:',0,0,'L',0,'',0);
   $pdf->Cell(155,5,$direccion,1,0,'L',0,'',0);

   $pdf->ln(10);  

   $pdf->Cell(42,5,'Descripción',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Marca',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Modelo',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Serie',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Lugar',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Ubicado en',1,0,'C',1,'',0);
   $pdf->ln(5); 
   $pdf->Cell(42,5,$descripcion,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$n_serie,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$lugar_filtro,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$ubicado_en,1,0,'C',0,'',0);
   $pdf->ln(7);  
   $pdf->Cell(60,5,'Tipo de Filtro y Dimensiones',1,0,'C',1,'',0);
   $pdf->Cell(54,5,'Cantidad de Filtros HEPA',1,0,'C',1,'',0);
   $pdf->Cell(33,5,'Límite de Penetración',1,0,'C',1,'',0);
   $pdf->Cell(33,5,'Eficiencia',1,0,'C',1,'',0);
   $pdf->ln(5);
   $pdf->Cell(60,5,$tipo_filtro.' '.$dimenciones,1,0,'C',0,'',0);
   $pdf->Cell(54,5,$cantidad_filtro,1,0,'C',0,'',0);
   $pdf->Cell(33,5,$limite_penetracion.'%',1,0,'C',0,'',0);
   $pdf->Cell(33,5,$eficiencia,1,0,'C',0,'',0);

  $pdf->ln(7);



$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
   
}
{
   border-collapse: collapse;
   width: 90%;
   text-align: center;
   vertical-align: middle;
   }

   th 
   {
   background-color: #3138AA;
   color: #FFFFFF;
   vertical-align: middle;
   }

   th, td 
   {
   padding: 3px;
   vertical-align: middle;
   height:15px;
   font-size:11px;
   padding:auto auto auto auto;
   }

   tr:nth-child(even) 
   {
      background-color: #f2f2f2;
   }

</style>
<br><br>
<table>
   <tr>
        <td class="linea" align="center"><h3>Resultado de Mediciones - Norma: UNE-EN ISO 14.644-3:2015</h3></td>
   </tr>
</table>
<br><br>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');
  
  $busca_filtros1 = mysqli_prepare($connect,"SELECT valor_obtenido, valor_filtro, nombre_filtro FROM filtro_mediciones_1 WHERE id_informe = ?");

mysqli_stmt_bind_param($busca_filtros1, 'i', $id_informe);
mysqli_stmt_execute($busca_filtros1);
mysqli_stmt_store_result($busca_filtros1);
mysqli_stmt_bind_result($busca_filtros1, $valor_obtenido, $valor_filtro, $nombre_filtro );
//mysqli_stmt_fetch($busca_filtros1);


  

   $pdf->Cell(45,5,'Medición',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Requisito',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Valor Obtenido',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Veredicto',1,0,'C',1,'',0);
   $pdf->ln(5);
$contador_cumples = 0;
   while($row = mysqli_stmt_fetch($busca_filtros1)){
    if ($valor_obtenido <= 0.001) {
        $cumple_filtro = 'CUMPLE';
    }else{
        $cumple_filtro = 'NO CUMPLE';
    }
    if ($cumple_filtro == 'NO CUMPLE') {
       $contador_cumples++;
    }
      
     $pdf->Cell(45,5,'Prueba de Integridad de Filtro #'.$valor_filtro,1,0,'C',1,'',0);
     $pdf->Cell(45,5,'<= 0.001 %',1,0,'C',0,'',0);
     $pdf->Cell(45,5,$valor_obtenido,1,0,'C',0,'',0);
     $pdf->Cell(45,5,$cumple_filtro,1,0,'C',0,'',0);
     $pdf->ln(5);
 
    }

    if ($contador_cumples > 0) {
        $cumple_conclu = 'NO CUMPLE';
      }else if ($contador_cumples == 0){
        $cumple_conclu = 'CUMPLE';
      }

    //echo $contador_cumples;

 $pdf->ln(80);
 
$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
   
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Conclusión</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

if ($conclusion == 'Informe') {
  $conclu = 'De acuerdo a los resultados obtenidos a las muestras inspeccionadas, la sala indicada en la ubicación del encabezado, 
CUMPLE con los parámetros establecidos en la normativa vigente.';
}elseif($conclusion == 'Pre-Informe'){
  $conclu = 'Los resultados obtenidos en el presente informe, 
se aplican solo a los elementos ensayados y corresponde a las condiciones encontradas al momento de la inspección';
}

$pdf->writeHTMLCell(165, 5, 15, '', $conclu ,0,1, 0, true, 'J', true);

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Duración de Certificado</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(0, 5, 15, '', 'De acuerdo con la UNE-EN ISO 14644-1 Anexo B, el intervalo de tiempo máximo entre verificaciones es de 12 meses. ' ,0,1, 0, true, 'J', true);


$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Responsable</h2></td>
  
        <td class="linea" align="center"><h2>Fecha Medición</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->Cell(90,5,'Ing. '.$nombre_responsable.' '. $apellido_responsable,0,0,'C',0,'',0);
$pdf->Cell(90,5,$fecha_medicion,0,0,'C',0,'',0);
$pdf->ln(3);
$pdf->Cell(90,5,$nombre_cargo,0,0,'C',0,'',0);


$pdf->AddPage('A4');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
   
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2><b>Medición de Inspección de Filtro</b></h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


   $pdf->Cell(25,5,'Informe referencia:',0,0,'L',0,'',0);
     $pdf->Cell(50,5,$nombre_informe,1,0,'J',0,'',0);
     $pdf->Cell(15,5,'OT N°',0,0,'C',0,'',0);
     $pdf->Cell(15,5,$num_numot,1,0,'C',0,'',0);
     $pdf->Cell(20,5,'',0,0,'C',0,'',0);
     $pdf->Cell(30,5,'Fecha de Emisión:',0,0,'L',0,'',0);
     $pdf->Cell(25,5,$fecha_registro,1,0,'C',0,'',0);

   $pdf->ln(7);   

   $pdf->Cell(25,5,'Empresa:',0,0,'L',0,'',0);
   $pdf->Cell(80,5,$empresa,1,0,'C',0,'',0);
   $pdf->Cell(20,5,'',0,0,'C',0,'',0);
   $pdf->Cell(20,5,'Solicita:',0,0,'L',0,'',0);
   $pdf->Cell(35,5,$solicitante,1,0,'C',0,'',0);

   $pdf->ln(7);  

   $pdf->Cell(25,5,'Dirección:',0,0,'L',0,'',0);
   $pdf->Cell(155,5,$direccion,1,0,'L',0,'',0);

   $pdf->ln(10);  

   $pdf->Cell(42,5,'Descripción',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Marca',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Modelo',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Serie',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Lugar',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Ubicado en',1,0,'C',1,'',0);
   $pdf->ln(5); 
   $pdf->Cell(42,5,$descripcion,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$n_serie,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$lugar_filtro,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$ubicado_en,1,0,'C',0,'',0);
   $pdf->ln(7);  
   $pdf->Cell(60,5,'Tipo de Filtro y Dimensiones',1,0,'C',1,'',0);
   $pdf->Cell(54,5,'Cantidad de Filtros HEPA',1,0,'C',1,'',0);
   $pdf->Cell(33,5,'Límite de Penetración',1,0,'C',1,'',0);
   $pdf->Cell(33,5,'Eficiencia',1,0,'C',1,'',0);
   $pdf->ln(5);
   $pdf->Cell(60,5,$tipo_filtro.' '.$dimenciones,1,0,'C',0,'',0);
   $pdf->Cell(54,5,$cantidad_filtro,1,0,'C',0,'',0);
   $pdf->Cell(33,5,$limite_penetracion.'%',1,0,'C',0,'',0);
   $pdf->Cell(33,5,$eficiencia,1,0,'C',0,'',0);

  $pdf->ln(7);

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
   
}
</style>
<br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2><b>Inspección Visual</b></h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

     $pdf->Cell(70,5,'Equipo en buenas condiciones de operación:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp1,1,0,'C',0,'',0);
     $pdf->Cell(10,5,'',0,0,'J',0,'',0);
     $pdf->Cell(70,5,'Filtro presenta reparaciones:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp2,1,0,'C',0,'',0);
     $pdf->ln(5);
     $pdf->Cell(70,5,'Filtro presenta rotura:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp3,1,0,'C',0,'',0);
     $pdf->Cell(10,5,'',0,0,'J',0,'',0);
     $pdf->Cell(70,5,'Filtro presenta rotura en sellos perimetrales:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp4,1,0,'C',0,'',0);
     $pdf->ln(5);
     $pdf->Cell(70,5,'Filtros instalados correctamente:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp5,1,0,'C',0,'',0);
     $pdf->Cell(10,5,'',0,0,'J',0,'',0);
     $pdf->Cell(70,5,'Presenta colmatación:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp6,1,0,'C',0,'',0);

     $pdf->ln(5); 


//Consultar la primera imagen 1

$buscar_imagen_1 = mysqli_prepare($connect,"SELECT url FROM images_informe_filtro 
  WHERE id_informe = ? AND tipo_imagen = 1");

mysqli_stmt_bind_param($buscar_imagen_1, 'i', $id_informe);
mysqli_stmt_execute($buscar_imagen_1);
mysqli_stmt_store_result($buscar_imagen_1);
mysqli_stmt_bind_result($buscar_imagen_1, $url_imagen1); 
mysqli_stmt_fetch($buscar_imagen_1);

if ($url_imagen1 == '') {
  $url_img = '';
}else{
$url_img = '../../'.$url_imagen1;    
}

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
   
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2><b>Prueba de Integridad de Filtros UNE-EN ISO 14.644-3:2015</b></h2></td>
   </tr>
   <br>
   <tr>
        <td><p>Con este procedimiento se buscan eventuales fugas de aire no filtrado que pueda ingresar al área de trabajo, hermeticidad y estanqueidad en marcos y junturas.
         Se aplica a todas las unidades que dispongan de filtro terminal HEPA o ULPA, en este procedimiento se inyectan partículas de 0,3 a 5 micrones en forma de aerosol,
         con una concentración de 22.9 mg/litro.</p></td>
   </tr>
</table>
<br>
<br>
<table border="0" style="text-align: center;">
      <tr>
         <td><h2>Filtro a Examinar</h2></td>
      </tr>
      <br><br>
      <tr>
         <td style= "height: 250px;"><img src="../../imagenes/definidas/imagen1.png" style="width: 300px;"></td>
      </tr>
      <tr>
         <td><h2>Imagen de la Medición</h2></td>
      </tr>
      <tr>
         <td style= "height: 150px;"><img src="$url_img" style="width: 200px;"></td>
      </tr>
</table>


EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->AddPage('A4');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
   
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Medición de Inspección Integridad de Filtro</h2></td>
   </tr>

</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


   $pdf->Cell(25,5,'Informe referencia:',0,0,'L',0,'',0);
     $pdf->Cell(50,5,$nombre_informe,1,0,'J',0,'',0);
     $pdf->Cell(15,5,'OT N°',0,0,'C',0,'',0);
     $pdf->Cell(15,5,$num_numot,1,0,'C',0,'',0);
     $pdf->Cell(20,5,'',0,0,'C',0,'',0);
     $pdf->Cell(30,5,'Fecha de Emisión:',0,0,'L',0,'',0);
     $pdf->Cell(25,5,$fecha_registro,1,0,'C',0,'',0);

   $pdf->ln(7);   

   $pdf->Cell(25,5,'Empresa:',0,0,'L',0,'',0);
   $pdf->Cell(80,5,$empresa,1,0,'C',0,'',0);
   $pdf->Cell(20,5,'',0,0,'C',0,'',0);
   $pdf->Cell(20,5,'Solicita:',0,0,'L',0,'',0);
   $pdf->Cell(35,5,$solicitante,1,0,'C',0,'',0);

   $pdf->ln(7);  

   $pdf->Cell(25,5,'Dirección:',0,0,'L',0,'',0);
   $pdf->Cell(155,5,$direccion,1,0,'L',0,'',0);

   $pdf->ln(10);  

   $pdf->Cell(42,5,'Descripción',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Marca',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Modelo',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Serie',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Lugar',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Ubicado en',1,0,'C',1,'',0);
   $pdf->ln(5); 
   $pdf->Cell(42,5,$descripcion,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$n_serie,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$lugar_filtro,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$ubicado_en,1,0,'C',0,'',0);
   $pdf->ln(7);  
   $pdf->Cell(60,5,'Tipo de Filtro y Dimensiones',1,0,'C',1,'',0);
   $pdf->Cell(54,5,'Cantidad de Filtros HEPA',1,0,'C',1,'',0);
   $pdf->Cell(33,5,'Límite de Penetración',1,0,'C',1,'',0);
   $pdf->Cell(33,5,'Eficiencia',1,0,'C',1,'',0);
   $pdf->ln(5);
   $pdf->Cell(60,5,$tipo_filtro.' '.$dimenciones,1,0,'C',0,'',0);
   $pdf->Cell(54,5,$cantidad_filtro,1,0,'C',0,'',0);
   $pdf->Cell(33,5,$limite_penetracion.'%',1,0,'C',0,'',0);
   $pdf->Cell(33,5,$eficiencia,1,0,'C',0,'',0);

  $pdf->ln(7);


$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
   
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Detalle de Mediciones</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->Cell(20,5,'N° de Filtro',1,0,'C',1,'',0);
$pdf->Cell(20,5,'Zona A',1,0,'C',1,'',0);
$pdf->Cell(20,5,'Zona A',1,0,'C',1,'',0);
$pdf->Cell(20,5,'Zona B',1,0,'C',1,'',0);
$pdf->Cell(20,5,'Zona B',1,0,'C',1,'',0);
$pdf->Cell(20,5,'Zona C',1,0,'C',1,'',0);
$pdf->Cell(20,5,'Zona C',1,0,'C',1,'',0);
$pdf->Cell(20,5,'Zona D',1,0,'C',1,'',0);
$pdf->Cell(20,5,'Zona D',1,0,'C',1,'',0);
$pdf->ln(5);

//Consulta que busca los filtros usados 
$consultar_N_filtro = mysqli_prepare($connect,"SELECT nombre_filtro, zonaA, zonaAA, zonaB, zonaBB, zonaC, zonaCC, zonaD, zonaDD  FROM filtro_mediciones_2 WHERE id_informe = ?");

mysqli_stmt_bind_param($consultar_N_filtro, 'i', $id_informe);
mysqli_stmt_execute($consultar_N_filtro);
mysqli_stmt_store_result($consultar_N_filtro);
mysqli_stmt_bind_result($consultar_N_filtro, $nombre_filtro, $zonaA, $zonaAA, $zonaB, $zonaBB, $zonaC, $zonaCC, $zonaD, $zonaDD);

   //AQUI VAN LOS VALORES
while($row = mysqli_stmt_fetch($consultar_N_filtro)){
      


    $pdf->Cell(20,5,$nombre_filtro,1,0,'C',1,'',0);
    $pdf->Cell(20,5,' < '.$zonaA,1,0,'C',0,'',0);
    $pdf->Cell(20,5,' < '.$zonaAA,1,0,'C',0,'',0);
    $pdf->Cell(20,5,' < '.$zonaB,1,0,'C',0,'',0);
    $pdf->Cell(20,5,' < '.$zonaBB,1,0,'C',0,'',0);
    $pdf->Cell(20,5,' < '.$zonaC,1,0,'C',0,'',0);
    $pdf->Cell(20,5,' < '.$zonaCC,1,0,'C',0,'',0);
    $pdf->Cell(20,5,' < '.$zonaD,1,0,'C',0,'',0);
    $pdf->Cell(20,5,' < '.$zonaDD,1,0,'C',0,'',0);
    $pdf->ln(5);

   }  

$pdf->ln(70);

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
   
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2><b>Equipos Utilizados en la Medición</b></h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



   $pdf->Cell(28,5,'Marca',1,0,'C',1,'',0);
   $pdf->Cell(31,5,'Modelo',1,0,'C',1,'',0);
   $pdf->Cell(30,5,'N° Serie',1,0,'C',1,'',0);
   $pdf->Cell(35,5,'Certificado de Calibración',1,0,'C',1,'',0);
   $pdf->Cell(30,5,'Última Calibración',1,0,'C',1,'',0);
   $pdf->Cell(26,5,'Trazabilidad',1,0,'C',1,'',0);
    $pdf->ln(5);

//Consulta que busca los filtros usados 
$consultar_equipo = mysqli_prepare($connect,"SELECT  b.marca_equipo, b.modelo_equipo, b.n_serie_equipo, c.numero_certificado, c.fecha_emision FROM equipos_mediciones a, equipos_cercal b, certificado_equipo c WHERE a.id_informe = ? AND a.id_equipo = b.id_equipo_cercal AND c.id_equipo_cercal = a.id_equipo");

mysqli_stmt_bind_param($consultar_equipo, 'i', $id_informe);
mysqli_stmt_execute($consultar_equipo);
mysqli_stmt_store_result($consultar_equipo);
mysqli_stmt_bind_result($consultar_equipo, $marca_equipo, $modelo_equipo, $n_serie_equipo, $numero_certificado, $fecha_emision);

   //AQUI VAN LOS VALORES
   while($row = mysqli_stmt_fetch($consultar_equipo)){

   $pdf->Cell(28,5,$marca_equipo,1,0,'C',0,'',0);
   $pdf->Cell(31,5,$modelo_equipo,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$n_serie_equipo,1,0,'C',0,'',0);
   $pdf->Cell(35,5,$numero_certificado,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$fecha_emision,1,0,'C',0,'',0);
   $pdf->Cell(26,5,'-',1,0,'C',0,'',0);
   $pdf->ln(5);

   } 

$pdf->AddPage('A4');


 $linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
   
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2><b>Evidencia grafica</b></h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');  


//Consulta que busca las imagenes
$consultar_imagenes = mysqli_prepare($connect,"SELECT url, enunciado FROM images_informe_filtro 
  WHERE id_informe = ? AND tipo_imagen = 2");

mysqli_stmt_bind_param($consultar_imagenes, 'i', $id_informe);
mysqli_stmt_execute($consultar_imagenes);
mysqli_stmt_store_result($consultar_imagenes);
mysqli_stmt_bind_result($consultar_imagenes, $url, $enunciado);


$cont = 1;
$contador_2 = 1;
while($row = mysqli_stmt_fetch($consultar_imagenes)){

        if ($cont == 1) {
          $pdf->writeHTMLCell(90, 50, 15, '','<h3>'.$enunciado.'</h3><br><img src="../../'.$url.'" style="width: 300px; height: 200px;">', 0, 0, 0, true, 'C', true);
        }else if ($cont == 2){
          $pdf->writeHTMLCell(90, 50, 105, '', '<h3>'.$enunciado.'</h3><br><img src="../../'.$url.'" style="width: 300px; height: 200px;">', 0, 1, 0, true, 'C', true);
          $cont = 0;
        }

        $cont++;
        $contador_2++;

        if ($contador_2 == 6) {
          $pdf->AddPage('A4');
        }

}
   
/*while($row = mysqli_stmt_fetch($consultar_imagenes)){
      
       $imagenes = <<<EOD
       
         <table witdh="100%" border="1">
            <tr>
               <td>$enunciado</td>
               <td width="200px">
                  <img src="../../$url">
               </td>
                <td></td>
            </tr>
         </table>
         <br>
      

      EOD;  
      $pdf->writeHTML($imagenes, true, false, false, false, '');  
   

   }     */


$pdf->Output($nombre_informe, 'I');
?>