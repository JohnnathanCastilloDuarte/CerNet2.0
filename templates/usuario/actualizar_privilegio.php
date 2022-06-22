<?php 
error_reporting(0);
include('../../config.ini.php');

$id_privilegio = $_POST['id_privilegio'];
////////////// MODULOS /////////////////
$modulo1 = $_POST['modulo1'];
if($modulo1 == ''){
    $modulo1=0;
}else{
    $modulo1=1;
}
$modulo2 = $_POST['modulo2'];
if($modulo2 == ''){
    $modulo2=0;
}else{
    $modulo2=1;
}
$modulo3 = $_POST['modulo3'];
if($modulo3 == ''){
    $modulo3=0;
}else{
    $modulo3=1;
}
$modulo4 = $_POST['modulo4'];
if($modulo4 == ''){
    $modulo4=0;
}else{
    $modulo4=1;
}
$modulo5 = $_POST['modulo5'];
if($modulo5 == ''){
    $modulo5=0;
}else{
    $modulo5=1;
}
$modulo6 = $_POST['modulo6'];
if($modulo6 == ''){
    $modulo6=0;
}else{
    $modulo6=1;
}
$modulo7 = $_POST['modulo7'];
if($modulo7 == ''){
    $modulo7=0;
}else{
    $modulo7=1;
}
$modulo8 = $_POST['modulo8'];
if($modulo8 == ''){
    $modulo8=0;
}else{
    $modulo8=1;
}
$modulo9 = $_POST['modulo9'];
if($modulo9 == ''){
    $modulo9=0;
}else{
    $modulo9=1;
}

$guardar = mysqli_prepare($connect,'UPDATE  privilegio  SET Modulos = ?, Usuarios = ?, Clientes = ?, Items= ?,
                                    Ordenes_trabajo=?, Servicios=?, Informes=?, Documentacion=?, Cargos= ? WHERE id_privilegio = ?');

mysqli_stmt_bind_param($guardar, 'iiiiiiiiii', $modulo1,$modulo2,$modulo3,$modulo4,$modulo5,$modulo6,$modulo7,$modulo8,$modulo9,$id_privilegio);
mysqli_stmt_execute($guardar);

if($guardar){
    echo "Si";
}else{
    echo "No";
}

mysqli_close($connect);
?>