
if ($("#id_equipo_cercal").val() == ''){
	$("#btn_editar_equipo").hide();
	$("#btn_nuevo_equipo").show();
}else{
	$("#btn_editar_equipo").show();
	$("#btn_nuevo_equipo").hide();
}

//Setear campitos
function setearCampos(){
			 $("#nombre_equipo").val('');
		 	 $("#marca_equipo").val('');
		 	 $("#n_serie_equipo").val('');
		 	 $("#modelo_equipo").val('');
		   $("#tipo_medicion").val('');
			 $("#modelo_estufa").val('');
			 $("#id_equipo_cercal").val('');
			 $("#n_certificado").val('');
			 $("#pais").val('');
			 $("#fecha_emision").val('');
			 $("#fecha_vencimiento").val('');
		}

//Editar equipo de cercal 
$("#btn_editar_equipo").click(function(){

	const datos = {
		 	nombre_equipo 	  : $("#nombre_equipo").val(),
		 	marca_equipo 	  : $("#marca_equipo").val(),
		 	n_serie_equipo    : $("#n_serie_equipo").val(),
		 	modelo_equipo  	  : $("#modelo_equipo").val(),
		    tipo_medicion 	  : $("#tipo_medicion").val(),
			modelo_estufa 	  : $("#modelo_estufa").val(),
			id_equipo_cercal  : $("#id_equipo_cercal").val()
		}

	if (campos_vacios(datos) == true){
          $.ajax({
           type:'POST',
           url:'templates/equipos_cercal/editar_equipo.php',
           data:datos,
           success:function(response){
            //console.log(response);
             if(response == "Si"){
               Swal.fire({
                 title:'Mensaje',
                 text:'Se ha modificado el equipo correctamente',
                 icon:'success',
                 showConfirmButton: false,
                 timer:1500
               });

              window.setTimeout(function(){window.location.href = "index.php?module=12"},1400);
             }else{
              console.log("No se pudo"+response)
            }

          }
        });
      }else{
        console.log("no");
      }	
});

//Crear equipo de cercal 
$("#btn_nuevo_equipo").click(function(){

	const datos = {
		 	nombre_equipo 	  : $("#nombre_equipo").val(),
		 	marca_equipo 	  : $("#marca_equipo").val(),
		 	n_serie_equipo    : $("#n_serie_equipo").val(),
		 	modelo_equipo  	  : $("#modelo_equipo").val(),
		    tipo_medicion 	  : $("#tipo_medicion").val(),
			modelo_estufa 	  : $("#modelo_estufa").val(),
			n_certificado     : $("#n_certificado").val(),
			pais     		  : $("#pais").val(),
			fecha_emision     : $("#fecha_emision").val(),
			fecha_vencimiento : $("#fecha_vencimiento").val()
		}

	if (campos_vacios(datos) == true){
          $.ajax({
           type:'POST',
           url:'templates/equipos_cercal/nuevo_equipo.php',
           data:datos,
           success:function(response){
            //console.log(response);
             if(response == "Si"){
               Swal.fire({
                 title:'Mensaje',
                 text:'Se ha creado el equipo correctamente',
                 icon:'success',
                 showConfirmButton: false,
                 timer:1500
               });
               setearCampos();
             }else{
              console.log("No se pudo"+response)
            }

          }
        });
      }else{
        console.log("no");
      }	
});