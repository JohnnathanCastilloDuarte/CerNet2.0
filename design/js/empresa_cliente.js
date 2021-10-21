
	
	$("#btn_editar_cliente_empresa").click(function(){
			
		 let razon_social        = $("div #razon_social").val();

		 let id_empresa         = $("#id_empresa").val();
     let n_tributario       = $("#n_tributario").val();    
     let direccion_empresa  = $("#direccion_empresa").val(); 
     let pais_empresa       = $("#pais_empresa").val();
     let ciudad_empresa     = $("#ciudad_empresa").val();
     let sigla_pais         = $("#sigla_pais").val();
     let sigla_empresa      = $("#sigla_empresa").val();
     let tipo_sede          = $("#tipo_sede").val();
     let giro_empresa       = $("#giro_empresa").val();
  
    console.log(id_empresa)
		const varios = {
			id_empresa, 
			n_tributario, 
			razon_social,   
			direccion_empresa, 
			pais_empresa, 
			ciudad_empresa, 
			sigla_pais, 
			sigla_empresa, 
			tipo_sede, 
			giro_empresa, 
		} 

		$.post('templates/cliente/edit_empresa_cliente.php', varios , function(e){
			if(e=="Si"){
					Swal.fire({
 							position: 'center',
 							icon: 'success',
  						title: 'El cliente '+razon_social+' ha sido modificado!',
  						showConfirmButton: false,
  						timer: 1000
							});
			}
		});
	});




///////////////// FUNCION PARA SETEAR LOS CAMPOS
function limpiar_campos_clientes(){
  $("#registro_vtiger").val('');
  $("#n_tributario").val('');
  $("#razon_social").val('');
  $("#direccion_empresa").val('');
  $("#pais_empresa").val('');
  $("#ciudad_empresa").val('');
  $("#sigla_pais").val('');
  $("#sigla_empresa").val('');
  $("#tipo_sede").val('');
  $("#giro_empresa").val('');
}




//////////////// CREACIÒN DE CLIENTE

$("#form_creacion_cliente").submit(function(evento){
  
       evento.preventDefault();
  
    var formData = new FormData(document.getElementById("form_creacion_cliente"));
  
    $.ajax({
      type:'POST',
      url:'templates/cliente/crear_cliente.php',
      data:formData,
      cache: false,
      contentType: false,
      processData: false,
      success:function(response){        
        if(response == "Creado"){
          Swal.fire({
            title:'Mensaje',
            text:'El Cliente ha sido registrado',
            icon:'success',
            timer:2000
          });
          limpiar_campos_clientes();
          
        }
      }
    })   
});