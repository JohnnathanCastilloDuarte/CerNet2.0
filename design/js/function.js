

(function(){

	
	$('#cambiar').hide();
	var id_protegido = $('#id_protegido').val();
$('#usuario').keyup(function(){
		var usuario = $('#usuario').val();		
				if(usuario == '')
				{
					$('#cambiar').hide();
				}
		
		$.ajax({
			type:'POST',
			data:{'usuario':usuario, 'id_protegido':id_protegido},
			url:'valida_restablece.php',
			success:function(resp){
				
			
				if(resp != '')
				{
					$('#cambiar').show();
					$('#actualizar').hide();
							
						$('#password , #password2').keyup(function(){
							
							var pas1 = $('#password').val();
							var pas2 = $('#password2').val();
							var contra = $('#contra');
							var template = '';
							
							if(pas1 === pas2){
							
							 template = '<p class="text-success" style="text-align:center;">Contraseñas coinciden</p>';
							 contra.html(template);
								
								$('#actualizar').show();
								
								$('#actualizar').click(function(){
									window.history.replaceState({},'','restablecer.php');
										$.ajax({
											type:'POST',
											data:{'password':pas1,'id':resp},
											url:'actualiza_pass.php',
											success:function(respu){
												
												if(respu == "si"){
														Swal.fire({
															position: 'center',
															icon: 'success',
															title: 'Tu contraseña ha sido actualizada',
															showConfirmButton: true,
															ConfirmButtonText:'Ok'
														}).then((result)=>{
															if(result.value){
																var URLactual = window.location;
																if(URLactual == "https://localhost/CerNet2.0/restablecer.php"){
																	location.href = "https://localhost/CerNet2.0/index.php";
																}else{
																	location.href = "https://cercal.net/CerNet2.0/index.php";
																}
															
															}
														});
												
													
												}else{
														Swal.fire({
															position: 'center',
															icon: 'error',
															title: 'Error al actualizar',
															showConfirmButton: false,
															timer: 1500
														});
													
												}
											
											}
										});
								});
								
							}	else{
							 template = '<p class="text-danger" style="text-align:center;">Contraseñas no coinciden</p>';
							contra.html(template);
								
							}
							
							
						});
					
					
					
						
						
				}
				else{
					$('#cambiar').hide();
				}
				
			}
			
		});
	
});	

	
})();


$("#rest").click(function(){
	
	var email = $("#email").val();
		if(email == ""){
			Swal.fire({
				position: 'center',
				icon: 'error',
				title: 'Debes ingresar un correo',
				showConfirmButton: false,
				timer: 1500
			});
		}//cierre del if que valida si es vacio
	else{
	$.ajax({
		type:'POST',
		data:{ email },
		url:'templates/usuario/enviar_correo.php',
		success:function(final){
		
			if(final == "no existe"){
				Swal.fire({
					title:'Mensaje',
					text:'Los datos ingresados no existen',
					icon:'warning',
					timer:1700
				});
				
			}else{
				Swal.fire({	
				icon: 'success',
				title: 'Revisa la bandeja de entrada de tu correo',
				showConfirmButton: true,
				confirmButtonText: 'Ok!'
			}).then((result)=>{
					if(result.value){
						location.reload();
					}
				})
		
			}
			
		}
	});//cierre del ajax que envia el correo
		}
	
});



