////// ELEMENTOS A OCULTAR 
$("#asignacion_mapeo_estufaeincubadora").hide();
$("#asignacion_participantes_estufaeincubadora").hide();
$("#asignacion_informe_estufaeincubadora").hide();
$("#cuerpo_mapeo_estufaeincubadora").hide();
$("#cuerpo_bandeja_estufaeincubadora").show();
$("#btn_actualizar_bandeja_estufaeincubadora").hide();
$("#btn_actualizar_mapeo_estufaeincubadora").hide();
$("#change_mapeo_estufaeincubadora").hide();
$("#btn_nueva_bandeja_estufaeincubadora").show();
$("#nombre_mapeo_eleccion").hide();
$("#cargue_datos_crudos").hide();

//window.history.replaceState({},'','user.html');
//////////// CREACIÓN DE VARIABLES GLOBAL
var id_valida_estufaeincubadora = $("#id_valida").val();
var id_asignado_estufaeincubadora = $("#id_asignado_estufaeincubadora").val();
var id_mapeoo_estufaeincubadora = "";
var id_bandejao_estufaeincubadora = "";
var id_mapeo_estufaeincubadora = "";
var id_bandeja_estufaeincubadora = "";


//////////// FUNCIONES QUE SE EJECUTAN CUANDO CARGA LA PAGINA
leer_correlativo_estufaeincubadora(id_asignado_estufaeincubadora);
listar_bandejas_estufaeincubadora();
contar_registros_estufaeincubadora();
listar_mapeos_estufaeincubadora();
listar_informes_estufaeincubadora()
setear_campos_estufaeincubadora();
contar_registro_informes_estufaeincubadora();
firma_usuario_estufaeincubadora();
listar_firmador_estufaeincubadora();


////////////// LEER CORRELATIVO DEL INFORME
function leer_correlativo_estufaeincubadora(x){  
  $.post('templates/estufaeincubadora/validar_correlativo.php',{x},function(response){
  if(response.length != 0){
    $("#cuerpo_bandeja_estufaeincubadora").show();
    $("#aqui_consecutivo_estufaeincubadora").text(response);

  }else{
  	$("#ver_mapeo_estufaeincubadora").css("display", "none");
  	$("#crear_mapeo_estufaeincubadora").css("display", "none");
  }
 });
}


////////// EVENTO QUE CREA O CAMBIA EL CONSECUTIVO ASIGNADO AL INFORME
$("#cambiando_correlativo_estufaeincubadora").click(function(){
  
  let correlativo = $("#correlativo_informe_estufaeincubadora").val();
  const data_2 = 
  {
    id_asignado_estufaeincubadora,
    correlativo,
    id_valida_estufaeincubadora
  }

  $.post('templates/estufaeincubadora/ingresa_correlativo_estufaeincubadora.php', data_2, function(e){

  if(e == "Si"){
    Swal.fire({
    position:'center',
    icon:'success',
    title:'Correlativo Creado',
    timer:1700
    });
    $("#aqui_consecutivo_estufaeincubadora").text(correlativo);
     setTimeout(recargar_pagina,1700);

  }

  leer_correlativo(id_asignado_estufaeincubadora);
  });  
});


function recargar_pagina(){
   location.reload();
}

////////// EVENTO QUE CREARA LAS BANDEJAS
$(function(){
	$("#btn_nueva_bandeja_estufaeincubadora").click(function(){
			var bandeja = $("#bandeja_estufaeincubadora").val();
		const datos = {
			id_asignado_estufaeincubadora,
			bandeja,
			id_valida_estufaeincubadora
		}
    
		$.post('templates/estufaeincubadora/crear_bandeja.php',datos, function(e){
			if(e=="creado"){
				Swal.fire({
					position:'center',
					icon:'success',
					title:'Bandeja(s) creada(s) con exito',
					timer:1500
				});
				listar_bandejas_estufaeincubadora();
				contar_registros_estufaeincubadora();
			}
		});
	});
  }());

