$("#resultados_busqueda_tipo_servicios").hide();
$("#equipos_asignados").hide();
$("#anuncio_click_gestionar_2").hide();
$(".tabla_equipos_asignados").hide();
$("#anuncio_click_gestionar_3").hide();
mostrar_servicios();
servicios_asignados();
listar_servicios();

//FUNCTION PARA BUSCAR TIPO DE SERVICIOS
(function(){
	
	$("#buscar_tipo_servicio").keyup(function(){
			
		let buscar = $("#buscar_tipo_servicio").val();
			
		if(buscar.length > 1){
			
			$.ajax({
				type:'POST',
				data: {buscar},
				url: 'templates/OT/buscador_tipo_servicio.php',
				success: function(e)
				{
					//console.log(e);
					if(e != ""){
						
					$("#resultados_tipo_servicios").hide();	
					$("#resultados_busqueda_tipo_servicios").show();	
						
					let traer = JSON.parse(e);
					let template = "";
						
						traer.forEach((result)=>{
							template += 
								`
					<div class="col-sm-6 mb-2" style="text-align:center;">
						<div class="card">
							<div class="card body">
								<div class="row">
									<div class="col-sm-12" style="text-align:center;">
										<i class="fa fa-cog icon-gradient bg-mean-fruit"></i>
										<label class="text-info">${result.servicio}</label>
										<br>
										<br>
										<button class="mb-2 btn-shadow btn-outline-2x btn btn-outline-info asignar_servicio" style="width:50%;"  data-id="${result.id_tipo_servicio}">
											Asignar
										</button>
									
									</div>
								</div>
								
							</div>
						</div>
					</div>


								`;
						});
						
						$("#resultados_busqueda_tipo_servicios").html(template);
						
					}	
				}
				
			});
			
		}
		else{
			$("#resultados_tipo_servicios").show();	
					$("#resultados_busqueda_tipo_servicios").hide();	
			
		}
		
		
			
		
	});
	
}());

//FUNCIÓN PARA MOSTRAR LOS SERVICIOS DES-ASGINADOS
function mostrar_servicios(){
	
	let id_ot = $("#id_ot_asignar_oculto").val();
	
	
	$.ajax({
		type:'GET',
		url: 'templates/OT/buscar_tipo_servicio.php',
		data: {id_ot},
		success:function(e){
			let traer = JSON.parse(e);
			let template = "";
			
			traer.forEach((result)=>{
				
				template +=
				`
				<div class="col-sm-6 mb-2" style="text-align:center;">
						<div class="card">
							<div class="card body">
								<div class="row">
									<div class="col-sm-12" style="text-align:center;">
										<i class="fa fa-cog icon-gradient bg-mean-fruit"></i>
										<label class="text-info">${result.servicio}</label>
										<br>
										<br>
										<button class="mb-2 btn-shadow btn-outline-2x btn btn-outline-info asignar_servicio" style="width:50%;"  data-id="${result.id_tipo_servicio}">
											Asignar
										</button>
									
									</div>
								</div>
								
							</div>
						</div>
					</div>		
					`;
			});
			
			$("#resultados_tipo_servicios").html(template);
				
		}
	});
}

//FUNCIÓN PARA MOSTRAR EN TABLA SERVICIOS ASIGNADOS
function servicios_asignados(){
	let id_ot = $("#id_ot_asignar_oculto").val();
	
	
	$.ajax({
		type:'POST',
		url: 'templates/OT/buscar_servicios_asignados.php',
		data:{id_ot},
		success:function(e){
			let traer = JSON.parse(e);
			let template = "";
			let estado = "";
			let color = "";
			let clase = "";
			
			traer.forEach((result)=>{
						if(result.estado == 1){
							estado = "Des-asignar";
							color = "warning";
							clase = "btn-des-asignar"
						}else{
							estado="Asignar";
							color = "success";
							clase = "btn-asignar";
						}
				
					
				template +=
					`
						<tr>
								<td>${result.id_servicio}</td>
								<td>${result.servicio}</td>
								<td><a href="#" class="btn btn-${color} ${clase}" data-id="${result.id_servicio}" >${estado}</a></td>
						</tr>
					`;
				
			});
			
			$("#resultado_servicios_asignados").html(template);
		}
		
	});
}

