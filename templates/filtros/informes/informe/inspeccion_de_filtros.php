<?php 
require('../../../../recursos/itemencabezadopdf.php');
require('../../../../config.ini.php');


$clave = $_GET['clave'];

$id_asignado = substr($clave, 97);

//echo $id_asignado;
/////// CONSULTA TRAE INFORMACIÓN DEL EQUIPO
$consulta_informacion_informe = mysqli_prepare($connect,"SELECT a.descripcion, a.nombre, b.marca,  b.modelo, b.ubicacion, b.ubicado_en, b.tipo_filtro, b.cantidad_filtro, b.limite_penetracion, b.eficiencia, b.serie FROM item as a, item_filtro as b, item_asignado as c WHERE c.id_asignado = ? AND c.id_item = b.id_item AND b.id_item = c.id_item AND a.id_tipo = 11");


mysqli_stmt_bind_param($consulta_informacion_informe, 'i', $id_asignado);
mysqli_stmt_execute($consulta_informacion_informe);
mysqli_stmt_store_result($consulta_informacion_informe);
mysqli_stmt_bind_result($consulta_informacion_informe, $descripcion, $nombre_item, $marca, $modelo, $ubicacion, 
   $ubicado_en, $tipo_filtro, $cantidad_filtro, $limite_penetracion, $eficiencia, $n_serie);
mysqli_stmt_fetch($consulta_informacion_informe);


/// CONSULTA TRAE INFORMACIÓN DE LA EMPRESA

$consulta_empresa = mysqli_prepare($connect,"SELECT e.nombre_informe, c.numot, DATE_FORMAT(e.fecha_registro, '%m/%d/%Y'), d.nombre, d.direccion, e.insp1, e.insp2, e.insp3, e.insp4, e.insp5, e.insp6, e.id_informe FROM item_asignado as a, servicio as b, numot as c, empresa as d, informe_filtro as e WHERE a.id_asignado = ? AND a.id_servicio = b.id_servicio AND b.id_numot = c.id_numot AND c.id_empresa = d.id_empresa AND a.id_asignado = e.id_asignado");

mysqli_stmt_bind_param($consulta_empresa, 'i', $id_asignado);
mysqli_stmt_execute($consulta_empresa);
mysqli_stmt_store_result($consulta_empresa);
mysqli_stmt_bind_result($consulta_empresa, $nombre_informe, $numot, $fecha_registro, $empresa, $direccion, $insp1, $insp2, $insp3, $insp4,  $insp5, $insp6, $id_informe);
mysqli_stmt_fetch($consulta_empresa);