//funcion para el archivo privilegio_rol.php
(function(){
		$("#btn_actualizar").hide();
		$("#nombre_privilegio").hide();
	$("#selecte").change(function(){
				
				let perfil = $(this).val();
				
				
			$.ajax({
				type:"POST",
				data:{ perfil },
				url:'templates/usuario/valida_privilegios.php',
				success:function(ev){
         
					if(ev != ""){
					if(perfil === "Seleccione..."){
					$("#btn_actualizar").hide();
					$("#nombre_privilegio").hide();	
						}else{
							$("#btn_actualizar").show();
							$("#nombre_privilegio").show();
							$("#nombre_privilegio").val(perfil);
						}	
					let recibido = JSON.parse(ev);
            
          let template = "";
					let contador = 0;
					let msj1 = "";let msj2 = "";let msj3 = "";let msj4 = "";let msj5 = "";let msj6 = "";
					let msj7 = "";let msj8 = "";let msj9 = "";let msj10 = "";let msj11 = "";let msj12 = "";
					let msj13 = "";let msj14 = "";let msj15 = "";let msj16 = "";let msj17 = "";let msj18 = "";
					
					
					recibido.forEach(desenvolver =>{
							if(desenvolver.modulo_1 == 1){ msj1 = "checked";}else{ msj2 = "checked";}
              if(desenvolver.modulo_2 == 1){ msj3 = "checked";}else{ msj4 = "checked";}
              if(desenvolver.modulo_3 == 1){ msj5 = "checked";}else{ msj6 = "checked";}
              if(desenvolver.modulo_4 == 1){ msj7 = "checked";}else{ msj8 = "checked";}
              if(desenvolver.modulo_5 == 1){ msj9 = "checked";}else{ msj10 = "checked";}
              if(desenvolver.modulo_6 == 1){ msj11 = "checked";}else{ msj12 = "checked";}
              if(desenvolver.modulo_7 == 1){ msj13 = "checked";}else{ msj14 = "checked";}
              if(desenvolver.modulo_8 == 1){ msj15 = "checked";}else{ msj16 = "checked";}
              if(desenvolver.modulo_9 == 1){ msj17 = "checked";}else{ msj18 = "checked";}
							
							
						template+= `
							<tr>
								<input type="hidden" id="id" value="${desenvolver.id}">
							<td>Modulo Modulos:</td>
							<td>
								<div class="icheck-success d-inline" id ="m1" >
									<input type="radio"  name="m1" ${msj1}  value="1">
									<label for="radioSuccess2">SI</label>    
								</div>
								<div class="icheck-danger d-inline">
									<input type="radio"  name="m1" ${msj2}  value="0">
									<label for="radioDanger2">NO</label>
								</div>
						  </td>
						</tr>
            
            <tr>
							<td>Modulo Control de cambios:</td>
							<td>
								<div class="icheck-success d-inline" id ="m1" >
									<input type="radio"  name="m2" ${msj3}  value="1">
									<label for="radioSuccess2">SI</label>    
								</div>
								<div class="icheck-danger d-inline">
									<input type="radio"  name="m2" ${msj4}  value="0">
									<label for="radioDanger2">NO</label>
								</div>
						  </td>
						</tr>


            <tr>
							<td>Modulo Usuarios:</td>
							<td>
								<div class="icheck-success d-inline" id ="m1" >
									<input type="radio"  name="m3" ${msj5}  value="1">
									<label for="radioSuccess2">SI</label>    
								</div>
								<div class="icheck-danger d-inline">
									<input type="radio"  name="m3" ${msj6}  value="0">
									<label for="radioDanger2">NO</label>
								</div>
						  </td>
						</tr>



            <tr>
							<td>Modulo Clientes:</td>
							<td>
								<div class="icheck-success d-inline" id ="m1" >
									<input type="radio"  name="m4" ${msj7}  value="1">
									<label for="radioSuccess2">SI</label>    
								</div>
								<div class="icheck-danger d-inline">
									<input type="radio"  name="m4" ${msj8}  value="0">
									<label for="radioDanger2">NO</label>
								</div>
						  </td>
						</tr>


            <tr>
							<td>Modulo Items:</td>
							<td>
								<div class="icheck-success d-inline" id ="m1" >
									<input type="radio"  name="m5" ${msj9}  value="1">
									<label for="radioSuccess2">SI</label>    
								</div>
								<div class="icheck-danger d-inline">
									<input type="radio"  name="m5" ${msj10}  value="0">
									<label for="radioDanger2">NO</label>
								</div>
						  </td>
						</tr>

            
             <tr>
							<td>Modulo Ordenes de trabajo:</td>
							<td>
								<div class="icheck-success d-inline" id ="m1" >
									<input type="radio"  name="m6" ${msj11}  value="1">
									<label for="radioSuccess2">SI</label>    
								</div>
								<div class="icheck-danger d-inline">
									<input type="radio"  name="m6" ${msj12}  value="0">
									<label for="radioDanger2">NO</label>
								</div>
						  </td>
						</tr>

            
            <tr>
							<td>Modulo Servicios:</td>
							<td>
								<div class="icheck-success d-inline" id ="m1" >
									<input type="radio"  name="m7" ${msj13}  value="1">
									<label for="radioSuccess2">SI</label>    
								</div>
								<div class="icheck-danger d-inline">
									<input type="radio"  name="m7" ${msj14}  value="0">
									<label for="radioDanger2">NO</label>
								</div>
						  </td>
						</tr>


            <tr>
							<td>Modulo Informes:</td>
							<td>
								<div class="icheck-success d-inline" id ="m1" >
									<input type="radio"  name="m8" ${msj15}  value="1">
									<label for="radioSuccess2">SI</label>    
								</div>
								<div class="icheck-danger d-inline">
									<input type="radio"  name="m8" ${msj16}  value="0">
									<label for="radioDanger2">NO</label>
								</div>
						  </td>
						</tr>



            <tr>
							<td>Modulo Documentación:</td>
							<td>
								<div class="icheck-success d-inline" id ="m1">
									<input type="radio"  name="m9" ${msj17}  value="1">
									<label for="radioSuccess2">SI</label>    
								</div>
								<div class="icheck-danger d-inline">
									<input type="radio"  name="m9" ${msj18}  value="0">
									<label for="radioDanger2">NO</label>
								</div>
						  </td>
						</tr>

						`;						
					});
					
					$("#container").html(template);
				}
					}//cierre que valua ev != 0
				
			});
	});
	
}());

//crear registro page privilegios_rol.php

(function(){
	$("#crear_privilegio").click(function(){
		let nuevo = $("#nuevo_privilegio").val();
		
		$.ajax({
			type:"POST",
			data:{nuevo},
			url:'templates/usuario/new_privilegio.php',
			success:function(rep){
				if(rep=="si"){
					Swal.fire({	
					position: 'center',
					icon: 'success',
					title: 'Creado privilegio '+nuevo+'',
					confirmButtonText: 'Ok!'
				}).then((result) =>{
						if(result.value){
						location.reload();	
						}
					});
				}
			}
		});
	});
			}());
		



//eliminar registro page privilegios_rol.php
	(function(){
		$("#eliminar_privilegio").click(function(ev){
			
			let id = $("#id").val();
			
			Swal.fire({	
					position: 'center',
					icon: 'error',
					title: 'Desea Eliminar el privilegio ?',
					showConfirmButton: true,
					showCancelButton:true,
					cancelButtonText: 'No!',
					confirmButtonText: 'Ok!'
				}).then((result)=>{
						if(result.value){
							
					$.ajax({
					type:"POST",
					data:{id},
					url:'templates/usuario/delete_privilegio.php',
					success:function(resp){
				if(resp == "si"){
					Swal.fire({
					toast:true,	
					position: 'center',
					icon: 'success',
					title: 'Registro eliminado',
					showConfirmButton: true,
					confirmButtonText: 'Ok!'
				}).then((result)=>{
						if(result.value){
							location.reload();
						}
					})
							
						}
					}
				});
						}
					});	
			
		});
		
	}());





//funcion para actualizar privilegios page privilegios_rol.php

