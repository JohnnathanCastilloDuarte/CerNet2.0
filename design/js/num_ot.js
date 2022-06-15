
window.addEventListener("keypress", function(event){
        if (event.keyCode == 13){
            event.preventDefault();
        }
}, false);

$( document ).ready(function() {
	//$("#alert_ot_s").hide();
	//$("#alert_ot_n").hide();
	$("#num_ot").val('');
	$("#encuentra_ot").hide();
	$("#sin_ot").hide();
	$("#btn_gestionar_ot_2").hide();
	$("#cuando_si_selecciona_ot").hide();
	validar();
	


});

var id_gestionar = "";

//listar resultados de OT
(function(){
	
	$("#btn_buscar_num_ot").click(function(){
			var ot = $("#num_ot").val();
      
				if(ot){
					$.ajax({
						type:'POST',
						data: { ot },
						url: 'templates/OT/buscar_ot.php',
						success:function(r){
							
							if(r.length != 0){

								Swal.fire({
									position:'center',
									icon:'success',
									toast: true,
									title:'La OT se encuentra disponible',
									timer:2000
								});

                				$("#sin_ot").show();
								$("#btn_nueva_ot").show();
								$("#btn_gestionar_ot_2").hide();
								$("#btn_gestionar_ot_1").hide();
								$("#btn_editar_ot").hide();
								$("#buscador_empresa").val('');
								$("#buscador_usuarios").val('');
								
									
								}else{
									$("#btn_gestionar_ot_1").show();
									$("#btn_editar_ot").show();
									$("#btn_nueva_ot").hide();
									$("#sin_ot").show();
									let traer = JSON.parse(r);
									$("#buscador_empresa").val(traer.empresa);
									$("#id_empresa").val(traer.id_empresa);
									$("#buscador_usuarios").val(traer.nombre +' '+traer.apellido);
									$("#id_usuario").val(traer.id_usuario);
									$("#cantidad_informes_ot").text(traer.cantidad_informes);
									$("#fecha_creacion_ot").text(traer.fecha_creacion);
									$("#fecha_asignacion_ot").text(traer.fecha_asignacion);
									$("#id_ot_oculto").val(traer.id_numot);
									
									Swal.fire({
										position:'center',
										icon:'error',
										toast: true,
										title:'La OT ya se encuentra en uso',
										timer:2000
									});
								
								}
            }
						
					});
					
				}	
	});
	
}());

//editar_ot
(function(){
	$("#btn_editar_ot").click(function(){
		
		const recojo = {
			id_numot : $("#id_ot_oculto").val(),
			ot: $("#num_ot").val(),
			empresa : $("#id_empresa").val(),
			u_asignado : $("#id_usuario").val(),
			id_valida : $("#id_valida").val()
		}
		
		$.post('templates/OT/editar_ot.php',recojo, function(e){
			if(e == "modificado"){
				Swal.fire({
					position :'center',
					title: 'Registro editado correctamente',
					icon: 'success',
					timer: 1500,
				});

			}
			else{
				Swal.fire({
					position :'center',
					title: 'La OT no se encuentra disponible',
					icon: 'error',
					timer: 1500,
				});
			}
			
		});
		

	});
	
}());


//crear ot
	
	$("#btn_nueva_ot").click(function(){
	
	  let num_ot =$("#num_ot").val().toUpperCase();
      let id_empresa = $("#id_empresa").val(); 
	  let  u_asignado = $("#id_usuario").val();
	    
      if(id_empresa.length == 0 || u_asignado.length == 0){
        Swal.fire({
          title:'Mensaje',
          text:'No puedes Generar una ot sin una Empresa o sin un usuario responsable',
          icon:'warning',
          timer:1800
        })  
      }else{
        const recojo = {
          num_ot : $("#num_ot").val(),
          empresa : $("#empresa_ot_n").val(),
          c_informes : $("#cantidad_informes_ot_n").val(),
		  u_asignado,
          f_creacion : $("#fecha_creacion_ot_n").val(),
          f_asignacion : $("#fecha_asignacion_ot_n").val(),
          u_creador : $("#id_valida").val(),
          id_valida : $("#id_valida").val(),
          id_empresa
        }

		
		  $.post('templates/OT/nuevo_ot.php',recojo, function(e){
      
			let ultimo_id = JSON.parse(e);
			let  final = ultimo_id.id_ultimo;	
			$("#id_ot_oculto").val(final);
				
			  if(ultimo_id.id_ultimo != ""){
          Swal.fire({
            position :'center',
            title: 'Registro creado correctamente',
            icon: 'success',
            timer: 1500,
          });

          $("#btn_gestionar_ot_1").show();
          $("#btn_nueva_ot").hide();
			   }	
			
		    });
	    }

  });


function validar(){
	if( $("#id_ot_oculto").val() == ""){
		$("form").onSubmit();
		
	}
	
	
}


(function(){
	
	$("#btn_gestionar_ot_1").click(function(){
		let id_gestionar = $("#id_ot_oculto").val();
		validar()
		let URLactual = document.location.origin
		if(URLactual == "https://localhost" || URLactual =="http://localhost"){

			window.open('https://localhost/CerNet2.0/index.php?module=6&page=3&id_ot_oculto='+id_gestionar);
		}else{
			window.open('https://cercal.net/CerNet2.0/index.php?module=6&page=3&id_ot_oculto='+id_gestionar);
		}
				
		

				
	});	
	
	$("#btn_gestionar_ot_2").click(function(){
		id_gestionar = $("#id_ot_oculto").val();
	
	});

}());


