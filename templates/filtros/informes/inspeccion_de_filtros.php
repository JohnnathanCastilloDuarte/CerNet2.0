<?php
require('../../../recursos/itemencabezadopdf.php');
require('../../../config.ini.php');
//$id_informe = $_GET['informe'];
//$resultado_corresponde = "";
//$posicion_sensores_indicativo = 1;



$pdf->AddPage('A4');

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

$

EOD;

$pdf->writeHTML($html, true, false, false, false, '');

$pdf->Output('Algo.pdf', 'I');
?>
