var id_asignado_calificaciones = $("#id_asignado_calificacion").val();
var id_usuario = $("#id_valida").val();


///////// funciones a ejecutar cuando ingrese al modulo:
listar_informes();


$(document).on('click','#crear_informe',function(){

    let movimiento = $(this).val();
    
    const datos = {
        movimiento,
        id_asignado_calificaciones,
        id_usuario
    }
    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/Calificacion/controlador_calificaciones.php',
        success:function(respuesta){
            console.log(respuesta);
            if(respuesta == "Sin siglas"){
                Swal.fire({
                    title:'Mensaje',
                    text:'Desbes completar sigla de pais o sigla de la empresa en el modulo de cliente',
                    icon:'warning',
                    timer:1700
                });
            }else if(respuesta == "Listo"){
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha creado un nuevo '+movimiento,
                    icon:'success',
                    timer:1700
                });
            }else if(respuesta == "Existe"){
                Swal.fire({
                    title:'Mensaje',
                    text:'No se puede crear un informe, ya existe uno en curso',
                    icon:'warning',
                    timer:1700
                });
            }

            listar_informes();
        }

    });
});


/////////// FUNCIONES PARA LISTAR
function listar_informes(){

    let movimiento = "Listar_informes";
    $.ajax({
        type:'POST',
        data:{id_asignado_calificaciones,movimiento},
        url:'templates/Calificacion/controlador_listas.php',
        success:function(respuesta){
            
            let traer = JSON.parse(respuesta);
            let template = "";

            traer.forEach((valor)=>{

                template += 
                `
                    <tr>
                        <td>${valor.id_informe}</td>
                        <td>${valor.empresa}</td>
                        <td>${valor.tipo_informe}</td>
                        <td>${valor.nombre_informe}</td>
                        <td>${valor.fecha_registro}</td>
                        <td><button class="btn btn-primary" data-id="${valor.id_informe}" id="btn_completar_informe" data-type="${valor.tipo_informe}">Completar</button> ||  <button class="btn btn-danger" data-id="${valor.id_informe}" id="eliminar_informe">Eliminar</button></td>
                    </tr>
                `;
            });

            $("#trae_informes").html(template);
        }
    })
}


/////////// FUNCION PARA ELIMINAR INFORME
$(document).on('click','#eliminar_informe',function(){

        let id_informe = $(this).attr('data-id');
        let movimiento = "Eliminar_informe";
        Swal.fire({
            title:'Mensaje',
            text:'Esta seguro de eliminar el informe, perderas toda la información',
            icon:'question',
            showCancelButton:true,
            cancelButtonText:'No!',
            showConfirmButton:true,
            confirmButtonText:'Si!',
        }).then((x)=>{
            if(x.value){  

                $.ajax({
                    type:'POST',
                    data:{id_informe,movimiento},
                    url:'templates/Calificacion/controlador_listas.php',
                    success:function(respuesta){
                     
                        if(respuesta == "Eliminado"){
                            Swal.fire({
                                title:'Mensaje',
                                text:'Se ha eliminado el informe correctamente',
                                icon:'success',
                                timer:1700
                            });
                            listar_informes();
                        }
                    }
                });  
            }
        });           
});


///////// boton para llevar a completar el informe de calificación

$(document).on('click','#btn_completar_informe',function(){

    let tipo_informe = $(this).attr('data-type');
    let id_informe = $(this).attr('data-id');
    let url = "";
    let encrypt = "KLDHSFDKSHjhfdskjgdskf8656165874FSDHB"+id_informe;
    if(es_local=="Si"){
        url = "https://localhost";
    }else{
        url = "https://cercal.net";   
    }

    location.href = url+"/CerNet2.0/index.php?module=Calificacion&type="+tipo_informe+"&id_informe="+encrypt;

});