(function(){
	
	$("#actualizar_privilegio").click(function(){
			const elementos ={ 
			id : $("#id").val(),
			perfil : $("#nombre_privilegio").val(),
			m1 : $("input:radio[name=m1]:checked").val(),
			m2 : $("input:radio[name=m2]:checked").val(),
			m3 : $("input:radio[name=m3]:checked").val(),		
			m4 : $("input:radio[name=m4]:checked").val(),
			m5 : $("input:radio[name=m5]:checked").val(),
			m6 : $("input:radio[name=m6]:checked").val(),
			m7 : $("input:radio[name=m7]:checked").val(),
			m8 : $("input:radio[name=m8]:checked").val(),
			m9 : $("input:radio[name=m9]:checked").val(),
			m10 : $("input:radio[name=m10]:checked").val(),
			m11 : $("input:radio[name=m11]:checked").val(),
			m12 : $("input:radio[name=m12]:checked").val(),
			m13 : $("input:radio[name=m13]:checked").val(),
			m14 : $("input:radio[name=m14]:checked").val(),
			m15 : $("input:radio[name=m15]:checked").val(),
			m16 : $("input:radio[name=m16]:checked").val(),
			m17 : $("input:radio[name=m17]:checked").val(),
			m18 : $("input:radio[name=m18]:checked").val(),
			m19 : $("input:radio[name=m19]:checked").val(),
			m20 : $("input:radio[name=m20]:checked").val(),
			m21 : $("input:radio[name=m21]:checked").val(),
			m22 : $("input:radio[name=m22]:checked").val(),
			m23 : $("input:radio[name=m23]:checked").val(),
			m24 : $("input:radio[name=m24]:checked").val(),
			m25 : $("input:radio[name=m25]:checked").val(),
			m26 : $("input:radio[name=m26]:checked").val(),
			m27 : $("input:radio[name=m27]:checked").val(),
			m28 : $("input:radio[name=m28]:checked").val(),
			m29 : $("input:radio[name=m29]:checked").val(),
			m30 : $("input:radio[name=m30]:checked").val(),
			m31 : $("input:radio[name=m31]:checked").val(),
			m32 : $("input:radio[name=m32]:checked").val(),
			m33 : $("input:radio[name=m33]:checked").val(),
			m34 : $("input:radio[name=m34]:checked").val(),
			m35 : $("input:radio[name=m35]:checked").val(),
			m36 : $("input:radio[name=m36]:checked").val(),
			m37 : $("input:radio[name=m37]:checked").val(),
			m38 : $("input:radio[name=m38]:checked").val(),
			m39 : $("input:radio[name=m39]:checked").val(),
			m40 : $("input:radio[name=m40]:checked").val(),
			m41 : $("input:radio[name=m41]:checked").val(),
			m42 : $("input:radio[name=m42]:checked").val()	
			};
		
		
			
			$.post('templates/usuario/edit_privilegios.php', elementos, function(evt){
        
          
					if(evt == "si"){
				Swal.fire({
					toast:true,	
					position: 'center',
					icon: 'success',
					title: 'Registro actualizado',
					showConfirmButton: true,
					confirmButtonText: 'Ok!'
				}).then((result)=>{
						if(result.value){
							location.reload();
						}
					})
					}else{
						Swal.fire({
					toast:true,	
					position: 'center',
					icon: 'error',
					title: 'Error al actualizar',
					timer:1500
						})					
					}
				});
					
		
					
			
		
		
	})
	
}());

////////////////funcion ocultar el ingreso del nuevo privilegio///////////

(function(){
	$("#capa_nuevo").hide();
	$("#ocultar").hide();
	
	$("#añadir").click(function(){
		$("#capa_nuevo").show();
		$("#añadir").hide();
		$("#ocultar").show();
		$("#ocultar").click(function(){
		$("#capa_nuevo").hide();
		$("#añadir").show();
		$("#ocultar").hide();
	});
	});
}());

///////////////////////////////////////////////////comienzo de funciones para rol///////////////////////////////////////////////////////////

//ocultar nuevo rol

(function(){
	$("#capa_nuevo_rol").hide();
	$("#ocultar_rol").hide();
	
	$("#añadir_rol").click(function(){
		$("#capa_nuevo_rol").show();
		$("#añadir_rol").hide();
		$("#ocultar_rol").show();
		$("#ocultar_rol").click(function(){
		$("#capa_nuevo_rol").hide();
		$("#añadir_rol").show();
		$("#ocultar_rol").hide();
	});
	});
}());

