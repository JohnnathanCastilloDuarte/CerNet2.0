
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
      console.log(response);
      
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


  if(controlador_filtros('buscar_si_existe') == "No"){
    cargar_posiciones_vacias(cantidad);
  }else{
    controlador_filtros('buscando_inf_parte_1');
    controlador_filtros('buscando_inf_parte_2');
    controlador_filtros('buscando_inf_parte_3');   
  }

  
  
});



  ////////////////// FUNCION QUE DETERMINA SI EXISTE INFORMACIÓN DE LA INSPECCIÓN DE FILTROS

  function controlador_filtros(tipo){

    const datos = {
      tipo,
      id_asignado_filtro
    }

    if(tipo == 'buscar_si_existe'){
      $.ajax({
        type:'POST',
        data:datos,
        url:'templates/filtros/buscar_inpeccion.php',
        success:function(response){
          return response;
        }
      });
    }else if(tipo == 'buscando_inf_parte_1'){
      $.ajax({
        type:'POST',
        data:datos,
        url:'templates/filtros/buscar_inpeccion.php',
        success:function(response){
          alert(response);
        }
      });
    }else if(tipo == 'buscando_inf_parte_2'){
      $.ajax({
        type:'POST',
        data:datos,
        url:'templates/filtros/buscar_inpeccion.php',
        success:function(response){
          alert(response);
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
        <select class="form-control" name="cumplimiento_filtro_a[]" id="select_filtro">
          <option value="0">Select</option>
          <option value="si">Si</option>
          <option value="no">No</option>
        </select>
      </td>
      <td>
        <select class="form-control" name="cumplimiento_filtro_aa[]" id="select_filtro">
          <option value="0">Select</option>  
          <option value="si">Si</option>
          <option value="no">No</option>
        </select>
      </td>
      <td>
        <select class="form-control" name="cumplimiento_filtro_b[]" id="select_filtro">
          <option value="0">Select</option>
          <option value="si">Si</option>
          <option value="no">No</option>
        </select>
      </td>
      <td>
        <select class="form-control" name="cumplimiento_filtro_bb[]" id="select_filtro">
          <option value="0">Select</option>
          <option value="si">Si</option>
          <option value="no">No</option>
        </select>
      </td>
      <td>
        <select class="form-control" name="cumplimiento_filtro_c[]" id="select_filtro">
          <option value="0">Select</option>  
          <option value="si">Si</option>
          <option value="no">No</option>
        </select>
      </td>
      <td>
        <select class="form-control" name="cumplimiento_filtro_cc[]" id="select_filtro">
          <option value="0">Select</option>
          <option value="si">Si</option>
          <option value="no">No</option>
        </select>
      </td>
      <td>
        <select class="form-control" name="cumplimiento_filtro_d[]" id="select_filtro">
          <option value="0">Select</option>
          <option value="si">Si</option>
          <option value="no">No</option>
        </select>
      </td>
      <td>
        <select class="form-control" name="cumplimiento_filtro_dd[]" id="select_filtro">
          <option value="0">Select</option> 
          <option value="si">Si</option>
          <option value="no">No</option>
        </select>
      </td>
    </tr>
        `;

    let agrego2 = 
      `
        <tr>
          <td>Prueba de integridad de filtro #${a}</td>
          <td><input type="text" class="form-control" name="valor_obtenido_filtros" id="valor_obtenido_filtros"></td>
          <td><span>Veredicto</span></td>
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

$("#ir_informe_filtros").click(function(){

  window.open("templates/filtros/informes/inspeccion_de_filtros.php");
})

