<?php 
require('../../../../recursos/itemencabezadopdf.php');
require('../../../../config.ini.php');


$clave = $_GET['clave'];

$id_asignado = substr($clave, 97);




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
        <td class="linea" align="center"><b> CERTIFICADO INSPECCIÓN DE SALA LIMPIA</b></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Informe ref:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(50, 5, 40, '', 'SCL3444-DOC4774-CLI18-SLA' ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(15, 5, 90, '', '<strong>OT N°:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(10, 5, 105, '', '3444' ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(35, 5, 140, '', '<strong>Fecha de Emisión:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 175, '', '3444' ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Empresa:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(75, 5, 40, '', 'CLINICA ALEMANA DE SANTIAGO ' ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 140, '', '<strong>Solicita:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(35, 5, 160, '', 'Ronny Cardenas' ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Dirección:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(155, 5, 40, '', 'Avenida Vitacura, 5951, Santiago, Chile' ,1,0, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

$info_equipo = <<<EOD
   <style>
   table 
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
               <td bgcolor="#DDDDDD"><h5><strong>Nom. de Sala</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Área</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Código</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Área m²</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Volumen m³ </strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Estado de Sala</strong></h5></td>
            </tr>
            <tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
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

<table >
   <tr border="1">
        <td class="linea" align="center"><h2><b>RESULTADO DE MEDICIONES</b></h2></td>
   </tr>
</table>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><b>Prueba de Partículas en Suspensión</b></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$pdf->writeHTMLCell(45, 5, 15, '', 'Norma de Referencia:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(67, 5, 60, '', 'ISO 14644-1:2015 (Promedio)' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(67, 5, 127, '', 'ISO 14644-1:2015 (Promedio)' ,1,1, 0, true, 'C', true);

$pdf->writeHTMLCell(45, 5, 15, '', 'Tamaño de Partículas:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(33.5, 5, 60, '', 'Partículas >= 0,5 µm' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 93.5, '', 'Partículas >= 5,0 µm' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 127, '', 'Partículas >= 0,5 µm' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 160.5, '', 'Partículas >= 5,0 µm' ,1,1, 0, true, 'C', true);


$pdf->writeHTMLCell(45, 5, 15, '', 'Resultado:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(33.5, 5, 60, '', '177386' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 93.5, '', '177386' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 127, '', '177386' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 160.5, '', '177386' ,1,1, 0, true, 'C', true);

$pdf->writeHTMLCell(45, 5, 15, '', 'Requisito:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(67, 5, 60, '', ' Clase D (OMS) / ISO 8 -> 0,5 µm: 3520000 / 5,0 µm: 29300' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(67, 5, 127, '', 'Clase D (OMS) / ISO 8 -> 0,5 µm: 3520000 / 5,0 µm: 29300' ,1,1, 0, true, 'C', true);

$pdf->writeHTMLCell(45, 5, 15, '', 'Veredicto:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(33.5, 5, 60, '', ' CUMPLE' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 93.5, '', ' CUMPLE' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 127, '', ' CUMPLE' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 160.5, '', ' CUMPLE' ,1,1, 0, true, 'C', true);

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
        <td class="linea" align="center"><b> Prueba de Renovación de Aire</b></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(25, 5, 15, '', 'Resultado, Ren/h:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(33.5, 5, 40, '', '15.9' ,1,0, 0, true, 'C', true);


$pdf->writeHTMLCell(25, 5, 78, '', 'Especificado:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(33.5, 5, 103, '', '15.9' ,1,0, 0, true, 'C', true);

$pdf->writeHTMLCell(21, 5, 140, '', 'Cumple:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(33.5, 5, 161, '', '15.9' ,1,1, 0, true, 'C', true);

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
        <td class="linea" align="center"><b>Prueba de Difencial de Presión</b></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(50, 5, 15, '', 'Enunciado' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 65, '', 'Enunciado' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 100, '', 'Enunciado' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 135, '', 'Enunciado' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 165, '', 'Enunciado' ,1,1, 0, true, 'C', true);

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
        <td class="linea" align="center"><b>Prueba de Temperatura y Humedad Relativa</b></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(30, 5, 15, '', 'Resultado,°C: ' ,0,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 45, '', 'variable' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 80, '', 'Especificación Temperatura:' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 120, '', 'entre 18°C y 24°C' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 160, '', 'Cumple' ,1,1, 0, true, 'C', true);

$pdf->writeHTMLCell(30, 5, 15, '', 'Resultado, HR%: ' ,0,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 45, '', 'variable' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 80, '', 'Especificación Humedad:' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 120, '', 'entre 30%HR y 50%HR' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 160, '', 'Cumple' ,1,1, 0, true, 'C', true);


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
        <td class="linea" align="center"><b>Prueba de Iluminación y Ruido</b></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(30, 5, 15, '', 'Resultado,Lux:' ,0,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 45, '', 'variable' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 80, '', 'Resultado,Lux:' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 120, '', '>= 150' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 160, '', 'Cumple' ,1,1, 0, true, 'C', true);

$pdf->writeHTMLCell(30, 5, 15, '', 'Resultado, dbA:' ,0,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 45, '', 'variable' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 80, '', 'Especificación, dbA:' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 120, '', '< = 85' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 160, '', 'Cumple' ,1,1, 0, true, 'C', true);

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

$pdf->writeHTMLCell(165, 5, 15, '', 'Los resultados obtenidos en el presente informe, se aplican solo a los elementos ensayados y corresponde a las condiciones encontradas al
momento de la inspección' ,0,1, 0, true, 'J', true);

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
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(165, 5, 15, '', 'De acuerdo con la UNE-EN ISO 14644-1 Anexo B, el intervalo de tiempo máximo entre verificaciones es de 12 meses. ' ,0,1, 0, true, 'J', true);


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
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(165, 5, 15, '', 'Ing. Raúl Quevedo Silva<br>
Gerente de Operaciones' ,0,1, 0, true, 'C', true);



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
        <td class="linea" align="center"><b>MEDICIÓN DE PARTÍCULAS EN SUSPENSIÓN</b></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$prueba = <<<EOD
   <style>
   table 
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
               <td bgcolor="#DDDDDD"><h5><strong>Método de Ensayo</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>N° Puntos por Medición</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>N° Muestras por Punto</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Volumen por Muestras (L)</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Altura toma de Muestras (m)</strong></h5></td>
            </tr>
            <tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
            </tr>
         </table>
      </tr>
   </table>
EOD;  
$pdf->writeHTML($prueba, true, false, false, false, '');




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
        <td class="linea" align="center"><b>Imagen de la Medición y Registro de Conteo de Partículas</b></td>
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
        <td class="linea" align="center"><b>Cálculo de Resultados - Medidos en partículas / m³ - Requisito de Partícula 0,5 µm: 3520000 / 5,0 µm: 29300</b></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$pdf->writeHTMLCell(30, 5, 15, '', 'Tamaños (µm)' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 45, '', 'Media de los Promedios' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 80, '', 'Desviación Estandar' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 120, '', 'Desviación Estandar' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 160, '', 'Cumple' ,1,1, 0, true, 'C', true);

$categoria_1 = 1;
$enunciados1 = array('>=0,5', '>=5,0');
$contador = 0;

$query1 = mysqli_prepare($connect,"SELECT medida_promedio, desviacion_estandar, maximo, cumple FROM salas_limpias_prueba_1 WHERE id_asignado = ? AND categoria  = ?");
mysqli_stmt_bind_param($query1, 'ii', $id_asignado, $categoria_1);
mysqli_stmt_execute($query1);
mysqli_stmt_store_result($query1);
mysqli_stmt_bind_result($query1, $medida_promedio, $desviacion_estandar, $maximo, $cumple);

while($row = mysqli_stmt_fetch($query1)){

   $pdf->writeHTMLCell(30, 5, 15, '', $enunciados1[$contador] ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(35, 5, 45, '', $medida_promedio ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(40, 5, 80, '', $desviacion_estandar ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(40, 5, 120, '', $maximo ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(35, 5, 160, '', $cumple ,1,1, 0, true, 'C', true);

   $contador++;
}


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
        <td class="linea" align="center"><b>Cálculo de Resultados para Informe Técnico N°45 de la OMS - Medidos en partículas / m³ - Requisito de Partícula 0,5 µm:3.520.000 / 5,0 µm: 29.000</b></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$pdf->writeHTMLCell(63, 5, 15, '', 'Tamaños (µm)' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(63, 5, 78, '', 'Promedios' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(53, 5, 141, '', 'Cumple' ,1,1, 0, true, 'C', true);

$categoria_2 = 2;
$enunciados1 = array('>=0,5', '>=5,0');
$contador = 0;

$query2 = mysqli_prepare($connect,"SELECT promedios, cumple FROM salas_limpias_prueba_1 WHERE id_asignado = ? AND categoria  = ?");
mysqli_stmt_bind_param($query2, 'ii', $id_asignado, $categoria_1);
mysqli_stmt_execute($query2);
mysqli_stmt_store_result($query2);
mysqli_stmt_bind_result($query2, $promedios, $cumple);

while($row = mysqli_stmt_fetch($query2)){

   $pdf->writeHTMLCell(63, 5, 15, '', $enunciados1[$contador] ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(63, 5, 78, '', $promedios ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(53, 5, 141, '', $cumple ,1,1, 0, true, 'C', true);
   $contador++;
}



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
        <td class="linea" align="center"><b>Equipo Utilizado en la Medición</b></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(30, 7.2, 15, '', '<b>Marca</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 45, '', '<b>Modelo</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 75, '', '<b>N° Serie</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 105, '', '<b>Certificado de Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 135, '', '<b>Última Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 165, '', '<b>Trazabilidad</b>  ' ,1,1, 0, true, 'C', true);

$equipo_prueba_1 = "Prueba de conteo de particulas";


$query3 = mysqli_prepare($connect,"SELECT a.marca_equipo, a.modelo_equipo, a.n_serie_equipo, b.numero_certificado, b.fecha_emision  FROM equipos_cercal as a,  certificado_equipo as b,  equipos_mediciones as c WHERE a.id_equipo_cercal = b.id_equipo_cercal AND c.id_equipo = a.id_equipo_cercal AND c.id_asignado = ? AND c.tipo_prueba = ? ");
mysqli_stmt_bind_param($query3, 'is', $id_asignado, $equipo_prueba_1);
mysqli_stmt_execute($query3);
mysqli_stmt_store_result($query3);
mysqli_stmt_bind_result($query3, $marca, $modelo, $n_serie, $certificado, $fecha_emision);

while($row = mysqli_stmt_fetch($query3)){

   $pdf->writeHTMLCell(30, 7.2, 15, '', $marca ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 45, '', $modelo ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 75, '', $n_serie ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 105, '', $certificado ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 135, '', $fecha_emision ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 165, '', 'Trazabilidad' ,1,1, 0, true, 'C', true);

}



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
        <td class="linea" align="center"><b>MEDICIÓN DE PRESIÓN DIFERENCIAL</b></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$pdf->writeHTMLCell(30, 5, 15, '', '<strong>Método de ensayo:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 45, '', 'UNE-EN ISO 14.644-3:2006,Punto 4.2.3' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(40, 5, 110, '', '<strong>Especificación de la sala:</strong>',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(45, 5, 150, '', 'Clase D (OMS) / ISO 8' ,1,1  , 0, true, 'J', true);



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
        <td class="linea" align="center"><b>Imagen de la médición</b></td>
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
        <td class="linea" align="center"><b>Medición - Prueba de Presión Diferencial, Pa</b></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$nombres = array('Lugar de Medición', 'Medición Realizada en', 'Resultado (Pa)', 'Presión especificada (Pa)', 'Tipo de Presión', 'Cumple Especificación');
$contador = 0;

$query4 = mysqli_prepare($connect,"SELECT medicion_1, medicion_2, medicion_3, medicion_4 FROM salas_limpias_prueba_3 WHERE id_asignado = ?");
mysqli_stmt_bind_param($query4, 'i', $id_asignado);
mysqli_stmt_execute($query4);
mysqli_stmt_store_result($query4);
mysqli_stmt_bind_result($query4, $medicion_1, $medicion_2, $medicion_3, $medicion_4);

while($row = mysqli_stmt_fetch($query4)){

   $pdf->writeHTMLCell(38, 5, 15, '', $nombres[$contador] ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(33, 5, 53, '', $medicion_1 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(38, 5, 86, '', $medicion_2 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(38, 5, 124, '', $medicion_3 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(33, 5, 162, '', $medicion_4 ,1,1, 0, true, 'C', true);

   $contador++;
}

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
        <td class="linea" align="center"><b>Equipo Utilizado en la Medición</b></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(30, 7.2, 15, '', '<b>Marca</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 45, '', '<b>Modelo</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 75, '', '<b>N° Serie</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 105, '', '<b>Certificado de Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 135, '', '<b>Última Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 165, '', '<b>Trazabilidad</b>  ' ,1,1, 0, true, 'C', true);

$equipo_prueba_2 = "Prueba de Presión Diferencial";


$query5 = mysqli_prepare($connect,"SELECT a.marca_equipo, a.modelo_equipo, a.n_serie_equipo, b.numero_certificado, b.fecha_emision  FROM equipos_cercal as a,  certificado_equipo as b,  equipos_mediciones as c WHERE a.id_equipo_cercal = b.id_equipo_cercal AND c.id_equipo = a.id_equipo_cercal AND c.id_asignado = ? AND c.tipo_prueba = ? ");
mysqli_stmt_bind_param($query5, 'is', $id_asignado, $equipo_prueba_2);
mysqli_stmt_execute($query5);
mysqli_stmt_store_result($query5);
mysqli_stmt_bind_result($query5, $marca, $modelo, $n_serie, $certificado, $fecha_emision);

while($row = mysqli_stmt_fetch($query5)){

   $pdf->writeHTMLCell(30, 7.2, 15, '', $marca ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 45, '', $modelo ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 75, '', $n_serie ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 105, '', $certificado ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 135, '', $fecha_emision ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 165, '', 'Trazabilidad' ,1,1, 0, true, 'C', true);

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
        <td class="linea" align="center"><b>Medición - Prueba de Temperatura y Humedad</b></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$pdf->writeHTMLCell(30, 5, 15, '', '<strong>Método de ensayo:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 45, '', 'UNE-EN ISO 14.644-3:2006,Punto 4.2.3' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(40, 5, 110, '', '<strong>Especificación de la sala:</strong>',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(45, 5, 150, '', 'Clase D (OMS) / ISO 8' ,1,1  , 0, true, 'J', true);

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
        <td class="linea" align="center"><b>Imagen de la Médición</b></td>
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
        <td class="linea" align="center"><b>Prueba de Medición de Temperatura °C</b></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$pdf->writeHTMLCell(20, 5, 15, '', '<strong>Muestras</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5, 35, '', '<strong>N°1</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5, 67.5, '', '<strong>N°2</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5,100, '', '<strong>N°3</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5,132.5, '', '<strong>N°4</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(30, 5, 165, '', '<strong>N°5</strong>' ,1,1, 0, true, 'J', true);

$query6 = mysqli_prepare($connect,"SELECT n1, n2, n3, n4, n5, promedio, cumple, categoria FROM salas_limpias_prueba_4 WHERE id_asignado = ? AND categoria = 1");
mysqli_stmt_bind_param($query6, 'i', $id_asignado);
mysqli_stmt_execute($query6);
mysqli_stmt_store_result($query6);
mysqli_stmt_bind_result($query6, $n1, $n2, $n3, $n4, $n5, $promedio, $cumple, $categoria);

while($row = mysqli_stmt_fetch($query6)){

   $pdf->writeHTMLCell(20, 5, 15, '', 'Resultado, °C' ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(32.5, 5, 35, '', $n1 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 67.5, '', $n2 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 100, '', $n3 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 132.5, '', $n4 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 5, 165, '', $n5 ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(20, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Promedio, °C:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 40, '', '' ,1,0, 0, true, 'J', true);

   $pdf->writeHTMLCell(40, 5, 65, '', '<strong>Especificación Cliente ,°C:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 105, '', '' ,1,0, 0, true, 'J', true);

   $pdf->writeHTMLCell(40, 5, 130, '', '<strong>Cumple</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 170, '', '' ,1,1, 0, true, 'J', true);


}


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
        <td class="linea" align="center"><b>Prueba de Medición de Humedad Relativa, HR%</b></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$pdf->writeHTMLCell(20, 5, 15, '', '<strong>Muestras</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5, 35, '', '<strong>N°1</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5, 67.5, '', '<strong>N°2</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5,100, '', '<strong>N°3</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5,132.5, '', '<strong>N°4</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(30, 5, 165, '', '<strong>N°5</strong>' ,1,1, 0, true, 'J', true);

$query6 = mysqli_prepare($connect,"SELECT n1, n2, n3, n4, n5, promedio, cumple, categoria FROM salas_limpias_prueba_4 WHERE id_asignado = ? AND categoria = 2");
mysqli_stmt_bind_param($query6, 'i', $id_asignado);
mysqli_stmt_execute($query6);
mysqli_stmt_store_result($query6);
mysqli_stmt_bind_result($query6, $n1, $n2, $n3, $n4, $n5, $promedio, $cumple, $categoria);

while($row = mysqli_stmt_fetch($query6)){

   $pdf->writeHTMLCell(20, 5, 15, '', 'Resultado, HR%' ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(32.5, 5, 35, '', $n1 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 67.5, '', $n2 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 100, '', $n3 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 132.5, '', $n4 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 5, 165, '', $n5 ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(20, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Promedio, HR%:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 40, '', '' ,1,0, 0, true, 'J', true);

   $pdf->writeHTMLCell(40, 5, 65, '', '<strong>Especificación Cliente ,HR%:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 105, '', '' ,1,0, 0, true, 'J', true);

   $pdf->writeHTMLCell(40, 5, 130, '', '<strong>Cumple</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 170, '', '' ,1,1, 0, true, 'J', true);


}



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
        <td class="linea" align="center"><b>Equipo Utilizado en la Medición</b></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(30, 7.2, 15, '', '<b>Marca</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 45, '', '<b>Modelo</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 75, '', '<b>N° Serie</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 105, '', '<b>Certificado de Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 135, '', '<b>Última Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 165, '', '<b>Trazabilidad</b>  ' ,1,1, 0, true, 'C', true);

$equipo_prueba_4 = "Prueba de temperatura y humedad relativa";


$query7 = mysqli_prepare($connect,"SELECT a.marca_equipo, a.modelo_equipo, a.n_serie_equipo, b.numero_certificado, b.fecha_emision  FROM equipos_cercal as a,  certificado_equipo as b,  equipos_mediciones as c WHERE a.id_equipo_cercal = b.id_equipo_cercal AND c.id_equipo = a.id_equipo_cercal AND c.id_asignado = ? AND c.tipo_prueba = ? ");
mysqli_stmt_bind_param($query7, 'is', $id_asignado, $equipo_prueba_4);
mysqli_stmt_execute($query7);
mysqli_stmt_store_result($query7);
mysqli_stmt_bind_result($query7, $marca, $modelo, $n_serie, $certificado, $fecha_emision);

while($row = mysqli_stmt_fetch($query7)){

   $pdf->writeHTMLCell(30, 7.2, 15, '', $marca ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 45, '', $modelo ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 75, '', $n_serie ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 105, '', $certificado ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 135, '', $fecha_emision ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 165, '', 'Trazabilidad' ,1,1, 0, true, 'C', true);

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
        <td class="linea" align="center"><b>Medición de iluminación y ruido</b></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(30, 5, 15, '', '<strong>Método de ensayo:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(50, 5, 45, '', 'UNE-EN ISO 14.644-3:2006,Punto 4.2.3' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(25, 5, 105, '', '<strong>N° de muestras:</strong>',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(15, 5, 130, '', '25' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(40, 5, 145, '', '<strong>Altura toma de Muestras:</strong>',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 185, '', '25' ,1,1  , 0, true, 'J', true);

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
        <td class="linea" align="center"><b>Imagen de la Medición</b></td>
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
        <td class="linea" align="center"><b>Prueba de Medición de luminancia, Lux</b></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$pdf->writeHTMLCell(20, 5, 15, '', '<strong>Muestras</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5, 35, '', '<strong>N°1</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5, 67.5, '', '<strong>N°2</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5,100, '', '<strong>N°3</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5,132.5, '', '<strong>N°4</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(30, 5, 165, '', '<strong>N°5</strong>' ,1,1, 0, true, 'J', true);

$query6 = mysqli_prepare($connect,"SELECT n1, n2, n3, n4, n5, promedio, cumple, categoria FROM salas_limpias_prueba_4 WHERE id_asignado = ? AND categoria = 3");
mysqli_stmt_bind_param($query6, 'i', $id_asignado);
mysqli_stmt_execute($query6);
mysqli_stmt_store_result($query6);
mysqli_stmt_bind_result($query6, $n1, $n2, $n3, $n4, $n5, $promedio, $cumple, $categoria);

while($row = mysqli_stmt_fetch($query6)){

   $pdf->writeHTMLCell(20, 5, 15, '', 'Resultado, Lux ' ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(32.5, 5, 35, '', $n1 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 67.5, '', $n2 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 100, '', $n3 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 132.5, '', $n4 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 5, 165, '', $n5 ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(20, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Promedio, Lux:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 40, '', '' ,1,0, 0, true, 'J', true);

   $pdf->writeHTMLCell(40, 5, 65, '', '<strong>Especificación Cliente ,Lux:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 105, '', '' ,1,0, 0, true, 'J', true);

   $pdf->writeHTMLCell(40, 5, 130, '', '<strong>Cumple</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 170, '', '' ,1,1, 0, true, 'J', true);


}


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
        <td class="linea" align="center"><b>Prueba de Medición de Ruido, dBA</b></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$pdf->writeHTMLCell(20, 5, 15, '', '<strong>Muestras</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5, 35, '', '<strong>N°1</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5, 67.5, '', '<strong>N°2</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5,100, '', '<strong>N°3</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5,132.5, '', '<strong>N°4</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(30, 5, 165, '', '<strong>N°5</strong>' ,1,1, 0, true, 'J', true);

$query6 = mysqli_prepare($connect,"SELECT n1, n2, n3, n4, n5, promedio, cumple, categoria FROM salas_limpias_prueba_4 WHERE id_asignado = ? AND categoria = 4");
mysqli_stmt_bind_param($query6, 'i', $id_asignado);
mysqli_stmt_execute($query6);
mysqli_stmt_store_result($query6);
mysqli_stmt_bind_result($query6, $n1, $n2, $n3, $n4, $n5, $promedio, $cumple, $categoria);

while($row = mysqli_stmt_fetch($query6)){

   $pdf->writeHTMLCell(20, 5, 15, '', 'Resultado, dBA' ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(32.5, 5, 35, '', $n1 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 67.5, '', $n2 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 100, '', $n3 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 132.5, '', $n4 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 5, 165, '', $n5 ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(20, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Promedio, dBA:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 40, '', '' ,1,0, 0, true, 'J', true);

   $pdf->writeHTMLCell(40, 5, 65, '', '<strong>Especificación Cliente ,dBA:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 105, '', '' ,1,0, 0, true, 'J', true);

   $pdf->writeHTMLCell(40, 5, 130, '', '<strong>Cumple</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 170, '', '' ,1,1, 0, true, 'J', true);


}



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
        <td class="linea" align="center"><b>Equipo Utilizado en la Medición</b></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(30, 7.2, 15, '', '<b>Marca</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 45, '', '<b>Modelo</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 75, '', '<b>N° Serie</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 105, '', '<b>Certificado de Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 135, '', '<b>Última Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 165, '', '<b>Trazabilidad</b>  ' ,1,1, 0, true, 'C', true);

$equipo_prueba_5 = "Prueba Medición de ruido";
$equipo_prueba_6 = "Prueba nivel de iluminación";


$query7 = mysqli_prepare($connect,"SELECT a.marca_equipo, a.modelo_equipo, a.n_serie_equipo, b.numero_certificado, b.fecha_emision  FROM equipos_cercal as a,  certificado_equipo as b,  equipos_mediciones as c WHERE a.id_equipo_cercal = b.id_equipo_cercal AND c.id_equipo = a.id_equipo_cercal AND c.id_asignado = ? AND c.tipo_prueba = ? OR c.tipo_prueba = ?");
mysqli_stmt_bind_param($query7, 'is', $id_asignado, $equipo_prueba_5, $equipo_prueba_6);
mysqli_stmt_execute($query7);
mysqli_stmt_store_result($query7);
mysqli_stmt_bind_result($query7, $marca, $modelo, $n_serie, $certificado, $fecha_emision);

while($row = mysqli_stmt_fetch($query7)){

   $pdf->writeHTMLCell(30, 7.2, 15, '', $marca ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 45, '', $modelo ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 75, '', $n_serie ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 105, '', $certificado ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 135, '', $fecha_emision ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 165, '', 'Trazabilidad' ,1,1, 0, true, 'C', true);

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
        <td class="linea" align="center"><b>MEDICIÓN DE CAUDAL DE AIRE, Cálculo de Renovación Aire/Hora</b></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(30, 5, 15, '', '<strong>Método de ensayo:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(50, 5, 45, '', 'UNE-EN ISO 14.644-3:2006,Punto 4.2.3' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(40, 5, 105, '', '<strong>N° de Rejillas de Inyección:</strong>',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 145, '', '25' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(40, 5, 155, '', '<strong>N° de Extractores:</strong>',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 185, '', '25' ,1,1  , 0, true, 'J', true);








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
        <td class="linea" align="center"><b>Imagen de la Medición</b></td>
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
        <td class="linea" align="center"><b>Resultado - Prueba de Medición de Caudal de Inyección de Aire, m³/h</b></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$pdf->writeHTMLCell(30, 5, 15, '', 'Inyección (m³/h)' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 45, '', 'N°1' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5,55, '', 'N°2' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 65, '', 'N°3' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 75, '', 'N°4' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 85, '', 'N°5' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 95, '', 'N°6' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5,105, '', 'N°7' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 115, '', 'N°8' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 125, '', 'N°9' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 135, '', 'N°10' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 145, '', 'N°11' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 155, '', 'N°12' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 165, '', 'N°13' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 175, '', 'N°14' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 185, '', 'N°15' ,1,1, 0, true, 'J', true);


$nombres_p5 = array('N°1','N°2','N°3','Promedio');
$contador = 0;


$query8 = mysqli_prepare($connect,"SELECT n1,n2,n3,n4,n5,n6,n7,n8,n9,n10,n11,n12,n13,n14,n15 FROM salas_limpias_prueba_5 WHERE id_asignado = ? AND categoria = 1");
mysqli_stmt_bind_param($query8, 'i', $id_asignado);
mysqli_stmt_execute($query8);
mysqli_stmt_store_result($query8);
mysqli_stmt_bind_result($query8, $n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9,$n10,$n11,$n12,$n13,$n14,$n15);

while($row = mysqli_stmt_fetch($query8)){

   $pdf->writeHTMLCell(30, 5, 15, '', $nombres_p5[$contador] ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 45, '', $n1 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5,55, '', $n2 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 65, '', $n3 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 75, '', $n4 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 85, '', $n5 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 95, '', $n6 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5,105, '', $n7 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 115, '', $n8 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 125, '', $n9 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 135, '', $n10 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 145, '', $n11 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 155, '', $n12 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 165, '', $n13 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 175, '', $n14 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 185, '', $n15 ,1,1, 0, true, 'C', true);
   $contador++;

}



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
        <td class="linea" align="center"><b>Resultado - Prueba de Medición de Caudal de Inyección de Aire, m³/h</b></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false,'');



$pdf->writeHTMLCell(30, 5, 15, '', 'Extracción (m³/h)' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 45, '', 'N°1' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5,55, '', 'N°2' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 65, '', 'N°3' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 75, '', 'N°4' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 85, '', 'N°5' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 95, '', 'N°6' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5,105, '', 'N°7' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 115, '', 'N°8' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 125, '', 'N°9' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 135, '', 'N°10' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 145, '', 'N°11' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 155, '', 'N°12' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 165, '', 'N°13' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 175, '', 'N°14' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 185, '', 'N°15' ,1,1, 0, true, 'J', true);


$nombres_p5 = array('N°1','N°2','N°3','Promedio');
$contador = 0;


$query8 = mysqli_prepare($connect,"SELECT n1,n2,n3,n4,n5,n6,n7,n8,n9,n10,n11,n12,n13,n14,n15 FROM salas_limpias_prueba_5 WHERE id_asignado = ? AND categoria = 2");
mysqli_stmt_bind_param($query8, 'i', $id_asignado);
mysqli_stmt_execute($query8);
mysqli_stmt_store_result($query8);
mysqli_stmt_bind_result($query8, $n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9,$n10,$n11,$n12,$n13,$n14,$n15);

while($row = mysqli_stmt_fetch($query8)){

   $pdf->writeHTMLCell(30, 5, 15, '', $nombres_p5[$contador] ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 45, '', $n1 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5,55, '', $n2 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 65, '', $n3 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 75, '', $n4 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 85, '', $n5 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 95, '', $n6 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5,105, '', $n7 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 115, '', $n8 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 125, '', $n9 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 135, '', $n10 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 145, '', $n11 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 155, '', $n12 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 165, '', $n13 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 175, '', $n14 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 185, '', $n15 ,1,1, 0, true, 'C', true);
   $contador++;

}




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
        <td class="linea" align="center"><b>Resultado Final - Cálculo de Renovación de Aire/Hora
        </b></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false,'');


$pdf->writeHTMLCell(50, 5, 15, '', 'Promedio de Caudal Total Inyectado (m³/h)' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(50, 5, 65, '', 'Renovaciones Aire/Hora Obtenidas' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(50, 5, 115, '', 'Renovaciones Aire/Hora Especificadas' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 165, '', 'Cumple' ,1,1, 0, true, 'C', true);

$query9 = mysqli_prepare($connect,"SELECT medicion_1, medicion_2, medicion_3, medicion_4 FROM salas_limpias_prueba_6 WHERE id_asignado = ?");
mysqli_stmt_bind_param($query9, 'i', $id_asignado);
mysqli_stmt_execute($query9);
mysqli_stmt_store_result($query9);
mysqli_stmt_bind_result($query9, $medicion_uno, $medicion_dos, $medicion_tres, $medicion_cuatro);
echo mysqli_stmt_error($query9);

while($row = mysqli_stmt_fetch($query9)){

   $pdf->writeHTMLCell(50, 5, 15, '', $medicion_uno, 1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(50, 5, 65, '', $medicion_dos, 1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(50, 5, 115, '', $medicion_tres, 1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 5, 165, '', $medicion_cuatro, 1,1, 0, true, 'C', true);

}


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
        <td class="linea" align="center"><b>Equipo Utilizado en la Medición</b></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(30, 7.2, 15, '', '<b>Marca</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 45, '', '<b>Modelo</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 75, '', '<b>N° Serie</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 105, '', '<b>Certificado de Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 135, '', '<b>Última Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 165, '', '<b>Trazabilidad</b>  ' ,1,1, 0, true, 'C', true);

$equipo_prueba_7 = "Prueba de medición de caudal";


$query7 = mysqli_prepare($connect,"SELECT a.marca_equipo, a.modelo_equipo, a.n_serie_equipo, b.numero_certificado, b.fecha_emision  FROM equipos_cercal as a,  certificado_equipo as b,  equipos_mediciones as c WHERE a.id_equipo_cercal = b.id_equipo_cercal AND c.id_equipo = a.id_equipo_cercal AND c.id_asignado = ? AND c.tipo_prueba = ?");
mysqli_stmt_bind_param($query7, 'is', $id_asignado, $equipo_prueba_7);
mysqli_stmt_execute($query7);
mysqli_stmt_store_result($query7);
mysqli_stmt_bind_result($query7, $marca, $modelo, $n_serie, $certificado, $fecha_emision);

while($row = mysqli_stmt_fetch($query7)){

   $pdf->writeHTMLCell(30, 7.2, 15, '', $marca ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 45, '', $modelo ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 75, '', $n_serie ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 105, '', $certificado ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 135, '', $fecha_emision ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 165, '', 'Trazabilidad' ,1,1, 0, true, 'C', true);

}







$pdf->Output('Inspección salas limpias.pdf', 'I');
?>