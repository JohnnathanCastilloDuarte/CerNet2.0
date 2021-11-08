/*
  EL ORDEN DE LAS FUNCIONES SE DETERMINAN POR EL ORDEN DE LOS COMPONENTES LLAMADOS EN DATOS_INFORME_MAPEO.TPL EN EL CUAL, ME GUIO POR LOS id
  UNA VEZ REVISO EL ID ME DOY CUENTA DE COMO SE REALIZA EL ORDEN DE ESTAS FUNCIONES
*/

//VARIABLES DEL USO CONSTANTE
var id_valida = $("#id_valida").val();
var id_asignado = $("#id_asignado").val();
var id_mapeo = "";
var id_bandeja = "";

//LLAMAR FUNCIONES
contar_registros_ultrafreezer();
listar_bandejas_ultrafreezer()
listar_mapeos_ultrafreezer();
listar_participantes_ultrafreezer();
contar_registro_informes_ultrafreezer();
firma_usuario_ultrafreezer();
listar_firmador_ultrafreezer();
listar_informes_ultrafreezer();
leer_correlativo(id_asignado);
validar_generar_informes();





//ELEMENTOS OCULTOS
$("#btn_actualizar_bandeja_ultrafreezer").hide();
$("#cuerpo_mapeo_ultrafreezer").hide();
$("#btn_actualizar_mapeo_ultrafreezer").hide();
$("#trayendo_resultados").hide();
$("#card_resultaodos_datos_crudos").hide();
$("#personal_2_ultrafreezer").hide();
$("#editar_personal_ultrafreezer").hide();
$("#asignacion_informe_ultrafreezer").hide();
$("#cargar_informes").hide();
$("#nombre_opcional_mapeo").hide();
$("#nombre_opcional_div").hide();
$("#change_mapeo_ultrafreezer").hide();
//////////////////////////////////////////////////////////LOGICA DE FUNCIONES


function setear_campos_ultrafreezer(){
		$("#fecha_inicio_mapeo_ultrafreezer").val("");
		$("#hora_inicio_mapeo_ultrafreezer").val("");
		$("#minuto_inicio_mapeo_ultrafreezer").val("");
		$("#segundo_inicio_mapeo_ultrafreezer").val("");
		$("#fecha_fin_mapeo_ultrafreezer").val("");
		$("#hora_fin_mapeo_ultrafreezer").val("");
		$("#minuto_fin_mapeo_ultrafreezer").val("");
		$("#segundo_fin_mapeo_ultrafreezer").val("");
		$("#intervalo_ultrafreezer").val("");
		
		$("#temperatura_minima_ultrafreezer").val("");
		$("#temperatura_maxima_ultrafreezer").val("");
		
		$("#valor_seteado_temperatura_ultrafreezer").val("");
	}




//////////////////////////////////////////////////////////////////////////////CONTAR BANDEJAS
function contar_registros_ultrafreezer(){
		$.ajax({
		type: 'POST',
		url:'templates/ultrafreezer/contar_bandeja.php',
		data: {id_asignado},
		success:function(e){
      
			let x = 0;
			if(e == 0){
				x = 1;
			}else{
				x = e;
			}
			
			$("#cuantas_bandeja_freezer").val(x);
			if(e > 0){
				$("#anuncio_mapeo_1_ultrafreezer").hide();
				$("#cuerpo_mapeo_ultrafreezer").show();
			}else{
				$("#anuncio_mapeo_1_ultrafreezer").show();
				$("#cuerpo_mapeo_ultrafreezer").hide();
			}
		}
		
	});
}

//////////////////////////////////////////////////////////////////////////////CREACIÓN DE BANDEJAS

//CREAR BANDEJAS 
$(function(){
	$("#btn_nueva_bandeja_ultrafreezer").click(function(){
			var bandeja = $("#bandeja_ultrafreezer").val();
		const datos = {
			id_asignado,
			bandeja,
			id_valida
		}
    
     
			
		$.post('templates/ultrafreezer/crear_bandeja.php',datos, function(e){
			if(e=="creado"){
				Swal.fire({
					position:'center',
					icon:'success',
					title:'Bandeja(s) creada(s) con exito',
					timer:1500
				});
				listar_bandejas_ultrafreezer();
				contar_registros_ultrafreezer();
			}
			
		});
		
	});
  }());
	


