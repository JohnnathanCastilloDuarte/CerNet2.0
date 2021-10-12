<?php

include('../../config.ini.php');
$variable_url = $_SERVER['HTTP_HOST'];
$id_documentacion = "";
$id_persona = "";
$nombre = "";
$apellido = "";



if($variable_url == "cercal.net"){
  echo "<input type='hidden' id='pdf_final' value='externo'>";
}else{
  echo "<input type='hidden' id='pdf_final' value='interno'>";
}

  $key = $_GET['key'];
  $document = $_GET['document'];
 
  $id_persona = base64_decode($key);
  $id_documentacion = base64_decode($document);
 
  $query2 = mysqli_prepare($connect,"SELECT nombre, apellido FROM persona WHERE  id_usuario = ?");
  mysqli_stmt_bind_param($query2, 'i', $id_persona);
  mysqli_stmt_execute($query2);
  mysqli_stmt_store_result($query2);
  mysqli_stmt_bind_result($query2, $nombre, $apellido);
  mysqli_stmt_fetch($query2);
  
//}


?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Language" content="es">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Portal de informes de Cercal - CerNet</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
  <meta name="description" content="This is an example dashboard created using build-in elements and components.">
  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">
  <link href="../../design/main.css" rel="stylesheet">
	<link href="../../design/assets/wow/animate.min.css" rel="stylesheet">
  <!--<link href="design/style.scss" rel="stylesheet">-->
  <script type="text/javascript" src="../../design/Datatables/jquery.min.js"></script>
  
  <!--INCIO DE MANIPULACION DE ALGUNOS ESTULOS-->
 <style>
          canvas {
        max-width: 100%;
        height: auto;
        background-color: #ffffff;
    } 
          </style>
</head>
<body>
 <!--Campos ocultos de la db-->
  <input type="hidden" value="<?php echo  $id_documentacion; ?>" id="primer_campo">
  <input type="hidden" value="<?php echo  $id_persona; ?>" id="segundo_campo">
  <input type="hidden" value="<?php echo  $document; ?>" id="tercer_campo">
  <input type="hidden" id="id_t_firmantes">
  <div class="row">
    <div class="col-sm-3">
      <div class="app-header__logo">
            <div class="logo-src"></div>
        </div>
    </div>
    <div class="col-sm-6" style="text-align:center;">
      <br>
      <h4 class="text-primary">
        APROBACIONES CERNET    
      </h4>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-2">
     <!-- <button  class="btn btn-primary btn-lg btn-block">Firmadores</button>-->
    </div>
    <!--
    <div class="col-sm-2">
      <button  class="btn btn-primary btn-lg btn-block" id="generar_informe_firma">Generar Informe</button>
    </div>-->
  </div>

  <br>
  
  <div class="row" id="ocultar_1">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header" style="text-align:center;">
          <h5>
            Archivos disponibles
          </h5>
        </div>
        <div class="card-body" >
          <div class="scroll-area-sm">
            <div class="scrollbar-container">
              <table class="table" style="text-align:center;">
                <thead>
                  <th>Fecha</th>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </thead>
                <tbody id="listar_1">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div><!--FINAL DEL PRIMER ROW 6-->
    
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header">
          <h5>
            Aprobación y firma
          </h5>
        </div>
        <div class="card-body" id="m">
          <div class="row">
            <div class="col-sm-6" style="text-align:center;">
              <button class="btn btn-primary" id="firma_1">Firma pluma</button>
            </div>
            <div class="col-sm-6" style="text-align:center;">
              <button class="btn btn-warning" id="firma_2">Firma automatica</button>
            </div>
          </div>
        </div>
        <div class="card-body" id="m_1">
          <button id="limpiar" >Limpiar</button> 
            <canvas id="algo"></canvas>
          <br>
          <button class="btn btn-success  btn-lg btn-block" id="firmar_1_c">Firmar</button>
        
          <br>
          <button style="text-align:center" class="btn btn-danger btn-lg btn-block" id="volver1" display="block">Volver</button>
        </div>
        <div class="card-body" id="m_2">
          <div class="row">
            <div class="col-sm-6">
              <label>Nombres:</label>
              <input type="text" class="form-control" value="<?php echo $nombre." ".$apellido; ?>" readonly>
            </div>
            <div class="col-sm-6">
              <label>Identificacion:</label>
              <input type="text" id="identificacion_d" class="form-control">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12">
              <label>Token seguridad</label>
              <input type="text" id="token_seguridad" class="form-control" readonly>
            </div>
          </div>
          <br>
          <button class="btn btn-success btn-lg btn-block" id="firmar_2_c">Firmar</button>
          <br>
          <button style="text-align:center" class="btn btn-danger btn-lg btn-block" id="volver2" display="block">Volver</button>
        </div>
    </div>
  </div>
  </div>
  <br>
  
  <!--<div class="row" id="ocultar_3">
  <div class="card">
    <div class="card-header"><h4>RELACION DE FIRMANTES</h4></div>
    <div class="card-body">
      <table class="table">
        <thead>
          <th>Empresa</th>
          <th>Nombres</th>
          <th>Fecha firma</th>
        </thead>
        <tbody id="traer_quien_firma">

        </tbody>
      </table>
    </div>
  </div>
  </div>-->
  
  
  <div class="row" id="ocultar_2" style="text-align:center;">
    <div class="col-sm-12">
      <button class="btn btn-danger" id="cerrar_close_cerrar">
        X
      </button>
    </div>
    <div class="col-sm-12">
      <canvas id="imagen_aqui" width="1140" height="1400"></canvas>
      <div id="imagen_pdf_completo" style="heigth=700px;"></div>
    </div>
  </div>
  
  
<script type="text/javascript" src="../../design/js/funcion_documentacion_apoyo.js"></script>
<script type="text/javascript" src="../../design/Datatables/sweetalert2.all.min.js"></script>
</body>
</html>