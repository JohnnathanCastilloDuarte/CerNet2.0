listar_errores();
//listar errores
function listar_errores(){
	$.ajax({
		type:'GET',
		url:'templates/error/listar_errores.php',
		success:function(e){
			let traer = JSON.parse(e);
			let template = "";
			
				traer.forEach(result=>{
					template += 
						`
					<tr>
						<td>${result.id_error}</td>
						<td>${result.concepto}</td>
						<td>${result.modulo}</td>
						<td>${result.solucion}</td>
					</tr>
					`;
				});
			$("#errores").html(template);
		}
			
	});
}

//crear errores
(function(){
	$("#btn_nuevo_error").click(function(){
		
		const llevar = {
			concepto : $("#concepto_error").val(),
			modulo : $("#modulo_error").val(),
			solucion : $("#solucion_error").val()
		}
		
		$.post('templates/error/crear_error.php', llevar, function(e){
				console.log(e);
			if(e == "si"){
					Swal.fire({
						position:'center',
						timer: 1500,
						title:'Registro Creado',
						icon:'success'
					});
					listar_errores();
				}
			
		});
		
	});
	
}());

//modificar errores
(function(){
	$("#btn_editar_error").click(function(){
		const datos = {
			id_error :$("#id_error_editar").val(),
			concepto :$("#concepto_editar").val(),
			id_modulo :$("#modulo_editar").val(),
			solucion:$("#solucion_editar").val()
		}
		$.post('templates/error/edit_error.php', datos, function(e){
				if(e=="si"){
					Swal.fire({
						position:'center',
						title:'Registro actualizado',
						icon:'success',
						showConfirmButton:true
					}).then((result) => {
						if(result.value){
							location.reload();
						}
					});
				}
		});
	});
}());

