
 $(document).on('click','#btn_cancelar_update_certificado',function(){

    let id_equipo = $(this).attr('data-id'  );

    $("#fecha_vencimiento_gestor"+id_equipo).hide();
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

  $(document).on('click','#btn_nuevo_certificado',function(){

    let id_equipo = $(this).attr('data-id'  );

    $("#fecha_vencimiento_gestor"+id_equipo).show();
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