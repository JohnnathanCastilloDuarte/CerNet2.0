
	
$("#formulario_para_editar").submit(function(evento){
  
       evento.preventDefault();
   var formData = new FormData(document.getElementById("formulario_para_editar"));
  
    $.ajax({
      type:'POST',
      url:'templates/cliente/edit_empresa_cliente.php',
      data:formData,
      cache: false,
      contentType: false,
      processData: false,
      success:function(response){ 
        console.log(response);
        if(response == "Creado"){
          Swal.fire({
 							position: 'center',
 							icon: 'success',
  						title: 'El cliente  ha sido modificado!',
  						showConfirmButton: false,
  						timer: 1000
							});  
          
        }
      }
    }) 
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