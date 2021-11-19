
$("#crear_nuevo_equipo").click(function(){
    window.open("templates/equipos_cercal/creacion_equipos.php");
});



//////////// BOTON PARA CREAR EL NUEVO EQUIPO
$("#btn_crear_equipo_cercal").click(function(){

    alert("Click");

    let nombre_equipo_cercal = $("#nombre_equipo_cercal").val();
    let marca_equipo_cercal = $("#marca_equipo_cercal").val();
    let n_serie_equipo_cercal = $("#n_serie_equipo_cercal").val();
    let modelo_equipo_cercal = $("#modelo_equipo_cercal").val();
    let certificado_calibracion_equipo_cercal = $("#certificado_calibracion_equipo_cercal").val();
    let ultima_fecha_calibracion_equipo_cercal = $("#ultima_fecha_calibracion_equipo_cercal").val();
    let trazabilidad_equipo_cercal = $("#trazabilidad_equipo_cercal").val();
    let pais_certificado_equipo_cercal = $("#pais_certificado_equipo_cercal").val();
    let proceso = 1;

    const datos = {
        nombre_equipo_cercal,
        marca_equipo_cercal,
        n_serie_equipo_cercal,
        modelo_equipo_cercal,
        certificado_calibracion_equipo_cercal,
        ultima_fecha_calibracion_equipo_cercal,
        trazabilidad_equipo_cercal,
        pais_certificado_equipo_cercal,
        proceso
    }

    $.ajax({
        type:'POST',
        data: datos,
        url:'controlador_equipos.php',
        success:function(response){
            Swal.fire({
                title:'Mensaje',
                text:'Se ha creado el equipo correctamente',
                icon:'success',
                timer:2000
            });
        }
    })
});


/////////// boton para recargar los equipos de cercal

$("#recargar_equipos").click(function(){

    trayendo_equipo()

});



trayendo_equipo();

function trayendo_equipo(){
  
    let proceso = 2;

    $.ajax({
        type:'POST',
        data:{proceso},
        url:'templates/equipos_cercal/controlador_equipos.php',
        success:function(response){
            let traer = JSON.parse(response);
            let template = '';

            traer.forEach((x)=>{
                template +=
                `
                    <tr>
                        <td>${x.id_equipo}</td>
                        <td>${x.nombre}</td>
                        <td>${x.certificado}</td>
                        <td>${x.fecha_emision}</td>
                        <td>${x.fecha_vencimiento}</td>
                        <td><button class="btn btn-success" class="form-control" data-id="${x.id_equipo}" id="btn_agregar_equipo">+</button></td>
                    </tr>
                `;

            });

            $("#listar_equipos_filtros").html(template);
        }
    })
}


/////////// button para agregar equipos 

$(document).on('click','#btn_agregar_equipo',function(){

    let id_equipo = $(this).attr('data-id');
    let id_informe  = $("#id_informe_filtro").val();
    let proceso = 3;


    const datos = {
        id_equipo,
        id_informe,
        proceso
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/equipos_cercal/controlador_equipos.php',
        success:function(response){
          
            if(response == "Existe"){
                Swal.fire({
                    title:'Mensaje',
                    text:'El equipo ya es utilizado para medir esta prueba',
                    icon:'warning',
                    timer:1700
                });
            }else{
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha asignado correctamente el equipo de medición',
                    icon:'success',
                    timer:1700
                });
            }
            listar_equipos_asignados();
        }
    })
    
});


$("#mostrar_equipos_mediciones_filtros").click(function(){
    listar_equipos_asignados();
});


//// FUNCION PARA ENLISTAR LOS EQUIPOS ASIGNADOS
function listar_equipos_asignados(){

    let id_informe  = $("#id_informe_filtro").val();
    let proceso = 4;

    datos = {   
        id_informe,
        proceso
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/equipos_cercal/controlador_equipos.php',
        success:function(response){

            let traer = JSON.parse(response);
            let template = "";

            traer.forEach((x)=>{

                template += 
                    `
                        <tr>
                            <td>${x.nombre_equipo}</td>
                            <td><button class="btn btn-danger" id="retirar_equipo_medicion_filtro" data-id="${x.id_medicion}">X</button></td>
                        </tr>
                    
                    `;

            });

            $("#equipos_agregados_medicion_filtros").html(template);

        }
    });
}


/////// des asignar equipo 
$(document).on('click','#retirar_equipo_medicion_filtro', function(){

    let id_medicion = $(this).attr('data-id');
    let proceso = 5;

    datos = {
        id_medicion,
        proceso
    }

    Swal.fire({
		position:'center',
		icon:'error',
		title:'Deseas eliminar este equipo?',
		showConfirmButton:true,
		showCancelButton:true,
		confirmButtonText:'Si!',
		cancelButtonText:'No!',
	}).then((result)=>{
		if(result.value){
            $.ajax({
                type:'POST',
                data:datos,
                url:'templates/equipos_cercal/controlador_equipos.php',
                success:function(response){
                   
                    Swal.fire({
                        title:'Mensaje',
                        text:'Se ha eliminado con exito el equipo de medición',
                        icon:'success',
                        timer:1700
                    });
                }
                
            });
        }

        listar_equipos_asignados();
    });


});