	{foreach from=$aprobaciones item=aprobacion}
																											
																											<tr>
																												<td><button value="{$aprobacion.id_aprobado}" id="ver_pdf_aprobaciones"><img src='design/images/pdf.png' width='50px'/></button></td>
																												<td>{$aprobacion.nombre_informe}</td>
																												<td><textarea id="observacion_aprobacion" class="form-control">{$aprobacion.observaciones}</textarea></td>
																												<td><button  type="submit" class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info">Aceptar</button></td>
																											</tr>	
																											{/foreach}





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////SCRIPT PARA CONTROLAR LA APORBACIÓN DE INFORMES////////////////////////////////////////////////////////////////////////////////////////

listar_aprobaciones();


	function listar_aprobaciones(){

	$.ajax({
		type:'POST',
		url:'listar_aprobaciones.php',
		success:function(response){
			let traer = JSON.parse(response);
			let template = "";
			var valor = "";
			var estado = "";
			
			
			traer.forEach((x)=>{
				if(x.estado == 0){
					valor = 0;
					estado = "Solicitar"
				}
				else if(x.estado == 1){
					valor = 1;
					estado = "En curso";
				}
				else if(x.estado == 2){
					valor = 2;
					estado = "Aprobado";
				}
				else if(x.estado == 3){
					valor = 3;
					estado = "Corregir";
				}
		
				template +=
					`
						<tr>
							<td><a class="btn btn-danger" id="ir_pdf"><img src="design/images/pdf.png" width="50px"/></a></td>
							<td>${x.nombre}</td>
							<td>${estado}</td>
							<td><button id="change_aprobacion">Aceptar</button></td>
						</tr>

          `;
			});
			
			$("#resultados_de_aprobaciones").html(template);
		}
	});
		
		


	$(document).on('click','#resultados_de_aprobaciones , #change_aprobacion',function(){
		alert("");
	});	
		
}



		

