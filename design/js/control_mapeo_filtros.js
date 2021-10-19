
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

////////////// FUNCION PARA CONTROLAR EVENTOS DE CREACIÓN DE FILTROS
$(document).ready(function(){
  
  let cantidad = $("#cantidad_filtros_input").val();
  let a = 1
  
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
        <select class="form-control" name="cumplimiento_filtro_a[]">
          <option>Si</option>
          <option>No</option>
        </select>
      </td>
      <td>
        <select class="form-control" name="cumplimiento_filtro_aa[]">
          <option>Si</option>
          <option>No</option>
        </select>
      </td>
      <td>
        <select class="form-control" name="cumplimiento_filtro_b[]">
          <option>Si</option>
          <option>No</option>
        </select>
      </td>
      <td>
        <select class="form-control" name="cumplimiento_filtro_bb[]">
          <option>Si</option>
          <option>No</option>
        </select>
      </td>
      <td>
        <select class="form-control" name="cumplimiento_filtro_c[]">
          <option>Si</option>
          <option>No</option>
        </select>
      </td>
      <td>
        <select class="form-control" name="cumplimiento_filtro_cc[]">
          <option>Si</option>
          <option>No</option>
        </select>
      </td>
      <td>
        <select class="form-control" name="cumplimiento_filtro_d[]">
          <option>Si</option>
          <option>No</option>
        </select>
      </td>
      <td>
        <select class="form-control" name="cumplimiento_filtro_dd[]">
          <option>Si</option>
          <option>No</option>
        </select>
      </td>
    </tr>
        `;
    $("#agregando_filtros").append(agrego)
  }
   
});

