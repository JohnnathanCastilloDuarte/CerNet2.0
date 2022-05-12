<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
       {foreach from=$array_flujo_laminar  item=flujo_laminar}
       <h5 id="text_enunciado_flujo_laminar">
         {if $flujo_laminar.id_item == ''}
         Crear flujo laminar
         {else}
         Modificar flujo laminar
         {/if}
       </h5>
     </div>
     <input type="hidden" id="id_item_flujo_laminar" value="{$flujo_laminar.id_item}">
     <div class="card-body">
       <div class="form-wizard-content">
        <div id="step-12">
          <div class="form-row">
            <div class="col-sm-6">
              <label>Nombre:</label>
              <input type="text" id="nombre_flujo_laminar" class="form-control" placeholder="Nombre flujo laminar" value="{$flujo_laminar.nombre_item}">
            </div>
            <div class="col-sm-6">
              <label>Empresa:</label>
              <input type="hidden" id="id_empresa" value="{$flujo_laminar.id_empresa_flujo}">
              <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="{$flujo_laminar.nombre_empresa}">
              <div >
                <table class="table" id="aqui_resultados_empresa">
                </table>
              </div>
            </div>

          </div>
          <div class="">

          </div>
          <br>
          <div class="form-row">
            <div class="col-sm-6">
              <label>Cantidad de filtros:</label>
              <input type="text" id="cantidad_filtros" class="form-control" placeholder="Cantidad de filtros" value="{$flujo_laminar.cantidad_filtro}">
            </div>
            <div class="col-sm-6">
              <label>Dirección:</label>
              <input class="form-control" type="text" name="" id="direccion_flujo" value="{$flujo_laminar.direccion}" placeholder="Dirección">
            </div>
          </div>
          <div class="form-row">
            <div class="col-sm-6">
              <label>Ubicación interna:</label>
              <input type="text" id="ubicacion_interna" class="form-control" placeholder="Ubicación interna" value="{$flujo_laminar.ubicacion_interna}">
            </div>
            <div class="col-sm-6">
              <label>Área interna:</label>
              <input class="form-control" type="text" name="" id="area_interna" value="{$flujo_laminar.area_interna}" placeholder="Área interna">
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="col-sm-4">
              <label>Tipo cabina:</label>
              <select class="form-control" id="tipo_cabina">
                {if $flujo_laminar.tipo_cabina == ''}
                <option value="">Seleccione...</option>
                <option>Vertical</option>
                <option>Horizontal</option>
                {else}
                <option value="{$flujo_laminar.tipo_cabina}">{$flujo_laminar.tipo_cabina}</option>
                <option>Vertical</option>
                <option>Horizontal</option>
                {/if}
              </select>
            </div>
            <div class="col-sm-4">
              <label>Marca:</label>
              <input class="form-control" type="text" name="" id="marca" value="{$flujo_laminar.marca}" placeholder="Marca">
            </div>
            <div class="col-sm-4">
              <label>Modelo:</label>
              <input class="form-control" type="text" name="" id="modelo" value="{$flujo_laminar.modelo}" placeholder="Modelo">
            </div>
          </div>
           <div class="form-row">
            <div class="col-sm-4">
              <label>N serie:</label>
              <input type="text" id="n_serie" class="form-control" placeholder="Numero de serie" value="{$flujo_laminar.serie}">
            </div>
            <div class="col-sm-4">
              <label>Código:</label>
              <input class="form-control" type="text" name="" id="codigo" value="{$flujo_laminar.codigo}" placeholder="Código">
            </div>
             <div class="col-sm-4">
              <label>Tipo dimenciones:</label>
              <input type="text" id="tipo_dimeciones" class="form-control" placeholder="Tipo dimenciones" value="{$flujo_laminar.tipo_dimenciones}">
            </div>
          </div> 
          <div class="form-row">
           
            <div class="col-sm-4">
              <label>Limite penetración:</label>
              <input class="form-control" type="text" name="" id="limite_penetracion" value="{$flujo_laminar.limite_penetracion}" placeholder="Limite penetracion">
            </div>
            <div class="col-sm-4">
              <label>Requisito de velocidad de aire:</label>
              <input class="form-control" type="text" name="" id="eficiencia" value="{$flujo_laminar.eficiencia}" placeholder="Requisito de velocidad de aire">
            </div>
          </div>

          
          <!---Cierre del content-->
        </div>
        <!--Cierre del wizard-->
        <div class="divider"></div>


      </div>
      <div class="row" style="text-align:center;">
        <div class="col-sm-12">
          <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_actualizar_flujo_laminar">Actualizar</button>
          <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_crear_flujo_laminar">Crear</button>
        </div>
      </div>
      {/foreach}

    </div>
  </div>
  <script type="text/javascript" src="design/js/update_flujo_laminar.js"></script>