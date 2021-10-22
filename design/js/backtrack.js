var persona = $("#id_valida").val();
var verifica = 0;
////////////// REGISTRA LOG DE CERRAR SESION

$("#btn_cerrar_sesion").click(function(){   
  window.location = "validate_login.php?action=0";
  /*if (backtrack(persona, 'Cerró Sesión en', 'CerNet 2.0') == "Si"){
    
  }  */
});


function backtrack(quien, movimiento){
  datos = {
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

/////////////regstra la creación del nuevo cliente/////////////////////
$("#btn_nuevo_cliente").click(function(){


 let quien = persona;
 let movimiento = "Crea en el modulo";
 let modulo = "Cliente";
 let giro = $("#giro_empresa").val();

 if (giro.length != 0) {
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

 }else{
  console.log("error");
 }
}); 


/////////////regstra la creación del nuevo cliente/////////////////////
$("#btn_editar_cliente").click(function(){

 let quien = persona;
 let movimiento = "Actualiza el modulo";
 let modulo = "Cliente";

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


}); 