//////////////////////////////////////////////////////////////////////LISTAR BANDEJAS
function listar_bandejas_ultrafreezer(){
  
	
	$.ajax({
		type:'POST',
		url:'templates/ultrafreezer/listar_bandeja.php',
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
								<button class="btn btn-success" data-id="${result.id_bandeja}" id="modificar_bandeja_creada_ultrafreezer" data-nombre="${result.nombre}"><i class="pe-7s-check">	</i></button>
								<button class="btn btn-danger" data-id="${result.id_bandeja}" id="eliminar_bandeja_creada_ultrafreezer">X</button>			
						</div>
					</td>
				</tr>				
				`;
			});
			$("#resultados_bandeja_ultrafreezer").html(template);
		}
	});
}

/////////////////////////////////////////////////////////////////MODIFICAR BANDEJAS Y ELIMINAR BANDEJAS///////////////////////////
$(function(){
//MODIFICAR BANDEJAS 
$(document).on('click','#modificar_bandeja_creada_ultrafreezer', function(){
	
	$("#btn_actualizar_bandeja_ultrafreezer").show();
	$("#btn_nueva_bandeja_ultrafreezer").hide();
	
	let id_bandeja = $(this).attr('data-id');
	let nombre = $(this).attr('data-nombre');

	$("#bandeja_ultrafreezer").val(nombre);
  $("#id_bandeja_actualizar_ultrafreezer").val(id_bandeja);

});

	$("#btn_actualizar_bandeja_ultrafreezer").click(function(){
		
      let bandeja_nombre = document.getElementById("bandeja_ultrafreezer").value;
      let id_bandeja_change =  document.getElementById("id_bandeja_actualizar_ultrafreezer").value;
      
  
		
			const datos = {
			id_bandeja_change,
			bandeja_nombre,
			id_asignado,
			id_valida
		}
        
		$.post('templates/ultrafreezer/actualizar_bandeja.php', datos, function(e){

		if(e=="Modificado"){
			Swal.fire({
				position:'center',
				icon:'success',
				title:'La bandeja ha sido modificada',
				timer:1500,
			});
			
			$("#bandeja_ultrafreezer").val("");
			$("#bandeja_ultrafreezer").text("");
			$("#btn_actualizar_bandeja_ultrafreezer").hide();
      $("#btn_nueva_bandeja_ultrafreezer").show();
			listar_bandejas_ultrafreezer();
			contar_registros_ultrafreezer();			
		}
		
	});
  
			
			
		});
  
  
  
///////////////////////////////////////////////////////ELIMINAR BANDEJA
  //ELIMINAR BANDEJA
$(document).on('click','#eliminar_bandeja_creada_ultrafreezer',function(){

	 let id_bandeja = $(this).attr('data-id');
   $("#id_bandeja_actualizar_ultrafreezer").val(id_bandeja); 	
	let id_bandeja_change =  document.getElementById("id_bandeja_actualizar_ultrafreezer").value;
	const data = {
		id_bandeja_change,
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
			
			$.post('templates/ultrafreezer/eliminar_bandeja.php', data, function(e){
			 
				if(e == "Eliminado"){
						Swal.fire({
							position:'center',
							icon:'success',
							title:'La bandeja ha sido eliminada',
							timer:1500
						});
						listar_bandejas_ultrafreezer();
            contar_registros_ultrafreezer();
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
	});


});  
  
  }());




////////////////////////////////////////////////////////////////COMIENZO DE LAS FUNCIONES PARA EL MAPEO////////////////////////////

///////////////////////////////////////////////////////////////////////////////LISTAR MAPEO
function listar_mapeos_ultrafreezer(){
	$.ajax({
		type : 'POST',
		data : {id_asignado},
		url:'templates/ultrafreezer/listar_mapeos.php',
		success:function(e){	
     

      if(e.length == 2){
        $("#tab_ver_mapeo_ultrafreezer").css("display", "none");
        $("#asignacion_mapeo_ultrafreezer").css("display", "none");
        $("#asignacion_participantes_ultrafreezer").css("display", "none");
        $("#asignacion_informe_ultrafreezer").css("display", "none");

      }else{

        $("#tab_ver_mapeo_ultrafreezer").css("display", "block");
        $("#asignacion_mapeo_ultrafreezer").css("display", "block");
        $("#asignacion_participantes_ultrafreezer").css("display", "block");
        $("#asignacion_informe_ultrafreezer").css("display", "block");

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
            <td>${result.temperatura_minima}</td>
            <td>${result.temperatura_maxima}</td>
            <td>
              <div style="text-align:center;">
                <button class="btn btn-success" data-id="${result.id_mapeo}" id="modificar_mapeo_creada_ultrafreezer"><i class="pe-7s-check"></i></button>
                <button class="btn btn-danger" data-id="${result.id_mapeo}" id="eliminar_mapeo_creada_ultrafreezer">X</button>
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
            <td><button class="btn btn-success" id="buscar_bandeja_asignada_ultrafreezer" data-id="${result.id_mapeo}"  data-id-2="${id_asignado}" nombre="${result.nombre}" ><i class="lnr-checkmark-circle"></i></button></td>
          </tr>

          `;
        });
        
        $("#listando_mapeos_creados_ultrafreezer").html(template2);
        $("#listando_mapeos_ultrafreezer").html(template);
      }		
		}
	});
}


////////////////////////////////////////////////////////////ELIMINAR MAPEO
(function(){	
	$(document).on('click','#eliminar_mapeo_creada_ultrafreezer',function(){
		
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
				
				
				let id_valida = $("#id_valida").val();
				 id_mapeo = $(this).attr('data-id');
				
				const data = {
					id_mapeo,
					id_asignado,
					id_valida
				}
				
				$.post('templates/ultrafreezer/eliminar_mapeo.php', data, function(e){
				
						if(e == "1"){
							Swal.fire({
								position:'center',
								icon:'error',
								title:'El mapeo no puede ser eliminado debedio a que contiene informes creados',
								timer:1500
							});
						}
            else if(e == "2"){
                Swal.fire({
                  position:'center',
                  icon:'error',
                  title:'El mapeo no puede ser eliminado debedio a que contiene datos de asignación',
                  timer:1500
                });
              }
						else if( e == "Eliminado"){
								Swal.fire({
								position:'center',
								icon:'success',
								title:'El mapeo ha sido eliminado correctamente',
								timer:1500
							});
							listar_mapeos_ultrafreezer();
						}
				});
			}
		});
	});
}());

/////////////////////////////////////////////////////////////////////////////////CREACIÓN DEL MAPEO
(function(){
	$("#btn_nuevo_mapeo_ultrafreezer").click(function(){
	    
  
        
   
    
    
		let nombre_mapeo = $("#nombre_mapeo_ultrafreezer").val();
		let fecha_inicio_mapeo = $("#fecha_inicio_mapeo_ultrafreezer").val();
		let hora_inicio_mapeo = $("#hora_inicio_mapeo_ultrafreezer").val();
		let minuto_inicio_mapeo = $("#minuto_inicio_mapeo_ultrafreezer").val();
		let segundo_inicio_mapeo = $("#segundo_inicio_mapeo_ultrafreezer").val();
		let fecha_fin_mapeo = $("#fecha_fin_mapeo_ultrafreezer").val();
		let hora_fin_mapeo = $("#hora_fin_mapeo_ultrafreezer").val();
		let minuto_fin_mapeo = $("#minuto_fin_mapeo_ultrafreezer").val();
		let segundo_fin_mapeo = $("#segundo_fin_mapeo_ultrafreezer").val();
		let intervalo = $("#intervalo_ultrafreezer").val();
		let temperatura_minima = $("#temperatura_minima_ultrafreezer").val();
		let temperatura_maxima = $("#temperatura_maxima_ultrafreezer").val();
		let valor_seteado_temperatura = $("#valor_seteado_temperatura_ultrafreezer").val();
    let nombre_opciona = $("#nombre_opcional_mapeo").val();
    let nombre_final = ""
    
    if(nombre_mapeo == "FFFFF"){
      nombre_final = nombre_opciona;
    }else{
      nombre_final = nombre_mapeo;
    }
                            
		
		const datos = {
		  nombre_final,
			fecha_inicio_mapeo,
			hora_inicio_mapeo,
			minuto_inicio_mapeo,
			segundo_inicio_mapeo,
			fecha_fin_mapeo,
			hora_fin_mapeo,
			minuto_fin_mapeo,
			segundo_fin_mapeo,
			intervalo,
			temperatura_minima,
			temperatura_maxima,
			valor_seteado_temperatura,
			id_asignado,
			id_valida
		}
	
		$.post('templates/ultrafreezer/crear_mapeo.php', datos , function(e){	 
    
      
      
			if(e=="Creado"){
				Swal.fire({
					position:'center',
					title:'El mapeo ha sido creado',
					icon:'success',
					timer:1500
				});
				listar_mapeos_ultrafreezer();
        listar_informes_ultrafreezer()
				setear_campos_ultrafreezer();
				crear_informes_ultrafreezer();
        contar_registro_informes_ultrafreezer();
				  
			}
		});
	 	
	});
          
    
	
}());

