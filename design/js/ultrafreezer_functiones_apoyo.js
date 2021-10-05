  var id_asignado = $("#id_asignado").val();
  leer_correlativo(id_asignado);
  
  function leer_correlativo(x){
    
    $.post('templates/ultrafreezer/validar_correlativo.php',{x},function(response){
     
        if(response == "Sin"){
          $("#crear_mapeo").hide();
          $("#ver_mapeo").hide();
          
         Swal.fire({
          position:'center',
          icon:'warning',
          title:'Correlativo informes',
          text:'Recuerda que para crear los mapeos deberas crear el consecutivo, que tendran los informes',
          timer:1500
        });
        }else{
           $("#aqui_consecutivo_ultrafreezer").text(response);
        }
    });
 
}


alert("Hola");