//listar roles 
(function(){
		$("#btn_actualizar_rol").hide();
		$("#nombre_rol").hide();
	$("#selecte_rol").change(function(){
				
				let perfil = $(this).val();
				
				
			$.ajax({
				type:"POST",
				data:{ perfil },
				url:'templates/usuario/valida_roles.php',
				success:function(ev){
					if(ev != ""){
					if(perfil === "Seleccione..."){
					$("#btn_actualizar_rol").hide();
					$("#nombre_rol").hide();	
						}else{
							$("#btn_actualizar_rol").show();
							$("#nombre_rol").show();
							$("#nombre_rol").val(perfil);
						}	
					let recibido = JSON.parse(ev);
					let template = "";
					let contador = 0;
					let msj1 = "";let msj2 = "";let msj3 = "";let msj4 = "";let msj5 = "";let msj6 = "";
					let msj7 = "";let msj8 = "";let msj9 = "";let msj10 = "";let msj11 = "";let msj12 = "";
					let msj13 = "";let msj14 = "";let msj15 = "";let msj16 = "";let msj17 = "";let msj18 = "";
					let msj19 = "";let msj20 = "";let msj21 = "";let msj22 = "";let msj23 = "";let msj24 = "";
					let msj25 = "";let msj26 = "";let msj27 = "";let msj28 = "";let msj29 = "";let msj30 = "";
					let msj31 = "";let msj32 = "";let msj33 = "";let msj34 = "";let msj35 = "";let msj36 = "";
					let msj37 = "";let msj38 = "";let msj39 = "";let msj40 = "";let msj411 = "";let msj42 = "";
					let msj43 = "";let msj44 = "";let msj45 = "";let msj46 = "";let msj47 = "";let msj48 = "";
					let msj49 = "";let msj50 = "";let msj51 = "";let msj52 = "";let msj53 = "";let msj54 = "";
					let msj55 = "";let msj56 = "";let msj57 = "";let msj58 = "";let msj59 = "";let msj60 = "";
					let msj61 = "";let msj62 = "";let msj63 = "";let msj64 = "";let msj65 = "";let msj66 = "";
					let msj67 = "";let msj68 = "";let msj69 = "";let msj70 = "";let msj71 = "";let msj72 = "";
					let msj73 = "";let msj74 = "";let msj75 = "";let msj76 = "";let msj77 = "";let msj78 = "";
					let msj79 = "";let msj80 = "";let msj81 = "";let msj82 = "";let msj83 = "";let msj84 = "";
					let msj85 = "";let msj86 = "";let msj87 = "";let msj88 = "";let msj89 = "";let msj90 = "";
					let msj91 = "";let msj92 = "";let msj93 = "";let msj94 = "";let msj95 = "";let msj96 = "";
					let msj97 = "";let msj98 = "";let msj99 = "";let msj100 = "";let msj101 = "";let msj102 = "";
					let msj103 = "";let msj104 = "";let msj105 = "";let msj106 = "";let msj107 = "";let msj108 = "";
					let msj109 = "";let msj110 = "";let msj111 = "";let msj112 = "";let msj113 = "";let msj114 = "";
					let msj115 = "";let msj116 = "";let msj117 = "";let msj118 = "";let msj119 = "";let msj120 = "";
					let msj121 = "";let msj122 = "";let msj123 = "";let msj124 = "";let msj125 = "";let msj126 = "";
		
					
					
					
					recibido.forEach(desenvolver =>{
							if(desenvolver.modulo_usuario == 1){ msj1 = "checked";}
							else if(desenvolver.modulo_usuario == 2){ msj1 = "checked"; msj2 = "checked";}
							else if(desenvolver.modulo_usuario == 3){ msj1 = "checked"; msj2 = "checked"; msj3 ="checked";}
				
							if(desenvolver.modulo_empresa == 1){ msj4 = "checked";}
							else if(desenvolver.modulo_empresa == 2){ msj4 = "checked"; msj5="checked";}
							else if(desenvolver.modulo_empresa == 3){ msj4 = "checked"; msj5="checked"; msj6="checked";}
						
							if(desenvolver.modulo_sensor == 1){msj7 = "checked";}
							else if(desenvolver.modulo_sensor == 2){ msj7 = "checked"; msj8="checked";}
							else if(desenvolver.modulo_sensor == 3){ msj7 = "checked"; msj8="checked"; msj9="checked";}
						
							if(desenvolver.modulo_informe == 1){ msj10 = "checked";}
							else if(desenvolver.modulo_informe == 2){ msj10 = "checked"; msj11="checked";}
							else if(desenvolver.modulo_informe == 3){ msj10 = "checked"; msj11="checked"; msj12="checked";}
							
							if(desenvolver.modulo_documento == 1){ msj13 = "checked";}
							else if(desenvolver.modulo_documento == 2){ msj13 = "checked"; msj14="checked";}
							else if(desenvolver.modulo_documento == 3){ msj13 = "checked"; msj14="checked"; msj15="checked";}
						
							if(desenvolver.modulo_persona == 1){ msj16 = "checked";}
							else if(desenvolver.modulo_persona == 2){ msj16 = "checked"; msj17="checked";}
							else if(desenvolver.modulo_persona == 3){ msj16 = "checked"; msj17="checked"; msj18="checked";}
						
							if(desenvolver.modulo_item == 1){ msj19 = "checked";}
							else if(desenvolver.modulo_item == 2){ msj19 = "checked"; msj20="checked";}
							else if(desenvolver.modulo_item == 3){ msj19 = "checked"; msj20="checked"; msj21="checked";}
						
							if(desenvolver.modulo_numot == 1){ msj22 = "checked";}
							else if(desenvolver.modulo_numot == 2){ msj22 = "checked"; msj23="checked";}
							else if(desenvolver.modulo_numot == 3){ msj22 = "checked"; msj23="checked"; msj24="checked";}
						
							if(desenvolver.modulo_spot_bodega == 1){ msj25 = "checked";}
							else if(desenvolver.modulo_spot_bodega == 2){ msj25 = "checked"; msj26="checked";}
							else if(desenvolver.modulo_spot_bodega == 3){ msj25 = "checked"; msj26="checked"; msj27="checked";}
						
							if(desenvolver.modulo_gep_bodega == 1){ msj28 = "checked";}
							else if(desenvolver.modulo_gep_bodega == 2){ msj28 = "checked"; msj29="checked";}
							else if(desenvolver.modulo_gep_bodega == 3){ msj28 = "checked"; msj29="checked"; msj30="checked";}
						
							if(desenvolver.modulo_spot_aire == 1){ msj31 = "checked";}
							else if(desenvolver.modulo_spot_aire == 2){ msj31 = "checked"; msj32="checked";}
							else if(desenvolver.modulo_spot_aire == 3){ msj31 = "checked"; msj32="checked"; msj33="checked";}
						
							if(desenvolver.modulo_gep_aire == 1){ msj34 = "checked";}
							else if(desenvolver.modulo_gep_aire == 2){ msj34 = "checked"; msj35="checked";}
							else if(desenvolver.modulo_gep_aire == 3){ msj34 = "checked"; msj35="checked"; msj36="checked";}
						
							if(desenvolver.modulo_spot_autoclave == 1){ msj37 = "checked";}
							else if(desenvolver.modulo_spot_autoclave == 2){ msj37 = "checked"; msj38="checked";}
							else if(desenvolver.modulo_spot_autoclave == 3){ msj37 = "checked"; msj38="checked"; msj39="checked";}
							
							if(desenvolver.modulo_gep_autoclave == 1){ msj40 = "checked";}
							else if(desenvolver.modulo_gep_autoclave == 2){ msj40 = "checked"; msj411="checked";}
							else if(desenvolver.modulo_gep_autoclave == 3){ msj40 = "checked"; msj411="checked"; msj42="checked";}
						
							if(desenvolver.modulo_spot_cadenafrio == 1){ msj43 = "checked";}
							else if(desenvolver.modulo_spot_cadenafrio == 2){ msj43 = "checked"; msj44="checked";}
							else if(desenvolver.modulo_spot_cadenafrio == 3){ msj43 = "checked"; msj44="checked"; msj45="checked";}
						
							if(desenvolver.modulo_gep_cadenafrio == 1){ msj46 = "checked";}
							else if(desenvolver.modulo_gep_cadenafrio == 2){ msj46 = "checked"; msj47="checked";}
							else if(desenvolver.modulo_gep_cadenafrio == 3){ msj46 = "checked"; msj47="checked"; msj48="checked";}
						
							if(desenvolver.modulo_spot_camaraestabilidad == 1){ msj49 = "checked";}
							else if(desenvolver.modulo_spot_camaraestabilidad == 2){ msj49 = "checked"; msj50="checked";}
							else if(desenvolver.modulo_spot_camaraestabilidad == 3){ msj49 = "checked"; msj50="checked"; msj51="checked";}
						
							if(desenvolver.modulo_gep_camaraestabilidad == 1){ msj52 = "checked";}
							else if(desenvolver.modulo_gep_camaraestabilidad == 2){ msj52 = "checked"; msj53="checked";}
							else if(desenvolver.modulo_gep_camaraestabilidad == 3){ msj52 = "checked"; msj53="checked"; msj54="checked";}
						
							if(desenvolver.modulo_spot_camarafria == 1){ msj55 = "checked";}
							else if(desenvolver.modulo_spot_camarafria == 2){ msj55 = "checked"; msj56="checked";}
							else if(desenvolver.modulo_spot_camarafria == 3){ msj55 = "checked"; msj56="checked"; msj57="checked";}
						
							if(desenvolver.modulo_gep_camarafria == 1){ msj58 = "checked";}
							else if(desenvolver.modulo_gep_camarafria == 2){ msj58 = "checked"; msj59="checked";}
							else if(desenvolver.modulo_gep_camarafria == 3){ msj58 = "checked"; msj59="checked"; msj60="checked";}
						
							if(desenvolver.modulo_spot_congelador == 1){ msj61 = "checked";}
							else if(desenvolver.modulo_spot_congelador == 2){ msj61 = "checked"; msj62="checked";}
							else if(desenvolver.modulo_spot_congelador == 3){ msj61 = "checked"; msj62="checked"; msj63="checked";}
						
							if(desenvolver.modulo_gep_congelador == 1){ msj64 = "checked";}
							else if(desenvolver.modulo_gep_congelador == 2){ msj64 = "checked"; msj65="checked";}
							else if(desenvolver.modulo_gep_congelador == 3){ msj64 = "checked"; msj65="checked"; msj66="checked";}
						
							if(desenvolver.modulo_spot_estufa == 1){ msj67 = "checked";}
							else if(desenvolver.modulo_spot_estufa == 2){ msj67 = "checked"; msj68="checked";}
							else if(desenvolver.modulo_spot_estufa == 3){ msj67 = "checked"; msj68="checked"; msj69="checked";}
						
							if(desenvolver.modulo_gep_estufa == 1){ msj70 = "checked";}
							else if(desenvolver.modulo_gep_estufa == 2){ msj70 = "checked"; msj71="checked";}
							else if(desenvolver.modulo_gep_estufa == 3){ msj70 = "checked"; msj71="checked"; msj72="checked";}
						
							if(desenvolver.modulo_spot_gabinete == 1){ msj73 = "checked";}
							else if(desenvolver.modulo_spot_gabinete == 2){ msj73 = "checked"; msj74="checked";}
							else if(desenvolver.modulo_spot_gabinete == 3){ msj73 = "checked"; msj74="checked"; msj75="checked";}
						
							if(desenvolver.modulo_gep_gabinete == 1){ msj76 = "checked";}
							else if(desenvolver.modulo_gep_gabinete == 2){ msj76 = "checked"; msj77="checked";}
							else if(desenvolver.modulo_gep_gabinete == 3){ msj76 = "checked"; msj77="checked"; msj78="checked";}
						
							if(desenvolver.modulo_spot_horno == 1){ msj79 = "checked";}
							else if(desenvolver.modulo_spot_horno == 2){ msj79 = "checked"; msj80="checked";}
							else if(desenvolver.modulo_spot_horno == 3){ msj79 = "checked"; msj80="checked"; msj81="checked";}
						
							if(desenvolver.modulo_gep_horno == 1){ msj82 = "checked";}
							else if(desenvolver.modulo_gep_horno == 2){ msj82 = "checked"; msj83="checked";}
							else if(desenvolver.modulo_gep_horno == 3){ msj82 = "checked"; msj83="checked"; msj84="checked";}
						
							if(desenvolver.modulo_spot_hvac == 1){ msj85 = "checked";}
							else if(desenvolver.modulo_spot_hvac == 2){ msj85 = "checked"; msj86="checked";}
							else if(desenvolver.modulo_spot_hvac == 3){ msj85 = "checked"; msj86="checked"; msj87="checked";}
						
							if(desenvolver.modulo_gep_hvac == 1){ msj88 = "checked";}
							else if(desenvolver.modulo_gep_hvac == 2){ msj88 = "checked"; msj89="checked";}
							else if(desenvolver.modulo_gep_hvac == 3){ msj88 = "checked"; msj89="checked"; msj90="checked";}
						
							if(desenvolver.modulo_spot_refrigerador == 1){ msj91 = "checked";}
							else if(desenvolver.modulo_spot_refrigerador == 2){ msj91 = "checked"; msj92="checked";}
							else if(desenvolver.modulo_spot_refrigerador == 3){ msj91 = "checked"; msj92="checked"; msj93="checked";}
						
							if(desenvolver.modulo_gep_refrigerador == 1){ msj94 = "checked";}
							else if(desenvolver.modulo_gep_refrigerador == 2){ msj94 = "checked"; msj95="checked";}
							else if(desenvolver.modulo_gep_refrigerador == 3){ msj94 = "checked"; msj95="checked"; msj96="checked";}
						
							if(desenvolver.modulo_spot_ultrafreezer == 1){ msj97 = "checked";}
							else if(desenvolver.modulo_spot_ultrafreezer == 2){ msj97 = "checked"; msj98="checked";}
							else if(desenvolver.modulo_spot_ultrafreezer == 3){ msj97 = "checked"; msj98="checked"; msj99="checked";}
						
							if(desenvolver.modulo_gep_ultrafreezer == 1){ msj100 = "checked";}
							else if(desenvolver.modulo_gep_ultrafreezer == 2){ msj100 = "checked"; msj101="checked";}
							else if(desenvolver.modulo_gep_ultrafreezer == 3){ msj100 = "checked"; msj101="checked"; msj102="checked";}
						
							if(desenvolver.modulo_gep_auditoria == 1){ msj103 = "checked";}
							else if(desenvolver.modulo_gep_auditoria == 2){ msj103 = "checked"; msj104="checked";}
							else if(desenvolver.modulo_gep_auditoria == 3){ msj103 = "checked"; msj104="checked"; msj105="checked";}
						
							if(desenvolver.modulo_csv_hojacalculo == 1){ msj106 = "checked";}
							else if(desenvolver.modulo_csv_hojacalculo == 2){ msj106 = "checked"; msj107="checked";}
							else if(desenvolver.modulo_csv_hojacalculo == 3){ msj106 = "checked"; msj107="checked"; msj108="checked";}
						
							if(desenvolver.modulo_csv_software == 1){ msj109 = "checked";}
							else if(desenvolver.modulo_csv_software == 2){ msj109 = "checked"; msj110="checked";}
							else if(desenvolver.modulo_csv_software == 3){ msj109 = "checked"; msj110="checked"; msj111="checked";}
						
							if(desenvolver.modulo_gep_kapa == 1){ msj112 = "checked";}
							else if(desenvolver.modulo_gep_kapa == 2){ msj112 = "checked"; msj113="checked";}
							else if(desenvolver.modulo_gep_kapa == 3){ msj112 = "checked"; msj113="checked"; msj114="checked";}
						
							if(desenvolver.modulo_gep_purificacion == 1){ msj115 = "checked";}
							else if(desenvolver.modulo_gep_purificacion == 2){ msj115 = "checked"; msj116="checked";}
							else if(desenvolver.modulo_gep_purificacion == 3){ msj115 = "checked"; msj116="checked"; msj117="checked";}
						
							if(desenvolver.modulo_ti_controlcambios == 1){ msj118 = "checked";}
							else if(desenvolver.modulo_ti_controlcambios == 2){ msj118 = "checked"; msj119="checked";}
							else if(desenvolver.modulo_ti_controlcambios == 3){ msj118 = "checked"; msj119="checked"; msj120="checked";}
						
							if(desenvolver.modulo_ti_usuario == 1){ msj121 = "checked";}
							else if(desenvolver.modulo_ti_usuario == 2){ msj121 = "checked"; msj122="checked";}
							else if(desenvolver.modulo_ti_usuario == 3){ msj121 = "checked"; msj122="checked"; msj123="checked";}
						
							if(desenvolver.modulo_admin_persona == 1){ msj124 = "checked";}
							else if(desenvolver.modulo_admin_persona == 2){ msj124 = "checked"; msj125="checked";}
							else if(desenvolver.modulo_admin_persona == 3){ msj124 = "checked"; msj125="checked"; msj126="checked";}
							
							
							
							
							
						template+= `
							<tr>
								<input type="hidden" id="id_rol" value="${desenvolver.id}">
							<td>Modulo Usuario:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m1_1" ${msj1}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m1_2" ${msj2}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m1_3" ${msj3}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Empresa:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m2_1" ${msj4}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m2_2" ${msj5}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m2_3" ${msj6}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Sensor:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m3_1" ${msj7}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m3_2" ${msj8}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m3_3" ${msj9}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Informe:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m4_1" ${msj10}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m4_2" ${msj11}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m4_3" ${msj12}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Documento:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m5_1" ${msj13}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m5_2" ${msj14}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m5_3" ${msj15}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Persona:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m6_1" ${msj16}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m6_2" ${msj17}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m6_3" ${msj18}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Item:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m7_1" ${msj19}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m7_2" ${msj20}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m7_3" ${msj21}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Ordenes de compra:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m8_1" ${msj22}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m8_2" ${msj23}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m8_3" ${msj24}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Spot Bodega:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m9_1" ${msj25}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m9_2" ${msj26}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m9_3" ${msj27}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Gep Bodega:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m10_1" ${msj28}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m10_2" ${msj29}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m10_3" ${msj30}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Spot Aire:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m11_1" ${msj31}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m11_2" ${msj32}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m11_3" ${msj33}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Gep Aire:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m12_1" ${msj34}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m12_2" ${msj35}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m12_3" ${msj36}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Spot Autoclave:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m13_1" ${msj37}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m13_2" ${msj38}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m13_3" ${msj39}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Gep Autoclave:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m14_1" ${msj40}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m14_2" ${msj411}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m14_3" ${msj42}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Spot CadenaFrio:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m15_1" ${msj43}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m15_2" ${msj44}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m15_3" ${msj45}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Gep CadenaFrio:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m16_1" ${msj46}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m16_2" ${msj47}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m16_3" ${msj48}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Spot Camara Estabilidad:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m17_1" ${msj49}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m17_2" ${msj50}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m17_3" ${msj51}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Gep Camara Estabilidad:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m18_1" ${msj52}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m18_2" ${msj53}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m18_3" ${msj54}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Spot Camara Fria:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m19_1" ${msj55}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m19_2" ${msj56}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m19_3" ${msj57}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Gep Camara Fria:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m20_1" ${msj58}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m20_2" ${msj59}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m20_3" ${msj60}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Spot Congelador:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m21_1" ${msj61}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m21_2" ${msj62}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m21_3" ${msj63}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Gep Congelador:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m22_1" ${msj64}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m22_2" ${msj65}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m22_3" ${msj66}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Spot Estufa:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m23_1" ${msj67}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m23_2" ${msj68}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m23_3" ${msj69}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Gep Estufa:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m24_1" ${msj70}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m24_2" ${msj71}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m24_3" ${msj72}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Spot Gabinete:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m25_1" ${msj73}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m25_2" ${msj74}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m25_3" ${msj75}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Gep Gabinete:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m26_1" ${msj76}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m26_2" ${msj77}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m26_3" ${msj78}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Spot Horno:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m27_1" ${msj79}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m27_2" ${msj80}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m27_3" ${msj81}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Gep Horno:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m28_1" ${msj82}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m28_2" ${msj83}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m28_3" ${msj84}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Spot HVAC:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m29_1" ${msj85}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m29_2" ${msj86}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m29_3" ${msj87}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Gep HVAC:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m30_1" ${msj88}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m30_2" ${msj89}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m30_3" ${msj90}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Spot Refrigerador:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m31_1" ${msj91}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m31_2" ${msj92}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m31_3" ${msj93}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Gep Refrigerador:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m32_1" ${msj94}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m32_2" ${msj95}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m32_3" ${msj96}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Spot Ultrafreezer:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m33_1" ${msj97}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m33_2" ${msj98}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m33_3" ${msj99}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Gep Ultrafreezer:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m34_1" ${msj100}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m34_2" ${msj101}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m34_3" ${msj102}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Gep Auditoria:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m35_1" ${msj103}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m35_2" ${msj104}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m35_3" ${msj105}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo CSV Hoja de calculo:</td>
							<<td>
								<div class="d-inline">
									<input type="checkbox"  name="m36_1" ${msj106}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m36_2" ${msj107}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m36_3" ${msj108}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo CSV Software:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m37_1" ${msj109}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m37_2" ${msj110}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m37_3" ${msj111}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Gep Kapa:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m38_1" ${msj112}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m38_2" ${msj113}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m38_3" ${msj114}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Gep Purificación:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m39_1" ${msj115}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m39_2" ${msj116}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m39_3" ${msj117}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>	
						</tr>
						<tr>
							<td>Modulo T.I. Control de cambios:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m40_1" ${msj118}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m40_2" ${msj119}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m40_3" ${msj120}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>		
						</tr>
						<tr>
							<td>Modulo T.I. Usuario:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m41_1" ${msj121}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m41_2" ${msj122}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m41_3" ${msj123}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						<tr>
							<td>Modulo Admin Persona:</td>
							<td>
								<div class="d-inline">
									<input type="checkbox"  name="m42_1" ${msj124}  value="1"  >
									<label>Ver</label>    
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m42_2" ${msj125}  value="1"  >
									<label>Editar</label>
								</div>
								<div class="d-inline">
									<input type="checkbox"  name="m42_3" ${msj126}  value="1"  >
									<label>Eliminar</label>
								</div>
						  </td>
						</tr>
						`;						
					});
					
					$("#container_rol").html(template);
				}
					}//cierre que valua ev != 0
				
			});
	});
	
}());