////// FUNCIÓN PARA LISTAR LAS BANDEJAS CREADAS 
function listar_bandejas_estufaeincubadora(){
 
	$.ajax({
		type:'POST',
		url:'templates/estufaeincubadora/listar_bandeja.php',
		data: {id_asignado_estufaeincubadora},
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
								<button class="btn btn-success" data-id="${result.id_bandeja}" id="modificar_bandeja_creada_estufaeincubadora" data-nombre="${result.nombre}"><i class="pe-7s-check">	</i></button>
								<button class="btn btn-danger" data-id="${result.id_bandeja}" id="eliminar_bandeja_creada_estufaeincubadora">X</button>			
						</div>
					</td>
				</tr>				
				`;
			});
			$("#resultados_bandeja_estufaeincubadora").html(template);
		}
	});
}


////// FUNCIÓN PARA CONTAR LA CANTIDAD DE BANDEJAS
function contar_registros_estufaeincubadora(){
		$.ajax({
		type: 'POST',
		url:'templates/estufaeincubadora/contar_bandeja.php',
		data: {id_asignado_estufaeincubadora},
		success:function(e){
    
			let x = 0;
			if(e == 0){
				x = 1;
			}else{
				x = e;
			}
			
			$("#cuantas_bandeja_estufaeincubadora").val(x);
			if(e > 0){
				$("#anuncio_mapeo_1_estufaeincubadora").hide();
     
        $("#cuerpo_mapeo_estufaeincubadora").show();
			}else{
				$("#anuncio_mapeo_1_estufaeincubadora").show();
				$("#cuerpo_mapeo_estufaeincubadora").hide();
        
			}
		}
		
	});
}


/////////// ELIMINAR BANDEJA
$(document).on('click','#eliminar_bandeja_creada_estufaeincubadora',function(){

  let id_bandeja = $(this).attr('data-id');
  $("#id_bandeja_actualizar_estufaeincubadora").val(id_bandeja); 	
  let id_bandeja_change =  document.getElementById("id_bandeja_actualizar_estufaeincubadora").value;
  const data = {
    id_bandeja_change,
    id_asignado_estufaeincubadora,
    id_valida_estufaeincubadora
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
      $.post('templates/estufaeincubadora/eliminar_bandeja.php', data, function(e){

    if(e == "Eliminado"){
    Swal.fire({
    position:'center',
    icon:'success',
    title:'La bandeja ha sido eliminada',
    timer:1500
    });
    listar_bandejas_estufaeincubadora();
    contar_registros_estufaeincubadora();
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

///////// ACTUALIZAR BANDEJA 
$(document).on('click','#modificar_bandeja_creada_estufaeincubadora', function(){
	
	$("#btn_actualizar_bandeja_estufaeincubadora").show();
	$("#btn_nueva_bandeja_estufaeincubadora").hide();
	
	let id_bandeja = $(this).attr('data-id');
	let nombre = $(this).attr('data-nombre');

	$("#bandeja_estufaeincubadora").val(nombre);
  $("#id_bandeja_actualizar_estufaeincubadora").val(id_bandeja);

});

$("#btn_actualizar_bandeja_estufaeincubadora").click(function(){
		
      let bandeja_nombre = document.getElementById("bandeja_estufaeincubadora").value;
      let id_bandeja_change =  document.getElementById("id_bandeja_actualizar_estufaeincubadora").value;
      
  
		
			const datos = {
			id_bandeja_change,
			bandeja_nombre,
			id_asignado_estufaeincubadora,
			id_valida_estufaeincubadora
		}
        
		$.post('templates/estufaeincubadora/actualizar_bandeja.php', datos, function(e){

		if(e=="Modificado"){
			Swal.fire({
				position:'center',
				icon:'success',
				title:'La bandeja ha sido modificada',
				timer:1500,
			});
			
			$("#bandeja_estufaeincubadora").val("");
			$("#bandeja_estufaeincubadora").text("");
			$("#btn_actualizar_bandeja_estufaeincubadora").hide();
			listar_bandejas_estufaeincubadora();
			contar_registros_estufaeincubadora();			
		}
		
	});
  
			
			
		});

//////// CREAR MAPEO 
(function(){
	$("#btn_nuevo_mapeo_estufaeincubadora").click(function(){
	    
    
		let nombre_mapeo = $("#nombre_mapeo_estufaeincubadora").val();
		let fecha_inicio_mapeo = $("#fecha_inicio_mapeo_estufaeincubadora").val();
		let hora_inicio_mapeo = $("#hora_inicio_mapeo_estufaeincubadora").val();
		let minuto_inicio_mapeo = $("#minuto_inicio_mapeo_estufaeincubadora").val();
		let segundo_inicio_mapeo = $("#segundo_inicio_mapeo_estufaeincubadora").val();
		let fecha_fin_mapeo = $("#fecha_fin_mapeo_estufaeincubadora").val();
		let hora_fin_mapeo = $("#hora_fin_mapeo_estufaeincubadora").val();
		let minuto_fin_mapeo = $("#minuto_fin_mapeo_estufaeincubadora").val();
		let segundo_fin_mapeo = $("#segundo_fin_mapeo_estufaeincubadora").val();
		let intervalo = $("#intervalo_estufaeincubadora").val();
		let temperatura_minima = $("#temperatura_minima_estufaeincubadora").val();
		let temperatura_maxima = $("#temperatura_maxima_estufaeincubadora").val();
		let valor_seteado_temperatura = $("#valor_seteado_temperatura_estufaeincubadora").val();
    let nombre_asignado = $("#nombre_mapeo_eleccion").val();
    let nombre_final_mapeo = "";
    
    if(nombre_asignado.length > 0){
      nombre_final_mapeo = nombre_asignado
    }else{
      nombre_final_mapeo = nombre_mapeo
    }

		const datos = {
		  nombre_final_mapeo,
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
			id_asignado_estufaeincubadora,
			id_valida_estufaeincubadora
		}
	
		$.post('templates/estufaeincubadora/crear_mapeo.php', datos , function(e){	 

			if(e=="Creado"){
				Swal.fire({
					position:'center',
					title:'El mapeo ha sido creado',
					icon:'success',
					timer:1500
				});
				listar_mapeos_estufaeincubadora();
        listar_informes_estufaeincubadora()
				setear_campos_estufaeincubadora();
				crear_informes_estufaeincubadora();
        contar_registro_informes_estufaeincubadora();		  
			}
		});
	 	
	});
 }());

/////////// LISTAR MAPEOS 
function listar_mapeos_estufaeincubadora(){
	$.ajax({
		type : 'POST',
		data : {id_asignado_estufaeincubadora},
		url:'templates/estufaeincubadora/listar_mapeos.php',
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
					<td>${result.temperatura_minima}</td>
					<td>${result.temperatura_maxima}</td>
					<td>
						<div style="text-align:center;">
							<button class="btn btn-success" data-id="${result.id_mapeo}" id="modificar_mapeo_creada_estufaeincubadora"><i class="pe-7s-check"></i></button>
							<button class="btn btn-danger" data-id="${result.id_mapeo}" id="eliminar_mapeo_creada_estufaeincubadora">X</button>
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
					<td><button class="btn btn-success" id="buscar_bandeja_asignada_estufaeincubadora" data-id="${result.id_mapeo}"  data-id-2="${id_asignado_estufaeincubadora}" nombre="${result.nombre}" ><i class="lnr-checkmark-circle"></i></button></td>
				</tr>

				`;
			});
			
			$("#listando_mapeos_creados_estufaeincubadora").html(template2);
			$("#listando_mapeos_estufaeincubadora").html(template);
			$("#asignacion_participantes_estufaeincubadora").show();
			$("#asignacion_informe_estufaeincubadora").show();
		}
	});
}

