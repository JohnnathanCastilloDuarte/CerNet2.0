var persona = $("#id_valida").val();
var verifica = 0;
////////////// REGISTRA LOG DE CERRAR SESION

$("#btn_cerrar_sesion").click(function(){   

  let quien = persona;
  let movimiento = "Cerro sesión en";
  let modulo = "CerNet 2.0";

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

      window.location = "validate_login.php?action=0";
     }
   }
 });


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


/////////////registra la modificacion del una nueva/////////////////////
$("#btn_editar_cliente_empresa").click(function(){

 let quien = persona;
 let movimiento = "Actualiza el modulo";
 let modulo = "Cliente - Empresa";

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

///// registra la creación de una bodega 
$("#btn_nuevo_item_bodega").click(function(){

 let quien = persona;
 let movimiento = "Crea en el modulo";
 let modulo = "Item y bodega";

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

///// registra la edicion de una bodega 
$("#btn_editar_item_bodega").click(function(){

 let quien = persona;
 let movimiento = "Edita en el modulo";
 let modulo = "Item y bodega";

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

 ///// registra la creacion de un refrigerador 
 $("#btn_nuevo_item_refrigerador").click(function(){

   let quien = persona;
   let movimiento = "Crea en el modulo";
   let modulo = "Item y refrigerador";

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

///// edita la creacion de un refrigerador 
$("#btn_editar_item_refrigerador").click(function(){

 let quien = persona;
 let movimiento = "Edita en el modulo";
 let modulo = "Item y refrigerador";

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

///// registra la creacion de un freezer 
$("#btn_nuevo_item_freezer").click(function(){

 let quien = persona;
 let movimiento = "Crea en el modulo";
 let modulo = "Item y freezer";

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

///// edita la creacion de un freezer 
$("#btn_editar_item_freezer").click(function(){

 let quien = persona;
 let movimiento = "Edita en el modulo";
 let modulo = "Item y freezer";

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


///// registra la creacion de un ultrafreezer 
$("#btn_crear_item_ultrafreezer").click(function(){

 let quien = persona;
 let movimiento = "Crea en el modulo";
 let modulo = "Item y ultrafreezer";

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

///// registra la edicion de un ultrafreezer 
$("#btn_editar_item_ultrafreezer").click(function(){

 let quien = persona;
 let movimiento = "Edita en el modulo";
 let modulo = "Item y ultrafreezer";

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