//FUNCION COSAS PARA DETERMINAR LA OT A VER 
(function(){
	
		$("#select_ot").click(function(){

		let ot = $(this).attr('data-nombre');
		let id_ot = $(this).val();
		
		if($(this).is(':checked')){
       
			$("#message_sin_ot").hide();
			$("#cuando_si_selecciona_ot").show();
			$("#ot_traer").text(ot);
				
			$.ajax({
				type:'POST',
				data:{id_ot},
				url:'templates/OT/informacion_ot.php',
				success:function(response){
					let traer = JSON.parse(response);
					let template = "";	
					
					
						$("#empresa_ot").text(traer.empresa)
						$("#fecha_ot").text(traer.fecha_ot)
						$("#usuario_ot").text(traer.nombre_usuario + " " + traer.apellido_usuario)
					
				}
			});
			
				$.ajax({
					type:'POST',
					data:{id_ot},
					url:'templates/OT/informacion_ot_2.php',
					success:function(response){
						let traer = JSON.parse(response);
						let template = "";
						let marca = "";
						let ir = "";
						
						traer.forEach((result)=>{
							ir = `https://cercal.net/Pruebas_Desarrollo/index.php?module=10&page=2&asignado=${result.id_asignado}&type=${result.type}`;
							
							if(result.asignado == 0){
								marca = "<span class='text-warning'>No asignado</span>";
							}else{
								marca = "<span class='text-success'>Asignado</span>";
							}
						template +=	`
								<tr>
									<td>${result.servicio}</td>
									<td>${result.fecha_servicio}</td>
									<td>${marca}</td>
									<td><a href="${ir}">Ir</a></td>
								</tr>
		
							`;
							
						});
						
						$("#listando_servicios_para_ot").html(template);
						
						}
				});
			
				$.ajax({
					type:'POST',
					data:{id_ot},
					url:'templates/OT/informacion_ot_3.php',
					success:function(response){
						let traer = JSON.parse(response);
						let template = "";
						let estado = "";
						
						traer.forEach((result)=>{
							if(result.estado == 0){
								estado = "<span class='text-danger'>No terminado</span>";
							}else if(result.estado == 1){
								estado = "<span class='text-warning'>Terminado</span>";
							}else{
								estado = "<span class='text-success'>Entregado a cliente</span>";
							}
							
							template += 
								`
									<tr>
										<td>${result.nombre_informe}</td>
										<td>${result.nombre_mapeo}</td>
										<td>${estado}</td>
										<td>Ver informe</td>
									</tr>
								
								`;
						});
						$("#informes_ot").html(template);
					}
				});
			
			
    }else{
			$("#ot_traer").text("");
			}
		
	});
	
}());



$("#buscador_empresa").keydown(function(){
	
	let buscar = $(this).val();

	
	$.ajax({
		type:'POST',
		data:{buscar},
		url:'templates/controlador_buscador_empresa.php',
		success:function(response){
			let trear = JSON.parse(response);
			let template = "";
			$("#aqui_resultados_empresa").show();

			trear.forEach((valor)=>{
				template +=
				`	
					<tr>
						<td><button class="btn btn-muted" id="seleccionar_empresa" data-id="${valor.id_empresa}" data-name="${valor.nombre}">${valor.nombre}</button></td>
					</tr>
					
				`;
			});

			$("#aqui_resultados_empresa").html(template);

		}
	})
});



$(document).on('click','#seleccionar_empresa',function(){

	let id_empresa = $(this).attr('data-id');
	let nombre_empresa = $(this).attr('data-name');
	$("#buscador_empresa").val(nombre_empresa);
    $("#id_empresa").val(id_empresa);

	$("#aqui_resultados_empresa").hide();

});


$("#aqui_resultados_usuario").hide();
$("#buscador_usuarios").keydown(function(){
	
	let buscar = $(this).val();

	
	$.ajax({
		type:'POST',
		data:{buscar},
		url:'templates/controlador_buscador_usuario.php',
		success:function(response){
			let trear = JSON.parse(response);
			let template = "";
			$("#aqui_resultados_usuario").show();

			trear.forEach((valor)=>{
				template +=
				`	
					<tr>
						<td><button class="btn btn-muted" id="seleccionar_usuario" data-id="${valor.id_usuario}" data-name="${valor.nombre}" data-apell="${valor.apellido}"> ${valor.nombre} ${valor.apellido}</button></td>
					</tr>
					
				`;
			});

			$("#aqui_resultados_usuario").html(template);

		}
	})
});


$(document).on('click','#seleccionar_usuario',function(){

	let id_usuario = $(this).attr('data-id');
	let nombre = $(this).attr('data-name');
	let apellido = $(this).attr('data-apell');
	$("#buscador_usuarios").val(nombre+' '+apellido);
    $("#id_usuario").val(id_usuario);

	$("#aqui_resultados_usuario").hide();

});


