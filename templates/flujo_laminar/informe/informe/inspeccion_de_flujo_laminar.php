<?php 
require('../../../../recursos/itemencabezadopdf.php');
require('../../../../config.ini.php');


$pdf->AddPage('A4');


$clave = $_GET['clave'];

$id_asignado = substr($clave, 97);


//informacion del item
$consulta_informacion_informe = mysqli_prepare($connect,"SELECT a.descripcion, a.nombre, b.cantidad_filtro, b.direccion, b.ubicacion_interna, b.area_interna, b.tipo_cabina, b.marca, b.modelo, b.serie, b.codigo, b.tipo_dimenciones, b.limite_penetracion, b.eficiencia, b.fecha_registro, b.clasificacion_oms, b.clasificacion_iso
  FROM item as a, item_flujo_laminar as b, item_asignado as c 
  WHERE c.id_asignado = ? AND c.id_item = a.id_item AND b.id_item = c.id_item AND a.id_tipo = 13");


mysqli_stmt_bind_param($consulta_informacion_informe, 'i', $id_asignado);
mysqli_stmt_execute($consulta_informacion_informe);
mysqli_stmt_store_result($consulta_informacion_informe);
mysqli_stmt_bind_result($consulta_informacion_informe, $descripcion, $nombre_item, $cantidad_filtro, $direccion, $ubicacion_interna, $area_interna, $tipo_cabina, $marca, $modelo, $serie, $codigo, $tipo_dimenciones, $limite_penetracion, $eficiencia, $fecha_registro, $clasificacion_oms, $clasificacion_iso);
mysqli_stmt_fetch($consulta_informacion_informe);



//información de la inspeccion
$inspeccion_visual = mysqli_prepare($connect,"SELECT insp_1, insp_2, insp_3, insp_4, insp_5, insp_6
  FROM flujo_laminar_inspeccion_visual
  WHERE id_asignado = ? ");

mysqli_stmt_bind_param($inspeccion_visual, 'i', $id_asignado);
mysqli_stmt_execute($inspeccion_visual);
mysqli_stmt_store_result($inspeccion_visual);
mysqli_stmt_bind_result($inspeccion_visual, $insp_1, $insp_2, $insp_3, $insp_4, $insp_5, $insp_6);
mysqli_stmt_fetch($inspeccion_visual);

//info_ informes

$info_query = mysqli_prepare($connect,"SELECT conclusion, solicitante, nombre_informe, usuario_responsable,DATE_FORMAT(fecha_registro, '%m/%d/%Y')
  FROM informe_flujo_laminar
  WHERE id_asignado = ? ");

mysqli_stmt_bind_param($info_query, 'i', $id_asignado);
mysqli_stmt_execute($info_query);
mysqli_stmt_store_result($info_query);
mysqli_stmt_bind_result($info_query, $conclusion, $solicitante, $nombre_informe, $usuario_responsable, $fecha_registro_informe);
mysqli_stmt_fetch($info_query);


if ($conclusion == 'Informe') {
   
   $muestra_conclusion = 'De acuerdo a los resultados obtenidos a las muestras inspeccionadas, la sala indicada en la ubicación del encabezado, 
CUMPLE con los parámetros establecidos en la normativa vigente.';

}
elseif($conclusion == 'Pre-Informe'){
  $muestra_conclusion = 'Los resultados obtenidos en el presente informe, 
se aplican solo a los elementos ensayados y corresponde a las condiciones encontradas al momento de la inspección';
}


//Información responsable

 $consultar_responsable = mysqli_prepare($connect,"SELECT b.nombre, b.apellido, c.nombre 
  FROM usuario a, persona b, cargo c WHERE a.id_usuario = b.id_usuario AND c.id_cargo = b.id_cargo AND a.usuario = ?");

mysqli_stmt_bind_param($consultar_responsable, 's', $usuario_responsable);
mysqli_stmt_execute($consultar_responsable);
mysqli_stmt_store_result($consultar_responsable);
mysqli_stmt_bind_result($consultar_responsable, $nombre_responsable, $apellido_responsable, $nombre_cargo);
mysqli_stmt_fetch($consultar_responsable);

//informacion de la empresa
$infor_numot = mysqli_prepare($connect,"SELECT c.numot, d.nombre, d.direccion, d.sigla_pais 
  FROM item_asignado as a, servicio as b, numot as c, empresa as d 
  WHERE a.id_asignado = ? AND a.id_servicio = b.id_servicio AND b.id_numot = c.id_numot AND c.id_empresa = d.id_empresa");

mysqli_stmt_bind_param($infor_numot, 'i', $id_asignado);
mysqli_stmt_execute($infor_numot);
mysqli_stmt_store_result($infor_numot);
mysqli_stmt_bind_result($infor_numot, $ot, $nombre_empresa, $direccion_empresa, $sigla_pais);
mysqli_stmt_fetch($infor_numot);

$num_ot = substr($ot,2);

///INFORMACION DE LAS ISO Y OMS 
if ($clasificacion_iso == 5) {
   $particulas05 = 3520;
   $particulas50 = 29;
}elseif($clasificacion_iso == 6) {
   $particulas05 = 35200;
   $particulas50 = 293;
}elseif ($clasificacion_iso == 7) {
   $particulas05 = 352000;
   $particulas50 = 2930;
}elseif ($clasificacion_iso == 8) {
   $particulas05 = 3520000;
   $particulas50 = 29300;
}elseif ($clasificacion_iso == 9) {
   $particulas05 = 35200000;
   $particulas50 = 293000;
}





$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<br><br><br><br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>CERTIFICADO DE INSPECCIÓN DE FLUJO LAMINAR</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



   $pdf->SetFillColor(221,221,221);
   $pdf->SetDrawColor(202,202,202);

     $pdf->Cell(25,5,'Informe referencia:',0,0,'L',0,'',0);
     $pdf->Cell(50,5,$nombre_informe,1,0,'J',0,'',0);
     $pdf->Cell(15,5,'OT N°',0,0,'C',0,'',0);
     $pdf->Cell(15,5,$num_ot,1,0,'C',0,'',0);
     $pdf->Cell(20,5,'',0,0,'C',0,'',0);
     $pdf->Cell(30,5,'Fecha de Emisión:',0,0,'L',0,'',0);
     $pdf->Cell(25,5,$fecha_registro,1,0,'C',0,'',0);

   $pdf->ln(7);   

   $pdf->Cell(25,5,'Empresa:',0,0,'L',0,'',0);
   $pdf->Cell(80,5,$nombre_empresa,1,0,'C',0,'',0);
   $pdf->Cell(20,5,'',0,0,'C',0,'',0);
   $pdf->Cell(20,5,'Solicita:',0,0,'L',0,'',0);
   $pdf->Cell(35,5,$solicitante,1,0,'C',0,'',0);

   $pdf->ln(7);  

   $pdf->Cell(25,5,'Dirección:',0,0,'L',0,'',0);
   $pdf->Cell(155,5,$direccion,1,0,'L',0,'',0);

   $pdf->ln(10);  

   $pdf->Cell(42,5,'Tipo Cabina',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Marca',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Modelo',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Serie',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Código',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Ubicado en',1,0,'C',1,'',0);
   $pdf->ln(5); 
   $pdf->Cell(42,5,$tipo_cabina,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$serie,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$codigo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$ubicacion_interna,1,0,'C',0,'',0);
   $pdf->ln(7);  
   $pdf->Cell(45,5,'Cantidad de Filtros HEPA',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Tipo y Dimensiones de Filtros Interiores',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Límite de Penetración',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Eficiencia',1,0,'C',1,'',0);
   $pdf->ln(5);
   $pdf->Cell(45,5,$cantidad_filtro,1,0,'C',0,'',0);
   $pdf->Cell(45,5,$tipo_dimenciones,1,0,'C',0,'',0);
   $pdf->Cell(45,5,$limite_penetracion.'%',1,0,'C',0,'',0);
   $pdf->Cell(45,5,$eficiencia,1,0,'C',0,'',0);


  $pdf->ln(7);

//información del equipo
/*$info_equipo = <<<EOD
   <style> 
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
   border: 1px solid #BBBBBB;
   padding: 3px;
   vertical-align: middle;
   text-align: center;
   height:15px;
   font-size:11px;
   padding:auto auto auto auto;
   }

   tr:nth-child(even) 
   {
      background-color: #f2f2f2;
   }


   </style>

   <table>
      <tr>
         <table>
            <tr>
               <td bgcolor="#DDDDDD"><h5><strong>Tipo de Cabina</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Marca</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Modelo</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Serie</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Código</strong></h5></td>
            </tr>
            <tr>
               <td>$tipo_cabina</td>
               <td>$marca</td>
               <td>$modelo</td>
               <td>$serie</td>
               <td>$codigo</td>
            </tr>
         </table>
         <table>
           <tr>
             <td  bgcolor="#DDDDDD"><h5><strong>Ubicado en </strong></h5></td>
           </tr>
           <tr>
             <td>$ubicacion_interna</td>
           </tr>
         </table>
         <table>
            <tr>
               <td bgcolor="#DDDDDD"><h5><strong>Cantidad de Filtros HEPA</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Tipo y Dimensiones de Filtros Interiores</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Límite de Penetración</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Eficiencia</strong></h5></td>       
            </tr>
            <tr>
               <td>$cantidad_filtro</td>
               <td>$tipo_dimenciones</td>
               <td>$limite_penetracion</td>
               <td>$eficiencia</td>
            </tr>
         </table>    
      </tr>
      <br>
   </table>
   
EOD;  
$pdf->writeHTML($info_equipo, true, false, false, false, '');*/


///// crea una nueva pagina
//$pdf->AddPage('A4');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea"><h2>Inspección Visual</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

     $pdf->Cell(70,5,'Equipo en buenas condiciones de operación:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp_1,1,0,'C',0,'',0);
     $pdf->Cell(10,5,'',0,0,'J',0,'',0);
     $pdf->Cell(70,5,'Equipo Límpio y sin elementos externos:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp_2,1,0,'C',0,'',0);
     $pdf->ln(5);
     $pdf->Cell(70,5,'Conexión eléctrica en buenas condiciones:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp_3,1,0,'C',0,'',0);
     $pdf->Cell(10,5,'',0,0,'J',0,'',0);
     $pdf->Cell(70,5,'Posee identificación:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp_4,1,0,'C',0,'',0);
     $pdf->ln(5);
     $pdf->Cell(70,5,'Presenta Filtros en buenas condiciones:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp_5,1,0,'C',0,'',0);
     $pdf->Cell(10,5,'',0,0,'J',0,'',0);
     $pdf->Cell(70,5,'Presenta todas sus partes y accesorios:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp_6,1,0,'C',0,'',0);

     $pdf->ln(10); 

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:black;

}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea"><h3>Resultados - Norma: UNE-EN ISO 14.644-1:2015 y NSF/ANSI 49:2015</h3></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

/// resultados normativas

$queryPrueba1 = mysqli_prepare($connect,"SELECT requisito, valor_obtenido, veredicto
  FROM flujo_laminar_prueba_1
  WHERE id_asignado = ? ");

mysqli_stmt_bind_param($queryPrueba1, 'i', $id_asignado);
mysqli_stmt_execute($queryPrueba1);
mysqli_stmt_store_result($queryPrueba1);
mysqli_stmt_bind_result($queryPrueba1, $requisito, $valor_obtenido, $veredicto);



$array_titulos = array('Prueba de Integridad de Filtro', 'Velocidad de Aire (m/s)','Partículas por m3; >0.5 µm','Partículas por m3; >5.0 µm','Partículas por m3; >0.5 µm','Partículas por m3; >5.0 µm');



$pdf->Cell(60,5,'Medición',1,0,'C',1,'',0);
$pdf->Cell(40,5,'Requisito',1,0,'C',1,'',0);
$pdf->Cell(40,5,'Valor obtenido',1,0,'C',1,'',0);
$pdf->Cell(40,5,'Veredicto',1,0,'C',1,'',0);
$pdf->ln(5);


$i=0;
  while ($row = mysqli_stmt_fetch($queryPrueba1)) {


$pdf->Cell(60,5,$array_titulos[$i],1,0,'C',0,'',0);
$pdf->Cell(40,5,$requisito,1,0,'C',0,'',0);
$pdf->Cell(40,5,$valor_obtenido,1,0,'C',0,'',0);
$pdf->Cell(40,5,$veredicto,1,0,'C',0,'',0);
$pdf->ln(5);

  $i++;

}
$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea"><h2>Conclusión</h2></td>
   </tr>
</table>
<br><br>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$pdf->writeHTMLCell(180, 5, 15, '', $muestra_conclusion, 0, 1, 0, true, 'J', true);

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea"><h2><b>Duración de Certificado</b></h2></td>
        <td class="linea"><h2><b>Fecha de Medición</b></h2></td>
   </tr>
   <br>
   <tr>
        <td>La vigencia de Certificación es de 12 meses.</td>
        <td>$fecha_registro</td>
   </tr>    
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><b>Responsable</b></td>
   </tr>
   <br>
   <tr>
       <td align="center">Ing. $nombre_responsable $apellido_responsable<br>$nombre_cargo</td>
       <td align="center"></td>
       <td align="center"></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->AddPage('A4');

//pagina2///////////////////////////////////////////////////

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<br><br><br><br>
<table >
   <tr border="1">
        <td class="linea"><h2> Prueba de Integridad de Filtros</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

 $pdf->SetFillColor(221,221,221);
   $pdf->SetDrawColor(202,202,202);

     $pdf->Cell(25,5,'Informe referencia:',0,0,'L',0,'',0);
     $pdf->Cell(50,5,$nombre_informe,1,0,'J',0,'',0);
     $pdf->Cell(15,5,'OT N°',0,0,'C',0,'',0);
     $pdf->Cell(15,5,$num_ot,1,0,'C',0,'',0);
     $pdf->Cell(20,5,'',0,0,'C',0,'',0);
     $pdf->Cell(30,5,'Fecha de Emisión:',0,0,'L',0,'',0);
     $pdf->Cell(25,5,$fecha_registro,1,0,'C',0,'',0);

   $pdf->ln(7);   

   $pdf->Cell(25,5,'Empresa:',0,0,'L',0,'',0);
   $pdf->Cell(80,5,$nombre_empresa,1,0,'C',0,'',0);
   $pdf->Cell(20,5,'',0,0,'C',0,'',0);
   $pdf->Cell(20,5,'Solicita:',0,0,'L',0,'',0);
   $pdf->Cell(35,5,$solicitante,1,0,'C',0,'',0);

   $pdf->ln(7);  

   $pdf->Cell(25,5,'Dirección:',0,0,'L',0,'',0);
   $pdf->Cell(155,5,$direccion,1,0,'L',0,'',0);

   $pdf->ln(10);  

   $pdf->Cell(42,5,'Tipo Cabina',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Marca',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Modelo',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Serie',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Código',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Ubicado en',1,0,'C',1,'',0);
   $pdf->ln(5); 
   $pdf->Cell(42,5,$tipo_cabina,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$serie,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$codigo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$ubicacion_interna,1,0,'C',0,'',0);
   $pdf->ln(7);  
   $pdf->Cell(45,5,'Cantidad de Filtros HEPA',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Tipo y Dimensiones de Filtros Interiores',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Límite de Penetración',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Eficiencia',1,0,'C',1,'',0);
   $pdf->ln(5);
   $pdf->Cell(45,5,$cantidad_filtro,1,0,'C',0,'',0);
   $pdf->Cell(45,5,$tipo_dimenciones,1,0,'C',0,'',0);
   $pdf->Cell(45,5,$limite_penetracion.'%',1,0,'C',0,'',0);
   $pdf->Cell(45,5,$eficiencia,1,0,'C',0,'',0);


  $pdf->ln(7);


$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea"><h2>Prueba de Integridad de Filtros UNE-EN ISO 14.644-3:2015</h2></td>
   </tr>
</table>
<p>Con este procedimiento se buscan eventuales fugas de aire no filtrado que pueda ingresar al área de trabajo, hermeticidad y estanqueidad en marcos y junturas.
Se aplica a todas las unidades que dispongan de filtro terminal HEPA o ULPA, en este procedimiento se inyectan partículas de 0,3 a 5 micrones en forma de aerosol,
con una concentración de 22.9 mg/litro.</p>
<br>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$queryPrueba1 = mysqli_prepare($connect,"SELECT url, nombre
  FROM image_flujo_laminar
  WHERE id_asignado = ? AND tipo = 1");

mysqli_stmt_bind_param($queryPrueba1, 'i', $id_asignado);
mysqli_stmt_execute($queryPrueba1);
mysqli_stmt_store_result($queryPrueba1);
mysqli_stmt_bind_result($queryPrueba1, $url, $nombre);


$imagen = <<<EOD

<style>

</style>
<br>
<table border="0" style="text-align: center;">
      <tr>
         <td><h2>Filtro a Examinar</h2></td>
      </tr>
      <br><br>
      <tr>
         <td style= "height: 200px;"><img src="../../imagenes/definidas/imagen1.png" style="width: 300px;"></td>
      </tr>
  
</table>
<br>

EOD;  
$pdf->writeHTML($imagen, true, false, false, false, '');

$queryPrueba2 = mysqli_prepare($connect,"SELECT zonaA, zonaAA, zonaB, zonaBB, zonaC, zonaCC, zonaD, zonaDD
  FROM flujo_laminar_prueba_2
  WHERE id_asignado = ? ");

mysqli_stmt_bind_param($queryPrueba2, 'i', $id_asignado);
mysqli_stmt_execute($queryPrueba2);
mysqli_stmt_store_result($queryPrueba2);
mysqli_stmt_bind_result($queryPrueba2, $zonaA, $zonaAA, $zonaB, $zonaBB, $zonaC, $zonaCC, $zonaD, $zonaDD);


$pdf->Cell(20,5,'Filtros inferiores',1,0,'C',1,'',0);
$pdf->Cell(20,5,'Zona A',1,0,'C',1,'',0);
$pdf->Cell(20,5,'Zona AA',1,0,'C',1,'',0);
$pdf->Cell(20,5,'Zona B',1,0,'C',1,'',0);
$pdf->Cell(20,5,'Zona BB',1,0,'C',1,'',0);
$pdf->Cell(20,5,'Zona C',1,0,'C',1,'',0);
$pdf->Cell(20,5,'Zona CC',1,0,'C',1,'',0);
$pdf->Cell(20,5,'Zona D',1,0,'C',1,'',0);
$pdf->Cell(20,5,'Zona DD',1,0,'C',1,'',0);
$pdf->ln(5);



while ($row = mysqli_stmt_fetch($queryPrueba2)) {

$pdf->Cell(20,5,'Filtro N°'.$i,1,0,'C',1,'',0);
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



$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<br><br>
<table >
   <tr border="1">
        <td class="linea"><h2>Equipo Utilizado en la Medición</h2></td>
   </tr>
</table>
<br>
<br>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$equipos_flujo1 = mysqli_prepare($connect,"SELECT b.marca_equipo, b.modelo_equipo, b.n_serie_equipo, c.numero_certificado, c.fecha_emision 
FROM equipos_mediciones a, equipos_cercal b , certificado_equipo c 
WHERE a.id_equipo = b.id_equipo_cercal AND a.id_asignado = ? AND c.id_equipo_cercal = b.id_equipo_cercal AND  a.tipo_prueba = 'Prueba integridad filtros'");


mysqli_stmt_bind_param($equipos_flujo1, 'i', $id_asignado);
mysqli_stmt_execute($equipos_flujo1);
mysqli_stmt_store_result($equipos_flujo1);
mysqli_stmt_bind_result($equipos_flujo1, $marca1, $modelo1, $n_serie1, $certificado_calibracion1, $ultima_calibracion1);

 $pdf->Cell(28,5,'Marca',1,0,'C',1,'',0);
 $pdf->Cell(31,5,'Modelo',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'N° Serie',1,0,'C',1,'',0);
 $pdf->Cell(35,5,'Certificado de Calibración',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'Última Calibración',1,0,'C',1,'',0);
 $pdf->Cell(26,5,'Trazabilidad',1,0,'C',1,'',0);
 $pdf->ln(5);

while ($row = mysqli_stmt_fetch($equipos_flujo1)) {

   $pdf->Cell(28,5,$marca1,1,0,'C',0,'',0);
   $pdf->Cell(31,5,$modelo1,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$n_serie1,1,0,'C',0,'',0);
   $pdf->Cell(35,5,$certificado_calibracion1,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$ultima_calibracion1,1,0,'C',0,'',0);
   $pdf->Cell(26,5,'Trazabilidad',1,0,'C',0,'',0);
  $pdf->ln(5);
}

$pdf->AddPage('A4');
//pagina 3 

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea"><h2>Prueba de Medición de Velocidad de Aire</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

 $pdf->Cell(25,5,'Informe referencia:',0,0,'L',0,'',0);
     $pdf->Cell(50,5,$nombre_informe,1,0,'J',0,'',0);
     $pdf->Cell(15,5,'OT N°',0,0,'C',0,'',0);
     $pdf->Cell(15,5,$num_ot,1,0,'C',0,'',0);
     $pdf->Cell(20,5,'',0,0,'C',0,'',0);
     $pdf->Cell(30,5,'Fecha de Emisión:',0,0,'L',0,'',0);
     $pdf->Cell(25,5,$fecha_registro,1,0,'C',0,'',0);

   $pdf->ln(7);   

   $pdf->Cell(25,5,'Empresa:',0,0,'L',0,'',0);
   $pdf->Cell(80,5,$nombre_empresa,1,0,'C',0,'',0);
   $pdf->Cell(20,5,'',0,0,'C',0,'',0);
   $pdf->Cell(20,5,'Solicita:',0,0,'L',0,'',0);
   $pdf->Cell(35,5,$solicitante,1,0,'C',0,'',0);

   $pdf->ln(7);  

   $pdf->Cell(25,5,'Dirección:',0,0,'L',0,'',0);
   $pdf->Cell(155,5,$direccion,1,0,'L',0,'',0);

   $pdf->ln(10);  

   $pdf->Cell(42,5,'Tipo Cabina',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Marca',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Modelo',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Serie',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Código',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Ubicado en',1,0,'C',1,'',0);
   $pdf->ln(5); 
   $pdf->Cell(42,5,$tipo_cabina,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$serie,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$codigo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$ubicacion_interna,1,0,'C',0,'',0);
   $pdf->ln(7);  
   $pdf->Cell(45,5,'Cantidad de Filtros HEPA',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Tipo y Dimensiones de Filtros Interiores',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Límite de Penetración',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Eficiencia',1,0,'C',1,'',0);
   $pdf->ln(5);
   $pdf->Cell(45,5,$cantidad_filtro,1,0,'C',0,'',0);
   $pdf->Cell(45,5,$tipo_dimenciones,1,0,'C',0,'',0);
   $pdf->Cell(45,5,$limite_penetracion.'%',1,0,'C',0,'',0);
   $pdf->Cell(45,5,$eficiencia,1,0,'C',0,'',0);


  $pdf->ln(7);
 

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Medición de Entrada de Aire - NSF/ANSI 49:2008</h2></td>
   </tr>
</table>
<br><br>
<table >
   <tr border="1">
        <td class="linea"><h2>Velocidad de Aire (m/s)
</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

  $queryPrueba1 = mysqli_prepare($connect,"SELECT medicion_1, medicion_2, medicion_3, medicion_4, medicion_5, medicion_6
  FROM flujo_laminar_prueba_3
  WHERE id_asignado = ? ");

mysqli_stmt_bind_param($queryPrueba1, 'i', $id_asignado);
mysqli_stmt_execute($queryPrueba1);
mysqli_stmt_store_result($queryPrueba1);
mysqli_stmt_bind_result($queryPrueba1, $medicion_1, $medicion_2, $medicion_3, $medicion_4, $medicion_5, $medicion_6);


$queryMaximoPrueba1 = mysqli_prepare($connect,"SELECT GREATEST(medicion_1,medicion_2,medicion_3,medicion_4,medicion_5,medicion_6) as m1 FROM flujo_laminar_prueba_3 WHERE id_asignado = ? ORDER BY m1 DESC LIMIT 1  ");

mysqli_stmt_bind_param($queryMaximoPrueba1, 'i', $id_asignado);
mysqli_stmt_execute($queryMaximoPrueba1);
mysqli_stmt_store_result($queryMaximoPrueba1);
mysqli_stmt_bind_result($queryMaximoPrueba1, $valor_maximo);
mysqli_stmt_fetch($queryMaximoPrueba1);

$queryMinimoPrueba1 = mysqli_prepare($connect,"SELECT LEAST(medicion_1,medicion_2,medicion_3,medicion_4,medicion_5,medicion_6) as m1 FROM flujo_laminar_prueba_3 WHERE id_asignado = ?  ORDER BY m1 ASC LIMIT 1 ");
mysqli_stmt_bind_param($queryMinimoPrueba1, 'i', $id_asignado);
mysqli_stmt_execute($queryMinimoPrueba1);
mysqli_stmt_store_result($queryMinimoPrueba1);
mysqli_stmt_bind_result($queryMinimoPrueba1, $valor_minimo);
mysqli_stmt_fetch($queryMinimoPrueba1);

$pdf->Cell(25.72,5,'N° de Filtro',1,0,'C',1,'',0);
$pdf->Cell(25.72,5,'Medición 1(m/s)',1,0,'C',1,'',0);
$pdf->Cell(25.72,5,'Medición 2(m/s)',1,0,'C',1,'',0);
$pdf->Cell(25.72,5,'Medición 3(m/s)',1,0,'C',1,'',0);
$pdf->Cell(25.72,5,'Medición 4(m/s)',1,0,'C',1,'',0);
$pdf->Cell(25.72,5,'Medición 5(m/s)',1,0,'C',1,'',0);
$pdf->Cell(25.72,5,'Medición 6(m/s)',1,0,'C',1,'',0);
$pdf->ln(5);


 $i2 = 1;
 while ($row = mysqli_stmt_fetch($queryPrueba1)) {

$pdf->Cell(25.72,5,'N° de Filtro'.$i2,1,0,'C',1,'',0);
$pdf->Cell(25.72,5,$medicion_1,1,0,'C',0,'',0);
$pdf->Cell(25.72,5,$medicion_2,1,0,'C',0,'',0);
$pdf->Cell(25.72,5,$medicion_3,1,0,'C',0,'',0);
$pdf->Cell(25.72,5,$medicion_4,1,0,'C',0,'',0);
$pdf->Cell(25.72,5,$medicion_5,1,0,'C',0,'',0);
$pdf->Cell(25.72,5,$medicion_6,1,0,'C',0,'',0);
$pdf->ln(5);

 $i2++;
}

//Consultar valor maximo y minimo
  $maximo = max(mysqli_stmt_fetch($queryPrueba1));


 $pdf->ln(5);

 $pdf->Cell(26,5,'',1,0,'C',1,'',0);
 $pdf->Cell(55,5,'Medida de los Promedios de Velocidad de aire',1,0,'C',1,'',0);
 $pdf->Cell(33,5,'Máxima velocidad medida ',1,0,'C',1,'',0);
 $pdf->Cell(33,5,'Mínima velocidad medida',1,0,'C',1,'',0);
 $pdf->Cell(33,5,'Mínima velocidad aceptada',1,0,'C',1,'',0);
 $pdf->ln(5);
 $pdf->Cell(26,5,'Resumen',1,0,'C',1,'',0);
 $pdf->Cell(55,5,'dato',1,0,'C',0,'',0);
 $pdf->Cell(33,5,$valor_maximo,1,0,'C',0,'',0);
 $pdf->Cell(33,5,$valor_minimo,1,0,'C',0,'',0);
 $pdf->Cell(33,5,'a',1,0,'C',0,'',0);
 $pdf->ln(5);



$busca_imagen_1 = mysqli_prepare($connect,"SELECT url, nombre 
FROM image_flujo_laminar WHERE id_asignado = ? AND tipo = 5");
mysqli_stmt_bind_param($busca_imagen_1, 'i', $id_asignado);
mysqli_stmt_execute($busca_imagen_1);
mysqli_stmt_store_result($busca_imagen_1);
mysqli_stmt_bind_result($busca_imagen_1, $url, $nombre);
mysqli_stmt_fetch($busca_imagen_1);

$imagen1 = <<<EOD
<style>
.linea{
  

}
</style>

<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><img src="../../$url$nombre" width="300px;"></td>  
   </tr>
</table>

EOD;
$pdf->writeHTML($imagen1, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea"><h2>Equipos Utilizados en la Medición</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$equipos_flujo2 = mysqli_prepare($connect,"SELECT b.marca_equipo, b.modelo_equipo, b.n_serie_equipo, c.numero_certificado, c.fecha_emision 
FROM equipos_mediciones a, equipos_cercal b , certificado_equipo c 
WHERE a.id_equipo = b.id_equipo_cercal AND a.id_asignado = ? AND c.id_equipo_cercal = b.id_equipo_cercal AND a.tipo_prueba = 'Prueba de velocidad de aire'");

mysqli_stmt_bind_param($equipos_flujo2, 'i', $id_asignado);
mysqli_stmt_execute($equipos_flujo2);
mysqli_stmt_store_result($equipos_flujo2);
mysqli_stmt_bind_result($equipos_flujo2, $marca2, $modelo2, $n_serie2, $certificado_calibracion2, $ultima_calibracion2);


 $pdf->Cell(28,5,'Marca',1,0,'C',1,'',0);
 $pdf->Cell(31,5,'Modelo',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'N° Serie',1,0,'C',1,'',0);
 $pdf->Cell(35,5,'Certificado de Calibración',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'Última Calibración',1,0,'C',1,'',0);
 $pdf->Cell(26,5,'Trazabilidad',1,0,'C',1,'',0);
 $pdf->ln(5);

$e= 2;

while ($row = mysqli_stmt_fetch($equipos_flujo2)) {

    $pdf->Cell(28,5,$marca2,1,0,'C',0,'',0);
    $pdf->Cell(31,5,$modelo2,1,0,'C',0,'',0);
    $pdf->Cell(30,5,$n_serie2,1,0,'C',0,'',0);
    $pdf->Cell(35,5,$certificado_calibracion2,1,0,'C',0,'',0);
    $pdf->Cell(30,5,$ultima_calibracion2,1,0,'C',0,'',0);
    $pdf->Cell(26,5,'-',1,0,'C',0,'',0);
    $pdf->ln(5);
}


$pdf->AddPage('A4');
/// pagina 4
$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea"><h2>Prueba de Medición de Conteo de Particulas UNE-EN ISO 14.644-3:2015</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

   $pdf->Cell(25,5,'Informe referencia:',0,0,'L',0,'',0);
     $pdf->Cell(50,5,$nombre_informe,1,0,'J',0,'',0);
     $pdf->Cell(15,5,'OT N°',0,0,'C',0,'',0);
     $pdf->Cell(15,5,$num_ot,1,0,'C',0,'',0);
     $pdf->Cell(20,5,'',0,0,'C',0,'',0);
     $pdf->Cell(30,5,'Fecha de Emisión:',0,0,'L',0,'',0);
     $pdf->Cell(25,5,$fecha_registro,1,0,'C',0,'',0);

   $pdf->ln(7);   

   $pdf->Cell(25,5,'Empresa:',0,0,'L',0,'',0);
   $pdf->Cell(80,5,$nombre_empresa,1,0,'C',0,'',0);
   $pdf->Cell(20,5,'',0,0,'C',0,'',0);
   $pdf->Cell(20,5,'Solicita:',0,0,'L',0,'',0);
   $pdf->Cell(35,5,$solicitante,1,0,'C',0,'',0);

   $pdf->ln(7);  

   $pdf->Cell(25,5,'Dirección:',0,0,'L',0,'',0);
   $pdf->Cell(155,5,$direccion,1,0,'L',0,'',0);

   $pdf->ln(10);  

   $pdf->Cell(42,5,'Tipo Cabina',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Marca',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Modelo',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Serie',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Código',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Ubicado en',1,0,'C',1,'',0);
   $pdf->ln(5); 
   $pdf->Cell(42,5,$tipo_cabina,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$serie,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$codigo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$ubicacion_interna,1,0,'C',0,'',0);
   $pdf->ln(7);  
   $pdf->Cell(45,5,'Cantidad de Filtros HEPA',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Tipo y Dimensiones de Filtros Interiores',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Límite de Penetración',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Eficiencia',1,0,'C',1,'',0);
   $pdf->ln(5);
   $pdf->Cell(45,5,$cantidad_filtro,1,0,'C',0,'',0);
   $pdf->Cell(45,5,$tipo_dimenciones,1,0,'C',0,'',0);
   $pdf->Cell(45,5,$limite_penetracion.'%',1,0,'C',0,'',0);
   $pdf->Cell(45,5,$eficiencia,1,0,'C',0,'',0);


  $pdf->ln(7);

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<table >
   <tr border="1">
        <td class="linea"><h2>Resultados según norma UNE-EN ISO 14.644-1:2015 y NSF/ANSI 49:2015</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$query_um = mysqli_prepare($connect,"SELECT tipo_um, media_promedios, desviacion_estandar, maximo 
FROM flujo_laminar_prueba_7
WHERE id_asignado = ? ");

mysqli_stmt_bind_param($query_um, 'i', $id_asignado);
mysqli_stmt_execute($query_um);
mysqli_stmt_store_result($query_um);
mysqli_stmt_bind_result($query_um, $tipo_um, $media_promedios, $desviacion_estandar, $maximo);




 $pdf->Cell(36,5,'Tamaños (µm)',1,0,'C',1,'',0);
 $pdf->Cell(36,5,'Media de los Promedios',1,0,'C',1,'',0);
 $pdf->Cell(36,5,'Desviación Estandar',1,0,'C',1,'',0);
 $pdf->Cell(36,5,'Máximo',1,0,'C',1,'',0);
 $pdf->Cell(36,5,'Cumple',1,0,'C',1,'',0);

 $pdf->ln(5);

 $arraynombrbes = array(' >=0,5 ',' >=5,0 ');

$i = 0;

$estadoparticulas = '';
while ($row = mysqli_stmt_fetch($query_um)) {

  if ($media_promedios >= $particulas05) {
    $estadoparticulas = 'CUMPLE';
  }else{
    $estadoparticulas = 'NO CUMPLE';
  }

 $pdf->Cell(36,5,$arraynombrbes[$i],1,0,'C',0,'',0); 
 $pdf->Cell(36,5,$media_promedios,1,0,'C',0,'',0);
 $pdf->Cell(36,5,$desviacion_estandar,1,0,'C',0,'',0);
 $pdf->Cell(36,5,$maximo,1,0,'C',0,'',0);
 $pdf->Cell(36,5,$estadoparticulas,1,0,'C',0,'',0);
 $pdf->ln(5);

 $i++;
 
}


$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<br><br>
<table >
   <tr border="1">
        <td class="linea"><h2>Resultados según informe Técnico N°45 de la OMS</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$query_um = mysqli_prepare($connect,"SELECT tipo_um, media_promedios, desviacion_estandar, maximo 
FROM flujo_laminar_prueba_7
WHERE id_asignado = ? ");

mysqli_stmt_bind_param($query_um, 'i', $id_asignado);
mysqli_stmt_execute($query_um);
mysqli_stmt_store_result($query_um);
mysqli_stmt_bind_result($query_um, $tipo_um, $media_promedios, $desviacion_estandar, $maximo);


$pdf->ln();

 $pdf->Cell(60,5,'Tamaños (µm)',1,0,'C',1,'',0);
 $pdf->Cell(60,5,'Promedios',1,0,'C',1,'',0);
 $pdf->Cell(60,5,'Cumple',1,0,'C',1,'',0);
 $pdf->ln(5);

 $i = 0;

while ($row = mysqli_stmt_fetch($query_um)) {


  if ($media_promedios >= $particulas05) {
    $estadoparticulas_2 = 'CUMPLE';
  }else{
    $estadoparticulas_2 = 'NO CUMPLE';
  }

  $pdf->Cell(60,5,$arraynombrbes[$i],1,0,'C',0,'',0);
 $pdf->Cell(60,5,$media_promedios,1,0,'C',0,'',0);
 $pdf->Cell(60,5,$estadoparticulas_2,1,0,'C',0,'',0); 
 $pdf->ln(5);

 $i++;
 
}

$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<table >
   <tr border="1">
        <td class="linea"><h2>Imagen de la Medición y Registro de Conteo de Partículas</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$busca_imagen_1 = mysqli_prepare($connect,"SELECT url, nombre 
FROM image_flujo_laminar WHERE id_asignado = ? AND tipo = 5");
mysqli_stmt_bind_param($busca_imagen_1, 'i', $id_asignado);
mysqli_stmt_execute($busca_imagen_1);
mysqli_stmt_store_result($busca_imagen_1);
mysqli_stmt_bind_result($busca_imagen_1, $url, $nombre);
mysqli_stmt_fetch($busca_imagen_1);

$imagen1 = <<<EOD
<style>
.linea{
  

}
</style>

<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><img src="../../$url$nombre" style="width: 300px;"></td>  
   </tr>
</table>

EOD;
$pdf->writeHTML($imagen1, true, false, false, false, '');

$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<table >
   <tr border="1">
        <td class="linea"><h2>Equipos Utilizados en la Medición</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$equipos_flujo3 = mysqli_prepare($connect,"SELECT b.marca_equipo, b.modelo_equipo, b.n_serie_equipo, c.numero_certificado, c.fecha_emision 
FROM equipos_mediciones a, equipos_cercal b , certificado_equipo c 
WHERE a.id_equipo = b.id_equipo_cercal AND a.id_asignado = ? AND c.id_equipo_cercal = b.id_equipo_cercal AND a.tipo_prueba = 'Prueba de conteo de particulas'");

mysqli_stmt_bind_param($equipos_flujo3, 'i', $id_asignado);
mysqli_stmt_execute($equipos_flujo3);
mysqli_stmt_store_result($equipos_flujo3);
mysqli_stmt_bind_result($equipos_flujo3, $marca3, $modelo3, $n_serie3, $certificado_calibracion3, $ultima_calibracion3);

    $pdf->Cell(28,5,'Marca',1,0,'C',1,'',0);
    $pdf->Cell(31,5,'Modelo',1,0,'C',1,'',0);
    $pdf->Cell(30,5,'No° Serie',1,0,'C',1,'',0);
    $pdf->Cell(35,5,'Certificado de Calibración',1,0,'C',1,'',0);
    $pdf->Cell(30,5,'Última Calibración',1,0,'C',1,'',0);
    $pdf->Cell(26,5,'Trazabilidad',1,0,'C',1,'',0);
    $pdf->ln(5);

while ($row = mysqli_stmt_fetch($equipos_flujo3)) {


    $pdf->Cell(28,5,$marca3,1,0,'C',0,'',0);
    $pdf->Cell(31,5,$modelo3,1,0,'C',0,'',0);
    $pdf->Cell(30,5,$n_serie3,1,0,'C',0,'',0);
    $pdf->Cell(35,5,$certificado_calibracion3,1,0,'C',0,'',0);
    $pdf->Cell(30,5,$ultima_calibracion3,1,0,'C',0,'',0);
    $pdf->Cell(26,5,'-',1,0,'C',0,'',0);
    $pdf->ln(5);
    
}

$pdf->AddPage('A4');

$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<table >
   <tr border="1">
        <td class="linea"><h2>Prueba de Temperatura / Humedad Relativa Y Presión Sonora
</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

  $pdf->Cell(25,5,'Informe referencia:',0,0,'L',0,'',0);
     $pdf->Cell(50,5,$nombre_informe,1,0,'J',0,'',0);
     $pdf->Cell(15,5,'OT N°',0,0,'C',0,'',0);
     $pdf->Cell(15,5,$num_ot,1,0,'C',0,'',0);
     $pdf->Cell(20,5,'',0,0,'C',0,'',0);
     $pdf->Cell(30,5,'Fecha de Emisión:',0,0,'L',0,'',0);
     $pdf->Cell(25,5,$fecha_registro,1,0,'C',0,'',0);

   $pdf->ln(7);   

   $pdf->Cell(25,5,'Empresa:',0,0,'L',0,'',0);
   $pdf->Cell(80,5,$nombre_empresa,1,0,'C',0,'',0);
   $pdf->Cell(20,5,'',0,0,'C',0,'',0);
   $pdf->Cell(20,5,'Solicita:',0,0,'L',0,'',0);
   $pdf->Cell(35,5,$solicitante,1,0,'C',0,'',0);

   $pdf->ln(7);  

   $pdf->Cell(25,5,'Dirección:',0,0,'L',0,'',0);
   $pdf->Cell(155,5,$direccion,1,0,'L',0,'',0);

   $pdf->ln(10);  

   $pdf->Cell(42,5,'Tipo Cabina',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Marca',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Modelo',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Serie',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Código',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Ubicado en',1,0,'C',1,'',0);
   $pdf->ln(5); 
   $pdf->Cell(42,5,$tipo_cabina,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$serie,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$codigo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$ubicacion_interna,1,0,'C',0,'',0);
   $pdf->ln(7);  
   $pdf->Cell(45,5,'Cantidad de Filtros HEPA',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Tipo y Dimensiones de Filtros Interiores',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Límite de Penetración',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Eficiencia',1,0,'C',1,'',0);
   $pdf->ln(5);
   $pdf->Cell(45,5,$cantidad_filtro,1,0,'C',0,'',0);
   $pdf->Cell(45,5,$tipo_dimenciones,1,0,'C',0,'',0);
   $pdf->Cell(45,5,$limite_penetracion.'%',1,0,'C',0,'',0);
   $pdf->Cell(45,5,$eficiencia,1,0,'C',0,'',0);


  $pdf->ln(7);


$linea = <<<EOD
<br>
<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<table >
   <tr border="1">
        <td class="linea"><h2>Prueba de Temperatura y Humedad Relativa - UNE-EN ISO 14.644-3:2015</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$queryPrueba4 = mysqli_prepare($connect,"SELECT punto_1, punto_2, punto_3, promedio
  FROM flujo_laminar_prueba_4
  WHERE id_asignado = ? AND categoria = 1");

mysqli_stmt_bind_param($queryPrueba4, 'i', $id_asignado);
mysqli_stmt_execute($queryPrueba4);
mysqli_stmt_store_result($queryPrueba4);
mysqli_stmt_bind_result($queryPrueba4, $punto_1, $punto_2, $punto_3, $promedio);

$array_titulos3 = array('Temperatura,°C', 'Humedad Relativa, %');

 $pdf->Cell(36,5,'punto de muestreo',1,0,'C',1,'',0);
 $pdf->Cell(36,5,'1',1,0,'C',1,'',0);
 $pdf->Cell(36,5,'2',1,0,'C',1,'',0);
 $pdf->Cell(36,5,'3',1,0,'C',1,'',0);
 $pdf->Cell(36,5,'Promedio',1,0,'C',1,'',0);
 $pdf->ln(5);

$i3=0;
 while ($row = mysqli_stmt_fetch($queryPrueba4)) {

 $pdf->Cell(36,5,$array_titulos3[$i3],1,0,'C',0,'',0);
 $pdf->Cell(36,5,$punto_1,1,0,'C',0,'',0);
 $pdf->Cell(36,5,$punto_2,1,0,'C',0,'',0);
 $pdf->Cell(36,5,$punto_3,1,0,'C',0,'',0);
 $pdf->Cell(36,5,$promedio,1,0,'C',0,'',0);
 $pdf->ln(5);
$i3++;
}

$imagen_3 = mysqli_prepare($connect,"SELECT url, nombre
  FROM image_flujo_laminar
  WHERE id_asignado = ? AND tipo = 6");

mysqli_stmt_bind_param($imagen_3, 'i', $id_asignado);
mysqli_stmt_execute($imagen_3);
mysqli_stmt_store_result($imagen_3);
mysqli_stmt_bind_result($imagen_3, $url3, $nombre3);
mysqli_stmt_fetch($imagen_3);

if ($url3 == '') {
  $img3 = '';
}else{
  $img3 = '../../'.$url3.$nombre3;
}

$imagen1 = <<<EOD
<style>

</style>

<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><img src="$img3" style="width: 300px;"></td>  
   </tr>
</table>

EOD;
$pdf->writeHTML($imagen1, true, false, false, false, '');

$linea = <<<EOD
<br>
<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<table >
   <tr border="1">
        <td class="linea"><h2>Prueba de Medición de Presión Sonora - DS N°594</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$queryPrueba4_1 = mysqli_prepare($connect,"SELECT punto_1, punto_2, punto_3, promedio
  FROM flujo_laminar_prueba_4
  WHERE id_asignado = ? AND categoria = 2");

$array_titulos4 = array('Equipo (dB-A Lento)', 'Sala (dB-A Lento)');

mysqli_stmt_bind_param($queryPrueba4_1, 'i', $id_asignado);
mysqli_stmt_execute($queryPrueba4_1);
mysqli_stmt_store_result($queryPrueba4_1);
mysqli_stmt_bind_result($queryPrueba4_1, $punto_1, $punto_2, $punto_3, $promedio);


$pdf->Cell(36,5,'punto de muestreo',1,0,'C',1,'',0);
 $pdf->Cell(36,5,'1',1,0,'C',1,'',0);
 $pdf->Cell(36,5,'2',1,0,'C',1,'',0);
 $pdf->Cell(36,5,'3',1,0,'C',1,'',0);
 $pdf->Cell(36,5,'Promedio',1,0,'C',1,'',0);
 $pdf->ln(5);

$i4=0;
 while ($row = mysqli_stmt_fetch($queryPrueba4_1)) {

 $pdf->Cell(36,5,$array_titulos3[$i4],1,0,'C',0,'',0);
 $pdf->Cell(36,5,$punto_1,1,0,'C',0,'',0);
 $pdf->Cell(36,5,$punto_2,1,0,'C',0,'',0);
 $pdf->Cell(36,5,$punto_3,1,0,'C',0,'',0);
 $pdf->Cell(36,5,$promedio,1,0,'C',0,'',0);
 $pdf->ln(5);
$i4++;
}

$imagen_4 = mysqli_prepare($connect,"SELECT url, nombre
  FROM image_flujo_laminar
  WHERE id_asignado = ? AND tipo = 7");

mysqli_stmt_bind_param($imagen_4, 'i', $id_asignado);
mysqli_stmt_execute($imagen_4);
mysqli_stmt_store_result($imagen_4);
mysqli_stmt_bind_result($imagen_4, $url4, $nombre4);
mysqli_stmt_fetch($imagen_4);

if ($url4 == '') {
  $img4 = '';
}else{
  $img4 = '../../'.$url4.$nombre4;
}

$imagen1 = <<<EOD
<style>
.linea{
  

}
</style>

<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><img src="$img4" style="width: 300px;"></td>  
   </tr>
</table>

EOD;
$pdf->writeHTML($imagen1, true, false, false, false, '');

$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<table >
   <tr border="1">
        <td class="linea"><h2>Equipos Utilizados en la Medición</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$equipos_flujo4 = mysqli_prepare($connect,"SELECT b.marca_equipo, b.modelo_equipo, b.n_serie_equipo, c.numero_certificado, c.fecha_emision 
FROM equipos_mediciones a, equipos_cercal b , certificado_equipo c 
WHERE a.id_equipo = b.id_equipo_cercal AND a.id_asignado = ? AND c.id_equipo_cercal = b.id_equipo_cercal AND a.tipo_prueba = 'Prueba sonora'");

mysqli_stmt_bind_param($equipos_flujo4, 'i', $id_asignado);
mysqli_stmt_execute($equipos_flujo4);
mysqli_stmt_store_result($equipos_flujo4);
mysqli_stmt_bind_result($equipos_flujo4, $marca4, $modelo4, $n_serie4, $certificado_calibracion4, $ultima_calibracion4);


    $pdf->Cell(28,5,'Marca',1,0,'C',1,'',0);
    $pdf->Cell(31,5,'Modelo',1,0,'C',1,'',0);
    $pdf->Cell(30,5,'No° Serie',1,0,'C',1,'',0);
    $pdf->Cell(35,5,'Certificado de Calibración',1,0,'C',1,'',0);
    $pdf->Cell(30,5,'Última Calibración',1,0,'C',1,'',0);
    $pdf->Cell(26,5,'Trazabilidad',1,0,'C',1,'',0);
    $pdf->ln(5);


while ($row = mysqli_stmt_fetch($equipos_flujo4)) {

    $pdf->Cell(28,5,$marca4,1,0,'C',0,'',0);
    $pdf->Cell(31,5,$modelo4,1,0,'C',0,'',0);
    $pdf->Cell(30,5,$n_serie4,1,0,'C',0,'',0);
    $pdf->Cell(35,5,$certificado_calibracion4,1,0,'C',0,'',0);
    $pdf->Cell(30,5,$ultima_calibracion4,1,0,'C',0,'',0);
    $pdf->Cell(26,5,'-',1,0,'C',0,'',0);
    $pdf->ln(5);
}

$pdf->AddPage('A4');

$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<table >
   <tr border="1">
        <td class="linea"><h2>Pruebas de Humo y Nivel de Iluminación</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

  $pdf->Cell(25,5,'Informe referencia:',0,0,'L',0,'',0);
     $pdf->Cell(50,5,$nombre_informe,1,0,'J',0,'',0);
     $pdf->Cell(15,5,'OT N°',0,0,'C',0,'',0);
     $pdf->Cell(15,5,$num_ot,1,0,'C',0,'',0);
     $pdf->Cell(20,5,'',0,0,'C',0,'',0);
     $pdf->Cell(30,5,'Fecha de Emisión:',0,0,'L',0,'',0);
     $pdf->Cell(25,5,$fecha_registro,1,0,'C',0,'',0);

   $pdf->ln(7);   

   $pdf->Cell(25,5,'Empresa:',0,0,'L',0,'',0);
   $pdf->Cell(80,5,$nombre_empresa,1,0,'C',0,'',0);
   $pdf->Cell(20,5,'',0,0,'C',0,'',0);
   $pdf->Cell(20,5,'Solicita:',0,0,'L',0,'',0);
   $pdf->Cell(35,5,$solicitante,1,0,'C',0,'',0);

   $pdf->ln(7);  

   $pdf->Cell(25,5,'Dirección:',0,0,'L',0,'',0);
   $pdf->Cell(155,5,$direccion,1,0,'L',0,'',0);

   $pdf->ln(10);  

   $pdf->Cell(42,5,'Tipo Cabina',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Marca',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Modelo',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Serie',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Código',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Ubicado en',1,0,'C',1,'',0);
   $pdf->ln(5); 
   $pdf->Cell(42,5,$tipo_cabina,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$serie,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$codigo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$ubicacion_interna,1,0,'C',0,'',0);
   $pdf->ln(7);  
   $pdf->Cell(45,5,'Cantidad de Filtros HEPA',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Tipo y Dimensiones de Filtros Interiores',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Límite de Penetración',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Eficiencia',1,0,'C',1,'',0);
   $pdf->ln(5);
   $pdf->Cell(45,5,$cantidad_filtro,1,0,'C',0,'',0);
   $pdf->Cell(45,5,$tipo_dimenciones,1,0,'C',0,'',0);
   $pdf->Cell(45,5,$limite_penetracion.'%',1,0,'C',0,'',0);
   $pdf->Cell(45,5,$eficiencia,1,0,'C',0,'',0);


  $pdf->ln(7);

$linea = <<<EOD
<br>
<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<table >
   <tr border="1">
        <td class="linea"><h3>Prueba de Humo - ANSI/ASHRAE 110-1995 Method of Testing Performance of Laboratory Fume Hoods</h3></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<table >
   <tr border="1">
        <td class="linea"><h3>Prueba N°1: Contención de Aire Externo</h3></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$queryPrueba5 = mysqli_prepare($connect,"SELECT resultado, cumple
  FROM flujo_laminar_prueba_5
  WHERE id_asignado = ? AND categoria = 1 ");

mysqli_stmt_bind_param($queryPrueba5, 'i', $id_asignado);
mysqli_stmt_execute($queryPrueba5);
mysqli_stmt_store_result($queryPrueba5);
mysqli_stmt_bind_result($queryPrueba5, $resultado_1, $cumple_1);


$array_titulos5 = array('Ubicación de Prueba', 'Dirección del Flujo Especificado','Visualización de Flujo Reverso','Visualización de Vórtices','Cumple Especificaciones');


  $pdf->Cell(60,5,'condiciones',1,0,'C',1,'',0);
  $pdf->Cell(60,5,'Resultado',1,0,'C',1,'',0);
  $pdf->Cell(60,5,'Cumple',1,0,'C',1,'',0);
  $pdf->ln(5);

$i6 = 0;
$cont = 0;

while ($row = mysqli_stmt_fetch($queryPrueba5)) {

    if ($i6 < 4) {
      
      if ($i6 < 2) {
        $pdf->Cell(60,5, $array_titulos5[$i6],1,0,'L',1,'',0);
        $pdf->Cell(60,5, $resultado_1,1,0,'C',0,'',0);
        $pdf->Cell(60,5, 'NA',1,0,'C',0,'',0);
        $pdf->ln(5);
      }else{
        if ($resultado_1 == 'No') {
           $muestre1 = 'Cumple';
        }else{
          $muestre1 = 'No Cumple';
           $cont++;
        }
        $pdf->Cell(60,5, $array_titulos5[$i6],1,0,'L',1,'',0);
        $pdf->Cell(60,5, $resultado_1,1,0,'C',0,'',0);
        $pdf->Cell(60,5, $muestre1,1,0,'C',0,'',0);
        $pdf->ln(5);

      }
    }elseif ($i6 > 1) {
        if ($cont >0 ) {
          $muestre1_0 = 'No Cumple';
          $pdf->Cell(60,5, $array_titulos5[$i6],1,0,'L',1,'',0);
          $pdf->Cell(120,5, $muestre1_0,1,0,'C',0,'',0);
          $pdf->ln(5);
        }else{
          $muestre1_0 = 'Cumple';
          $pdf->Cell(60,5, $array_titulos5[$i6],1,0,'L',1,'',0);
          $pdf->Cell(120,5, $muestre1_0,1,0,'C',0,'',0);
          $pdf->ln(5);
        }
   }
   $i6++;
}



$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<table >
   <tr border="1">
        <td class="linea"><h3>Prueba N°2: Unidireccionalidad</h3></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$queryPrueba5_1 = mysqli_prepare($connect,"SELECT resultado, cumple  FROM flujo_laminar_prueba_5
  WHERE id_asignado = ? AND categoria = 2");

mysqli_stmt_bind_param($queryPrueba5_1, 'i', $id_asignado);
mysqli_stmt_execute($queryPrueba5_1);
mysqli_stmt_store_result($queryPrueba5_1);
mysqli_stmt_bind_result($queryPrueba5_1, $resultado_2, $cumple_2);

  $pdf->Cell(60,5,'condiciones',1,0,'C',1,'',0);
  $pdf->Cell(60,5,'Resultado',1,0,'C',1,'',0);
  $pdf->Cell(60,5,'Cumple',1,0,'C',1,'',0);
  $pdf->ln(5);

$array_titulos6 = array('Ubicación de Prueba', 'Visualización de Flujo Unidireccional','Visualización de Flujo Reverso','Visualización de Puntos Muertos ','Visualización de Vórtices','Cumple Especificaciones','Cumple Prueba de Humo');


$i7 = 0;

$cont = 0;

while ($row = mysqli_stmt_fetch($queryPrueba5_1)) {

    if ($i7 < 5) {

                if ($i7 < 1) {
              $pdf->Cell(60,5, $array_titulos6[$i6],1,0,'L',1,'',0);
              $pdf->Cell(60,5, $resultado_2,1,0,'C',0,'',0);
              $pdf->Cell(60,5, 'NA',1,0,'C',0,'',0);
              $pdf->ln(5);
              }else{
                  if ($resultado_2 == 'No') {
                     $muestre2 = 'Cumple';
                  }else{
                     $muestre2 = 'No Cumple';
                     $cont++;
                  }
              $pdf->Cell(60,5, $array_titulos6[$i7],1,0,'L',1,'',0);
              $pdf->Cell(60,5, $resultado_2,1,0,'C',0,'',0);
              $pdf->Cell(60,5, $muestre2,1,0,'C',0,'',0);
              $pdf->ln(5);

            }
        
      }elseif($i7 > 2){
          if ($cont > 0) {
            $muestre2_1 = 'No cumple';
          
            $pdf->Cell(60,5, $array_titulos6[$i7],1,0,'L',1,'',0);
            $pdf->Cell(120,5, $muestre2_1,1,0,'C',0,'',0);
            $pdf->ln(5);
          }else{
             $muestre2_1 = 'Cumple';
             $pdf->Cell(60,5, $array_titulos6[$i7],1,0,'L',1,'',0);
             $pdf->Cell(120,5, $muestre2_1,1,0,'C',0,'',0);
             $pdf->ln(5);
          }

        }
   $i7++;
}

$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<table >
   <tr border="1">
        <td class="linea"><h2>Prueba de Medición de Nivel de Iluminación - DS N°594</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$queryPrueba6 = mysqli_prepare($connect,"SELECT punto_1, punto_2, punto_3, punto_4, punto_5, promedio  FROM flujo_laminar_prueba_6
  WHERE id_asignado = ? ");

mysqli_stmt_bind_param($queryPrueba6, 'i', $id_asignado);
mysqli_stmt_execute($queryPrueba6);
mysqli_stmt_store_result($queryPrueba6);
mysqli_stmt_bind_result($queryPrueba6, $punto_1, $punto_2, $punto_3, $punto_4, $punto_5, $promedio);


$pdf->Cell(27,5, 'Punto de muestro',1,0,'C',1,'',0);
$pdf->Cell(25.5,5, '1',1,0,'C',1,'',0);
$pdf->Cell(25.5,5, '2',1,0,'C',1,'',0);
$pdf->Cell(25.5,5, '3',1,0,'C',1,'',0);
$pdf->Cell(25.5,5, '4',1,0,'C',1,'',0);
$pdf->Cell(25.5,5, '5',1,0,'C',1,'',0);
$pdf->Cell(25.5,5, 'Promedio',1,0,'C',1,'',0);
$pdf->ln(5);
$pdf->Cell(27,5, 'Lux',1,0,'C',1,'',0);

while ($row = mysqli_stmt_fetch($queryPrueba6)) {
 

$pdf->Cell(25.5,5, $punto_1,1,0,'C',0,'',0);
$pdf->Cell(25.5,5, $punto_2,1,0,'C',0,'',0);
$pdf->Cell(25.5,5, $punto_3,1,0,'C',0,'',0);
$pdf->Cell(25.5,5, $punto_4,1,0,'C',0,'',0);
$pdf->Cell(25.5,5, $punto_5,1,0,'C',0,'',0);
$pdf->Cell(25.5,5, $promedio,1,0,'C',0,'',0);

$pdf->ln(5);
}
//}

$imagen1 = <<<EOD
<style>
.linea{
  

}
</style>

<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><img src="../../imagenes/definidas/luz.jpg" style="width: 150px;"></td>  
   </tr>
</table>

EOD;
$pdf->writeHTML($imagen1, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<br><br>
<table >
   <tr border="1">
        <td class="linea"><h2>Equipos Utilizado en la Medición</h2></td>
   </tr>
</table>
<br>
<br>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$equipos_flujo5 = mysqli_prepare($connect,"SELECT b.marca_equipo, b.modelo_equipo, b.n_serie_equipo, c.numero_certificado, c.fecha_emision 
FROM equipos_mediciones a, equipos_cercal b , certificado_equipo c 
WHERE a.id_equipo = b.id_equipo_cercal AND a.id_asignado = ? AND c.id_equipo_cercal = b.id_equipo_cercal AND a.tipo_prueba ='Prueba nivel de iluminación'");

mysqli_stmt_bind_param($equipos_flujo5, 'i', $id_asignado);
mysqli_stmt_execute($equipos_flujo5);
mysqli_stmt_store_result($equipos_flujo5);
mysqli_stmt_bind_result($equipos_flujo5, $marca5, $modelo5, $n_serie5, $certificado_calibracion5, $ultima_calibracion5);


    $pdf->Cell(28,5,'Marca',1,0,'C',1,'',0);
    $pdf->Cell(31,5,'Modelo',1,0,'C',1,'',0);
    $pdf->Cell(30,5,'No° Serie',1,0,'C',1,'',0);
    $pdf->Cell(35,5,'Certificado de Calibración',1,0,'C',1,'',0);
    $pdf->Cell(30,5,'Última Calibración',1,0,'C',1,'',0);
    $pdf->Cell(26,5,'Trazabilidad',1,0,'C',1,'',0);
    $pdf->ln(5);

while ($row = mysqli_stmt_fetch($equipos_flujo5)) {
    $pdf->Cell(28,5,$marca5,1,0,'C',0,'',0);
    $pdf->Cell(31,5,$modelo5,1,0,'C',0,'',0);
    $pdf->Cell(30,5,$n_serie5,1,0,'C',0,'',0);
    $pdf->Cell(35,5,$certificado_calibracion5,1,0,'C',0,'',0);
    $pdf->Cell(30,5,$ultima_calibracion5,1,0,'C',0,'',0);
    $pdf->Cell(26,5,'-',1,0,'C',0,'',0);
    $pdf->ln(5);
}

$pdf->AddPage('A4');

$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:black;
}
</style>
<table >
   <tr border="1">
        <td class="linea"><h2>FOTOGRAFIAS DEL EQUIPO</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

  $pdf->Cell(25,5,'Informe referencia:',0,0,'L',0,'',0);
     $pdf->Cell(50,5,$nombre_informe,1,0,'J',0,'',0);
     $pdf->Cell(15,5,'OT N°',0,0,'C',0,'',0);
     $pdf->Cell(15,5,$num_ot,1,0,'C',0,'',0);
     $pdf->Cell(20,5,'',0,0,'C',0,'',0);
     $pdf->Cell(30,5,'Fecha de Emisión:',0,0,'L',0,'',0);
     $pdf->Cell(25,5,$fecha_registro,1,0,'C',0,'',0);

   $pdf->ln(7);   

   $pdf->Cell(25,5,'Empresa:',0,0,'L',0,'',0);
   $pdf->Cell(80,5,$nombre_empresa,1,0,'C',0,'',0);
   $pdf->Cell(20,5,'',0,0,'C',0,'',0);
   $pdf->Cell(20,5,'Solicita:',0,0,'L',0,'',0);
   $pdf->Cell(35,5,$solicitante,1,0,'C',0,'',0);

   $pdf->ln(7);  

   $pdf->Cell(25,5,'Dirección:',0,0,'L',0,'',0);
   $pdf->Cell(155,5,$direccion,1,0,'L',0,'',0);

   $pdf->ln(10);  

   $pdf->Cell(42,5,'Tipo Cabina',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Marca',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Modelo',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Serie',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Código',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Ubicado en',1,0,'C',1,'',0);
   $pdf->ln(5); 
   $pdf->Cell(42,5,$tipo_cabina,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$serie,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$codigo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$ubicacion_interna,1,0,'C',0,'',0);
   $pdf->ln(7);  
   $pdf->Cell(45,5,'Cantidad de Filtros HEPA',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Tipo y Dimensiones de Filtros Interiores',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Límite de Penetración',1,0,'C',1,'',0);
   $pdf->Cell(45,5,'Eficiencia',1,0,'C',1,'',0);
   $pdf->ln(5);
   $pdf->Cell(45,5,$cantidad_filtro,1,0,'C',0,'',0);
   $pdf->Cell(45,5,$tipo_dimenciones,1,0,'C',0,'',0);
   $pdf->Cell(45,5,$limite_penetracion.'%',1,0,'C',0,'',0);
   $pdf->Cell(45,5,$eficiencia,1,0,'C',0,'',0);


  $pdf->ln(7);
$imagenFrontal = mysqli_prepare($connect,"SELECT url, nombre 
  FROM image_flujo_laminar
  WHERE id_asignado = ? AND tipo = 2");

mysqli_stmt_bind_param($imagenFrontal, 'i', $id_asignado);
mysqli_stmt_execute($imagenFrontal);
mysqli_stmt_store_result($imagenFrontal);
mysqli_stmt_bind_result($imagenFrontal, $url1, $nombre_imagen1);
mysqli_stmt_fetch($imagenFrontal);

$imagenPlaca = mysqli_prepare($connect,"SELECT url, nombre 
  FROM image_flujo_laminar
  WHERE id_asignado = ? AND tipo = 3");

mysqli_stmt_bind_param($imagenPlaca, 'i', $id_asignado);
mysqli_stmt_execute($imagenPlaca);
mysqli_stmt_store_result($imagenPlaca);
mysqli_stmt_bind_result($imagenPlaca, $url2, $nombre_imagen2);
mysqli_stmt_fetch($imagenPlaca);

$imagenAreatrabajo = mysqli_prepare($connect,"SELECT url, nombre 
  FROM image_flujo_laminar
  WHERE id_asignado = ? AND tipo = 4");

mysqli_stmt_bind_param($imagenAreatrabajo, 'i', $id_asignado);
mysqli_stmt_execute($imagenAreatrabajo);
mysqli_stmt_store_result($imagenAreatrabajo);
mysqli_stmt_bind_result($imagenAreatrabajo, $url3, $nombre_imagen3);
mysqli_stmt_fetch($imagenAreatrabajo);

if ($url1 == '' || $url1 == NULL) {
  $image_frontal = '';
}else{
  $image_frontal = '../../'.$url1.$nombre_imagen1;
}
if ($url2 == '' || $url2 == NULL) {
  $imagenPlaca = '';
}else{
  $imagenPlaca = '../../'.$url2.$nombre_imagen2;
}
if ($url3 == '' || $url3 == NULL) {
  $imagenAreatrabajo = '';
}else{
  $imagenAreatrabajo = '../../'.$url3.$nombre_imagen3;
}




$linea13 = <<<EOD

<style>
.linea{
   height: 14 px;
   color:black;

}
.imagen{
    height:200px
}
</style>
<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><h2><b>Imagen Frontal</b></h2></td>  
        <td class="linea" align="center"><h2><b>Imagen de Placa</b></h2></td>  
   </tr>
   <br>
   <tr>
        <td class="imagen" border="0">
          <table border="0" style="width:310px;">
            <tr>
              <td> <img src="$image_frontal" style="width:250px;"></td>
            </tr>
          </table>
        </td>
        <td class="imagen" border="0">
          <table border="0" style="width:310px;">
            <tr>
              <td> <img src="$imagenPlaca" style="width:250px;"></td>
            </tr>
          </table>
        </td>
   </tr>
</table>
<br>
<br>
<table border="0">
    <tr>
        <td class="linea" align="center"><h2><b>Imagen Área de Trabajo</b></h2></td> 
    </tr>  
    <br>  
    <tr>
        <td style="width: 170px;"></td>
        <td class="imagen" style="width: 298px;" border="0">
          <img src="$imagenPlaca" style="width:250px;">
        </td>
        <td style="width: 170px;"></td>
    </tr>
</table>
<img src='descarga.png'>
EOD;



$pdf->writeHTML($linea13, true, false, false, false, '');


$pdf->Output($nombre_informe, 'I');

?>