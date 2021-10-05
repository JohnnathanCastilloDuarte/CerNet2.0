listar_tipo_servicio();
$("#btn_editar_servicio_tipo").hide();
$("#reload").hide();


//listar tipo de servicios
function listar_tipo_servicio(){
	
	$.ajax({
		type:'GET',
		url:'templates/servicio/listar_tipo_servicio.php',
		success:function(e){
			let traer = JSON.parse(e);
			let template = '';
			
			traer.forEach((result)=>{
				template +=
				`
					<tr data-id="${result.id_servicio}">
						<td>${result.servicio}</td>
						<td>${result.nombre_modulo}</td>
						<td>${result.nombre_usuario} ${result.apellido_usuario}</td>
						<td>${result.fecha_registro}</td>
						<td>
							<div class='col-sm-12' style='text-align:center;'>
									<a id="btn_editar_tipo_servicio" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info" ><i class="lnr-pencil btn-icon-wrapper"></i></a>
								
									<a id="btn_eliminar_tipo_servicio"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger">
									<i class="lnr-cross btn-icon-wrapper"></i></a>
							</div>
						</td>
					</tr>		
					`;	
				
			});
			
			$("#resultados_servicios").html(template);
		}
		
	});
}


//CREAR NUEVO TIPO DE SERVICIO
(function(){
	
	$("#btn_nuevo_tipo_servicio").click(function(){
		
		const datos = {
			servicio_nuevo : $("#servicio_nuevo").val(),
			modulo_tipo_servicio : $("#modulo_tipo_servicio").val(),
			id_valida: $("#id_valida").val()
		}
		
		$.post('templates/servicio/crear_servicio.php', datos, function(e){
			
			if(e == "Si"){
				
				Swal.fire({
					position:'center',
					icon:'success',
					title:'Registro creado',
					timer: 1500
				});
				$("#servicio_nuevo").val("");
				$("#modulo_tipo_servicio").html("");
				listar_tipo_servicio();
				
			}
				
		});
			
	});
		
}());


//EDICIÒN INICIAL DEL TIPO SERVICIO
$(document).on('click','#btn_editar_tipo_servicio',function(){
		let elemento = $(this)[0].parentElement.parentElement.parentElement;
		let id_servicio = $(elemento).attr('data-id');
	
		console.log(id_servicio);
		$("#btn_editar_servicio_tipo").show();
		$("#reload").show();
		$("#btn_nuevo_tipo_servicio").hide();
	
		$("#reload").click(function(){
			$("#btn_editar_servicio_tipo").hide();
		$("#reload").hide();
		$("#btn_nuevo_tipo_servicio").show();
		$("#servicio_nuevo").val('');	
		$("#ultimo_modulo").text('Seleccione');
		$("#ultimo_modulo").val('');
			
		});
		
		$.ajax({
			type:'POST',
			data:{id_servicio},
			url:'templates/servicio/busca_edicion_tipo_servicio.php',
			success:function(e){
				
					let traer = JSON.parse(e);					
							$("#servicio_nuevo").val(traer.servicio);
							$("#ultimo_modulo").text(traer.modulo);
							$("#ultimo_modulo").val(traer.id_modulo);
							$("#id_tipo_servicio").val(traer.id_servicio);

			}
		});
});


//EDICIÓN FINAL DEL TIPO SERVICIO
(function(){
	$("#btn_editar_servicio_tipo").click(function(){
			console.log("click");
		const datos = {
			
			id_servicio : $("#id_tipo_servicio").val(),
			servicio : $("#servicio_nuevo").val(),
			modulo: $("#modulo_tipo_servicio").val(),
			id_valida : $("#id_valida").val()
		}
		
		$.post('templates/servicio/editar_tipo_servicio.php', datos , function(e){
				console.log(e);
			if(e == "Si"){
				
				Swal.fire({
					position:'center',
					icon:'success',
					title: 'Registro modificado',
					timer:1500
				});
				listar_tipo_servicio();
			}
		
		});
		
	});
	
}());

//ELIMINAR TIPO DE SERVICIO
$(document).on('click','#btn_eliminar_tipo_servicio', function(){
		
	let elemento = $(this)[0].parentElement.parentElement.parentElement;
	let id_servicio = $(elemento).attr('data-id');
	let id_valida = $("#id_valida").val();
	
	Swal.fire({
		position:'center',
		title:'Deseas eliminar el registro',
		icon:'error',
		showConfirmButton:true,
		confirmButtonText:'Si',
		showCancelButton: true,
		cancelButtonText: 'No'
	}).then((result)=>{
		if(result.value){

					$.ajax({
						type:'POST',
						data: {id_servicio, id_valida},
						url: 'templates/servicio/eliminar_tipo_servicio.php',
						success:function(e){
							console.log(e);
							if(e=="Si"){
								Swal.fire({
									position: 'center',
									icon: 'success',
									title: 'Registro eliminado',
									timer:1500
								});
								listar_tipo_servicio();
							}
						}
					});
		}
	});	
		

});
