 $("#alerta_1").hide();
$("#ir_informe_filtros").click(function(){

  window.open("templates/filtros/informes/inspeccion_de_filtros.php");
})

//Validar usuario responsable 

$("#responsable").blur(function(){
 let usuario = $("#responsable").val();
 $.ajax({
    type:'POST',
    data:{usuario},
    url:'templates/usuario/validar_usuario.php',
    success:function(e){
      console.log(e)
      if(e == 'disponible'){
         $("#responsable").css("border-color", "red");
         $("#alerta_1").show();
       }else{
         $("#alerta_1").hide();
         $("#responsable").css("border-color", "#03cb1b");
       }
     }
   });   
});
/// VARIABLES GLOBALES
var id_asignado_filtro = $("#id_asignado_filtro").val();


// FUNCIONES A EJECUTAR
consultando_ot();

///////////// CONSULTAR DATOS DE LA OT
function consultando_ot(){
  
  $.ajax({
    type:'POST',
    url:'templates/filtros/datos_ot.php',
    data:{id_asignado_filtro},
    success:function(response){
        
      let traer = JSON.parse(response);
      
      traer.forEach((x)=>{
        $("#ot_filtro_label").text(x.ot);
        $("#cliente_filtro_label").text(x.cliente);
        $("#marca_filtro_label").text(x.marca);
        $("#modelo_filtro_label").text(x.modelo);
        $("#serie_filtro_label").text(x.serie);
        $("#ubicacion_filtro_label").text(x.ubicacion);
        $("#ubicadoen_filtro_label").text(x.ubicacionen);
        $("#dimensiones_filtro_label").text(x.filtro_dimension);
        $("#descripcion_filtro_label").text(x.filtro);
        $("#penetracion_filtro_label").text('0.001 %');
        $("#eficiencia_filtro_label").text(x.eficiencia);
        $("#cantidad_filtros_input").val(x.cantidad_filtro);
        
      })
          
      
    }
  });
}


