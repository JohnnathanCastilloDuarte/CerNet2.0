$("#btn_nuevo_usuario").hide();


$("#usuario_principal").val("");
$("#clave_usuario").val("");
$("#re_clave_usuario").val("");
$("#clave_usuario").attr('disabled','disabled');
$("#re_clave_usuario").attr('disabled','disabled');
$("#file_usuario").attr('disabled','disabled');
$("#nombre_usuario").attr('disabled','disabled');
$("#apellido_usuario").attr('disabled','disabled');
$("#email_usuario").attr('disabled','disabled');
$("#telefono_usuario").attr('disabled','disabled');
$("#numero_identificacion").attr('disabled','disabled');
$("#cargo_usuario").attr('disabled','disabled');
$("#departamento_usuario").attr('disabled','disabled');
$("#pais_usuario").attr('disabled','disabled');
$("#empresa_usuario").attr('disabled','disabled');
$("#exampleCustomRadio1").attr('disabled','disabled');
$("#exampleCustomRadio2").attr('disabled','disabled');
$("#exampleCustomRadio3").attr('disabled','disabled');
$("#exampleCustomRadio4").attr('disabled','disabled');


validar_usuario();
comparar_pass();
//Validar usuario
function validar_usuario(){
	
	$("#usuario_principal").blur(function(){
		let usuario = $("#usuario_principal").val();
		if(usuario == ""){
			Swal.fire({
						position:'center',
						icon:'error',
						timer:1500,
						title:'Debes ingresar un usuario'
					});
					$("#clave_usuario").attr('disabled','disabled');
					$("#re_clave_usuario").attr('disabled','disabled');
		}else{
				$.ajax({
					type:'POST',
					data: {usuario},
					url: 'templates/usuario/validar_usuario.php',
					success: function(e){
						console.log(e);
						if(e == "disponible"){
							Swal.fire({
								position:'center',
								icon:'success',
								timer:1500,
								title:'Usuario valido'
							});
							$("#clave_usuario").attr('disabled',false);
							$("#re_clave_usuario").attr('disabled',false);
						}
						else{
							Swal.fire({
								position:'center',
								icon:'error',
								timer:1500,
								title:'Usuario no disponible'
							});
							$("#clave_usuario").attr('disabled','disabled');
							$("#re_clave_usuario").attr('disabled','disabled');
						}	
					}
					});
				}
	});	
}

//Validar contraseñas
function comparar_pass(){
	$("#re_clave_usuario").blur(function(){
			
			let clave = $("#clave_usuario").val();
			let re_clave = $("#re_clave_usuario").val();
			let alerta = "";	
			
			if(clave != re_clave){
				alerta="<div class='alert alert-danger' role='alert'>Las contraseñas no coinciden</div>";	
				$("#coinciden_pass").html(alerta);
				$("#file_usuario").attr('disabled','disabled');
				$("#nombre_usuario").attr('disabled','disabled');
				$("#apellido_usuario").attr('disabled','disabled');
				$("#email_usuario").attr('disabled','disabled');
				$("#telefono_usuario").attr('disabled','disabled');
				$("#numero_identificacion").attr('disabled','disabled');
				$("#cargo_usuario").attr('disabled','disabled');
				$("#departamento_usuario").attr('disabled','disabled');
				$("#pais_usuario").attr('disabled','disabled');
				$("#empresa_usuario").attr('disabled','disabled');
				$("#exampleCustomRadio1").attr('disabled','disabled');
				$("#exampleCustomRadio2").attr('disabled','disabled');
				$("#exampleCustomRadio3").attr('disabled','disabled');
				$("#exampleCustomRadio4").attr('disabled','disabled');
			}else{
				alerta="<div class='alert alert-success' role='alert'>Las contraseñas  coinciden</div>";	
				$("#coinciden_pass").html(alerta);
				$("#file_usuario").attr('disabled', false);
				$("#nombre_usuario").attr('disabled', false);
				$("#apellido_usuario").attr('disabled', false);
				$("#email_usuario").attr('disabled', false);
				$("#telefono_usuario").attr('disabled', false);
				$("#numero_identificacion").attr('disabled', false);
				$("#cargo_usuario").attr('disabled', false);
				$("#departamento_usuario").attr('disabled', false);
				$("#pais_usuario").attr('disabled', false);
				$("#empresa_usuario").attr('disabled', false);
				$("#exampleCustomRadio1").attr('disabled', false);
				$("#exampleCustomRadio2").attr('disabled', false);
				$("#exampleCustomRadio3").attr('disabled', false);
				$("#exampleCustomRadio4").attr('disabled', false);
			}
			
				
	});
	
}

//crear nuevo usuario
(function(){
	$("#email_usuario").blur(function(){
				let email = $("#email_usuario").val();
				
				$.ajax({
					type:'POST',
					data: {email},
					url: 'templates/usuario/valida_email.php',
					success:function(e){
						console.log(e);
						if(e == "disponible"){
							Swal.fire({
								position:'center',
								icon:'success',
								timer:1500,
								title:'Email disponible'
							});
            $("#btn_nuevo_usuario").show();
						}else{
							Swal.fire({
								position:'center',
								icon:'error',
								title:'Email no se encuentra disponible',
								timer:1500
							});						
						  $("#btn_nuevo_usuario").hide();
						}
					}
				});
			});
}());


$("#btn_nuevo_usuario").click(function(){

  const datos = {
  usuario: $("#usuario_principal").val(),
  clave: $("#clave_usuario").val(),
  //file: $('input[type=file]').val().replace(/C:\\fakepath\\/i, ''),
  nombre_usuario: $("#nombre_usuario").val(),
  apellido_usuario: $("#apellido_usuario").val(),
  email_usuario: $("#email_usuario").val(),
  telefono_usuario: $("#telefono_usuario").val(),
  numero_identificacion: $("#numero_identificacion").val(),
  cargo_usuario:$("#cargo_usuario").val(),
  departamento_usuario:$("#departamento_usuario").val(),
  pais_usuario: $("#pais_usuario").val(),
  empresa_usuario:$("#empresa_usuario").val(),	
  estado_usuario :$('input:radio[name=estado_usuario]:checked').val()	
  }

  $.post('templates/usuario/crear_usuario.php',datos,function(e){
    console.log(e);
    if(e=="creado"){
      Swal.fire({
        position:'center',
        icon:'success',
        title:'Usuario creado con exito',
        confirmButtonText:"Ok"
      }).then((result)=>{
        if(result.value){
          location.reload();
        }
      });
    }
  });

});//fin del evento .click




//////////////////////// ACTUALIZAR USUARIO 
$("#formulario_actualizacion_usuario").submit(function(e){
  e.preventDefault();

    var formData = new FormData(document.getElementById("formulario_actualizacion_usuario"));
  
  
  	$.ajax({
      type: 'POST',
      dataType: 'html',
      data: formData,
      url: 'templates/usuario/actualizar_usuario.php',
      cache: false,
      contentType: false,
      processData: false,
      success:function(response) {
          console.log(response);
          if(response == "Actualizado"){
            Swal.fire({
              title:'Mensaje',
              text:'Se ha actualizado correctamente',
              icon:'success',
              timer:1500
            });

          }
      }
		});

});






/////////// FUNCION PARA BUSCAR CARGO
buscar_cargos();
function buscar_cargos(){

	$.ajax({
		type:'POST',
		url:'templates/usuario/buscar_cargo.php',
		success:function(response){
			let traer = JSON.parse()
		}
	})
}



