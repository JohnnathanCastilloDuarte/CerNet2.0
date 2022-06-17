<?php 
//error_reporting(0);
include('config.ini.php');

$KEY = $_GET['key'];
$id_documento = base64_decode($KEY);


$query = mysqli_prepare($connect,"SELECT url FROM archivos_documentacion WHERE id_documentacion = ?");
mysqli_stmt_bind_param($query, 'i', $id_documento);
mysqli_stmt_execute($query);
mysqli_stmt_store_result($query);
mysqli_stmt_bind_result($query, $url);
mysqli_stmt_fetch($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Documentación</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
</head>
<body>
<embed src="<?php echo $url.'#toolbar=0&navpanes=0&scrollbar=0'; ?>" type="application/pdf" width="100%" height="600px" />
</body>
</html>