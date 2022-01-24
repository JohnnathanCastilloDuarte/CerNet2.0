
$("#subir_sensores").submit(function(e){
  
   e.preventDefault();
  
   var formData = new FormData(document.getElementById("subir_sensores"));
    

    $.ajax({
      url: 'templates/sensores/controlador_sensores.php',
      type: 'POST',
      dataType: 'html',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success:function(response) {
        console.log(response);
        $("#mostrar_resultados").html(response)
      } 
    });  
  
    
});
  
                           