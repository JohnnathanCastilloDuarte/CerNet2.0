var id_asignado = $("#id_asignado_aire").val();

//Validar responsable
$("#alerta_1").hide();
$("#responsable").blur(function(){
 let usuario = $("#responsable").val();
 $.ajax({
    type:'POST',
    data:{usuario},
    url:'templates/usuario/validar_usuario.php',
    success:function(e){
      //console.log(e)
      if(e == 'disponible'){
         $("#responsable").css("border-color", "red");
         $("#alerta_1").show();
       }else{
         $("#alerta_1").hide();
         $("#responsable").css("border-color", "#03cb1b");
       }
     }
   });   
});

//traerItems();
validacion_aire_comprimido(100);
validacion_aire_comprimido(200);
validacion_aire_comprimido(300);
validacion_aire_comprimido(400);
/*//TRAER ITEMS ASIGNADOS
function traerItems(){
	
	$.ajax({
		type:'POST',
		data: {id_asignado},
		url:'templates/aire_comprimido/buscar_informacion.php',
		success:function(r){
			console.log(r);
			let = trear = JSON.parse(r);
			template = '';

				  template +=
		        ` 
		           <tr>
		                  <th>Punto de uso de Aire Comprimido</th>
		                  <th>Conteo de Partículas</th>
		                  <th>Nombre sala</th>
		                  <th>Punto de Rocío (°C)</th>
		                  <th>Temperatura (°C)</th>
		                  <th>Humedad Relativa (%HR)</th>
		                  <th>Presencia de Aceite</th>
		                  <th>Presencia de Agua</th>
		                  <th>Cumple Clase ISO 8573-1</th>
		            </tr>
		        `;
			trear.forEach((valor)=>{

				  template +=
		        ` 
		            <tr>
		                  <td>${valor.area}</td>
		                  <td><input type="text" class="form-control" style="width:70px;" name="conteo_particulas[]"></td>
		                  <td><input type="text" class="form-control" style="width:70px;" name="nombre_sala[]"></td>
		                  <td><input type="text" class="form-control" style="width:70px;" name="punto_rocio[]"></td>
		                  <td><input type="text" class="form-control" style="width:70px;" name="temperatura[]"></td>
		                  <td><input type="text" class="form-control" style="width:70px;" name="humedad_relativa[]"></td>
		                  <td><input type="text" class="form-control" style="width:70px;" name="presencia_aceite[]"></td>
		                  <td><input type="text" class="form-control" style="width:70px;" name="presencia_agua[]"></td>
		                  <td><input type="text" class="form-control" style="width:70px;" name="clase_iso[]"></td>
		            </tr>
		        `;
			});

		}

	});
}*/

