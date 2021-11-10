
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
            console.log(response);
        }

    });

});