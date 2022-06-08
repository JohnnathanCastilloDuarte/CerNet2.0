<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
 
        {foreach from=$array_campana  item=campana}
        <h5 id="text_enunciado_campana">

        </h5>
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
                          <em>1</em><span>Especificación</span>
                      </a>
            </li>
            <li>
              <a href="#step-32">
                          <em>2</em><span>Infraestructura</span>
                      </a>
            </li>

          </ul>

          
           <div class="form-wizard-content">
               <input type='hidden' id='type_campana' value='{$id_tipo}'>
               <input type='hidden' id='id_item_campana' value='{$id_item}'>
              <div id="step-12">
                <div class="form-row">
                  <div class="col-sm-6">
                    <label>Nombre:</label>
                    <input type="text" id="nombre_campana" class="form-control" placeholder="Nombre campana" value="{$campana.nombre_item}">
                  </div>
                  <div class="col-sm-6">
                    <label>Empresa:</label>
                        <input type="hidden" id="id_empresa" value="{$campana.id_empresa}">
                        <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="{$campana.nombre_empresa}">
                        <div >
                          <table class="table" id="aqui_resultados_empresa">
                          </table>
                        </div>
                  </div>

                </div>
                <br>
                <div class="form-row">
                  <div class="col-sm-4">
                    <label>Dirección:</label>
                    <input type="text" id="direccion_campana" class="form-control" placeholder="Direccion campana" value="{$campana.direccion}">
                  </div>
                  <div class="col-sm-4">
                    <label>Ubicación del equipo:</label>
                    <input type="text" id="ubicacion_campana" class="form-control" placeholder="ubicacion del equipo en el lugar empresa" value="{$campana.ubicacion_interna}">
                  </div>
                  <div class="col-sm-4"> 
                    <label>Área interna:</label>
                    <input type="text" id="area_interna" class="form-control" placeholder="ubicacion del equipo en el lugar empresa" value="{$campana.area_interna}">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-sm-4">
                    <label>Tipo de campana:</label>
                    <input type="text" class="form-control" id="tipo_campana" placeholder="Tipo campana" value="{$campana.tipo_campana}">
                  </div>
                  <div class="col-sm-4">
                    <label>Marca:</label>
                    <input type="text" class="form-control" id="marca_campana" placeholder="Marca campana" value="{$campana.marca}">
                  </div>
                  <div class="col-sm-4">
                    <label>Modelo:</label>
                    <input type="text" class="form-control" id="modelo_campana" placeholder="Modelo campana" value="{$campana.modelo}">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-sm-4">
                    <label>Codigo interno:</label>
                    <input type="text" id="codigo_interno_campana" class="form-control" placeholder="Codigo interno" value="{$campana.codigo}">
                  </div>
                  <div class="col-sm-4">
                    <label>Serie</label>
                    <input type="text" id="serie_campana" class="form-control" placeholder="N° Serie" value="{$campana.n_serie}">
                  </div>
                  <div class="col-sm-4">
                    <label>Fecha fabricación</label>
                    <input type="date" id="fecha_fabricacion_campana" class="form-control" placeholder="" value="{$campana.fecha_fabricacion}">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-sm-4">
                    <label>Requisito velocidad de aire</label>
                    <input class="form-control" type="text" id="velocidad_aire_campana" placeholder="Velocidad aire" value="{$campana.requisito_velocidad}">
                  </div>
                </div>
              </div>

              <div id="step-22">
                <div class="form-row">
                  <div class="col-sm-6">
                    <label>Temperatura minima:</label>
                    <input type="text" id="tem_min" class="form-control" placeholder="Temperatura minima" value="{$campana.tem_min}">
                  </div>
                  <div class="col-sm-6">
                    <label>Temperatura maxima:</label>
                        <input type="text" id="tem_max" class="form-control" placeholder="Temperatura maxima" value="{$campana.tem_max}">
                  </div>
                    <div class="col-sm-6">
                      <label>Humedad minima:</label>
                      <input type="text" id="hum_min" class="form-control" placeholder="Humedad minima" value="{$campana.hum_min}">
                    </div>
                    <div class="col-sm-6">
                      <label>Humedad maxima:</label>
                      <input type="text" id="hum_max" class="form-control" placeholder="Humedad maxima" value="{$campana.hum_max}">
                    </div>
                </div>
                <br>
              
              </div>

              <div id="step-32">
                <div class="form-row">
                  <div class="col-sm-6">
                    <label>Presión sonora equipo:</label>
                      <input type="text" id="presion_sonora_equipo" class="form-control" placeholder="Presion sonora del equipo" value="{$campana.presion_sonora_equipo}">
                  </div>
             <!--      <div class="col-sm-3">
                    <label>Presión sonora equipo:</label>
                      <input type="text" id="nombre_campana" class="form-control" placeholder="Presion sonora del equipo" value="{$campana.nombre_item}">
                  </div> -->
                  <div class="col-sm-6">
                    <label>Presión sonora sala:</label>
                        <input type="text" id="presion_sonora_sala" class="form-control" placeholder="Presión Sonora" value="{$campana.presion_sonora_sala}">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-sm-6">
                    <label>Nivel de Iluminación:</label>
                    <input type="text" id="nivel_iluminacion" class="form-control" placeholder="Direccion campana" value="{$campana.nivel_iluminacion}">
                  </div>
                  <div class="col-sm-6">
                    <label>Prueba de Humo:</label>
                    <input type="text" id="prueba_humo" class="form-control" placeholder="ubicacion del equipo en el lugar empresa" value="{$campana.prueba_humo}">
                  </div>
                </div>
                <br>
                 <div class="row" style="text-align:center;">
                  <div class="col-sm-12">
                    <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_campana">Actualizar</button>
                    <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_item_campana">Crear</button>
                  </div>
                </div>
              </div>

          </div>
        </div>  

   
    
        <!--Cierre del wizard-->
        <div class="divider">
        </div>
          <div class="clearfix">
          <button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
          <button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Anterior</button>
        </div>


    </div>
   
    {/foreach}
  </div>
</div>
</div>
<script type="text/javascript" src="design/js/campana.js"></script>