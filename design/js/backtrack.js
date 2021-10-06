var persona = $("#id_valida").val();
var verifica = 0;
////////////// REGISTRA LOG DE CERRAR SESION

$("#btn_cerrar_sesion").click(function(){   
   
    if (backtrack(persona, 'Cerró Sesión en', 'CerNet 2.0') == "Si"){
        window.location = "validate_login.php?action=0";
    }  
});






function backtrack(quien, movimiento, modulo){
  
   const datos = {
     quien,
     movimiento,
     modulo
   }
   
   $.ajax({
     type:'POST',
     data:datos,
     url:'templates/controlador_backtrack/controlador_general.php',
     success:function(response){
       console.log(response);
      if(response == "Listo"){
       
      }
     }
   });
   return "Si";
}