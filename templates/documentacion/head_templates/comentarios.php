<?php 
error_reporting(0);
include('../../config.ini.php');
$doc = $_GET['doc'];
$person = $_GET['person'];

echo '<input type="hidden" value='.$doc.' id="doc">';
echo '<input type="hidden" value='.$person.' id="person">';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="card">
  <div class="card-header">Comentarios</div>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-12">
        <table class="table">
          <tbody id="traer_comentarios"></tbody>
        </table>
        <br>
        <label>Ingresa comentario:</label>
        <textarea id="comentario_actual" class="form-control"></textarea>
        <button class="btn btn-success" id="click_comentario">
          Comentar
        </button>
                  
      </div>
    </div>
  </div>
</div>
  <script type="text/javascript" src="../../../design/Datatables/sweetalert2.all.min.js"></script>
  <script src="../../../design/js/comentarios_head.js"></script>
</body>
</html>