///////// FUNCIÓN PARA TRAER LA CANTIDAD DE FILTROS
$(document).ready(function(){

  let cantidad = $("#cantidad_filtros_input").val();

    controlador_filtros('buscar_si_existe');
  
  //}else{
    //controlador_filtros('buscando_inf_parte_1');
    //controlador_filtros('buscando_inf_parte_2');
    //controlador_filtros('buscando_inf_parte_3');   
  //}

  
  
});



  ////////////////// FUNCION QUE DETERMINA SI EXISTE INFORMACIÓN DE LA INSPECCIÓN DE FILTROS

  function controlador_filtros(tipo){
   
    const datos = {
      tipo,
      id_asignado_filtro
    }

    if(tipo == 'buscar_si_existe'){
      let variable = "";
      
      $.ajax({
        type:'POST',
        data:datos,
        url:'templates/filtros/buscar_inpeccion.php',
        success:function(response){
              console.log(response);
          if(response != "No"){

            $("#tarjeta_equipos_medicion_filtros").show();
            $("#btn_nuevo_filtro_mapeo").show();
            $("#btn_actualizar_filtro_mapeo").hide();
           
            let tipo = 'buscar_si_ifo_p3';

            const datos2 = {
              id_asignado_filtro,
              tipo
            }
            
             $.ajax({
                   type:'POST',
                    url:'templates/filtros/buscar_inpeccion.php',
                     data:datos2,
                     success:function(e){
                      //console.log(e)
                       if(e == 'NO'){
                          let tipo = 'contar_filtros';
                          console.log('entrando');
                         const datos = {
                            id_asignado_filtro,
                            tipo
                          } 
                         
                         $.ajax({
                         type:'POST',
                         url:'templates/filtros/buscar_inpeccion.php',
                         data:datos,
                         success:function(response){
                            cargar_posiciones_vacias(response);
                           }
                           });
                       }else{
                     //    console.log('no entro');
                       }
                       
                   }
             });
            
                
         // }else{
            $("#btn_nuevo_filtro_mapeo").hide();
            $("#btn_actualizar_filtro_mapeo").show();
            controlador_filtros('buscando_inf_parte_1');
            controlador_filtros('buscando_inf_parte_2');
            controlador_filtros('buscando_inf_parte_3'); 
            
          }
          
        }
      });

    }else if(tipo == 'buscando_inf_parte_1'){
      $.ajax({
        type:'POST',
        data:datos,
        url:'templates/filtros/buscar_inpeccion.php',
        success:function(response){
          //console.log(response);
          let traer = JSON.parse(response);
        
          traer.forEach((x)=>{
            $("#id_informe_filtro").val(x.id_informe);
            $("#insp1_traido_db").text(x.insp1);
            $("#insp1_traido_db").val(x.insp1);
            $("#insp2_traido_db").text(x.insp2);
            $("#insp2_traido_db").val(x.insp2);
            $("#insp3_traido_db").text(x.insp3);
            $("#insp3_traido_db").val(x.insp3);
            $("#insp4_traido_db").text(x.insp4);
            $("#insp4_traido_db").val(x.insp4);
            $("#insp5_traido_db").text(x.insp5);
            $("#insp5_traido_db").val(x.insp5);
            $("#insp6_traido_db").text(x.insp6);
            $("#insp6_traido_db").val(x.insp6);
            $('#nombre_informe').val(x.nombre_informe);
            $("#fecha_medicion").val(x.fecha_medicion);
            $('#solicitante').val(x.solicitante);
            $("#responsable").val(x.responsable);
            $('#conclusion').val(x.conclusion);
          })
        }
      });
    }else if(tipo == 'buscando_inf_parte_2'){
      $.ajax({
        type:'POST',
        data:datos,
        url:'templates/filtros/buscar_inpeccion.php',
        success:function(response){
          let traer = JSON.parse(response);
          let template = "";
          let numero = 1;
          
          traer.forEach((x)=>{
            template += 
              `
              <tr>
                <td>
                  <input type="hidden" name="id_medicion_2[]" value="${x.id_medicion_1}">
                  Prueba de integridad de filtro #${numero}
                </td>
                <td>
                  <input type="text" class="form-control" name="valor_filtro[]" id="valor_filtro" value="${x.valor_filtro}">
                </td>
                <td>
                  <input type="text" class="form-control" name="valor_obtenido_filtros[]" id="valor_obtenido_filtros" value="${x.valor_obtenido}">
                </td>
              </tr>
              `;
            numero++;
          });
        
          $("#medicion_del_norma_une_en_iso").append(template);
        }

      });
    }else if(tipo == 'buscando_inf_parte_3'){
      $.ajax({
        type:'POST',
        data:datos,
        url:'templates/filtros/buscar_inpeccion.php',
        success:function(response){
          let traer = JSON.parse(response);
          let template = "";
          let numero = 1;

          traer.forEach((f)=>{
            
        
            template += 
            `
            
            <tr>
              <td>
                <input type="hidden" name="id_medicion_1[]" value="${f.id_medicion_2}">
                Filtro N° ${numero}
              </td>
              <td>
                <input class="form-control" name="cumplimiento_filtro_a[]" id="select_filtro" value="${f.zonaA}">
              </td>
              <td>
                <input class="form-control" name="cumplimiento_filtro_aa[]" id="select_filtro" value="${f.zonaAA}">
              </td>
              <td>
                <input class="form-control" name="cumplimiento_filtro_b[]" id="select_filtro" value="${f.zonaB}">
              </td>
              <td>
                <input class="form-control" name="cumplimiento_filtro_bb[]" id="select_filtro" value="${f.zonaBB}">
              </td>
              <td>
                <input class="form-control" name="cumplimiento_filtro_c[]" id="select_filtro" value="${f.zonaC}">
              </td>
              <td>
                <input class="form-control" name="cumplimiento_filtro_cc[]" id="select_filtro" value="${f.zonaCC}">
              </td>
              <td>
                <input class="form-control" name="cumplimiento_filtro_d[]" id="select_filtro" value="${f.zonaD}">
              </td>
              <td>
                <input class="form-control" name="cumplimiento_filtro_dd[]" id="select_filtro" value="${f.zonaDD}">
              </td>
            </tr>
            
            `;
            numero++;
          });

          $("#agregando_filtros").append(template);
        }
      });
    }
    
  }