////////////////////////////////////////////////////////////////////////////////////////////// ELIMINAR Y MODIFICAR MAPEOS
(function(){
	$(document).on('click','#modificar_mapeo_creada_ultrafreezer',function(){
		
		$("#btn_actualizar_mapeo_ultrafreezer").show();
		$("#btn_nuevo_mapeo_ultrafreezer").hide();
		$("#change_mapeo_ultrafreezer").show();
	
		
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
				url: 'templates/ultrafreezer/llamar_editar_mapeo.php',
				success:function(e){
           
					let traer = JSON.parse(e);
			 
						$("#fecha_inicio_mapeo_ultrafreezer").val(traer.fecha_inicio);
						$("#hora_inicio_mapeo_ultrafreezer").val(traer.hora_inicio);
						$("#minuto_inicio_mapeo_ultrafreezer").val(traer.minuto_inicio);
						$("#segundo_inicio_mapeo_ultrafreezer").val(traer.segundo_inicio);
						$("#fecha_fin_mapeo_ultrafreezer").val(traer.fecha_final);
						$("#hora_fin_mapeo_ultrafreezer").val(traer.hora_final);
						$("#minuto_fin_mapeo_ultrafreezer").val(traer.minuto_final);
						$("#segundo_fin_mapeo_ultrafreezer").val(traer.segundo_final);
						$("#intervalo_ultrafreezer").val(traer.intervalo);
						$("#temperatura_minima_ultrafreezer").val(traer.temperatura_minima);
						$("#temperatura_maxima_ultrafreezer").val(traer.temperatura_maxima);
						$("#valor_seteado_temperatura_ultrafreezer").val(traer.valor_seteado_temperatura);
						$("#id_mapeo_creado_ultrafreezer").val(traer.id_mapeo);
				}
				
				
			});
		
	});
	
	
(function(){	
	$(document).on('click','#eliminar_mapeo_creada',function(){
		
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
				
				
				let id_valida = $("#id_valida").val();
				let id_mapeo = $(this).attr('data-id');
				
				const data = {
					id_mapeo,
					id_asignado,
					id_valida
				}
				
				$.post('templates/ultrafreezer/eliminar_mapeo.php', data, function(e){
				
						if(e == "No"){
							Swal.fire({
								position:'center',
								icon:'error',
								title:'El mapeo no puede ser eliminado debedio a que contiene información',
								timer:1500
							});
						}
						else if( e == "Eliminado"){
								Swal.fire({
								position:'center',
								icon:'success',
								title:'El mapeo ha sido eliminado correctamente',
								timer:1500
							});
							listar_mapeos();
						}
				});
			}
			
		});
	
		
	});
	
		}());
}());	


////////////////////////////////////////////////////////////////////////EDITAR MAPEO

(function(){
	$("#btn_actualizar_mapeo_ultrafreezer").click(function(){
		
		let nombre_mapeo = $("#nombre_mapeo_ultrafreezer").val();
		let fecha_inicio_mapeo = $("#fecha_inicio_mapeo_ultrafreezer").val();
		let hora_inicio_mapeo = $("#hora_inicio_mapeo_ultrafreezer").val();
		let minuto_inicio_mapeo = $("#minuto_inicio_mapeo_ultrafreezer").val();
		let segundo_inicio_mapeo = $("#segundo_inicio_mapeo_ultrafreezer").val();
		let fecha_fin_mapeo = $("#fecha_fin_mapeo_ultrafreezer").val();
		let hora_fin_mapeo = $("#hora_fin_mapeo_ultrafreezer").val();
		let minuto_fin_mapeo = $("#minuto_fin_mapeo_ultrafreezer").val();
		let segundo_fin_mapeo = $("#segundo_fin_mapeo_ultrafreezer").val();
		let intervalo = $("#intervalo_ultrafreezer").val();
		let temperatura_minima = $("#temperatura_minima_ultrafreezer").val();
		let temperatura_maxima = $("#temperatura_maxima_ultrafreezer").val();
		let valor_seteado_temperatura = $("#valor_seteado_temperatura_ultrafreezer").val();
    let nombre_opciona = $("#nombre_opcional_mapeo").val();
    let nombre_final = ""
    
    if(nombre_mapeo == "FFFFF"){
      nombre_final = nombre_opciona;
    }else{
      nombre_final = nombre_mapeo;
    }
	
     let id_mapeo_2 = $("#id_mapeo_creado_ultrafreezer").val()
    

  
		const datos = {
			nombre_final,
			fecha_inicio_mapeo,
			hora_inicio_mapeo,
			minuto_inicio_mapeo,
			segundo_inicio_mapeo,
			fecha_fin_mapeo,
			hora_fin_mapeo,
			minuto_fin_mapeo,
			segundo_fin_mapeo,
			intervalo,
			temperatura_minima,
			temperatura_maxima,
			valor_seteado_temperatura,
			id_mapeo_2,
			id_asignado,
			id_valida
		}
		
		$.post('templates/ultrafreezer/editar_mapeo.php',datos,function(e){
      

			if(e=="Editado"){
				Swal.fire({
					position:'center',
					icon:'success',
					title:'El registro ha sido editado correctamente',
					timer:1500
				});
        $("#change_mapeo_ultrafreezer").hide();
				listar_mapeos_ultrafreezer();
				setear_campos_ultrafreezer();
				$("#btn_actualizar_mapeo_ultrafreezer").hide();
		    $("#btn_nuevo_mapeo_ultrafreezer").show();
			}
		
		});
		
	});
	}());





///////////////////////////////////////////////////////////////////////////COMIENZA LA GESTIÓN DE LA PESTAÑA DE ASIGNACIÓN
//////////////////////////////////////////////////////////////GESTIONAR LOS BOTONES PARA ASIGNAR SENSORES
(function(){
	
	$(document).on('click','#buscar_bandeja_asignada_ultrafreezer', function(){
		
	  id_mapeo = $(this).attr('data-id');
		let id_asignado = $(this).attr('data-id-2');
		let nombre = $(this).attr('nombre');
	
		listar_bandejas_c_ultrafreezer(id_asignado);
		
			$("#mapeo_actual_ultrafreezer").text(" "+nombre);
      $("#nombre_mapeo_ultrafreezer_dc").text(" "+nombre);
      $("#id_mapeo_ultrafreezer").val(id_mapeo);
      
		
	});
	
}());



////////////////////////////////////////////////////////////////LISTAR SOLO BANDEJAS NO REGISTRADAS A LA TABLA REFRIGERADORES _ SENSORES
function listar_bandejas_c_ultrafreezer(a){
	
	$.ajax({
		type:'POST',
		data: {a},
		url:'templates/ultrafreezer/listar_bandejas_creadas.php',
		success:function(e){
		
				let traer = JSON.parse(e);
				let template = "";
			
			traer.forEach((result)=>{	
				template+=
					`
					<tr>
						<td>${result.nombre}</td>
						<td><button class="btn btn-success" id="buscar_sensores_asignada_ultrafreezer" data-id="${result.id_bandeja}"><i class="lnr-checkmark-circle"></i></button></td>
					</tr>
					`;	
			});
			$("#listar_bandejas_creadas_ultrafreezer").html(template);
		}
	});
}