///////// LISTAR INFORMES 
function listar_informes_estufaeincubadora(){

	$.ajax({
		type : 'POST',
		data : {id_asignado_estufaeincubadora},
		url: 'templates/estufaeincubadora/listar_informes.php',
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
						img_1 =`<img src="templates/estufaeincubadora/${result.img_posicion}"  width="100px"/>`;
				}else{
						img_1 =`<span class="text-danger">Sin imagen</span>`;
				}
				
				if(result.grafica_1){
					img_2 =`<img src="${result.grafica_1}"  width="100px"/>`;
				}else{
					img_2 =`<span class="text-danger">Sin imagen</span>`;
				}
				
				if(result.grafica_2){
					img_3 =`<img src="${result.grafica_2}"  width="100px"/>`;
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
 
                        <form id="form_2_estufaeincubadora" enctype="multipart/form-data" method="post">
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
                            <a  class="btn btn-primary text-white" id="Generar_datos_crudos_estufaeincubadora" data-id = "${result.id_informe}"  	type="${result.tipo_informe}">Validación datos crudos</a>
                          </div>
                          <div class="col-sm-6" style="text-align:center;">
                            <a  class="btn btn-primary text-white" id="Generar_datos_crudos_estufaeincubadora_2" data-id = "${result.id_informe}"  	type="${result.tipo_informe}">Datos crudos</a>
                          </div>
                        </div>

                        <br>

                        <form id="form_1_estufaeincubadora" enctype="multipart/form-data" method="post">
                          <input type="hidden" name="tipo_image_2" value="${result.tipo_informe}">
                          <input type="hidden" name="id_informe" value="${result.id_informe}">
                          <div class="row">
                            <div class="col-sm-4" style="text-align:center;">
                              <label>Posición Sensores</label>
                              <input type="file" name="imagen_1" id="image_1" class="form-control">
                            </div>

                            <div class="col-sm-4" style="text-align:center;">
                              <label>Imagen Grafica Valores Promedio, Mínimo, Maximo </label>
                              <a class="btn btn-success" data-id="${result.id_mapeo}" id="grafico_2_automovil" style="width:100%;">Grafico CERNET</a>
                              <input type="file" name="imagen_2" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Datos de todos los sensores en periodo representativo </label>
                                <a class="btn btn-success" data-id="${result.id_mapeo}" id="grafico_1_estufa_e_incubadora" style="width:100%;">Grafico CERNET</a>
                                <input type="file" name="imagen_3" class="form-control">
                            </div>
                          </div>

                          <br>

                          <div class="row">
                            <div class="col-sm-4" style="text-align:center;">
                              <a data-toggle="tab" class="btn-shadow  btn btn-danger text-white" style="width:30px;" id="eliminar_imagen_estufaeincubadora" data-nombre="${result.img_posicion}" 
                                data-id="${result.id_informe}">X</a>
                              <br>
                              ${img_1}
                            </div>
                            <div class="col-sm-4" style="text-align:center;">
                              <a data-toggle="tab" class="btn-shadow active btn btn-danger" id="eliminar_imagen_estufaeincubadora" data-nombre = "${result.grafica_1}" data-id="${result.id_informe}">X</a>
                              <br>
                              ${img_2}
                            </div>
                            <div class="col-sm-4" style="text-align:center;">
                              <a data-toggle="tab" class="btn-shadow active btn btn-danger" id="eliminar_imagen_estufaeincubadora" data-nombre = "${result.grafica_2}"	data-id="${result.id_informe}">X</a>
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
                              <a class='btn btn-ligth'  data-id = "${result.id_informe}" id="pdf_estufaeincubadora" data-nombre="${result.tipo_informe}"><img src="design/images/pdf.png" width="50px"/></a>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-12" style="text-align:right">
                              <a class='btn btn-ligth'  data-id = "${result.id_informe}" data-nombre="${result.nombre}" id="eliminar_informe_estufaeincubadora">
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
			$("#traer_informes_estufaeincubadora").html(template);			
		}	
	});
}