////////////// FUNCION PARA CONTROLAR EVENTOS DE CREACIÓN DE FILTROS
function cargar_posiciones_vacias(cantidad){
  
  $("#agregando_filtros").empty();
/*$("#generar_posicion_filtros").click(function(){


  let cantidad = $("#cantidad_filtros_input").val();*/

  let a = 1;
  
  if(cantidad.length == 0){
    Swal.fire({
      title:'Mensaje',
      text:'Debes ingresar una cantidad valida',
      icon:'warning',
      timer:2500
    });
  }
  
  for(a=1;a<=cantidad;a++){
    let agrego = 
    `<tr>
      <td>Filtro N° ${a}</td>
      <td>
        <input class="form-control" name="cumplimiento_filtro_a[]" id="select_filtro">
      </td>
      <td>
        <input class="form-control" name="cumplimiento_filtro_aa[]" id="select_filtro">
      </td>
      <td>
        <input class="form-control" name="cumplimiento_filtro_b[]" id="select_filtro">
      </td>
      <td>
        <input class="form-control" name="cumplimiento_filtro_bb[]" id="select_filtro">
      </td>
      <td>
        <input class="form-control" name="cumplimiento_filtro_c[]" id="select_filtro">
      </td>
      <td>
        <input class="form-control" name="cumplimiento_filtro_cc[]" id="select_filtro">
      </td>
      <td>
        <input class="form-control" name="cumplimiento_filtro_d[]" id="select_filtro">
      </td>
      <td>
        <input class="form-control" name="cumplimiento_filtro_dd[]" id="select_filtro">
      </td>
    </tr>
        `;

    let agrego2 = 
      `
        <tr>
          <td>Prueba de integridad de filtro</td>
          <td><input type="text" class="form-control" name="valor_filtro[]" id="valor_filtro" value=""></td>
          <td><input type="text" class="form-control" name="valor_obtenido_filtros[]" id="valor_obtenido_filtros"></td>
        </tr>
      `;
    $("#medicion_del_norma_une_en_iso").append(agrego2);
    $("#agregando_filtros").append(agrego);
  }
   
}
$(document).on('change','#select_filtro', function(){

  let quien = $(this).val();
  if(quien == "si"){
    $(this).removeClass('text-danger');
    $(this).addClass('text-success');
  }else if(quien == "no"){
    $(this).removeClass('text-success');
    $(this).addClass('text-danger');
  }else{
    $(this).removeClass('text-success');
    $(this).removeClass('text-danger');
  }
  
});

///////////// btn de informes:

$("#abrir_informe").click(function(){
  
   let encrypt = "LF456DS4G5DS4F5SD21G4DFSGF14DS2vDF2bfg56f1d56sf15ds6f4g534G564g56f4g56df4g561G6F4D5G6DF4G564FG5DG"+id_asignado_filtro;
   //window.open("templates/filtros/informes/informe/inspeccion_de_filtros.php");
  // location.href = 'templates/filtros/informes/informe/inspeccion_de_filtros.php?clave='+encrypt; 
    window.open('templates/filtros/informes/informe/inspeccion_de_filtros.php?clave='+encrypt);
})



/// BOTON PARA CREAR EL MAPEO 
/*
$("#form_filtro_1").submit(function(e){

  e.preventDefault();

  $.ajax({
		url: 'templates/filtro/controlador_filtro.php',
    type: 'POST',
    dataType: 'html',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
    success:function(response){		
      
		}	
  });

});*/