//actualizar roles
(function(){
	
	$("#actualizar_rol").click(function(){
			
				
		const elementos ={ 
			id : $("#id_rol").val(),
			perfil : $("#nombre_rol").val(),
			m1_1 : $("input:checkbox[name=m1_1]:checked").val(),
			m1_2 : $("input:checkbox[name=m1_2]:checked").val(),
			m1_3 : $("input:checkbox[name=m1_3]:checked").val(),
			
			m2_1 : $("input:checkbox[name=m2_1]:checked").val(),
			m2_2 : $("input:checkbox[name=m2_2]:checked").val(),
			m2_3 : $("input:checkbox[name=m2_3]:checked").val(),
			
			m3_1 : $("input:checkbox[name=m3_1]:checked").val(),
			m3_2 : $("input:checkbox[name=m3_2]:checked").val(),
			m3_3 : $("input:checkbox[name=m3_3]:checked").val(),
			
			m4_1 : $("input:checkbox[name=m4_1]:checked").val(),
			m4_2 : $("input:checkbox[name=m4_2]:checked").val(),
			m4_3 : $("input:checkbox[name=m4_3]:checked").val(),
			
			m5_1 : $("input:checkbox[name=m5_1]:checked").val(),
			m5_2 : $("input:checkbox[name=m5_2]:checked").val(),
			m5_3 : $("input:checkbox[name=m5_3]:checked").val(),
			
			m6_1 : $("input:checkbox[name=m6_1]:checked").val(),
			m6_2 : $("input:checkbox[name=m6_2]:checked").val(),
			m6_3 : $("input:checkbox[name=m6_3]:checked").val(),
			
			m7_1 : $("input:checkbox[name=m7_1]:checked").val(),
			m7_2 : $("input:checkbox[name=m7_2]:checked").val(),
			m7_3 : $("input:checkbox[name=m7_3]:checked").val(),
			
			m8_1 : $("input:checkbox[name=m8_1]:checked").val(),
			m8_2 : $("input:checkbox[name=m8_2]:checked").val(),
			m8_3 : $("input:checkbox[name=m8_3]:checked").val(),
			
			m9_1 : $("input:checkbox[name=m9_1]:checked").val(),
			m9_2 : $("input:checkbox[name=m9_2]:checked").val(),
			m9_3 : $("input:checkbox[name=m9_3]:checked").val(),
			
			m10_1 : $("input:checkbox[name=m10_1]:checked").val(),
			m10_2 : $("input:checkbox[name=m10_2]:checked").val(),
			m10_3 : $("input:checkbox[name=m10_3]:checked").val(),
			
			m11_1 : $("input:checkbox[name=m11_1]:checked").val(),
			m11_2 : $("input:checkbox[name=m11_2]:checked").val(),
			m11_3 : $("input:checkbox[name=m11_3]:checked").val(),
			
			m12_1 : $("input:checkbox[name=m12_1]:checked").val(),
			m12_2 : $("input:checkbox[name=m12_2]:checked").val(),
			m12_3 : $("input:checkbox[name=m12_3]:checked").val(),
			
			m13_1 : $("input:checkbox[name=m13_1]:checked").val(),
			m13_2 : $("input:checkbox[name=m13_2]:checked").val(),
			m13_3 : $("input:checkbox[name=m13_3]:checked").val(),
			
			m14_1 : $("input:checkbox[name=m14_1]:checked").val(),
			m14_2 : $("input:checkbox[name=m14_2]:checked").val(),
			m14_3 : $("input:checkbox[name=m14_3]:checked").val(),
			
			m15_1 : $("input:checkbox[name=m15_1]:checked").val(),
			m15_2 : $("input:checkbox[name=m15_2]:checked").val(),
			m15_3 : $("input:checkbox[name=m15_3]:checked").val(),
			
			m16_1 : $("input:checkbox[name=m16_1]:checked").val(),
			m16_2 : $("input:checkbox[name=m16_2]:checked").val(),
			m16_3 : $("input:checkbox[name=m16_3]:checked").val(),
			
			m17_1 : $("input:checkbox[name=m17_1]:checked").val(),
			m17_2 : $("input:checkbox[name=m17_2]:checked").val(),
			m17_3 : $("input:checkbox[name=m17_3]:checked").val(),
			
			m18_1 : $("input:checkbox[name=m18_1]:checked").val(),
			m18_2 : $("input:checkbox[name=m18_2]:checked").val(),
			m18_3 : $("input:checkbox[name=m18_3]:checked").val(),
			
			m19_1 : $("input:checkbox[name=m19_1]:checked").val(),
			m19_2 : $("input:checkbox[name=m19_2]:checked").val(),
			m19_3 : $("input:checkbox[name=m19_3]:checked").val(),
			
			m20_1 : $("input:checkbox[name=m20_1]:checked").val(),
			m20_2 : $("input:checkbox[name=m20_2]:checked").val(),
			m20_3 : $("input:checkbox[name=m20_3]:checked").val(),
			
			m21_1 : $("input:checkbox[name=m21_1]:checked").val(),
			m21_2 : $("input:checkbox[name=m212]:checked").val(),
			m21_3 : $("input:checkbox[name=m21_3]:checked").val(),
			
			m22_1 : $("input:checkbox[name=m22_1]:checked").val(),
			m22_2 : $("input:checkbox[name=m22_2]:checked").val(),
			m22_3 : $("input:checkbox[name=m22_3]:checked").val(),
			
			m23_1 : $("input:checkbox[name=m23_1]:checked").val(),
			m23_12: $("input:checkbox[name=m23_2]:checked").val(),
			m23_3 : $("input:checkbox[name=m23_3]:checked").val(),
			
			m24_1 : $("input:checkbox[name=m24_1]:checked").val(),
			m24_2 : $("input:checkbox[name=m24_2]:checked").val(),
			m24_3 : $("input:checkbox[name=m24_3]:checked").val(),
			
			m25_1 : $("input:checkbox[name=m25_1]:checked").val(),
			m25_2 : $("input:checkbox[name=m25_2]:checked").val(),
			m25_3 : $("input:checkbox[name=m25_3]:checked").val(),
			
			m26_1 : $("input:checkbox[name=m26_1]:checked").val(),
			m26_2 : $("input:checkbox[name=m26_2]:checked").val(),
			m26_3 : $("input:checkbox[name=m26_3]:checked").val(),
			
			m27_1 : $("input:checkbox[name=m27_1]:checked").val(),
			m27_2 : $("input:checkbox[name=m27_2]:checked").val(),
			m27_3 : $("input:checkbox[name=m27_3]:checked").val(),
			
			m28_1 : $("input:checkbox[name=m28_1]:checked").val(),
			m28_2 : $("input:checkbox[name=m28_2]:checked").val(),
			m28_3 : $("input:checkbox[name=m28_3]:checked").val(),
			
			m29_1 : $("input:checkbox[name=m29_1]:checked").val(),
			m29_2 : $("input:checkbox[name=m29_2]:checked").val(),
			m29_3 : $("input:checkbox[name=m29_3]:checked").val(),
			
			m30_1 : $("input:checkbox[name=m30_1]:checked").val(),
			m30_2 : $("input:checkbox[name=m30_2]:checked").val(),
			m30_3 : $("input:checkbox[name=m30_3]:checked").val(),
			
			m31_1 : $("input:checkbox[name=m31_1]:checked").val(),
			m31_2 : $("input:checkbox[name=m31_2]:checked").val(),
			m31_3 : $("input:checkbox[name=m31_3]:checked").val(),
			
			m32_1 : $("input:checkbox[name=m32_1]:checked").val(),
			m32_2 : $("input:checkbox[name=m32_2]:checked").val(),
			m32_3 : $("input:checkbox[name=m32_3]:checked").val(),
			
			m33_1 : $("input:checkbox[name=m33_1]:checked").val(),
			m33_2 : $("input:checkbox[name=m33_2]:checked").val(),
			m33_3 : $("input:checkbox[name=m33_3]:checked").val(),
			
			m34_1 : $("input:checkbox[name=m34_1]:checked").val(),
			m34_2 : $("input:checkbox[name=m34_2]:checked").val(),
			m34_3 : $("input:checkbox[name=m34_3]:checked").val(),
			
			m35_1 : $("input:checkbox[name=m35_1]:checked").val(),
			m35_2 : $("input:checkbox[name=m35_2]:checked").val(),
			m35_3 : $("input:checkbox[name=m35_3]:checked").val(),
			
			m36_1 : $("input:checkbox[name=m36_1]:checked").val(),
			m36_2 : $("input:checkbox[name=m36_2]:checked").val(),
			m36_3 : $("input:checkbox[name=m36_3]:checked").val(),
			
			m37_1 : $("input:checkbox[name=m37_1]:checked").val(),
			m37_2 : $("input:checkbox[name=m37_2]:checked").val(),
			m37_3 : $("input:checkbox[name=m37_3]:checked").val(),
			
			m38_1 : $("input:checkbox[name=m38_1]:checked").val(),
			m38_2 : $("input:checkbox[name=m38_2]:checked").val(),
			m38_3 : $("input:checkbox[name=m38_3]:checked").val(),
			
			m39_1 : $("input:checkbox[name=m39_1]:checked").val(),
			m39_2 : $("input:checkbox[name=m39_2]:checked").val(),
			m39_3 : $("input:checkbox[name=m39_3]:checked").val(),
			
			m40_1 : $("input:checkbox[name=m40_1]:checked").val(),
			m40_2 : $("input:checkbox[name=m40_2]:checked").val(),
			m40_3 : $("input:checkbox[name=m40_3]:checked").val(),
			
			m41_1 : $("input:checkbox[name=m41_1]:checked").val(),
			m41_2 : $("input:checkbox[name=m41_2]:checked").val(),
			m41_3 : $("input:checkbox[name=m41_3]:checked").val(),
			
			m42_1 : $("input:checkbox[name=m42_1]:checked").val(),
			m42_2 : $("input:checkbox[name=m42_2]:checked").val(),
			m42_3 : $("input:checkbox[name=m42_3]:checked").val()
			};
		
		
			
			$.post('templates/usuario/edit_rol.php', elementos, function(evt){
				
			
					if(evt == "si"){
				Swal.fire({
					toast:true,	
					position: 'center',
					icon: 'success',
					title: 'Registro actualizado',
					showConfirmButton: true,
					confirmButtonText: 'Ok!'
				}).then((result)=>{
						if(result.value){
							location.reload();
						}
					})
					}else{
						Swal.fire({
					toast:true,	
					position: 'center',
					icon: 'error',
					title: 'Error al actualizar',
					timer:1500
						})					
					}
				});	
	});
}());

