//OCULTANDO CAMPOS
$("#otro_tipo_div").hide();
$("#formulario_computador").hide();
$("#formulario_celular").hide();
$("#formulario_impresora").hide();

$("#btn_nuevo_activo_pc").hide();
$("#btn_nuevo_activo_celular").hide();
$("#btn_nuevo_activo_impresora").hide();


//FUNCION QUE CONTROLA EL CAMBIO DEL TIPO DE ACTIVO
(function(){

	$("#selection_activo").change(function(){
		
		let seleccion = $("#selection_activo").val();
		$("#btn_nuevo_activo").show();	
		$("#sin_seleccion").hide();
		
			//controla el tipo de valor Otro
			if(seleccion == "Otro"){
				$("#otro_tipo_div").show();
			}else{
				$("#otro_tipo_div").hide();
			}
		
		
		
		
		//validación de los formularios
			if(seleccion == "sinseleccion"){
				$("#sin_seleccion").show();
				$("#formulario_computador").hide();
				$("#formulario_celular").hide();
				$("#formulario_impresora").hide();
					
					
			}
			else if(seleccion == "Computador"){
				$("#formulario_computador").show();
				$("#formulario_celular").hide();
				$("#formulario_impresora").hide();
				$("#btn_nuevo_activo_pc").show();
				$("#btn_nuevo_activo_celular").hide();
				$("#btn_nuevo_activo_impresora").hide();
				
			}
		
			else if(seleccion == "Celular"){
				$("#formulario_celular").show();
				$("#formulario_computador").hide();
				$("#formulario_impresora").hide();
				$("#btn_nuevo_activo_pc").hide();
				$("#btn_nuevo_activo_celular").show();
				$("#btn_nuevo_activo_impresora").hide();
			}
		
			else if(seleccion == "Impresora"){
				$("#formulario_impresora").show();
				$("#formulario_celular").hide();
				$("#formulario_computador").hide();
				$("#btn_nuevo_activo_pc").hide();
				$("#btn_nuevo_activo_celular").hide();
				$("#btn_nuevo_activo_impresora").show();
			}
			
			else{
				$("#formulario_computador").hide();
				$("#formulario_celular").hide();
				$("#formulario_impresora").hide();
				$("#btn_nuevo_activo_pc").hide();
				$("#btn_nuevo_activo_celular").hide();
				$("#btn_nuevo_activo_impresora").hide();
			}
			
	});
}());


(function(){
	
	$("#btn_nuevo_activo_pc").click(function(){
			
		let ubicacion_computador  = $("#ubicacion_computador").val();
		let marca_computador = $("#marca_computador").val();
		let serial_computador = $("#serial_computador").val();
		let modelo_computador = $("#modelo_computador").val();
		let SO_computador = $("#SO_computador").val();
		let disco_duro_computador = $("#disco_duro_computador").val();
		let ram_computador = $("#ram_computador").val();
		let procesador_computador = $("#procesador_computador").val();
		let observaciones_computador = $("#observaciones_computador").val();
		let id_valida = $("#id_valida").val();
		
		
			const datos = {
				ubicacion_computador,
				marca_computador,
				serial_computador,
				modelo_computador,
				SO_computador,
				disco_duro_computador,
				ram_computador,
				procesador_computador,
				observaciones_computador,
				id_valida
			}
			
			$.post('templates/activos/registrar_computador.php', datos, function(e){
				
				alert(e);
				
			});
			
		});
	
}());

