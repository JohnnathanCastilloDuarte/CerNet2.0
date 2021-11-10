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



$pdf->writeHTMLCell(30, 5, 15, '', 'Descripción', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 45, '', 'Marca', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 75, '', 'Modelo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 105, '', 'Serie', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 135, '', 'Lugar', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 165, '', 'Ubicado en', 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(30, 5, 15, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 45, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 75, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 105, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 135, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 165, '', 'valor', 1, 1, 0, true, 'C', true);

$espacio = <<<EOD
<br>

EOD;

$pdf->writeHTML($espacio, true, false, false, false, '');


$pdf->writeHTMLCell(45, 5, 15, '', 'Tipo de Filtro y Dimensiones', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(45, 5, 60, '', 'Cantidad de Filtros HEPA', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(45, 5, 105, '', 'Límite de Penetración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(45, 5, 150, '', 'Eficiencia', 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(45, 5, 15, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(45, 5, 60, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(45, 5, 105, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(45, 5, 150, '', '-', 1, 0, 0, true, 'C', true);


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
        <td class="linea" align="center"><b> RESULTADO DE MEDICIONES - NORMA: UNE-EN ISO 14.644-3:2005</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea, true, false, false, false, '');


$pdf->writeHTMLCell(60, 5, 15, '', 'Medición', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 75, '', 'Requisito', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 115, '', 'Valor Obtenido', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 155, '', 'Veredicto', 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 5, 15, '', 'Prueba de Integridad de Filtro N°1', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 75, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 115, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 155, '', '-', 1, 1 , 0, true, 'C', true);




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
<br>
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
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}

</style>
<br>
<table border="0">
   <tr >
        <td class="linea" align="center"><b> INSPECCIÓN VISUAL</b></td>
   </tr>
</table>
<br><br>
<table border="0">
   <tr >
        <td class="1" border="1"><p>&nbsp;&nbsp;Equipo en buenas condiciones de operación:</p></td>
        <td class="2" align="center" border="1" >Val</td>

        <td class="espacio"></td>

        <td class="1" border="1"><p>&nbsp;&nbsp;Filtro presenta reparaciones:</p></td>
        <td class="2" align="center" border="1" >Val</td>
   </tr>
   <tr>
        <td class="1" border="1"><p>&nbsp;&nbsp;Filtro presenta rotura:</p></td>
        <td class="2" align="center" border="1">Val</td>

        <td class="espacio"></td>

        <td class="1" border="1"><p>&nbsp;&nbsp;Filtro presenta rotura en sellos perimetrales:</p></td>
        <td class="2" align="center" border="1">Val</td>
   </tr>
   <tr>
        <td class="1" border="1"><p>&nbsp;&nbsp;Filtros instalados correctamente:</p></td>
        <td class="2" align="center" border="1">Val</td>

        <td class="espacio"></td>

         <td class="1" border="1"><p>&nbsp;&nbsp;Presenta colmatación:</p></td>
        <td class="2" align="center" border="1">Val</td>


   </tr>

</table>
EOD;
$pdf->writeHTML($inspeccion, true, false, false, false, '');

$linea6 = <<<EOD

<style>
.linea{
   height: 14px;
   color:#fff;
   background-color: #ababab;
}
.1{
    height:50px;
}
.image{
  width:100%;
  height:180px;
}
</style>
<br>
<table border="">
   <tr >
        <td class="linea" align="center"><b>Prueba de Integridad de Filtros UNE-EN ISO 14.644-3:2005</b></td>  
   </tr>
</table>
<br><br>
<table border="1">
      <tr>
          <td class="1">-</td>
      </tr>
</table>
<br><br>
<table border="1">
      <tr>
          <td class="image">-</td>
      </tr>
</table>
<br><br>
<table border="1">
      <tr>
          <td class="image">-</td>
      </tr>
</table>

EOD;
$pdf->writeHTML($linea6, true, false, false, false, '');


$pdf->AddPage('A4');

$linea7 = <<<EOD

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
        <td class="linea" align="center"><b>DETALLE DE MEDICIONES</b></td>
   </tr>
</table>

EOD;
$pdf->writeHTML($linea7, true, false, false, false, '');




$pdf->writeHTMLCell(20, 5, 15, '', 'N° de Filtro', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 35, '', 'Zona A', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 55, '', 'Zona A', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 75, '', 'Zona B', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 95, '', 'Zona B', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 115, '', 'Zona C', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 135, '', 'Zona C', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 155, '', 'Zona D', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 175, '', 'Zona D', 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(20, 5, 15, '', 'Filtro N°1', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 35, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 55, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 75, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 95, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 115, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 135, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 155, '', '-', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 175, '', '-', 1, 1, 0, true, 'C', true);









$linea7 = <<<EOD

<style>
.linea{
   height: 344px;
   color:#fff;
   
}
</style>
<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"></td>  
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

$pdf->writeHTMLCell(30, 5, 15, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 45, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 75, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 105, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 135, '', 'valor', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 165, '', 'valor', 1, 1, 0, true, 'C', true);












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