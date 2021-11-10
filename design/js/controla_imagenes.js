
//////////////// controlar img
/*
$.ajax({
		url: 'templates/ultrafreezer/actualizar_informe_parte_1.php',
    type: 'POST',
    dataType: 'html',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
    success:function(response){	
*/

$("#formulario_envia_img").submit(function(e){
    e.preventDefault();

    $.ajax({
        url: 'templates/filtros/controlador_imagenes.php',
        type: 'POST',
        dataType: 'html',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success:function(response){
            console.log(response)
            if(response == "Si"){
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha cargado la imagen con exito',
                    icon:'success',
                    timer:1700
                });
                mostrar_imagenes();
            }
            
        }

    });
});


mostrar_imagenes();

function mostrar_imagenes(){

    let id_asignado_filtro = $("#id_asignado_filtro").val();

    $.ajax({
        type:'POST',
        data:{id_asignado_filtro},
        url:'templates/filtros/traer_imagenes.php',
        success:function(response){
            console.log(response);
            let traer = JSON.parse(response);
            let template = "";

            traer.forEach((valor)=>{
             
                template += 
                `
                
                    <div class="col-sm-4" style="text-align: center;">
                        <span class="text-muted" style="font-size: 150%;">${valor.enunciado}</span>
                        <img src="templates/filtros/${valor.url}" style="width: 95%;padding-top: 20px;">
                        <button class="btn btn-danger" style="position: relative;margin-top: -100%;margin-left: 80%;border-radius: 25px;" id="eliminar_imagen" data-id="${valor.id_imagen}">X</button>
                    </div>
                    <hr>
                `;
            });

            $("#aqui_imagenes").html(template);
        }    
    });
}



$(document).on('click','#eliminar_imagen',function(){
    
    let id_imagen = $(this).attr('data-id');
    Swal.fire({
        tile:'Mensaje',
        text:'Estas seguro que ¿ deseas eliminar la imagen ?',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        icon:'question'
        }).then((x)=>{
            if(x.value){
                $.ajax({
                    type:'POST',
                    data:{id_imagen},
                    url:'templates/filtros/eliminar_imagenes.php',
                    success:function(response){
                        console.log(response);
                        if(response == "Listo"){
                            Swal.fire({
                                title:'Mensaje',
                                text:'Se ha eliminado la imagen',
                                icon:'success',
                                timer:1700
                            });
                            mostrar_imagenes();
                        }
                    }
                });
            }
        });

});