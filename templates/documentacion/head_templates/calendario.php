<?php 
error_reporting(0);
include('../../../config.ini.php');
$doc = $_GET['doc'];
echo '<input type="hidden" value='.$doc.' id="doc">';


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

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-head">
        
            </div>
            <div class="card-body">
                
                <table class="table" style="text-align:center;">
                    <thead>
                        <th>Rol</th>
                        <th>usuario</th>
                        <th>Fecha de registro</th>
                        <th>Fecha de firma</th>
                        <th>Tipo</th>
                    </thead>
                    <tbody id="traer_calendario">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



  <script type="text/javascript" src="../../../design/Datatables/sweetalert2.all.min.js"></script>
  <script src="../../../design/js/calendario_documentacion.js"></script>
</body>
</html>