$("#btn_nuevo_filtro_mapeo").click(function(){


  var inspeccion_visual_array = [];
  var detalles_mediciones_array_a = [];
  var detalles_mediciones_array_aa = [];
  var detalles_mediciones_array_b = [];
  var detalles_mediciones_array_bb = [];
  var detalles_mediciones_array_c = [];
  var detalles_mediciones_array_cc = [];
  var detalles_mediciones_array_d = [];
  var detalles_mediciones_array_dd = [];
  var valor_obtenido_filtros = [];
  var valor_filtro = [];



  var inspeccion_visual_campos = document.getElementsByName("inspeccion_visual[]").length;

  for(i=0;i<inspeccion_visual_campos;i++){
    inspeccion_visual_array[i] = document.getElementsByName("inspeccion_visual[]")[i].value;
    //console.log(document.getElementsByName("inspeccion_visual[]")[i].value);
  }
  
  var detalles_medicion_campos_a = document.getElementsByName("cumplimiento_filtro_a[]").length;
  for(i=0;i<detalles_medicion_campos_a;i++){
    detalles_mediciones_array_a[i] = document.getElementsByName("cumplimiento_filtro_a[]")[i].value;
  }

  var detalles_medicion_campos_aa = document.getElementsByName("cumplimiento_filtro_aa[]").length;
  for(i=0;i<detalles_medicion_campos_aa;i++){
    detalles_mediciones_array_aa[i] = document.getElementsByName("cumplimiento_filtro_aa[]")[i].value;
  }

  var detalles_medicion_campos_b = document.getElementsByName("cumplimiento_filtro_b[]").length;
  for(i=0;i<detalles_medicion_campos_b;i++){
    detalles_mediciones_array_b[i] = document.getElementsByName("cumplimiento_filtro_b[]")[i].value;
  }

  var detalles_medicion_campos_bb = document.getElementsByName("cumplimiento_filtro_bb[]").length;
  for(i=0;i<detalles_medicion_campos_bb;i++){
    detalles_mediciones_array_bb[i] = document.getElementsByName("cumplimiento_filtro_bb[]")[i].value;
  }

  var detalles_medicion_campos_c = document.getElementsByName("cumplimiento_filtro_c[]").length;
  for(i=0;i<detalles_medicion_campos_c;i++){
    detalles_mediciones_array_c[i] = document.getElementsByName("cumplimiento_filtro_c[]")[i].value;
  }

  var detalles_medicion_campos_cc = document.getElementsByName("cumplimiento_filtro_cc[]").length;
  for(i=0;i<detalles_medicion_campos_cc;i++){
    detalles_mediciones_array_cc[i] = document.getElementsByName("cumplimiento_filtro_cc[]")[i].value;
  }

  var detalles_medicion_campos_d = document.getElementsByName("cumplimiento_filtro_d[]").length;
  for(i=0;i<detalles_medicion_campos_d;i++){
    detalles_mediciones_array_d[i] = document.getElementsByName("cumplimiento_filtro_d[]")[i].value;
  }

  var detalles_medicion_campos_dd = document.getElementsByName("cumplimiento_filtro_dd[]").length;
  for(i=0;i<detalles_medicion_campos_dd;i++){
    detalles_mediciones_array_dd[i] = document.getElementsByName("cumplimiento_filtro_dd[]")[i].value;
  }

  var valor_obtenido_filtros_campos = document.getElementsByName("valor_obtenido_filtros[]").length;
  for(i=0;i<valor_obtenido_filtros_campos;i++){
    valor_obtenido_filtros[i] = document.getElementsByName("valor_obtenido_filtros[]")[i].value;
  }
  var valor_filtro_campos = document.getElementsByName("valor_filtro[]").length;
  for(i=0;i<valor_filtro_campos;i++){
    valor_filtro[i] = document.getElementsByName("valor_filtro[]")[i].value;
  }

  let tipo = "Guardar";
  let nombre_informe = $("#nombre_informe").val();
  let solicitante = $("#solicitante").val();
  let conclusion = $("#conclusion").val();
  let responsable = $("#responsable").val();

const datos ={
  inspeccion_visual_array,
  detalles_mediciones_array_a,
  detalles_mediciones_array_aa,
  detalles_mediciones_array_b,
  detalles_mediciones_array_bb,
  detalles_mediciones_array_c,
  detalles_mediciones_array_cc,
  detalles_mediciones_array_d,
  detalles_mediciones_array_dd,
  valor_obtenido_filtros,
  tipo,
  id_asignado_filtro,
  nombre_informe,
  solicitante,
  responsable,
  conclusion,
  valor_filtro
}


$.ajax({
  type:'POST',
  data:datos,
  url:'templates/filtros/controlador_filtro.php',
  success:function(response){
    console.log(response);
    if(response == "Listo"){
      Swal.fire({
        title:'Mensaje',
        text:'Se ha creado la información con exito',
        icon:'success',
        timer:1500
      });
    recargar();
    }

  }
});

});

function recargar(){

  setTimeout(function(){
  location.reload();
},1500);
}