//////////////////////////////////////////////////////CARGAR LOS SENSORES PARA ASI ASIGNARLOS
(function(){
	$(document).on("click","#buscar_sensores_asignada_ultrafreezer", function(){
			
				  id_bandeja = $(this).attr('data-id');
					listar_sensores_ultrafreezer();
					listar_ultrafreezer_sensores(id_bandeja, id_mapeo);
          mostrar_datos_crudos(id_asignado, id_bandeja, id_mapeo, id_valida);

			});
}());


////////////////////////////////////////////LISTAR LOS SENSORES
function listar_sensores_ultrafreezer(a){
		
	$.ajax({
		type:'POST',
		data: {a},
		url:'templates/ultrafreezer/listar_sensores.php',
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
								<button class="btn btn-success" id="agregar_sensor_ultrafreezer">+</button>
								<button class="btn btn-danger" id="quitar_sensor_ultrafreezer">X</button>
						</td>				
					</tr>
					`;

					
					
				});
			$("#sensores_resultado_ultrafreezer").html(template);
			
		}
	});
}


//////////////////////////////////////////////////////////////AGREGAR SENSOR 
(function(){
	
	$(document).on("click","#agregar_sensor_ultrafreezer", function(){
				
				let elemento = $(this)[0].parentElement.parentElement;
				let id_sensor = $(elemento).attr('data-id');
		    
			
					const datos = {
						id_mapeo,
						id_asignado,
						id_bandeja,
						id_sensor,
						id_valida : $("#id_valida").val()
					}
							$.post('templates/ultrafreezer/agregar_sensor_mapeo.php', datos, function(e){
									
								if(e=="Asignado"){
									Swal.fire({
										position:'center',
										icon:'success',
										title:'Sensor asignado correctamente',
										timer:1500
									});
									listar_ultrafreezer_sensores(id_bandeja, id_mapeo);
							
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


////////////////////////////////////LISTAR LOS SENSORES QUE SE VAN ASIGNANDO

function listar_ultrafreezer_sensores(id_bandeja, id_mapeo){

		const datos = {
			id_bandeja,
			id_mapeo,
			id_asignado
			
		}
    
    $("#id_asignado_ultrafreezer").val(id_asignado);
		
		$.post('templates/ultrafreezer/listar_final_mapeo.php', datos , function(e){
				
      
			let traer = JSON.parse(e);
			let template = "";
			let a = 1;
			let button = "";
      let template_2 = "";
      let posicion = "";
			
			traer.forEach((result)=>{
				
        if(result.posicion == null){
          posicion = "Seleccione";
        }else{
          posicion = result.posicion;
        }
				
			
				
				template +=`
					
					<tr>
								${result.datos_crudos}
						<td>${result.nombre_bandeja}</td>
						<td>${result.nombre_sensor}</td>
						<td>${result.fecha_registro}</td>
            <td><select class="form-control" id="change_posicion" data-id="${result.id_ultrafreezer_sensor}" data-bandeja="${result.id_bandeja}" data-mapeo ="${id_mapeo}">
                   <option value="${posicion}">${posicion}</option>
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
                 <option value="11">11</option> 
                 <option value="12">12</option> 
               </select></td>
					</tr>
				`;
        
    template_2 +=
    `
    <tr>
           
       <td>
        <input type="hidden" value="${result.id_bandeja}" name="bandejas">
         <select class="form-control" id="columna_dc${a}" name="columna_dc${a}">
            <option value="0">Seleccione...</option>  
            <option value="2">Columna 1</option>
            <option value="3">Columna 2</option>
            <option value="4">Columna 3</option>
            <option value="5">Columna 4</option>
             <option value="6">Columna 5</option>
             <option value="7">Columna 6</option>
             <option value="8">Columna 7</option>
             <option value="9">Columna 8</option>
             <option value="10">Columna 9</option>
             <option value="11">Columna 10</option>
             <option value="12">Columna 11</option>
             <option value="13">Columna 12</option>
          </select></td> 
        
                 
       <td><input type="hidden" value="${id_valida}" id="id_valida" name="id_valida"><input type="hidden" value="${result.id_ultrafreezer_sensor}" id="id_sensor_ultrafreezer_dc${a}" name="id_sensor_ultrafreezer_dc${a}">${result.nombre_sensor}</td>
                
</tr>

   `;
				a = a+1;
			});
      
    
			
			$("#mapeos_listos_ultrafreezer").html(template);
      $("#dc_ultrafreezer_seleccionador").html(template_2);
			
			
		});
  
 
  
  botton_datos_crudos(id_bandeja);
}







/////////////////////////////////////POSICION SENSOR
$(document).on('change','#change_posicion',function(){
    
  let id = $(this).attr('data-id');
  let id_bandeja = $(this).attr('data-bandeja');
  let id_mapeo_f = $(this).attr('data-mapeo');
  let valor = $(this).val();
  
  const datos =  {
    id,
    id_bandeja,
    valor,
    id_mapeo_f
  }
    $.ajax({
      type:'POST',
      data: datos,
      url:'templates/ultrafreezer/gestion_posicion_sensor.php',
      success:function(response){
        if(response == "Si"){
          Swal.fire({
            title:'Sensores dice:',
            text:'Se ha asignado la posición correctamente',
            icon:'success',
            timer:1800
          });
        }
        else{
           Swal.fire({
            title:'Sensores dice:',
            text:'La posicion ya ha sido asignada',
            icon:'error',
            timer:1800
          });
        }
      }
    });
});





/////////////////////////////////////////////////////////////FUNCION PARA QUITAR EL SENSOR 
(function(){
	
	$(document).on('click','#quitar_sensor_ultrafreezer',function(){
		
			let elemento = $(this)[0].parentElement.parentElement;
				let id_sensor = $(elemento).attr('data-id');
				
			
					const datos = {
						id_mapeo,
						id_asignado,
						id_bandeja,
						id_sensor,
						id_valida : $("#id_valida").val()
					}
				
		
		$.post('templates/ultrafreezer/validar_existencia_sensor.php',datos,function(e){
			    
			if(e == "Existe"){
				
				Swal.fire({
			position:'center',
			icon:'question',
			title:'Seguro ¿Deseas des asignar el sensor?',
			showConfirmButton:true,
			confirmButtonText:'Si!',
			showCancelButton:true,
			cancelButtonText:'No!'		
		}).then((result)=>{
			if(result.value){
				$.post('templates/ultrafreezer/des-asignar_sensor.php', datos, function(e){
			        
					if(e=="Des-asignado"){
								Swal.fire({
									 position:'center',
									 icon:'success',
									 title:'El sensor ha sido des - asignado',
									 timer: 1500
								 });
						listar_ultrafreezer_sensores(id_bandeja, id_mapeo);
						}else{
              Swal.fire({
									 position:'center',
									 icon:'error',
									 title:'El sensor ya contiene registro de datos crudos',
                   text:'Debes eliminar los datos crudos, para proceder a des - asignar el sensor',
									 timer: 1500
								 });
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

///////////////////////////////////////CONSULTAR EL BOTTON PARA LOS DATOS CRUDOS Y SU ESTADO//////
function botton_datos_crudos(parameter){
  
  $.ajax({
    type:'POST',
    data: {parameter},
    url:'templates/ultrafreezer/consultar_boton_datos_crudos.php',
    success:function(response){
      
      let traer = JSON.parse(response);
      
      if(response == "No"){
        
        let botton = "<button class='btn btn-danger' id='cargar_dc_ultrafreezer'>Falta archivo</button>";
        
        $("#botton_datos_crudos_ultrafreezer").html(botton);
      }else{
       
        let botton =`<button class='btn btn-success' id='cargar_dc_ultrafreezer' data-url='${response}'>Archivo cargado</button>`; 
        
      }
    }
  });
  
}


/////////////////////////////////////////FUNCIÓN SUBIR DATOS CRUDOS AL SISTEMA/////

 
    $("#form_ultrafreezer").on('submit', function(e){
		e.preventDefault();
	  var formData = new FormData(document.getElementById("form_ultrafreezer"));
    

	$.ajax({
		url: 'templates/ultrafreezer/carga_datos_crudos.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success:function(response) {

        if(response == 0){
         	Swal.fire({
					position:'center',
					icon:'success',
					title:'Se ha cargado el archivo de los datos crudos',
					timer:1500
				});
           mostrar_datos_crudos(id_asignado, id_bandeja, id_mapeo, id_valida);
        }
      else{
        Swal.fire({
					position:'center',
					icon:'warning',
					title:'Advertencia:',
          text:'Debes borrar los datos crudos para cargar el archivo',
					timer:1700
				});
      }
      
    } 
  
  });
});



///////////////////////FUNCIÓN PARA MOSTRAR LOS DATOS CRUDOS

function mostrar_datos_crudos(parametro_a, parametro_b, parametro_c, parametro_d){
  

     
    const datos = {
      parametro_a,
      parametro_b,
      parametro_c,
      parametro_d
    }
  
  
    let img = "<img src='templates/ultrafreezer/recursos/loading.gif' width='90px'>";
  
    $("#resultados_dc").html(img);
  
  
  $.ajax({
    type:'POST',
    url: 'templates/ultrafreezer/cargar_datos_crudos_db_ultrafreezer.php',
    data: datos,
    success:function(response){
      
      $("#trayendo_resultados").show();
      $("#resultados_dc").hide();
      let traer = JSON.parse(response);
      let template_1 = "";
      let template_2 = "";
      let template_3 = "";
      let template_4 = "";
      let template_5 = "";
      let template_6 = "";
      let template_7 = "";
      let template_8 = "";
      let template_9 = "";
      let template_10 = "";
      let template_11 = "";
      let template_12 = "";
      
      traer.forEach((x)=>{
        
        if(x.columna == 1){
      
         template_1 +=
          `
          <tr>
            <td>${x.time}</td>
            <td>${x.temperatura}</td>
          <tr>
          `; 
        }
        
        if(x.columna == 2){
         template_2 +=
          `
          <tr>
            <td>${x.time}</td>
            <td>${x.temperatura}</td>
          <tr>
          `; 
        }
        
        if(x.columna == 3){
         template_3 +=
          `
          <tr>
            <td>${x.time}</td>
            <td>${x.temperatura}</td>
          <tr>  
          `; 
        }
        
        if(x.columna == 4){
         template_4 +=
          `
          <tr>
            <td>${x.time}</td>
            <td>${x.temperatura}</td>
          <tr>  
          `; 
        }
        
        if(x.columna == 5){
         template_5 +=
          `
          <tr>
            <td>${x.time}</td>
            <td>${x.temperatura}</td>
          <tr>  
          `; 
        }
        
        if(x.columna == 6){
         template_6 +=
          `
          <tr>
            <td>${x.time}</td>
            <td>${x.temperatura}</td>
          <tr>  
          `; 
        }
        
        if(x.columna == 7){
         template_7 +=
          `
          <tr>
            <td>${x.time}</td>
            <td>${x.temperatura}</td>
          <tr>  
          `; 
        }
        
        if(x.columna == 8){
         template_8 +=
          `
          <tr>
            <td>${x.time}</td>
            <td>${x.temperatura}</td>
          <tr>  
          `; 
        }
        
        if(x.columna == 9){
         template_9 +=
          `
          <tr>
            <td>${x.time}</td>
            <td>${x.temperatura}</td>
          <tr>  
          `; 
        }
        
        if(x.columna == 10){
         template_10 +=
          `
          <tr>
            <td>${x.time}</td>
            <td>${x.temperatura}</td>
          <tr>  
          `; 
        }
        
        if(x.columna == 11){
         template_11 +=
          `
          <tr>
            <td>${x.time}</td>
            <td>${x.temperatura}</td>
          <tr>  
          `; 
        }
        
        if(x.columna == 12){
         template_12 +=
          `
          <tr>
            <td>${x.time}</td>
            <td>${x.temperatura}</td>
          <tr>  
          `; 
        }
        
        
        
      });
      
      $("#columna_1").html(template_1);
      $("#columna_2").html(template_2);
      $("#columna_3").html(template_3);
      $("#columna_4").html(template_4);
      $("#columna_5").html(template_5); 
      $("#columna_6").html(template_6); 
      $("#columna_7").html(template_7);
      $("#columna_8").html(template_8);  
      $("#columna_9").html(template_9);
      $("#columna_10").html(template_10); 
      $("#columna_11").html(template_11);
      $("#columna_12").html(template_12);  
      
      
    }
  });
  
}



////////////////////////////////////////////ELIMINAR DATOS CRUDOS////////////
$("#eliminar_dc").click(function(){
  
   const datos = {
     id_asignado, 
     id_bandeja, 
     id_mapeo, 
     id_valida
   }
   
   Swal.fire({
					position:'center',
					icon:'info',
					title:'¿ Eliminar datos crudos ?',
          text:'Si eliminas los datos crudos, no podras recuperarlos, ¿Deseas continuar?',
					showCancelButton:true,
          cancelButtonText:'No!',
          showConfirmButton:true,
          confirmButtonText:'Si!'
				}).then((x)=>{
        
         if(x.value){
           $.post('templates/ultrafreezer/eliminar_dc.php',datos,function(response){

              if(response > 0){
                  Swal.fire({
                  position:'center',
                  icon:'success',
                  title:'Se ha eliminado los datos crudos correctamente',
                  timer:1500
                });
                mostrar_datos_crudos(id_asignado, id_bandeja, id_mapeo, id_valida);
              }
           });
        }
   });

});

////////////////////////////////////////APROBAR DATOS CRUDOS

$("#aprobar_dc").click(function(){
  
   const datos = {
     id_asignado, 
     id_bandeja, 
     id_mapeo
   }
   
   $.post('templates/ultrafreezer/aprobar_dc.php',datos,function(response){
      
      if(response > 0){
        	Swal.fire({
					position:'center',
					icon:'success',
					title:'Se ha aprobado la carga de datos crudos',
					timer:1500
				});
        mostrar_datos_crudos(id_asignado, id_bandeja, id_mapeo, id_valida);
      }
     
   });
  
});

////////////////////////////////////////////////////////////COMIENZO EL CONTROL DE LA MANIPULACIÓN DEL PERSONAL//
$("#cerrar_crear_personal_ultrafreezer").click(function(){ 
  $("#personal_2_ultrafreezer").show();
  $("#personal_1_ultrafreezer").hide();
  $("#cerrar_crear_personal_ultrafreezer").hide();
  $("#editar_personal_ultrafreezer").hide();
  $("#guardar_personal_ultrafreezer").show();
});

$("#crear_personal_empresa_ultrafreezer").click(function(){
  
  $("#personal_2_ultrafreezer").hide();
  $("#personal_1_ultrafreezer").show();
  $("#cerrar_crear_personal_ultrafreezer").show();
  $("#apellidos_personal_ultrafreezer").val("");
  $("#cargo_personal_ultrafreezer").val("");
  
});




$("#guardar_personal_ultrafreezer").click(function(){
  
   let nombres_personal = $("#nombres_personal_ultrafreezer").val(); 
   let apellidos_personal =  $("#apellidos_personal_ultrafreezer").val();
   let cargo_personal = $("#cargo_personal_ultrafreezer").val();
  
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
       url:'templates/ultrafreezer/agrega_personal.php',
       success:function(response){

        if(response == "Creado"){
           Swal.fire({
             position:'center',
             icon:'success',
             title:'Se ha creado el participante',
             timer:1500
           });
           $("#personal_1_ultrafreezer").hide();
           listar_participantes_ultrafreezer();
           $("#personal_2_ultrafreezer").show();
           $("#cerrar_crear_personal_ultrafreezer").hide();
           $("#nombres_personal_ultrafreezer").val('');
           $("#apellidos_personal_ultrafreezer").val('');
           $("#cargo_personal_ultrafreezer").val('');
         } 
       }
     });
    }

});


function listar_participantes_ultrafreezer(){
  
  $.ajax({
    type:'POST',
    data:{id_asignado},
    url:'templates/ultrafreezer/listar_participantes.php',
    success:function(response){
      
      let traer = JSON.parse(response);
      let template = "";
      traer.forEach((x)=>{
        
        template +=`
          <tr>
            <td>${x.nombres} ${x.apellidos}</td>
            <td>${x.cargo}</td>
            <td><button class="btn btn-danger" id="eliminar_participante_ultrafreezer" data-id="${x.id_informe_participante}">Eliminar</button></td>
            <td><button class="btn btn-primary" id="editar_participante_ultrafreezer" data-id="${x.id_informe_participante}">Editar</button></td>  
          </tr>
          `;
      });
      
      $("#resultados_personal_ultrafreezer").html(template);
    }
    
    
  });
  
}


$(document).on('click','#eliminar_participante_ultrafreezer', function(){

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
        url:'templates/ultrafreezer/eliminar_participante.php',
        data: {id_participante},
        success:function(response){
    
          if(response == "Si"){
              
            Swal.fire({
              position:'center',
              icon:'success',
              title:'Eliminado',
              timer:1500
            });
            
            listar_participantes_ultrafreezer();
          }  
      }
    });
      }
    });
    
  
  
});
 
$(document).on('click','#editar_participante_ultrafreezer', function(){
  
    let id_participante = $(this).attr('data-id');
    $("#personal_1_ultrafreezer").show();
    $("#personal_2_ultrafreezer").hide();
    $("#cerrar_crear_personal_ultrafreezer").show();
    $("#guardar_personal_ultrafreezer").hide();
    $("#editar_personal_ultrafreezer").show();
    
    $.ajax({
      type:'POST',
      url:'templates/ultrafreezer/traer_participante.php',
      data:{id_participante},
      success:function(response){
          
        let traer = JSON.parse(response);
        
        
      
          
          $("#nombres_personal_ultrafreezer").val(traer.nombres);
          $("#apellidos_personal_ultrafreezer").val(traer.apellidos);
          $("#cargo_personal_ultrafreezer").val(traer.cargo);
          $("#id_oculto_personal_ultrafreezer").val(traer.id_participante_oculto);
         

       
      }
    })
     
});


$(document).on('click','#editar_personal_ultrafreezer',function(){
  
         let nombres = $("#nombres_personal_ultrafreezer").val();
         let apellidos = $("#apellidos_personal_ultrafreezer").val();
         let cargo = $("#cargo_personal_ultrafreezer").val();
         let id_oculto = $("#id_oculto_personal_ultrafreezer").val();
  
         const datos = {
          nombres,
          apellidos,
          cargo,
          id_oculto
         }
         
         $.ajax({
           type:'POST',
           url:'templates/ultrafreezer/editar_personal.php',
           data: datos,
           success:function(response){
        
             if(response == "Modificado"){
               Swal.fire({
                 position:'center',
                 title:'Editado',
                 icon:'success',
                 timer:1500
               });
               listar_participantes_ultrafreezer();
               $("#personal_2_ultrafreezer").show();
                $("#personal_1_ultrafreezer").hide();
                $("#cerrar_crear_personal_ultrafreezer").show();
                $("#apellidos_personal_ultrafreezer").val("");
                $("#cargo_personal_ultrafreezer").val("");
               
             }
           }
         });
  
});



/////////////////////////////CONTROL DE INFORMES PARA REFRIGERADORES

//FUNCION PARA CONTAR REGISTRO DE LOS INFORMES
function contar_registro_informes_ultrafreezer(){
 
		$.ajax({
			type:'POST',
			data:{id_asignado},
			url: 'templates/ultrafreezer/contar_registro_informes.php',
			success:function(e){
	       
				if(e == "Abrete"){
						$("#asignacion_informe_ultrafreezer").show();
				}else{
					$("#asignacion_informe_ultrafreezer").hide();
				}
				
			}
			
		});
}



function crear_informes_ultrafreezer(){

	let id_valida = $('#id_valida').val();
		
	const data = 
			{id_asignado, id_valida}

		$.post('templates/ultrafreezer/informe_ultrafreezer.php', data , function(response){

		});
}


//////////////////////////////////////////////////////////////FUNCIONES PARA CORRELATIVO

function leer_correlativo(x){
    
    $.post('templates/ultrafreezer/validar_correlativo.php',{x},function(response){
       
      
        if(response.length == 0){
          $("#crear_mapeo").hide();
           $("#ver_mapeo").hide();
          
        }
      else{
        $("#crear_mapeo").show();
         $("#aqui_consecutivo_ultrafreezer").text(response);
      }
    });
 
}





$("#cambiando_correlativo_ultrafreezer").click(function(){
  
    let correlativo = $("#correlativo_informe_ultrafreezer").val();
    
    const data_2 = 
    {
      id_asignado,
      correlativo,
      id_valida
    }
    
    $.post('templates/ultrafreezer/ingresa_correlativo_ultrafreezer.php', data_2, function(e){

      if(e == "Si"){
        Swal.fire({
          position:'center',
          icon:'success',
          title:'Correlativo Creado',
          showConfirmButton: false,
          timer:1500
        });
        
        
        $("#aqui_consecutivo_ultrafreezer").text(correlativo);
		setTimeout(recargar_pagina,1500);
      }
     
      leer_correlativo(id_asignado); 
    });  
   
});
//funcion recargar
function recargar_pagina(){
	location.reload();
}

function listar_informes_ultrafreezer(){

	$.ajax({
		type : 'POST',
		data : {id_asignado},
		url: 'templates/ultrafreezer/listar_informes.php',
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
				/*if(result.estado_aprobacion === null  || result.estado_aprobacion == 0){
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
				}*/
							
				//logica para el estado
				/*if(result.estado == 0){
					estado = "No terminado";
					contador = 30;
				}else if(result.estado == 1){
					estado = "Terminado";
					contador = 50;
				}else{
					estado = "Entregado a cliente";
					contador = 100;
				}*/
				
				//VALIDAR IMAGES
				if(result.img_posicion){
						img_1 =`<img src="templates/ultrafreezer/${result.img_posicion}"  width="100px"/>`;
				}else{
						img_1 =`<span class="text-danger">Sin imagen</span>`;
				}
				
				if(result.grafica_1){
					img_2 =`<img src="templates/ultrafreezer/${result.grafica_1}"  width="100px"/>`;
				}else{
					img_2 =`<span class="text-danger">Sin imagen</span>`;
				}
				
				if(result.grafica_2){
					img_3 =`<img src="templates/ultrafreezer/${result.grafica_2}"  width="100px"/>`;
				}else{
					img_3 =`<span class="text-danger">Sin imagen</span>`;
				}
        
        if(result.n_increment == null){
          mas_nombre = "";
        }else{
          mas_nombre = result.n_increment;
        }
				
			 
                  template +=
                    `
                    <div id="accordion">
                    <div class="card">
                      <div class="card-header">
                          <br>
                          <a  data-toggle="collapse" data-target="#collapseOne${contador_acordeon}"  aria-controls="collapseOne">
                               <h5><strong>Nombre Informe:</strong> ${result.nombre}
                                   <select  id="cambio_tem" data-id="${result.id_informe}">
                                      <option value="${mas_nombre}">${mas_nombre}</option>
                                      <option value="01">01</option>
                                      <option value="02">02</option>
                                      <option value="03">03</option>
                                      <option value="04">04</option>
                                      <option value="05">05</option>
                                      <option value="06">06</option>
                                      <option value="07">07</option>
                                      <option value="08">08</option>
                                      <option value="09">09</option>
                                      <option value="10">10</option>
                                      <option value="11">11</option>
                                      <option value="12">12</option>
                                      <option value="13">13</option>
                                      <option value="14">14</option>
                                      <option value="15">15</option>
                                      <option value="16">16</option>
                                      <option value="17">17</option>
                                      <option value="18">18</option>
                                      <option value="19">19</option>
                                      <option value="20">20</option>
                                      <option value="21">21</option>
                                      <option value="22">22</option>
                                      <option value="23">23</option>
                                      <option value="24">24</option>
                                       <option value="25">25</option>
                                      <option value="26">26</option>
                                      <option value="27">27</option>
                                       <option value="28">28</option>
                                       <option value="29">29</option>
                                      <option value="30">30</option>  
                                    </select></h5>
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
 
                        <form id="form_2_ultrafreezer" enctype="multipart/form-data" method="post">
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
                          <div class="col-sm-6" style="text-align:center;">
                            <a  class="btn btn-primary text-white" id="Generar_datos_crudos_ultrafreezer" data-id = "${result.id_informe}"  	type="${result.tipo_informe}">Validación datos crudos</a>
                          </div>
                          <div class="col-sm-6" style="text-align:center;">
                            <a  class="btn btn-primary text-white" id="Generar_datos_crudos_ultrafreezer_2" data-id = "${result.id_informe}"  	type="${result.tipo_informe}">Datos crudos</a>
                          </div>
                        </div>

                        <br>

                        <form id="form_1_ultrafreezer" enctype="multipart/form-data" method="post">
                          <input type="hidden" name="tipo_image_2" value="${result.tipo_informe}">
                          <input type="hidden" name="id_informe" value="${result.id_informe}">
                          <div class="row">
                            <div class="col-sm-4" style="text-align:center;">
                              <label>Posición Sensores</label>
                              <input type="file" name="imagen_1" id="image_1" class="form-control">
                            </div>

                            <div class="col-sm-4" style="text-align:center;">
                              <label>Imagen Grafica Valores Promedio, Mínimo, Maximo </label> 
                              <input type="file" name="imagen_2" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Datos de todos los sensores en periodo representativo </label>
                                <input type="file" name="imagen_3" class="form-control">
                            </div>
                          </div>

                          <br>

                          <div class="row">
                            <div class="col-sm-4" style="text-align:center;">
                              <a data-toggle="tab" class="btn-shadow  btn btn-danger text-white" style="width:30px;" id="eliminar_imagen_ultrafreezer" data-nombre="${result.img_posicion}" 
                                data-id="${result.id_informe}">X</a>
                              <br>
                              ${img_1}
                            </div>
                            <div class="col-sm-4" style="text-align:center;">
                              <a data-toggle="tab" class="btn-shadow active btn btn-danger" id="eliminar_imagen_ultrafreezer" data-nombre = "${result.grafica_1}" data-id="${result.id_informe}">X</a>
                              <br>
                              ${img_2}
                            </div>
                            <div class="col-sm-4" style="text-align:center;">
                              <a data-toggle="tab" class="btn-shadow active btn btn-danger" id="eliminar_imagen_ultrafreezer" data-nombre = "${result.grafica_2}"	data-id="${result.id_informe}">X</a>
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
                              <a class='btn btn-ligth'  data-id = "${result.id_informe}" id="pdf_ultrafreezer" data-nombre="${result.tipo_informe}"><img src="design/images/pdf.png" width="50px"/></a>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-12" style="text-align:right">
                              <a class='btn btn-ligth'  data-id = "${result.id_informe}" data-nombre="${result.nombre}" id="eliminar_informe_ultrafreezer">
                                <span class="text-danger"><h4>Eliminar informe</h4></span></a>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    </div>
                    </div>
                    <br><br>`;
                  
                  contador_acordeon = contador_acordeon +1;
                });
			$("#traer_informes_ultrafreezer").html(template);			
		}	
	});
}


(function(){
	
	$(document).on('submit','#form_2_ultrafreezer',function(e){
						e.preventDefault();
		
	$.ajax({
		url: 'templates/ultrafreezer/actualizar_informe_parte_1.php',
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
					listar_informes_ultrafreezer();
				}
		}	
	});		
	});		
}());





/////////////////////////////////////////////////////////////CONTROLA LA FIRMA DE LOS DOCUMENTOS//////////////////////////////////////////////
function firma_usuario_ultrafreezer(){  
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
        $("#quien_firma_ultrafreezer").html(template_2+template);
      }
    });
  
}




(function(){
  
  $("#quien_firma_ultrafreezer").change(function(){
    
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
                listar_firmador_ultrafreezer();
              }
              
            }
          });
      }
      
    });
  });
  
}());

function listar_firmador_ultrafreezer(){
  
  $.ajax({
    type:'POST',
    data:{id_asignado},
    url:'listar_firma.php',
    success:function(response){
     
        let traer = JSON.parse(response);
        
        traer.forEach((x)=>{
          $("#persona_firma_ultrafreezer").text(x.nombres +' '+ x.apellidos);
        });
    }
  });
}
//////////// FUNCION PARA DETERMINAR EL TEMP DE LOS INFORMES 
$(document).on('change','#cambio_tem', function(){
  
 let cambio_a = $(this).val();
 let id_informe = $(this).attr('data-id');
 
  const datos = {
    cambio_a,
    id_informe
  }
  
 $.ajax({
   type:'POST',
   data: datos,
   url:'templates/ultrafreezer/cambio_temp_informe.php',
   success:function(response){
 
     if(response == "Si"){
       Swal.fire({
         title:'Mensaje',
         text:'Se ha actualizado el TEM correctamente',
         icon:'success',
         timer:2000
       });
       listar_informes_ultrafreezer();
     }
   }
 })
  
});

//FUNCION PARA CONTROLAR EL BOTTON DE EVIDENCIAS GRAFICAS
(function(){
	
		$(document).on('submit','#form_1_ultrafreezer',function(e){
							e.preventDefault();

		$.ajax({
			url: 'templates/ultrafreezer/cargar_evidencias_graficas_ultrafreezer.php',
			type: 'POST',
			dataType: 'html',
			data: new FormData(this),
			cache: false,
			contentType: false,
			processData: false,
			success:function(response){	
        
       
				listar_informes_ultrafreezer();
			}	

		});

		});		
	
}());


///////////////////////////////////////BOTON DE DATOS CRUDOS///////////////
	$(document).on('click','#Generar_datos_crudos_ultrafreezer',function(){
			
		let id_informe = $(this).attr('data-id');
		let type = $(this).attr('type');
		
			window.open('matriz_validacion_datos_crudos_ultrafreezer.php?id='+id_informe+'&type='+type);
				
	});

	$(document).on('click','#Generar_datos_crudos_ultrafreezer_2',function(){
			
		let id_informe = $(this).attr('data-id');
		let type = $(this).attr('type');
		
			window.open('matriz_datos_crudos_ultrafreezer.php?id='+id_informe+'&type='+type);
				
	});




//FUNCION PARA ELIMINAR IMAGENES
	
	$(document).on('click','#eliminar_imagen_ultrafreezer',function(){

		
		let id_informe = $(this).attr('data-id');
		let url = $(this).attr('data-nombre');
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
					data: {id_informe, url},
					url:'templates/ultrafreezer/eliminar_imagen.php',
					success:function(response){
						if(response == "Si"){
							Swal.fire({
								position:'center',
								title:'Se ha eliminado correctamente la imagen',
								icon: 'success',
								timer:1500
							});
							listar_informes_ultrafreezer();
            
						}
					}
				});
			}	
		});
	});


////////////////VER PDF///////
$(document).on('click','#pdf_ultrafreezer',function(){
	let id_informe = $(this).attr("data-id");
  
   window.open('templates/ultrafreezer/informes/pdf/informe_mapeo_ultrafreezer_temp.php?informe='+id_informe);
  
  
});

//FUNCION PARA ELIMINAR INFORME
(function(){

	$(document).on('click','#eliminar_informe_ultrafreezer',function(){
		
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
					url:'templates/ultrafreezer/eliminar_informe.php',
					success:function(response){
						
						if(response == "Si"){
							Swal.fire({
								position:'center',
								title:'Informe eliminado correctamente',
								icon:'success',
								timer:1500							
							});
							listar_informes_ultrafreezer();
              validar_generar_informes();
             
						}
					}
				});
			}
			
		});
		
	});
	
}());


/////////////////////////////FUNCION CREADA PARA BUSCAR SENSORES////////////////////

$(".mostrar_sensores_contenedor_buscados").hide();
$(".mostrar_sensores_contenedor").show();

(function(){
    
 $("#buscar_sensores_ultrafreezer").keydown(function(){
   
   let tecleado = $("#buscar_sensores_ultrafreezer").val();
   
   if(tecleado.length > 1){
     $(".mostrar_sensores_contenedor_buscados").show();
     $(".mostrar_sensores_contenedor").hide();
     
     $.ajax({
       type:'POST',
       url:'templates/ultrafreezer/buscador_sensores_acme.php',
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
								<button class="btn btn-success" id="agregar_sensor_ultrafreezer">+</button>
								<button class="btn btn-danger" id="quitar_sensor_ultrafreezer">X</button>
						</td>				
					</tr>
					`;

					
					
				});
			$("#sensores_encontrados_ultrafreezer").html(template);
         
       }
       
     });
   }else{
     $(".mostrar_sensores_contenedor_buscados").hide();
     $(".mostrar_sensores_contenedor").show();
   }
 })
}());

