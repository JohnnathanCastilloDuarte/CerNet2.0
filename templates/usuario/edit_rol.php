<?php 
	require("../../config.ini.php"); 


			$id_rol = $_POST['id'];
			$rol = $_POST['perfil'];
			$m1 = $_POST['m1_1'] + $_POST['m1_2'] + $_POST['m1_3'];
			$m2 = $_POST['m2_1'] + $_POST['m2_2'] + $_POST['m2_3']; 
			$m3 = $_POST['m3_1'] + $_POST['m3_2'] + $_POST['m3_3'];
			$m4 = $_POST['m4_1'] + $_POST['m4_2'] + $_POST['m4_3'];      			
			$m5 = $_POST['m5_1'] + $_POST['m5_2'] + $_POST['m5_3'];      			
			$m6 = $_POST['m6_1'] + $_POST['m6_2'] + $_POST['m6_3'];      			
			$m7 = $_POST['m7_1'] + $_POST['m7_2'] + $_POST['m7_3'];      			
			$m8 = $_POST['m8_1'] + $_POST['m8_2'] + $_POST['m8_3'];      			
			$m9 = $_POST['m9_1'] + $_POST['m9_2'] + $_POST['m9_3'];      			
			$m10 = $_POST['m10_1'] + $_POST['m10_2'] + $_POST['m10_3'];      
			$m11 = $_POST['m11_1'] + $_POST['m11_2'] + $_POST['m11_3'];      
			$m12 = $_POST['m12_1'] + $_POST['m12_2'] + $_POST['m12_3'];      
			$m13 = $_POST['m13_1'] + $_POST['m13_2'] + $_POST['m13_3'];      
			$m14 = $_POST['m14_1'] + $_POST['m14_2'] + $_POST['m14_3'];      
			$m15 = $_POST['m15_1'] + $_POST['m15_2'] + $_POST['m15_3'];      
			$m16 = $_POST['m16_1'] + $_POST['m16_2'] + $_POST['m16_3'];      
			$m17 = $_POST['m17_1'] + $_POST['m17_2'] + $_POST['m17_3'];      
			$m18 = $_POST['m18_1'] + $_POST['m18_2'] + $_POST['m18_3'];      
			$m19 = $_POST['m19_1'] + $_POST['m19_2'] + $_POST['m19_3'];      
			$m20 = $_POST['m20_1'] + $_POST['m20_2'] + $_POST['m20_3'];      
			$m21 = $_POST['m21_1'] + $_POST['m21_2'] + $_POST['m21_3'];      
			$m22 = $_POST['m22_1'] + $_POST['m22_2'] + $_POST['m22_3'];      
			$m23 = $_POST['m23_1'] + $_POST['m23_2'] + $_POST['m23_3'];      
			$m24 = $_POST['m24_1'] + $_POST['m24_2'] + $_POST['m24_3'];      
			$m25 = $_POST['m25_1'] + $_POST['m25_2'] + $_POST['m25_3'];      
			$m26 = $_POST['m26_1'] + $_POST['m26_2'] + $_POST['m26_3'];      
			$m27 = $_POST['m27_1'] + $_POST['m27_2'] + $_POST['m27_3'];      
			$m28 = $_POST['m28_1'] + $_POST['m28_2'] + $_POST['m28_3'];      
			$m29 = $_POST['m29_1'] + $_POST['m29_2'] + $_POST['m29_3'];      
			$m30 = $_POST['m30_1'] + $_POST['m30_2'] + $_POST['m30_3'];      
			$m31 = $_POST['m31_1'] + $_POST['m31_2'] + $_POST['m31_3'];      
			$m32 = $_POST['m32_1'] + $_POST['m32_2'] + $_POST['m32_3'];      
			$m33 = $_POST['m33_1'] + $_POST['m33_2'] + $_POST['m33_3'];      
			$m34 = $_POST['m34_1'] + $_POST['m34_2'] + $_POST['m34_3'];      
			$m35 = $_POST['m35_1'] + $_POST['m35_2'] + $_POST['m35_3'];      
			$m36 = $_POST['m36_1'] + $_POST['m36_2'] + $_POST['m36_3'];      
			$m37 = $_POST['m37_1'] + $_POST['m37_2'] + $_POST['m37_3'];      
			$m38 = $_POST['m38_1'] + $_POST['m38_2'] + $_POST['m38_3'];      
			$m39 = $_POST['m39_1'] + $_POST['m39_2'] + $_POST['m39_3'];      
			$m40 = $_POST['m40_1'] + $_POST['m40_2'] + $_POST['m40_3'];      
			$m41 = $_POST['m41_1']  + $_POST['m41_2'] + $_POST['m41_3'];      
			$m42 = $_POST['m42_1'] + $_POST['m42_2'] + $_POST['m42_3'];

			$update = mysqli_query($connect,"UPDATE rol SET rol= '$rol',
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
																	modulo_ti_usuario=$m41, modulo_admin_persona=$m42 WHERE id_rol = $id_rol ");
		
if($update){
	echo "si";
}else{
	echo "no";
}

mysqli_close($connect);

?>