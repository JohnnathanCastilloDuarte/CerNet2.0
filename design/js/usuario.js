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
$("#privilegios").attr('disabled','disabled');
$("#buscador_empresa").attr('disabled','disabled');

mostar_departamentos();
mostrar_privilegios();

validar_usuario();
comparar_pass();

 //////// LISTAR EMPRESAS 

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
            <td><button class="btn btn-muted" id="seleccionar_empresa" data-id="${valor.id_empresa}" data-name="${valor.nombre}" data-direccion="${valor.direccion}">${valor.nombre}</button></td>
          </tr>
          
        `;
      });

      $("#aqui_resultados_empresa").html(template);

    }
  })
});

///////////////// EVENTO EMPRESA 

$(document).on('click','#seleccionar_empresa',function(){

  let id_empresa = $(this).attr('data-id');
  let nombre_empresa = $(this).attr('data-name');
  $("#buscador_empresa").val(nombre_empresa);
  $("#id_empresa").val(id_empresa);

  $("#aqui_resultados_empresa").hide();

});
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
        $("#privilegios").attr('disabled','disabled');
        $("#buscador_empresa").attr('disabled','disabled');
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
        $("#privilegios").attr('disabled',false);
        $("#buscador_empresa").attr('disabled',false);
			}
			
				
	});
	
}

//mostrar privilegios
function mostrar_privilegios(){
   let tipo_mostrar = 'privilegios';
   $.ajax({
     type:'POST',
     data:{tipo_mostrar},
     url:'templates/usuario/mostrar_departamentos_usuario.php',
     success:function(e){
       let traer = JSON.parse(e);
       let template = "";
       
       traer.forEach((valor)=>{
				template +=
				`	
					<option value="${valor.id_privilegio}">${valor.nombre_privilegio}</option>
					
				`;
			});

			$("#privilegios").html(template);
     }
   });
}
mostrar_privilegios();
function mostrar_privilegios(){
   let tipo_mostrar = 'privilegios';
   $.ajax({
     type:'POST',
     data:{tipo_mostrar},
     url:'templates/usuario/mostrar_departamentos_usuario.php',
     success:function(e){
       let traer = JSON.parse(e);
       let template = "";
       
       traer.forEach((valor)=>{
				template +=
				`	
					<option value="${valor.id_privilegio}">${valor.nombre_privilegio}</option>
					
				`;
			});

			$("#privilegios_usuario").html(template);
     }
   });
}

//mostrar departamentos
function mostar_departamentos(){
   let tipo_mostrar = 'departamentos';
   $.ajax({
     type:'POST',
     data:{tipo_mostrar},
     url:'templates/usuario/mostrar_departamentos_usuario.php',
     success:function(e){
       let traer = JSON.parse(e);
       let template = "";
       
       traer.forEach((valor)=>{
				template +=
				`	
					<option value="${valor.id_departamento}" data-id="${valor.id_departamento}">${valor.nombre_departamento}</option>
					
				`;
			});

			$("#departamento_usuario").html(template);
     }
   });
}

//mostrar roles segun departamento
$("#departamento_usuario").change(function(){
  
  let id_departamento = $('#departamento_usuario').val();
	let tipo_mostrar = 'cargos';
   $.ajax({
     type:'POST',
     data: {tipo_mostrar,id_departamento},
     url:'templates/usuario/mostrar_departamentos_usuario.php',
      success:function(e){
       let traer = JSON.parse(e);
       let template = "";
       
       traer.forEach((valor)=>{
				template +=
				`	
					<option value="${valor.cargo}">${valor.nombre_cargo}</option>
					
				`;
			});

			$("#cargo_usuario").html(template);
     }
   });

});

mostar_departamentos_editar();

//mostrar departamentos editar
function mostar_departamentos_editar(){
   let tipo_mostrar = 'departamentos';
   let id_departamento_editar = $("#id_departamento_editar").val();
   let nombre_departamento = $("#nombre_departamento_editar").val();
  // let nombre_cargo = $("#nombre_cargo_editar").val();
  //  let id_cargo_editar = $("#id_cargo_editar").val();
   $.ajax({
     type:'POST',
     data:{tipo_mostrar},
     url:'templates/usuario/mostrar_departamentos_usuario.php',
     success:function(e){
       let traer = JSON.parse(e);
       let template = "";
       
        template +=
          `	
						<option value="${id_departamento_editar}" selected>${nombre_departamento}</option>
					
				`;
       
       traer.forEach((valor)=>{
				template +=
				`	
					<option value="${valor.id_departamento}" data-id="${valor.id_departamento}">${valor.nombre_departamento}</option>
					
				`;
			});

			$("#departamento_usuario_editar").html(template);
     }
   });
}

//mostrar roles segun departamento2
$("#departamento_usuario_editar").change(function(){
  
   let id_departamento = $('#departamento_usuario_editar').val();
	 let tipo_mostrar = 'cargos';
   //let id_departamento_editar = $("#id_departamento_editar").val();
  // let nombre_departamento = $("#nombre_departamento_editar").val();
   let nombre_cargo = $("#nombre_cargo_editar").val();
   let id_cargo_editar = $("#id_cargo_editar").val();
  
  // console.log(id_departamento_editar)
   $.ajax({
     type:'POST',
     data: {tipo_mostrar,id_departamento},
     url:'templates/usuario/mostrar_departamentos_usuario.php',
      success:function(e){
       let traer = JSON.parse(e);
       let template = "";
       
       
        template +=
          `	
					<option value="0" selected>Seleccione...</option>
					
				`;
       traer.forEach((valor)=>{
				template +=
				`	
					<option value="${valor.id_cargo}">${valor.nombre_cargo}</option>
					
				`;
			});

			$("#cargo_usuario_editar").html(template);
       
     }
   });

});




//crear nuevo usuario
(function(){
	$("#email_usuario").blur(function(){
				let email = $("#email_usuario").val();
				
				$.ajax({
					type:'POST',
					data: {email},
					url: 'templates/usuario/valida_email.php',
					success:function(e){
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
  
  let estado_defecto = 'Activo';
  let telefono = $("#telefono_usuario").val();
  const datos = {
  usuario: $("#usuario_principal").val(),
  clave: $("#clave_usuario").val(),
  nombre_usuario: $("#nombre_usuario").val(),
  apellido_usuario: $("#apellido_usuario").val(),
  email_usuario: $("#email_usuario").val(),
  telefonoUsuario: telefono,
  numero_identificacion: $("#numero_identificacion").val(),
  cargo_usuario: $("#cargo_usuario").val(),
  departamento_usuario:$("#departamento_usuario").val(),
  pais_usuario: $("#pais_usuario").val(),
  empresa_usuario: $("#id_empresa").val(),	
  privilegios_usuario: $("#privilegios").val(),  
  estado_usuario: estado_defecto
  }

 $.post('templates/usuario/crear_usuario.php',datos,function(e){
    
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

          }else{
            alert("error");
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
			let traer = JSON.parse(response);
			let template = "";
	
			traer.forEach((valor)=>{
				template += 
				`
					<option value="${valor.id_cargo}">${valor.cargo}</option>;
				`;
			});

			$("#cargo_usuario").html("<option value='0'>Seleccione</option>"+template);
		}
	})
}



