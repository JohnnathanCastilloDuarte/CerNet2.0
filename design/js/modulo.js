listar_modulos();
let cambio = false;
$("#nombre_modulo").val('');
$("#area_modulo").val('');

//listar modulos
function listar_modulos(){
	$.ajax({
		type:"GET",
		url:'templates/modulo/listar_modulos.php',
		success:function(e){
			let traer = JSON.parse(e);
			let template = '';
			
			traer.forEach((result)=>{
				template +=
				`
				<tr data-id="${result.id_modulo}">
					<td width="40%">${result.nombre}</td>
					<td width="30%">${result.area}</td>
					<td style="text-align: center;"  width="30%">
						
							<a id="editar_modulo" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info" ><i class="lnr-pencil btn-icon-wrapper"></i></a>
							<a id="eliminar_modulo" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger"><i class="lnr-cross btn-icon-wrapper"></i></a>
					
					</td>
				</tr>
				`;
			});
			
			$("#lista_modulos").html(template);
		}	
	});
}

//traer para editar
$(document).on('click','#editar_modulo',function(){
	let elemento = $(this)[0].parentElement.parentElement;
	let id_modulo = $(elemento).attr('data-id');
		cambio = true;
	$.post('templates/modulo/lista_modulo.php', {id_modulo} , function(respuesta){
		const traido = JSON.parse(respuesta);
				console.log(traido.nombre)
		$('#nombre_modulo').val(traido.nombre);
		$('#area_modulo').val(traido.area);
		$('#id_oculto').val(traido.id_modulo);
	
	
	});
});

//crear modulo
(function(){
	
	$("#btn_nuevo_modulo").click(function(){
			
		const datos = {
			 nombre : $("#nombre_modulo").val(),
			 area : $("#area_modulo").val(),
			 id_modulo : $("#id_oculto").val(),
			id_valida :$("#id_valida").val()
		}
			let url = cambio === false ? 'templates/modulo/crear_modulo.php':'templates/modulo/editar_modulo.php';
			
				$.post(url, datos, function(e){
						console.log(e);
						if(e == "creado"){
							Swal.fire({
								position:'center',
								title:'Registro Creado',
								icon:'success',
								timer:1500
							});
							$("#nombre_modulo").val('');
							$("#area_modulo").val('');
							listar_modulos();
						}
					else if(e == "modificado"){
						Swal.fire({
							position:'center',
							title:'Registro Modificado',
							icon: 'success',
							timer:1500
						});
							$("#nombre_modulo").val('');
							$("#area_modulo").val('');
							listar_modulos();
					}
					
				});
	});
	
}());

//eliminar modulo 

$(document).on('click','#eliminar_modulo',function(){
	let elemento = $(this)[0].parentElement.parentElement;
	let id_modulo = $(elemento).attr('data-id');
	const enviar = {
		id_modulo,
		id_valida : $("#id_valida").val()
	}
		
	
	Swal.fire({
		position:'center',
		icon:'error',
		title:'Seguro desea eliminar el registro ?',
		showConfirmButton:true,
		confirmButtonText:'Si!',
		showCancelButton:true,
		cancelButtonText:'No!'
		
	}).then((result)=>{
		if(result.value){
			$.post('templates/modulo/eliminar_modulo.php', enviar , function(respuesta){
				console.log(respuesta)
				if(respuesta == "eliminado"){
					Swal.fire({
						position:'center',
						title:'Registro eliminado',
						icon:'success',
						timer:1500
					});
					
					$("#nombre_modulo").val('');
					$("#area_modulo").val('');
					listar_modulos();
				}
		
	});		
			
		}
		
	});
	
});