$("#btn_actualizar_filtro_mapeo").click(function(){

  var inspeccion_visual_array = [];
  var detalles_mediciones_array_a = [];
  var detalles_mediciones_array_aa = [];
  var detalles_mediciones_array_b = [];
  var detalles_mediciones_array_bb = [];
  var detalles_mediciones_array_c = [];
  var detalles_mediciones_array_cc = [];
  var detalles_mediciones_array_d = [];
  var detalles_mediciones_array_dd = [];
  var valor_obtenido_filtros = [];
  var id_medicion_1_array = [];
  var id_medicion_2_array = [];
  var valor_filtro = [];

  var detalles_id_medicion_1_campos = document.getElementsByName("id_medicion_1[]").length;

  for(i=0;i<detalles_id_medicion_1_campos;i++){
    id_medicion_1_array[i] = document.getElementsByName("id_medicion_1[]")[i].value;
  }


  var detalles_id_medicion_2_campos = document.getElementsByName("id_medicion_2[]").length;

  for(i=0;i<detalles_id_medicion_2_campos;i++){
    id_medicion_2_array[i] = document.getElementsByName("id_medicion_2[]")[i].value;
  }
  
  var inspeccion_visual_campos = document.getElementsByName("inspeccion_visual[]").length;

  for(i=0;i<inspeccion_visual_campos;i++){
    inspeccion_visual_array[i] = document.getElementsByName("inspeccion_visual[]")[i].value;
     //console.log(document.getElementsByName("inspeccion_visual[]")[i].value);
  }
  
  
  var detalles_medicion_campos_a = document.getElementsByName("cumplimiento_filtro_a[]").length;
  for(i=0;i<detalles_medicion_campos_a;i++){
    detalles_mediciones_array_a[i] = document.getElementsByName("cumplimiento_filtro_a[]")[i].value;
  }

  var detalles_medicion_campos_aa = document.getElementsByName("cumplimiento_filtro_aa[]").length;
  for(i=0;i<detalles_medicion_campos_aa;i++){
    detalles_mediciones_array_aa[i] = document.getElementsByName("cumplimiento_filtro_aa[]")[i].value;
  }

  var detalles_medicion_campos_b = document.getElementsByName("cumplimiento_filtro_b[]").length;
  for(i=0;i<detalles_medicion_campos_b;i++){
    detalles_mediciones_array_b[i] = document.getElementsByName("cumplimiento_filtro_b[]")[i].value;
  }

  var detalles_medicion_campos_bb = document.getElementsByName("cumplimiento_filtro_bb[]").length;
  for(i=0;i<detalles_medicion_campos_bb;i++){
    detalles_mediciones_array_bb[i] = document.getElementsByName("cumplimiento_filtro_bb[]")[i].value;
  }

  var detalles_medicion_campos_c = document.getElementsByName("cumplimiento_filtro_c[]").length;
  for(i=0;i<detalles_medicion_campos_c;i++){
    detalles_mediciones_array_c[i] = document.getElementsByName("cumplimiento_filtro_c[]")[i].value;
  }

  var detalles_medicion_campos_cc = document.getElementsByName("cumplimiento_filtro_cc[]").length;
  for(i=0;i<detalles_medicion_campos_cc;i++){
    detalles_mediciones_array_cc[i] = document.getElementsByName("cumplimiento_filtro_cc[]")[i].value;
  }

  var detalles_medicion_campos_d = document.getElementsByName("cumplimiento_filtro_d[]").length;
  for(i=0;i<detalles_medicion_campos_d;i++){
    detalles_mediciones_array_d[i] = document.getElementsByName("cumplimiento_filtro_d[]")[i].value;
  }

  var detalles_medicion_campos_dd = document.getElementsByName("cumplimiento_filtro_dd[]").length;
  for(i=0;i<detalles_medicion_campos_dd;i++){
    detalles_mediciones_array_dd[i] = document.getElementsByName("cumplimiento_filtro_dd[]")[i].value;
  }

  var valor_obtenido_filtros_campos = document.getElementsByName("valor_obtenido_filtros[]").length;
  for(i=0;i<valor_obtenido_filtros_campos;i++){
    valor_obtenido_filtros[i] = document.getElementsByName("valor_obtenido_filtros[]")[i].value;
  }

  var valor_filtro_campos = document.getElementsByName("valor_filtro[]").length;
  for(i=0;i<valor_filtro_campos;i++){
    valor_filtro[i] = document.getElementsByName("valor_filtro[]")[i].value;
  }



  let id_informe  = $("#id_informe_filtro").val();
  let nombre_informe = $("#nombre_informe").val();
  let solicitante = $("#solicitante").val();
  let responsable = $("#responsable").val();
  let conclusion = $("#conclusion").val();
  let fecha_medicion = $("#fecha_medicion").val();

  let tipo = "actualizar";

  const datos ={
    inspeccion_visual_array,
    detalles_mediciones_array_a,
    detalles_mediciones_array_aa,
    detalles_mediciones_array_b,
    detalles_mediciones_array_bb,
    detalles_mediciones_array_c,
    detalles_mediciones_array_cc,
    detalles_mediciones_array_d,
    detalles_mediciones_array_dd,
    valor_obtenido_filtros,
    tipo,
    id_asignado_filtro,
    id_informe,
    id_medicion_1_array,
    id_medicion_2_array,
    nombre_informe,
    solicitante,
    responsable,
    conclusion,
    fecha_medicion,
    valor_filtro
  }
       $.ajax({
         type:'POST',
         data:datos,
         url:'templates/filtros/controlador_filtro.php',
         success:function(response){

           Swal.fire({
           title:'Mensaje',
           text:'Se ha creado la información con exito',
           icon:'success',
           showConfirmButton: false,
           timer:1500
          });
 
     }
     // recargar();
     
   });
 

});

