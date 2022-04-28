<div class="row">
  <div class="col-sm-12">
    {foreach from=$array_sala_limpia item=sala_limpia}

    <div class="card">
      <div class="card-header">
        {if $sala_limpia.id_sala_limpia == ""}

        <h5>
          Creación de item sala limpia
        </h5>
        {else}
        <h5>
          Edición del equipo <span>{$sala_limpia.nombre_sala_limpia}</span>
        </h5>
        {/if}
      </div>

    <div class="card-body">
       <div id="smartwizard2" class="forms-wizard-alt"> 
         <ul class="forms-wizard">
            <li>
              <a href="#step-12">
                      <em>1</em><span>Identificación</span>
                  </a>
            </li>
            <li>
              <a href="#step-22">
                      <em>2</em><span>Especificación</span>
                  </a>
            </li>
            <li>
              <a href="#step-32">
                      <em>3</em><span>Infraestructura</span>
                  </a>
            </li>
          </ul>

      
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
                <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="{$sala_limpia.nombre_empresa}">
                <input type="hidden" id="id_empresa" value="{$sala_limpia.id_empresa}">
                <div>
                  <table class="table" id="aqui_resultados_empresa">
                  </table>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-sm-6">
                <label>Clasificación OMS :</label>
                <input type="text" id="clasificacion_oms" class="form-control" placeholder="Clasificación OMS " value="{$sala_limpia.clasificacion_oms}" required="">
              </div>
              <div class="col-sm-6">
                <label>Clasificación ISO:</label>
                <input type="text" id="clasificacion_iso" class="form-control" placeholder="Clasificación ISO" value="{$sala_limpia.clasificacion_iso}" required="">
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-4">
                <label>Dirección equipo:</label>
                <input type="text" id="direccion_sala_limpia" class="form-control" placeholder="Dirección equipo" value="{$sala_limpia.direccion}">
              </div>
              <div class="col-sm-4">
                <label>Ubicación interna equipo:</label>
                <input type="text" id="ubicacion_interna_sala_limpia" class="form-control" placeholder="Ubicación equipo" value="{$sala_limpia.ubicacion_interna}">
              </div>
              <div class="col-sm-4">
                <label>Área interna equipo:</label>
                <input type="text" id="area_interna_sala_limpia" class="form-control" placeholder="Área equipo" value="{$sala_limpia.area_interna}">
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-4">
                  <label>Código sala:</label>
                  <input type="text" id="codigo" class="form-control" placeholder="Codigo de la sala " value="{$sala_limpia.codigo}">
                </div>
                <div class="col-sm-4">
                  <label>Estado de la sala:</label>
                  <input type="text" id="estado_sala" class="form-control" placeholder="Estado de la sala" value="{$sala_limpia.estado_sala}">
                </div>
            </div>
         
         </div>   
          
         <div id="step-22">  

            <div class="form-row">
              <div class="col-sm-6">
                <label>Temperatura °C:</label>
                <input type="text" id="temperatura" class="form-control" placeholder="°C" value="{$sala_limpia.temperatura}">
              </div>
              <div class="col-sm-6">
                <label>Humedad relativa % :</label>
                <input type="text" id="hum_relativa" class="form-control" placeholder="Hum %" value="{$sala_limpia.hum_relativa}">
              </div>
            </div>
            <br>
            

          </div>
          <div id="step-32">

              <div class="form-row">
                <div class="col-sm-4">
                  <label>Área m2:</label>
                  <input type="text" id="area_m2_sala_limpia" class="form-control" placeholder="Area en m2" value="{$sala_limpia.area_m2}" required="">
                </div>

                <div class="col-sm-4">
                  <label>Volumen m3:</label>
                  <input type="text" id="volumen_m3_sala_limpia" class="form-control" placeholder="Volumen en m3" value="{$sala_limpia.volumen_m3}">
                </div>
                <div class="col-sm-4">
                  <label>Claudal teorico m3/h :</label>
                  <input type="text" id="claudal_m3h" class="form-control" placeholder="Claudal teorico m3/h " value="{$sala_limpia.claudal_m3h}">
                </div>
             </div>
              <br>
              <div class="form-row">
                 <div class="col-sm-4">
                    <label>Ren/hr:</label>
                    <input type="text" id="ren_hr" class="form-control" placeholder="Area en m2" value="{$sala_limpia.ren_hr}" required="">
                 </div>
                 <div class="col-sm-4">
                  <label>Luz, lux:</label>
                  <input type="text" id="lux" class="form-control" value="{$sala_limpia.lux}" required="" placeholder="Luz, lux">
                </div>
                <div class="col-sm-4">
                  <label>Ruido, dBA:</label>
                  <input type="text" id="ruido_dba" class="form-control" placeholder="Ruido" value="{$sala_limpia.ruido_dba}">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Presión sala [Pa]:</label>
                  <input type="text" id="presion_sala" class="form-control" placeholder="Presión sala" value="{$sala_limpia.presion_sala}">
                </div>
                <div class="col-sm-4">
                  <label>Presión versus:</label>
                  <input type="text" id="presion_versus" class="form-control" placeholder="Presión versus" value="{$sala_limpia.presion_versus}" required="">
                </div>
                <div class="col-sm-4">
                  <label>Tipo de Presión:</label>
                  <input type="text" id="tipo_presion" class="form-control" placeholder="Tipo presión" value="{$sala_limpia.tipo_presion}">
                </div>
              </div>                          
                <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Puntos de muestreo normal ISO 14644-1:2015:</label>
                  <input type="text" id="puntos_muestreo" class="form-control" placeholder="Puntos muestreo normal" value="{$sala_limpia.puntos_muestreo}">
                </div>
              </div>
              <br>
            <div class="form-row">
                <div class="col-sm-12" style="text-align:center;">
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_sala_limpia">Actualizar</button>
                </div> 
                <div class="col-sm-12" style="text-align:center;">
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_crear_item_sala_limpia">Nuevo</button>
                </div>
           </div>


          </div>  
        </div>  
          
      </div>
      <div class="divider"></div>
        <div class="clearfix">
          <button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
          <button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Anterior</button>
        </div>
  </div>
    </div>

      <!---Cierre del content-->
    </div>
    <!--Cierre del wizard-->
    
</div>
{/foreach}
</div>
</div>
<script type="text/javascript" src="design/js/update_sala_limpia.js"></script>