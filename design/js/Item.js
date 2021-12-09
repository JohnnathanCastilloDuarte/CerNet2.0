
$(document).on('click','#btn_abrir_item',function(){

	let url = '';
	let urlactual = window.location;
	let id_tipo_item = $(this).attr('data-id');
						
	if (urlactual == 'https://localhost/CerNet2.0/index.php?module=5&page=1' || 
		urlactual == 'http://localhost/CerNet2.0/index.php?module=5&page=1') {

		url = `http://localhost/CerNet2.0/index.php?module=5&page=3&type=${id_tipo_item}`;


	}else{

		url = `http://cercal.net/CerNet2.0/index.php?module=5&page=3&type=${id_tipo_item}`;
	}

	window.open(url)


});

//function para crear item
(function(){
	
	$("#btn_nuevo_item").click(function(){
		let nombre_item = $("#nombre_item").val();

		const item = {
			empresa : $("#empresa_item").val(),
			tipo_item : $("#tipo_item").val(),
			nombre_item : $("#nombre_item").val(),
			desc_item : $("#desc_item").val(),
			estado : $("input:radio[name=estado]:checked").val(),
			id_valida :$("#id_valida").val()	
		}

		$.post('templates/item/new_item.php',item, function(respt){

			if(respt == "si"){
				Swal.fire({
					position: 'center',
					icon: 'success',
					title:'El Item '+ nombre_item +' ha sido creado',
					showConfirmButton: true,
					ConfirmButtonText:'Ok'		
				}).then((result)=>{
					if(result.value){
						
						lista_item_cliente();
					}
				});		
				}//cierre del if
				else{
					Swal.fire({
						position: 'center',
						icon: 'error',
						title: 'El Item '+ nombre_item +' No ha sido creado',
						showConfirmButton: true,
						ConfirmButtonText:'Ok'
					});
				}
			});
	});
}());

//evento para eliminar Item
(function(){
	
	$("div #btn_eliminar_item").click(function(){
		
		
		let nombre_item  = $(this).attr("data-nombre");
		let id_principal = $(this).attr("data-id");
		let id_valida    = $("#id_valida").val();
		let tipo_item    = $(this).attr("data-tipoitem");

//estas variables son para enviar el registro de la accion
		let movimiento = "Elimina en el modulo";
		let modulo 	   = "Items";
		let quien 	   = $("#id_valida").val();

		const datos = {
			quien,
			movimiento,
			modulo, 
		}
		Swal.fire({
			toast:true,
			title: 'Eliminar',
			text: 'Deseas eliminar el item '+nombre_item+' ?!',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, Eliminar!',
			cancelButtonText: 'No, Eliminar!'
		}).then((result)=>{

			if (result.value) {
				$.ajax({
					type: 'POST',
					data: {'id_principal':id_principal, 'id_valida':id_valida, 'tipo_item':tipo_item},	
					url: 'templates/item/delete_item.php',
					success: function(e){
						console.log(e);	
						Swal.fire({
							icon :'success',			
							text: 'Registro eliminado correctamente',
							confirmButtonText: 'Ok!'
						}).then((result) => {
							if(result.value){
								location.reload();
							}else{
								console.log("error");
							}
						});
					}
				});
				$.ajax({
					type:'POST',
					data:datos,
					url:'templates/controlador_backtrack/controlador_general.php',
					success:function(response){
						if(response == "Listo"){

						}
					}
				});
			}
			
		});
	})
}());

//evento para listar_item_cliente
function lista_item_cliente(){
	let id_empresa = $("#empresa_item").val();
	
	$.ajax({
		type:'POST',
		data: {id_empresa},
		url:'templates/item/lista_item_cliente.php',
		success:function(e){
			let traer = JSON.parse(e);
			let template = "";

			traer.forEach(result =>{
				template +=
				`
				<tr>
				<td>${result.item}</td>
				<td>${result.tipo}</td>
				<td>${result.descripcion}</td>
				<td>${result.fecha_registro}</td>
				<td>
				<div class="col-sm-12" style="text-align: center;">
				<a id="btn_editar_item" href="index.php?module=4&page=3&type=${result.id_tipo}" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info">
				<i class="lnr-pencil btn-icon-wrapper"></i></a>
				</div>	
				</td>
				</tr>
				`;
			});

			$("#items_cliente").html(template);
		}
	});
}

//funcuion para enviar el PDF por correo

$(document).on('click',"#enviar_correo_pdf",function(){
  		
  		let id_item =($(this).data("id"));	
  		let id_tipo =($(this).data("tipo"));	
        Swal.fire({
          title: 'Enviar PDF',
          icon:'question',
          text:'Ingrese el correo al que se enviara el PDF'+id_item,
          input: 'text',
          inputAttributes: {
   		  autocapitalize: 'on'
  		  },
          inputPlaceholder: 'Ingrese el correo',
          showCancelButton: true,
        }).then((result)=>{
        
          if(result.value){
            let correo = result.value;
            let pdf = 2;

            //alert(correo+"//"+id_item+"//"+id_tipo);
             
            const datos = {
              correo,
              id_item,
              id_tipo,
              pdf,
            } 
              $.ajax({
              type:'POST',
              url:'templates/item/enviarPDF.php',
              data:datos,
              success:function(response){
                console.log(response);
               
                if(response == ""){
                  Swal.fire({
                    title:'Mensaje',
                    text:'Se ha enviado el PDF correctamente'+response,
                    timer:1500,
                    icon:'success'
                  });
        
                }else{
                	alert("algo malio sal"+response);
                }

              }
            });

          }

        });

});

lista_item_cliente();