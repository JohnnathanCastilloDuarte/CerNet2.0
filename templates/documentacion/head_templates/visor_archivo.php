<?php 

$nombre_archivo = $_GET['nombre'];

echo '<input type="hidden" value='.$nombre_archivo.' id="doc">';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $nombre_archivo; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <embed  src="../pdf/<?php echo $nombre_archivo; ?>" width="100%" height="100%">
  
 </body>
</html>