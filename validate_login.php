<?php

include("config.ini.php");
if(isset($_POST['empezar']))
{
  $user=$_POST["usuario"];
  $pass=$_POST["password"];
  $online=$_POST["online"];
  $enc_pass=md5($pass);
  
  $filtro_1 = mysqli_prepare($connect,"SELECT id_usuario, FROM usuario  WHERE usuario=? AND password=?");
  mysqli_stmt_bind_param($filtro_1, 'ss', $user,$enc_pass);
  mysqli_stmt_execute($filtro_1);
  mysqli_stmt_store_result($filtro_1);
  mysqli_stmt_bind_result($filtro_1,$id_usuario);
  mysqli_stmt_fetch($filtro_1);
  
  $filtro_2 = mysqli_prepare($connect,"SELECT id_usuario FROM persona WHERE id_usuario = ?");
  mysqli_stmt_bind_param($filtro_2, 'i', $id_usuario);
  mysqli_stmt_execute($filtro_2);
  mysqli_stmt_store_result($filtro_2);
  mysqli_stmt_bind_result($filtro_2,$id_usuario_c);
  mysqli_stmt_fetch($filtro_2);
  
  
  if(mysqli_stmt_num_rows($filtro_2)==0){
    
    $creando = mysqli_prepare($connect,"INSERT INTO persona (id_usuario) VALUES (?)");
    mysqli_stmt_bind_param($creando, 'i', $id_usuario);
    mysqli_stmt_execute($creando);
    
  }
  
  
  $existe_usuario="SELECT A.id_usuario, A.usuario, B.nombre, C.departamento, D.nombre FROM usuario AS A, persona AS B, departamento as C, cargo AS D WHERE D.id_departamento = C.id AND A.usuario=? AND password=? AND A.id_usuario=B.id_usuario AND B.id_cargo = D.id_cargo";
  $conecto=mysqli_prepare($connect,$existe_usuario);
  mysqli_stmt_bind_param($conecto, 'ss', $user,$enc_pass);
  mysqli_stmt_execute($conecto);
  mysqli_stmt_store_result($conecto);
  mysqli_stmt_bind_result($conecto,$id_usuario_online,$usuario_online,$nombre_usuario_online, $departamento, $cargo_usuario_online);
  mysqli_stmt_fetch($conecto);
  if($online=="on"){$online=1;}else{$online=0;}

  if(mysqli_stmt_num_rows($conecto)<1)
  {
	  header("refresh:0; url=mi_acceso.php?error=error_0001"); 	
  }
  else
  {
    if($online==1)
    {
      setcookie("myid", $id_usuario_online, time()+3600*24*30);      
      setcookie("user", $usuario_online, time()+3600*24*30);
      setcookie("pass", $enc_pass, time()+3600*24*30);
      setcookie("name", $nombre_usuario_online, time()+3600*24*30);	
      setcookie("cargo", $cargo_usuario_online, time()+3600*24*30);			
    }
    else
    {
      setcookie("myid", $id_usuario_online, time()+3600);      
      setcookie("user", $usuario_online, time()+3600);
      setcookie("pass", $enc_pass, time()+3600);
      setcookie("name", $nombre_usuario_online, time()+3600);  
      setcookie("cargo", $cargo_usuario_online, time()+3600); 			
    }	
    
    $movimiento = "Inició sesión en";
    $modulo = "CerNet 2.0";
    
    $insertando = mysqli_prepare($connect,"INSERT INTO backtrack (persona, movimiento, modulo) VALUES (?,?,?)");
    mysqli_stmt_bind_param($insertando, 'iss', $id_usuario_online, $movimiento, $modulo);
    mysqli_stmt_execute($insertando);
    echo mysqli_stmt_error($insertando);
    if($insertando){
      header("refresh:0; url=index.php");  
    }else{
      echo "Error";
    }   
  }
}
if(isset($_GET['action']))
{
	if($_GET['action']==0)
	{
		  setcookie("myid", $id_usuario_online, time()-360);      
      setcookie("user", $usuario_online, time()-360);
      setcookie("pass", $enc_pass, time()-360);
      setcookie("name", $nombre_usuario_online, time()-360);  
      setcookie("cargo", $cargo_usuario_online, time()-360); 
			session_destroy();
	  	header("refresh:0; url=mi_acceso.php?error=error_0003");		
	}
}
?>