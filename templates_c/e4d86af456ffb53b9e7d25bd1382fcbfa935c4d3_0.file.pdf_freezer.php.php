<?php
/* Smarty version 3.1.34-dev-7, created on 2021-12-02 23:08:02
  from 'C:\xampp\htdocs\CerNet2.0\templates\item\pdf\pdf\pdf_freezer.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61a943c26fa587_58180578',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4d86af456ffb53b9e7d25bd1382fcbfa935c4d3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\item\\pdf\\pdf\\pdf_freezer.php',
      1 => 1638482874,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61a943c26fa587_58180578 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
';?>
require('../../../../recursos/encabezadopdf.php');
require('../../../../config.ini.php');
//$id_informe = $_GET['informe'];
//$resultado_corresponde = "";
//$posicion_sensores_indicativo = 1;



$pdf->AddPage('A4');

$html = <<<EOD

<hr>
<h2>Información del equipo {}</h2>
<hr>
<br>
<table border="0" style="padding: 5px 5px 15px 5px;">
	<tr>
		<th style="font-weight: bold">Nombre:</th>
		<th>respuesta</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Empresa:</th>
		<th>respuesta</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">Fabricante/marca:</th>
		<th>respuesta</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Modelo:</th>
		<th>respuesta</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">N° serie:</th>
		<th>respuesta</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Codigo interno:</th>
		<th>respuesta</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">Año de fabricación:</th>
		<th>respuesta</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Nombre:</th>
		<th>respuesta</th>
	</tr>
</table>
<hr>
<h2>Caracteristicas del equipo</h2>
<hr>
<table border="0" style="padding: 5px 5px 20px 5px;">
	<tr>
		<th style="width: 90px;font-weight: bold" >Direccion</th>
		<th style="width: 190px;">respuesta</th>
		<th style="width: 76px;"></th>
		<th style="width: 90px;font-weight: bold">Ubicación interna</th>
		<th style="width: 190px;">respuesta</th>
	</tr>
</table>

<table border="0" style="padding: 5px 5px 5px 5px;">
	<tr>
		<th style="width: 142px; font-weight: bold">Voltaje:</th>
		<th style="width: 70px;">R</th>
		<th style="width: 142px; font-weight: bold">Potencia:</th>
		<th style="width: 70px;">R</th>
		<th style="width: 142px; font-weight: bold">Capacidad:</th>
		<th style="width: 70px;">R</th>
	</tr>
	<tr>
		<th style="width: 142px; font-weight: bold">Alto:</th>
		<th style="width: 70px;">R</th>
		<th style="width: 142px; font-weight: bold">Largo:</th>
		<th style="width: 70px;">R</th>
		<th style="width: 142px; font-weight: bold">Ancho:</th>
		<th style="width: 70px;">R</th>
	</tr>
	<tr>
		<th style="width: 142px; font-weight: bold">Valor seteado humedad:</th>
		<th style="width: 70px;">R</th>
		<th style="width: 142px; font-weight: bold">Humedad minima:</th>
		<th style="width: 70px;">R</th>
		<th style="width: 142px; font-weight: bold">Humedad maxima:</th>
		<th style="width: 70px;">R</th>
	</tr>
	<tr>
		<th style="width: 142px; font-weight: bold">Valor seteado temperatura:</th>
		<th style="width: 70px;">R</th>
		<th style="width: 142px; font-weight: bold">Temperatura minima:</th>
		<th style="width: 70px;">R</th>
		<th style="width: 142px; font-weight: bold">Temperatura maxima:</th>
		<th style="width: 70px;">R</th>
	</tr>
	<tr>
		<th style=" font-weight: bold">peso</th>
		<th>R</th>
	</tr>
</table>


EOD;

$pdf->writeHTML($html, true, false, false, false, '');

$pdf->Output('Algo.pdf', 'I');
<?php echo '?>';?>

<?php }
}
