<?php 
require('../../../recursos/encabezadopdf.php');
require('../../../config.ini.php');

$pdf->AddPage('A4');

$primera_parte = <<<EOD

<style>
.espacio{
    width:5px;
}
.1{

    width: 105px;
    height: 20px;
    font-size: 12px;
}
.2{
    width: 25px;
    height: 20px;
    font-size: 12px;
    align:center;
}
.3{
    width: 82px;
    height: 20px;
    font-size: 12px;
}
.campo1{
    width: 168px; 
   
}
.campo2{
    width: 70px; 
}
.campo3{
    width: 164px; 
}
.campo4{
    width:273px;
}

</style>

<table border="0" class="">
    <tr>
        <td class="1">informe Referencia:</td>
        <td class="campo1" border="1" align="center">Campo</td> 

        <td class="espacio"></td>
        <td class="espacio"></td>

        <td class="2">OT:</td>
        <td border="1" class="campo2" align="center">Campo</td>

        <td class="espacio"></td>
        <td class="espacio"></td>

        <td class="3">Fecha emición:</td>
        <td border="1" class="campo1" align="center">Campo</td>
    </tr>         
</table>
<br><br>
<table border="0" class="">
    <tr>
        <td class="1">Empresa:</td>
        <td class="campo4" border="1" align="center">Campo</td> 

        <td class="espacio"></td>
        <td class="espacio"></td>

        <td class="3">Solicita:</td>
        <td border="1" class="campo1" align="center">Campo</td>
    </tr>         
</table>

EOD;
$pdf->writeHTML($primera_parte, true, false, false, false, '');



///// crea una nueva pagina
//$pdf->AddPage('A4');



$pdf->writeHTMLCell(30, 5, 15, '', 'Tipo de campana', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 45, '', 'Marca', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 75, '', 'Modelo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 105, '', 'Serie', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 135, '', 'Codigo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 165, '', 'Ubicado en', 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(30, 5, 15, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 45, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 75, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 105, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 135, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 165, '', 'valor', 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(30, 10, 15, '', 'Requisitos Velocidad de aire', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 10, 45, '', '', 1, 0, 0, true, 'C', true);

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
        <td class="linea" align="center"><b> INSPECCION VISUAL</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');

$inspeccion = <<<EOD

<style>
.1{
    width:265px;
    color:red
    height:20px;
}
.2{
    width:50px;
    color:blue;
     height:20px;
}
.espacio{
    width:7px;
}
p{

}
</style>
<table border="0">
   <tr >
        <td class="1" border="1"><p>&nbsp;&nbsp;Equipo en buenas condiciones de operación:</p></td>
        <td class="2" align="center" border="1" >Val</td>

        <td class="espacio"></td>

        <td class="1" border="1"><p>&nbsp;&nbsp;Equipo Límpio y sin elementos externos:</p></td>
        <td class="2" align="center" border="1" >Val</td>
   </tr>
   <tr>
        <td class="1" border="1"><p>&nbsp;&nbsp;Conexión eléctrica en buenas condiciones:</p></td>
        <td class="2" align="center" border="1">Val</td>

        <td class="espacio"></td>

        <td class="1" border="1"><p>&nbsp;&nbsp;Posee identificación:</p></td>
        <td class="2" align="center" border="1">Val</td>
   </tr>
   <tr>
        <td class="1" border="1"><p>&nbsp;&nbsp;Presenta todas sus partes y accesorios:</p></td>
        <td class="2" align="center" border="1">Val</td>
   </tr>

</table>

EOD;
$pdf->writeHTML($inspeccion, true, false, false, false, '');

$linea2 = <<<EOD

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
        <td class="linea" align="center"><b> RESULTADOS - NORMA: UNE-EN ISO 14.644-1:2000 y UNE-EN ISO 14.644-3:2005</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea2, true, false, false, false, '');


///

$array_titulos = array('Velocidad de Aire, 25% Apertura (m/s)', 'Velocidad de Aire, 50% Apertura (m/s)','Velocidad de Aire, 75% Apertura (m/s)','Velocidad de Aire, 100% Apertura (m/s)','Medición de Temperatura','Medición de Humedad Relativa','Presión Sonora Equipo','Presión Sonora Sala','Nivel de Iluminación','Prueba de Humo');



$pdf->writeHTMLCell(60, 5, 15, '', 'Medición', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 75, '', 'Requisito', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 115, '', 'Valor obtenido', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 155, '', 'Veredicto', 1, 1, 0, true, 'C', true);

for ($i=0; $i < 10; $i++) { 
$pdf->writeHTMLCell(60, 5, 15, '', $array_titulos[$i], 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 75, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 115, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 155, '', '-', 1, 1, 0, true, 'C', true);
}

$linea3 = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br>
<table border="1">
   <tr >
        <td class="linea" align="center"><b> CONCLUSIÓN</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea3, true, false, false, false, '');