function listar_resultados_prueba(orden){

	if (orden == 1){	


		$.ajax ({
			type:'POST',
			data:{id_asignado, orden},
			url:'templates/aire_comprimido/controlador_aire_comprimido.php',
			success:function(response){
				//console.log(response);
				let trear = JSON.parse(response);
               	let template = "";

               	trear.forEach((valor)=>{

               		$("#nombre_informe").val(valor.nombre_informe);
					$("#solicitante").val(valor.solicitante);
					$("#atencion").val(valor.atencion_a);
					$("#n_acta_inspecion").val(valor.n_actas);
					$("#conclusion").val(valor.conclusion);
					$("#responsable").val(valor.usuario_responsable);

               	});

			}
		})
	}
	 else if (orden == 2){
		$.ajax({
			type:'POST',
			data:{id_asignado, orden},
			url:'templates/aire_comprimido/controlador_aire_comprimido.php',
			success:function(response){
				//console.log(response);
				let trear = JSON.parse(response);
               	let template = "";
               	  template +=
		        ` 
		           <tr>
		                  <th>Punto de uso de Aire Comprimido</th>
		                  <th>Conteo de Partículas</th>
		                  <th>Punto de Rocío (°C)</th>
		                  <th>Temperatura (°C)</th>
		                  <th>Humedad Relativa (%HR)</th>
		                  <th>Presencia de Aceite</th>
		                  <th>Presencia de Agua</th>
		                  <th>Cumple Clase ISO 8573-1</th>
		            </tr>
		        `;

               	trear.forEach((valor)=>{

               		  template +=
		        ` 
		            <tr>
		            	  <td><input type="text" value="${valor.id}" name="id_item_aire_1[]"></td>
		                  <td style="width:180px;" >${valor.nombre_sala}</td>
		                  <td><input type="text" class="form-control" style="width:70px;" name="conteo_particulas_1[]" value="${valor.conteo_particulas}"></td>
		                  <td><input type="text" class="form-control" style="width:70px;" name="punto_rocio_1[]" value="${valor.punto_rocio}"></td>
		                  <td><input type="text" class="form-control" style="width:70px;" name="temperatura_1[]" value="${valor.temperatura}"></td>
		                  <td><input type="text" class="form-control" style="width:70px;" name="humedad_relativa_1[]" value="${valor.humedad_relativa}"></td>
		                  <td><input type="text" class="form-control" style="width:70px;" name="presencia_aceite_1[]" value="${valor.presencia_aceite}"></td>
		                  <td><input type="text" class="form-control" style="width:70px;" name="presencia_agua_1[]" value="${valor.presencia_agua}"></td>
		                  <td><input type="text" class="form-control" style="width:70px;" name="clase_iso_1[]" value="${valor.cumple_clases}"></td>
		            </tr>
		        `;

               	});
               $("#tabla_items").html(template);	
			}
		});
	}
	 else if (orden == 3){
	 	$.ajax({
	 		type:'POST',
			data:{id_asignado, orden},
			url:'templates/aire_comprimido/controlador_aire_comprimido.php',
			success:function(response){
				//console.log(response);
				let trear = JSON.parse(response);

				trear.forEach((valor)=>{
					$("#id_inspeccion_visual").val(valor.id_inspeccion_visual);
					$("#insp1").val(valor.insp_1);
					$("#insp2").val(valor.insp_2);
					$("#insp3").val(valor.insp_3);
					$("#insp4").val(valor.insp_4);
					$("#insp5").val(valor.insp_5);
				});

			}
	 	})
	 }
	 else if (orden == 4){
	 	$.ajax({
			type:'POST',
			data:{id_asignado, orden},
			url:'templates/aire_comprimido/controlador_aire_comprimido.php',
			success:function(response){
				//console.log(response);
				let trear = JSON.parse(response);
               	let template1 = "";
               	let template2 = "";
                let template3 = "";
               	  template1 +=
		        ` 
			           <tr>
			                  <th style="width:20%; text-align: center;">Punto de uso de Aire Comprimido</th>
			                  <th style="width:10%; text-align: center;">Volumen de muestreo (L/min) </th>
			                  <th style="width:10%; text-align: center;">Clase ISO 8573-1</th>
			                  <th style="width:13%; text-align: center;">0.1 < d=0.50µm</th>
			                  <th style="width:13%; text-align: center;">0.50 < d=1.0µm</th>
			                  <th style="width:13%; text-align: center;">1.0 < d=5.0µm</th>
			                  <th style="width:10%; text-align: center;">Cumple (Si/No)</th>

			            </tr> 
		        `;

		          template2 +=
		        ` 
			           <tr>
			                  <th style="width:20%">Punto de uso de Aire Comprimido</th>
			                  <th style="width:10%">Volumen de muestreo (L/min) </th>
			                  <th style="width:10%">Clase ISO 8573-1</th>
			                  <th style="width:13%">0.1 < d=0.50µm</th>
			                  <th style="width:13%">0.50 < d=1.0µm</th>
			                  <th style="width:13%">1.0 < d=5.0µm</th>
			                  <th style="width:10%">Cumple (Si/No)</th>

			            </tr> 
		        `;

		          template3 +=
		        ` 
			           <tr>
			                  <th style="width:20%">Punto de uso de Aire Comprimido</th>
			                  <th style="width:10%">Volumen de muestreo (L/min) </th>
			                  <th style="width:10%">Clase ISO 8573-1</th>
			                  <th style="width:13%">0.1 < d=0.50µm</th>
			                  <th style="width:13%">0.50 < d=1.0µm</th>
			                  <th style="width:13%">1.0 < d=5.0µm</th>
			                  <th style="width:10%">Cumple (Si/No)</th>

			            </tr> 
		        `;

               	trear.forEach((valor)=>{

               		if (valor.n_medicion == 1) {

		               		  template1 +=
				        ` 
					            	  <input type="hidden" value="${valor.id_medicion}" name="id_item_aire[]">
				            <tr>
					                  <td class"width="10%">${valor.nombre_sala}</td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="conteo_particulas[]" value="${valor.volumen_muestreo}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="punto_rocio[]" value="${valor.clase_iso}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="temperatura[]" value="${valor.medicion_1}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="humedad_relativa[]" value="${valor.medicion_2}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="presencia_aceite[]" value="${valor.medicion_3}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="presencia_agua[]" value="${valor.cumple}"></td>
				                 
				            </tr>
				        `;

               		}else if (valor.n_medicion == 2) {


		               		  template2 +=
				        ` 
					            	  <input type="hidden" value="${valor.id_medicion}" name="id_item_aire[]">
				            <tr>
					                  <td class"width="10%">${valor.nombre_sala}</td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="conteo_particulas[]" value="${valor.volumen_muestreo}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="punto_rocio[]" value="${valor.clase_iso}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="temperatura[]" value="${valor.medicion_1}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="humedad_relativa[]" value="${valor.medicion_2}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="presencia_aceite[]" value="${valor.medicion_3}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="presencia_agua[]" value="${valor.cumple}"></td>
				                 
				            </tr>
				        `;

               		}else if (valor.n_medicion == 3) {


		               		  template3 +=
				        ` 
					            	  <input type="hidden" value="${valor.id_medicion}" name="id_item_aire[]">
				            <tr>
					                  <td class"width="10%">${valor.nombre_sala}</td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="conteo_particulas[]" value="${valor.volumen_muestreo}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="punto_rocio[]" value="${valor.clase_iso}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="temperatura[]" value="${valor.medicion_1}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="humedad_relativa[]" value="${valor.medicion_2}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="presencia_aceite[]" value="${valor.medicion_3}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="presencia_agua[]" value="${valor.cumple}"></td>
				                 
				            </tr>
				        `;
               		}


               	});
               $("#tabla_mediciones1").html(template1);	
               $("#tabla_mediciones2").html(template2);	
               $("#tabla_mediciones3").html(template3);	
			}
		});
	 }
	 else if (orden == 5){
	 	$.ajax({
			type:'POST',
			data:{id_asignado, orden},
			url:'templates/aire_comprimido/controlador_aire_comprimido.php',
			success:function(response){
				//console.log(response);
				let trear = JSON.parse(response);
               	let template = "";
               	  template +=
		        ` 
			           <tr>
			                  <th style="width:20%; text-align: center;">Punto de uso de Aire Comprimido</th>
			                  <th style="width:10%; text-align: center;">Tiempo de muestreo </th>
			                  <th style="width:10%; text-align: center;">Clase ISO 8573-1</th>
			                  <th style="width:13%; text-align: center;">Punto de Rocío Obtenida (C°)</th>
			                  <th style="width:13%; text-align: center;">Temperatura Obtenida(C°)</th>
			                  <th style="width:13%; text-align: center;">Humedad Relativa</th>
			                  <th style="width:10%; text-align: center;">Cumple (Si/No)</th>

			            </tr> 
		        `;

               	trear.forEach((valor)=>{

            

		               		  template +=
				        ` 
					            	  <input type="hidden" value="${valor.punto_uso_aire_comprimido}" name="id_prueba4[]">
				            <tr>
					                  <td class"width="10%">${valor.punto_uso_aire_comprimido}</td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="tiempo_muestreo[]" value="${valor.tiempo_muestreo}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="clase_iso4[]" value="${valor.clase_iso}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="medicion1_4[]" value="${valor.medicion_1}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="medicion2_4[]" value="${valor.medicion_2}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="medicion3_4[]" value="${valor.medicion_3}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="medicion4_4[]" value="${valor.cumple}"></td>
				                 
				            </tr>
				        `;

               	});
               $("#tabla_mediciones4").html(template);	

			}
		});
	 }
	 else if (orden == 6){
	 	$.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/aire_comprimido/controlador_aire_comprimido.php',
            success:function(response){
                //console.log(response);
				let trear = JSON.parse(response);
               	let template1 = "";
               	let template2 = "";

               	template1 += 

				     ` 
				           <tr>
					                  <th  width="10%"> Clase </th>
					                  <th  width="10%"> 0,1 < d < 0,5 μm</th>
					                  <th  width="10%"> 0,5 < d < 1,0 μm</th>
					                  <th  width="10%"> 1,0 < d < 5,0 μm</th>
				                 
				           </tr>
				     `;

				template2 += 

				     ` 
					    <input type="hidden" value="" name="">
				           <tr>
					                  <th class"width="10%">Clase ISO 8573-1</th>
					                  <th class"width="10%">Punto de Rocío Obtenida (°C)</th>
					                  <th class"width="10%">Temperatura Obtenida (°C) </th>
					                  <th class"width="10%">Humedad Relativa (%)< 5,0 μm</th>
				                 
				           </tr>
				     `;

				trear.forEach((valor)=>{

						if (valor.tipo == 1){

		               		  template1 +=
				        ` 
					            
				            <tr>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="clase[]" value="${valor.clase}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="requisito_1[]" value="${valor.informacion_1}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="requisito_2[]" value="${valor.informacion_2}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="requisito_3[]" value="${valor.informacion_3}"></td>
				                 
				            </tr>
				        `;
						}else if (valor.tipo == 2){
								  template2 +=
				        ` 
					            	  <input type="hidden" value="${valor.id}" name="id_prueba4[]">
				            <tr>
					              
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="medicion2_4[]" value="${valor.clase}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="requisito_1[]" value="${valor.informacion_1}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="requisito_2[]" value="${valor.informacion_2}"></td>
					                  <td class"width="10%"><input type="text" class="form-control" style="width:100px;" name="requisito_3[]" value="${valor.informacion_3}"></td>
				                 
				            </tr>
				        `;

						}

               	});     

			  $("#tabla_mediciones5").html(template1);		
			  $("#tabla_mediciones6").html(template2);	     
                
            }

        });

	 } 

}


