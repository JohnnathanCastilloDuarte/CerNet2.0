<?php 
require('../../../../recursos/itemencabezadopdf.php');
require('../../../../config.ini.php');

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




$pdf->Output('Algo.pdf', 'I');

?>