$condicion = <<<EOD

<style>
.1{
    height:50px;
}
</style>
<table border="1">
   <tr >
        <td class="1" >-</td>
   </tr>
</table>

EOD;
$pdf->writeHTML($condicion, true, false, false, false, '');


$linea4 = <<<EOD

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
        <td class="linea" align="center"></td>  
        <td class="linea" align="center"><b> DURACIÓN DEL CERTIFICADO </b></td>
        <td class="linea" align="center"><b> FECHA DE MEDICIÓN</b></td>
   </tr>
   <tr>
        <td></td>
        <td align="center">-</td>
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

$pdf->AddPage('A4');

//pagina2///////////////////////////////////////////////////

$linea6 = <<<EOD

<style>
.linea{
   height: 10px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br>
<table border="0">
   <tr >
        <td class="linea" align="center"><b> Prueba de Medición de Velocidad de Aire - UNE-EN ISO 14.644-3:2005 </b></td>  
   </tr>
</table>
EOD;
$pdf->writeHTML($linea6, true, false, false, false, '');

$array_titulos2 = array('25%', '50%','75%','100%');

$pdf->writeHTMLCell(30, 5, 15, '', 'Apertura en porcentaje', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 45, '', 'Medición 1 (m/s)', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 70, '', 'Medición 2 (m/s)', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 95, '', 'Medición 3 (m/s)', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 120, '', 'Medición 4 (m/s)', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 145, '', 'Medición 5 (m/s)', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 170, '', 'Medición 6 (m/s)', 1, 1, 0, true, 'C', true);

for ($i=0; $i < 4; $i++) { 
$pdf->writeHTMLCell(30, 5, 15, '', $array_titulos2[$i], 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 45, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 70, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 95, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 120, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 145, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 170, '', '-', 1, 1, 0, true, 'C', true);

}

$linea7 = <<<EOD

<br>

EOD;
$pdf->writeHTML($linea7, true, false, false, false, '');

$pdf->writeHTMLCell(30, 9, 15, '', 'Resumen', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(38, 9, 45, '', 'Medida de los Promedios de Velocidad de aire', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(38, 9, 83, '', 'Máxima velocidad medida', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(37, 9, 121, '', 'Mínima velocidad medida', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(37, 9, 158, '', 'Mínima velocidad aceptada', 1, 1, 0, true, 'C', true);

for ($i=0; $i < 4; $i++) { 

$pdf->writeHTMLCell(30, 5, 15, '', $array_titulos2[$i], 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(38, 5, 45, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(38, 5, 83, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(37, 5, 121, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(37, 5, 158, '', '-', 1, 1, 0, true, 'C', true);

}

$imagen1 = <<<EOD
<style>
.linea{
   height: 290px;

}
</style>

<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center">Imagen</td>  
   </tr>
</table>


EOD;
$pdf->writeHTML($imagen1, true, false, false, false, '');

$linea7 = <<<EOD

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
        <td class="linea" align="center"><b> Equipo Utilizado en la Medición </b></td>  
   </tr>
</table>
EOD;
$pdf->writeHTML($linea7, true, false, false, false, '');

$pdf->writeHTMLCell(30, 8, 15, '', 'Marca', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 45, '', 'Modelo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 75, '', 'No° Serie', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 105, '', 'Certificado de Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 135, '', 'Última Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 165, '', 'Trazabilidad', 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(30, 5, 15, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 45, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 75, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 105, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 135, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 165, '', 'valor', 1, 1, 0, true, 'C', true);


$pdf->AddPage('A4');
//pagina 3 

$linea8 = <<<EOD

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
        <td class="linea" align="center"><b> Prueba de Temperatura y Humedad Relativa - UNE-EN ISO 14.644-3:2005 </b></td>  
   </tr>
</table>
EOD;
$pdf->writeHTML($linea8, true, false, false, false, '');

$array_titulos3 = array('Temperatura,°C', 'Humedad Relativa, %');

$pdf->writeHTMLCell(36, 5, 15, '', 'punto de muestreo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 51, '', '1', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 87, '', '2', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 123, '', '3', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 159, '', 'Promedio', 1, 1, 0, true, 'C', true);

for ($i=0; $i < 2; $i++) { 

    $pdf->writeHTMLCell(36, 5, 15, '', $array_titulos3[$i], 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(36, 5, 51, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(36, 5, 87, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(36, 5, 123, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(36, 5, 159, '', '-', 1, 1, 0, true, 'C', true);   
    
}
$imagen2 = <<<EOD
<style>
.linea{
   height: 200px;

}
</style>

<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center">Imagen</td>  
   </tr>
</table>


EOD;
$pdf->writeHTML($imagen2, true, false, false, false, '');

$linea7 = <<<EOD

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
        <td class="linea" align="center"><b> Prueba de Medición de Presión Sonora - DS N°594 </b></td>  
   </tr>
</table>
EOD;
$pdf->writeHTML($linea7, true, false, false, false, '');

$array_titulos4 = array('Equipo (dB-A Lento)', 'Sala (dB-A Lento)');

$pdf->writeHTMLCell(36, 5, 15, '', 'Punto de muestreo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 51, '', '1', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 87, '', '2', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 123, '', '3', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 159, '', 'Promedio', 1, 1, 0, true, 'C', true);

for ($i=0; $i < 2; $i++) { 

    $pdf->writeHTMLCell(36, 5, 15, '', $array_titulos4[$i], 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(36, 5, 51, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(36, 5, 87, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(36, 5, 123, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(36, 5, 159, '', '-', 1, 1, 0, true, 'C', true);   
    
}

$imagen3 = <<<EOD
<style>
.linea{
   height: 200px;

}
</style>

<br><br>
<table border="1">
   <tr >
        <td class="linea" align="center">Imagen</td>  
   </tr>
</table>


EOD;
$pdf->writeHTML($imagen3, true, false, false, false, '');

$linea8 = <<<EOD

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
        <td class="linea" align="center"><b> Equipos Utilizados en la Medición </b></td>  
   </tr>
</table>
EOD;
$pdf->writeHTML($linea8, true, false, false, false, '');

$pdf->writeHTMLCell(30, 8, 15, '', 'Marca', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 45, '', 'Modelo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 75, '', 'No° Serie', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 105, '', 'Certificado de Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 135, '', 'Última Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 165, '', 'Trazabilidad', 1, 1, 0, true, 'C', true);

$e= 2;
for ($i= 0; $i < $e; $i++) { 

    $pdf->writeHTMLCell(30, 5, 15, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 45, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 75, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 105, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 135, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 165, '', '-', 1, 1, 0, true, 'C', true); 
    
}

$pdf->AddPage('A4');
/// pagina 4
$linea8 = <<<EOD

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
        <td class="linea" align="center"><b>Prueba de Humo - ANSI/ASHRAE 110-1995 Method of Testing Performance of Laboratory Fume Hoods</b></td>  
   </tr>
</table>
EOD;

$pdf->writeHTML($linea8, true, false, false, false, '');

$linea9 = <<<EOD

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
        <td class="linea" align="center"><b> Prueba N°1: Contención de Aire Externo</b></td>  
   </tr>
</table>
EOD;

$pdf->writeHTML($linea9, true, false, false, false, '');

$array_titulos5 = array('Ubicación de Prueba', 'Dirección del Flujo Especificado','Visualización de Flujo Reverso','Visualización de Vórtices','Cumple Especificaciones');

$pdf->writeHTMLCell(60, 5, 15, '', 'Marca', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 75, '', 'Modelo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 135, '', 'Trazabilidad', 1, 1, 0, true, 'C', true);

for ($i=0; $i < 5; $i++) { 


if ($i <4) {
  
$pdf->writeHTMLCell(60, 5, 15, '', $array_titulos5[$i], 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 75, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 135, '', '-', 1, 1, 0, true, 'C', true);
}elseif ($i > 1) {
  $pdf->writeHTMLCell(60, 5, 15, '', $array_titulos5[$i], 1, 0, 0, true, 'C', true);
  $pdf->writeHTMLCell(120, 5, 75, '', '-', 1, 1, 0, true, 'C', true);
}
}

$linea10 = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><b> Prueba N°2: Unidireccionalidad</b></td>  
   </tr>
</table>
EOD;

$pdf->writeHTML($linea10, true, false, false, false, '');

$pdf->writeHTMLCell(60, 5, 15, '', 'Marca', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 75, '', 'Modelo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 135, '', 'Trazabilidad', 1, 1, 0, true, 'C', true);

$array_titulos6 = array('Ubicación de Prueba', 'Visualización de Flujo Reverso','Visualización de Puntos Muertos','Cumple Especificaciones','Cumple Prueba de Humo');
for ($i=0; $i < 5; $i++) { 


if ($i < 3) {

    $pdf->writeHTMLCell(60, 5, 15, '', $array_titulos6[$i], 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(60, 5, 75, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(60, 5, 135, '', '-', 1, 1, 0, true, 'C', true);
    
    
}elseif($i > 2){
    $pdf->writeHTMLCell(60, 5, 15, '', $array_titulos6[$i], 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(120, 5, 75, '', '-', 1, 1, 0, true, 'C', true);

    }
}

$linea11 = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><b>Prueba de Medición de Nivel de Iluminación - DS N°594</b></td>  
   </tr>
</table>
EOD;

$pdf->writeHTML($linea11, true, false, false, false, '');


$pdf->writeHTMLCell(27, 5, 15, '', 'Punto de muestro', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 42, '', '1', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 67, '', '2', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 92, '', '3', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 117, '', '4', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 142, '', '5', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(28, 5, 167, '', 'Promedio', 1, 1, 0, true, 'C', true);


$pdf->writeHTMLCell(27, 5, 15, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 42, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 67, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 92, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 117, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 142, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(28, 5, 167, '', '-', 1, 1, 0, true, 'C', true);





$imagen4 = <<<EOD
<style>
.linea{
   height: 150px;

}
</style>

<br><br>
<table border="1">
   <tr >
        <td class="linea" align="center">Imagen</td>  
   </tr>
</table>

EOD;
$pdf->writeHTML($imagen4, true, false, false, false, '');


$linea12 = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
</style>
<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><b>Equipos Utilizados en la Medición</b></td>  
   </tr>
</table>
EOD;

$pdf->writeHTML($linea12, true, false, false, false, '');


$pdf->writeHTMLCell(30, 8, 15, '', 'Marca', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 45, '', 'Modelo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 75, '', 'No° Serie', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 105, '', 'Certificado de Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 135, '', 'Última Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 165, '', 'Trazabilidad', 1, 1, 0, true, 'C', true);

$e= 1;
for ($i= 0; $i < $e; $i++) { 

    $pdf->writeHTMLCell(30, 5, 15, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 45, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 75, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 105, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 135, '', '-', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 165, '', '-', 1, 1, 0, true, 'C', true); 
    
}

$pdf->AddPage('A4');
/// pagina 5

$linea13 = <<<EOD

<style>
.linea{
   height: 14 px;
   color:#fff;
   background-color: #ababab;
}
.imagen{
    height:200px
}
</style>
<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><b>Imagen Frontal</b></td>  
        <td class="linea" align="center"><b>Imagen de Placa</b></td>  
   </tr>
   <tr>
        <td class="imagen" border="0"></td>
        <td class="imagen" border="0"></td>
   </tr>
</table>
<br>
<br>
<table>
    <tr>
        <td class="linea" align="center"><b>Imagen Frontal</b></td> 
    </tr>    
    <tr>
        <td class="imagen" border="0"></td>
    </tr>
</table>
EOD;



$pdf->writeHTML($linea13, true, false, false, false, '');











//for($i = 0; $i <= 50; $i++){
// Largo o Ancho // Alto   //  posición
//    $pdf->writeHTMLCell(20, 5, 15, '', 'Descripción', 1, 0, 0, true, 'C', true);
  //  $pdf->writeHTMLCell(20, 5, 35, '', 'Marca', 1, 0, 0, true, 'C', true);
    //$pdf->writeHTMLCell(20, 5, 55, '', 'Modelo', 1, 0, 0, true, 'C', true);
    //$pdf->writeHTMLCell(60, 5, 75, '', $array_titulos[$i], 1, 1, 0, true, 'C', true);

    //if($i == 41){
        //$pdf->AddPage('A4');
      //  $pdf->writeHTMLCell(20, 5, 15, '', 'Descripción', 1, 0, 0, true, 'C', true);
        //$pdf->writeHTMLCell(20, 5, 35, '', 'Marca', 1, 0, 0, true, 'C', true);
        //$pdf->writeHTMLCell(20, 5, 55, '', 'Modelo', 1, 0, 0, true, 'C', true);
        //$pdf->writeHTMLCell(60, 5, 75, '', 'dato', 1, 1, 0, true, 'C', true);
    //}
//}
/*

$pdf->writeHTMLCell(35, 5, 30, '', 'N° de identificación', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(55, 5, 65, '', 'Ubicación', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(75, 5, 120, '', 'N° de serie', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(66, 5, 215, '', 'N° Certificado de Calibración', 1, 1, 0, true, 'C', true);*/




$pdf->Output('Algo.pdf', 'I');

?>