//FUNCION PRINCIPAL PARA PROCESAR LA ASIGNACIÓN Y DES ASIGNACIÓN DE LOS SERVICIOS
(function(){
	//FUNCIÓN PARA CONTROLAR LA ASIGNACIÓN DE SERVICIOS
	$(document).on('click','.asignar_servicio',function(){
	let id_tipo_servicio = $(this).attr('data-id');
	let id_ot = $("#id_ot_asignar_oculto").val();
	
	const datos = {
		id_tipo_servicio,
		id_ot,
		id_valida :$("#id_valida").val()
	}
	
		$.post('templates/OT/asignar_servicio.php', datos, function(e){
			console.log(e);
			if(e == "Asignado"){
				Swal.fire({
					position:'center',
					icon:'success',
					title:'Servicio asignado',
					timer:1500
				});
				servicios_asignados();
				listar_servicios();
				$("#anuncio_click_gestionar_2").hide();
				$(".tabla_equipos_asignados").hide();
				$("#anuncio_click_gestionar_3").hide();
			}
			
		});
});

//FUNCIÓN PARA CONTROLAR EL DES-ASGINAR EL SERVICIO
	$(document).on('click','.btn-des-asignar', function(){
		let id_servicio = $(this).attr('data-id');
		let id_valida = $("#id_valida").val();	
		
	
		Swal.fire({
			position:'center',
			icon:'error',
			title: '¿ Seguro deseas des-asignar el servicio ?',
			showCancelButton : true,
			showconfirmButton : true,
			cancelButtonText: 'No',
			confirmButtonText: 'Si',			
		}).then((result)=>{
			
			if(result.value){
		

					const datos = {
						id_servicio,
						id_valida
					}

					$.post('templates/OT/des_asignar_servicio.php', datos, function(e){

							if(e=="Des-Asignado"){
								Swal.fire({
									position:'center',
									icon: 'success',
									title: 'Servicio Des-Asignado correctamente',
									timer: 1500
								});

							}
						servicios_asignados();
						listar_servicios();
						$("#anuncio_click_gestionar_2").hide();
						$(".tabla_equipos_asignados").hide();
						$("#anuncio_click_gestionar_3").hide();
					});
				
	}
		});
		
		
});
	
	
	//FUNCIÓN PARA CAMBIAR EL ESTADO A ASIGNADO
	
		$(document).on('click','.btn-asignar',function(){
		
			let id_servicio = $(this).attr('data-id');
			let id_valida = $("#id_valida").val();	
				
			Swal.fire({
			position:'center',
			icon:'error',
			title: '¿ Seguro deseas asignar el servicio ?',
			showCancelButton : true,
			showconfirmButton : true,
			cancelButtonText: 'No',
			confirmButtonText: 'Si',			
		}).then((result)=>{
			
			if(result.value){
		

					const datos = {
						id_servicio,
						id_valida
					}

					$.post('templates/OT/re_asignar_servicio.php', datos, function(e){

							if(e=="Re-Asignado"){
								Swal.fire({
									position:'center',
									icon: 'success',
									title: 'Servicio Re-Asignado correctamente',
									timer: 1500
								});

							}
						servicios_asignados();
						listar_servicios();
						$("#anuncio_click_gestionar_2").hide();
						$(".tabla_equipos_asignados").hide();
						$("#anuncio_click_gestionar_3").hide();		
					});
				
	}
		});
		
			
			
		});
	
}());

//LISTAR LOS SERVICIOS LOS CUALES SE ENCUENTRAN ASIGNADOS A LA OT
function listar_servicios(){
	
	let ot = $("#id_ot_asignar_oculto").val();
	
	$.ajax({
		type: 'POST',
		data: {ot},
		url:'templates/OT/listar_servicios_asignados.php',
		success: function(e){
			
			let traer = JSON.parse(e);
			let template = "";
			
			traer.forEach((result)=>{
				console.log(result.id_servicio);
				template += 
					`<div class="col-sm-6 mb-2" style="text-align:center;">
						<div class="card">
							<div class="card body">
								<div class="row">
									<div class="col-sm-12" style="text-align:center;">
										<i class="pe-7s-note2 bg-mean-fruit"></i>
										<label class="text-info">${result.tipo_servicio}</label>
										<br>
										<br>
										<button class="mb-2 btn-shadow btn-outline-2x btn btn-outline-info gestionar_servicio" style="width:50%;"  data-id="${result.id_servicio}">
											Gestionar
										</button>
									
									</div>
								</div>
								
							</div>
						</div>
					</div>
						
					`;
			});
		
			$("#servicios_para_items").html(template);
			
		} 
			
	});
	
}

