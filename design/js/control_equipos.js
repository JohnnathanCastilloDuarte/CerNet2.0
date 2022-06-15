$("#addcertificado").hide();
 

$(document).on('click','#btn_agregar_certificado',function(){

    let id_equipo = $(this).attr('data-id');

    $("#addcertificado").show();
    $("#listado").hide();
    $("#id_equipo_certificado").val(id_equipo);
    /*$("#fecha_vencimiento_gestor"+id_equipo).show();
    $("#numero_certificado_gestor"+id_equipo).show();
    $("#fecha_vencimiento"+id_equipo).hide();
    $("#numero_certificado"+id_equipo).hide(); 

    $("#btn_cancelar_update_certificado").show();  
    $("#btn_nuevo_certificado").show();    
*/
    /*$.ajax({
        type:'POST',
        data:{id_equipo, movimiento},
        url:'templates/flujo_laminar/controlador_imagenes.php',
        success:function(response){
            ///console.log(response);
            if(response == "listo"){
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha eliminado correctamente la imagen',
                    icon:'success',
                    timer:1700
                });
                listar_imagenes();
            }
        }
    })*/
    
  });

  $(document).on('click','#btn_cancelar_update_certificado',function(){
    $("#addcertificado").hide();
    $("#listado").show();  
  });

//Almacenar nuevo Certificado
  $(document).on('click','#btn_guardar_certificado',function(){

    let id_equipo = $(this).attr('data-id');

    $("#addcertificado").hide();
    $("#listado").show();  
    $("#id_equipo_certificado").val();

        const datos = {
            id_equipo_certificado : $("#id_equipo_certificado").val(),
            fecha_emision_update : $("#fecha_emision_update").val(),
            numero_certificado_update : $("#numero_certificado_update").val(),
            pais_update : $("#pais_update").val(),
        }
        $.ajax({
            type:'POST',
            data:datos,
            url:'templates/equipos_cercal/nuevo_certificado.php',
            success:function(response){
                console.log(response);
                if(response == "Si"){
                    Swal.fire({
                        title:'Mensaje',
                        text:'Se ha actualizado el cetificado del equipo',
                        icon:'success',
                        timer:1700
                    });
                   
                }
            }
        })
    
  });