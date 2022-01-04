<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
       {foreach from=$array_flujo_laminar  item=flujo_laminar}
        <h5 id="text_enunciado_flujo_laminar">
             Modificar flujo laminar
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
                <label >Empresa</label>
                <select class="form-control" id="empresa_flujo_laminar" required>
                  {if $flujo_laminar.id_empresa_flujo == ""}
                  <option value="0">Seleccione....</option>
                  {foreach from=$array_empresa item=empresa}
                  <option value="{$empresa.id_empresa}">{$empresa.nombre_empresa}</option>
                  {/foreach}
                  {else}
                  <option value="{$flujo_laminar.id_empresa_flujo}">{$flujo_laminar.nombre_empresa_flujo}</option>
                  {foreach from=$array_empresa item=empresa}
                  <option value="{$empresa.id_empresa}">{$empresa.nombre_empresa}</option>
                  {/foreach}
                  {/if}

                </select>
              </div>

            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-6">
                <label>Cantidad de filtros:</label>
                <input type="text" id="cantidad_filtros" class="form-control" placeholder="Cantidad de filtros" value="{$flujo_laminar.cantidad_filtro}">
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