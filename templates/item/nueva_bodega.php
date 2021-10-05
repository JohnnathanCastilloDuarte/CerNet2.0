<?php
include('../../config.ini.php');

$nombre_bodega = $_POST['nombre_bodega'];
$empresa_bodega = $_POST['empresa_bodega'];
$descripcion_item_bodega = $_POST['descripcion_item_bodega'];
$direccion_bodega = $_POST['direccion_bodega'];
$codigo_bodega = $_POST['codigo_bodega'];
$productos = $_POST['productos'];

$largo_bodega = $_POST['largo_bodega'];
$ancho_bodega = $_POST['ancho_bodega'];
$superficie_bodega = $_POST['superficie_bodega'];
$volume_bodega = $_POST['volume_bodega'];
$altura_bodega = $_POST['altura_bodega'];
$tipo_muro = $_POST['tipo_muro'];
$tipo_cielo = $_POST['tipo_cielo'];

$climatizacion = $_POST['climatizacion'];
$s_m_t = $_POST['s_m_t'];
$s_m_t_a = $_POST['s_m_t_a'];
$planos = $_POST['planos'];
$analisis_riesgo = $_POST['analisis_riesgo'];
$fichas_estabilidad = $_POST['fichas_estabilidad'];

echo $climatizacion;
echo $s_m_t;
echo $s_m_t_a;
echo $planos;
echo $analisis_riesgo;
echo $fichas_estabilidad;
?>