function validacion_aire_comprimido(orden){

    if(orden == 100){
        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/aire_comprimido/controlador_aire_comprimido.php',
            success:function(response){
                listar_resultados_prueba(1);
                
            }

        })
    }
    else if(orden == 200){
        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/aire_comprimido/controlador_aire_comprimido.php',
            success:function(response){
                listar_resultados_prueba(2);
                //console.log(response);
            }

        })
    }
     else if(orden == 300){
        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/aire_comprimido/controlador_aire_comprimido.php',
            success:function(response){
               listar_resultados_prueba(3);
               listar_resultados_prueba(4);
               listar_resultados_prueba(5);
                //alert("lusto3"+response);
            }

        })
    }
    else if(orden == 400){
    	$.ajax({
    		type:'POST',
    		data:{id_asignado, orden},
    		url:'templates/aire_comprimido/controlador_aire_comprimido.php',
    		success:function(response){
    			listar_resultados_prueba(6);
    			//console.log(response);
    		}
    	});
    }
     /*else if (orden == 400){
     	$.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/aire_comprimido/controlador_aire_comprimido.php',
            success:function(response){
                //listar_resultados_prueba(1);
            }

        })
     }*/
}
//informacion1
$("#formulario").submit(function(e){
		e.preventDefault();
		var formData = new FormData(document.getElementById("formulario"));
		var accion = "fomulario_1";
		$.ajax({
	    url: 'templates/aire_comprimido/almacena_informacion.php',
	    type: 'POST',
	    dataType: 'html',
	    data: formData,
	    cache: false,
	    contentType: false,
	    processData: false,
	    success:function(response) {
	      console.log(response);
	      if(response == "Listo"){
	        Swal.fire({
	          title:'Mensaje',
	          text:'ok',
	          icon:'success',
	          timer:1700
	        });
	        
	      }
	    }
	  }); 

});

//informacion2
$("#formulario2").submit(function(e){
		e.preventDefault();
		var formData = new FormData(document.getElementById("formulario2"));

		$.ajax({
	    url: 'templates/aire_comprimido/almacena_informacion.php',
	    type: 'POST',
	    dataType: 'html',
	    data: formData,
	    cache: false,
	    contentType: false,
	    processData: false,
	    success:function(response) {
	      console.log(response);
	      if(response == "Listo"){
	        Swal.fire({
	          title:'Mensaje',
	          text:'Se ha configurado la imagen correctamente',
	          icon:'success',
	          timer:1700
	        });
	        listar_imagenes();
	      }
	    }
	  }); 

})