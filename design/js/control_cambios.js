listar();
//función para listar los cambios realizados
function listar(){
	
	$.ajax({
		type:'GET',
		url:'templates/control_cambio/listar_control_cambios.php',
		success: function(e){
				let traer = JSON.parse(e);
				let template = "";
				let template2 = "";
						//console.log(traer);
					traer.forEach(resul => {
						
						template +=
						`<tr>
							<td>${resul.fecha_registro}</td>
							<td>${resul.modulo}</td>
							<td>${resul.fecha}</td>
							<td>${resul.archivo}</td>
							<td>${resul.desc_cambio}</td>
							<td>${resul.tipo_cambio}</td>
							<td>${resul.tiempo}</td>
						</tr>`;
					});
						
				$('#registros_controlcambios').html(template);
		}
		
	});
}
//funcion para almacenar registro
(function(){
		
	$("#btn_nuevo_cambio").click(function(){
		const nuevo_control = {
			fecha_realizacion:$("#fecha_realizacion").val(),
			tiempo_requerido:$("#tiempo_requerido").val(),
			desc_cambio:$("#descripcion_cambio").val(),
			tipo_cambio:$("#tipo_cambio").val(),
			modulo:$("#modulo").val(),
			archivo:$("#archivo").val(),
			usuario:$("#id_valida").val()
		}
		$.post('templates/control_cambio/nuevo_controlcambio.php', nuevo_control ,function(e){
				console.log(e);
				if(e == "si"){
					Swal.fire({
						position:'center',
						icon:'success',
						title:'Control de cambio',
						timer:1500
					});
					listar();
				}
			}
		)
		});
}());


//listar control con su id base
(function(){
	$("#btn_editar_control").click(function(){
			const conjunto = {
				fecha_registro: $("#fecha_registro").val(),
				fecha_cambio: $("#fecha_cambio").val(),
				modulo : $("#modulo").val(),
				tipo_cambio: $("#tipo_cambio").val(),
				archivo: $("#archivo").val(),
				desc_control: $("#desc_control").val(),
				tiempo: $("#tiempo").val(),
				id: $("#id").val(),
				usuario: $("#id_valida").val()
			}
			$.post('templates/control_cambio/edit_control.php',conjunto, function(e){
					if(e=="si"){
						Swal.fire({
						position:'center',
						icon:'success',
						title:'Registro Modificado',
						showConfirmButton: true,
						ConfirmButtonText:'Ok'
					}).then((result)=>{
							if(result.value){
								//location.reload();
							}
						})
					}
				}
			);
	});
}());


