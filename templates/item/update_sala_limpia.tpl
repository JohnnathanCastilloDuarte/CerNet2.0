<div class="row">
  <div class="col-sm-12">
    {foreach from=$array_sala_limpia item=sala_limpia}

    <div class="card">
      <div class="card-header">
        <h5>
          Edición del equipo <span>{$sala_limpia.nombre_sala_limpia}</span>
        </h5>
      </div>
      <div class="card-body">
          <div class="form-wizard-content">
            <div id="step-12">
              <div class="form-row">
                <div class="col-sm-6">
                <input type="hidden" id="id_item_sala_limpia" value="{$sala_limpia.id_sala_limpia}">
                <input type="hidden" id="id_item_2_sala_limpia" value="{$sala_limpia.id_item}">

                  <label>Nombre del sala limpia</label>
                  <input type="text" id="nombre_sala_limpia" class="form-control" value="{$sala_limpia.nombre_sala_limpia}" required="" placeholder="Nombre sala limpia">
                </div>
                <div class="col-sm-6">
                  <label>Empresa</label>
                  <select class="form-control" id="empresa_sala_limpia">
                    {if $sala_limpia.id_empresa == ""}
                    <option value="0">Seleccione....</option>
                    {foreach from=$array_empresas item=empresa}
                      <option value="{$empresa.id_empresas}">{$empresa.nombre_empresas}</option>
                     {/foreach}
                     {else}
                    <option value="{$sala_limpia.id_empresa}">{$sala_limpia.nombre_empresa}</option>
                     {foreach from=$array_empresas item=empresa}
                      <option value="{$empresa.id_empresas}">{$empresa.nombre_empresas}</option>
                     {/foreach}
                     {/if}
                    }
                  </select>
                </div>

              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-6">
                  <label>Área :</label>
                  <input type="text" id="area_sala_limpia" class="form-control" placeholder="Area sala limpia" value="{$sala_limpia.Area_sala_limpia}" required="">
                </div>
                <div class="col-sm-6">
                  <label>Código:</label>
                  <input type="text" id="codigo_sala_limpia" class="form-control" placeholder="Codigo sala limpia" value="{$sala_limpia.codigo}" required="">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Área m2:</label>
                   <input type="text" id="area_m2_sala_limpia" class="form-control" placeholder="Area en m2" value="{$sala_limpia.area_m2}" required="">
                </div>
 
                <div class="col-sm-4">
                  <label>Volumen m3:</label>
                  <input type="text" id="volumen_m2_sala_limpia" class="form-control" placeholder="Volumen en m2" value="{$sala_limpia.volumen_m3}">
                </div>
                <div class="col-sm-4">
                  <label>Estado sala:</label>
                  <input type="text" id="estado_sala_limpia" class="form-control" placeholder="Estado de la sala" value="{$sala_limpia.estado_sala}">
                </div>
              </div>
            </div>

              <br>
               <div class="col-sm-12" style="text-align:center;">
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_crear_item_sala_limpia">Crear</button>  
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_sala_limpia">Actualizar</button>
                </div>
            </div>
          </div>
          <!---Cierre del content-->
        </div>
        <!--Cierre del wizard-->

      </div>
    </div>
    {/foreach}
  </div>
</div>
<script type="text/javascript" src="design/js/update_sala_limpia.js"></script>