//////// SETEAR CAMPOS DESPUES DE CREAR UN MAPEO
function setear_campos_estufaeincubadora(){
  $("#fecha_inicio_mapeo_estufaeincubadora").val("");
  $("#hora_inicio_mapeo_estufaeincubadora").val("");
  $("#minuto_inicio_mapeo_estufaeincubadora").val("");
  $("#segundo_inicio_mapeo_estufaeincubadora").val("");
  $("#fecha_fin_mapeo_estufaeincubadora").val("");
  $("#hora_fin_mapeo_estufaeincubadora").val("");
  $("#minuto_fin_mapeo_estufaeincubadora").val("");
  $("#segundo_fin_mapeo_estufaeincubadora").val("");
  $("#intervalo_estufaeincubadora").val("");
  $("#temperatura_minima_estufaeincubadora").val("");
  $("#temperatura_maxima_estufaeincubadora").val("");
  $("#valor_seteado_temperatura_estufaeincubadora").val("");
}

////// FUNCION PARA CREAR INFORMES 
function crear_informes_estufaeincubadora(){
		
	const data = 
		{id_asignado_estufaeincubadora, id_valida_estufaeincubadora}

		$.post('templates/estufaeincubadora/informe_estufaeincubadora.php', data , function(response){
		});
}

//FUNCION PARA CONTAR REGISTRO DE LOS INFORMES
function contar_registro_informes_estufaeincubadora(){
 
		$.ajax({
			type:'POST',
			data:{id_asignado_estufaeincubadora},
			url: 'templates/estufaeincubadora/contar_registro_informes.php',
			success:function(e){
	       
				if(e == "Abrete"){
					$("#asignacion_informe_estufaeincubadora").show();
				}else{
					//$("#asignacion_informe_estufaeincubadora").hide();
				}
				
			}
			
		});
}