$pdf->AddPage('A4');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
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

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Informe ref:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(50, 5, 40, '', $nombre_informe ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(15, 5, 90, '', '<strong>OT N°:</strong>',0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(13, 5, 105, '', $numot ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(35, 5, 140, '', '<strong>Fecha de Emisión:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 175, '', $fecha_registro ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Empresa:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(75, 5, 40, '', $empresa ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 140, '', '<strong>Solicita:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(35, 5, 160, '', $solicita ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Dirección:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(155, 5, 40, '', $direccion ,1,0, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

$info_equipo = <<<EOD
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
               <td bgcolor="#DDDDDD"><h5><strong>Descripción</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Marca</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Modelo</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Serie</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Lugar</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Ubicado en</strong></h5></td>
            </tr>
            <tr>
               <td>$descripcion</td>
               <td>$marca</td>
               <td>$modelo</td>
               <td>$n_serie</td>
               <td>$ubicacion</td>
               <td>$ubicado_en</td>
            </tr>
         </table>
      </tr>
      <br>
      <tr>
         <table>
            <tr>
               <td bgcolor="#DDDDDD"><h5><strong>Tipo de Filtro y Dimensiones</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Cantidad de Filtros HEPA</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Límite de Penetración</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Eficiencia</strong></h5></td>
            </tr>
            <tr>
               <td>$tipo_filtro</td>
               <td>$cantidad_filtro</td>
               <td>$limite_penetracion</td>
               <td>$eficiencia</td>
            </tr>
         </table>
      </tr>
   </table>
   
EOD;  
$pdf->writeHTML($info_equipo, true, false, false, false, '');

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
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
   border: 1px solid #BBBBBB;
   padding: 3px;
   vertical-align: middle;
   text-align:center;
   }

   tr:nth-child(even) 
   {
      background-color: #f2f2f2;
   }

</style>

<table >
   <tr border="1">
        <td class="linea" align="center"><h2><b>RESULTADO DE MEDICIONES - NORMA: UNE-EN ISO 14.644-3:2015</b></h2></td>
   </tr>
</table>
<br><br>


 <table>
      <tr>
         <table>
            <tr>
               <td bgcolor="#DDDDDD"><h5><strong>Medición</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Requisito</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Valor Obtenido</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Veredicto</strong></h5></td>
            </tr>
            <tr>
               <td bgcolor="#DDDDDD"><h5>Prueba de Integridad de Filtro N°1</h5></td>
               <td> < = 0,001 %</td>
               <td> < 0.001 %</td>
               <td>CUMPLE</td>
            </tr>
         </table>
      </tr> 
   </table>


EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><b>Conclusión</b></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(165, 5, 15, '', 'De acuerdo a los resultados obtenidos a las muestras inspeccionadas, los filtros HEPA indicados en la ubicación del encabezado,
CUMPLE con los parámetros establecidos en la normativa vigente.' ,0,1, 0, true, 'J', true);

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><b>Duración de Certificado</b></td>
        <td class="linea" align="center"><b>Fecha de Medición</b></td>
   </tr>
   <tr>
        <td style="text-align:center;">La vigencia de Certificación es de 12 meses.</td>
        <td align="center">$fecha_registro</td>
   </tr>    
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><b>Responsable</b></td>
        <td class="linea" align="center"><b>Código QR de Verificación</b></td>
        <td class="linea" align="center"><b>Firma</b></td>
   </tr>
   <tr>
       <td align="center">Ing. Raúl Quevedo Silva<br>Gerente de Operaciones</td>
       <td align="center"></td>
       <td align="center"></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(165, 5, 15, '', '' ,0,1, 0, true, 'C', true);
   

$pdf->AddPage('A4');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2><b>MEDICIÓN DE INSPECCION INTEGRIDAD DE FILTRO</b></h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Informe ref:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(50, 5, 40, '', $nombre_informe ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(15, 5, 90, '', '<strong>OT N°:</strong>',0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(13, 5, 105, '', $numot ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(35, 5, 140, '', '<strong>Fecha de Emisión:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 175, '', $fecha_registro ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $info_equipo = <<<EOD
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
               <td bgcolor="#DDDDDD"><h5><strong>Descripción</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Marca</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Modelo</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Serie</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Lugar</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Ubicado en</strong></h5></td>
            </tr>
            <tr>
               <td>$descripcion</td>
               <td>$marca</td>
               <td>$modelo</td>
               <td>$n_serie</td>
               <td>$ubicacion</td>
               <td>$ubicado_en</td>
            </tr>
         </table>
      </tr>
      <br>
      <tr>
         <table>
            <tr>
               <td bgcolor="#DDDDDD"><h5><strong>Tipo de Filtro y Dimensiones</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Cantidad de Filtros HEPA</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Límite de Penetración</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Eficiencia</strong></h5></td>
            </tr>
            <tr>
               <td>$tipo_filtro</td>
               <td>$cantidad_filtro</td>
               <td>$limite_penetracion</td>
               <td>$eficiencia</td>
            </tr>
         </table>
      </tr>
   </table>
   
EOD;  
$pdf->writeHTML($info_equipo, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2><b>INSPECCIÓN VISUAL</b></h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

   $pdf->writeHTMLCell(70, 5, 15, '', 'Equipo en buenas condiciones de operación:',1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(10, 5, 85, '', $insp1 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 95, '', '',0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(70, 5, 115, '','Filtro presenta reparaciones:' ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 185, '', $insp2,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(70, 5, 15, '', 'Filtro presenta rotura:',1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(10, 5, 85, '', $insp3 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 95, '', '',0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(70, 5, 115, '','Filtro presenta rotura en sellos perimetrales:' ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 185, '', $insp4,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(70, 5, 15, '', 'Filtros instalados correctamente:',1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(10, 5, 85, '', $insp5,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 95, '', '',0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(70, 5, 115, '','Presenta colmatación:' ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 185, '', $insp6,1,1, 0, true, 'C', true);


$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
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
<table border="1" style="text-align: center;">
      <tr>
         <td style= "height: 250px;">imagen1</td>
      </tr>
      <br>
      <tr>
         <td style= "height: 250px;">imagen2</td>
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
   background-color: #1a53ff;
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2><b>MEDICIÓN DE INSPECCION INTEGRIDAD DE FILTRO</b></h2></td>
   </tr>

</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


  $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Informe ref:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(50, 5, 40, '', $nombre_informe ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(15, 5, 90, '', '<strong>OT N°:</strong>',0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(13, 5, 105, '', $numot ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(35, 5, 140, '', '<strong>Fecha de Emisión:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 175, '', $fecha_registro ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);


   $info_equipo = <<<EOD
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
               <td bgcolor="#DDDDDD"><h5><strong>Descripción</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Marca</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Modelo</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Serie</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Lugar</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Ubicado en</strong></h5></td>
            </tr>
            <tr>
               <td>$descripcion</td>
               <td>$marca</td>
               <td>$modelo</td>
               <td>$n_serie</td>
               <td>$ubicacion</td>
               <td>$ubicado_en</td>
            </tr>
         </table>
      </tr>
      <br>
      <tr>
         <table>
            <tr>
               <td bgcolor="#DDDDDD"><h5><strong>Tipo de Filtro y Dimensiones</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Cantidad de Filtros HEPA</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Límite de Penetración</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Eficiencia</strong></h5></td>
            </tr>
            <tr>
               <td>$tipo_filtro</td>
               <td>$cantidad_filtro</td>
               <td>$limite_penetracion</td>
               <td>$eficiencia</td>
            </tr>
         </table>
      </tr>
   </table>
   
EOD;  
$pdf->writeHTML($info_equipo, true, false, false, false, '');


$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2><b>DETALLE DE MEDICIONES</b></h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');




$pdf->writeHTMLCell(20, 5, 15, '', '<b>N° de Filtro</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 35, '', '<b>Zona A</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 55, '', '<b>Zona A</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 75, '', '<b>Zona B</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 95, '', '<b>Zona B</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 115, '', '<b>Zona C</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 135, '', '<b>Zona C</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 155, '', '<b>Zona D</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 175, '', '<b>Zona D</b>' ,1,1, 0, true, 'C', true);


//Consulta que busca los filtros usados 
$consultar_N_filtro = mysqli_prepare($connect,"SELECT nombre_filtro, zonaA, zonaAA, zonaB, zonaBB, zonaC, zonaCC, zonaD, zonaDD  FROM filtro_mediciones_2 WHERE id_informe = ?");

mysqli_stmt_bind_param($consultar_N_filtro, 'i', $id_informe);
mysqli_stmt_execute($consultar_N_filtro);
mysqli_stmt_store_result($consultar_N_filtro);
mysqli_stmt_bind_result($consultar_N_filtro, $nombre_filtro, $zonaA, $zonaAA, $zonaB, $zonaBB, $zonaC, $zonaCC, $zonaD, $zonaDD);

   //AQUI VAN LOS VALORES
while($row = mysqli_stmt_fetch($consultar_N_filtro)){
      
   $pdf->writeHTMLCell(20, 5, 15, '', $nombre_filtro ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 35, '', $zonaA ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 55, '', $zonaAA ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 75, '', $zonaB ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 95, '', $zonaBB ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 115, '', $zonaC ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 135, '', $zonaCC ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 155, '', $zonaD ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 175, '', $zonaDD ,1,1, 0, true, 'C', true);

   }  


$linea = <<<EOD
<br>
<br>
<table border="0" style="text-align: center;">
      <tr>
         <td style= "height: 350px;"></td>
      </tr>
      <br>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
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

$pdf->writeHTMLCell(30, 7, 15, '', '<b>Marca</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 45, '', '<b>Modelo</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 75, '', '<b>N° Serie</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 105, '', '<b>Certificado de Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 135, '', '<b>Última Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 165, '', '<b>Trazabilidad</b>' ,1,1, 0, true, 'C', true);

//Consulta que busca los filtros usados 
$consultar_equipo = mysqli_prepare($connect,"SELECT  b.marca_equipo, b.modelo_equipo, b.n_serie_equipo, c.numero_certificado, c.fecha_emision FROM equipos_mediciones a, equipos_cercal b, certificado_equipo c WHERE a.id_informe = ? AND a.id_equipo = b.id_equipo_cercal AND c.id_equipo_cercal = a.id_equipo");

mysqli_stmt_bind_param($consultar_equipo, 'i', $id_informe);
mysqli_stmt_execute($consultar_equipo);
mysqli_stmt_store_result($consultar_equipo);
mysqli_stmt_bind_result($consultar_equipo, $marca_equipo, $modelo_equipo, $n_serie_equipo, $numero_certificado, $fecha_emision);

   //AQUI VAN LOS VALORES
   while($row = mysqli_stmt_fetch($consultar_equipo)){
      
   $pdf->writeHTMLCell(30, 5, 15, '', $marca_equipo ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 5, 45, '', $modelo_equipo ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 5, 75, '', $n_serie_equipo ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 5, 105, '', $numero_certificado ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 5, 135, '', $fecha_emision ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 5, 165, '', 'Trazabilidad' ,1,1, 0, true, 'C', true);

   } 

$pdf->AddPage('A4');


 $linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
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
$consultar_imagenes = mysqli_prepare($connect,"SELECT url, enunciado FROM images_informe_filtro WHERE id_informe = ?");

mysqli_stmt_bind_param($consultar_imagenes, 'i', $id_informe);
mysqli_stmt_execute($consultar_imagenes);
mysqli_stmt_store_result($consultar_imagenes);
mysqli_stmt_bind_result($consultar_imagenes, $url, $enunciado);
   
while($row = mysqli_stmt_fetch($consultar_imagenes)){
      
       $imagenes = <<<EOD
       
         <table witdh="100%">
            <tr>
               <td></td>
               <td width="200px">
                  <img src="../../$url">
               </td>
                <td></td>
            </tr>
         </table>
         <br>
      

      EOD;  
      $pdf->writeHTML($imagenes, true, false, false, false, '');  
   

   }     


$pdf->Output('Inspección salas limpias.pdf', 'I');
?>