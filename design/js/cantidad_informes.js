//SELECT count(a.id_asignado)  FROM item_asignado as a, numot as b, servicio as c WHERE c.id_servicio_tipo =  7 AND b.fecha_fin_informe is NULL

listar_informes_refrigeradores();

function listar_informes_refrigeradores(){
	
	$.ajax({
		
		type:'GET',
		url:'templates/informes/consultar_refrigeradores.php',
		success:function(e){
			let convertir = JSON.parse(e);
			
				convertir.forEach((result)=>{

					
					$("#mapeo_refrigerador_c").html(result.mapeo);
					$("#mapeo_refrigerador_generados").html(result.mapeo);
					$("#mapeo_refrigerador_proceso").html(result.mapeo_progreso);
					$("#mapeo_refrigerador_terminados").html(result.mapeo_final);

			
					$("#calificacion_refrigerador_proceso").html(result.calificacion_progreso);
					$("#calificacion_refrigerador_terminados").html(result.calificacion_final);
					$("#calificacion_refrigerador_c").html(result.calificacion);
					$("#calificacion_refrigerador_generados").html(result.calificacion);
				});
		}
		
	});
	
}



(function(){
	
	$("#calificacion_refrigerador_c").mouseover(function(){
			Swal.fire({
				position:'center',
				toast:true,
				title:'Cantidad de informes por terminar para la calificación de refrigeradores',
				timer:1900,
				showConfirmButton:true
			});
		
	});
	
}());



(function(){
	
	$("#mapeo_refrigerador_c").mouseover(function(){
			Swal.fire({
				position:'center',
				toast:true,
				title:'Cantidad de informes por terminar para el mapeo de refrigeradores',
				timer:1900,
				showConfirmButton:true
			});
		
	});
	
}())