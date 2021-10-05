(function(){
	
	$("#btn_editar_empresa_cliente").click(function(){
			
		let razon_social = $(" div #razon_social").val();
		
		const varios = {
			id_empresa : $("#id_empresa").val(),
			n_tributario  : $("#n_tributario").val(),    
			razon_social  : $("#razon_social").val(), 
			direccion_empresa : $("#direccion_empresa").val(), 
			pais_empresa  : $("#pais_empresa").val(),
			ciudad_empresa : $("#ciudad_empresa").val(),
			sigla_pais : $("#sigla_pais").val(),
			sigla_empresa : $("#sigla_empresa").val(),
			tipo_sede : $("#tipo_sede").val(),
			giro_empresa : $("#giro_empresa").val()
		} 
		
		$.post('templates/cliente/edit_empresa_cliente.php', varios , function(e){
			if(e=="si"){
					Swal.fire({
 							position: 'center',
 							icon: 'success',
  						title: 'El cliente '+razon_social+' ha sido modificado!',
  						showConfirmButton: false,
  						timer: 1800
							});
			}
		});
	});
}());