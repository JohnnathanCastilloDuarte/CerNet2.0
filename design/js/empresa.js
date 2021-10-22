(function(){
	$("div #btn_restablecer_usuario").click(function(){
		var id = $(this).attr('data-id');
		var correo = $(this).attr('data-email');
		if(correo == "")
		{
			Swal.fire({
				icon: 'error',
				text: 'Debes registrar un correo para continuar',
				toast: true
			});
		}else{
			Swal.fire({
				icon:'warning',		
				title: 'Seguro deseas resetear la contraseña?',
				showCancelButton: true,
				cancelButtonText:'No',		
				confirmButtonText: 'Si',
			}).then((result)=>{
				if(result.value){
					$.ajax({
						type:'POST',
						data:{'correo':correo, 'id':id},
						url:'templates/usuario/reset_pass.php',
						success:function(resp){
							if(resp){
								Swal.fire({
									icon: 'success',
									text: 'password reseteada correctamente',
									toast: true
								});
							}else{
								Swal.fire({
									icon: 'error',
									text: 'Error al resetear password',
									toast: true
								});
							}							
						}
					});
				}												
			});
		}		
	});
})();


(function(){
	$("div #btn_eliminar_usuario ").click(function(ev){
		ev.preventDefault();
		const datos = {
			id : $(this).attr('data-id'),
			id_valida : $("#id_valida").val()
		}
		
		Swal.fire({
			toast:true,
			title: 'Eliminar',
			text: 'Deseas Eliminar '+  +' !',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, Eliminar!',
			cancelButtonText: 'No, Eliminar!'
		}).then((result) => {
			if (result.value){
				$.post('templates/usuario/eliminar_usuario.php',datos,function(){
					Swal.fire(
						'Eliminado!',
						' ha sido eliminado.',
						'success'
						)
					location.reload();
				});
			}
		})
		
	})
	
})();


(function(){
	$("div #btn_eliminar_cliente").click(function(){

		let quien = $("#id_valida").val();
		let movimiento = "Elimina en el modulo";
		let modulo = "Cliente";

		const datos = {
			quien,
			movimiento,
			modulo 
		}

		var empresa = $(this).attr('data-nombre');
		var id = $(this).attr('data-id');
		var id_valida = $("#id_valida").val();
		Swal.fire({
			toast:true,
			title: 'Eliminar',
			text: 'Deseas eliminar a '+ empresa +'!',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, Eliminar!',
			cancelButtonText: 'No, Eliminar!'
		}).then((result) => {
			if(result.value){
				$.ajax({
					type: 'POST',
					data: {'id':id, 'id_valida':id_valida},	
					url: 'templates/cliente/eliminar_cliente.php',
					success: function(){	
						Swal.fire({
							icon :'success',			
							text: 'Registro eliminado correctamente'+quien+'!',
							confirmButtonText: 'Ok!'
						}).then((result) => {
							if(result.value){
								location.reload();
							}

						});
					}
				});

				$.ajax({
					type:'POST',
					data:datos,
					url:'templates/controlador_backtrack/controlador_general.php',
					success:function(response){
						console.log(response);
						if(response == "Listo"){

						}
					}
				});




			}
		});  

	});
})();


