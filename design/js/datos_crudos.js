
$("#form_datos_crudos").submit(function(e){
    e.preventDefault();
  

    	
		$.ajax({
        url: 'controlador_datos_crudos.php',
        type: 'POST',
        dataType: 'html',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success:function(response){
            
        }
    });

})