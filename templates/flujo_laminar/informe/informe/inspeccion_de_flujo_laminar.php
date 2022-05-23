<?php 
require('../../../../recursos/itemencabezadopdf.php');
require('../../../../config.ini.php');


$pdf->AddPage('A4');


$clave = $_GET['clave'];

$id_asignado = substr($clave, 97);


//informacion del item
$consulta_informacion_informe = mysqli_prepare($connect,"SELECT a.descripcion, a.nombre, b.cantidad_filtro, b.direccion, b.ubicacion_interna, b.area_interna, b.tipo_cabina, b.marca, b.modelo, b.serie, b.codigo, b.tipo_dimenciones, b.limite_penetracion, b.eficiencia, b.fecha_registro
  FROM item as a, item_flujo_laminar as b, item_asignado as c 
  WHERE c.id_asignado = ? AND c.id_item = b.id_item AND b.id_item = c.id_item AND a.id_tipo = 13");


mysqli_stmt_bind_param($consulta_informacion_informe, 'i', $id_asignado);
mysqli_stmt_execute($consulta_informacion_informe);
mysqli_stmt_store_result($consulta_informacion_informe);
mysqli_stmt_bind_result($consulta_informacion_informe, $descripcion, $nombre_item, $cantidad_filtro, $direccion, $ubicacion_interna, $area_interna, $tipo_cabina, $marca, $modelo, $serie, $codigo, $tipo_dimenciones, $limite_penetracion, $eficiencia, $fecha_registro);
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

$inspeccion_visual = mysqli_prepare($connect,"SELECT conclusion, solicitante, nombre_informe, usuario_responsable,DATE_FORMAT(fecha_registro, '%m/%d/%Y')
  FROM informe_flujo_laminar
  WHERE id_asignado = ? ");

mysqli_stmt_bind_param($inspeccion_visual, 'i', $id_asignado);
mysqli_stmt_execute($inspeccion_visual);
mysqli_stmt_store_result($inspeccion_visual);
mysqli_stmt_bind_result($inspeccion_visual, $conclusion, $solicitante, $nombre_informe, $usuario_responsable, $fecha_registro_informe);
mysqli_stmt_fetch($inspeccion_visual);


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


   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Informe ref:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(50, 5, 40, '', $nombre_informe ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(15, 5, 90, '', '<strong>OT N°:</strong>',0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(13, 5, 105, '', $num_ot ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(35, 5, 140, '', '<strong>Fecha de Emisión:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 175, '', $fecha_registro_informe ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Empresa:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(75, 5, 40, '', $nombre_empresa ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 140, '', '<strong>Solicita:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(35, 5, 160, '', $solicitante ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Dirección:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(155, 5, 40, '', $direccion ,1,0, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

//información del equipo
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
$pdf->writeHTML($info_equipo, true, false, false, false, '');


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
        <td class="linea"><h2>INSPECCION VISUAL</h2></td>
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
    color:black;
     height:20px;
}
.espacio{
    width:7px;
}
p{
  color:black;
  
}
</style>
<table border="0">
   <tr >
        <td class="1" border="1"><p>&nbsp;&nbsp;Equipo en buenas condiciones de operación:</p></td>
        <td class="2" align="center" border="1" >$insp_1</td>

        <td class="espacio"></td>

        <td class="1" border="1"><p>&nbsp;&nbsp;Equipo Límpio y sin elementos externos:</p></td>
        <td class="2" align="center" border="1" >$insp_2</td>
   </tr>
   <tr>
        <td class="1" border="1"><p>&nbsp;&nbsp;Conexión eléctrica en buenas condiciones:</p></td>
        <td class="2" align="center" border="1">$insp_3</td>

        <td class="espacio"></td>

        <td class="1" border="1"><p>&nbsp;&nbsp;Posee identificación:</p></td>
        <td class="2" align="center" border="1">$insp_4</td>
   </tr>
   <tr>
        <td class="1" border="1"><p>&nbsp;&nbsp;Presenta Filtros en buenas condiciones:</p></td>
        <td class="2" align="center" border="1">$insp_5</td>

        <td class="espacio"></td>

        <td class="1" border="1"><p>&nbsp;&nbsp;Presenta todas sus partes y accesorios:</p></td>
        <td class="2" align="center" border="1">$insp_6</td>
   </tr>

</table>

EOD;
$pdf->writeHTML($inspeccion, true, false, false, false, '');


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
        <td class="linea" ><h2>RESULTADOS - NORMA: UNE-EN ISO 14.644-1:2015 y NSF/ANSI 49:2015</h2></td>
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



$pdf->writeHTMLCell(60, 5, 15, '', 'Medición', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 75, '', 'Requisito', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 115, '', 'Valor obtenido', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 155, '', 'Veredicto', 1, 1, 0, true, 'C', true);


$i=0;
  while ($row = mysqli_stmt_fetch($queryPrueba1)) {

$pdf->writeHTMLCell(60, 5, 15, '', $array_titulos[$i], 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 75, '', $requisito, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 115, '', $valor_obtenido, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 155, '', $veredicto, 1, 1, 0, true, 'C', true);

  $i++;

}
$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Conclusión</h2></td>
   </tr>
</table>
<br><br>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$pdf->writeHTMLCell(180, 5, 15, '', $conclusion, 0, 1, 0, true, 'J', true);

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
        <td class="linea" align="center"><h2><b>Duración de Certificado</b></h2></td>
        <td class="linea" align="center"><h2><b>Fecha de Medición</b></h2></td>
   </tr>
   <br>
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
   color:white;
   background-color: #1a53ff;
}
</style>
<br><br><br><br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>PRUEBA DE INTEGRIDAD DE FILTROS</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


    $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Informe ref:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(50, 5, 40, '', $nombre_informe ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(15, 5, 90, '', '<strong>OT N°:</strong>',0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(13, 5, 105, '', $num_ot ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(35, 5, 140, '', '<strong>Fecha de Emisión:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 175, '', $fecha_registro_informe ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Empresa:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(75, 5, 40, '', $nombre_empresa ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 140, '', '<strong>Solicita:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(35, 5, 160, '', $solicitante ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Dirección:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(155, 5, 40, '', $direccion ,1,0, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

//información del equipo
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
$pdf->writeHTML($info_equipo, true, false, false, false, '');


$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Integridad de Filtros UNE-EN ISO 14.644-3:2015</h2></td>
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
<table border="0">
   <tr>
        <td></td>
        <td align="center"><img src="../../$url $nombre">../../$url $nombre </td>
        <td></td>
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


$pdf->writeHTMLCell(20, 7, 15, '', '<b>Filtros inferiores</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 7, 35, '', '<b>Zona A</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 7, 55, '', '<b>Zona AA</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 7, 75, '', '<b>Zona B</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 7, 95, '', '<b>Zona BB</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 7, 115, '', '<b>Zona C</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 7, 135, '', '<b>Zona CC</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 7, 155, '', '<b>Zona D</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 7, 175, '', '<b>Zona DD</b>' ,1,1, 0, true, 'C', true);


//for ($i=1; $i < 3; $i++) { 
while ($row = mysqli_stmt_fetch($queryPrueba2)) {
$pdf->writeHTMLCell(20, 5, 15, '', 'Filtro Nº'.$i ,1,0, 0, true, 'C', true);
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

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<br><br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Equipo Utilizado en la Medición</h2></td>
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


$pdf->writeHTMLCell(30, 7, 15, '', 'Marca', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 45, '', 'Modelo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 75, '', 'No° Serie', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 105, '', 'Certificado de Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 135, '', 'Última Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 165, '', 'Trazabilidad', 1, 1, 0, true, 'C', true);

while ($row = mysqli_stmt_fetch($equipos_flujo1)) {

$pdf->writeHTMLCell(30, 5, 15, '', $marca1, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 45, '', $modelo1, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 75, '', $n_serie1, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 105, '', $certificado_calibracion1, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 135, '', $ultima_calibracion1, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 165, '', '-', 1, 1, 0, true, 'C', true);
}

$pdf->AddPage('A4');
//pagina 3 

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>PRUEBA DE MEDICION DE VELOCIDAD DE AIRE</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



     $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Informe ref:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(50, 5, 40, '', $nombre_informe ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(15, 5, 90, '', '<strong>OT N°:</strong>',0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(13, 5, 105, '', $num_ot ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(35, 5, 140, '', '<strong>Fecha de Emisión:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 175, '', $fecha_registro_informe ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Empresa:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(75, 5, 40, '', $nombre_empresa ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 140, '', '<strong>Solicita:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(35, 5, 160, '', $solicitante ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Dirección:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(155, 5, 40, '', $direccion ,1,0, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

//información del equipo
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
               <td>$tipo_cabina</td>
               <td>$tipo_dimenciones</td>
               <td>$limite_penetracion</td>
               <td>$eficiencia</td>
            </tr>
         </table>    
      </tr>
      <br>
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
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Medición de Entrada de Aire - NSF/ANSI 49:2008</h2></td>
   </tr>
</table>
<br><br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Velocidad de Aire (m/s)
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



 $pdf->writeHTMLCell(26, 5, 15, '', 'N° de Filtro', 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(25, 5, 41, '', 'Medición 1(m/s)', 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(25, 5, 66, '', 'Medición 2(m/s)', 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(25, 5, 91, '', 'Medición 3(m/s)', 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(26, 5, 116, '', 'Medición 4(m/s)', 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(26, 5, 142, '', 'Medición 5(m/s)', 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(27, 5, 168, '', 'Medición 6(m/s)', 1, 1, 0, true, 'C', true); 

 $i2 = 1;
 while ($row = mysqli_stmt_fetch($queryPrueba1)) {
 $pdf->writeHTMLCell(26, 5, 15, '', 'N° de Filtro'.$i2, 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(25, 5, 41, '', $medicion_1, 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(25, 5, 66, '', $medicion_2, 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(25, 5, 91, '', $medicion_3, 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(26, 5, 116, '', $medicion_4, 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(26, 5, 142, '', $medicion_5, 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(27, 5, 168, '', $medicion_6, 1, 1, 0, true, 'C', true);

 $i2++;
}
$txt = <<<EOD
<br>

EOD;
$pdf->writeHTML($txt, true, false, false, false, '');
 
 $pdf->writeHTMLCell(26, 5, 15, '', '', 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(55, 5, 41, '', 'Medida de los Promedios de Velocidad de aire', 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(32, 5, 96, '', 'Máxima velocidad medida', 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(32, 5, 128, '', 'Mínima velocidad medida', 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(35, 5, 160, '', 'Mínima velocidad aceptada', 1, 1, 0, true, 'C', true);

 $pdf->writeHTMLCell(26, 5, 15, '', 'Resumen', 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(55, 5, 41, '', '', 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(32, 5, 96, '', '', 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(32, 5, 128, '', '', 1, 0, 0, true, 'C', true);
 $pdf->writeHTMLCell(35, 5, 160, '', '', 1, 1, 0, true, 'C', true);

$imagen1 = <<<EOD
<style>
.linea{
  

}
</style>

<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center">imagen</td>  
   </tr>
</table>

EOD;
$pdf->writeHTML($imagen1, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Equipos Utilizados en la Medición</h2></td>
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

$pdf->writeHTMLCell(30, 7, 15, '', 'Marca', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 45, '', 'Modelo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 75, '', 'No° Serie', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 105, '', 'Certificado de Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 135, '', 'Última Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 165, '', 'Trazabilidad', 1, 1, 0, true, 'C', true);

$e= 2;

while ($row = mysqli_stmt_fetch($equipos_flujo2)) {

    $pdf->writeHTMLCell(30, 7, 15, '', $marca2, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 7, 45, '', $modelo2, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 7, 75, '', $n_serie2, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 7, 105, '', $certificado_calibracion2, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 7, 135, '', $ultima_calibracion2, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 7, 165, '', '-', 1, 1, 0, true, 'C', true); 
}


$pdf->AddPage('A4');
/// pagina 4
$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>PRUEBA DE MEDICION DE CONTEO DE PARTICULAS UNE-EN ISO 14.644-3:2015</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

     $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Informe ref:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(50, 5, 40, '', $nombre_informe ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(15, 5, 90, '', '<strong>OT N°:</strong>',0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(13, 5, 105, '', $num_ot ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(35, 5, 140, '', '<strong>Fecha de Emisión:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 175, '', $fecha_registro_informe ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Empresa:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(75, 5, 40, '', $nombre_empresa ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 140, '', '<strong>Solicita:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(35, 5, 160, '', $solicitante ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Dirección:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(155, 5, 40, '', $direccion ,1,0, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

//información del equipo
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
     
      </tr>
      <br>
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
        <td class="linea" align="center"><h2>Resultados según norma UNE-EN ISO 14.644-1:2015 y NSF/ANSI 49:2015</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$pdf->writeHTMLCell(36, 5, 16, '', 'Tamaños (µm)', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 52, '', ' Media de los Promedios', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 88, '', 'Desviación Estandar', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 124, '', 'Máximo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 160, '', 'Cumple', 1, 1, 0, true, 'C', true);


$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<br><br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Resultados según informe Técnico N°45 de la OMS</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$pdf->writeHTMLCell(60, 5, 15, '', 'Tamaños (µm)', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 75, '', 'Promedios', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 135, '', 'Cumple', 1, 1, 0, true, 'C', true);





$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Imagen de la Medición y Registro de Conteo de Partículas</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$imagen1 = <<<EOD
<style>
.linea{
  

}
</style>

<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><img src="../../imagenes/img_definidas/luz.jpg">imagen 2</td>  
   </tr>
</table>

EOD;
$pdf->writeHTML($imagen1, true, false, false, false, '');

$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Equipos Utilizados en la Medición</h2></td>
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


$pdf->writeHTMLCell(30, 7, 15, '', 'Marca', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 45, '', 'Modelo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 75, '', 'No° Serie', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 105, '', 'Certificado de Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 135, '', 'Última Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 165, '', 'Trazabilidad', 1, 1, 0, true, 'C', true);

while ($row = mysqli_stmt_fetch($equipos_flujo3)) {

    $pdf->writeHTMLCell(30, 7, 15, '', $marca3, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 7, 45, '', $modelo3, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 7, 75, '', $n_serie3, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 7, 105, '', $certificado_calibracion3, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 7, 135, '', $ultima_calibracion3, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 7, 165, '', '-', 1, 1, 0, true, 'C', true); 
    
}

$pdf->AddPage('A4');

$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>PRUEBAS DE TEMPERATURA / HUMEDAD RELATIVA Y PRESIÓN SONORA
</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Informe ref:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(50, 5, 40, '', $nombre_informe ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(15, 5, 90, '', '<strong>OT N°:</strong>',0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(13, 5, 105, '', $num_ot ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(35, 5, 140, '', '<strong>Fecha de Emisión:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 175, '', $fecha_registro_informe ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Empresa:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(75, 5, 40, '', $nombre_empresa ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 140, '', '<strong>Solicita:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(35, 5, 160, '', $solicitante ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Dirección:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(155, 5, 40, '', $direccion ,1,0, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

//información del equipo
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
     
      </tr>
      <br>
   </table>
   
EOD;  
$pdf->writeHTML($info_equipo, true, false, false, false, '');


$linea = <<<EOD
<br>
<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Temperatura y Humedad Relativa - UNE-EN ISO 14.644-3:2015</h2></td>
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

$pdf->writeHTMLCell(36, 5, 15, '', 'punto de muestreo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 51, '', '1', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 87, '', '2', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 123, '', '3', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 159, '', 'Promedio', 1, 1, 0, true, 'C', true);

$i3=0;
 while ($row = mysqli_stmt_fetch($queryPrueba4)) {
$pdf->writeHTMLCell(36, 5, 15, '', $array_titulos3[$i3], 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 51, '', $punto_1, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 87, '', $punto_2, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 123, '', $punto_3, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 159, '', $promedio, 1, 1, 0, true, 'C', true);
$i3++;
}

$imagen1 = <<<EOD
<style>
.linea{
  

}
</style>

<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><img src="../../imagenes/img_definidas/luz.jpg">imagen 2</td>  
   </tr>
</table>

EOD;
$pdf->writeHTML($imagen1, true, false, false, false, '');

$linea = <<<EOD
<br>
<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Medición de Presión Sonora - DS N°594</h2></td>
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


$pdf->writeHTMLCell(36, 5, 15, '', 'punto de muestreo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 51, '', '1', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 87, '', '2', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 123, '', '3', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 159, '', 'Promedio', 1, 1, 0, true, 'C', true);

$i4 = 0;
 while ($row = mysqli_stmt_fetch($queryPrueba4_1)) {

$pdf->writeHTMLCell(36, 5, 15, '', $array_titulos4[$i4], 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 51, '', $punto_1, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 87, '', $punto_2, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 123, '', $punto_3, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(36, 5, 159, '', $promedio, 1, 1, 0, true, 'C', true);

$i4++;

}

$imagen1 = <<<EOD
<style>
.linea{
  

}
</style>

<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><img src="../../imagenes/img_definidas/luz.jpg">imagen 2</td>  
   </tr>
</table>

EOD;
$pdf->writeHTML($imagen1, true, false, false, false, '');

$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Equipos Utilizados en la Medición</h2></td>
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



$pdf->writeHTMLCell(30, 7, 15, '', 'Marca', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 45, '', 'Modelo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 75, '', 'No° Serie', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 105, '', 'Certificado de Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 135, '', 'Última Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 165, '', 'Trazabilidad', 1, 1, 0, true, 'C', true);


while ($row = mysqli_stmt_fetch($equipos_flujo4)) {
$pdf->writeHTMLCell(30, 7, 15, '', $marca4 , 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 45, '', $modelo4 , 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 75, '', $n_serie4 , 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 105, '', $certificado_calibracion4 , 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 135, '', $ultima_calibracion4 , 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 165, '', '-' , 1, 1, 0, true, 'C', true);
}

$pdf->AddPage('A4');

$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>PRUEBAS DE HUMO Y NIVEL DE ILUMINACIÓN</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Informe ref:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(50, 5, 40, '', $nombre_informe ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(15, 5, 90, '', '<strong>OT N°:</strong>',0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(13, 5, 105, '', $num_ot ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(35, 5, 140, '', '<strong>Fecha de Emisión:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 175, '', $fecha_registro_informe ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Empresa:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(75, 5, 40, '', $nombre_empresa ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 140, '', '<strong>Solicita:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(35, 5, 160, '', $solicitante ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Dirección:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(155, 5, 40, '', $direccion ,1,0, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

//información del equipo
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
     
      </tr>
      <br>
   </table>
   
EOD;  
$pdf->writeHTML($info_equipo, true, false, false, false, '');

$linea = <<<EOD
<br>
<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<table >
   <tr border="1">
        <td class="linea" align="center"><h3>Prueba de Humo - ANSI/ASHRAE 110-1995 Method of Testing Performance of Laboratory Fume Hoods</h3></td>
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
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba N°1: Contención de Aire Externo</h2></td>
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

$pdf->writeHTMLCell(60, 5, 15, '', 'condiciones', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 75, '', 'Resultado', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 135, '', 'Cumple', 1, 1, 0, true, 'C', true);

$i6 = 0;

while ($row = mysqli_stmt_fetch($queryPrueba5)) {

    if ($i6 < 4) {
      
    $pdf->writeHTMLCell(60, 5, 15, '', $array_titulos5[$i6], 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(60, 5, 75, '', $resultado_1, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(60, 5, 135, '', $cumple_1, 1, 1, 0, true, 'C', true);
    }elseif ($i6 > 1) {
      $pdf->writeHTMLCell(60, 5, 15, '', $array_titulos5[$i6], 1, 0, 0, true, 'C', true);
      $pdf->writeHTMLCell(120, 5, 75, '', $cumple_1, 1, 1, 0, true, 'C', true);
   }
   $i6++;
}



$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba N°2: Unidireccionalidad</h2></td>
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

$pdf->writeHTMLCell(60, 5, 15, '', 'Condiciones', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 75, '', 'Resultado', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 135, '', 'Cumple', 1, 1, 0, true, 'C', true);

$array_titulos6 = array('Ubicación de Prueba', 'Visualización de Flujo Unidireccional','Visualización de Flujo Reverso','Visualización de Puntos Muertos ','Visualización de Vórtices','Cumple Especificaciones','Cumple Prueba de Humo');


$i7 = 0;

while ($row = mysqli_stmt_fetch($queryPrueba5_1)) {

    if ($i7 < 5) {

        $pdf->writeHTMLCell(60, 5, 15, '', $array_titulos6[$i7], 1, 0, 0, true, 'C', true);
        $pdf->writeHTMLCell(60, 5, 75, '', $resultado_2, 1, 0, 0, true, 'C', true);
        $pdf->writeHTMLCell(60, 5, 135, '', $cumple_2, 1, 1, 0, true, 'C', true);
        
      }elseif($i7 > 2){
        $pdf->writeHTMLCell(60, 5, 15, '', $array_titulos6[$i7], 1, 0, 0, true, 'C', true);
        $pdf->writeHTMLCell(120, 5, 75, '', $cumple_2, 1, 1, 0, true, 'C', true);

        }
   $i7++;
}

$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Medición de Nivel de Iluminación - DS N°594</h2></td>
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

$pdf->writeHTMLCell(27, 5, 15, '', 'Punto de muestro', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 42, '', '1', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 67, '', '2', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 92, '', '3', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 117, '', '4', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 142, '', '5', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(28, 5, 167, '', 'Promedio', 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(27, 5, 15, '', 'Lux', 1, 0, 0, true, 'C', true);

while ($row = mysqli_stmt_fetch($queryPrueba6)) {
 
$pdf->writeHTMLCell(25, 5, 42, '', $punto_1, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 67, '', $punto_2, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 92, '', $punto_3, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 117, '', $punto_4, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(25, 5, 142, '', $punto_5, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(28, 5, 167, '', $promedio, 1, 1, 0, true, 'C', true);

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
        <td class="linea" align="center"><img src="../../imagenes/img_definidas/luz.jpg">imagen 2</td>  
   </tr>
</table>

EOD;
$pdf->writeHTML($imagen1, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<br><br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Equipos Utilizado en la Medición</h2></td>
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


$pdf->writeHTMLCell(30, 7, 15, '', 'Marca', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 45, '', 'Modelo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 75, '', 'No° Serie', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 105, '', 'Certificado de Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 135, '', 'Última Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 165, '', 'Trazabilidad', 1, 1, 0, true, 'C', true);

while ($row = mysqli_stmt_fetch($equipos_flujo5)) {
$pdf->writeHTMLCell(30, 7, 15, '', $marca5, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 45, '', $modelo5, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 75, '', $n_serie5, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 105, '', $certificado_calibracion5, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 135, '', $ultima_calibracion5, 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7, 165, '', '-', 1, 1, 0, true, 'C', true);
}

$pdf->AddPage('A4');

$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>FOTOGRAFIAS DEL EQUIPO</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Informe ref:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(50, 5, 40, '', $nombre_informe ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(15, 5, 90, '', '<strong>OT N°:</strong>',0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(13, 5, 105, '', $num_ot ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(35, 5, 140, '', '<strong>Fecha de Emisión:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 175, '', $fecha_registro_informe ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Empresa:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(75, 5, 40, '', $nombre_empresa ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 140, '', '<strong>Solicita:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(35, 5, 160, '', $solicitante ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Dirección:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(155, 5, 40, '', $direccion ,1,0, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

//información del equipo
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
     
      </tr>
      <br>
   </table>
   
EOD;  
$pdf->writeHTML($info_equipo, true, false, false, false, '');

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
  $image_frontal = '../../../../images/no_imagen.png';
}else{
  $image_frontal = '../../'.$url1.$nombre_imagen1;
}
if ($url2 == '' || $url2 == NULL) {
  $imagenPlaca = '../../../../images/no_imagen.png';
}else{
  $imagenPlaca = '../../'.$url2.$nombre_imagen2;
}
if ($url3 == '' || $url3 == NULL) {
  $imagenAreatrabajo = '../../../../images/no_imagen.png';
}else{
  $imagenAreatrabajo = '../../'.$url3.$nombre_imagen3;
}




$linea13 = <<<EOD

<style>
.linea{
   height: 14 px;
   color:#fff;
   background-color: #1a53ff;
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
              <td> <img src="$image_frontal" style="width:305px;"></td>
            </tr>
          </table>
        </td>
        <td class="imagen" border="0">
          <table border="0" style="width:310px;">
            <tr>
              <td> <img src="$imagenPlaca" style="width:305px;"></td>
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
          <img src="$imagenPlaca" style="width:305px;">
        </td>
        <td style="width: 170px;"></td>
    </tr>
</table>
<img src='descarga.png'>
EOD;



$pdf->writeHTML($linea13, true, false, false, false, '');


$pdf->Output($nombre_informe, 'I');

?>