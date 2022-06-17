<?php 
	require("../../config.ini.php");

			$id = $_POST['id'];
			$perfil=$_POST['perfil'];
        
     
		  $m1 = $_POST['m1'];
			$m2 = $_POST['m2']; 
		  $m3 = $_POST['m3'];
			$m4 = $_POST['m4'];      			
			$m5 = $_POST['m5'];      			
			$m6 = $_POST['m6'];      			
			$m7 = $_POST['m7'];      			
			$m8 = $_POST['m8'];      			
			$m9 = $_POST['m9'];      			
			/*$m10 = $_POST['m10'];      
			$m11 = $_POST['m11'];      
			$m12 = $_POST['m12'];      
			$m13 = $_POST['m13'];      
			$m14 = $_POST['m14'];      
			$m15 = $_POST['m15'];      
			$m16 = $_POST['m16'];      
			$m17 = $_POST['m17'];      
			$m18 = $_POST['m18'];      
			$m19 = $_POST['m19'];      
			$m20 = $_POST['m20'];      
			$m21 = $_POST['m21'];      
			$m22 = $_POST['m22'];      
			$m23 = $_POST['m23'];      
			$m24 = $_POST['m24'];      
			$m25 = $_POST['m25'];      
			$m26 = $_POST['m26'];      
			$m27 = $_POST['m27'];      
			$m28 = $_POST['m28'];      
			$m29 = $_POST['m29'];      
			$m30 = $_POST['m30'];      
			$m31 = $_POST['m31'];      
			$m32 = $_POST['m32'];      
			$m33 = $_POST['m33'];      
			$m34 = $_POST['m34'];      
			$m35 = $_POST['m35'];      
			$m36 = $_POST['m36'];      
			$m37 = $_POST['m37'];      
			$m38 = $_POST['m38'];      
			$m39 = $_POST['m39'];      
			$m40 = $_POST['m40'];      
			$m41 = $_POST['m41'];      
			$m42 = $_POST['m42']; 
  */


$update = mysqli_prepare($connect,"UPDATE privilegio SET perfil= ? ,Modulos=?,Control_cambios=?,Usuarios=?,
                                  Clientes=?,Items=?,Ordenes_trabajo=?,Servicios=?,Informes=?,
                                  Documentacion = ? WHERE id_privilegio = ?");

mysqli_stmt_bind_param($update, 'siiiiiiiiii', $perfil, $m1, $m2, $m3 , $m4, $m5, $m6, $m7, $m8, $m9, $id);

mysqli_stmt_execute($update);

echo mysqli_stmt_error($update);
  
/*
	$update = mysqli_query($connect,"UPDATE privilegio SET perfil= '$perfil',
																	modulo_usuario=$m1,modulo_empresa=$m2, modulo_sensor=$m3,
																	modulo_informe=$m4, modulo_documento=$m5, modulo_persona=$m6,
																	modulo_item=$m7, modulo_numot=$m8, modulo_spot_bodega=$m9,
																	modulo_gep_bodega=$m10, modulo_spot_aire=$m11, modulo_gep_aire=$m12,
																	modulo_spot_autoclave=$m13, modulo_gep_autoclave=$m14, modulo_spot_cadenafrio=$m15,
																	modulo_gep_cadenafrio=$m16, modulo_spot_camaraestabilidad=$m17,
																	modulo_gep_camaraestabilidad=$m18, modulo_spot_camarafria=$m19,
																	modulo_gep_camarafria=$m20, modulo_spot_congelador=$m21,
																	modulo_gep_congelador=$m22, modulo_spot_estufa=$m23, modulo_gep_estufa=$m24,
																	modulo_spot_gabinete=$m25, modulo_gep_gabinete=$m26, modulo_spot_horno=$m27,
																	modulo_gep_horno=$m28, modulo_spot_hvac=$m29, modulo_gep_hvac=$m30,
																	modulo_spot_refrigerador=$m31, modulo_gep_refrigerador=$m32,
																	modulo_spot_ultrafreezer=$m33, modulo_gep_ultrafreezer=$m34,
																	modulo_gep_auditoria=$m35, modulo_csv_hojacalculo=$m36, modulo_csv_software=$m37,
																	modulo_gep_kapa=$m38, modulo_gep_purificacion=$m39, modulo_ti_controlcambios=$m40,
																	modulo_ti_usuario=$m41, modulo_admin_persona=$m42 WHERE id_privilegio = $id ");

*/
if($update){
	echo "si";
}else{
	echo "no";
}

mysqli_close($connect);
?>