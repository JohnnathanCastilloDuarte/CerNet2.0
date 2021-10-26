$("#crear_nombre_refrigeradores").hide();
$(".mostrar_sensores_contenedor_refrigerador").hide();
//VARIABLES
var id_mapeo = "";
var id_bandeja = "";
var id_asignado = $("#id_asignado").val();
var id_valida = $("#id_valida").val();


//LLAMDAS DE FUNCIONES
listar_bandejas();
contar_registros();
setear_campos();
listar_mapeos();
contar_registro_informes();
listar_inf_base();
listar_mapeos_inf_base();
imagenes_equipo_base();
imagenes_equipo_base_sensores();
listar_participantes();
traer_consecutivo();




$("#formulario").submit(function(e){
	e.preventDefault();
});


//FUNCIÓN PARA SETEAR CAMPOS
	function setear_campos(){
		$("#fecha_inicio_mapeo").val("");
		$("#hora_inicio_mapeo").val("");
		$("#minuto_inicio_mapeo").val("");
		$("#segundo_inicio_mapeo").val("");
		$("#fecha_fin_mapeo").val("");
		$("#hora_fin_mapeo").val("");
		$("#minuto_fin_mapeo").val("");
		$("#segundo_fin_mapeo").val("");
		$("#intervalo").val("");
		$("#humendad_minima").val("");
		$("#humendad_maxima").val("");
		$("#temperatura_minima").val("");
		$("#temperatura_maxima").val("");
		$("#valor_seteado_humedad").val("");
		$("#valor_seteado_temperatura").val("");
        $("#tipo_de_mapeo").val("");
        $("#incluir_informe_base").val("");
        $("#nombres_personal").val(""); 
        $("#apellidos_personal").val("");
        $("#cargo_personal").val("");
        $("#incluir_informe_base").val("");
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////7


//FUNCIÓN PARA VALIDAR LOS CAMPOS
$(document).on('keyup','#hora_inicio_mapeo',function(){
	
	let hora = $("#hora_inicio_mapeo").val();
	
	if(hora > 24 || hora < 0){
		$("#hora_inicio_mapeo").val("");
		Swal.fire({
			position:'center',
			icon:'error',
			title:'La hora no es valida',
			toast:true,
			timer:1500
		});
	}
	
});
$(document).on('keyup','#minuto_inicio_mapeo',function(){	
	
	let minuto = $("#minuto_inicio_mapeo").val();

	
	if(minuto > 60 || minuto < 0){
		$("#minuto_inicio_mapeo").val("");
		Swal.fire({
			position:'center',
			icon:'error',
			title:'Los minutos no son validos',
			toast:true,
			timer:1500
		});
	}
	else if(typeof(minuto) == string){
		$("#minuto_inicio_mapeo").val("");
		Swal.fire({
			position:'center',
			icon:'error',
			title:'No puedes digitar letras',
			toast:true,
			timer:1500
		});
	}
	
});


//campos ocultos
$("#cuerpo_mapeo").hide();
$("#btn_actualizar_mapeo").hide();
$("#change_mapeo").hide();
$("#asignacion_mapeo").hide();
$("#btn_actualizar_bandeja").hide();
$("#asignacion_informe").hide();
$("#traer_informes_refrigeradores").hide();
$("#mostrar_grafica").hide();
$("#personal_2").hide();
$("#editar_personal").hide();


//LISTAR BANDEJAS
function listar_bandejas(){
	
	
	$.ajax({
		type:'POST',
		url:'templates/refrigeradores/listar_bandeja.php',
		data: {id_asignado},
		success:function(e){

			let traer = JSON.parse(e);
			let template = "";
			traer.forEach((result)=>{
				template += 
				`
				<tr>
					<td>${result.nombre}</td>
					<td>
						<div style='text-align:center;'>
								<button class="btn btn-success" data-id="${result.id_bandeja}" id="modificar_bandeja_creada" data-nombre = "${result.nombre}"><i class="pe-7s-check">	</i></button>
								<button class="btn btn-danger" data-id="${result.id_bandeja}" id="eliminar_bandeja_creada">X</button>			
						</div>
					</td>
				</tr>				
				`;
			});
			$("#resultados_bandeja_refrigerador").html(template);
		}
	});
}

(function(){
//MODIFICAR BANDEJAS 
$(document).on('click','#modificar_bandeja_creada', function(){
	
	$("#btn_actualizar_bandeja").show();
	$("#btn_nueva_bandeja").hide();
	
		 id_bandeja = $(this).attr('data-id');
	let nombre = $(this).attr('data-nombre');
	

	
	$("#bandeja").val(nombre);

});

	$("#btn_actualizar_bandeja").click(function(){
		
			let nombre_bandeja = $("#bandeja").val();
			let id_valida = $("#id_valida").val();
			
		
			const datos = {
			id_bandeja,
			nombre_bandeja,
			id_asignado,
			id_valida
		}
			
		$.post('templates/refrigeradores/actualizar_bandeja.php', datos, function(e){

		if(e=="Modificado"){
			Swal.fire({
				position:'center',
				icon:'success',
				title:'La bandeja ha sido modificada',
				timer:1500,
			});
			
			$("#bandeja").val("");
			$("#bandeja").text("");
			$("#btn_actualizar_bandeja").hide();
			listar_bandejas();
			contar_registros();			
		}
		
	});
			
			
		});

//ELIMINAR BANDEJA
$(document).on('click','#eliminar_bandeja_creada',function(){
	let id_bandeja = $(this).attr('data-id');
	
	let id_valida = $("#id_valida").val();
	
	const data = {
		id_bandeja,
		id_asignado,
		id_valida
	}
	
	Swal.fire({
		position:'center',
		icon:'error',
		title:'Deseas eliminar la bandeja ?',
		showConfirmButton:true,
		showCancelButton:true,
		confirmButtonText:'Si!',
		cancelButtonText:'No!',
	}).then((result)=>{
		if(result.value){
			
			$.post('templates/refrigeradores/eliminar_bandeja.php', data, function(e){
			
				if(e == "Eliminado"){
						Swal.fire({
							position:'center',
							icon:'success',
							title:'La bandeja ha sido eliminada',
							timer:1500
						});
						listar_bandejas();	
					}
					
					else if(e == "No"){
						Swal.fire({
							
							position:'center',
							icon:'error',
							title:'La bandeja esta asociada a un mapeo y/o sensor, No puede ser eliminada',
							timer:1600
						});
						
					}
					
				
			});
		}
	})

	
});
}());

//VALIDAR NOMBRE BANDEJA
(function(){
	
	$("#bandeja").keyup(function(){
		
		let bandeja = $(this).val();
		
		
		if(bandeja.length > 0){
		
			$.ajax({
				type:'POST',
				data:{bandeja, id_asignado},
				url:'templates/refrigeradores/validar_bandejas.php',
				success:function(e){
					
				
					
				if(e=="Existe"){
					
					Swal.fire({
						position:'center',
						icon: 'error',
						title:'El nombre de la bandeja ya existe para este servicio',
						timer: 1500						
					});
					
					$("#btn_nueva_bandeja").hide();
				}else{
					$("#btn_nueva_bandeja").show();
				}

				}
			});
		
		}else{
			Swal.fire({
						position:'center',
						icon: 'error',
						title:'Debes crear un nombre para la bandeja',
						timer: 1500						
					});
			$("#btn_nueva_bandeja").hide();
		}
		
	});
		
	
}());

//CREAR BANDEJAS 
$(function(){
	$("#btn_nueva_bandeja").click(function(){
		
	
		var bandeja = $("#bandeja").val();
		
		const datos = {
			id_asignado,
			bandeja,
			id_valida : $("#id_valida").val()
		}
			
		$.post('templates/refrigeradores/crear_bandeja.php',datos, function(e){
			if(e=="creado"){
				Swal.fire({
					position:'center',
					icon:'success',
					title:'Bandeja(s) creada(s) con exito',
					timer:1500
				});
				listar_bandejas();
				contar_registros();
			}
			
		});
		
		
		
	});
	
}());

//FUNCIÓN PARA CONTAR LA CANTIDAD DE REGISTROS
function contar_registros(){
	$.ajax({
		type: 'POST',
		url:'templates/refrigeradores/contar_bandeja.php',
		data: {id_asignado},
		success:function(e){
			let x = 0;
			if(e == 0){
				x = 1;
			}else{
				x = e;
			}
			
			$("#cuantas_bandeja").val(x);
			if(e > 0){
				$("#cuerpo_crear_mapeo_refrigerador").show();
        $("#cuerpo_ver_mapeo_refrigerador").show();
      
			}else{
				//$("#anuncio_mapeo_1").show();
				$("#cuerpo_crear_mapeo_refrigerador").hide();
			}
		}
		
	});
	
	
	//CONTAR REGISTROS PARA MAPEo
	
	$.ajax({
		type:'POST',
		url:'templates/refrigeradores/contar_mapeo.php',
		data: {id_asignado},
		success:function(e){
			if(e > 0){
				$("#asignacion_mapeo").show();
			}else{
				$("#asignacion_mapeo").hide();
			}
		}
	});
	
}


//FUNCION PARA CONTAR REGISTRO DE LOS INFORMES
function contar_registro_informes(){

    const datos = {
      id_asignado, id_mapeo
    }
	
	
		$.ajax({
			
			type:'POST',
			data:datos,
			url: 'templates/refrigeradores/contar_registro_informes.php',
			success:function(e){
				if(e == "Abrete"){
						$("#asignacion_informe").show();
				}else{
					$("#asignacion_informe").hide();
				}
				
			}
			
		});
}


////////////////////////////////////////////////FUNCIONES PARA EL MAPEO//////////////////////////////////


//CREACIÓN DEL MAPEO
(function(){
	$("#btn_nuevo_mapeo").click(function(){
				 
	  
		let selector_mapeo_refrigerador = $("#selector_mapeo_refrigerador").val();
        let crear_nombre_refrigeradores = $("#crear_nombre_refrigeradores").val();
		let fecha_inicio_mapeo = $("#fecha_inicio_mapeo").val();
		let hora_inicio_mapeo = $("#hora_inicio_mapeo").val();
		let minuto_inicio_mapeo = $("#minuto_inicio_mapeo").val();
		let segundo_inicio_mapeo = $("#segundo_inicio_mapeo").val();
		let fecha_fin_mapeo = $("#fecha_fin_mapeo").val();
		let hora_fin_mapeo = $("#hora_fin_mapeo").val();
		let minuto_fin_mapeo = $("#minuto_fin_mapeo").val();
		let segundo_fin_mapeo = $("#segundo_fin_mapeo").val();
		let intervalo = $("#intervalo").val();
		let humendad_minima = $("#humendad_minima").val();
		let humendad_maxima = $("#humendad_maxima").val();
		let temperatura_minima = $("#temperatura_minima").val();
		let temperatura_maxima = $("#temperatura_maxima").val();
		let valor_seteado_humedad = $("#valor_seteado_humedad").val();
		let valor_seteado_temperatura = $("#valor_seteado_temperatura").val();
    let incluir_inf_base = $("#informe_base_refrigerador").val();
    let nombre_mapeo = "";
    
    if(selector_mapeo_refrigerador == "crear_nombre"){
      nombre_mapeo = crear_nombre_refrigeradores;
    }else{
      nombre_mapeo = selector_mapeo_refrigerador;
    }
    
    
		const datos = {
		  nombre_mapeo,
			fecha_inicio_mapeo,
			hora_inicio_mapeo,
			minuto_inicio_mapeo,
			segundo_inicio_mapeo,
			fecha_fin_mapeo,
			hora_fin_mapeo,
			minuto_fin_mapeo,
			segundo_fin_mapeo,
			intervalo,
			humendad_minima,
			humendad_maxima,
			temperatura_minima,
			temperatura_maxima,
			valor_seteado_humedad,
			valor_seteado_temperatura,
			id_asignado : $("#id_asignado").val(),
			id_valida: $("#id_valida").val(),
      incluir_inf_base
		}
	
		$.post('templates/refrigeradores/crear_mapeo.php', datos , function(e){	 
			if(e=="Creado"){
				Swal.fire({
					position:'center',
					title:'El mapeo ha sido creado',
					icon:'success',
					timer:1500
				});
				listar_mapeos();
				setear_campos();
				//contar_registros();
				crear_informes_refrigeradores(2);
        listar_inf_base();
        listar_mapeos();
			}
		});
			
	});
	
}());

//LISTAR MAPEO
function listar_mapeos(){
	$.ajax({
		type : 'POST',
		data : {id_asignado},
		url:'templates/refrigeradores/listar_mapeos.php',
		success:function(e){	
			let traer = JSON.parse(e);
			let template = "";
			let template2 = "";
			
			traer.forEach((result)=>{
				
				template +=
				`
				<tr>
					<td>${result.nombre}</td>
					<td>${result.fecha_inicio} ${result.hora_inicio}</td>
					<td>${result.fecha_final} ${result.hora_final}</td>
					<td>${result.intervalo}</td>
					<td>${result.humedad_minima}</td>
					<td>${result.humedad_maxima}</td>
					<td>${result.temperatura_minima}</td>
					<td>${result.temperatura_maxima}</td>
					<td>
						<div style="text-align:center;">
							<button class="btn btn-success" data-id="${result.id_mapeo}" id="modificar_mapeo_creada"><i class="pe-7s-check"></i></button>
							<button class="btn btn-danger" data-id="${result.id_mapeo}" id="eliminar_mapeo_creada_refrigerador">X</button>
						</div>
					</td>

				</tr>

				`
			});
			
			traer.forEach((result)=>{
				template2+= 	
				`
				<tr>
					<td>${result.nombre}</td>
					<td><button class="btn btn-success" id="buscar_bandeja_asignada" data-id="${result.id_mapeo}"  data-id-2="${id_asignado}" nombre="${result.nombre}" ><i class="lnr-checkmark-circle"></i></button></td>
				</tr>

				`;
			});
			
			$("#listando_mapeos_creados").html(template2);
			$("#listando_mapeos").html(template);

		
		}
	});
}

//EVENTOS BOTONS ELIMINAR Y MODIFICAR MAPEOS
(function(){
	$(document).on('click','#modificar_mapeo_creada',function(){
		
		$("#btn_actualizar_mapeo").show();
		$("#btn_nuevo_mapeo").hide();
		$("#change_mapeo").show();
	
		
		Swal.fire({
			position:'center',
			icon : 'info',
			title:'Revisa la pestaña de Mapeo para modificar los datos',
			timer:1600
		});
		
		let id_mapeo = $(this).attr('data-id');
    let mapeo_tipo = "";
		
			$.ajax({
				type:'POST',
				data: {id_mapeo},
				url: 'templates/refrigeradores/llamar_editar_mapeo.php',
				success:function(e){
				let traer = JSON.parse(e);
			
              if(traer.tipo_mapeo == 0){
                
                mapeo_tipo = "Sin carga";
              }else{
                mapeo_tipo = "Con carga";
              }
          
              if(traer.informe_base == 1){
                $("#incluir_informe_base").attr('checked', true);
              }else{
                 $("#incluir_informe_base").attr('checked', false);
              }
       
          
						$("#nombre_mapeo").val(traer.nombre);
						$("#fecha_inicio_mapeo").val(traer.fecha_inicio);
						$("#hora_inicio_mapeo").val(traer.hora_inicio);
						$("#minuto_inicio_mapeo").val(traer.minuto_inicio);
						$("#segundo_inicio_mapeo").val(traer.segundo_inicio);
						$("#fecha_fin_mapeo").val(traer.fecha_final);
						$("#hora_fin_mapeo").val(traer.hora_final);
						$("#minuto_fin_mapeo").val(traer.minuto_final);
						$("#segundo_fin_mapeo").val(traer.segundo_final);
						$("#intervalo").val(traer.intervalo);
						$("#humendad_minima").val(traer.humedad_minima);
						$("#humendad_maxima").val(traer.humedad_maxima);
						$("#temperatura_minima").val(traer.temperatura_minima);
						$("#temperatura_maxima").val(traer.temperatura_maxima);
						$("#valor_seteado_humedad").val(traer.valor_seteado_humedad);
						$("#valor_seteado_temperatura").val(traer.valor_seteado_temperatura);
						$("#id_mapeo_creado").val(traer.id_mapeo);
            $("#tipo_de_mapeo").val(mapeo_tipo);

				}
				
				
			});
		
	});
	
	
(function(){	
	$(document).on('click','#eliminar_mapeo_creada_refrigerador',function(){
    
    let id_valida = $("#id_valida").val();
    let id_mapeo_f = $(this).attr('data-id');


    const datos = {
        id_mapeo_f,
        id_asignado,
        id_valida
      }
    
		Swal.fire({
			position:'center',
			icon:'question',
			title:'Seguro ¿deseas eliminar el mapeo?',
			showConfirmButton:true,
			confirmButtonText:'Si',
			showCancelButton: true,
			cancelButtonText:'No',		
		}).then((result)=>{
			if(result.value){
				$.ajax({
          type:'POST',
          url:'templates/refrigeradores/eliminar_mapeo.php',
          data:datos,
          success:function(response){
           
						if(response == "No"){
							Swal.fire({
								position:'center',
								icon:'error',
								title:'El mapeo no puede ser eliminado debedio a que contiene información',
								timer:1500
							});
						}
						else if( response == "Eliminado"){
								Swal.fire({
								position:'center',
								icon:'success',
								title:'El mapeo ha sido eliminado correctamente',
								timer:1500
							});
							listar_mapeos();
						}
          }
        });
			}
			
		});
	
		
	});
	
		}());
}());	

//EVENTO QUE CONTROLA LA ACTIVACIÓN DEL BOTON EDITAR A NUEVO
(function(){
	$("#change_mapeo").click(function(){
		
		$("#btn_actualizar_mapeo").hide();
		$("#btn_nuevo_mapeo").show();
		$("#change_mapeo").hide();
		setear_campos();
	});
	
}());

//EDITAR MAPEO
(function(){
	$("#btn_actualizar_mapeo").click(function(){
		
    let nombre_mapeo = "";
    let selector_mapeo_refrigerador = $("#selector_mapeo_refrigerador").val();
    let crear_nombre_refrigeradores = $("#crear_nombre_refrigeradores").val();
		let fecha_inicio_mapeo = $("#fecha_inicio_mapeo").val();
		let hora_inicio_mapeo = $("#hora_inicio_mapeo").val();
		let minuto_inicio_mapeo = $("#minuto_inicio_mapeo").val();
		let segundo_inicio_mapeo = $("#segundo_inicio_mapeo").val();
		let fecha_fin_mapeo = $("#fecha_fin_mapeo").val();
		let hora_fin_mapeo = $("#hora_fin_mapeo").val();
		let minuto_fin_mapeo = $("#minuto_fin_mapeo").val();
		let segundo_fin_mapeo = $("#segundo_fin_mapeo").val();
		let intervalo = $("#intervalo").val();
		let humendad_minima = $("#humendad_minima").val();
		let humendad_maxima = $("#humendad_maxima").val();
		let temperatura_minima = $("#temperatura_minima").val();
		let temperatura_maxima = $("#temperatura_maxima").val();
		let valor_seteado_humedad = $("#valor_seteado_humedad").val();
		let valor_seteado_temperatura = $("#valor_seteado_temperatura").val();
		let id_mapeo = $("#id_mapeo_creado").val();
		let id_valida = $("#id_valida").val();
    let incluir_inf_base = $("#incluir_informe_base").val();

		
    if(selector_mapeo_refrigerador == "crear_nombre"){
      nombre_mapeo = crear_nombre_refrigeradores;
    }else{
      nombre_mapeo = selector_mapeo_refrigerador;
    }
    
    
		const datos = {
			nombre_mapeo,
			fecha_inicio_mapeo,
			hora_inicio_mapeo,
			minuto_inicio_mapeo,
			segundo_inicio_mapeo,
			fecha_fin_mapeo,
			hora_fin_mapeo,
			minuto_fin_mapeo,
			segundo_fin_mapeo,
			intervalo,
			humendad_minima,
			humendad_maxima,
			temperatura_minima,
			temperatura_maxima,
			valor_seteado_humedad,
			valor_seteado_temperatura,
			id_mapeo,
			id_asignado,
			id_valida,
      incluir_inf_base
		}
		
		$.post('templates/refrigeradores/editar_mapeo.php',datos,function(e){
			if(e=="Editado"){
				Swal.fire({
					position:'center',
					icon:'success',
					title:'El registro ha sido editado correctamente',
					showConfirmButton: false,
					timer:1000
				});
				listar_mapeos();
				setear_campos();
        $("#btn_actualizar_mapeo").hide();
        $("#btn_nuevo_mapeo").show();
        $("#change_mapeo").show();
			}
			
		});
		
	});
	}());



/////////////////////////////////////////////////////////////BUSCAR SENSORES/////////////////////////////////////////////////

//LISTAR SOLO SENSORES NO REGISTRADOS EN LA TABLA REFRIGERADORES _ SENSORES
function listar_sensores(a){
		
	$.ajax({
		type:'POST',
		data: {a},
		url:'templates/refrigeradores/listar_sensores.php',
		success:function(e){
			
			let traer = JSON.parse(e);
			let template = "";
			
				traer.forEach((result)=>{
									
					template += 
					`
					<tr data-id="${result.id_sensor}">
						<td>${result.sensor}</td>
						<td>${result.tipo}</td>
						<td>
								<button class="btn btn-success" id="agregar_sensor_refrigerador">+</button>
						</td>
					</tr>
					`;

					
					
				});
			$("#sensores_encontrados_refrigerador").html(template);
			
		}
	});
	
}

//LISTAR SOLO BANDEJAS NO REGISTRADAS A LA TABLA REFRIGERADORES _ SENSORES
function listar_bandejas_c(a){
	
	$.ajax({
		type:'POST',
		data: {a},
		url:'templates/refrigeradores/listar_bandejas_creadas.php',
		success:function(e){
				
				let traer = JSON.parse(e);
				let template = "";
			
			traer.forEach((result)=>{
			
				template+=
					`
					<tr>
						<td>${result.nombre}</td>
						<td><button class="btn btn-success" id="buscar_sensores_asignada" data-id="${result.id_bandeja}" data-nombre="${result.nombre}"><i class="lnr-checkmark-circle"></i></button></td>
					</tr>
					`;
				
			});
			
			$("#listar_bandejas_creadas").html(template);
		
		}
	});
}


//GESTIONAR LOS BOTONES PARA ASIGNAR SENSORES
(function(){
	
	$(document).on('click','#buscar_bandeja_asignada', function(){
		
		id_mapeo = $(this).attr('data-id');
		let id_asignado = $(this).attr('data-id-2');
		let nombre = $(this).attr('nombre');
	
		listar_bandejas_c(id_asignado);
		
			$("#mapeo_actual").text(" - "+nombre);
		
	});
	
}());


(function(){
	$(document).on("click","#buscar_sensores_asignada", function(){
			
		    
				  id_bandeja = $(this).attr('data-id');
					nombre_bandeja  = $(this).attr('data-nombre');
          listar_sensores();
					listar_refrigeradores_sensores(id_bandeja, id_mapeo);
          $("#nombre_bandeja").html(nombre_bandeja);
          existe_dc_refrigerador(id_mapeo);
          contar_registro_informes();
			});
}());

//AGREGAR SENSOR 
(function(){
	
	$(document).on("click","#agregar_sensor_refrigerador", function(){
				
				let elemento = $(this)[0].parentElement.parentElement;
				let id_sensor = $(elemento).attr('data-id');
		
			
					const datos = {
						id_mapeo,
						id_asignado,
						id_bandeja,
						id_sensor,
						id_valida : $("#id_valida").val()
					}
							$.post('templates/refrigeradores/agregar_sensor_mapeo.php', datos, function(e){
									
								if(e=="Asignado"){
									Swal.fire({
										position:'center',
										icon:'success',
										title:'Sensor asignado correctamente',
										timer:1500
									});
									listar_refrigeradores_sensores(id_bandeja, id_mapeo);
							
								}
								else if(e=="Existe"){
									Swal.fire({
										position:'center',
										icon:'error',
										title:'Sensor se encuentra asignado',
										timer:1500
									});
									
								}
							});	
								
							});			
				
}());

//FUNCION PARA QUITAR EL SENSOR 
(function(){
	
	$(document).on('click','#quitar_sensor_refrigerador',function(){
		
		
				let id_sensor = $(this).attr('data-id');
				
			
					const datos = {
						id_mapeo,
						id_asignado,
						id_bandeja,
						id_sensor,
						id_valida : $("#id_valida").val()
					}
				
		
		$.post('templates/refrigeradores/validar_existencia_sensor.php',datos,function(e){
			
			if(e == "Existe"){
				
				Swal.fire({
			position:'center',
			icon:'danger',
			title:'Seguro ¿Deseas des asignar el sensor?',
			showConfirmButton:true,
			confirmButtonText:'Si!',
			showCancelButton:true,
			cancelButtonText:'No!'		
		}).then((result)=>{
			if(result.value){
				$.post('templates/refrigeradores/des-asignar_sensor.php', datos, function(e){
			
					if(e=="Des-asignado"){
								Swal.fire({
									 position:'center',
									 icon:'success',
									 title:'El sensor ha sido des - asignado',
									 showConfirmButton: false,
									 timer: 600
								 });
						listar_refrigeradores_sensores(id_bandeja, id_mapeo);
						}
							 });
					
			}	
			});
				
			}
			else if(e == "No existe"){
				Swal.fire({
					position:'center',
					icon:'error',
					title:'El sensor no ha sido asignado',
					timer: 1500
				});
			}
			
		});
		
	
		
	});
	
}());



//LISTAR REFRIGERADORES_SENSORES
function listar_refrigeradores_sensores(id_bandeja, id_mapeo){

		const datos = {
			id_bandeja,
			id_mapeo,
			id_asignado
			
		}
		
		$.post('templates/refrigeradores/listar_final_mapeo.php', datos , function(e){
				
   
      
			let traer = JSON.parse(e);
			let template1 = "";
      let template2 = "";
			let a = 1;
			let button = "";
      $("#id_mapeo").val(id_mapeo);
      $("#id_asignado_form").val(id_asignado);    
			
			traer.forEach((result)=>{
					
				template1 +=`
					
					<tr>
								${result.datos_crudos}
						<td>${result.nombre_bandeja}</td>
						<td>${result.nombre_sensor}</td>
						<td><button class="btn btn-danger" id="quitar_sensor_refrigerador" data-id="${result.id_sensor}">X</button></td>
						<td>
							 <select class="form-control" data-id="${result.id_refrigerador_sensor}" id="change_posicion_sensor_refrigerador">
                  <option>${result.posicion}</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>             
               </select>
						</td>
					</tr>
				`;
				
        
        template2 +=
          `
          <input type="hidden" value="${result.id_refrigerador_sensor}" name="id_sensor_refrigerados_dc[]">
          <div class="col-sm-4">
            ${result.nombre_sensor}
          </div>
          <div class="col-sm-4">
            <select name="col_hum[]" class="form-control">
              <option value="0">0</option>
              <option value="2">1</option>
              <option value="3">2</option>
              <option value="4">3</option>
              <option value="5">4</option>
              <option value="6">5</option>
              <option value="7">6</option>
              <option value="8">7</option>
              <option value="9">8</option>
              <option value="10">9</option>
              <option value="11">10</option>
              <option value="12">11</option>
              <option value="13">12</option>
              <option value="14">13</option>  
              <option value="15">14</option>
              <option value="16">15</option>
              <option value="17">16</option>
              <option value="18">17</option>
              <option value="19">18</option>
              <option value="20">19</option>
              <option value="21">20</option>  
            </select>
          </div>
          <div class="col-sm-4">
            <select name="col_temp[]" class="form-control">
              <option value="0">0</option>
              <option value="2">1</option>
              <option value="3">2</option>
              <option value="4">3</option>
              <option value="5">4</option>
              <option value="6">5</option>
              <option value="7">6</option>
              <option value="8">7</option>
              <option value="9">8</option>
              <option value="10">9</option>
              <option value="11">10</option>
              <option value="12">11</option>
              <option value="13">12</option>
              <option value="14">13</option>  
              <option value="15">14</option>
              <option value="16">15</option>
              <option value="17">16</option>
              <option value="18">17</option>
              <option value="19">18</option>
              <option value="20">19</option>
              <option value="21">20</option> 
            </select>
          </div>
          <br>
          <br>
          `;
        
			});
			
			$("#mapeos_listos").html(template1);
			$("#trayendo_sensores_asignados_refrigeradores").html(template2);
			  
		});
	
}

//BOTON PARA CARGAR DATOS EN LA CARD/////////////////////////////7
(function(){
	
	$(document).on('click','#btn_cargar_datos_crudos',function(){
		
			$('#fechas').hide();
			let bandeja = $(this).attr('bandeja');
			let sensor = $(this).attr('sensor');
			let id_refrigerador_sensor = $(this).attr('data-id');		
			
		
		
			$("#nombre_bandeja").text(bandeja);
			$("#nombre_sensor").text(sensor);
			
			$("#id_refrigerador_sensor").val(id_refrigerador_sensor);
			$("#btn_cargar_datos_crudos").hide();
			$("#imgcargando").show();
			
		
		
		
			//CODIGO PARA CARGAR LA INFORMACIÓN DE LOS DATOS CRUDOS
		
			$.ajax({
				type:'POST',
				data: {id_refrigerador_sensor},
				url : 'templates/refrigeradores/listar_datos_crudos.php',
				success : function(response){
					
					$('#fechas').show();
					let template = "";
					
					let msj = "";
					let boton_agregar = "";
					let boton_eliminar = "";
						
						if(response == "No hay registros"){
								template = `<span class='badge badge-warning'>Actualmente no has cargado ningun archivo al sensor ${sensor}</span>`;
						}else{
							let traer = JSON.parse(response);
					traer.forEach((result)=>{
					
					if(result.sin_datos == 0 && result.hr_bajo == 0 && result.hr_alto == 0 && result.error == 0 ){
						
						msj = "<span class='badge badge-success'>Puedes cargar la información</span><br>";
						boton_agregar = `<button class="btn btn-success" id="aprobar_carga_datos_crudos" data-id="${result.id_refrigerador_sensor}"><i class="lnr-checkmark-circle">																		</i></button>`;
						boton_eliminar = `<button class="btn btn-danger" id="eliminar_datos_crudos" data-id="${result.id_refrigerador_sensor}">X</button>`;
						
					}else{
						msj = "<span class='badge badge-danger'>Corrige los errores y	vuelve a cargar el archivo</span><br>"+
										"<span class='badge badge-danger'>para poder continuar</span><br>";
						boton_eliminar = `<button class="btn btn-danger" id="eliminar_datos_crudos" data-id="${result.id_refrigerador_sensor}">X</button>`;
					}
					
					
					template +=
						`
							<span class='text-success'><h6>Se han leido en total ${result.leidos} registros</h6></span><br>
							<span class='text-danger'><h6>Errores de datos vacios = ${result.sin_datos} </h6></span><br>
							<span class='text-danger'><h6>Errores de % Hr < 10 = ${result.hr_bajo} </h6></span><br>
							<span class='text-danger'><h6>Errores de % Hr > 90 = ${result.hr_alto} </h6></span><br>
							<span class='text-danger'><h6>Datos con texto error = ${result.error} </h6></span><br>
							${msj}
							<br>
							${boton_agregar}
							${boton_eliminar}
					`;
				});
						}
					
					$("#fechas").html(template);
				}
			});
	});
	
}());

	
//FUNCIÓN PARA ELIMINAR LOS DATOS CRUDOS
(function(){
	$(document).on('click','#eliminar_datos_crudos',function(){
			
		let id = $(this).attr('data-id');
		let aprobacion = 0;
		
		Swal.fire({
			position:'center',
			icon:'question',
			title:'Seguro ¿deseas eliminar los datos crudos ?',
			showConfirmButton : true,
			showCancelButton : true,
			confirmButtonText : 'Si',
			cancelButtonText : 'No'
		}).then((result)=>{
			if(result.value){
				$.ajax({
				type:'POST',
				data:{id, aprobacion},
				url:'templates/refrigeradores/eliminar_datos_crudos.php',
				success:function(e){
						if(e == "Si"){
							Swal.fire({
							position:'center',
							icon:'question',
							title:'Ya existen datos crudos en la base de datos, ¿Deseas borrarlos?',
							showConfirmButton:true,
							confirmButtonText:'Si',
							showCancelButton:true,
							cancelButtonText:'No'	
						}).then((result)=>{
								if(result.value){
									aprobacion = 1;
									$.ajax({
										type:'POST',
										data:{id, aprobacion},
										url:'templates/refrigeradores/eliminar_datos_crudos.php',
										success:function(e){
											if(e == "Completo"){
						
												Swal.fire({
													position:'center',
													icon:'success',
													title:'Datos crudos eliminados',
													timer:1500
												});
												$('#fechas').hide();
											}
					
											listar_refrigeradores_sensores(id_bandeja, id_mapeo);
											contar_registro_informes();
											
										}
									});
								}
							});
						}
				}	
			});
				
			}
			
		});
			
	});
}());	
	//APROBAR CARGA DE DATOS CRUDOS
(function(){
		$(document).on('click','#aprobar_carga_datos_crudos',function(){

				let id = $(this).attr('data-id');
				let id_valida = $("#id_valida").val();

				const data = {
					id,
					id_valida,
					id_asignado,
					id_mapeo
				}

			$.post('templates/refrigeradores/carga_datos_crudos_db.php', data, function(e){

			if(e == "Ya"){
				Swal.fire({
					position:'center',
					icon:'error',
					title:'Ya se encuentran cargados datos crudos en la base de datos',
					timer:1600
				});
			}else{

					Swal.fire({
						position:'center',
						icon:'success',
						title:'Se ha cargado correctamente los datos crudos',
						timer:1600
					});		
				contar_registro_informes();


			}

				});
		});
		}());
	


$(document).on('submit', '#form',function(e){
		e.preventDefault();
		//$('#fechas').show();
	 var formData = new FormData(document.getElementById("form"));


	$.ajax({
    type: 'POST',
    dataType: 'html',
    data: formData,
		url: 'templates/refrigeradores/carga_datos_crudos.php',
    cache: false,
    contentType: false,
    processData: false,
    success:function(response) {
  
    
          Swal.fire({
            title:'mensaje',
            text:'Se han cargado los datos correctamente',
            icon:'success',
            timer:2000
          });
          existe_dc_refrigerador(id_mapeo);

      /*
			let traer = JSON.parse(response);
			let template = "";
			let msj = "";
			let button = "";
			let boton_agregar = "";
			let boton_eliminar = "";
			
				traer.forEach((result)=>{
					
					id_refrigerador_sensor = result.id_refrigerador_sensor;
					
					if(result.sin_datos == 0 && result.hr_bajo == 0 && result.hr_alto == 0 && result.error == 0 ){
						
						msj = "<span class='badge badge-success'>Puedes cargar la información</span><br>";
						boton_agregar = `<button class="btn btn-success" id="aprobar_carga_datos_crudos" data-id="${result.id_refrigerador_sensor}"><i 												class="lnr-checkmark-circle">																													</i></button>`;
						boton_eliminar = `<button class="btn btn-danger" id="eliminar_datos_crudos" data-id="${result.id_refrigerador_sensor}">X</button>`;
					}else{
						msj = "<span class='badge badge-danger'>Corrige los errores y	vuelve a cargar el archivo</span><br>"+
										"<span class='badge badge-danger'>para poder continuar</span><br>";
						boton_eliminar = `<button class="btn btn-danger" id="eliminar_datos_crudos" data-id="${result.id_refrigerador_sensor}">X</button>`;
					}
					
					
					template +=
						`
							<span class='text-success'><h6>Se han leido en total ${result.leidos} registros</h6></span><br>
							<span class='text-danger'><h6>Errores de datos vacios = ${result.sin_datos} </h6></span><br>
							<span class='text-danger'><h6>Errores de % Hr < 10 = ${result.hr_bajo} </h6></span><br>
							<span class='text-danger'><h6>Errores de % Hr > 90 = ${result.hr_alto} </h6></span><br>
							<span class='text-danger'><h6>Datos con texto error = ${result.error} </h6></span><br>
							${msj}
							<br>
						
							${boton_agregar}
							${boton_eliminar}
							

					`;
				});
			
		
				$("#fechas").html(template);
				
		
			listar_refrigeradores_sensores(id_bandeja, id_mapeo);*/
								}
		 });
	 	
	 	
	 
 });
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////SCRIPT QUE CONTROLA LOS EVENTOS PRESENTADOS EN LA PESTAÑA DE INFORMES/////////////////////////////////////////////////////////////////

//FUNCIÓN QUE EXPLICA EL PORQUE DE LAS BARRRAS DE PROGRESO
(function(){
	
	$("#datos_iniciales_progress").mouseover(function(){
		Swal.fire({
			position:'center',
			icon:'question',
			title:'Indica el porcentaje que representa los datos iniciales del informe',
			toast: true,
			timer: 1700,
			showConfirmButton:false
		});
	});
	
	$("#datos_crudos_progress").mouseover(function(){
		Swal.fire({
			position:'center',
			icon:'question',
			title:'Indica el porcentaje que representa los datos crudos del informe',
			toast: true,
			timer: 1700,
			showConfirmButton:false
		});
	});
	
	
	$("#datos_images_progress").mouseover(function(){
		Swal.fire({
			position:'center',
			icon:'question',
			title:'Indica el porcentaje que representa los datos imagenes del informe',
			toast: true,
			timer: 1700,
			showConfirmButton:false
		});
	});
	
	
}());


//FUNCIÓN PARA SOLICITAR EL CORRELATIVO ANTES DE GENERAR INFORMES

(function(){
	$("#asignacion_informe").click(function(){ validar_si_informe(); 
																					 		listar_informes();});
	$("#solicitar_correlativo").click(function(){ validar_si_informe(); });
}());
//function para validar la existencia del correlativo
function validar_si_informe(){		
			
		
			const data = {
				id_asignado
			}
			
			$.post('templates/refrigeradores/valida_correlativo_refrigeradores.php',data,function(response){
				
				
			if(response == "Sin"){
				const text = "";
			
					Swal.fire({
							input: 'text',
							inputPlaceholder: 'Ingrese el correlativo para los informes',
							inputAttributes: { 'aria-label': 'Ej: 1355' },
							showCancelButton: true
						}).then((text)=>{
						let correlativo = text.value;
						let id_valida = $("#id_valida").val();
						
						const data_2 = {
							id_asignado,
							correlativo,
							id_valida
						}
						if(correlativo){
							
							$.post('templates/refrigeradores/ingresa_correlativo_refrigerador.php', data_2, function(e){
									
										if(e == "Si"){
											Swal.fire({
												position:'center',
												icon:'success',
												title:'Correlativo Creado',
												timer:1500
											});
											
											crear_informes_refrigeradores(1);
											listar_inf_base();
                      listar_informes();
											$("#sin_correlativo_refrigerador").hide();
											$("#traer_informes_refrigeradores").show();
											
										}
								
							});
					
						}
					});
				
			}else{
				$("#sin_correlativo_refrigerador").hide();
				$("#traer_informes_refrigeradores").show();		
			}
				
			});	
}
						 

//FUNCION PARA CREAR INFORMES

function crear_informes_refrigeradores(asignado){

	let id_valida = $('#id_valida').val();
		
	const data = 
			{id_asignado, asignado, id_valida}
	
		$.post('templates/refrigeradores/informe_refrigeradores.php', data , function(response){

		});
}

//FUNCION PARA LISTAR LOS INFORMES BASE
function listar_inf_base(){
  
   let seleccion = 1;
   
  
    const data_1 = {
      seleccion,
      id_asignado
    }

    let template = "";
    let template_1 = ""
    let template_2  = "";
    let aprobacion_estado = "";
		let aprobacion_leyenda = "";
    $.ajax({
      type : 'POST',
      data : data_1,
      url: 'templates/refrigeradores/listar_informe_base.php',
      success:function(e){
         
        if(e.length == 2){
          $("#informe_base_mostrar").hide();
        }else{
          $('#informe_base_no').hide();
          $("#informe_base_mostrar").show();
        }

        let traer = JSON.parse(e);
        let i = 0;
       traer.forEach((x)=>{
         
         //cargar  valores a los comentarios del informe base
         $("#conclusion_informe_base").val(x.observacion);
         $("#metodologia_informe_base").val(x.comentarios);
         $("#conclusion_final_informe_base").val(x.concepto);
         
         
         
         
         //validar estado de la aprobacion del informe
				if(x.estado_aprobacion === null  || x.estado_aprobacion == 0){
					aprobacion_estado = `<button class="btn btn-primary" data-id="${x.id_informe}" id="aprobar" id-approb = "${x.id_aprobacion}" 	value="1">Solicitar</button>`;
					aprobacion_leyenda = "<span class='text-primary'>Solicitar aprobación</span>";
				}else if(x.estado_aprobacion == 1){
					aprobacion_estado = `<button class="btn btn-warning" data-id="${x.id_informe}" id="aprobar" id-approb="${x.id_aprobacion}" 	value="0">Anular</button>`;
					aprobacion_leyenda = "<span class='text-primary'>Aprobación en curso</span>";
				}else if(x.estado_aprobacion == 2){
					aprobacion_estado = `<button class="btn btn-success" data-id="${x.id_informe}" id="aprobar" disable id-approb = "${x.id_aprobacion}" disabled="disabled">Aprobado</button>`;
					aprobacion_leyenda = "<span class='text-primary'>Aprobado</span>";
				}else if(x.estado_aprobacion == 3){
					aprobacion_estado = `<button class="btn btn-danger" data-id="${x.id_informe}" id="aprobar" disable id-approb ="${x.id_aprobacion}" 	value="1">Solicitar</button>`;
					aprobacion_leyenda = `<span class='text-primary' id='vercorrecciones'>${x.observacion_aprobacion}</span>`;
				}
       $('#nombre_infome').text(x.nombre);
      
          template_1 = `
               <div class="col-sm-10"></div>
            <div class="col-sm-2">
              <div class="btn-actions-pane-right">
                <div role="group" class="btn-group-sm nav btn-group">
                ${aprobacion_leyenda} &nbsp;&nbsp;  ${aprobacion_estado} 
                </div>
              </div>
            </div>
              `;   
         
         
           template+= 
           `
           
            <div class="col-sm-12">
              <form id="form_4" enctype="multipart/form-data" method="post">
                <input type="hidden" name="id_informe" value="${x.id_informe}">
               <div class="row" style="text-align:center;">
                  <div class="col-sm-6">
                  <label>Imagenes posicion sensor</label>
                  <input type="file" name="imagen_1" id="image_1" class="form-control">
                  </div>
                  <div class="col-sm-6">
                  <label>Imagenes equipo</label>
                  <input type="file" name="imagen_2" id="image_2" class="form-control">
                  </div>
              </div>
               <br>
               <div class="row">
                <div class="col-sm-12" style="text-align:center">
                  <button  type="submit" class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info"  data-id = "${x.id_informe}" id="cargar_imagen_1">Cargar imagenes</button>
                </div>
              </div>
              </form>
            </div>
         
            `;
         
         
         template_2+=
           `
            <div class="row">
              <div class="col-sm-12" style="text-align:center;">
                <button  type="submit" class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info"  data-id = "${x.id_informe}" id="cargar_inf_base">Actualizar</button>
              </div>
            </div>
            <div class="row" style="text-align:center;">
              <div class="col-sm-12" style="text-align:center">
                <a class='btn btn-ligth'  data-id = "${x.id_informe}" id="pdf" data-nombre="${x.tipo_informe}"><img src="design/images/pdf.png" width="50px"/></a>
              </div>
            </div>

            <div class="row" style="text-align:center;">
              <div class="col-sm-12" style="text-align:right">
                <a class='btn btn-ligth'  data-id = "${x.id_informe}" data-nombre="${x.nombre}" id="eliminar_informe">
                  <span class="text-danger"><h4>Eliminar informe</h4></span></a>
              </div>
          `;
      
         
       });
        
        $("#traer_imagenes_base").html(template);
        $("#final_inf_base").html(template_2);
        $("#solicitar_aprobacion").html(template_1);
        

      }
    });

}



//LISTAR IMAGENES BASE
function imagenes_equipo_base(){
  let seleccion = 3;
  const data_3 = {
    seleccion,
    id_asignado
  }
  
    let template_2  = "";
    $.ajax({
      type : 'POST',
      data : data_3,
      url: 'templates/refrigeradores/listar_informe_base.php',
      success:function(e){
        let traer = JSON.parse(e);
        traer.forEach((x)=>{
        template_2 += 
         `   <div class="col-sm-4" style="text-align:center;">
                <label>Imagenes equipo</label>
                <a data-toggle="tab" class="btn-shadow active btn btn-danger" id="eliminar_imagen" data-nombre = "${x.ubicacion}"	data-id="${x.id_informe}" data-otro="${x.id_imagen}">X</a>
                <br>
                <img src="templates/refrigeradores/${x.ubicacion}" width="100px"> 
              </div>
            `;
        });

        $("#traer_otras_imagenes_base").html(template_2);
      }
    });
  
}

//LISTAR IMAGENES SENSORES INFORME BASE
function imagenes_equipo_base_sensores(){
  let seleccion = 4;
  const data_3 = {
    seleccion,
    id_asignado
  }
  
    let template_2  = "";
    $.ajax({
      type : 'POST',
      data : data_3,
      url: 'templates/refrigeradores/listar_informe_base.php',
      success:function(e){
        
        let traer = JSON.parse(e);
        traer.forEach((x)=>{
        template_2 += 
           `
            <div class="col-sm-4" style="text-align:center;">
                <label>Imagenes sensor</label>
                <a data-toggle="tab" class="btn-shadow active btn btn-danger" id="eliminar_imagen" data-nombre = "${x.ubicacion}"	data-id="${x.id_informe}" data-otro="${x.id_imagen}">X</a>
                <br>
                <img src="templates/refrigeradores/${x.ubicacion}" width="100px"> 
              </div>
            `;
        });

        $("#traer_otras_imagenes_base_2").html(template_2);
      }
    });
  
}

//FUNCION PARA CONTROLAR EL BOTTON DE EVIDENCIAS GRAFICAS
(function(){
	
		$(document).on('submit','#form_4',function(e){
							e.preventDefault();
      
     

		$.ajax({
			url: 'templates/refrigeradores/cargar_evidencias_graficas_inf_base.php',
			type: 'POST',
			dataType: 'html',
			data: new FormData(this),
			cache: false,
			contentType: false,
			processData: false,
			success:function(response){	
        
        
        
        Swal.fire({
          position:'center',
          title:'Imagen guardada',
          icon:'success',
          timer:1500
        });
        $("#image_1").val('')
        $("#image_2").val('')
				imagenes_equipo_base();
        imagenes_equipo_base_sensores();
					}	

		});

		});		
	
}());

//LISTAR MAPEOS BASE
function listar_mapeos_inf_base(){
    let seleccion = 2;
  
    const data_2 = {
      seleccion,
      id_asignado
    }
  
    $.ajax({
      type : 'POST',
      data : data_2,
      url: 'templates/refrigeradores/listar_informe_base.php',
      success:function(e){
       
         let traer = JSON.parse(e);
         let template = ""; 
          traer.forEach((x)=>{
            template += `
              <div class="col-sm-4">
                 <label>Observaciones para el ${x.nombre_mapeo}</label>
                <textarea class="form-control"  name="comentario_mapeo[]">${x.comentario}</textarea>
                <input type="hidden" name="id_mapeos[]" value="${x.id_mapeo}">
              </div>
            `;
            
            
          });
        
        
          $("#traer_mapeos_base").html(template);
          
        
      }
    });
}



  
  $(document).on('click','#cargar_inf_base',function(){
     Swal.fire({
          position:'center',
          title:'Información actualizada',
          icon:'success',
          timer:1500
        });
    let conclusion_informe_base = $("#conclusion_informe_base").val();
    let metodologia_informe_base = $("#metodologia_informe_base").val();
    let conclusion_final_informe_base = $("#conclusion_final_informe_base").val();
    let id_informe_mapeos = $(this).attr('data-id');
    var comentario_x_mapeo_base = [];
    var id_mapeo_comentario = [];
    var incCount = document.getElementsByName("comentario_mapeo[]").length;
    for(i=0;i<incCount;i++){
        comentario_x_mapeo_base[i] = document.getElementsByName("comentario_mapeo[]")[i].value;
        id_mapeo_comentario[i] = document.getElementsByName("id_mapeos[]")[i].value;
    }
    
    const data = {
      conclusion_informe_base,
      metodologia_informe_base,
      conclusion_final_informe_base,
      comentario_x_mapeo_base,
      id_mapeo_comentario,
      id_informe_mapeos
    }
  
      $.ajax({
        type:'POST',
        url: 'templates/refrigeradores/almacenar_informe_base.php',
        data: data,
        success:function(response){
        
         
        }
      });
    
    
    
      /*$.post('templates/refrigeradores/almacenar_informe_base.php',id_mapeo_comentario,function(response){
          
          alert(response);
        
      });*/
   
    
    
  });
  



//FUNCION PARA LISTAR LOS INFORMES
function listar_informes(){

	$.ajax({
		type : 'POST',
		data : {id_asignado},
		url: 'templates/refrigeradores/listar_informes.php',
		success:function(e){
				
			$("#carga").hide();
			let traer = JSON.parse(e);
			let template = "";
			let estado = "";
			let contador = 0;
			let img_1 = "";
			let img_2 = "";
			let img_3 = "";
			let aprobacion_estado = "";
			let aprobacion_leyenda = "";
      let mas_nombre = "";
      let contador_acordeon = 2;
			
			traer.forEach((result)=>{
		
				//validar estado de la aprobacion del informe
				if(result.estado_aprobacion === null  || result.estado_aprobacion == 0){
					aprobacion_estado = `<button class="btn btn-primary" data-id="${result.id_informe}" id="aprobar" id-approb = "${result.id_aprobacion}" 	value="1">Solicitar</button>`;
					aprobacion_leyenda = "<span class='text-primary'>Solicitar aprobación</span>";
				}else if(result.estado_aprobacion == 1){
					aprobacion_estado = `<button class="btn btn-warning" data-id="${result.id_informe}" id="aprobar" id-approb="${result.id_aprobacion}" 	value="0">Anular</button>`;
					aprobacion_leyenda = "<span class='text-primary'>Aprobación en curso</span>";
				}else if(result.estado_aprobacion == 2){
					aprobacion_estado = `<button class="btn btn-success" data-id="${result.id_informe}" id="aprobar" disable id-approb = "${result.id_aprobacion}" disabled="disabled">Aprobado</button>`;
					aprobacion_leyenda = "<span class='text-primary'>Aprobado</span>";
				}else if(result.estado_aprobacion == 3){
					aprobacion_estado = `<button class="btn btn-danger" data-id="${result.id_informe}" id="aprobar" disable id-approb ="${result.id_aprobacion}" 	value="1">Solicitar</button>`;
					aprobacion_leyenda = `<span class='text-primary' id='vercorrecciones'>${result.observacion_aprobacion}</span>`;
				}
							
				//logica para el estado
				if(result.estado == 0){
					estado = "No terminado";
					contador = 30;
				}else if(result.estado == 1){
					estado = "Terminado";
					contador = 50;
				}else{
					estado = "Entregado a cliente";
					contador = 100;
				}
				
				//VALIDAR IMAGES
				if(result.img_posicion){
						img_1 =`<img src="templates/refrigeradores/${result.img_posicion}"  width="100px"/>`;
				}else{
						img_1 =`<span class="text-danger">Sin imagen</span>`;
				}
				
				if(result.grafica_1){
					img_2 =`<img src="templates/refrigeradores/${result.grafica_1}"  width="100px"/>`;
				}else{
					img_2 =`<span class="text-danger">Sin imagen</span>`;
				}
				
				if(result.grafica_2){
					img_3 =`<img src="templates/refrigeradores/${result.grafica_2}"  width="100px"/>`;
				}else{
					img_3 =`<span class="text-danger">Sin imagen</span>`;
				}
        
        if(result.n_increment == null){
          mas_nombre = "";
        }else{
          mas_nombre = result.n_increment;
        }
				
			   if(result.tipo_informe < 2){
                  template +=

                    `
                    <div id="accordion">
                    <div class="card">
                      <div class="card-header">
                          <a  data-toggle="collapse" data-target="#collapseOne${contador_acordeon}"  aria-controls="collapseOne">
                               <h5><strong>Nombre Informe:</strong> ${result.nombre}${mas_nombre}</h5>
                                  <h5><strong> &nbsp;&nbsp;Mapeo:</strong> ${result.nombre_mapeo} </h5>
                             </a>    
                                 
                                  <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm nav btn-group">
                                    ${aprobacion_leyenda} &nbsp;&nbsp;  ${aprobacion_estado} 
                                    </div>
                                  </div>	
                       
                      </div>
                      <div data-parent="#accordion" id="collapseOne${contador_acordeon}" aria-labelledby="headingOne" class="collapse">  
                      <div class="card-body" id="cuerpo_informe">
 
                        <form id="form_2" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id_informe" value="${result.id_informe}">
                        <div class="row">
                          <div class="col-sm-6">
                            <label>Observacion:</label>
                            <textarea class="form-control" name="observacion"  id="observacion"  value="${result.observacion}">${result.observacion}</textarea>
                          </div>
                          <div class="col-sm-6">
                            <label>Comentarios:</label>
                            <textarea class="form-control" name="comentarios"  id="comentarios" value="${result.comentarios}">${result.comentarios}</textarea>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-sm-12" style="text-align:center;">
                            <button  type="submit" class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info"  data-id = "${result.id_informe}" 		id="cargar_imagen_1">Actualizar</button>
                          </div>
                        </div>
                        </form>
                        <br>

                        <div class="row">
                          <div class="col-sm-12" style="text-align:center;">
                            <h4>Evidencia Grafica</h4>
                          </div>									
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-sm-12" style="text-align:center;">
                            <a  class="btn btn-primary text-white" id="Generar_datos_crudos" data-id = "${result.id_informe}" type="${result.tipo_informe}">Datos crudos</a>
                            <a  class="btn btn-primary text-white" id="Generar_datos_promedios" data-id = "${result.id_informe}"  type="${result.tipo_informe}">Promedios</a>
                          </div>
                        </div>

                        <br>

                        <form id="form_1" enctype="multipart/form-data" method="post">
                          <input type="hidden" name="tipo_image_2" value="${result.tipo_informe}">
                          <input type="hidden" name="id_informe" value="${result.id_informe}">
                          <div class="row">
                            <div class="col-sm-4" style="text-align:center;">
                              <label>Posición Sensores</label>
                              <input type="file" name="imagen_1" id="image_1" class="form-control">
                            </div>

                            <div class="col-sm-4" style="text-align:center;">
                              <label>Imagen Grafica Valores Promedio, Mínimo, Maximo </label>
                              <button class="btn btn-success" id="ver_grafico_promedio_refrigerador" data-id="${result.id_mapeo}">Grafico CerNet</button>
                              <input type="file" name="imagen_2" class="form-control">
                            </div>

                            <div class="col-sm-4" style="text-align:center;">
                                <label>Datos de todos los sensores en periodo representativo</label>
                                <button class="btn btn-success" id="ver_grafico_todos_sensores_refrigerador" data-id="${result.id_mapeo}">Grafico CerNet</button>
                                <input type="file" name="imagen_3" class="form-control">
                            </div>
                          </div>

                          <br>

                          <div class="row">
                            <div class="col-sm-4" style="text-align:center;">
                              <a data-toggle="tab" class="btn-shadow  btn btn-danger text-white" style="width:30px;" id="eliminar_imagen" data-nombre = "${result.img_posicion}" 
                                data-id="${result.id_informe}">X</a>
                              <br>
                              ${img_1}
                            </div>
                            <div class="col-sm-4" style="text-align:center;">
                              <a data-toggle="tab" class="btn-shadow active btn btn-danger" id="eliminar_imagen" data-nombre = "${result.grafica_1}" data-id="${result.id_informe}">X</a>
                              <br>
                              ${img_2}
                            </div>
                            <div class="col-sm-4" style="text-align:center;">
                              <a data-toggle="tab" class="btn-shadow active btn btn-danger" id="eliminar_imagen" data-nombre = "${result.grafica_2}"	data-id="${result.id_informe}">X</a>
                              <br>
                              ${img_3}
                            </div>
                          </div>

                          <br>

                          <div class="row">
                            <div class="col-sm-12" style="text-align:center">
                              <button  type="submit" class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info"  data-id = "${result.id_informe}" id="cargar_imagen_1">Cargar imagenes</button>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-12" style="text-align:center">
                              <a class='btn btn-ligth'  data-id = "${result.id_informe}" id="pdf" data-nombre="${result.tipo_informe}"><img src="design/images/pdf.png" width="50px"/></a>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-12" style="text-align:right">
                              <a class='btn btn-ligth'  data-id = "${result.id_informe}" data-nombre="${result.nombre}" id="eliminar_informe">
                                <span class="text-danger"><h4>Eliminar informe</h4></span></a>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    </div>
                    </div>
                    <br><br>`;
                  }
                  contador_acordeon = contador_acordeon +1;
                });
    
			$("#traer_informes_refrigeradores").html(template);			
		}
		
	});
}


///////////////////////777

/////////////////////////


//FUNCION PARA ELIMINAR INFORME
(function(){

	$(document).on('click','#eliminar_informe',function(){
		
		let id_informe = $(this).attr('data-id');
		let nombre = $(this).attr('data-nombre');
		
		Swal.fire({
			position:'center',
			title:'Seguro ¿Deseas eliminar el informe '+nombre+'?',
			icon:'question',
			showCancelButton:true,
			cancelButtonText:'No',
			showConfirmButton:true,
			confirmButtonText:'Si'
		}).then((result)=>{
			if(result.value){
				
				$.ajax({
					type:'POST',
					data:{id_informe},
					url:'templates/refrigeradores/eliminar_informe.php',
					success:function(response){
						
						if(response == "Si"){
							Swal.fire({
								position:'center',
								title:'Informe eliminado correctamente',
								icon:'success',
								showConfirmButton: false,
								timer:1000							
							});
							listar_informes();
              listar_inf_base();
						}
					}
				});
			}
			
		});
		
	});
	
}());

//FUNCIÓN PARA APROBAR INFORMES
(function(){
	
	$(document).on('click','#aprobar',function(){
		
		let id_informe = $(this).attr('data-id');
		let id_aprobacion = $(this).attr('id-approb');
		let valor_button = $(this).val();
		

		
		$.ajax({
			type:'POST',
			data:{id_informe, id_aprobacion, valor_button, id_asignado},
			url:'templates/refrigeradores/aprobacion.php',
			success:function(response){
		
				if(response == "Si"){
					Swal.fire({
						position:'center',
						title:'Se ha enviado la aprobacion de informe',
						icon:'success',
						timer: 1500
					});
					$("#cuerpo_informe").hide();
					listar_informes();
          listar_inf_base();
				}
				else if(response == "Sii"){
					Swal.fire({
						position:'center',
						title:'Se ha anulado el envio de la aprobacion del informe',
						icon:'success',
						timer: 1500
					});
					listar_informes();
          listar_inf_base();
					$("#cuerpo_informe").show();
				}
				
			}
		
		});
		
		
	});
	
}());


//FUNCION PARA ELIMINAR IMAGENES
(function(){
	
	$(document).on('click','#eliminar_imagen',function(){
		
		let id_informe = $(this).attr('data-id');
		let url = $(this).attr('data-nombre');
    let id_imagen = $(this).attr('data-otro');
		
		Swal.fire({
			position:'center',
			title:'Seguro ¿Desea eliminar la imagen?',
			showCancelButton:true,
			cancelButtonText:'No',
			showConfirmButton:true,
			confirmButtonText:'Si',
			icon:'queston'
		}).then((result)=>{	
			
			if(result.value){
				$.ajax({
					type:'POST',
					data: {id_informe, url, id_imagen},
					url:'templates/refrigeradores/eliminar_image.php',
					success:function(response){
						if(response == "Si"){
							Swal.fire({
								position:'center',
								title:'Se ha eliminado correctamente la imagen',
								icon: 'success',
								timer:1500
							});
							listar_informes();
              imagenes_equipo_base();
              imagenes_equipo_base_sensores();
						}
					}
				});
			}	
		});
	});
	
	
	
}());

//FUNCION PARA CONTROLAR LA MUESTRA DE DATOS CRUDOS
(function(){
	$(document).on('click','#Generar_datos_crudos',function(){
			
		let id_informe = $(this).attr('data-id');
		let type = $(this).attr('type');
		
			window.open('matriz_datos_crudos.php?id='+id_informe+'&type='+type);
				
	});
	
	//FUNCION PARA CONTROLAR LA MUESTRA DE DATOS CRUDOS PROMEDIO

	$(document).on('click','#Generar_datos_promedios',function(){
		
		let id_informe = $(this).attr('data-id');
		let type = $(this).attr('type');
		
		window.open('matriz_datos_crudos_promedio.php?id='+id_informe+'&type='+type);
		
	});
	
}());


//FUNCION PARA VALIDAR EL PROGRESO 
(function(){
	
	$(document).on("change",'#estado_change',function(){
		
		let select = $(this).val();
		let id_informe = $(this).attr('data-id');
		
		Swal.fire({
			position:'center',
			title:'Seguro ¿deseas cambiar el estado del informe ?',
			icon:'question',
			showConfirmButton:true,
			confirmButtonText:'Si',
			cancelButtonText:'No',
			showCancelButton: true
			
		}).then((result)=>{
			if(result.value){
				$.ajax({
				type:'POST',
				data: {select, id_informe},
				url: 'templates/refrigeradores/validar_estado.php',
				success:function(response){
				
			}

			});			
			}
		});
	
	});
	
}());


//FUNCTION QUE CONTROLA EL EVENTO DE ACTUALIZAR OBSERVACIONES Y COMENTARIOS
(function(){
	
	$(document).on('submit','#form_2',function(e){
						e.preventDefault();
		
	$.ajax({
		url: 'templates/refrigeradores/actualizar_informe_parte_1.php',
    type: 'POST',
    dataType: 'html',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
    success:function(response){			
			 if(response == "Si"){
					Swal.fire({
						position:'center',
						title:'Ha sido actualizado correctamente',
						icon:'success',
						timer:1500
					});
					listar_informes();
				}

		}	
	});		
	});		
}());

//FUNCION PARA CONTROLAR EL BOTTON DE EVIDENCIAS GRAFICAS
(function(){
	
		$(document).on('submit','#form_1',function(e){
							e.preventDefault();

		$.ajax({
			url: 'templates/refrigeradores/cargar_evidencias_graficas_refrigeradores.php',
			type: 'POST',
			dataType: 'html',
			data: new FormData(this),
			cache: false,
			contentType: false,
			processData: false,
			success:function(response){			
				
				listar_informes();
					}	

		});

		});		
	
}());

//FUNCION PARA VALIDAR PDF
(function(){
	$(document).on('click','#pdf',function(){
	let id_informe = $(this).attr("data-id");
  let tipo = $(this).attr("data-nombre");
  

			$.ajax({
				type : 'POST',
				data : {id_informe},
				url : 'templates/refrigeradores/pre_pdf.php',
				success: function(response){
        
          
					if(response == "Ver"){
            if(tipo==0){
              window.open('templates/refrigeradores/informes/pdf/informe_mapeo_refrigeradores_temp.php?informe='+id_informe);
            }else if(tipo == 1){
              window.open('templates/refrigeradores/informes/pdf/informe_mapeo_refrigeradores_hum.php?informe='+id_informe);
            }else if(tipo == 2){
              window.open('templates/refrigeradores/informes/pdf/informe_mapeo_refrigeradores_base.php?informe='+id_informe);
            }
						
					}else if(response == "No"){
						Swal.fire({
							position:'center',
							icon:'error',
							title:'Recuerda que es importante la aprobación del informe por parte del HEAD',
              showConfirmButton:true,
              showCancelButton:false,
              confirmButtonText:"Si"
						}).then((respuesta)=>{
              if(respuesta.value){
               if(tipo==0){
                  window.open('templates/refrigeradores/informes/pdf/informe_mapeo_refrigeradores_temp.php?informe='+id_informe);
                }else if(tipo == 1){
                  window.open('templates/refrigeradores/informes/pdf/informe_mapeo_refrigeradores_hum.php?informe='+id_informe);
                }else if(tipo == 2){
                  window.open('templates/refrigeradores/informes/pdf/informe_mapeo_refrigeradores_base.php?informe='+id_informe);
                }
              }
            })
					}
          else if(response == "NoXimg"){
            Swal.fire({
              position:'center',
              icon:'error',
              title:'Debes cargar las imagenes para ver el pdf',
              timer:1700
            });
          
          }
				}
			
			});
	});
}());



//FUNCION PARA MOSTRAR EL INFORME POR PARTE DEL AUDITOR
(function(){
	$("#resultados_de_aprobaciones #ver_pdf_aprobaciones").click(function(){
			let id = $(this).val();
	
	});
	
}());


//FUNCIONES PARA APROBAR Y/O ENVIAR A CORRGIR LOS INFORMES POR PARTE DEL AUDITOR
	
	$(document).on('submit','#form_5',function(e){
			e.preventDefault();
		 
		
		$.ajax({
		url: 'auditoria_aprobar.php',
    type: 'POST',
    dataType: 'html',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
		success:function(response){
			if(response == "Hecho"){
				Swal.fire({
					position:'Center',
					title:'Cambio realizado y notificacion enviada',
					icon:'success',
					showCancelButton:false,
					showConfirmButton:true,
					confirmButtonText:'Ok'
				}).then((result)=>{
					if(result.value){
						listar_informes();
						location.reload();
					}
				});
			}
		}
		});

	});
	
firma_usuario();

/////////////////////////////////CONTROLA QUIEN FIRMA EL USUARIO///////////////////////////////////////	
function firma_usuario(){  
    $.ajax({
      url:'listar_jefes_operaciones.php',
      success:function(response){
        let traer = JSON.parse(response);
        let template = "";
        let template_2 = "<option value='0'>Seleccione</option>";
        
        traer.forEach((x)=>{
          template +=
             `
                <option value="${x.id_usuario}" data-nombre = "${x.nombres}">${x.nombres} ${x.apellidos}</option>
             `;
          
        });
        $("#quien_firma").html(template_2+template);
      }
    });
  
}

(function(){
  
  $("#quien_firma").change(function(){
    
    let id_usuario = $(this).val();
   

    
    Swal.fire({
      position:'center',
      title:'Asignar para responsable del informe',
      icon:'question',
      showButtonConfirm:true,
      confirmButtonText:'Si!',
      showButtonCancel:true,
      cancelButtonText:'No!'
    }).then((result)=>{
      
      if(result.value){
        
          $.ajax({
            type:'POST',
            data:{id_usuario, id_asignado},
            url:'asigna_firma.php',
            success:function(response){
              
              if(response == "Actualizado"){
                Swal.fire({
                  position:'center',
                  title:'Asignado',
                  icon:'success',
                  timer:1500        
                });
                listar_firmador();
              }
              
            }
          });
      }
      
    });
  });
  
}());




listar_firmador();
//función para listar quien firma el documento
function listar_firmador(){
  
  $.ajax({
    type:'POST',
    data:{id_asignado},
    url:'listar_firma.php',
    success:function(response){
     
        let traer = JSON.parse(response);
        
        traer.forEach((x)=>{
          $("#persona_firma").text(x.nombres +' '+ x.apellidos);
        });
        
      
      
    }
  });
}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////CONTROLA EL AGREGAR PERSONAL//////////////////////////////////////////////////





$("#cerrar_crear_personal").click(function(){ 
  $("#personal_2").show();
  $("#personal_1").hide();
  $("#cerrar_crear_personal").hide();
  $("#editar_personal").hide();
  $("#guardar_personal").show();

});


$("#crear_personal_empresa").click(function(){
  
  $("#personal_2").hide();
  $("#personal_1").show();
  $("#cerrar_crear_personal").show();
  $("#apellidos_personal").val("");
  $("#cargo_personal").val("");
  
});




$("#guardar_personal").click(function(){
  
   let nombres_personal = $("#nombres_personal").val(); 
   let apellidos_personal =  $("#apellidos_personal").val();
   let cargo_personal = $("#cargo_personal").val();
  
    if(nombres_personal == "" || apellidos_personal == "" || cargo_personal == ""){
      Swal.fire({
        position:'center',
        title:'Debes ingresar todos los campos para continuar',
        icon:'error',
        timer: 1500
      });
    }else{
      const datos = {
       id_asignado,
       nombres_personal,
       apellidos_personal,
       cargo_personal   
      }
   
     $.ajax({
       type:'POST',
       data: datos,
       url:'templates/refrigeradores/agrega_personal.php',
       success:function(response){

        if(response == "Creado"){
           Swal.fire({
             position:'center',
             icon:'success',
             title:'Se ha creado el participante',
             timer:1500
           });
           $("#personal_1").hide();
           listar_participantes();
           $("#personal_2").show();
           $("#cerrar_crear_personal").hide();
           $("#nombres_personal").val('');
           $("#apellidos_personal").val('');
           $("#cargo_personal").val('');
         } 
       }
     });
    }

});


function listar_participantes(){
 
  
  $.ajax({
    type:'POST',
    data:{id_asignado},
    url:'templates/refrigeradores/listar_participantes.php',
    success:function(response){
      
      let traer = JSON.parse(response);
      let template = "";
      traer.forEach((x)=>{
        
        template +=`
          <tr>
            <td>${x.nombres} ${x.apellidos}</td>
            <td>${x.cargo}</td>
            <td><button class="btn btn-danger" id="eliminar_participante" data-id="${x.id_informe_participante}">Eliminar</button></td>
            <td><button class="btn btn-primary" id="editar_participante" data-id="${x.id_informe_participante}">Editar</button></td>  
          </tr>
          `;
      });
      
      $("#resultados_personal").html(template);
    }
    
    
  });
  
}
 
$(document).on('click','#eliminar_participante', function(){

  let id_participante = $(this).attr('data-id');
  
    Swal.fire({

      position:'center',
      title:'¿Seguro deseas eliminar al participante?',
      icon:'question',
      showButtonConfirm:true,
      confirmButtonText:'Si',
      showButtonCancel:true,
      cancelButtonText:'No'
    }).then((x)=>{
      if(x.value){
        $.ajax({
        type:'POST',
        url:'templates/refrigeradores/eliminar_participante.php',
        data: {id_participante},
        success:function(response){
    
          if(response == "Si"){
              
            Swal.fire({
              position:'center',
              icon:'success',
              title:'Eliminado',
              timer:1500
            });
            
            listar_participantes();
          }  
      }
    });
      }
    });
    
  
  
});
 
$(document).on('click','#editar_participante', function(){
  
    let id_participante = $(this).attr('data-id');
    $("#personal_1").show();
    $("#personal_2").hide();
    $("#cerrar_crear_personal").show();
    $("#guardar_personal").hide();
    $("#editar_personal").show();
    
    $.ajax({
      type:'POST',
      url:'templates/refrigeradores/traer_participante.php',
      data:{id_participante},
      success:function(response){
          
        let traer = JSON.parse(response);
        
        
      
          
          $("#nombres_personal").val(traer.nombres);
          $("#apellidos_personal").val(traer.apellidos);
          $("#cargo_personal").val(traer.cargo);
          $("#id_oculto_personal").val(traer.id_participante_oculto);
         

       
      }
    })
     
});


$(document).on('click','#editar_personal',function(){
  
     let nombres = $("#nombres_personal").val();
     let apellidos = $("#apellidos_personal").val();
     let cargo = $("#cargo_personal").val();
     let id_oculto = $("#id_oculto_personal").val();

     const datos = {
      nombres,
      apellidos,
      cargo,
      id_oculto
     }

     $.ajax({
       type:'POST',
       url:'templates/refrigeradores/editar_personal.php',
       data: datos,
       success:function(response){

         if(response == "Modificado"){
           Swal.fire({
             position:'center',
             title:'Editado',
             icon:'success',
             timer:1500
           });
           listar_participantes();
           $("#personal_2").show();
            $("#personal_1").hide();
            $("#cerrar_crear_personal").show();
            $("#apellidos_personal").val("");
            $("#cargo_personal").val("");

         }
       }
     });
});


///// VALIDAR CONSECUTIVO
function traer_consecutivo(){
  let seleccion  = 1;

  const datos = {
    id_asignado,
    seleccion
  }
  
  $.ajax({
    type:'POST',
    data:datos,
    url:'templates/refrigeradores/consecutivo.php',
    success:function(respuesta){
      if(respuesta.length == 0){
        $("#cuerpo_crear_mapeo_refrigerador").hide();
        $("#cuerpo_ver_mapeo_refrigerador").hide();
        $("#mapeo").hide();
        $("#mapeo2").hide();
      }else{
         $("#cuerpo_crear_mapeo_refrigerador").show();
         $("#cuerpo_ver_mapeo_refrigerador").show();
         $("#mapeo").show();
         $("#mapeo2").show();
         $("#aqui_consecutivo_refrigerador").html(respuesta);
      }
    }
  })
}

////// CREAR CONSECUTIVO
$("#btn_refrigeradores_consecutivo").click(function(){
  
  let consecutivo = $("#consecutivo_refrigeradores_texto").val();
  let seleccion = 2;
  const datos = {
    id_asignado,
    consecutivo,
    seleccion
   }
  
  $.ajax({
    type:'POST',
    data:datos,
    url:'templates/refrigeradores/consecutivo.php',
    success:function(respuesta){
      if(respuesta == "Si"){
        Swal.fire({
          title:'Mensaje',
          text:'Consecutivo creado correctamente',
          icon:'success',
          timer:1000
        });
        traer_consecutivo();
        //window.reload();
      }
    }
  })
});

////////////// CONTROLA EL EVENTO DEL SELECT EN REFRIGERADOR 

$("#selector_mapeo_refrigerador").change(function(){
 
    let valor = $(this).val();
  
    if(valor == "crear_nombre"){
      $("#crear_nombre_refrigeradores").show();
    }else{
      $("#crear_nombre_refrigeradores").hide();
    }
  
});

////////////// buscador de sensores
(function(){
    
 $("#buscar_sensores_refrigerador").keydown(function(){
   
   let tecleado = $("#buscar_sensores_refrigerador").val();
   
   if(tecleado.length > 1){
     $(".mostrar_sensores_contenedor_buscados_refrigerador").show();
     $(".mostrar_sensores_contenedor_refrigerador").hide();
     
     $.ajax({
       type:'POST',
       url:'templates/refrigeradores/buscador_sensores_acme.php',
       data: {tecleado},
       success:function(e){

         let traer = JSON.parse(e);
			   let template = "";
			
				traer.forEach((result)=>{
					template += 
					`
					<tr data-id="${result.id_sensor}">
						<td>${result.nombre}</td>
						<td>${result.tipo}</td>
						<td>
								<button class="btn btn-success" id="agregar_sensor_refrigerador"  data-id="${result.id_sensor}" data-atributo = "+">+</button>
						</td>				
					</tr>
					`;

					
					
				});
			$("#sensores_encontrados_refrigerador").html(template);
         
       }
       
     });
   }else{
     $(".mostrar_sensores_contenedor_buscados_refrigerador").hide();
     $(".mostrar_sensores_contenedor_refrigerador").show();
   }
 })
}());


////////// CHANGE POSITION SENSORES
$(document).on('change','#change_posicion_sensor_refrigerador',function(){
   
    let id_refrigerador_sensor = $(this).attr('data-id');
    let posicion = $(this).val();
  
    const datos = {
      id_refrigerador_sensor,
      posicion
    }
  
    $.ajax({
      type:'POST',
      url:'templates/refrigeradores/cambiar_posicion_sensor.php',
      data:datos,
      success:function(response){
        if(response == 1){
          Swal.fire({
            title:'Mensaje',
            text:'Sensor cambiado de posicion corrrectamente',
            icon:'success',
            timer:2000
          });
          listar_refrigeradores_sensores(id_bandeja, id_mapeo);
        }
      }
    });
});


////////// FUNCIÓN PARA DETERMINAR LA EXISTENCIA DEL ARCHIVO DE DATOS CRUDOS
function existe_dc_refrigerador(id_mapeo){
    
  $.ajax({
    type:'POST',
    url:'templates/refrigeradores/validar_dc.php',
    data:{id_mapeo},
    success:function(response){
    	
      if(response == 1){
   
        let etiqueta = `<span class='text-success'>Se ha cargado el archivo</span><br>
                          <button class='btn btn-danger' id='borrar_dc_refrigerador' data-id='${id_mapeo}'>Eliminar datos</button>`;
        $("#btn_carga_dc_refrigerador").hide();
        $("#file").hide();
        $("#btn_cargar_datos_crudos").hide(); 
        $("#imgcargando").hide();
        $(".dc_refrigerador_archivo").html(etiqueta)
      }else{
        $("#btn_carga_dc_refrigerador").hide();
        $("#file").show();
        $("#dc_refrigerador_archivo").hide();
        $("#imgcargando").hide();
      }
    }
  });
}


//////////// BORRAR DATOS CRUDOS 
$(document).on('click','#borrar_dc_refrigerador',function(){
  
    let id_mapeo_eliminar = $(this).attr('data-id');
    Swal.fire({
		position:'center',
		icon:'error',
		title:'Deseas eliminar los datos?',
		showConfirmButton:true,
		showCancelButton:true,
		confirmButtonText:'Si!',
		cancelButtonText:'No!',
    }).then((result)=>{
      if(result.value){
       $.ajax({
         type:'POST',
         url:'templates/refrigeradores/eliminar_datos_crudos.php',
         data:{id_mapeo},
         success:function(response){
         	console.log(response);
           if(response == "Listo"){
             Swal.fire({
               title:'mensaje',
               text:'Eliminado correctamente',
               icon:'success',
               timer:2000
             });
             existe_dc_refrigerador(id_mapeo);
           }
         }
       });
      }
    });
  
});
	

////////////// GRAFICOS CERNET
$(document).on('click','#ver_grafico_todos_sensores_refrigerador',function(){
  
    let id_mapeo = $(this).attr('data-id');
  
    window.open('templates/refrigeradores/API_GRAFICOS_TODOS.php?id_mapeo='+id_mapeo);
  
});

$(document).on('click','#ver_grafico_promedio_refrigerador',function(){
  
    let id_mapeo = $(this).attr('data-id');
  
    window.open('templates/refrigeradores/API_GRAFICOS_PROMEDIOS.php?id_mapeo='+id_mapeo);
  
});


