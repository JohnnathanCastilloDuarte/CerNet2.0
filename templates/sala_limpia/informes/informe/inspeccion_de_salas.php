<?php 
require('../../../../recursos/itemencabezadopdf.php');
require('../../../../config.ini.php');


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
        <td class="linea" align="center"><h2><b> RRESULTADO DE MEDICIONES</b></h2></td>
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




/*
$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b> CERTIFICADO INSPECCIÓN DE SALA LIMPIA</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b> RESULTADO DE MEDICIONES</b></td>
   </tr>
</table>
<br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Prueba de Partículas en Suspensión</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');


$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Prueba de Renovación de Aire</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');
$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Prueba de Difencial de Presión</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');
$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Prueba de Temperatura y Humedad Relativa</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');
$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Prueba de Iluminación y Ruido</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');
$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Conclusión</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');


$linea4 = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br>
<table border="1">
   <tr >
        <td class="linea" align="center" colspan="2"><b> DURACIÓN DEL CERTIFICADO </b></td>

        <td class="linea" align="center"><b> FECHA DE MEDICIÓN</b></td>
   </tr>
   <tr>
        <td align="center" colspan="2" >-</td>
        <td align="center">-</td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea4, true, false, false, false, '');

$linea5 = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br>
<table border="0">
   <tr >
        <td class="linea" align="center"><b> RESPONSABLE </b></td>  
        <td class="linea" align="center"><b> CODIGO QR DE VERIFICACIÓN </b></td>
        <td class="linea" align="center"><b> FIRMA </b></td>
   </tr>
   <tr>
        <td align="center">-</td>
        <td align="center">-</td>
        <td align="center">-</td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea5, true, false, false, false, '');


///// crea una nueva pagina
$pdf->AddPage('A4');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>MEDICIÓN DE PARTÍCULAS EN SUSPENSIÓN</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Imagen de la Medición y Registro de Conteo de Partículas</b></td>
   </tr>
</table>
<br><br>
<table border="1">
   <tr >
        <td class="" style="width:100%; height:280px;">
    </td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Cálculo de Resultados - Medidos en partículas / m³ - Requisito de Partícula 0,5 µm: 3520000 / 5,0 µm: 29300</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Cálculo de Resultados para Informe Técnico N°45 de la OMS - Medidos en partículas / m³ - Requisito de Partícula 0,5 µm:3.520.000 / 5,0 µm: 29.000</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Equipo Utilizado en la Medición</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');


$pdf->AddPage('A4');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>MEDICIÓN DE PRESIÓN DIFERENCIAL</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');


$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Imagen de la Medición</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');


$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Medición - Prueba de Presión Diferencial, Pa</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');


$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Equipo Utilizado en la Medición</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');


$pdf->AddPage('A4');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>MEDICIÓN DE TEMPERATURA Y HUMEDAD</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Imagen de la Medición</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Prueba de Medición de Temperatura °C
</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Prueba de Medición de Humedad Relativa, HR%</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Equipo Utilizado en la Medición</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->AddPage('A4');


$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>MEDICIÓN DE ILUMINACIÓN Y RUIDO
</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Imagen de la Medición</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Prueba de Medición de luminancia, Lux
</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Prueba de Medición de Ruido, dBA</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Equipo Utilizado en la Medición</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->AddPage('A4');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>MEDICIÓN DE CAUDAL DE AIRE, Cálculo de Renovación Aire/Hora</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Imagen de la Medición</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Resultado - Prueba de Medición de Caudal de Inyección de Aire, m³/h</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Resultado - Prueba de Medición de Caudal de Extracción de Aire, m³/h</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');
$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Resultado Final - Cálculo de Renovación de Aire/Hora</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');
$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br><br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b>Equipo Utilizado en la Medición</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');


*/

$pdf->Output('Inspección salas limpias.pdf', 'I');

?>