//crear registro rol page privilegios_rol.php

(function(){
	$("#crear_rol").click(function(){
		let nuevo = $("#nuevo_rol").val();
		
		$.ajax({
			type:"POST",
			data:{nuevo},
			url:'templates/usuario/new_rol.php',
			success:function(rep){
				if(rep=="si"){
					Swal.fire({	
					position: 'center',
					icon: 'success',
					title: 'Creado rol '+nuevo+'',
					confirmButtonText: 'Ok!'
				}).then((result) =>{
						if(result.value){
						location.reload();	
						}
					});
				}
			}
		});
	});
			}());

//eliminar rol
(function(){
		$("#eliminar_rol").click(function(ev){
			
			let id = $("#id_rol").val();
			
			Swal.fire({	
					position: 'center',
					icon: 'error',
					title: 'Desea Eliminar el Rol ?',
					showConfirmButton: true,
					showCancelButton:true,
					cancelButtonText: 'No!',
					confirmButtonText: 'Ok!'
				}).then((result)=>{
						if(result.value){
							
					$.ajax({
					type:"POST",
					data:{id},
					url:'templates/usuario/delete_rol.php',
					success:function(resp){
				if(resp == "si"){
					Swal.fire({
					toast:true,	
					position: 'center',
					icon: 'success',
					title: 'Registro eliminado',
					showConfirmButton: true,
					confirmButtonText: 'Ok!'
				}).then((result)=>{
						if(result.value){
							location.reload();
						}
					})
							
						}
					}
				});
						}
					});	
			
		});
		
	}());


	var es_local = "No";

$(document).ready(function(){

	let URLactual = document.location.origin

	if(URLactual == "https://localhost" || URLactual =="http://localhost"){
		es_local="Si";
	}else{
		es_local = "No";
	}

	$("#es_local").val(es_local);
});