///////// FUNCIÓN PARA CREAR UN NOMBRE DIFERENTE DE MAPEO
$("#nombre_mapeo_estufaeincubadora").change(function(){
  let valor = $(this).val();
  
  if (valor == "nombre_eleccion"){
    $("#nombre_mapeo_eleccion").show();
  }else{
    $("#nombre_mapeo_eleccion").hide();
  }
});


////////FUNCION PARA ELIMINAR EL MAPEO CREADO
(function(){	
	$(document).on('click','#eliminar_mapeo_creada_estufaeincubadora',function(){
		
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
				
				
				 let id_valida = $("#id_valida_estufaeincubadora").val();
				 id_mapeo_estufaeincubadora = $(this).attr('data-id');
				
				const data = {
					id_mapeo_estufaeincubadora,
					id_asignado_estufaeincubadora,
					id_valida_estufaeincubadora
				}
				
				$.post('templates/estufaeincubadora/eliminar_mapeo.php', data, function(e){
	
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
							listar_mapeos_estufaeincubadora();
						}
				});
			}
		});
	});
}());

/////////// FUNCIÓN PARA TRAER LA INFORMACIÓN DEL MAPEO 
$(document).on('click','#modificar_mapeo_creada_estufaeincubadora',function(){
		
		$("#btn_actualizar_mapeo_estufaeincubadora").show();
		$("#btn_nuevo_mapeo_estufaeincubadora").hide();
		$("#change_mapeo_estufaeincubadora").show();
	
		
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
				url: 'templates/estufaeincubadora/llamar_editar_mapeo.php',
				success:function(e){
           
					let traer = JSON.parse(e);
			 
						$("#fecha_inicio_mapeo_estufaeincubadora").val(traer.fecha_inicio);
						$("#hora_inicio_mapeo_estufaeincubadora").val(traer.hora_inicio);
						$("#minuto_inicio_mapeo_estufaeincubadora").val(traer.minuto_inicio);
						$("#segundo_inicio_mapeo_estufaeincubadora").val(traer.segundo_inicio);
						$("#fecha_fin_mapeo_estufaeincubadora").val(traer.fecha_final);
						$("#hora_fin_mapeo_estufaeincubadora").val(traer.hora_final);
						$("#minuto_fin_mapeo_estufaeincubadora").val(traer.minuto_final);
						$("#segundo_fin_mapeo_estufaeincubadora").val(traer.segundo_final);
						$("#intervalo_estufaeincubadora").val(traer.intervalo);
						$("#temperatura_minima_estufaeincubadora").val(traer.temperatura_minima);
						$("#temperatura_maxima_estufaeincubadora").val(traer.temperatura_maxima);
						$("#valor_seteado_temperatura_estufaeincubadora").val(traer.valor_seteado_temperatura);
						$("#id_mapeo_creado_estufaeincubadora").val(traer.id_mapeo_estufaeincubadora);
				}
			});
	});


////////// FUNCIÓN PARA EDITAR EL MAPEO 
(function(){
	$("#btn_actualizar_mapeo_estufaeincubadora").click(function(){
		
		let nombre_mapeo = $("#nombre_mapeo_estufaeincubadora").val();
		let fecha_inicio_mapeo = $("#fecha_inicio_mapeo_estufaeincubadora").val();
		let hora_inicio_mapeo = $("#hora_inicio_mapeo_estufaeincubadora").val();
		let minuto_inicio_mapeo = $("#minuto_inicio_mapeo_estufaeincubadora").val();
		let segundo_inicio_mapeo = $("#segundo_inicio_mapeo_estufaeincubadora").val();
		let fecha_fin_mapeo = $("#fecha_fin_mapeo_estufaeincubadora").val();
		let hora_fin_mapeo = $("#hora_fin_mapeo_estufaeincubadora").val();
		let minuto_fin_mapeo = $("#minuto_fin_mapeo_estufaeincubadora").val();
		let segundo_fin_mapeo = $("#segundo_fin_mapeo_estufaeincubadora").val();
		let intervalo = $("#intervalo_estufaeincubadora").val();
		let temperatura_minima = $("#temperatura_minima_estufaeincubadora").val();
		let temperatura_maxima = $("#temperatura_maxima_estufaeincubadora").val();
		let valor_seteado_temperatura = $("#valor_seteado_temperatura_estufaeincubadora").val();
    let nombre_opciona = $("#nombre_mapeo_eleccion").val();
    let nombre_final = ""
    
    if(nombre_mapeo == "nombre_eleccion"){
      nombre_final = nombre_opciona;
    }else{
      nombre_final = nombre_mapeo;
    }
	
     let id_mapeo_2 = $("#id_mapeo_creado_estufaeincubadora").val()
    

  
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
			id_asignado_estufaeincubadora,
			id_valida_estufaeincubadora
		}
		
		$.post('templates/estufaeincubadora/editar_mapeo.php',datos,function(e){
      

			if(e=="Editado"){
				Swal.fire({
					position:'center',
					icon:'success',
					title:'El registro ha sido editado correctamente',
					timer:1500
				});
				listar_mapeos_estufaeincubadora();
				setear_campos_estufaeincubadora();
				$("#btn_actualizar_mapeo_estufaeincubadora").hide();
		    $("#btn_nuevo_mapeo_estufaeincubadora").show();
			}
		});
	});
	}());


