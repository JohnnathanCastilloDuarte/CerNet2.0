

$(document).on('click','#btn_abrir_item',function(){

  let url = '';
  let urlactual = window.location;
  let id_tipo_item = $(this).attr('data-id');

  if (urlactual == 'http://localhost/CerNet2.0/index.php?module=5&page=1') {

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
		
		
		let nombre_item = $(this).attr("data-nombre");
		
		const datos = {
			 id_principal : $(this).attr("data-id"),
				id_valida :$("#id_valida").val()
		}
		
		Swal.fire({
			position: 'center',
			icon: 'error',
			title:'Seguro desea eliminar '+ nombre_item +'',
			showConfirmButton: true,
			confirmButtonText:'Si',
			showCancelButton: true,
			cancelButtonText: 'No'
		}).then((result)=>{
			$.post('templates/item/delete_item.php', datos ,function(rep){
			
						if(rep == "si"){
							Swal.fire({
								position: 'center',
								toast:true,
								title: 'Registro Eliminado',
								icon : 'success',
								showConfirmButton: true,
								confirmButtonText:'Ok'
							}).then((result)=>{
									if(result.value){
										location.reload();
									}
							});
						}
					
				});			
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


lista_item_cliente();