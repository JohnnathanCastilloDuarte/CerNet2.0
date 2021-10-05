<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-03 18:28:34
  from '/var/www/html/Pruebas_Desarrollo/templates/mi_acceso.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5effa302a301b5_70560952',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2177e92cee8cd8d85a1528d763cec7d9d41eeb69' => 
    array (
      0 => '/var/www/html/Pruebas_Desarrollo/templates/mi_acceso.php',
      1 => 1593811710,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5effa302a301b5_70560952 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
';?>
$user=$_POST["usuario"];
$pass=$_POST["password"];
$enc_pass=md5($pass);
$existe_usuario="SELECT A.id_usuario, A.usuario, B.nombre FROM usuario AS A, persona AS B WHERE A.usuario=? AND password=? AND A.id_usuario=B.id_usuario";
$conecto=mysqli_prepare($connect,$existe_usuario);
mysqli_stmt_bind_param($conecto, 'ss', $user,$enc_pass);
mysqli_stmt_execute($conecto);
mysqli_stmt_store_result($conecto);
mysqli_stmt_bind_result($conecto,$id_usuario_online,$usuario_online,$nombre_usuario_online);
mysqli_stmt_fetch($conecto);

$smarty->assign("error_0001","");

if(mysqli_stmt_num_rows($conecto)<1)
{
 // "<div class='alert alert-warning fade show' role='alert'>Error 0001: Usuario o contraseña erroneos</div>";
  $smarty->assign("error_0001","ERROR");
} 
$smarty->display("login.tpl"); 
<?php echo '?>';
}
}