//////////// FUNCIÓN PARA COMENZAR LA ASIGNACIÓN CON BANDEJAS 
(function(){
	
	$(document).on('click','#buscar_bandeja_asignada_estufaeincubadora', function(){
		
	  id_mapeo_estufaeincubadora = $(this).attr('data-id');
		let id_asignado = $(this).attr('data-id-2');
		let nombre = $(this).attr('nombre');
	
		listar_bandejas_c_estufaeincubadora(id_asignado_estufaeincubadora);
		
			$("#mapeo_actual_estufaeincubadora").text(" "+nombre);
      $("#nombre_mapeo_estufaeincubadora_dc").text(" "+nombre);
      $("#id_mapeo_estufaeincubadora").val(id_mapeo_estufaeincubadora);
      
	});
	
}());


///////// FUNCIÓN PARA LISTAR LAS BANDEJAS RELACIONADAS A LAS PRUEBAS
function listar_bandejas_c_estufaeincubadora(a){
	
	$.ajax({
		type:'POST',
		data: {a},
		url:'templates/estufaeincubadora/listar_bandejas_creadas.php',
		success:function(e){
		
				let traer = JSON.parse(e);
				let template = "";
			
			traer.forEach((result)=>{
				
				template+=
					`
					<tr>
						<td>${result.nombre}</td>
						<td><button class="btn btn-success" id="buscar_sensores_asignada_estufaeincubadora" data-id="${result.id_bandeja}"><i class="lnr-checkmark-circle"></i></button></td>
					</tr>
					`;
				
			});
			
			$("#listar_bandejas_creadas_estufaeincubadora").html(template);
		
		}
	});
}



/////// FUNCIÓN PARA LISTAR TRAER LOS SENSORES 
(function(){
	$(document).on("click","#buscar_sensores_asignada_estufaeincubadora", function(){
			
				  id_bandeja_estufaeincubadora = $(this).attr('data-id'); 
      
					listar_sensores_estufaeincubadora();
					listar_estufaeincubadora_sensores(id_bandeja_estufaeincubadora, id_mapeo_estufaeincubadora);
          mostrar_datos_crudos_estufaeincubadora(id_asignado_estufaeincubadora, id_bandeja_estufaeincubadora, id_mapeo_estufaeincubadora, id_valida_estufaeincubadora);

			});
}());



////////////// FUNCIÓN PARA LISTAR LOS SENSORES
function listar_sensores_estufaeincubadora(a){
		
	$.ajax({
		type:'POST',
		data: {a},
		url:'templates/estufaeincubadora/listar_sensores.php',
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
								<button class="btn btn-success" id="agregar_sensor_estufaeincubadora">+</button>
								<button class="btn btn-danger" id="quitar_sensor_estufaeincubadora">X</button>
						</td>				
					</tr>
					`;

					
					
				});
			$("#sensores_resultado_estufaeincubadora").html(template);
			
		}
	});
}

/////////////////////// LISTAR SENSORES QUE SE ASIGNAN
function listar_estufaeincubadora_sensores(id_bandeja, id_mapeo){

		const datos = {
			id_bandeja,
			id_mapeo,
			id_asignado_estufaeincubadora
			
		}
    
    $("#id_asignado_estufaeincubadora").val(id_asignado_estufaeincubadora);
		
		$.post('templates/estufaeincubadora/listar_final_mapeo.php', datos , function(e){
				
      
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
            <td><select class="form-control" id="change_posicion_estufaeincubadora" data-id="${result.id_estufaeincubadora_sensor}" data-bandeja="${result.id_bandeja}" data-mapeo ="${id_mapeo}">
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
        
                 
       <td><input type="hidden" value="${id_valida_estufaeincubadora}" id="id_valida" name="id_valida"><input type="hidden" value="${result.id_estufaeincubadora_sensor}" id="id_sensor_estufaeincubadora_dc${a}" name="id_sensor_estufaeincubadora_dc${a}">${result.nombre_sensor}</td>
                
</tr>

   `;
				a = a+1;
			});
      
    
			
			$("#mapeos_listos_estufaeincubadora").html(template);
      $("#dc_estufaeincubadora_seleccionador").html(template_2);
			
		});
  botton_datos_crudos(id_bandeja);
}