////////////////////////////VALIDAR GENERAR INFORMES//////////


function validar_generar_informes(){
  
    $.ajax({
      type:'POST',
      data:{id_asignado},
      url:'templates/ultrafreezer/validar_informes.php',
      success:function(response){
        if(response == "Si"){
          $("#cargar_informes").hide();
        }else{
           $("#cargar_informes").hide();
        }
      }
    });
}


$("#cargar_informes").click(function(){
    
    $.ajax({
      type:'POST',
      data:{id_asignado},
      url:'templates/ultrafreezer/crear_informes_after.php',
      success:function(response){
   
       
          Swal.fire({
            title:'Generación de informes',
            text:'Los informes han sido generados',
            icon:'success',
            timer:1700
          });
          validar_generar_informes();
          contar_registro_informes_ultrafreezer();
          listar_informes_ultrafreezer();
      
      }
    });
});


///// CONTROLAR EL CAMPO OPCIONAL NOMBRE DE PRUEBA
$("#nombre_mapeo_ultrafreezer").change(function(){
  
  let valor = $(this).val();
  
 if(valor == "FFFFF"){
   $("#nombre_opcional_mapeo").show();
   $("#nombre_opcional_div").show();
 }else{
   $("#nombre_opcional_mapeo").hide();
   $("#nombre_opcional_div").hide();
 }
  
});
      
