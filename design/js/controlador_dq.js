var id_informe = $("#id_informe_calificacion").val();

////// ELEMENTOS OCULTOS
$("#anexo_leyenda").hide();

///// EVENTO PARA ACTIVAR ANEXO DEL FORMULARIO (ALCANCE).
$("#anexo_alcance").change(function(){

    let valor = $(this).val();

    if(valor == "Si"){
        $("#anexo_leyenda").show();
    }else{
        $("#anexo_leyenda").hide();
    }
});

///// Listar funciones
listar_datos_1();


/// lISTAR LA INFORMACI�N GENERAL 

function listar_datos_1(){

    let movimiento = "listar_datos_1";

    $.ajax({
        type:'POST',
        data:{movimiento, id_informe},
        url:'templates/Calificacion/DQ/controlador_dq.php',
        success:function(respuesta){
           
            let traer = JSON.parse(respuesta);
            let template = "";

            traer.forEach((valor)=>{

                if(valor.anexo_planos.length > 0){
                    $("#anexo_leyenda").show();
                }else{
                    $("#anexo_leyenda").hide();
                }
                $("#id_datos_1").val(valor.id);
                $("#anexo_leyenda").val(valor.anexo_planos);
                
                $("#funcion_dq").val(valor.funcion_item);
                listar_sistemas_apoyo_asignado(valor.id);
            });
        }
    })

}


///// funci�n para crear sistema

$("#btn_creador_sistema").click(function(){

        let nombre_sistema = $("#nombre_del_equipo_dq").val();
        let descripcion = $("#descripcion_dq_sistema").val();
        let movimiento = "Crear_sistema";
        const datos = {
            nombre_sistema,
            descripcion,
            movimiento
        }

        $.ajax({
            type:'POST',
            data:datos,
            url:'templates/Calificacion/DQ/controlador_dq.php',
            success:function(respuesta){
                
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha creado el Sistema de apoyo',
                    icon:'success',
                    timer:1700
                });
                listar_equipos_apoyo();
            }
        })
});


listar_equipos_apoyo();
/// FUNCION PARA LISTAR LOS EQUIPOS DE APOYO
function listar_equipos_apoyo(){

    let movimiento = "Listar_equipos_apoyo";

    $.ajax({
        type:'POST',
        data:{movimiento},
        url:'templates/Calificacion/DQ/controlador_dq.php',
        success:function(respuesta){
           
            let traer = JSON.parse(respuesta);
            let template = "";

            traer.forEach((valor)=>{

                template += 
                `
                    <tr>
                        <td>${valor.nombre}</td>
                        <td>${valor.descripcion}</td>
                        <td><button class="btn btn-primary" id="seleccionar_sistema" data-id="${valor.id_sistema}">Seleccionar</button> || <button class="btn btn-danger" id="eliminar_sistema" data-id="${valor.id_sistema}">Eliminar</button></td>
                    </tr>
                `;
            });

            $("#listar_sistemas").html(template);

        }
    });


}


/////// controla botones para eliminar y seleccionar el sistema

$(document).on('click','#eliminar_sistema',function(){

    let id_sistema = $(this).attr('data-id');
    let movimiento = "Eliminar_sistema";
    let id_dato = $("#id_datos_1").val();

    Swal.fire({
        title:'Mensaje',
        text:'Esta seguro de eliminar el sistema, perderas toda la información',
        icon:'question',
        showCancelButton:true,
        cancelButtonText:'No!',
        showConfirmButton:true,
        confirmButtonText:'Si!',
    }).then((x)=>{
        if(x.value){
            $.ajax({
                type:'POST',
                data:{id_sistema, movimiento},
                url:'templates/Calificacion/DQ/controlador_dq.php',
                success:function(respuesta){
                    console.log(respuesta);
                    if(respuesta == "listo"){
                        Swal.fire({
                            title:'Mensaje',
                            text:'Se ha eliminado correctamente el sistema asignado',
                            icon:'success',
                            timer:1700
                        });
    
                        listar_sistemas_apoyo_asignado(id_dato);
                        listar_equipos_apoyo();
                    }
                }
            })
        }
    });
});

$(document).on('click','#seleccionar_sistema',function(){

        let id_dato = $("#id_datos_1").val();
        let id_sistema = $(this).attr('data-id');
        let movimiento = "seleccionar_sistema";

        const datos = {
            id_dato,
            id_sistema,
            movimiento
        }

        $.ajax({
            type:'POST',
            data:datos,
            url:'templates/Calificacion/DQ/controlador_dq.php',
            success:function(respuesta){
               
                if(respuesta == "Existe"){
                    Swal.fire({
                        title:'Mensaje',
                        text:'El equipo ya fue asignado',
                        icon:'warning',
                        timer:1700
                    });
                }else{
                    Swal.fire({
                        title:'Mensaje',
                        text:'Se ha asignado correctamente el equipo',
                        icon:'success',
                        timer:1700
                    });
                    listar_sistemas_apoyo_asignado(id_dato);
                }
            }
        })
});


//// function para listar los sistemas asignados

function listar_sistemas_apoyo_asignado(id_dato){

    let movimiento = "Listar_asignados_apoyo";
    
    $.ajax({
        type:'POST',
        data:{movimiento, id_dato},
        url:'templates/Calificacion/DQ/controlador_dq.php',
        success:function(respuesta){
            console.log(respuesta);
            let traer = JSON.parse(respuesta);
            let template = "";

            traer.forEach((valor)=>{

                template += 
                `
                    <tr>
                        <td>${valor.nombre_sistema}</td>
                        <td><button class="btn btn-danger" id="eliminar_sistema_asignado" data-id="${valor.id_relacion}">Eliminar</button></td>
                    </tr>
                `;
            });

            $("#sistemas_de_apoyo_asignado").html(template);
        }

    })
}

/// ELIMINAR EL SISTEMA ASIGNADO
$(document).on('click','#eliminar_sistema_asignado', function(){

        let id_sistema_asignado = $(this).attr('data-id');
        let movimiento = "eliminar_sistema_asignado";
        let id_dato = $("#id_datos_1").val();
        $.ajax({
            type:'POST',
            data:{id_sistema_asignado, movimiento},
            url:'templates/Calificacion/DQ/controlador_dq.php',
            success:function(respuesta){
                console.log(respuesta);
                if(respuesta == "Listo"){
                    Swal.fire({
                        title:'Mensaje',
                        text:'Se ha eliminado correctamente el sistema asignado',
                        icon:'success',
                        timer:1700
                    });

                    listar_sistemas_apoyo_asignado(id_dato);
                }
            }
        });
});

///////// btn para actualizar la información de datos_1
$("#btn_actualizar_datos_1").click(function(){
    
    let funcion_dq = $("#funcion_dq").val();
    let anexo_alcance = $("#anexo_alcance").val();
    let anexo_leyenda = $("#anexo_leyenda").val();
    let id_datos_1 = $("#id_datos_1").val();
    let movimiento = "actualizar_informacion_datos_1";

    const datos = {
        funcion_dq,
        anexo_alcance,
        anexo_leyenda,
        id_datos_1,
        id_informe,
        movimiento

    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/Calificacion/DQ/controlador_dq.php',
        success:function(respuesta){
            if(respuesta == "Listo"){
               Swal.fire({
                   title:'Mensaje',
                   text:'Se ha modificado la información correctamente',
                   icon:'success',
                   timer:1700
               }) 
            }
            listar_datos_1();

            
        }
    })

    

});