//////////////// FUNCIÓN PARA MOSTRAR LOS DATOS CRUDOS 
function mostrar_datos_crudos_estufaeincubadora(parametro_a, parametro_b, parametro_c, parametro_d){
  

    const datos = {
      parametro_a,
      parametro_b,
      parametro_c,
      parametro_d
    }
  
  
    let img = "<img src='templates/ultrafreezer/recursos/loading.gif' width='90px'>";
  
    $("#resultados_dc_estufaeincubadora").html(img);
  
  
  $.ajax({
    type:'POST',
    url: 'templates/estufaeincubadora/cargar_datos_crudos_db_ultrafreezer.php',
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
         template_11+=
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


//////////////////////////////////////////////////////////////AGREGAR SENSOR 
(function(){
	
	$(document).on("click","#agregar_sensor_estufaeincubadora", function(){
				
				let elemento = $(this)[0].parentElement.parentElement;
				let id_sensor = $(elemento).attr('data-id');
		    
			
					const datos = {
						id_mapeo_estufaeincubadora,
						id_asignado_estufaeincubadora,
						id_bandeja_estufaeincubadora,
						id_sensor,
						id_valida_estufaeincubadora
					}
							$.post('templates/estufaeincubadora/agregar_sensor_mapeo.php', datos, function(e){
									
								if(e=="Asignado"){
									Swal.fire({
										position:'center',
										icon:'success',
										title:'Sensor asignado correctamente',
										timer:1500
									});
									listar_estufaeincubadora_sensores(id_bandeja_estufaeincubadora, id_mapeo_estufaeincubadora);
							
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


/////////////////////////////////////////////////////////////FUNCION PARA QUITAR EL SENSOR 
(function(){
	
	$(document).on('click','#quitar_sensor_estufaeincubadora',function(){
		
			let elemento = $(this)[0].parentElement.parentElement;
				let id_sensor = $(elemento).attr('data-id');
				
			
					const datos = {
						id_mapeo_estufaeincubadora,
						id_asignado_estufaeincubadora,
						id_bandeja_estufaeincubadora,
						id_sensor,
						id_valida_estufaeincubadora
					}
				
		
		$.post('templates/estufaeincubadora/validar_existencia_sensor.php',datos,function(e){
			    
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
				$.post('templates/estufaeincubadora/des-asignar_sensor.php', datos, function(e){
			        
					if(e=="Des-asignado"){
								Swal.fire({
									 position:'center',
									 icon:'success',
									 title:'El sensor ha sido des - asignado',
									 timer: 1500
								 });
						listar_estufaeincubadora_sensores(id_bandeja_estufaeincubadora, id_mapeo_estufaeincubadora);
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



//////////////////////////////// FUNCIÓN PARA BUSCAR SENSORES
$(".mostrar_sensores_contenedor_buscados").hide();
$(".mostrar_sensores_contenedor").show();

(function(){
    
 $("#buscar_sensores_estufaeincubadora").keydown(function(){
   
   let tecleado = $("#buscar_sensores_estufaeincubadora").val();
   
   if(tecleado.length > 1){
     $(".mostrar_sensores_contenedor_buscados").show();
     $(".mostrar_sensores_contenedor").hide();
     
     $.ajax({
       type:'POST',
       url:'templates/estufaeincubadora/buscador_sensores_acme.php',
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
								<button class="btn btn-success" id="agregar_sensor_estufaeincubadora">+</button>
								<button class="btn btn-danger" id="quitar_sensor_estufaeincubadora">X</button>
						</td>				
					</tr>
					`;

					
					
				});
			$("#sensores_encontrados_estufaeincubadora").html(template);
         
       }
       
     });
   }else{
     $(".mostrar_sensores_contenedor_buscados").hide();
     $(".mostrar_sensores_contenedor").show();
   }
 })
}());




/////////////////////////////////////POSICION SENSOR
$(document).on('change','#change_posicion_estufaeincubadora',function(){
    
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
      url:'templates/estufaeincubadora/gestion_posicion_sensor.php',
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

/////////////// CARGAR DATOS CRUDOS
/////////////////////////////////////////FUNCIÓN SUBIR DATOS CRUDOS AL SISTEMA/////

 
    $("#form_estufaeincubadora").on('submit', function(e){
		e.preventDefault();
	  var formData = new FormData(document.getElementById("form_estufaeincubadora"));
    

	$.ajax({
		url: 'templates/estufaeincubadora/carga_datos_crudos.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success:function(response) {
      
        console.log(response);
        if(response == 0){
         	Swal.fire({
					position:'center',
					icon:'success',
					title:'Se ha cargado el archivo de los datos crudos',
					timer:1500
				});
           mostrar_datos_crudos_estufaeincubadora(id_asignado_estufaeincubadora, id_bandeja_estufaeincubadora, id_mapeo_estufaeincubadora, id_valida_estufaeincubadora);
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


////////////////////////////////////////APROBAR DATOS CRUDOS

$("#aprobar_dc_estufaeincubadora").click(function(){
  
   const datos = {
     id_asignado_estufaeincubadora, 
     id_bandeja_estufaeincubadora, 
     id_mapeo_estufaeincubadora
   }
   
   $.post('templates/estufaeincubadora/aprobar_dc.php',datos,function(response){
      
      if(response > 0){
        	Swal.fire({
					position:'center',
					icon:'success',
					title:'Se ha aprobado la carga de datos crudos',
					timer:1500
				});
        mostrar_datos_crudos_estufaeincubadora(id_asignado_estufaeincubadora, id_bandeja_estufaeincubadora, id_mapeo_estufaeincubadora, id_valida_estufaeincubadora);
      }
     
   });
  
});

////////////////////////////////////////////ELIMINAR DATOS CRUDOS////////////
$("#eliminar_dc_estufaeincubadora").click(function(){
  
   const datos = {
     id_asignado_estufaeincubadora, 
     id_bandeja_estufaeincubadora, 
     id_mapeo_estufaeincubadora, 
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
           $.post('templates/estufaeincubadora/eliminar_dc.php',datos,function(response){

              if(response > 0){
                  Swal.fire({
                  position:'center',
                  icon:'success',
                  title:'Se ha eliminado los datos crudos correctamente',
                  timer:1500
                });
                mostrar_datos_crudos_estufaeincubadora(id_asignado_estufaeincubadora, id_bandeja_estufaeincubadora, id_mapeo_estufaeincubadora, id_valida_estufaeincubadora);
              }
           });
        }
   });

});

///////////////// QUIEN FIRMA EL INFORME
/////////////////////////////////////////////////////////////CONTROLA LA FIRMA DE LOS DOCUMENTOS//////////////////////////////////////////////
function firma_usuario_estufaeincubadora(){  
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
        $("#quien_firma_estufaeincubadora").html(template_2+template);
      }
    });
}


(function(){
  
  $("#quien_firma_estufaeincubadora").change(function(){
    
    let id_usuario = $(this).val();
    let id_asignado = id_asignado_estufaeincubadora;

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
                listar_firmador_estufaeincubadora();
              }
              
            }
          });
      }
      
    });
  });
  
}());

function listar_firmador_estufaeincubadora(){
  
  let id_asignado = id_asignado_estufaeincubadora;
  
  $.ajax({
    type:'POST',
    data:{id_asignado},
    url:'listar_firma.php',
    success:function(response){
     
        let traer = JSON.parse(response);
        
        traer.forEach((x)=>{
          $("#persona_firma_estufaeincubadora").text(x.nombres +' '+ x.apellidos);
        });
    }
  });
}



///////////////////// EVENTO QUE SE ENCARGA DE LOS GRAFICOS GENERADOS POR CERNET

$(document).on("click","#grafico_1_automovil",function(){  
   let id = $(this).attr('data-id'); 
  window.open('https://cercal.net/Pruebas_Desarrollo/API_GRAFICOS_TODOS.php?id_mapeo='+id);
  setTimeout(listar_informes_automovil,10000);
});

$(document).on("click","#grafico_2_automovil", function(){
  let id = $(this).attr('data-id'); 
  window.open('https://cercal.net/Pruebas_Desarrollo/API_GRAFICOS_PROMEDIOS.php?id_mapeo='+id);
  setTimeout(listar_informes_automovil,10000);
});