//FUNCION PARA CONTROLAR BOTONES DEL MODULO ASIGNAR ITEM
(function(){
	
	$(document).on('click','.gestionar_servicio',function(){
		
		let id_servicio = $(this).attr('data-id');
		$("#anuncio_click_gestionar").hide();
		$("#equipos_asignados").show();
		listar_equipos(id_servicio, id_servicio);
		equipos_asignados(id_servicio);	
		
	});
	
	
	$(document).on('click','#asignar_equipo_item_asignados', function(){
			
		let id_item = $(this).attr('data-id');
		let elemento = $(this)[0].parentElement.parentElement;
		let id_servicio = $(elemento).attr('id-servicio');
		let id_valida = $("#id_valida").val();
		
		const datos = {
			id_item,
			id_servicio,
			id_valida
		}

	$.post('templates/OT/asignando_equipo.php',datos,function(e){
		console.log(e);
		if(e=="Existe"){
			Swal.fire({
				position:'center',
				title:'El item ya se encuentra agregado, selecciona otro item',
				icon:'error',
				timer: 1500
			});
		}
		
		else if(e == "Asignado"){
			Swal.fire({
				position:'center',
				title:'Equipo asignado correctamente',
				icon:'success',
				timer: 1500
			});
			equipos_asignados(id_servicio);
		}
	});
			
	});
	
	
	$(document).on('click','#asignar_item_servicio',function(){
		let elemento = $(this)[0].parentElement.parentElement;
		let id_servicio = $(elemento).attr('data-id');
		let id_asignado = $(this).attr('data-id');
		let id_valida = $("#id_valida").val();
		
		$.ajax({
			type : 'POST',
			data : {id_asignado, id_valida},
			url : 'templates/OT/estado_asignado_item.php',
			success: function(e){
				if(e == "Des-asignado"){
					Swal.fire({
						position: 'center',
						icon: 'success',
						title: 'Item des-asignado correctamente',
						timer: 1500,
					});
					listar_equipos(id_servicio);
					equipos_asignados(id_servicio);
					
				}
			}
			
		});
		
		
	});
	
		$(document).on('click','#des-asignar_item_servicio',function(){
			let elemento = $(this)[0].parentElement.parentElement;
			let id_servicio = $(elemento).attr('data-id');
			let id_asignado = $(this).attr('data-id');
			let id_valida = $("#id_valida").val();
		
			$.ajax({
			type : 'POST',
			data : {id_asignado, id_valida},
			url : 'templates/OT/estado_des-asignado_item.php',
			success: function(e){
				console.log(e);
				if(e == "asignado"){
					Swal.fire({
						position: 'center',
						icon: 'success',
						title: 'Item asignado correctamente',
						timer: 1500,
					});
					listar_equipos(id_servicio);
					equipos_asignados(id_servicio);
					
				}
			}
			
		});
		
	});
	
}());



//FUNCION PARA LISTAR EQUIPOS
function listar_equipos(id_servicio){
	let ot = $("#id_ot_asignar_oculto").val();
	let id_empresa = $("#id_empresa_numot").val();
	let e2 = "";
	const data = {
		ot,
		id_empresa,
		id_servicio
	}
	
		$.post('templates/OT/listar_equipos.php', data ,function(e){
      console.log(e);
			let traer =  JSON.parse(e);
			let template = "";
			let boton = "";
				
					if(traer.length == 0){
						Swal.fire({
							title:'Mensaje',
							text:'No se ha creado ningun equipo',
							timer:2000,
							icon:'warning'
						});
					}else{
						traer.forEach((result)=>{
				
							template += `
								<tr id-servicio = "${id_servicio}">
									<td>${result.id_item}</td>
									<td>${result.nombre_item}</td>
									<td>${result.desc_item}</td>
									<td><button class='btn btn-success' id='asignar_equipo_item_asignados' data-id = '${result.id_item}'>Agregar</button></td>
								</tr>

							`;
						});
					}
				
				
			
			
			$("#resultados_equipos_servicio").html(template);
				
		});
	
	
}

//FUNCION PARA LISTAR LOS EQUIPOS ASIGNADOS
function equipos_asignados(id_servicio){
	
	let ot = $("#id_ot_asignar_oculto").val();
	let id_empresa = $("#id_empresa_numot").val();
	
	const datos = {
		id_servicio,
		ot,
		id_empresa
	}
	$.post('templates/OT/listar_equipos_asignados.php', datos, function(e){
		//alert(e);
		let traer = JSON.parse(e);
		let template = "";
		let color = "";
		let cambio = "";
		let texto = "";
		
		if(traer.length == 0){
			$("#anuncio_click_gestionar_2").show();
			$(".tabla_equipos_asignados").hide();
			$("#anuncio_click_gestionar_3").hide();
		}else{
			$("#anuncio_click_gestionar_2").hide();
			$(".tabla_equipos_asignados").show();
			$("#anuncio_click_gestionar_3").show();
			traer.forEach((result)=>{
				
				if(result.estado == 0){
						color = "success";
						texto = "Asignar";
						cambio = "asignar_item_servicio";
					
					}
				else if(result.estado == 1){
						color = "danger";
						texto = "Des-asignar";
						cambio = "des-asignar_item_servicio";
					}
				
				template += 				
				 `
					<tr data-id = "${result.id_servicio}">
						<td>${result.nombre_item}</td>
						<td>${result.tipo_servicio}</td>
						<td>${result.fecha_registro}</td>
						<td><button class="btn btn-${color}" id="${cambio}" data-id="${result.id_asignado}">${texto}</button></td>
					</tr>

         `;
			});
			
			$("#resultado_equipos_asignados").html(template);
			
		}
		
	});

	
}



